<template>
  <div class="home">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 px-0">
          <div class="intro">
            <img src="@/assets/images/home.png" alt="home" class="img-fluid home-pic">
            <transition name="slide-fade">
              <div v-if="showBrief" @click="showBrief = false" class="brief">
                <h1>{{$t('workspace')}}</h1>
                <p>{{$t('workspace-paragraph')}}</p>
              </div>
            </transition>
            <img src="@/assets/images/arrow-top.png" class="arrow-top" v-if="!showBrief" @click="showBrief = true">
          </div>
        </div>
        <div class="col-12">
          <div class="clinic">
            <h2 class="text-center heading-clinic">{{$t('andalusia clinics')}}</h2>
            <p class="text-center">{{$t('andalusia clinics-paragraph')}}</p>
            <div class="row bg-about-clinic">
              <div class="col-md-7 col-12">
                <div class="more text-center">
                  <nuxt-link to="dd">{{$t('more')}}</nuxt-link>
                  <div class="squire"></div>
                  <div class="squire"></div>
                  <div class="squire"></div>
                </div>
              </div>
              <div class="col-md-5 col-12">
                <div class="about">
                  <img src="@/assets/images/about.png" alt="about" class="img-fluid">
                </div>
              </div>
              <div class="col-12">
                <SliderClinic></SliderClinic>
              </div>
            </div>
          </div>
        </div>
        <!--        النادي الصيفي-->
        <div class="col-12">
          <div class="line-more">
            <nuxt-link to="d" class="more">{{$t('more')}}</nuxt-link>
          </div>
          <div class="dental">
            <div class="row row-mobile">
              <div class="col-md-6 col-12">
                <h3>{{$t('the teeth')}}</h3>
                <p>{{$t('dental-paragraph')}}</p>
              </div>
              <div class="col-md-5 col-12">
                <img src="@/assets/images/ellie-real.png" alt="ellie-real" class="img-fluid ">
              </div>
              <div class="offset-lg-1"></div>
            </div>
          </div>
          <div class="line-more">
            <nuxt-link to="d" class="more">{{$t('more')}}</nuxt-link>
          </div>
        </div>
        <div class="col-12">
          <SliderVideos></SliderVideos>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import SliderClinic from "@/components/SliderClinic";
  import SliderVideos from "@/components/SliderVideos";
  import Events from "@/components/Events";

  export default {
    name: "index",
    components: {SliderVideos, SliderClinic,Events},
    layout: "main-layout",
    data() {
      return {
        showBrief: false,

      }
    }
  }
</script>

