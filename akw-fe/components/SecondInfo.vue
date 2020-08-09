<template>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-8">
          <div class="program-section-intro">
            <h2>{{$t('Baby health')}}</h2>
          </div>
        </div>
        <div class="col-sm-6 col-4">
          <div class="swiper-button-next second-next"></div>
          <div class="swiper-button-prev second-prev"></div>
        </div>
      </div>
    </div>
    <div v-swiper:mySwiper="swiperOptionFirstInfo" class="col-12">
      <div class="swiper-wrapper">
        <div v-for="firstInfo in 4" class="swiper-slide">
          <div class="firstInfo">
            <img src="@/assets/images/andalusia.png" alt="akw-video" class="img-fluid offer-image">
            <div class="description">
              <div>
                <h5 class="heading-description">معلومات عامه</h5>
                <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
                  الطبية الشاملة لطفلك في أجواء
                  دافئة وممتعة ومليئة بالمرح</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- If we need navigation buttons -->

    </div>
  </div>
</template>

<script>
  export default {
    name: "SecondInfo",
    data() {
      return {
        swiperOptionFirstInfo: {
          slidesPerView: 4,
          spaceBetween: 60,
          centeredSlides: true,
          navigation: {
            nextEl: '.second-next',
            prevEl: '.second-prev',
          },
          pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true
          },
          breakpoints: {
            // when window width is >= 320px
            320: {
              slidesPerView: 1,
              spaceBetween: 10
            },
            // when window width is >= 480px
            768: {
              slidesPerView: 3,
              spaceBetween: 10
            },
            // when window width is >= 640px
            992: {
              slidesPerView: 4,
              spaceBetween: 40
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
        },
      }
    }
  }
</script>

<style scoped lang="scss">
  @import "assets/css/variable";
  @import "assets/css/shared";
  .second-next{
    @media (max-width: 1080px) {
      left: 4rem !important;
    }
  }
  html:lang(en){
    .second-next{
      left: auto !important;
      right: 0 !important;
    }
    .second-prev{
      right: 11% !important;
      left: auto !important;
      @media (max-width: 1080px) {
        right: 20% !important;
      }
      @media (max-width: 600px) {
        right: 51% !important;
      }
    }
  }
</style>
