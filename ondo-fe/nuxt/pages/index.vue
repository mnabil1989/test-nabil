<template>
  <div>
    <div class="landing">
      <img src="@/assets/img/main-logo-landing.png" class="img-fluid main-logo" alt="main-logo-landing">
      <div class="hold-bu-s">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-12"></div>
            <div class="col-lg-6 col-12 hold-bu-s-background">
              <div class="main-logo-landing">
                <img src="@/assets/img/care-landing.png" alt="logo">
              </div>
              <nuxt-link class="hjh-link" :to="localePath('/hjh')">
                <img src="../assets/img/hjh-landing.png"/>
              </nuxt-link>
              <nuxt-link class="apc-link" :to="localePath('/apc')">
                <img src="../assets/img/apc-landing.png"/>
              </nuxt-link>
              <nuxt-link class="adc-link" :to="localePath('/adc')">
                <img src="../assets/img/adc-landing.png"/>
              </nuxt-link>
              <nuxt-link class="akw-link" :to="localePath('/akw')">
                <img src="../assets/img/akw-landing.png"/>
              </nuxt-link>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="landing-mobile">
      <div class="hold-bu-s d-flex justify-content-center align-items-center">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-12">
                  <img src="@/assets/img/main-logo-landing.png" class="img-fluid main-logo" alt="main-logo-landing">
                </div>
                <div class="col-6">
                  <nuxt-link class="hjh-link-mobile" :to="localePath('/hjh')">
                    <img src="../assets/img/hjh-landing.png"/>
                  </nuxt-link>
                </div>
                <div class="col-6">
                  <nuxt-link class="apc-link-mobile" :to="localePath('/apc')">
                    <img src="../assets/img/apc-landing.png"/>
                  </nuxt-link>
                </div>
                <div class="col-12">
                  <div class="main-logo-landing">
                    <img src="@/assets/img/care-landing.png" alt="logo">
                  </div>
                </div>
                <div class="col-6">
                  <nuxt-link class="adc-link-mobile" :to="localePath('/adc')">
                    <img src="../assets/img/adc-landing.png"/>
                  </nuxt-link>
                </div>
                <div class="col-6 ">
                  <nuxt-link class="akw-link-mobile" :to="localePath('/akw')">
                    <img src="../assets/img/akw-landing.png"/>
                  </nuxt-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    layout: "landing",
    data() {
      return {}
    },
  };
</script>
<style scoped lang="scss">
  .btn-groups {
    width: 70%;
    height: 100vh;
    margin: 0 auto;
  }
  .btn-bu {
    width: 30vw;
    height: 30vw;
    /* color: white; */
    font-size: 3rem;
    /* border: 2px solid white; */
    transition: 0.4s;
    cursor: pointer;
  }
  .btn-bu:hover {
    /* background: white; */
    color: black;
  }
  .landing {
    position: relative;
    .main-logo {
      height: 725px;
      position: absolute;
      left: -26%;
      top: -16%;
    }
    @media (max-width: 1100px) {
      display: none;
    }
  }
  .landing-mobile{
    display: none;
    height: 100vh;
    .hold-bu-s{
      height: 100%;
    }
    @media (max-width: 1100px) {
      display: block;
      .main-logo{
        height: 90px;
        display: block;
        margin: 0 auto;
      }
    }
  }
  .hold-bu-s-background {
    background: url("../assets/img/hold-bu-s.png");
    background-size: 85%;
    background-repeat: no-repeat;
    background-position: center;
    min-height: 100vh;
  }
  .hjh-link, .apc-link, .adc-link, .akw-link, .main-logo-landing {
    padding: 0 .5rem;
    display: flex;
    background-color: #fff;
    border-radius: 50%;
    width: 150px;
    height: 150px;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 15%;
    left: 50%;
    transform: translate(-50%, -50%);
    transition: all linear .4s;
  }
  .hjh-link-mobile,.apc-link-mobile,.adc-link-mobile,.akw-link-mobile{
    position: relative;
    top: auto;
    left: auto;
    margin: 2rem auto;
    padding: 0 1rem;
    transform: translate(0);
    background-color: #fff;
    border-radius: 50%;
    width: 105px;
    height: 105px;
    display: flex;
    justify-content: center;
    align-items: center;
    &:hover {
      transform: scale(1.4);
    }
  }
  .hjh-link {
    &:hover {
      transform: translate(-50%, -43%) scale(1.2);
    }
  }
  .apc-link {
    top: 50%;
    left: 15%;
    img {
      height: 85px;
    }
    &:hover {
      transform: translate(-50%, -43%) scale(1.2);
    }
  }
  .adc-link {
    left: auto;
    right: -10%;
    top: 50%;
    img {
      height: 60px;
    }
    &:hover {
      transform: translate(-50%, -43%) scale(1.2);
    }
  }
  .akw-link {
    top: auto;
    bottom: -7%;
    left: 50%;
    &:hover {
      transform: translate(-50%, -51%) scale(1.1);
    }
  }
  .main-logo-landing {
    top: 50%;
    left: 50%;
    width: 250px;
    height: 250px;
    @media (max-width: 992px) {
      width: 110px;
      height: 110px;
      position: relative;
      top: auto;
      left: auto;
      margin: 0 auto;
      transform: translate(0);
    }
  }
</style>
