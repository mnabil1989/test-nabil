<template>
  <section :dir="$i18n.locale === 'ar' ? 'rtl' : 'ltr'">
    <div class="slider-container">
      <div v-swiper:mySwiper="swiperOption">
        <div class="swiper-wrapper">
          <img v-for="(item, index) in sliders" class="swiper-slide" :key="index" :src="item.photo"  :title="item.image_title" :alt="item.image_alt"/>
        </div>
      </div>
      <div @click="mySwiper.slideNext()" class="nav-btn left">
        <i class="fa fa-arrow-left"></i>
      </div>
      <div @click="mySwiper.slidePrev()" class="nav-btn right">
        <i class="fa fa-arrow-right"></i>
      </div>
    </div>
    <div class="site-desc-container center d-col">
      <div class="title-group">
        <h1 class="title">{{$t('Hosbital-name')}}</h1>
        <div class="divider center small-divider"></div>
      </div>
      <div class="desc">{{$t('descitpion')}}</div>
    </div>
    <div class="divider last-divider"></div>
  </section>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      swiperOption: {
        slidesPerView: 1,
        initialSlide: 0,
        speed: 800,
        loop: true,
        autoplay: {
          delay: 4000,
        },
        effect:'coverflow',
        coverflowEffect: {
          rotate: 30,
          slideShadows: false,
        }
      }
    };
  },
  computed: {
    ...mapGetters({ sliders: "home/getSliders" })
  }
};
</script>

<style scoped lang="scss">
.slider-container {
  width: 80%;
  position: relative;
  margin: 0 auto;
  margin-top: 3%;
  height: 40vw;
}
.swiper-container {
  height: 100%;
}
.slider-container img {
  width: 100%;
  height: 100%;
}
.site-desc-container {
  margin-top: 4.02vw;
  color: #1d4590;
}
.title {
  font-size: 300%;
  line-height: 1.31;
  font-weight: 500;
  text-align: center;
  @media (max-width: 768px) {
    font-size: 180%;
  }
}
.title-group {
  margin-bottom: 3%;
}
.small-divider {
  margin-top: 2%;
  background: #ee9c2b !important;
}
.desc {
  width: 72%;
  line-height: 1.9;
  text-align: center;
  font-size: 180%;
}
.divider {
  opacity: 0.4;
}
.last-divider {
  margin-top: 3%;
}
.nav-btn {
  cursor: pointer;
  position: absolute;
  top: 46%;
  color: #1d4590;
  background: white;
  border: 1px solid #1d4590;
  padding: 1% 1.5%;
  z-index: 999;
  transition: 0.4s;
}
.nav-btn:hover {
  color: white;
  background: #1d4590;
}
.nav-btn.left {
  left: -2.4%;
}
.nav-btn.right {
  right: -2.4%;
}
</style>