<style scoped lang="scss">
  @import "assets/css/variable";
  @import "assets/css/mixin";
  @import "assets/css/shared";

  .home {
    background: linear-gradient(to right, $backgroundColor, $backgroundColor), url("../../../assets/images/p-top.png");
    background-position: 152% 2%;
    background-repeat: no-repeat;
    padding-bottom: 7rem;
    .home-pic {
      height: 90vh;
      object-fit: cover;
      object-position: center;
    }

    .intro {
      position: relative;
      overflow: hidden;
      .arrow-top {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translate(-50%, -50%);
        height: 32px;
        -webkit-box-shadow: 0px 20px 12px -13px rgba(0, 0, 0, 0.42);
        -moz-box-shadow: 0px 20px 12px -13px rgba(0, 0, 0, 0.42);
        box-shadow: 0px 20px 12px -13px rgba(0, 0, 0, 0.42);
        cursor: pointer;
      }

      .brief {
        text-align: right;
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background: rgba(0, 0, 0, .5);
        padding: 6rem 2rem 0 2rem;
        color: #fff;
        @media (max-width: 600px) {
          padding: 2rem 1rem 0 1rem;
        }
        h1 {
          margin: 2rem 0;
          @media (max-width: 600px) {
            text-align: center;
          }
        }
        p {
          width: 63%;
          line-height: 2.4;
          margin-left: auto;
          font-size: 1.5rem;
          @media (max-width: 600px) {
            width: 100%;
            font-size: 1.2rem;
          }
        }
      }
    }

    .heading-clinic {
      margin: 4rem 0;
      font-size: 3rem;
      text-transform: capitalize;
      @media (max-width: 768px) {
        margin: 2rem 0;
        font-size: 2rem;
      }
    }

    .clinic {
      color: $mainColor;
      p {
        width: 80%;
        margin: 0 auto;
        font-size: 1.3rem;
        line-height: 2;
        @media (max-width: 768px) {
          width: 100%;
          font-size: 1rem;
          line-height: 1.8;
        }
      }

      .about {
        img {
          height: 550px;
        }
        @media (max-width: 768px) {
          display: none;
        }
      }

      .more {
        background: url("../../../assets/images/more.png");
        width: 132px;
        height: 90px;
        background-size: cover;
        background-position: center;
        margin-top: 7rem;
        position: relative;
        margin-right: auto;
        a {
          color: #F5F5F5;
          text-decoration: none;
        }

        .squire {
          width: 20px;
          height: 20px;
          border: 1px solid rgba(199, 86, 161, 0.4);
          transform: translateX(-45%) rotate(45deg);
          position: absolute;
          bottom: -25%;
          left: 50%;

          &:nth-of-type(2) {
            bottom: -45%;
            border: 1px solid $mainColor;
          }

          &:last-of-type {
            bottom: -70%;
            border: 1px solid $mainColor;
          }
        }

        @include flex_center;
        color: #fff;
        font-size: 1.3rem;
        @media (max-width: 768px) {
          margin: 3rem auto;
          margin-top: 0;
        }
      }

      .bg-about-clinic {
        background: url("../../../assets/images/p-top.png");
        background-position: -95% 22%;
        background-repeat: no-repeat;
      }
    }


    .line-more {
      text-align: right;
      padding-right: 8rem;
      position: relative;
      margin: 3rem 0;

      .more {
        font-size: 1.2rem;
        color: #fff;
        text-decoration: none;

        &:before {
          content: "";
          width: 70%;
          background-color: #fff;
          display: block;
          height: 4px;
          border-radius: 4px;
          position: absolute;
          left: 8%;
          top: 50%;
        }
      }
      @media (max-width: 768px) {
        padding-right: 0;
      }
    }

    .dental {
      background: linear-gradient(to right, $backgroundColor, $backgroundColor), url("../../../assets/images/p-top.png");
      background-position: 152% 2%;
      background-repeat: no-repeat;
      color: #fff;
      h3 {
        text-align: right;
        width: 75%;
        margin-right: auto;
        @media (max-width: 768px) {
          text-align: center;
          width: 100%;
          margin: 1rem 0;
        }
      }
      p {
        width: 75%;
        padding: 1.4rem;
        background: #000;
        opacity: 0.25;
        border-top-right-radius: 40px;
        margin: 6rem 0;
        margin-right: auto;
        line-height: 2;
        font-size: 1.1rem;
        @media (max-width: 768px) {
          width: 100%;
          margin: 0 0 1rem 0;
        }
      }
    }
  }
html:lang(en){
  .brief{
    h1{
      text-align: left;
    }
    p{
      text-align: left;
      margin-right: auto;
      margin-left: 0 !important;
    }
  }
  .clinic{
    .about{
      img{
        transform: scaleX(-1);
      }
    }
    .more{
      margin-right: 0 !important;
      margin-left: auto;
      text-transform: capitalize;
    }
  }
  .line-more {
    text-align: left;
    padding-right: 0;
    padding-left: 8rem;
    .more {
      text-transform: capitalize;
      &:before {
        left: auto;
        right: 8%;
      }
    }
    @media (max-width: 768px) {
      padding-left: 0;
    }
  }
  .dental{
    h3{
      text-align: left;
      margin-right: 0;
      margin-left: auto;
      text-transform: capitalize;
    }
    img{
      transform: scaleX(-1);
    }
    p {

      border-top-right-radius: 0;
      border-top-left-radius: 40px;
      margin: 6rem 0;
      margin-left: auto;
      margin-right: 0;
      line-height: 2;
      font-size: 1.1rem;
      @media (max-width: 768px) {
        width: 100%;
        margin: 0 0 1rem 0;
      }
    }
  }
}

</style>
