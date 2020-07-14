<template>
  <div style="postion:relative;">
    <div class="pop-up-success">
      <p>{{$t('done')}}</p>
    </div>
    <!-- Breadcrumb -->
    <breadcrumb :link-to="'Home'" :current-page="'Booking'"></breadcrumb>
    <!-- /Breadcrumb -->
    <!-- Page Content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <transition name="fade">
              <div class="alert Message text-center" v-if="selectTimeMessage">
                <p>{{$t("must select a time first")}}</p>
              </div>
            </transition>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="booking-doc-info">
                  <nuxt-link
                    :to="localePath(`/${$route.params.bu}/doctors/${doctor.slug}`)"
                    class="booking-doc-img"
                  >
                    <img :src="doctor.photo" alt="User Image" />
                  </nuxt-link>
                  <div :style="{marginRight : $i18n.locale=='ar' ?'2%':'0'}" class="booking-info">
                    <h4>
                      <nuxt-link
                        :to="localePath(`/${$route.params.bu}/doctors/${doctor.slug}`)"
                      >{{doctor.title}}</nuxt-link>
                    </h4>
                  </div>
                </div>
              </div>
            </div>
            <!-- Schedule Widget -->
            <div class="card booking-schedule schedule-widget">
              <!-- Schedule Header -->
              <div class="schedule-header">
                <div class="row">
                  <div class="col-md-12">
                    <!-- Day Slot -->
                    <div class="day-slot">
                      <ul>
                        <li @click="prevDay" style="z-index:111;" class="left-arrow">
                          <a>
                            <i class="fa fa-chevron-left"></i>
                          </a>
                        </li>
                        <client-only>
                          <siema
                            class="siema"
                            ref="siema"
                            :ready="true"
                            :loop="false"
                            :options="options"
                          >
                            <li
                              v-for="(item, index) in Object.keys(WorkinglazyLoading)"
                              @click="changeDay(item)"
                              style="  width: 150px"
                              :key="index"
                            >
                              <span :class="{activeDay:currentDay==item}" style="cursor:pointer;">
                                {{
                                new Date(item).toLocaleString($i18n.locale=='ar'?'ar-eg':'en', {
                                weekday: "short"
                                })
                                }}
                              </span>
                              <span class="slot-date">
                                {{ new Date(item).getDate()}}
                                {{
                                new Date(item).toLocaleString($i18n.locale=='ar'?'ar-eg':'en', {
                                month: "short"
                                }) }}
                                <small
                                  class="slot-year"
                                >{{ new Date(item).getFullYear() }}</small>
                              </span>
                            </li>
                          </siema>
                        </client-only>
                        <li @click="nextDay" style="z-index:999999;" class="right-arrow">
                          <a>
                            <i class="fa fa-chevron-right"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- /Day Slot -->
                  </div>
                </div>
              </div>
              <!-- /Schedule Header -->
              <!-- Schedule Content -->
              <div class="schedule-cont">
                <div class="row">
                  <div class="col-md-12">
                    <!-- Time Slot -->
                    <div class="time-slot">
                      <div
                        v-if="WorkinglazyLoading[currentDay].length==0"
                        class="not-Avilable-container"
                      >{{$t("sorry no time available on that day")}}</div>
                      <ul v-else class="clearfix row">
                        <li
                          v-for="(time, i) in  WorkinglazyLoading[currentDay]"
                          class="mt-2 col-lg-3 col-6"
                          :key="i*1000"
                        >
                          <a
                            class="timing"
                            :class="{'selected':selectedTime==time}"
                            @click="selectedTime=time"
                            :key="index"
                          >{{tConvert(time)}}</a>
                        </li>
                      </ul>
                    </div>
                    <!-- /Time Slot -->
                  </div>
                </div>
              </div>
              <!-- /Schedule Content -->
            </div>
            <!-- /Schedule Widget -->

            <!-- Submit Section -->
            <div class="submit-section proceed-btn text-right">
              <p v-if="comment !==''" class="con-consent">{{$t('* please confirm consent')}}</p>
              <a
                id="proceed"
                @click="handleSubmit"
                class="btn btn-primary submit-btn"
              >{{$t("Proceed to Pay")}}</a>
            </div>
            {{loadLazyLoading}}
            <!-- /Submit Section -->
          </div>
        </div>
      </div>
    </div>
    <!-- ----------------------------------------------------------------------- -->
    <!-- concentModal -->
    <!-- ----------------------------------------------------------------------- -->
    <transition name="fade">
      <div
        class="payment-Modal banck-acc-model"
        :class="{ 'opacity-0': !concentModal , 'opacity-1': concentModal}"
      >
        <div class="modal-terms-container">
          <div class="modal-header py-0 heading">{{$t('Consent')}}</div>
          <div class="modal-body" :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}">
            <div
              class="banck-acc"
              v-html="$i18n.locale === 'ar' ? settings['consent_ar']:settings['consent']"
            ></div>
          </div>
          <div class="model-footer">
            <button class="btn btn-primary confirm" @click="acceptPayment">{{$t('Confirm')}}</button>
            <i class="fas fa-times" @click="concentModal=false"></i>
          </div>
        </div>
      </div>
    </transition>
    <!-- ----------------------------------------------------------------------- -->
    <!-- commentModal -->
    <!-- ----------------------------------------------------------------------- -->
    <transition name="fade">
      <div class="payment-Modal" :class="{ 'd-none': !commentModal , 'd-block': commentModal}">
        <div class="modal-container">
          <form action="GET" @submit.prevent="sendComment" class="text-center">
            <div class="modal-header text-center">{{$t('Please Write a comment')}}</div>
            <div class="modal-body" :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}">
              <!-- <div class="body-title">{{$t('Please Write a comment:')}}</div> -->
              <div class="banck-acc">
                <div class="row">
                  <div class="col-12 my-2">
                    <textarea
                      class="form-control comment-textarea"
                      required
                      v-model="comment"
                      ref="comment"
                      :placeholder="$t('describe')"
                    />
                  </div>
                  <div class="col-12">
                    <form>
                      <label class="files">
                        <input
                          type="file"
                          id="files"
                          ref="files"
                          multiple="multiple"
                          @change="handleFilesUpload($event)"
                        />
                      </label>
                    </form>
                    <div v-for="file in this.form">
                      <div>
                        <p class="file">{{file.name}}</p>
                      </div>
                    </div>
                    <!--                    <button @click="submitFiles()">Done</button>-->
                  </div>
                </div>
              </div>
              <!-- <div>{{$t('Are you sure you want to proceed?')}}</div> -->
            </div>
            <div class="model-footer">
              <button class="btn btn-primary confirm" type="submit">{{$t('Confirm')}}</button>
              <i class="fas fa-times" @click="commentModal=false"></i>
            </div>
          </form>
        </div>
      </div>
    </transition>

    <!-- /Page Content -->
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
// import axios from "axios";
import Breadcrumb from "../../../../../components/breadcrumb";
export default {
  name: "appontment",
  components: { Breadcrumb },
  head() {
    return {
      title: "Andalusia Dot Care",
      link: [
        {
          rel: "stylesheet",
          href: `/${this.style}.css`
        }
      ],
      meta: [{ name: 'theme-color', content: `${this.themeColor}` }]
    };
  },
  data() {
    return {
      style: "hjh",
      themeColor: '#1D6EBF',
      files: null,
      form: [],
      commentModal: false,
      comment: "",
      concentModal: false,
      selectedTime: "",
      currentDay: "",
      changed: false,
      workingDays: {},
      WorkinglazyLoading: {},
      workingTimes: [],
      options: {
        duration: 200,
        easing: "ease-out",
        perPage: { 1200: 7, 650: 7, 500: 5, 400: 4, 300: 2 },
        startIndex: 0,
        draggable: true,
        multipleDrag: false,
        threshold: 10,
        loop: false,
        rtl: false
      }
    };
  },
  async asyncData(context) {
    context.app.i18n.defaultLocale = "ar";
    let startDay = new Date(new Date().getTime());
    let nextStart = new Date(startDay.getTime() + 7 * 24 * 60 * 60 * 1000);
    let workTime = await context.$axios.get(
      `/${
        context.params.bu
      }-api/appointments/free_time?slug=${encodeURIComponent(
        context.route.params.slug
      )}&start_date=${
        startDay.getMonth() + 1 >= 10
          ? startDay.getMonth() + 1
          : "0" + (startDay.getMonth() + 1)
      }/${
        startDay.getDate() >= 10 ? startDay.getDate() : "0" + startDay.getDate()
      }/${startDay.getFullYear()}`
    );
    let workTime2 = await context.$axios.get(
      `/${
        context.params.bu
      }-api/appointments/free_time?slug=${encodeURIComponent(
        context.route.params.slug
      )}&start_date=${
        nextStart.getMonth() + 1 >= 10
          ? nextStart.getMonth() + 1
          : "0" + (nextStart.getMonth() + 1)
      }/${
        nextStart.getDate() >= 10
          ? nextStart.getDate()
          : "0" + nextStart.getDate()
      }/${nextStart.getFullYear()}`
    );
    let doctorResponse = await context.$axios.get(
      `/${context.params.bu}-api/doctor/${encodeURIComponent(
        context.route.params.slug
      )}?lang=${context.app.i18n.locale}`
    );
    let settingsResponse = await context.$axios.get(
      `/${context.params.bu}-api/settings`
    );

    let workingDays = { ...workTime["data"], ...workTime2["data"] };

    console.log(workingDays);

    return {
      workingTimes: [],
      currentDay: Object.keys(workTime.data)[0],
      workingDays: workingDays,
      settings: settingsResponse["data"]["settings"],
      WorkinglazyLoading: { ...workingDays },
      doctor: doctorResponse.data["doctor"]
    };
  },
  computed: {
    ...mapGetters({
      getAttachment: "book/getAttachment"
    }),
    loadLazyLoading: function() {
      let datesArr = Object.keys(this.workingDays);
      let lastDate = new Date(datesArr[datesArr.length - 1]);

      for (let i = 0; i < 14; i++) {
        const day = new Date(lastDate.getTime() + 24 * 60 * 60 * 1000 * i);
        const dayF = this.getDateFormat(
          day.getDate(),
          day.getMonth() + 1,
          day.getFullYear()
        );
        this.WorkinglazyLoading[dayF] = [];
      }

      return "";
    }
  },
  methods: {
    ...mapActions({
      setDate: "book/setSelectedDate",
      setTime: "book/setSelectedTime",
      setDoctor: "book/setSelectedDoctor",
      setComment: "book/setComment",
      setAttachment: "book/setAttachment"
    }),
    getWorkingTimesCol(index) {
      return this.workingDays[this.currentDay].slice(3 * index - 3, 3 * index);
    },
    async handleSubmit() {
      if (this.selectedTime == "") {
        alert("must select a time first");
        return;
      }
      await this.setTime(this.selectedTime);
      await this.setDate(this.currentDay);
      await this.setDoctor(this.doctor);
      this.commentModal = true;
    },
    async sendComment() {
      await this.setComment(this.comment);
      this.commentModal = false;
      this.concentModal = true;
    },
    acceptPayment() {
      this.$router.push(
        this.localePath(
          `/${this.$route.params.bu}/doctors/${this.doctor.slug}/checkout/checkout-free`
        )
      );
    },

    prevDay() {
      this.$refs.siema.prev();
    },
    nextDay() {
      this.$refs.siema.next();
    },
    getDateFormat(day, month, year) {
      let dayF = day >= 10 ? "" + day : "0" + day;
      let monthF = month >= 10 ? "" + month : "0" + month;
      return `${monthF}/${dayF}/${year}`;
    },
    async changeDay(item) {
      let selectedDate = new Date(item);

      let datesArr = Object.keys(this.workingDays);
      let lastDate = new Date(datesArr[datesArr.length - 1]);

      if (!this.changed && selectedDate.getTime() > lastDate.getTime()) {
        let startDay = new Date(
          new Date().getTime() + 7 * 24 * 60 * 60 * 1000 * 2
        );
        let nextStart = new Date(
          startDay.getTime() + 7 * 24 * 60 * 60 * 1000 * 3
        );
        let workTime = await this.$axios.get(
          `/${
            this.$route.params.bu
          }-api/appointments/free_time?slug=${encodeURIComponent(
            this.$route.params.slug
          )}&start_date=${
            startDay.getMonth() + 1 >= 10
              ? startDay.getMonth() + 1
              : "0" + (startDay.getMonth() + 1)
          }/${
            startDay.getDate() >= 10
              ? startDay.getDate()
              : "0" + startDay.getDate()
          }/${startDay.getFullYear()}`
        );
        for (const key in workTime.data) {
          if (this.WorkinglazyLoading.hasOwnProperty(key)) {
            this.WorkinglazyLoading[key] = workTime.data[key];
          }
        }
        let workTime2 = await this.$axios.get(
          `/${
            this.$route.params.bu
          }-api/appointments/free_time?slug=${encodeURIComponent(
            this.$route.params.slug
          )}&start_date=${
            nextStart.getMonth() + 1 >= 10
              ? nextStart.getMonth() + 1
              : "0" + (nextStart.getMonth() + 1)
          }/${
            nextStart.getDate() >= 10
              ? nextStart.getDate()
              : "0" + nextStart.getDate()
          }/${nextStart.getFullYear()}`
        );
        for (const key in workTime2.data) {
          if (this.WorkinglazyLoading.hasOwnProperty(key)) {
            this.WorkinglazyLoading[key] = workTime2.data[key];
          }
        }
        this.changed = true;
      }
      this.currentDay = item;
    },
    tConvert(time) {
      time = time
        .toString()
        .match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

      if (time.length > 1) {
        // If time format correct
        time = time.slice(1); // Remove full string match value
        time[5] = +time[0] < 12 ? ` ${this.$t("AM")}` : ` ${this.$t("PM")}`; // Set AM/PM
        time[0] = +time[0] % 12 || 12; // Adjust hours
      }
      return time.join(""); // return adjusted time or original string
    },
    // submitFiles() {
    //
    // },
    handleFilesUpload($event) {
      // console.log(e)
      // this.files = e.target.files;
      console.log(this.files);
      this.form = [];
      // this.files = this.$refs.files.files;
      let formData = new FormData();
      for (var i = 0; i < $event.target.files.length; i++) {
        let file = $event.target.files[i];
        console.log(file);
        this.form.push(file);
        console.log("this.form");
        console.log(this.form);
        formData.append("attachments[]", file);
      }
      this.$axios
        .post(`/${this.$route.params.bu}-api/appointments/files`, formData)
        .then(res => {
          console.log(res.data);
          this.setAttachment(res.data);
        })
        .catch(e => {
          console.log(e);
        });
      // console.log('files');
      // console.log(formData.getAll('files'));
      // this.setAttachment(this.form);
    }
  },
  created() {
    if (this.$route.params.bu === "hjh") {
      this.style = "hjh";
      this.themeColor = '#1D6EBF'
    } else if (this.$route.params.bu === "apc") {
      this.style = "apc";
      this.themeColor = '#0066B4'
    } else if (this.$route.params.bu === "akw") {
      this.style = "akw";
      this.themeColor = '#63C7C9'
    } else if (this.$route.params.bu === "adc") {
      this.style = "adc";
      this.themeColor = '#23692B'
    }
  }
};
</script>

