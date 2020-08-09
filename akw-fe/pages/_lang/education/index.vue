<template>
  <div class="eduction">
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
        <div class="col-12 d-flex justify-content-center align-items-center">
          <h1 class="heading-program">{{$t('Child and family articles')}}</h1>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center">
          <p class="paragraph-program">{{$t('edu-p')}}</p>
        </div>
      </div>
    </div>
    <FirstInfo></FirstInfo>
    <SecondInfo></SecondInfo>
    <ThirdInfo></ThirdInfo>
    <ForthInfo></ForthInfo>
    <FifthInfo></FifthInfo>
  </div>
</template>
<script>
  import FirstInfo from "../../../components/FirstInfo";
  import SecondInfo from "../../../components/SecondInfo";
  import ThirdInfo from "../../../components/ThirdInfo";
  import ForthInfo from "../../../components/ForthInfo";
  import FifthInfo from "../../../components/FifthInfo";
  export default {
    name: "index",
    components: {FirstInfo,SecondInfo,ThirdInfo,ForthInfo,FifthInfo},
    layout: 'main-layout',
    data() {
      return {
        swiperOptionFirstInfo: {
          slidesPerView: 4,
          spaceBetween: 60,
          centeredSlides: true,
          navigation: {
            nextEl: '.first-next',
            prevEl: '.first-prev',
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
  @import "assets/css/shared";
  .eduction{
    background: linear-gradient(to right, $backgroundColor, $backgroundColor), url("../../../assets/images/p-top.png");
    background-position: 152% 2%;
    background-repeat: no-repeat;
    padding-bottom: 5rem;
    @media (max-width: 1080px) {
      padding-top: 4rem;
    }
  }
  .heading-program{
    text-transform: capitalize;
  }
</style>
