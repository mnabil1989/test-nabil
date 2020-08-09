<template>
  <div class="alt-header" :style="showSlide? 'height:100%':'height: auto'"
       :class="{profileHeader : isProfileHeader}">
    <div class="heading-lab-tablet">
      <div class="container-fluid" :class="{kidHeader:isKidHeader}">
        <div class="row">
          <div class="col-lg-3 col-10" :class="{'col-lg-8' : isHidden}">
            <nuxt-link :to="localePath('/main')" prefetch>
              <img :src="logoImage" class="img-fluid img-header">
            </nuxt-link>
          </div>
          <div class="col-lg-5" :class="{hidden : isHidden}">
            <div class="nav">
              <Navigation></Navigation>
            </div>

          </div>
          <div class="col-lg-4 options" :class="{'col-md-3' : isHidden}">
            <div class="row h-100">
              <div class="col-5">
                <form class="form-search" action="" v-if="hideSearch" @mouseenter="showWithResult($event)"
                      @mouseleave="showResultTap = false">
                  <input type="search" @keyup="showResult($event)" ref="input">
                  <i class="fa fa-search"></i>
                  <div class="result-search" v-if="showResultTap">
                    <a href="#" style="color: #000">search</a>
                    <a href="#" style="color: #000">search</a>
                    <a href="#" style="color: #000">search</a>
                  </div>
                </form>
              </div>
              <div class="search col-4 d-flex justify-content-end align-items-center">
                <div class="profile-pic-links" v-if="$auth.loggedIn && $auth.strategy.name === 'local'">
                  <div class="hold-img-heading position-relative" :class="{hidden : isHidden}">
                    <i class="fas fa-chevron-down" :class="{hidden : isHidden}"></i>
                    <img :src="'/storage/'+$auth.user.avatar" class="img-fluid">
                    <input type="text" class="for-dropmenu" @focus="switchDropDown = true"
                           @blur="switchDropDown = false">
                  </div>
                </div>
                <div class="profile-pic-links" v-if="$auth.loggedIn && $auth.strategy.name === 'google'">
                  <a @click="$auth.logout()" class="sign-out-google">{{$t('sign out')}}</a>
                </div>
                <div v-if="!$auth.loggedIn">
                  <nuxt-link :to="localePath('/login')" style="color: #fff">{{$t('login')}}</nuxt-link>
                </div>
                <transition name="fade">
                  <div v-if="switchDropDown" class="dropdownMenu">
                    <i class="fas fa-arrow-up"></i>
                    <ul @click="switchDropDown = false">
                      <li>
                        <nuxt-link :to="localePath('/edit-profile')">{{$t('my profile')}}</nuxt-link>
                      </li>
                      <!--                      <li>-->
                      <!--                        <nuxt-link :to="localePath('/profile')">my favorite</nuxt-link>-->
                      <!--                      </li>-->
                      <li>
                        <a @click="$auth.logout()">{{$t('sign out')}}</a>
                      </li>
                    </ul>
                  </div>
                </transition>
              </div>
              <div class="col-3 d-flex justify-content-center align-items-center">
                <ul class="lang-switch">
                  <li class="has-submenu hide-bg" v-if="$i18n.locale != 'ar'">
                    <nuxt-link :to="switchLocalePath('ar')" class="arabic lang">Ar</nuxt-link>
                  </li>
                  <li class="has-submenu hide-bg" v-else>
                    <nuxt-link :to="switchLocalePath('en')" class="lang">En</nuxt-link>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-3 d-none">
              <nuxt-link :to="localePath('/booking')">
                <div class="booking">
                  <span>book now</span>
                </div>
              </nuxt-link>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="heading-mobile">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-10 col-9">
            <div>
              <nuxt-link :to="localePath('/main')">
                <img src="../assets/images/login-form.png" class="img-fluid img-header">
              </nuxt-link>
            </div>
          </div>
          <div class="col-sm-2 col-3">
            <div class="toggle-menu" @click="showSlide = !showSlide">
              <div class="toggle-span">
                <span
                  :style="showSlide? 'transform : translateY(10px) rotate(-45deg)' : 'transform : rotate(0)'"></span>
                <span :style="showSlide? 'transform : rotate(45deg)' : 'transform : rotate(0)'"></span>
                <span :style="showSlide? 'opacity : 0' : 'opacity : 1'"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <transition name="slide-fade">
      <div class="slide-menu" v-if="showSlide">
        <div class="row">
          <div class="col-12">
            <div class="hold-img-heading" v-if="$auth.loggedIn &&  $auth.strategy.name === 'local'">
              <img :src="'/storage/'+$auth.user.avatar" class="img-fluid img-profile-mobile-heading">
            </div>
          </div>
          <div class="col-12">
            <nuxt-link :to="localePath('/login')" class="login-mobile" v-if="!$auth.loggedIn">{{$t('login')}}
            </nuxt-link>
          </div>
        </div>
        <Navigation :isFooterMenu=true @closeMenu="closeMenu($event)"></Navigation>
        <ul class="ul-profile" @click="switchDropDown = false" v-if="$auth.loggedIn">
          <li @click="showSlide = false">
            <nuxt-link :to="localePath('/edit-profile')">{{$t('my profile')}}</nuxt-link>
          </li>
          <!--          <li @click="showSlide = false">-->
          <!--            <nuxt-link :to="localePath('/profile')">my favorite</nuxt-link>-->
          <!--          </li>-->
          <li @click="showSlide = false">
            <a @click="$auth.logout()">{{$t('sign out')}}</a>
          </li>
        </ul>
        <ul>
          <li class="lang-switch text-center">
            <nuxt-link :to="switchLocalePath('ar')" class="arabic">العربيه</nuxt-link>
            <nuxt-link :to="switchLocalePath('en')" class="english">En</nuxt-link>
          </li>
        </ul>
      </div>
    </transition>
  </div>

