<template>
  <div class="about">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-12 d-flex justify-content-center align-items-center">
          <h1 class="heading-about">{{$t('about us')}}</h1>
        </div>
        <div class="col-md-6 col-12">
          <img src="@/assets/images/mother.png" alt="mother" class="mother-img">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="about-section-one">
            <h2>{{$t('andalusia for medical services')}}</h2>
            <p>{{$t('medical-services')}}</p>
          </div>
        </div>
        <div>
      </div>
      </div>
    </div>
    <div class="container-fluid px-0">
      <h2 class="our-services">{{$t('Our services')}}</h2>
      <Services></Services>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="about-section-two">
            <h2>{{$t('child-center')}}</h2>
            <p>{{$t('child-center-p')}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Services from "@/components/Services";
  export default {
    name: "index",
    components: {Services},
    layout: "main-layout"
  }
</script>

<style scoped lang="scss">
  @import "assets/css/variable";
  @import "assets/css/shared";
  .about{
    background: linear-gradient(to right, $backgroundColor, $backgroundColor), url("../../../assets/images/p-top.png");
    background-position: 152% 2%;
    background-repeat: no-repeat;
    @media (max-width: 1080px) {
      padding-top: 4rem;
    }
    .about-section-one,.about-section-two{
      margin: 3rem 0;
      color: $mainColor;
      text-align: right;
      text-transform: capitalize;
      @media (max-width: 545px) {
        margin-top: 1rem;
      }
      h2{
        position: relative;
        padding-right: 3rem;
        &:before{
          content: "";
          display: block;
          width: 20px;
          height: 20px;
          border-radius: 50%;
          background-color: $mainColor;
          position: absolute;
          right: 0;
          top: 50%;
          transform: translate(-50%,-50%);
        }
        &:after{
          content: "";
          width: 50%;
          height: 4px;
          border-radius: 5px;
          position: absolute;
          top: 50%;
          left: 0;
          background-color: $mainColor;
          @media (max-width: 1100px) {
            display: none;
          }
        }
        @media (max-width: 545px) {
          font-size: 1.5rem;
        }
      }
      p{
        width: 82%;
        font-size: 1.8rem;
        line-height: 1.8;
        margin: 2rem 0;
        margin-left: auto;
        @media (max-width: 545px) {
           width: 100%;
          font-size: 1.3rem;
          line-height: 1.7;
        }
      }
    }
    .about-section-two{
      margin-bottom: 8rem ;
      h2{
        &:after{
          content: "";
          width: 58%;
          height: 4px;
          border-radius: 5px;
          position: absolute;
          top: 50%;
          left: 0;
          background-color: $mainColor;
        }
      }
    }
    .our-services{
      text-align: center;
      color: $mainColor;
      margin: 3rem 0;
      margin-bottom: 6rem;
      position: relative;
      text-transform: capitalize;
      &:before,&:after{
        content: "";
        width: 30px;
        height: 30px;
        display: block;
        background-color: $mainColor;
        position: absolute;
        left: 43%;
        top: 50%;
        transform: translate(-50%,-50%);
        border-radius: 50%;
        @media (max-width: 1080px) {
          display: none;
        }
      }
      &:after{
        left: auto;
        right: 41%;
      }
    }
  }
  .heading-about{
    font-size: 6rem;
    color: #fff;
    font-weight: lighter;
    text-transform: capitalize;
  }
  html:lang(en){
    .about-section-one,.about-section-two{
      text-align: left;
      h2{
        padding-right: 0;
        padding-left: 3rem;
        @media (max-width: 600px) {
          padding-left: 1rem;
          font-size: 1.1rem;
        }
        &:before{
          right: auto;
          left: 0;
        }
        &:after{
          left: auto;
          right: 0;
        }
      }
      p{
        margin-left: 0;
        margin-right: auto;
      }
    }
    .our-services{
      &:before,&:after{
        left: 40%;
      }
      &:after{
        right: auto;
        left: 60%;
      }
    }
    .heading-about{
      font-size: 4rem;
    }
  }
</style>
