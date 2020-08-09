<template>
  <div v-swiper:mySwiper="swiperOption" class="services">
    <div class="swiper-wrapper">
      <div v-for="(service,index) in 4" class="swiper-slide">
        <div class="hold-service">
          <img src="../assets/images/andalusia.png" alt="akw-video" class="img-fluid" v-if="!isVideo">
          <div class="description">
            <form class="input-club">
              <input type="checkbox" :id="service+index" name="fruit-1" :value="'Apple'+index" disabled>
              <label :for="service+index"></label>
            </form>
            <div class="detail">
              <h4>النادي الصيفي</h4>
              <p>لاكتشاف مواهب الأطفال وتنميتها</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Services",
    data() {
      return {
        isVideo: false,
        swiperOption: {
          loop: true,
          centeredSlides: true,
          slidesPerView: 4,
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
              slidesPerView: 2,
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
    },
  }
</script>

<style scoped lang="scss">
  @import "assets/css/variable";
  @import "assets/css/shared";
  .services {
    .hold-service {
      position: relative;
      margin-bottom: 3rem;
      color: #fff;
      border-top: 2px solid $mainColor;
      padding-top: 2rem;
      width: 95%;
      img {
        width: 100%;
        object-fit: cover;
      }

      .description {
        text-align: right;

        .detail {
          display: inline-block;
        }
      }

      &:hover {
        .description {
          opacity: 1;
        }
      }
      @media (max-width: 545px) {
        margin-bottom: 0;
      }
    }
  }
  html:lang(en){
    .services {
      .hold-service {
        .description {
          text-align: left;
        }
      }
    }
  }
</style>
