<template>
  <div class="margin-top-mobile">
    <div class="large-card-container" :style="{'background': `url(${event.image})`}">
<!--      <LargeCardImg :url="imgUrl" :title="title"/>-->
    </div>
    <div class="event-container ml-auto mr-auto">
      <div class="event-desc">
        <div v-html="event.description"></div>
      </div>

      <div class="event-footer space-between eng">
        <div class="date-time-container arab">
          <div class="icon-text">
            <p>
              {{ new Date(event.start).getFullYear() }}
              <i class="far fa-calendar"></i>
            </p>
          </div>
          <div class="icon-text">
            <p>
              {{
              `${new Date(event.start).getHours()}:${new Date(
              event.start
              ).getMinutes()}`
              }}
              <i
                dir="rtl"
                class="far fa-clock"
              ></i>
            </p>
          </div>
        </div>
        <div class="btns-box eng">
          <i class="fa fa-map-marker-alt" @click="openGoogleMaps()"></i>
          <i @click="getNotified()" class="fa fa-bell d-none"></i>
          <i @click="like()" class="fa fa-heart-o d-none"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import LargeCardImg from "@/components/Doctors/LargeCardImg";
  import {mapMutations} from "vuex";

  export default {
    components: {
      LargeCardImg
    },
    head() {
      return {
        title: `${this.event.slug}`,
        meta:[
          {hid:'description',name:'description',content:`${this.event.meta_description}`},
          {hid:'keywords',name:'keywords',content:`${this.event.meta_keywords}`}
        ],
        link: [
          {
            rel: "canonical",
            href: this.baseUrl
          }
        ]
      }
    },
    created() {
      if (process.browser) {
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    data: function () {
      return {
        baseUrl: '',
        imgUrl:
          "https://cdn2.atlantamagazine.com/wp-content/uploads/sites/4/2019/06/0719_TopDoctors2019MichaelQuinones_BenRollins_oneuseonly.jpg"
      };
    },
    async asyncData({params, $axios, $i18n, app}) {
      console.log(params);
      var res = await $axios.$get(
        `/api/event/${params.slug}?lang=${app.i18n.locale}`
      );
      return {event: res["event"]};
    },
    methods: {
      checkLogging() {
        if (!this.$auth.loggedIn) {
          this.currPageChanged(true);
          this.$router.push(this.localePath("/auth/login"));
          return false;
        }
        return true;
      },
      getNotified() {
        if (this.checkLogging()) {
        }
      },
      like() {
        if (this.checkLogging()) {
        }
      },
      openGoogleMaps() {
        window.open(
          `http://maps.google.com/?q=${this.event.map_y},${this.event.map_x}`
        );
      },
      ...mapMutations({currPageChanged: "authObj/changeCurrentPath"})
    }
  };
</script>

<style scoped lang="scss">
  .large-card-container {
    width: 100%;
    height: 500px;
    background: url("https://cdn2.atlantamagazine.com/wp-content/uploads/sites/4/2019/06/0719_TopDoctors2019MichaelQuinones_BenRollins_oneuseonly.jpg");
    clip-path: polygon(0 0, 100% 0%, 100% 65%, 0 90%);
    background-position: 100%;
    background-size: cover !important;
    background-repeat: no-repeat !important;
  }
  .event-container {
    margin-bottom: 12.39%;
    position: relative;
    width: 79vw;
    min-height: 40.5vw;
    border-radius: 20px;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.16);
    background-color: #fceedc;
    @media (max-width: 768px) {
      width: 95%;
      margin:  0 auto;
      min-height: 100%;
    }
  }

  .event-desc {
    padding-top: 10%;
    width: 80%;
    margin: 0 auto;
    font-size: 220%;
    letter-spacing: normal;
    text-align: center;
    color: #1d4590;
    @media (max-width: 992px) {
      width: 100%;
      font-size: 110%;
      padding: 10% 0;
    }
  }

  .date-time-container {
    display: flex;
    @media (max-width: 992px) {
      font-size: .6rem;
      margin: 1rem 0;
    }
  }

  .icon-text {
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    font-size: 158%;
  }

  .icon-text p {
    padding: 0;
    margin: 0;
    line-height: 1;
    font-size: 150%;
    color: #1d4590;
    line-height: 1.2;
    margin-right: 1vw;
    margin-left: 0.7vw;
  }

  .icon-text p i {
    color: #1d4590;
    font-weight: 300;
  }

  .event-footer {
    position: absolute;
    width: 100%;
    padding: 0 5%;
    /* background: red; */
    bottom: 8%;
    @media (max-width: 768px) {
      position: relative;
    }
  }

  .btns-box {
    flex-basis: 20%;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    font-size: 180%;
    color: #1d4590;
  }

  .btns-box i {
    transition: 0.3s;
  }

  .btns-box i:hover {
    cursor: pointer;
    color: #1d4590ad;
  }
</style>