<style scoped lang="scss">
#proceed {
  color: white;
}
ul li a {
  cursor: pointer;
}

li span {
  border: 2px solid transparent;
  cursor: pointer;
  width: 50%;
  margin: 0.2rem auto;
  transition: 0.4s;
}

li span.Day {
  border: 2px solid transparent;
  cursor: pointer;
  width: 50%;
  margin: 0.2rem auto;
  transition: 0.4s;
}

.activeDay {
  color: #1d6ebf;
  border: 2px solid #1d6ebf;
  cursor: pointer;
  width: 50%;
  margin: 0.2rem auto;
  border-radius: 0.25rem;
}

.payment-Modal {
  position: fixed;
  top: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0.55);
  height: 100vh;
  z-index: 99999999;
  border-radius: 0.25rem;
  transition: all ease-in-out 0.4s;
}

.modal-terms-container {
  width: 100%;
  height: 100vh;
  overflow: scroll;
  background: #ffffff;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  font-size: 1rem;
  border-radius: 0.25rem;
  .model-footer {
    @media (max-width: 545px) {
      background: rgba(29, 110, 191, 0.8);
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 82%;
    }
  }
  .confirm {
    color: #fff;
    background-color: #1d4590;
    border: 1px solid transparent;
    &:hover {
      background-color: #01cae4;
    }
    @media (max-width: 545px) {
      position: absolute;
      right: 5% !important;
      left: auto !important;
      top: 20%;
    }
  }
  .fa-times {
    color: #333;
    position: absolute;
    left: 3%;
    top: 5%;
    cursor: pointer;
    @media (max-width: 545px) {
      top: 30%;
    }
  }
}

