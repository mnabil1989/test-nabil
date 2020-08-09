<template>
  <div class="margin-top-mobile">
    <div class="large-card-container"></div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="title text-right">{{$t('doctors')}}</h2>
        </div>
      </div>
    </div>
    <div v-swiper:mySwiper="swiperOption">
      <div class="swiper-wrapper">
        <div class="main-container swiper-slide" v-for="(item, index) in pageNumb" :key="index">
          <div
            class="card-container"
            v-for="doctor in doctors(index + 1)"
            @click="goToSingleDoctor(doctor.slug)"
            :key="doctor.id"
          >
            <DoctorCard :name="doctor.title" :speciality="doctor.speciality" :url="doctor.photo"/>
          </div>
        </div>
      </div>
    </div>
    <div class="navigation-container">
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
        <div class="navigation-btn" @click="mySwiper.slidePrev()">
          <i class="fa fa-angle-left"></i>
        </div>
        <div class="navigation-btn" @click="mySwiper.slideNext()">
          <i class="fa fa-angle-right"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import LargeCardImg from "@/components/Doctors/LargeCardImg";
  import DoctorCard from "@/components/Common/DoctorImgCard";
  import {mapGetters, mapActions} from "vuex";

  export default {
    components: {
      DoctorCard,
      LargeCardImg
    },
    head(){
      return{
        title:`${this.metaDoctors.meta_title}`,
        meta:[
          {hid:'description',name:`description`,content:`${this.metaDoctors.meta_description}`},
          {hid:'keywords',name:'keywords',content:`${this.metaDoctors.meta_keywords}`},
          {hid:'og:description',property:`og:description`,content: `${this.openGraphDoctors.open_graph_description}`},
          {hid:'og:image',property:`og:image`,content: `${this.openGraphDoctors.open_graph_image}`},
          {hid:'og:title',property:`og:title`,content: `${this.openGraphDoctors.open_graph_title}`},
          {hid:'twitter:description',name:`twitter:description`,content: `${this.twitterDoctors.twitter_card_description}`},
          {hid:'twitter:image',name:`twitter:image`,content: `${this.twitterDoctors.twitter_card_image}`},
          {hid:'twitter:title',name:`twitter:title`,content: `${this.twitterDoctors.twitter_card_title}`}
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
      if(process.browser){
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    async fetch({store, app}){
      await store.dispatch('doctors/setDoctors',app.i18n.locale)
    },
    mounted() {
      setTimeout(() => {
        var currentPage = document.getElementById(
          `result${this.mySwiper.realIndex}`
        );
        if (currentPage) {
          document
            .getElementById(`result${this.mySwiper.realIndex}`)
            .classList.add("dot-active");
        }
      }, 1000);
    },

    data: function () {
      return {
        baseUrl:'',
        title: "doctors",
        swiperOption: {
          loop: true,
          slidesPerView: 1,
          loopAdditionalSlides: 2,
          initialSlide: 0,
          // centeredSlides: true,
          breakpoints: {
            // when window width is >= 320px
            320: {
              slidesPerView: 1,
              spaceBetween: 10
            },
            // when window width is >= 480px
            768: {
              slidesPerView: 1,
              spaceBetween: 10
            },
            // when window width is >= 640px
            992: {
              slidesPerView: 3,
              spaceBetween: 10
            },
            on: {
              slideChange() {
                console.log('onSlideChangeEnd', this);
              },
              tap() {
                console.log('onTap', this);
              }
            }
          },
          on: {
            slideChange: () => {
              document
                .getElementsByClassName("dot-active")[0]
                .classList.remove("dot-active");
              document
                .getElementById("result" + this.mySwiper.realIndex)
                .classList.add("dot-active");
            },
            tap() {
              console.log("onTap", this);
            }
          }
        }
      };
    },
    computed: {
      ...mapGetters({
        doctors: "doctors/getDoctors",
        metaDoctors: "doctors/getMetaDoctors",
        openGraphDoctors: "doctors/getOpenGraphDoctors",
        twitterDoctors: "doctors/getTwitterDoctors",
        pageNumb: "doctors/getPageNumber"
      })
    },
    methods: {
      removeUserFavItem(favItemID) {
        this.favItems = this.favItems.filter(item => item.id !== favItemID);
      },
      ...mapActions({setDocotrs: "doctors/setDoctors"}),
      goToSingleDoctor(slug) {
        this.$router.push({
          path: this.localePath(`/doctor/${slug}`)
        });
      }
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

  .main-container {
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: auto;
    grid-column-gap: 5%;
    margin: 5% auto 15% auto;
    @media (max-width: 768px) {
      display: block;
      height:auto;
    }
  }

  .swiper-container {
    width: 80%;
  }
  .title{
    color: #1d4590;
    position: relative;
    &:after{
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
  .navigation-container {
    direction: ltr;
    display: flex;
    width: 82%;
    margin: 0 auto;
    justify-content: space-around;
    align-items: center;
  }

  .hr-divider {
    flex: 8;
    height: 3px;
    border-radius: 50px;
    background: #ffc77a;
  }

  .card-container {
    cursor: pointer;
    margin-top: 2rem;
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
    border: 1px solid #ffc77a;
    transition: 0.2s;
  }

  .dot-active {
    background: #ffc77a;
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
    color: #ffc77a;
    font-size: 150%;
  }
</style>
