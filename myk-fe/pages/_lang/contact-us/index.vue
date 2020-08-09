<template>
  <div class="contact-page">
    <div class="container">
      <div class="row">
        <Closing></Closing>
        <div class="col-12 d-flex justify-content-center align-items-center">
          <div class="row">
            <HeadingPage :heading="$t('information')" :sub-title="$t('our whereabouts')" class="d-none"></HeadingPage>
            <div class="col-12">
              <p class="paragraph text-center">
                {{siteType === 'bistro'? home.restaurants_site_settings.site_setting_bistro.location_brief : home.restaurants_site_settings.site_setting_Kids.location_brief }}
              </p>
            </div>
            <div class="col-12">
              <div class="social-contact">
                <ul class="row">
                  <li class="col-md-6 col-12" v-if="siteType==='bistro'">
                    <i class="fas fa-map-marker-alt"></i>
                    <a class="text-capitalize email-to" href="https://www.google.com.eg/maps/place/Mykonos+Restaurant+%D9%85%D8%B7%D8%B9%D9%85+%D9%85%D9%8A%D9%83%D9%88%D9%86%D9%88%D8%B3+%D8%A7%D9%84%D9%8A%D9%88%D9%86%D8%A7%D9%86%D9%8A%E2%80%AD/@21.5966176,39.1565847,15z/data=!4m5!3m4!1s0x0:0x88c1984e53b9c8f8!8m2!3d21.5966176!4d39.1565847?hl=ar">{{$t('Mykonos Restaurant')}}</a></li>
                  <li class="col-md-6 col-12" v-if="siteType==='kids'">
                    <i class="fas fa-map-marker-alt"></i>
                    <a class="text-capitalize email-to" href="https://www.google.com.eg/maps/place/Mykonos+Kids+Restaurant+%D9%85%D8%B7%D8%B9%D9%85+%D9%85%D9%8A%D9%83%D9%88%D9%86%D9%88%D8%B3+%D9%84%D9%84%D8%A7%D8%B7%D9%81%D8%A7%D9%84+%2F+%D9%85%D8%B7%D8%B9%D9%85+%D9%8A%D9%88%D9%86%D8%A7%D9%86%D9%89%E2%80%AD/@21.5833836,39.1740934,17z/data=!3m1!4b1!4m5!3m4!1s0x15c3d1bcd8e21d47:0xaeeb9868d27e8fb9!8m2!3d21.5833786!4d39.1719047?hl=ar">{{siteType === 'bistro'?$t('Mykonos Restaurant'):$t('Mykonos kids Restaurant')}}</a></li>
                  <li class="col-md-6 col-12"><i class="fas fa-mobile-alt"></i><a :href="siteType === 'bistro'?`tel:${home.restaurants_site_settings.site_setting_bistro.phone}`:`tel:${home.restaurants_site_settings.site_setting_Kids.phone}`" class="text-capitalize phone">{{siteType === 'bistro' ? home.restaurants_site_settings.site_setting_bistro.phone : home.restaurants_site_settings.site_setting_Kids.phone}}</a></li>
                  <li class="col-md-6 col-12"><i class="fas fa-envelope"></i><a class="text-capitalize">info@vageband.ni</a></li>
                  <li class="col-md-6 col-12"><i class="fas fa-share-alt"></i><a class="text-capitalize">facebook/vagebond</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Closing from "@/components/Closing";
  import HeadingPage from "@/components/HeadingPage";
  import {mapGetters} from "vuex"

  export default {
    name: "index",
    components: {HeadingPage, Closing},
    layout: "main-layout",
    data() {
      return {
      }
    },
    async asyncData(context) {
      let homeResponse = await context.$axios.get(`/api/home?lang=${context.app.i18n.locale}`);
      return {
        home: homeResponse.data.home,
      }
    },
    computed: {
      ...mapGetters(['siteType'])
    },
    methods: {},
    mounted() {
      window.scrollTo({top: 0, behavior: 'smooth'});
    }
  }
</script>

<style lang="scss" scoped>
  $main-color: #bb8f32;
  $opacity-color: rgba(0, 97, 159, 0.25);
  $main-font: 'Poppins';

  .contact-page {
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("../../../assets/images/contact.png");
    background-size: cover;
    background-position: 50% 0;
    padding-top: 7rem;
  }


  .paragraph {
    font-weight: lighter;
    width: 75%;
    margin: 2rem auto;
    font-size: 1.1rem;
    color: #fff;
    line-height: 3.4;
    @media (max-width: 992px) {
      width: 90%;
      line-height: 2;
    }
  }

  .social-contact {
    ul {
      list-style: none;
      padding: 0;
      margin: 0 auto;
      width: 90%;
      @media (max-width: 992px) {
        width: 80%;
      }
      li {
        font-weight: lighter;
        position: relative;
        font-size: 1.5rem;
        margin: 2rem 0;
        @media (max-width: 992px) {
          font-size: 1rem;
        }
        i {
          color: $main-color;
          position: absolute;
          left: 15%;
          top: 50%;
          transform: translate(-50%, -50%);
          @media (max-width: 545px) {
            left: 6%;
          }
        }

        a {
          display: block;
          text-align: center;
          margin-left: 3rem;
          font-size: 18px;
          text-decoration: none;
          transition: all ease-in-out .3s;
          &:hover{
            color: $main-color;
          }
          @media (max-width: 992px) {
            margin-left: auto;
            text-align: center;
          }
        }

        color: #fff;
      }
    }
  }

  table {
    width: 35%;
    margin: 0 auto;
    margin-bottom: 3rem;

    tr {
      margin: 1.5rem 0;

      td {
        padding: 1rem 0;
        text-align: left;
        font-size: 1.2rem;
        @media (max-width: 992px) {
          text-align: center;
        }
      }
    }

    .day {
      color: $main-color;
      text-transform: capitalize;
    }

    .time {
      color: #fff;
    }

    @media (max-width: 992px) {
      width: 80%;
    }
  }

  .email {
    margin-bottom: .5rem !important;
  }

  .phone {
    direction: ltr;
    font-family: 'Poppins';
    margin-bottom: 0 !important;
  }
  .email-to{
    font-family: 'Poppins';
  }
</style>
