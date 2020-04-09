<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-12 p-lg-0">
        <div class="wrapper meeting">
          <div class="ag-header">
            <div class="ag-header-lead"></div>
            <div class="ag-header-msg">
              {{$t('Doctor')}} :&nbsp;
              <span
                v-if="$auth.user.role != 'doctor'"
                id="room-name"
              >{{doctor.title}}</span>
              <span v-else id="room-name">{{$t('Time Left :')}}{{TimerCounter}}</span>
            </div>
          </div>
          <div class="ag-main">
            <div class="ag-container">
              <client-only>
                <AgoraVideoCall
                  :videoProfile="videoProfile"
                  :channel="channel"
                  :transcode="transcode"
                  :attendeeMode="attendeeMode"
                  :baseMode="baseMode"
                  :appId="appId"
                  :uid="uid"
                ></AgoraVideoCall>
              </client-only>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-12">
        <div class="card">
          <nuxt-link class="card-body" :to="localePath(`/doctors/${doctor.slug}`)">
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
      </div>
    </div>
  </div>
</template>

<script>
import * as Cookies from "js-cookie";
import AgoraVideoCall from "@/components/AgoraVideoCall";
import { AGORA_APP_ID } from "@/agora.config";
import { AGORA_TOKEN } from "@/agora.config";
import axios from "../../../../.nuxt/axios";

export default {
  middleware: "auth",
  components: {
    AgoraVideoCall
  },
  head: {
    script: [{ src: "https://cdn.agora.io/sdk/web/AgoraRTCSDK-2.1.0.js" }]
  },
  asyncData(context) {
    // https://admin.dotbeit.com/api/doctor/dr-eman-abdel-aziz?lang=ar
    return context.$axios
      .get(
        `/api/doctor/${context.route.params.channel}?lang=${context.app.i18n.locale}`
      )
      .then(response => {
        // console.log(context.route.params.channel)
        return { doctor: response.data.doctor };
      })
      .catch(e => {});
  },

  data() {
    return {
      videoProfile: this.$store.state.client.videoProfile || "720p_6",
      channel: this.$store.state.client.channel || "tester",
      transcode: this.$store.state.client.transcode || "interop",
      attendeeMode: this.$store.state.client.attendeeMode || "video",
      baseMode: this.$store.state.client.baseMode || "avc",
      appointmentTime: this.$store.state.client.appointmentTime || new Date(),

      uid: this.$store.state.client.user_id || null,
      token: this.$store.state.client.token || null
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
    this.appId = AGORA_APP_ID;
    this.token = AGORA_TOKEN;
    if (!this.appId) {
      return alert("Get App ID first!");
    }
    if (!this.token) {
      return alert("not authorized");
    }
    setInterval(() => {
      this.appointmentTime =
        this.appointmentTime.getTime() - new Date().getTime();
    }, 1000);
  },
  methods: {
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
      let time = this.msToTime(this.appointmentTime);

      return time;
    }
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
</style>
