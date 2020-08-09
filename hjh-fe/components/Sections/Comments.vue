<template>
  <section dir="rtl">
    <div class="title-box">
      <h1 class="title">{{$t('Comments')}}</h1>
      <div class="custom-border-bottom"></div>
    </div>
    <div class="big-container">
      <div class="small-container">

        <div v-swiper:mySwiper="swiperOption">
          <div class="swiper-wrapper">
            <div class="swiper-slide" v-for="(item, index) in comments" :key="index">
              <div class="comment-item">
                <div class="top-border"></div>
                <div class="comment-content">
                  <img :src="item.image" alt="image">
                  <div class="hold-comment-info">
                    <h6>{{item.name}}</h6>
                    <p v-html="item.comment"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="pagination-container">
      <div @click="mySwiper.slidePrev()" class="pagination-item">
        <i class="fa left-arrow" :class="$i18n.locale=='ar'?'fa-chevron-right':'fa-chevron-left'"></i>
      </div>
      <div @click="mySwiper.slideNext()" class="pagination-item">
        <i class="fa right-arrow" :class="$i18n.locale=='ar'?'fa-chevron-left':'fa-chevron-right'"></i>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    props:['comments'],
    data() {
      return {
        hoverd: "",
        swiperOption: {
          loop: true,
          centeredSlides: true,
          spaceBetween: 60,
          simulateTouch: true,
          slidesPerView: 3,
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
        },
      };
    },


    methods: {
    }
  };
</script>

<style lang="scss" scoped>
  section {
    margin-bottom: 5%;
  }

  .title-box {
    width: 20%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    /* margin-top: 47px; */
    margin-top: 3vw;
    margin-bottom: 63px;
    margin-bottom: 4.7vw;
  }

  .title {
    text-align: center;
    font-size: 200%;
    font-weight: 500;
    padding: 0 !important;
    margin: 0 !important;
    margin-bottom: 1.5% !important;
    color: #1d4590;
  }

  .custom-border-bottom {
    background: #ffc77a;
    width: 40%;
    height: 1px;
  }

  .comment-body {
    width: 100%;
    transition: all ease-in-out .4s;
  }

  .comment-item {
    box-sizing: border-box;
    position: relative;
    /* height: 15vw; */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    /*width: 22%;*/
    transition: all ease-in-out 0.5s;
    .comment-content {
      height: 250px;
      width: 100%;
      position: relative;
      transition: all ease-in-out .4s;
      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all ease-in-out .4s;
      }
      .hold-comment-info {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background-color: rgba(0, 0, 0, 0.7);
        opacity: 0;
        height: 250px;
        transition: all ease-in-out .4s .4s;
      }
    }
    &:hover {

      /*height: 250px;*/
      .hold-comment-info {
        opacity: 1;
        transition: all ease-in-out .4s .4s;
      }
      .top-border {
        width: 100%;
      }
    }
  }



  .comment-content h6,
  .comment-content p {
    display: none;
  }

  .comment-content p {
    margin: 1rem auto;
    width: 90%;
    text-align: center;
    font-size: calc(30% + 1vw);
    @media (max-width: 800px) {
      font-size: calc(100% + 1vw);
    }
  }

  .comment-content h6 {
    width: 90%;
    margin: 1rem auto;
    text-align: center;
    font-size: calc(50% + 1vw);
    @media (max-width: 800px) {
      font-size: calc(140% + 1vw);
    }
  }

  .comment-content:hover h6,
  .comment-content:hover p {
    display: block;
    color: #ffffff;
  }

  /* ***************************************************** */
  /* SWIPER-AREA */
  /* ***************************************************** */
  .top-border {
    background: #ffc77a;
    width: 65%;
    height: 2px;
    border-radius: 0.5rem;
    margin: .5rem auto;
    transition: all ease-in-out .4s;
  }

  .pagination-container {
    width: 12vw;
    font-size: 150%;
    /* border: 1px solid #ffc77a; */
    color: #1d4590;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .pagination-item {
    border: 1px solid #ffc77a;
    border-radius: 50%;
    height: 5.14vw;
    width: 5.14vw;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .pagination-container {
    direction: rtl;
    margin-top: 5vw;
    margin-right: 12vw;
  }

  .pagination-container:lang(en) {
    margin-left: 12vw;
    direction: ltr;
  }

  .big-container {
    /* height: 250px; */
    height: 300px;
    overflow-x: hidden;

    position: relative;
  }

  .small-container {
    position: absolute;

    top: 0;
  }

  .swiper-container {
    width: 100vw;
  }
</style>
