<template>
  <div v-swiper:mySwiper="swiperOption">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="hold-clinic">
          <div class="child-clinic"></div>
          <div class="container-clinic text-center">
            <h3>عيادات الطفل</h3>
            <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
              الطبية الشاملة لطفلك في أجواء
              دافئة وممتعة ومليئة بالمرح</p>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="hold-clinic">
          <div class="child-clinic"></div>
          <div class="container-clinic text-center">
            <h3>عيادات الطفل</h3>
            <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
              الطبية الشاملة لطفلك في أجواء
              دافئة وممتعة ومليئة بالمرح</p>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="hold-clinic">
          <div class="child-clinic"></div>
          <div class="container-clinic text-center">
            <h3>عيادات الطفل</h3>
            <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
              الطبية الشاملة لطفلك في أجواء
              دافئة وممتعة ومليئة بالمرح</p>
          </div>
        </div>
      </div>
    </div>
    <div class="line"></div>
    <div class="swiper-pagination swiper-pagination-bullets"></div>
    <!-- If we need navigation buttons -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</template>

<script>
  export default {
    name: "SliderClinic",
    data() {
      return {
        swiperOption: {
          loop: true,
          centeredSlides: true,
          spaceBetween: 30,
          simulateTouch: true,
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true
          },
          autoplay: {
            delay: 4000,
          },
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
          }
        }
      }
    }
  }
</script>

<style scoped lang="scss">
  @import "assets/css/variable";
  @import "assets/css/shared";
  .my-swiper {
    height: 300px;
    width: 100%;
    .swiper-slide {
      text-align: center;
      font-size: 38px;
      font-weight: 700;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
  {
    opacity: 0;
  }


  .hold-clinic {
    position: relative;
    height: 500px;
    margin-bottom: 5rem;

    .child-clinic {
      background-image: linear-gradient(to right, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("../assets/images/andalusia.png");
      background-repeat: no-repeat;
      clip-path: polygon(0% 0%, 100% 0%, 100% 45%, 0% 60%);
      background-size: contain;
      height: 100%;
    }

    .container-clinic {
      border: 1px solid #fff;
      color: #fff;
      position: absolute;
      top: 2%;
      left: 2%;
      right: 2%;
      bottom: 5%;

      h3 {
        margin-top: 12rem;
      }

      p {
        margin: 3rem;
      }
    }
  }
  .swiper-button-next{
    left: auto !important;
    right: 5% !important;
    @media (max-width: 768px) {
      right: 18% !important;
    }
  }
  .swiper-button-prev{
    left: auto !important;
    top: auto !important;
    right: 0 !important;
    outline: none;
    transform: translateX(-50%);
  }
  .line{
    @media (max-width: 768px) {
      width: 40%;
    }
  }
  .swiper-container-horizontal > .swiper-pagination-bullets.swiper-pagination-bullets-dynamic {
    @media (max-width: 768px) {
      left: 58% !important;
    }
  }

  html:lang(en){
    .swiper-button-next{
      transform: rotate(-180deg);
    }
    .swiper-button-prev{
      transform: translateX(-50%) rotate(-180deg);
    }
  }
</style>
