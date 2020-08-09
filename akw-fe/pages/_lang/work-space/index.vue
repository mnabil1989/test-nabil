<template>
  <div class="work-space">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <img src="@/assets/images/ellie-real.png" alt="about" class="e-img">
        </div>
        <div class="col-6">
          <img src="@/assets/images/mother.png" alt="mother" class="mother-img">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex justify-content-center align-items-center">
          <h1 class="heading-work-space">{{$t('workspace-child')}}</h1>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center">
          <p class="paragraph-work-space">{{$t('workspace-child-p')}}</p>
        </div>
        <div class="col-12">
          <div class="work-space-section-intro">
            <h2>{{$t('offered-workspace')}}</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-12">
          <nuxt-link :to="localePath('/work-space/1')" class="work-space-sample">
            <div class="work-space-background"></div>
            <div class="container-work-space text-center">
              <h3>عيادات الطفل</h3>
              <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
                الطبية الشاملة لطفلك في أجواء
                دافئة وممتعة ومليئة بالمرح</p>
            </div>
          </nuxt-link>
        </div>
        <div class="col-lg-6 col-12 margin-top">
          <nuxt-link class="work-space-sample" :to="localePath('/work-space/1')">
            <div class="work-space-background"></div>
            <div class="container-work-space text-center">
              <h3>عيادات الطفل</h3>
              <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
                الطبية الشاملة لطفلك في أجواء
                دافئة وممتعة ومليئة بالمرح</p>
            </div>
          </nuxt-link>
        </div>
        <div class="col-lg-6 col-12">
          <nuxt-link class="work-space-sample" :to="localePath('/work-space/1')">
            <div class="work-space-background"></div>
            <div class="container-work-space text-center">
              <h3>عيادات الطفل</h3>
              <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
                الطبية الشاملة لطفلك في أجواء
                دافئة وممتعة ومليئة بالمرح</p>
            </div>
          </nuxt-link>
        </div>
        <div class="col-lg-6 col-12 margin-top">
          <div class="work-space-sample">
            <div class="work-space-background"></div>
            <div class="container-work-space text-center">
              <h3>عيادات الطفل</h3>
              <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
                الطبية الشاملة لطفلك في أجواء
                دافئة وممتعة ومليئة بالمرح</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="work-space-sample">
            <div class="work-space-background"></div>
            <div class="container-work-space text-center">
              <h3>عيادات الطفل</h3>
              <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
                الطبية الشاملة لطفلك في أجواء
                دافئة وممتعة ومليئة بالمرح</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 margin-top">
          <div class="work-space-sample">
            <div class="work-space-background"></div>
            <div class="container-work-space text-center">
              <h3>عيادات الطفل</h3>
              <p>نوفر في مركز أندلسية لصحة الطفل الرعاية
                الطبية الشاملة لطفلك في أجواء
                دافئة وممتعة ومليئة بالمرح</p>
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
    layout: 'main-layout'
  }
</script>

<style scoped lang="scss">
  @import "assets/css/variable";
  @import "assets/css/shared";
  .work-space{
    background: linear-gradient(to right, $backgroundColor, $backgroundColor), url("../../../assets/images/p-top.png");
    background-position: 152% 2%;
    background-repeat: no-repeat;
    padding-bottom: 5rem;
    @media (max-width: 1080px) {
      padding-top: 4rem;
    }
  }
  .e-img{
    transform: scaleX(-1);
    width: 70%;
    display: block;
    margin: 3rem auto 0 auto;
  }
  .heading-work-space{
    color: #fff;
    font-size: 4rem;
    text-transform: capitalize;
    @media (max-width:545px) {
      font-size: 2rem;
      margin: 2rem 0;
    }
  }
  .paragraph-work-space{
    text-align: center;
    width: 100%;
    margin: 2rem auto;
    font-size: 1.7rem;
    line-height: 1.8;
    color: #fff;
    @media (max-width:545px) {
      font-size: 1.2rem;
      margin: 1rem 0;
    }
  }
  .about-section-one{
    margin: 3rem 0;
    color: $mainColor;
    text-align: right;
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
      }
    }
    p{
      width: 82%;
      font-size: 1.8rem;
      line-height: 1.8;
      margin: 2rem 0;
      margin-left: auto;
    }
  }
  .work-space-section-intro{
    margin: 3rem 0;
    color: #fff;
    text-align: right;
    h2{
      position: relative;
      padding-right: 3rem;
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
        width: 40%;
        height: 4px;
        border-radius: 5px;
        position: absolute;
        top: 50%;
        left: 0;
        background-color: #fff;
        @media (max-width: 1080px) {
          width: 30%;
        }
        @media (max-width: 992px) {
          display: none;
        }
      }
      @media (max-width: 545px) {
        font-size: 1.4rem;
      }
    }
    p{
      width: 82%;
      font-size: 1.8rem;
      line-height: 1.8;
      margin: 2rem 0;
      margin-left: auto;
    }
  }
  .work-space-sample{
    position: relative;
    height: 500px;
    width: 80%;
    margin: 0 auto;
    display: block;
    .work-space-background {
      background-image: linear-gradient(to right, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("../../../assets/images/andalusia.png");
      background-repeat: no-repeat;
      clip-path: polygon(0% 0%, 100% 0%, 100% 45%, 0% 60%);
      background-size: contain;
      height: 100%;
    }
    .container-work-space {
      border: 1px solid #fff;
      color: #fff;
      position: absolute;
      top: 20px;
      left: 20px;
      right: 20px;
      bottom: 20px;
      h3 {
        margin-top: 12rem;
        @media (max-width: 600px) {
          margin-top: 2rem;
        }
      }
      p {
        margin: 3rem;
        @media (max-width: 600px) {
          margin: 2rem 1.5rem;
          line-height: 2;
        }
      }
    }
    @media (max-width: 600px) {
      height: 350px;
    }
  }
  .margin-top{
    margin-top: 5rem;
    @media (max-width: 600px) {
      margin-top: 0
    }
  }
  html:lang(en){
    .work-space-section-intro{
      text-align: left;
      h2{
        padding-right: 0;
        padding-left: 3rem;
        &:before{
          content: "";
          right: auto;
          left: 0;
        }
        &:after{
          content: "";
          width: 10%;
          height: 4px;
          top: 50%;
          left: auto;
          right: 0;
          @media (max-width: 1080px) {
            width: 30%;
          }
          @media (max-width: 992px) {
            display: none;
          }
        }
        @media (max-width: 545px) {
          font-size: 1.4rem;
        }
      }
      p{
        width: 82%;
        font-size: 1.8rem;
        line-height: 1.8;
        margin: 2rem 0;
        margin-left: auto;
      }
    }
  }
</style>
