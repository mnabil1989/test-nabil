<template>
  <div class="landing-page login-page" v-if="showSteps">
    <transition name="slide-fade">
      <div v-if="step === 1" class="intro-1 intro">
        <div class="container">
          <div class="row">
            <div class="col-md-5 col-12 d-flex justify-content-center align-items-center"><p class="p-intro">{{$t('intro-step-1')}}</p></div>
            <div class="col-md-3 col-5"><img src="@/assets/images/ellie-real.png" alt="logo" class="img-fluid elephant-img">
            </div>
            <div class="col-md-4 col-7">
              <img src="@/assets/images/akw-logo.png" alt="logo" class="img-fluid logo-img">
              <img src="@/assets/images/akw-type-logo.png" alt="logo" class="img-fluid logo-img">
            </div>
          </div>
        </div>
        <div class="intro-footer">
          <div class="row">
            <div class="col-md-5">
              <div class="toggles-buttons">
                <button class="skip" @click="skipFunc()">{{$t('skip')}}</button>
                <button class="step-btn-4"></button>
                <button class="step-btn-3"></button>
                <button class="step-btn-2"></button>
                <button class="step" @click="changeStep(2)"><i class="fas fa-long-arrow-alt-up"></i></button>
              </div>
            </div>
            <div class="col-md-7">
              <div class="copy-right">
                <p>&copy; {{$t('copyright')}} 2020</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
    <transition name="slide-fade">
      <div v-if="step === 2" class="intro-2 intro">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-12 d-flex justify-content-center align-items-center"><p class="p-intro">{{$t('intro-step-2')}}</p></div>
            <div class="col-md-5 col-12"><img src="@/assets/images/ellie-real.png" alt="logo" class="img-fluid elephant-img">
            </div>
          </div>
        </div>
        <div class="intro-footer">
          <div class="row">
            <div class="col-md-5">
              <div class="toggles-buttons">
                <button class="skip" @click="skipFunc()">{{$t('skip')}}</button>
                <button class="step-btn-4"></button>
                <button class="step-btn-3"></button>
                <button class="step" @click="changeStep(3)"><i class="fas fa-long-arrow-alt-up"></i></button>
                <button class="step-btn-2" @click="changeStep(1)"></button>
              </div>
            </div>
            <div class="col-md-7">
              <div class="copy-right">
                <p>&copy; {{$t('copyright')}} 2020</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
    <transition name="slide-fade">
      <div v-if="step === 3" class="intro-3 intro">
        <div class="container">
          <div class="row">
            <div class="col-md-7 d-flex justify-content-center align-items-center"><p class="p-intro">{{$t('intro-step-3')}}</p></div>
            <div class="col-md-5"><img src="@/assets/images/ellie-real.png" alt="logo" class="img-fluid elephant-img">
            </div>
          </div>
        </div>
        <div class="intro-footer">
          <div class="row">
            <div class="col-md-5">
              <div class="toggles-buttons">
                <button class="skip" @click="skipFunc()">{{$t('skip')}}</button>
                <button class="step-btn-4"></button>
                <button class="step" @click="changeStep(4)"><i class="fas fa-long-arrow-alt-up"></i></button>
                <button class="step-btn-3" @click="changeStep(2)"></button>
                <button class="step-btn-2"></button>
              </div>
            </div>
            <div class="col-md-7">
              <div class="copy-right">
                <p>&copy; {{$t('copyright')}} 2020</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
    <transition name="slide-fade">
      <div v-if="step === 4" class="intro-4 intro">
        <div class="container">
          <div class="row">
            <div class="col-md-7 d-flex justify-content-center align-items-center"><p class="p-intro">{{$t('intro-step-4')}}</p></div>
            <div class="col-md-5"><img src="@/assets/images/ellie-real.png" alt="logo" class="img-fluid elephant-img">
            </div>
          </div>
        </div>
        <div class="intro-footer">
          <div class="row">
            <div class="col-md-5">
              <div class="toggles-buttons">
                <button @click="skipFunc()" class="skip">{{$t('skip')}}</button>
                <button @click="toHomePage()" class="step"><i class="fas fa-long-arrow-alt-up"></i></button>
                <button @click="changeStep(3)" class="step-btn-4"></button>
                <button @click="changeStep(2)" class="step-btn-3"></button>
                <button @click="changeStep(1)" class="step-btn-2"></button>
              </div>
            </div>
            <div class="col-md-7">
              <div class="copy-right">
                <p>&copy; {{$t('copyright')}} 2020</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
  export default {
    name: "index",
    layout: 'intro-landing',
    data() {
      return {
        step: 1,
        showSteps: true
      }
    },
    methods: {
      changeStep(step) {
        this.step = step
      },
      toHomePage() {
        if (this.step === 4) {
          this.$router.push(this.localePath('/home'));
          localStorage.setItem('visitedBefore', 'true');
        }
      },
      skipFunc() {
        this.$router.push(this.localePath('/home'));
        localStorage.setItem('visitedBefore', 'true');
      }
    },
    mounted() {
      if (localStorage.getItem('visitedBefore') === 'true') {
        this.$router.push(this.localePath('/home'));
        this.showSteps = false
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import "assets/css/variable";
  @import "assets/css/shared";

  .landing-page {
    background-color: $backgroundColor;
    background-image: url("../assets/images/background-login.png");
    position: relative;
    overflow: hidden;
  }

  .logo-img {
    height: 100px;
    display: block;
    margin: 0 auto;
    @media (max-width: 545px) {
      height: 75px;
    }
  }

  .elephant-img {
    height: 270px;
    margin: 0 auto;
    margin-top: -10rem;
  }

  .p-intro {
    color: #fff;
    line-height: 2.3;
    text-align: center;
    @media (max-width: 600px) {
      margin-top: 3rem;
    }
  }

  .intro-footer {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    margin-bottom: 2rem;

    .copy-right {
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
      height: 100%;
      text-transform: capitalize;
      p {
        margin-bottom: 0
      }
    }
  }

  .step, .step-btn-2, .step-btn-3, .step-btn-4 {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    color: $secondColor;
    border: none;
    outline: none;
    box-shadow: 0 2px 4px 0 rgba(4, 102, 122, 0.13);
    display: inline-block;
    margin: 0 1rem;

    .fa-long-arrow-alt-up {
      transform: rotate(90deg);
      font-size: 2rem;
    }
  }

  .toggles-buttons {
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }

  .step-btn-2 {
    width: 40px;
    height: 40px;
  }

  .step-btn-3 {
    width: 20px;
    height: 20px;
  }

  .step-btn-4 {
    width: 10px;
    height: 10px;
  }

  .skip {
    display: inline-block;
    margin: 0 1rem;
    border: none;
    color: #fff;
    background-color: transparent;
    outline: none;
    position: relative;

    &:after {
      content: "";
      display: block;
      width: 80%;
      margin: .2rem auto;
      height: 3px;
      border-radius: 15px;
      background-color: $mainColor;
      /*position: absolute;*/
      /*bottom: 0;*/
    }
  }
  .intro{
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .fade-enter-active, .fade-leave-active {
    transition: opacity .1s;
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
  {
    opacity: 0;
    transition: opacity .1s;
  }
  .intro{
    .elephant-img{
      height: 300px;
      margin-top: -3rem;
      @media (max-width: 545px) {
        height: 165px;
        margin-top: 0;
      }
    }
  }
  .intro-2,.intro-3,.intro-4{
    .elephant-img{
      @media (max-width: 545px) {
        display: block;
        margin: 0 auto;
      }
    }
  }

  html:lang(en){
    .fa-long-arrow-alt-up {
      transform: rotate(-90deg);
    }
  }
</style>
