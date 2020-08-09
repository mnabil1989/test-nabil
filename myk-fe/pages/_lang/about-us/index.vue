<template>
  <div class="contact-page">
    <div class="container">
      <div class="row">
        <Closing></Closing>
        <div class="col-12 d-flex justify-content-center align-items-center">
          <div class="row">
            <HeadingPage :heading="$t('information')" :sub-title="$t('our whereabouts')" class="d-none"></HeadingPage>
            <div class="col-12">
              <div class="row">
                <h4 class="col-12 text-center heading-doing">{{$t('What we do')}}</h4>
                <span class="col-12 text-center sub-heading">{{$t('Our little story')}}</span>
                <p class="paragraph text-center">
                  {{siteType === 'bistro'? home.restaurants_site_settings.site_setting_bistro.about_us :  home.restaurants_site_settings.site_setting_Kids.about_us}}
                </p>
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
  .heading-doing{
    font-size:3rem;
    color: #fff;
    @media (max-width: 992px) {
      font-size:2rem;
    }
  }
  .sub-heading{
    font-size:6rem;
    color: #fff;
    @media (max-width: 992px) {
      font-size:3rem;
    }
  }

</style>