</template>

<script>
  import Navigation from "./Navigation";

  export default {
    name: "AltHeader",
    components: {Navigation},
    props: {
      isProfileHeader: {
        type: Boolean,
        default: false
      },
      isHidden: {
        type: Boolean,
        default: false
      },
      isKidHeader: {
        type: Boolean,
        default: false
      }
    },
    data() {
      return {
        hideSearch: false,
        switchDropDown: false,
        showSlide: false,
        logoImage: require('assets/images/login-form.png'),
        showResultTap: false,
        avatar: ''
      }
    },
    head(context) {
      return {
        htmlAttrs: {
          lang: this.$i18n.locale,
          dir: this.$i18n.locale == 'ar' ? 'rtl' : 'ltr'
        },
      }
    },
    methods: {
      closeMenu($event) {
        this.showSlide = $event;
      },
      showWithResult($event) {
        if (this.$refs.input.value === '') {
          this.showResultTap = false;
        }
      },
      showResult($event) {
        this.showResultTap = true;
        if ($event.target.value === "") {
          this.showResultTap = false;
        }
      },
      changeToEn() {
        this.$i18n.locale = "en";
        window.history.replaceState("", "", this.switchLocalePath("en"));
        if ("en" === this.$store.state.i18n.locale) {
          return;
        }
        this.$store.commit("i18n/i18nSetLocale", "en");
        import(`../locales/en.js`).then(module => {
          this.$i18n.locale = "en";
          this.$i18n.setLocaleMessage("en", module.default);
          window.history.replaceState("", "", this.switchLocalePath("en"));
        });
        this.$store.dispatch('setLangEn', 'en');
        this.$store.dispatch('setDirEn', 'ltr');
      },
      changeToAr() {
        this.$i18n.locale = "ar";
        window.history.replaceState("", "", this.switchLocalePath("ar"));
        if ("ar" === this.$store.state.i18n.locale) {
          return;
        }
        this.$store.commit("i18n/i18nSetLocale", "ar");
        import(`../locales/ar.js`).then(module => {
          this.$i18n.locale = "ar";
          this.$i18n.setLocaleMessage("ar", module.default);
          window.history.replaceState("", "", this.switchLocalePath("ar"));
        });
        this.$store.dispatch('setLangAr', 'ar');
        this.$store.dispatch('setDirAr', 'rtl');
      }
    },
    mounted() {
      if (this.$store.state.siteType == 'kids') {
        this.logoImage = require('../assets/images/logo-kids.png');
      } else {
        this.logoImage = require('../assets/images/login-form.png');
      }
    }
  }
