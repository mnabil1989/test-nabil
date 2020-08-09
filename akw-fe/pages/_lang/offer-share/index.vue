<template>
  <div class="offers">
    <div class="container">
      <div class="row">
        <div class="col-6 d-flex justify-content-center align-items-center">
          <img src="@/assets/images/ellie-real.png" alt="mother" class="ellie-real-offer-img">
        </div>
        <div class="col-6">
          <img src="@/assets/images/mother.png" alt="mother" class="mother-img">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="program-section-intro offer-share-intro">
            <h2>{{$t('offers')}}</h2>
          </div>
        </div>
      </div>
    </div>
    <div v-swiper:mySwiper="swiperOptionOffer">
      <div class="swiper-wrapper">
        <div v-for="offer in 4" class="swiper-slide">
          <div class="hold-offer">
            <img src="@/assets/images/andalusia.png" alt="akw-video" class="img-fluid offer-image">
            <div class="description">
              <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
                الطبية الشاملة لطفلك في أجواء
                دافئة وممتعة ومليئة بالمرح</p>
            </div>
          </div>
        </div>
      </div>
      <div class="line"></div>
      <div class="swiper-pagination swiper-pagination-bullets"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <div class="container">
      <div class="col-12">
        <div class="session-intro">
          <h2>{{$t('Educational lectures')}}</h2>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="summer-club col-12">
          <div class="row">
            <div class="summer-club-img col-md-4 col-12">
              <div class="line-up"></div>
              <div class="line-side"></div>
              <img src="@/assets/images/andalusia.png" alt="summer-club" class="img-fluid">
            </div>
            <div class="summer-club-info col-md-8 col-12">
              <form class="input-club">
                <input type="checkbox"  name="fruit-1"  disabled>
                <label></label>
              </form>
              <div class="detail">
                <h4>{{$t('summer-club')}}</h4>
                <p>{{$t('discover')}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container alternate">
      <div class="row">
        <div class="summer-club col-12">
          <div class="row row-mobile">
            <div class="summer-club-info col-md-8 col-12">
              <div class="detail">
                <h4>{{$t('summer-club')}}</h4>
                <p>{{$t('discover')}}</p>
              </div>
              <form class="input-club">
                <input type="checkbox"  name="fruit-1"  disabled>
                <label></label>
              </form>
            </div>
            <div class="summer-club-img col-md-4 col-12">
              <div class="line-up"></div>
              <div class="line-side"></div>
              <img src="@/assets/images/andalusia.png" alt="summer-club" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="summer-club col-12">
          <div class="row">
            <div class="summer-club-img col-md-4 col-12">
              <div class="line-up"></div>
              <div class="line-side"></div>
              <img src="@/assets/images/andalusia.png" alt="summer-club" class="img-fluid">
            </div>
            <div class="summer-club-info col-md-8 col-12">
              <form class="input-club">
                <input type="checkbox"  name="fruit-1"  disabled>
                <label></label>
              </form>
              <div class="detail">
                <h4>{{$t('summer-club')}}</h4>
                <p>{{$t('discover')}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container alternate">
      <div class="row">
        <div class="summer-club col-12">
          <div class="row row-mobile">
            <div class="summer-club-info col-md-8 col-12">
              <div class="detail">
                <h4>{{$t('summer-club')}}</h4>
                <p>{{$t('discover')}}</p>
              </div>
              <form class="input-club">
                <input type="checkbox"  name="fruit-1"  disabled>
                <label></label>
              </form>
            </div>
            <div class="summer-club-img col-md-4 col-12">
              <div class="line-up"></div>
              <div class="line-side"></div>
              <img src="@/assets/images/andalusia.png" alt="summer-club" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "index",
    layout: 'main-layout',
    data() {
      return {
        swiperOptionOffer: {
          slidesPerView: 4,
          spaceBetween: 60,
          centeredSlides: true,
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
              spaceBetween: 40
            },
            445: {
              slidesPerView: 2,
              spaceBetween: 10
            },
            // when window width is >= 480px
            768: {
              slidesPerView: 2,
              spaceBetween: 10
            },
            // when window width is >= 640px
            992: {
              slidesPerView: 4,
              spaceBetween: 50
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
  @import "assets/css/shared";

  .offers {
    background: linear-gradient(to right, $backgroundColor, $backgroundColor), url("../../../assets/images/p-top.png");
    background-position: 152% 2%;
    background-repeat: no-repeat;
    padding-bottom: 5rem;
    @media (max-width: 1080px) {
      padding-top: 4rem;
    }
  }
  .paragraph-program {
    text-align: center;
    width: 100%;
    margin: 2rem auto;
    font-size: 1.7rem;
    line-height: 1.8;
    color: #fff;
  }

  .offer-share-intro {
    h2 {
      &:after {
        content: "";
        width: 80%;
        height: 4px;
        border-radius: 5px;
        position: absolute;
        top: 50%;
        left: 0;
        background-color: #fff;
        display: block !important;
        @media (max-width: 992px) {
          display: none !important;
        }
      }
    }
  }
  .session-intro {
    text-align: right;
    position: relative;
    padding-right: 3rem;
    font-weight: lighter;
    color: #fff;
    margin: 2rem 0;
    h2{
      &:before{
        content: "";
        display: block;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #fff;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translate(-50%,-50%);
      }
      &:after{
        content: "";
        width: 70%;
        height: 4px;
        border-radius: 5px;
        position: absolute;
        top: 50%;
        left: 0;
        background-color: #fff;
        @media (max-width:768px) {
          display: none;
        }
      }
      @media (max-width:768px) {
        font-size:1.5rem;
      }
    }
  }
  .swiper-container-horizontal > .swiper-pagination-bullets.swiper-pagination-bullets-dynamic{
    @media (max-width:1080px) {
      display: none;
    }
  }
  .line, .swiper-pagination, .swiper-button-next, .swiper-button-prev {
    bottom: 5% !important;
    transform: translateY(50%) !important;

  }

  .line {
    left: auto !important;
    right: 9%;
    background-color: #fff;
    @media (max-width:1080px) {
      display: none;
    }
  }

  .swiper-pagination {
    left: auto !important;
    right: 79%;
    transform: translateY(50%) !important;
    @media (max-width:1080px) {
      display: none;
    }
  }

  .swiper-button-next {
    left: 8% !important;
    @media (max-width: 992px) {
      left: 42% !important;
    }
  }
  .swiper-button-prev {
    left: 11% !important;
    @media (max-width: 1100px) {
      left: 13% !important;
    }
    @media (max-width: 992px) {
      left: 55% !important;
    }
  }

  .swiper-wrapper {
    padding-bottom: 3rem;
  }

  .hold-offer {
    border-radius: 2rem;
    overflow: hidden;
    position: relative;
    transition: all linear .4s;

    .offer-image {
      display: block;
      width: 100%;
      height: 350px;
      object-fit: cover;
    }

    .description {
      position: absolute;
      left: 0;
      bottom: 0;
      right: 0;
      top: 0;
      background-color: rgba(0, 0, 0, 0.6);
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
      height: 0;
      opacity: 0;
      margin-bottom: 3rem;
      transition: all linear .4s;

      p {
        text-align: center;
        width: 90%;
        margin: 0 auto;
        line-height: 1.5;
      }
    }

    &:hover {
      .description {
        height: 100%;
        opacity: 1;
      }
    }
  }

  html:lang(en){
    .offer-share-intro{
      text-align: left;
      h2 {
        padding-right: 0;
        padding-left: 5rem;
        &:before {
          right: auto;
          left: 1rem;
          top: 50%;
        }
        &:after {
          left: auto;
          right: 0;
        }
      }
    }
    .swiper-container-horizontal > .swiper-pagination-bullets.swiper-pagination-bullets-dynamic{
      left: 78% !important;
      right: auto;
    }
    .line{
      right: auto !important;
      left: 9% !important;
    }
    .swiper-button-next {
      left: auto !important;
      right: 8% !important;
      @media (max-width: 992px) {
        right: 42% !important;
        left: auto !important;
      }
    }
    .swiper-button-prev {
      right: 11% !important;
      left: auto !important;
      @media (max-width: 1100px) {
        right: 13% !important;
        left: auto !important;
      }
      @media (max-width: 992px) {
        right: 55% !important;
        left: auto !important;
      }
    }
    .session-intro {
      text-align: left;
      padding-right: 0;
      padding-left: 3rem;
      h2{
        &:before{
          right: auto;
          left: 0;
        }
        &:after{
          left: auto;
          right: 0;
          width: 64%;
        }
      }
    }
  }
</style>
