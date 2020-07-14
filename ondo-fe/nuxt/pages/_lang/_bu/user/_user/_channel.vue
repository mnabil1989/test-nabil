<template>
  <div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-12 p-lg-0">
          <div class="wrapper meeting">
            <div class="ag-header">
              <div class="ag-header-lead">
                <!-- ------------------------------------------------------- -->
                <!-- TODO-RX--modal -->
                <!-- ------------------------------------------------------- -->
              </div>
              <div class="ag-header-msg">
                {{$t('Doctor')}} :&nbsp;
                <span id="room-name">{{doctor.title}}</span>
                <!-- <span v-else id="room-name">{{$t('Time Left :')}}{{TimerCounter}}</span> -->
              </div>
            </div>
            <div class="ag-main">
              <div class="ag-container">
                <client-only>
                  <AgoraVideoCall
                    :videoProfile="videoProfile"
                    :hideModal="()=>{this.loadingModal=false}"
                    :transcode="transcode"
                    :attendeeMode="attendeeMode"
                    :baseMode="baseMode"
                    :appId="appId"
                    :appointmentID="this.$route.params.user"
                    :uid="uid"
                  ></AgoraVideoCall>
                </client-only>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12">
          <div v-if="$auth.user.role===2" class="card">
            <nuxt-link
              class="card-body"
              :to="localePath(`/${$route.params.bu}/doctors/${doctor.slug}`)"
            >
              <div class="doctor-widget">
                <div class="doc-info-left">
                  <div class="doctor-img">
                    <img :src="doctor.photo" class="img-fluid" alt="User Image" />
                  </div>
                  <div class="doc-info-cont">
                    <h4 class="doc-name">
                      <span>{{doctor.title}}</span>
                    </h4>
                    <p class="doc-speciality">{{doctor.speciality}}</p>
                    <h5 class="doc-department">{{doctor.position}}</h5>
                  </div>
                </div>
              </div>
            </nuxt-link>
          </div>
          <div v-else class="d-flex align-items-center justify-content-center">
            <div class="flex-col justify-content-between">
              <a @click="commentModal=true" class="btn btn-success text-white">Rx</a>
              <a
                @click="attachmentModal=true"
                class="btn btn-primary text-white"
              >{{$t('Show File')}}</a>
            </div>
            <Timer :timeinSeconds="selectedAppDate/1000" class="mr-auto ml-auto" />
          </div>
          <!-- ------------------------------------------------------- -->
          <!-- CHAT-WIDGET -->
          <!-- ------------------------------------------------------- -->
          <chat :appointmentID="this.$route.params.user" :converstaionId="conversaionId" />
        </div>
      </div>
    </div>
    <!-- ----------------------------------------------------------------------- -->
    <!-- FilesModal -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="payment-Modal" :class="{ 'd-none': !attachmentModal , 'd-block': attachmentModal}">
      <div class="modal-container">
        <form action="GET" class="text-center">
          <div class="modal-header text-center">{{$t('Patient Attatcments:')}}</div>
          <div class="modal-body" :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}">
            <!-- <div class="body-title">{{$t('Please Write a comment:')}}</div> -->
            <div class="images-container">
              <div
                v-for="(item, index) in attachments"
                :key="index"
                class="attachment-container"
                :class="{'big-image':index==bigImageIndex}"
              >
                <i @click="bigImageIndex=-2" class="fa fa-close close-icon"></i>
                <img @click="bigImageIndex=index" class="attachment-img" :src="item.attachment" />
              </div>

              <!-- <div>{{item.attachment}}</div> -->
            </div>
          </div>
          <div class="model-footer">
            <a
              class="btn btn-primary submit-condition"
              @click="attachmentModal=false"
            >{{$t('Confirm')}}</a>
          </div>
        </form>
      </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- RxModal -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="payment-Modal" :class="{ 'd-none': !commentModal , 'd-block': commentModal}">
      <div class="modal-container large">
        <form action="GET" @submit.prevent="sendRx" class="text-center">
          <div class="modal-header text-center">
            {{$t('Please Write the')}}
            &nbsp;
            <strong>Rx</strong>
          </div>
          <div class="modal-body" :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}">
            <!-- <div class="body-title">{{$t('Please Write a comment:')}}</div> -->
            <div
              class="banck-acc"
              v-for="(item, index) in Rxsize"
              :id="`rxItem${index}`"
              :key="index"
            >
              <div class="row d-flex justify-content-between">
                <div>
                  <input id="name" class="form-control" required :placeholder="$t('RxName')" />
                </div>
                <div>
                  <input id="note" class="form-control" required :placeholder="$t('RxNote')" />
                </div>
                <div>
                  <input
                    id="descritption"
                    class="form-control"
                    required
                    :placeholder="$t('RxDescription')"
                  />
                </div>
                <div>
                  <input
                    id="quntatiy"
                    class="form-control"
                    type="number"
                    required
                    :placeholder="$t('RxQty')"
                  />
                </div>
              </div>
            </div>
            <!-- <div>{{$t('Are you sure you want to proceed?')}}</div> -->
          </div>
          <div class="model-footer">
            <a class="btn btn-success" @click="Rxsize+=1">{{$t('addnew')}}</a>
            <button class="btn btn-primary submit-condition" type="submit">{{$t('Confirm')}}</button>
            <a class="btn btn-danger" @click="commentModal =false">{{$t('go back')}}</a>
          </div>
        </form>
      </div>
    </div>

    <!-- ----------------------------------------------------------------------- -->
    <!-- LOADINGMODAL -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="payment-Modal" :class="{ 'd-none': !loadingModal , 'd-block': loadingModal}">
      <div class="modal-container">
        <div class="modal-header text-center">
          {{$t(`Please wait`)}}
          &nbsp;
        </div>
        <div class="modal-header text-center">
          {{$t(`for the ${this.$auth.user.role==2?'doctor':'patient'} to join`)}}
          &nbsp;
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import * as Cookies from "js-cookie";
import Timer from "@/components/Timer";
import AgoraVideoCall from "@/components/AgoraVideoCall";
import chat from "@/components/chat";
import { HJH_AGORA_APP_ID } from "@/agora.config";
import { APC_AGORA_APP_ID } from "@/agora.config";
import { AGORA_TOKEN } from "@/agora.config";
// import axios from "../../../../../.nuxt/axios";

