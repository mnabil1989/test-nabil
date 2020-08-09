<template>
  <div v-swiper:mySwiper="swiperOption">
    <div class="swiper-wrapper">
      <div v-for="video in 4" class="swiper-slide">
        <div class="hold-video">
          <img src="../assets/images/andalusia.png" alt="akw-video" class="img-fluid" v-if="!isVideo">
          <div class="description">
            <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
              الطبية الشاملة لطفلك في أجواء
              دافئة وممتعة ومليئة بالمرح</p>
            <i class="far fa-play-circle video-icon" @click="playVideo"></i>
          </div>
          <video ref="video" width="100%" :controls="!isVideo" v-if="isVideo">
<!--            <source src="../assets/video/greek-food.mp4" type="video/mp4"/>-->
            Your browser does not support the video tag.
          </video>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    name: "SliderVideos",
    data() {
      return {
        isVideo: false,
        swiperOption: {
          slidesPerView: 4,
          spaceBetween: 30,
          centeredSlides: true,
          simulateTouch: true,
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
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
    },
    methods:{
      playVideo(){
        this.isVideo = false;
        this.$refs.video.play();
        this.$refs.video.onended = ()=> {
          console.log(this);
          this.isVideo = true;
          console.log(this.isVideo);
        };
      }
    }
  }
</script>

<style scoped lang="scss">
  .hold-video {
    position: relative;
    margin-bottom: 3rem;
    color: #fff;

    img {
      width: 100%;
      object-fit: cover;
    }

    .description {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      background-color: rgba(0, 0, 0, 0.56);
      opacity: 0;
      transition: all linear .3s;

      p {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        line-height: 2.3;
        width: 70%;
      }

      .video-icon {
        position: absolute;
        bottom: 5%;
        left: 13%;
        transform: translate(-50%, -50%);
        font-size: 2.5rem;
        cursor: pointer;
        border-radius: 50%;
        transition: all linear .3s;

        &:hover {
          box-shadow: 0 0 8px 0px #fff;

        }
      }
    }

    &:hover {
      .description {
        opacity: 1;
      }
    }
  }
</style>
