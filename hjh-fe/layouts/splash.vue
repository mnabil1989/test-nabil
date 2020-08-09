<template>
  <div class="splash" dir="rtl">
    <div class="container-fluid top-splash">
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="hold-apps-info">
            <div class="appstore d-none">
              <img src="../assets/app-store-logo.png" alt="app-store" />
            </div>
            <div class="playstore d-none">
              <img src="../assets/google-play.png" alt="google-play" />
            </div>
            <div @click="$router.push(localePath('/auth/login'))" class="login">{{$t('login')}}</div>
          </div>
        </div>
        <div class="col-md-6 col-12">
          <div class="hold-phone-info">
            <div class="phone">
              00201069000063
              <i class="fa fa-phone"></i>
            </div>
            <div class="language d-none">
              <nuxt-link v-if="$i18n.locale=='en'" :key="'ar'" :to="switchLocalePath('ar')">العربيه</nuxt-link>
              <nuxt-link v-if="$i18n.locale=='ar'" :key="'en'" :to="switchLocalePath('en')">English</nuxt-link>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="splash-body">
      <nuxt />

      <!-- <div class="right-splash-body">
      </div>
      <div class="left-splash-body">
        this should be the logo only.
      </div>-->
    </div>
    <footer class="splash-footer">
      <div class="right-splash-footer">
        <!-- this is the side menu, can be changed to be login or registeration -->
      </div>
      <div class="left-splash-footer center">جميع الحقوق محفوظة لدى - مجموعة أندلسية 2020©</div>
    </footer>
  </div>
</template>

<script>
export default {
  head(context) {
    return {
      htmlAttrs: {
        lang: this.$i18n.locale,
        dir: this.$i18n.locale == "ar" ? "rtl" : "ltr"
      }
    };
  },
  data() {
    return {
      bookIntialized: false,
      bookClicked: false,
      menuClicked: false,
      menuIntialized: false
    };
  },
  methods: {
    showMenuAnimation() {
      this.menuIntialized = true;
      this.menuClicked = !this.menuClicked;
    }
  },
  computed: {
    showHideAnimation: function() {
      var showable = !this.bookClicked && this.bookIntialized;
      return showable;
    },
    showHideMenuAnim: function() {
      console.log("test");
      var showable = !this.menuClicked && this.menuIntialized;
      console.log(showable);
      return showable;
    }
  }
};
</script>

<style lang="scss" scoped>
.hamb-icon {
  font-size: 400%;
  cursor: pointer;
  display: none;
  color: #1d4590;
  justify-self: right;
}
.top-splash{
  position: absolute;
  z-index: 99;
  @media (max-width: 992px) {
    position: relative;
  }
}
body {
  /* background-image: url('/img/background-splash.png'); */
  background-size: cover;
  background-repeat: no-repeat;
}

.splash {
  height: 100vh;
  background-image: url("../assets/img/splash.png");
  background-position: 35% 25%;
  background-size: 1800px;
  color: #003580;
  @media (max-width: 768px) {
    height: auto;
  }
}
.hold-apps-info,.hold-phone-info{
  display: flex;
  justify-content: flex-start;
  align-items: center;
  margin: 0 2rem 1rem 0;
  @media (max-width: 768px) {
    margin: 0;
    display: block;
  }
  .login{
    margin-top: .5rem;
    cursor: pointer;
    @media (max-width: 768px) {
      background-color: #fff;
      border-radius: .25rem;
      padding: 10px;
      margin: 1rem auto;
      width: 60%;
    }
  }
  .appstore,.playstore{
    @media (max-width: 768px) {
      width: 49%;
      display: inline-block;
      margin-top: 1rem;
    }
  }
}
.hold-phone-info{
  justify-content: flex-end;
  margin: 1rem 2rem;
  @media (max-width: 768px) {
    justify-content: center;
    margin: 1rem auto;
    margin-top: 0;
    width: 60%;
    .phone{
      justify-content: flex-start;
      flex-direction: row;
      @media (max-width: 768px) {
        justify-content: center;
      }
      .fa-phone{
        margin-right: .5rem;
      }
    }
  }
}
.splash-header {
  padding: 0 3%;

  /* margin-top: 0; */
  top: 0;
  /* height: 10%; */
  display: grid;
  grid-template-columns: 2fr 3fr 1fr;
  justify-items: center;
  align-items: center;
}
.splash-body{
  min-height: 100vh;
}
.right-splash-body {
  width: 552px;
  justify-self: center;
}

