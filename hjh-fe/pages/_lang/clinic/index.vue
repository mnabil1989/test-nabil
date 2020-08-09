<template>
  <div class="margin-top-mobile" :dir="$i18n.locale == 'ar' ? 'rtl' : 'ltr'">
    <div class="large-card-container"></div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="title text-right">{{$t('clinics')}}</h2>
        </div>
      </div>
    </div>
    <div v-swiper:mySwiper="swiperOption">
      <div class="swiper-wrapper">
        <div v-for="(item, index) in pageNumb" :key="index" class="swiper-slide">
          <div  v-for="(clinic, index) in clinics(index + 1)" :key="index"
               :class="{'ar-clinic-container': $i18n.locale == 'ar', arab: getEvenEng(index), eng: getOddEng(index)}">
            <div class="container my-4">
              <div class="row">
                <div class="col-lg-6 col-12">
                  <div class="clinic-box">
                    <nuxt-link :to="localePath(`/clinic/${clinic.slug}`)">
                      <div class="clinic-title">{{ clinic.name }}</div>
                    </nuxt-link>
                    <div class="clinic-text">{{ clinic.small_description | cutLongString }}</div>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <nuxt-link :to="localePath(`/clinic/${clinic.slug}`)">
                    <div class="cardic-box" :style="{ backgroundImage: `url(${clinic.photo})` }"></div>
                  </nuxt-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="navigation-container mb-5">
      <div class="hr-divider"></div>
      <div class="pagination-dots">
        <div class="dot" id="result0" @click="mySwiper.slideTo(0)"></div>
        <div
          class="dot"
          v-for="(item, index) in pageNumb > 0 ? pageNumb - 1 : pageNumb"
          :key="index"
          :id="`result${index + 1}`"
          @click="mySwiper.slideTo(index + 1)"
        ></div>
      </div>
      <div class="navigation-btns">
        <div @click="mySwiper.slidePrev()" class="navigation-btn">
          <i class="fa fa-angle-left"></i>
        </div>
        <div @click="mySwiper.slideNext()" class="navigation-btn swiper-slide-next">
          <i class="fa fa-angle-right"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import LargeCardImg from "@/components/Doctors/LargeCardImg";
  import {mapGetters, mapActions} from "vuex";
  import axios from "axios";
  export default {
    components: {
      LargeCardImg
    },
    head(){
      return{
        title: `${this.clinicsMeta.meta_title}`,
        meta:[
          {hid:'description',name:'description',content:`${this.clinicsMeta.meta_description}`},
          {hid:'keywords',name:'keywords',content:`${this.clinicsMeta.meta_keywords}`},
          {hid:'og:description',property:`og:description`,content: `${this.OpenGraph.open_graph_description}`},
          {hid:'og:image',property:`og:image`,content: `${this.OpenGraph.open_graph_image}`},
          {hid:'og:title',property:`og:title`,content: `${this.OpenGraph.open_graph_title}`},
          {hid:'twitter:description',name:`twitter:description`,content: `${this.twitter_card.twitter_card_description}`},
          {hid:'twitter:image',name:`twitter:image`,content: `${this.twitter_card.twitter_card_image}`},
          {hid:'twitter:title',name:`twitter:title`,content: `${this.twitter_card.twitter_card_title}`}
        ],
        link: [
          {
            rel: "canonical",
            href:  this.baseUrl
          }
        ]
      }
    },
    created() {
      console.log(this.OpenGraph)
      if(process.browser){
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    async fetch({store , app}){
      await store.dispatch('clinics/setclinics',app.i18n.locale)
    },
    mounted() {
      var currentPage = document.getElementById(
        `result${this.mySwiper.realIndex}`
      );
      if (currentPage) {
        document
          .getElementById(`result${this.mySwiper.realIndex}`)
          .classList.add("dot-active");
      }
    },
    computed: {
      ...mapGetters({
        clinics: "clinics/getclinics",
        OpenGraph: "clinics/getOpenGraphClinics",
        twitter_card: "clinics/getTwitterClinics",
        clinicsMeta: "clinics/getClinicsMeta",
        pageNumb: "clinics/getPageNumber"
      })
    },
    filters: {
      cutLongString(value) {
        if (value.length > 400) {
          return value.substr(0, 285) + '...'
        } else {
          return value;
        }
      }
    },
    methods: {
      getEvenEng(index) {
        if (this.$i18n.locale == "ar") {
          return index % 2 == 0;
        }
        return index % 2 != 0;
      },
      ...mapActions({setClinics: "clinics/setclinics"}),

      getOddEng(index) {
        if (this.$i18n.locale == "ar") {
          return index % 2 != 0;
        }
        return index % 2 == 0;
      }
    },
    data: function () {
      return {
        baseUrl:'',
        title: this.$t("clinics"),
        swiperOption: {
          loop: true,
          slidesPerView: "auto",
          initialSlide: 0,
          centeredSlides: true,
          on: {
            slideChange: () => {
              let curractive = document.getElementsByClassName("dot-active")[0];
              if (curractive) curractive.classList.remove("dot-active");
              let newactive = document.getElementById(
                "result" + this.mySwiper.realIndex
              );
              if (newactive) newactive.classList.add("dot-active");
            },
            tap() {
              console.log("onTap", this);
            }
          }
        }
      };
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
    background-size: cover;
  }

  .title {
    color: #1d4590;
    position: relative;

    &:after {
      position: absolute;
      content: "";
      display: block;
      width: 9%;
      margin: 1rem 0;
      height: 4px;
      border-radius: .25rem;
      background-color: #ffc77a;
      @media (max-width: 768px) {
        width: 35%;
      }
    }
  }

  .clinic-container {
    display: grid;
    margin: 0 10vw;
    grid-column-gap: 2vw;
    grid-template-rows: 25vw;
    grid-template-columns: 1fr 1fr;
    margin-bottom: 3%;
  }

  .ar-clinic-container {
    text-align: right;
  }

  /* ***************************************************** */
  /* clinic-AREA */
  /* ***************************************************** */

  .clinic-box {
    background: #fbeedd;
    min-height: 400px;
    padding: 2rem;
    a{
      text-decoration: none;
    }
  }

  .clinic-title {
    color: #1d4590;
    font-size: 150%;
    font-weight: 500;
  }

  .ar-clinic-title {
    text-align: right;
  }

  .clinic-text {
    color: #1d4590;
    text-align: right;
    font-size: 18px;
    width: 100%;
    padding: 2rem 0;
    line-height: 2;
  }

  /* ***************************************************** */
  /* CARDIC-BOX */
  /* ***************************************************** */
  .cardic-box {
    position: relative;
    background: url("../../../assets/img/IMGL1667-Edit.png") no-repeat;
    background-position: 100% 100%;
    background-size: cover;
    min-height: 400px;
    @media (max-width: 768px) {
      background-position: 50% 100%;
    }
  }

  /************************************************************************************ */
  /* PAGINATION */
  /************************************************************************************ */
  .navigation-container {
    display: flex;
    width: 82%;
    margin: 0 auto;
    direction: ltr;
    justify-content: space-around;
    align-items: center;
  }

  .hr-divider {
    flex: 8;
    height: 3px;
    border-radius: 50px;
    background: #ffc77a;
  }

  .pagination-dots {
    flex: 1;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }

  .dot {
    cursor: pointer;
    height: 5px;
    width: 5px;
    border-radius: 50%;
    background-color: #427be5;
    transition: 0.2s;
  }

  .dot-active {
    background: #1d4590;
  }

  .navigation-btns {
    flex: 1;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }

  .navigation-btn {
    cursor: pointer;
    display: flex;
    width: 2.8vw;
    height: 2.8vw;
    border-radius: 50%;
    justify-content: center;
    align-items: center;
    border: 1px solid #ffc77a;
    color: #1d4590;
    font-size: 150%;
  }

  /* ************************************************ */
  /* RESPONSIVE */
  /* ************************************************ */
  @media only screen and (max-width: 450px) {
    .pagination-dots {
      flex: 2;
    }
    .navigation-btns {
      flex: 2;
    }
  }

  @media screen and (max-width: 500px) {
    .clinic-container {
      grid-template-columns: 1fr;
      grid-template-rows: auto 25vw;
      font-size: 8px;
    }
  }
</style>