.modal-container {
  width: 100%;
  height: 100vh;
  background: #ffffff;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  border-radius: 0.25rem;
}
.modal-header {
  font-size: 2rem;
  justify-content: center;
  align-items: center;
  margin-top: 0;
  @media (max-width: 545px) {
    font-size: 1rem;
    margin-top: 5rem;
  }
}

.modal-body {
  font-size: 1.4rem;
  padding-top: 1rem;
}

.body-footer {
  font-size: 1.2rem;
  font-weight: 700;
}

.body-title {
  font-weight: 700;
}

.banck-acc {
  font-size: 1.06rem;
  margin: 1% 0;
}

.model-footer {
  font-size: 1rem;
  color: #ffffff;
  text-align: center;
  margin-bottom: 2rem;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
 {
  opacity: 0;
}

.slot-date {
  display: inline-block;
  width: 100%;
}

.submit-condition {
  width: 135px;
}

.opacity-0 {
  transition: all ease-in-out 0.5s;
  opacity: 0;
  display: none;
}

.opacity-1 {
  transition: all ease-in-out 0.5s;
  opacity: 1;
  display: block;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
 {
  opacity: 0;
}
.comment-textarea {
  height: 110px;
  min-height: 110px;
  resize: none;
}
.banck-acc-model {
  /* padding: 1rem 4rem; */
}
/*.schedule-cont {*/
/*  overflow-x: scroll !important;*/
/*}*/
.modal-container {
  position: relative;
  transition: all ease-in-out 0.3s;
  .model-footer {
    @media (max-width: 545px) {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 80%;
    }
  }
  .submit-condition {
    @media (max-width: 545px) {
      position: absolute;
      right: 5% !important;
      left: auto !important;
      top: 10%;
    }
  }
  .fa-times {
    color: #333;
    position: absolute;
    left: 5%;
    top: 5%;
    cursor: pointer;
    @media (max-width: 545px) {
      top: 10%;
    }
  }
}
.con-consent {
  color: #1d4590;
  font-weight: bold;
}
.heading {
  margin-top: 2rem;
}
@media only screen and (max-width: 650px) {
  .modal-terms-container {
    width: 100%;
    height: 100vh;
    overflow: scroll;
    background: #ffffff;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    font-size: 1rem;
    border-radius: 0.25rem;
  }

  .modal-container {
    width: 100%;
    height: 100vh;
    padding: 2%;
    background: #ffffff;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    border-radius: 0.25rem;
  }
  .heading {
    margin-top: 5rem;
  }
}
.files {
  width: 100%;
  position: relative;
  padding: 5px;
  input {
    width: 100%;
    display: block;
    visibility: hidden;
  }
  &:after {
    content: "upload files";
    border-radius: 0.25rem;
    background: #f3f3f3;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    border: 1px dashed #1d4590;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
  }
  &:lang(ar):after {
    content: "ارفع الملفات" !important;
  }
}
.file {
  background: #f3f3f3;
  border-radius: 0.25rem;
  padding: 15px;
}
</style>