.left-splash-body {
  justify-self: center;
}

/* ******************** */
/* Right */
/* ******************** */
.right-splash-menu {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  justify-items: start;
  align-items: center;
  @media (max-width: 850px) {
    grid-template-columns: 1fr;
  }
}
.login {
  color: #003580;
  font-size: 120%;
  font-weight: 300;
  transition: 0.4s;
  @media (max-width: 750px) {
    text-align: center;
    width: 100%;
  }
}

.login:hover {
  cursor: pointer;
  opacity: 0.8;
}
.playstore {
  width: 120px;
}
.appstore {
  width: 120px;
}
.appstore img {
  width: 100%;
  /* height: 100%; */
}
.playstore img {
  width: 100%;
}
/* ******************** */
/* left */
/* ******************** */
.phone {
  display: flex;
  flex-direction: row-reverse;
  justify-content: space-between;
  align-items: center;
  width: 10.52vw;
  font-size: 16px;
  @media (max-width: 850px) {
    width: auto;
  }
}
.language {
  text-align: center;
  @media (max-width: 750px) {
    text-align: center;
    width: 100%;
  }
}

.left-splash-menu {
  display: grid;
  grid-template-columns: 1fr 1fr;
  justify-items: end;
  @media (max-width: 850px) {
    grid-template-columns: 1fr;
    align-content: center;
    align-items: center;
    justify-content: center;
  }
  align-items: center;
}

/* .middle-menu{
    width: 40%;
} */

.splash-footer {
  position: absolute;
  width: 100%;
  /* height: 10%; */
  bottom: 3%;
  /* margin: 3%; */
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  align-items: center;
  justify-self: center;
  @media (max-width: 768px) {
    bottom: auto;
  }
}

.right-splash-footer {
  justify-self: center;
  align-self: center;
}

.left-splash-footer {
  justify-self: center;
  @media (max-width: 768px) {
    font-size: .8rem;
    margin: 1rem 0;
  }
}
.left-splash-footer:lang(en) {
  grid-column-start: 1;
}
@media only screen and (max-width: 400px) {
  .splash-header {
    margin-bottom: 5%;
  }
}
@media only screen and (max-width: 600px) {
  .middle-menu {
    display: none;
  }
  .splash-header {
    display: grid;
    max-height: 45px;
    overflow: hidden;
    grid-template-columns: 1fr;
  }
  .splash-footer {
    grid-template-columns: auto;
    margin: 0 auto;
  }
}

@media only screen and (max-width: 850px) {
  .splash-header {
    grid-template-columns: 1fr;
    max-height: 45px;
    padding: 1% 2%;
    font-size: 16px;
    margin-bottom: 5%;

    overflow: hidden;
  }
  .show-menu-animation {
    animation: show-menu 2s forwards;
  }
  .hide-menu-animation {
    animation: hide-menu 2s forwards;
  }
  @keyframes show-menu {
    0% {
      max-height: 45px;
    }
    100% {
      max-height: 100vw;
      margin-bottom: 10%;
    }
  }
  @keyframes hide-menu {
    0% {
      max-height: 100vw;
      margin-bottom: 10%;
    }
    100% {
      max-height: 45px;
    }
  }
  .hamb-icon {
    display: block;
    font-size: 25px;
  }
}
</style>