</script>

<style lang="scss" scoped>
  $main-color: #bb8f32;
  $opacity-color: rgba(0, 97, 159, 0.25);
  $main-font: 'Poppins';
  .toggleClass {
    color: #fff;
  }

  .nav {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .alt-header {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding-top: 1.2rem;
    height: auto;
    z-index: 30;

    .options {
      a {
        color: #fff;
      }

      .hold-img-heading {
        img {
          border-radius: 50%;
          width: 35px;
          cursor: pointer;
          height: 35px;
          object-fit: cover;
        }
      }

      .search {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;

        .fa-search, .fa-chevron-down {
          color: #fff;
          cursor: pointer;
          margin: 0 .7rem;
          transition: all linear .3s;

          &:hover {
            color: $main-color;
          }
        }

        .dropdownMenu {
          position: absolute;
          right: 3.5rem;
          top: 4rem;
          width: 185px;
          border: 1px solid $main-color;
          background-color: rgba(0, 0, 0, 0.61);

          .fa-arrow-up {
            color: $main-color;
            position: absolute;
            right: .2rem;
            top: -1rem;
          }

          li {
            text-align: center;
            margin: 1rem 0;
            text-transform: capitalize;
            position: relative;
            transition: all linear .3s;

            a {
              color: #fff;
              transition: all linear .3s;
              cursor: pointer;
            }

            &:after {
              content: "";
              display: block;
              width: 25%;
              height: 2px;
              background-color: $main-color;
              margin: .8rem auto;
            }

            &:last-of-type {
              &:after {
                display: none;
              }
            }

            &:hover {
              a {
                color: $main-color;
              }
            }
          }
        }
      }

      a {
        font-weight: 500;
        color: #000;
        text-decoration: none;
      }

      .booking {
        border-radius: 50%;
        background: #fff;
        text-transform: capitalize;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        transform: rotate(-35deg);

        span {
          text-align: center;
          font-size: 13px;
        }
      }

    }

    @media (max-width: 1200px) {
      z-index: 50;
      height: 100%;
    }
  }

  .img-header {
    height: 75px;
    display: block;
    margin: 0 0 0 2.5rem;
  }

  .profileHeader {
    position: relative;
    padding: 1.5rem 0;
    margin: 0;
  }

  .toggle-menu {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    width: 25%;
    position: fixed;
    right: 1rem;
    top: 1.5rem;

    div {
      width: 55%;
      margin-left: auto;
    }

    span {
      display: block;
      margin: .5rem 0;
      width: 100%;
      height: 3px;
      background-color: $main-color;

    }
  }

  .hidden {
    display: none;
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
  {
    opacity: 0;
  }

  // media
  .heading-lab-tablet {
    transition: all ease-in-out .3s;
    @media (max-width: 1200px) {
      display: none;
    }
  }

  .heading-mobile {
    display: none;
    position: relative;

    .img-header {
      margin: 0;
      height: 50px;
    }

    @media (max-width: 1200px) {
      display: block;
    }
  }

  .slide-menu {
    background-color: rgba(0, 0, 0, 0.91);
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    width: 65%;
    height: 100%;
    z-index: 51;
    display: none;

    ul {
      margin: 0 auto;
    }

    .ul-profile {
      li {
        text-align: center;
        margin: 1.5rem 0;
        text-transform: capitalize;

        a {
          color: $main-color;
        }
      }
    }

    @media (max-width: 1200px) {
      display: block;
    }
  }

  .slide-fade-enter-active {
    transition: all .3s ease;
  }

  .slide-fade-leave-active {
    transition: all .1s cubic-bezier(1.0, 0.5, 0.8, 1.0);
  }

  .slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */
  {
    transform: translateX(10px);
    opacity: 0;
  }

  .toggle-span {
    span {
      transition: all linear .3s;
    }
  }

  .img-profile-mobile-heading {
    width: 50px;
    height: 50px;
    object-fit: cover;
    display: block;
    margin: 1rem auto;
    border-radius: 50%;
  }

  .lang-switch {
    a {
      color: #fff;
    }

    span {
      cursor: pointer;
    }
  }

  .kidHeader {
    /*border: 1px solid #00619f;*/
    width: 98%;
    padding: 1rem;
    @media (max-width: 1200px) {
      width: 100%;
    }
  }

  .profile-pic-links {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  /*.search-place{*/
  /*  margin: .5rem 0;*/
  /*  text-align: center;*/
  /*  background-color: rgba(0, 0, 0, 0.58);*/
  /*  border-radius: 7px;*/
  /*  input{*/
  /*    background-color: transparent;*/
  /*    border: none;*/
  /*    outline: none;*/
  /*    color: #fff;*/
  /*    text-align: center;*/
  /*    padding: .5rem 0;*/
  /*    &::placeholder{*/
  /*      color: #fff;*/
  /*      text-transform: capitalize;*/
  /*      text-align: center;*/
  /*    }*/
  /*  }*/
  /*}*/
  .form-search {
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transition: all 1s;
    width: 50px;
    height: 50px;
    background: white;
    box-sizing: border-box;
    border-radius: 25px;
    border: 4px solid white;
    padding: 5px;

    input {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;;
      height: 42.5px;
      line-height: 30px;
      outline: 0;
      border: 0;
      display: none;
      font-size: 1em;
      border-radius: 20px;
      padding: 0 20px;
    }

    .fa-search {
      top: 5px;
      right: 5px;
      border-radius: 50%;
      color: #07051a;
      text-align: center;
      font-size: .8em;
      box-sizing: border-box;
      padding: 10px;
      width: 30.5px;
      height: 30.5px;
      position: absolute;
      transition: all 1s;
    }

    &:hover {
      width: 200px;
      cursor: pointer;

      input {
        display: block;
      }

      .fa-search {
        background: #07051a;
        color: white;
      }
    }
  }

  .lang {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fff;
    color: #000;
    cursor: pointer;
    margin: 0 auto;
  }

  .result-search {
    background-color: #fff;
    width: 100%;
    position: absolute;
    left: 0;
    top: 85%;
    padding: 1rem;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
  }

  .login-mobile {
    display: block;
    text-align: center;
    margin: 1rem 0;
    color: $main-color;
    text-transform: capitalize;
    text-decoration: none;
  }

  .for-dropmenu {
    width: 100%;
    opacity: 0;
    cursor: pointer;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
  }

  html:lang(ar) {
    .search {
      .fa-search, .fa-chevron-down {
        color: #fff;
        cursor: pointer;
        margin: 0 .7rem;
        transition: all linear .3s;
      }

      .dropdownMenu {
        right: 4.1rem !important;

        .fa-arrow-up {
          right: .2rem;
          top: -1rem;
        }

        li {
          &:after {
            content: "";
            display: block;
            width: 25%;
            height: 2px;
            background-color: $main-color;
            margin: .8rem auto;
          }

          &:last-of-type {
            &:after {
              display: none;
            }
          }

          &:hover {
            a {
              color: $main-color;
            }
          }
        }
      }
    }
  }

  .sign-out-google {
    color: #fff !important;
    cursor: pointer;
  }
</style>
