<template>
  <div style="postion:relative;">
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <nuxt-link :to="localePath('/')">{{$t('Home')}}</nuxt-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$t('Booking')}}</li>
              </ol>
            </nav>
            <h2 class="breadcrumb-title">{{$t('Booking')}}</h2>
          </div>
        </div>
      </div>
    </div>
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
                  <nuxt-link :to="localePath(`/doctors/${doctor.slug}`)" class="booking-doc-img">
                    <img :src="doctor.photo" alt="User Image" />
                  </nuxt-link>
                  <div :style="{marginRight : $i18n.locale=='ar' ?'2%':'0'}" class="booking-info">
                    <h4>
                      <nuxt-link :to="localePath(`/doctors/${doctor.slug}`)">{{doctor.title}}</nuxt-link>
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
                        <li @click="prevDay" style="z-index:999999;" class="left-arrow">
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
                                new Date(item).toLocaleString($i18n.locale, {
                                weekday: "short"
                                })
                                }}
                              </span>
                              <span class="slot-date">
                                {{ new Date(item).getDate()}}
                                {{
                                new Date(item).toLocaleString($i18n.locale, {
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
                      <ul v-else class="clearfix">
                        <li
                          v-for="(time, i) in  WorkinglazyLoading[currentDay]"
                          class="mt-2"
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
          <div class="modal-header py-0 heading mt-5">{{$t('Consent')}}</div>
          <div class="modal-body" :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}">
            <div
              class="banck-acc"
              v-html="$i18n.locale=='ar'?settings['consent']:settings['consent_en']"
            ></div>
          </div>
          <div class="model-footer">
            <button class="btn btn-primary" @click="acceptPayment">{{$t('Confirm')}}</button>
            <button class="btn btn-danger" @click="concentModal=false">{{$t('close')}}</button>
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
                <textarea
                  class="form-control comment-textarea"
                  required
                  v-model="comment"
                  :placeholder="$t('describe')"
                />
              </div>
              <!-- <div>{{$t('Are you sure you want to proceed?')}}</div> -->
            </div>
            <div class="model-footer">
              <button class="btn btn-primary submit-condition" type="submit">{{$t('Confirm')}}</button>
              <a class="btn btn-danger" @click="commentModal=false">{{$t('go back')}}</a>
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

export default {
  name: "appontment",
  data() {
    return {
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
        perPage: { 1200: 7, 650: 7, 500: 5, 400: 4, 300: 3 },
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
      `/api/appointments/free_time?slug=${encodeURIComponent(
        context.route.params.slug
      )}&start_date=${
        startDay.getMonth() + 1 > 10
          ? startDay.getMonth() + 1
          : "0" + (startDay.getMonth() + 1)
      }/${
        startDay.getDate() > 10 ? startDay.getDate() : "0" + startDay.getDate()
      }/${startDay.getFullYear()}`
    );
    let workTime2 = await context.$axios.get(
      `/api/appointments/free_time?slug=${encodeURIComponent(
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
      `/api/doctor/${encodeURIComponent(context.route.params.slug)}?lang=${
        context.app.i18n.locale
      }`
    );
    let settingsResponse = await context.$axios.get("/api/settings");

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
      setComment: "book/setComment"
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
        this.localePath(`/doctors/${this.doctor.slug}/checkout`)
      );
    },

    prevDay() {
      this.$refs.siema.prev();
    },
    nextDay() {
      this.$refs.siema.next();
    },
    getDateFormat(day, month, year) {
      let dayF = day > 10 ? "" + day : "0" + day;
      let monthF = month > 10 ? "" + month : "0" + month;
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
          `/api/appointments/free_time?slug=${encodeURIComponent(
            this.$route.params.slug
          )}&start_date=${
            startDay.getMonth() + 1 > 10
              ? startDay.getMonth() + 1
              : "0" + (startDay.getMonth() + 1)
          }/${
            startDay.getDate() > 10
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
          `/api/appointments/free_time?slug=${encodeURIComponent(
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
    }
  }
};
</script>

<style scoped>
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
}

.modal-terms-container {
  width: 80%;
  padding: 2%;
  height: 80vh;
  overflow: scroll;
  background: #ffffff;
  margin: 4% auto;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  font-size: 1rem;
  border-radius: 0.25rem;
}

.modal-container {
  width: 50%;
  padding: 2%;
  background: #ffffff;
  margin: 0 auto;
  margin-top: 7%;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  border-radius: 0.25rem;
}
.modal-header {
  font-size: 2rem;
  justify-content: center;
  align-items: center;
}

.modal-body {
  font-size: 1.4rem;
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
.schedule-cont {
  overflow-x: scroll !important;
}

@media only screen and (max-width: 650px) {
  .modal-terms-container {
    width: 90%;
    padding: 2%;
    height: 80vh;
    overflow: scroll;
    background: #ffffff;
    margin: 4% auto;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    font-size: 1rem;
    border-radius: 0.25rem;
  }

  .modal-container {
    width: 90%;
    padding: 2%;
    background: #ffffff;
    margin: 0 auto;
    margin-top: 7%;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    border-radius: 0.25rem;
  }
}
</style>