export default {
  head() {
    return {
      title: "Andalusia Dot Care",
      link: [
        {
          rel: "stylesheet",
          href: `/${this.style}.css`
        }
      ]
    };
  },
  middleware: "redirectAuth",
  components: {
    AgoraVideoCall,
    chat,
    Timer
  },
  // head: {
  //   script: [
  //     {
  //       src:
  //         "https://cdn.jsdelivr.net/npm/agora-rtc-sdk@3.0.2/AgoraRTCSDK.min.js"
  //     }
  //   ]
  // },
  async asyncData(context) {
    let doctorResponse = await context.$axios.get(
      `/${context.params.bu}-api/doctor/${context.route.params.channel}?lang=${context.app.i18n.locale}`
    );
    let attachmentsResponse = await context.$axios.get(
      `/${context.params.bu}-api/appointments/${context.route.params.user}/attachments`
    );
    return {
      doctor: doctorResponse.data.doctor,
      attachments: attachmentsResponse.data.data
    };
  },

  data() {
    return {
      style: "hjh",
      baseMode: "avc",
      bigImageIndex: -2,
      transcode: "interop",
      Rxsize: 1,
      attendeeMode: "video",
      videoProfile: "720p_6",
      channel: "",
      appointmentTime: this.$store.state.client.appointmentTime || "",
      selectedAppDate: 0,
      commentModal: false,
      loadingModal: true,
      attachmentModal: false,
      comment: "",
      uid: this.$store.state.client.user_id || null,
      token: "",
      conversaionId: ""
    };
  },
  timers: {
    log: { time: 1000, autostart: true }
  },
  methods: {
    log() {
      // alert($.token);
    }
  },

  created() {
    this.appId =
      this.$route.params.bu == "hjh" ? HJH_AGORA_APP_ID : APC_AGORA_APP_ID;
    this.token = AGORA_TOKEN;

    if (!this.appId) {
      return alert("Get App ID first!");
    }
    if (!this.token) {
      return alert("not authorized");
    }
    // setInterval(() => {
    //   console.log(this.appointmentTime);

    var date = new Date();

    this.selectedAppDate =
      new Date(
        this.appointmentTime.replace('"', "").replace(/-/g, "/")
      ).getTime() - date.getTime();
    // }, 1000);
    if (this.$route.params.bu === "hjh") {
      this.style = "hjh";
    } else if (this.$route.params.bu === "apc") {
      this.style = "apc";
    } else if (this.$route.params.bu === "adc") {
      this.style = "adc";
    } else if (this.$route.params.bu === "akw") {
      this.style = "akw";
    }
  },
  methods: {
    sendRx() {
      let rxArr = [];
      for (let i = 0; i < this.Rxsize; i++) {
        const rowItem = document.getElementById(`rxItem${i}`);
        let name = rowItem.querySelector("#name").value;
        let note = rowItem.querySelector("#note").value;
        let descritption = rowItem.querySelector("#descritption").value;
        let quntatiy = rowItem.querySelector("#quntatiy").value;

        rxArr.push({
          appointment_id: this.$route.params.user,
          doctor_id: this.$auth.user.id,
          user_id: this.$route.query.user,
          created_by: "Doctor",
          note: note,
          name: name,
          description: descritption,
          qty: quntatiy
        });
      }

      this.$axios.post(
        `/${this.$route.params.bu}-api/appointment/note`,
        { notes: rxArr },
        { headers: { "Content-Type": "application/json" } }
      );
      this.commentModal = false;
    },
    msToTime(duration) {
      var milliseconds = parseInt((duration % 1000) / 100),
        seconds = Math.floor((duration / 1000) % 60),
        minutes = Math.floor((duration / (1000 * 60)) % 60),
        hours = Math.floor((duration / (1000 * 60 * 60)) % 24);

      hours = hours < 10 ? "0" + hours : hours;
      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      return hours + ":" + minutes + ":" + seconds;
    }
  },
  computed: {
    TimerCounter: function() {
      let time = this.msToTime(this.selectedAppDate);

      return time;
    }
  },
  async mounted() {
    this.$axios;
    // .post("/api/videoAppointment", {
    //   headers: {
    //     Authorization: `${this.$auth.getToken("local")}`
    //   },
    //   body: {
    //     appointment_id: localStorage.getItem("appid")
    //   }
    // })
    // .then(res => {
    //   this.$nextTick(() => {
    //     this.token = res["data"].token;
    //     this.channel = res["data"].channelName;
    //   });
    // });
    let response = await this.$axios.post(
      `/${this.$route.params.bu}-api/create_conversation`,
      {
        appointment_id: this.$route.params.user
      },
      {
        header: {
          Authorization: this.$auth.getToken(`${this.$route.params.bu}Local`)
        }
      }
    );
    this.conversaionId = response.data.conversation_id;
    console.log(response);
  }
};
</script>

