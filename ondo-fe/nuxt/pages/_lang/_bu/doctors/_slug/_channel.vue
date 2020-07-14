<template>
  <div class="wrapper meeting">
    <div class="ag-header">
      <div class="ag-header-lead"></div>
      <div class="ag-header-msg">
        {{$t('Doctor')}}:&nbsp;
        <span id="room-name">{{channel}}</span>
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
</template>

<script>
import * as Cookies from "js-cookie";
import AgoraVideoCall from "@/components/AgoraVideoCall";
// import { AGORA_APP_ID } from "@/agora.config";
import { AGORA_TOKEN } from "@/agora.config";
export default {
  middleware: "redirectAuth",
  components: {
    AgoraVideoCall
  },
  head() {
    return {
      title: "Andalusia Dot Care | Doctor",
      link: [
        {
          rel: "stylesheet",
          href: `/${this.style}.css`
        }
      ],
      meta: [{ name: "theme-color", content: `${this.themeColor}` }]
    };
  },
  data() {
    return {
      style: "hjh",
      themeColor: "#1D6EBF",
      videoProfile: this.$store.state.client.videoProfile || "720p_6",
      channel: this.$store.state.client.channel || "tester",
      transcode: this.$store.state.client.transcode || "interop",
      attendeeMode: this.$store.state.client.attendeeMode || "video",
      baseMode: this.$store.state.client.baseMode || "avc",
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
    if (this.$route.params.bu === "hjh") {
      this.style = "hjh";
      this.themeColor = "#1D6EBF";
    } else if (this.$route.params.bu === "apc") {
      this.style = "apc";
      this.themeColor = "#0066B4";
    } else if (this.$route.params.bu === "akw") {
      this.style = "akw";
      this.themeColor = "#63C7C9";
    } else if (this.$route.params.bu === "adc") {
      this.style = "adc";
      this.themeColor = "#23692B";
    }
  }
};
</script>

<style scoped lang="scss">
.meeting.wrapper {
  background: rgb(12, 43, 64);
  height: 100%;
  width: 65%;
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