<style scoped lang="scss">
.meeting.wrapper {
  background: rgb(12, 43, 64);
  height: 100%;
  @media (max-width: 768px) {
    width: 100%;
  }
}
.images-container {
  display: grid;
  grid-gap: 10px;
  grid-template-columns: 1fr 1fr 1fr 1fr;
}
.close-icon {
  position: absolute;
  font-size: 5px;
  right: 4%;
  top: 4%;
}
.attachment-container {
  position: relative;
  transition: 0.5s;
}
.big-image {
  transform: scale(5);
  z-index: 9999999;
}
.attachment-img {
  width: 100%;
  height: 100%;
  // transform: scale(5);
}

.meeting .ag-header {
  padding: 20px 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.ag-header-lead {
  font-size: 16px;
  line-height: 35px;
}

.meeting .ag-footer {
  padding: 0 30px;
  display: flex;
  align-items: center;
}

.meeting .ag-main {
  position: relative;
}

.meeting .ag-footer :first-child {
  margin-right: 80px;
}

.header-logo {
  width: 60px;
  height: 35px;
  margin-right: 12px;
}

.ag-container {
  width: calc(100% - 60px);
  height: 100%;
  margin: 0 auto;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 12px;
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

.modal-container {
  width: 50%;
  padding: 2%;
  background: #ffffff;
  margin: 0 auto;
  margin-top: 7%;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  border-radius: 0.25rem;
}
.large {
  margin-top: 0%;
  overflow-y: scroll;
  height: 500px;
  width: 100% !important;
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
