<template>
  <header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
      <div class="navbar-header">
        <a id="mobile_btn" href="javascript:void(0);" @click.stop="showSideMenu">
          <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </a>
        <nuxt-link :to="localePath(`/${$route.params.bu}/`)" class="navbar-brand logo">
          <img src="../assets/img/logo.png" class="img-fluid" alt="Logo" />
        </nuxt-link>
      </div>
      <div class="main-menu-wrapper">
        <div class="menu-header">
          <nuxt-link :to="localePath(`/${$route.params.bu}/`)" class="menu-logo">
            <img src="../assets/img/logo.png" class="img-fluid" alt="Logo" />
          </nuxt-link>
          <a id="menu_close" class="menu-close" @click="hideSideMenu" href="javascript:void(0);">
            <i class="fas fa-times"></i>
          </a>
        </div>
        <ul class="main-nav">
          <li @click="hideSideMenu">
            <nuxt-link :to="localePath(`/${$route.params.bu}/`)">{{$t("Home")}}</nuxt-link>
          </li>
          <!--          <li @click="hideSideMenu">-->
          <!--            <nuxt-link :to="localePath(`/${$route.params.bu}/doctors/أكرم-ماجد/checkout/checkout-free`)">{{$t("checkout")}}</nuxt-link>-->
          <!--          </li>-->
          <li @click="hideSideMenu" class="has-submenu">
            <nuxt-link :to="localePath(`/${$route.params.bu}/doctors`)">{{$t("Doctors")}}</nuxt-link>
          </li>
          <li @click="hideSideMenu" class="has-submenu">
            <nuxt-link :to="localePath(`/${$route.params.bu}/contact-us`)">{{$t("contact-us")}}</nuxt-link>
          </li>
          <li @click="hideSideMenu" class="has-submenu" v-if="$auth.loggedIn">
            <nuxt-link
              :to="localePath(`/${$route.params.bu}/user/person/online-consultation`)"
            >{{$t("onlineConsultation")}}</nuxt-link>
          </li>
          <li @click="hideSideMenu" class="has-submenu hide-bg" v-if="!this.$auth.loggedIn">
            <nuxt-link :to="localePath(`/${$route.params.bu}/auth/login`)">{{$t('login / Signup')}}</nuxt-link>
          </li>
          <li @click="hideSideMenu" class="has-submenu hide-bg" v-else>
            <nuxt-link
              :to="localePath(`/${$route.params.bu}/user/person/profile-settings`)"
            >{{$t('Profile')}}</nuxt-link>
          </li>
          <li class="has-submenu hide-bg" v-if="$i18n.locale != 'ar'">
            <!-- <nuxt-link :to="switchLocalePath('ar')" class="arabic lang">Ar</nuxt-link> -->
            <a @click="changeLang('ar')" class="arabic lang">Ar</a>
          </li>
          <li class="has-submenu hide-bg" v-else>
            <!-- <nuxt-link :to="switchLocalePath('en')" class="lang">En</nuxt-link> -->
            <a @click="changeLang('en')" class="lang">En</a>
          </li>
        </ul>
      </div>
      <ul class="nav header-navbar-rht">
        <li class="nav-item contact-item">
          <div class="header-contact-img">
            <i class="far fa-hospital"></i>
          </div>
          <div class="header-contact-detail">
            <p class="contact-header">{{$t('Contact')}}</p>
            <a href="tel:012-216-66-66" class="contact-info-header">012-216-66-66</a>
          </div>
        </li>
        <template>
          <li class="nav-item" v-if="!this.$auth.loggedIn">
            <nuxt-link
              :to="localePath(`/${$route.params.bu}/auth/login`)"
              class="nav-link header-login bu"
            >login / Signup</nuxt-link>
          </li>
          <nuxt-link
            :style="{marginLeft:$i18n.locale=='ar'?'0.7rem':'0'}"
            :to="localePath(`/${$route.params.bu}/user/person/profile-settings`)"
            v-else
          >
            <img :src="avatar()" class="img-fluid img-header" :class="{'doctor':true}" />
          </nuxt-link>
        </template>
        <li class="has-submenu hide-sm" v-if="$i18n.locale != 'ar'">
          <!--        :to="`/ar` + $route.fullPath"-->
          <!-- <nuxt-link :to="switchLocalePath('ar')" class="arabic lang">Ar</nuxt-link> -->
          <a @click="changeLang('ar')" class="arabic lang">Ar</a>
        </li>
        <li class="has-submenu hide-sm" v-else>
          <!-- <nuxt-link :to="switchLocalePath('en')" class="lang bu_lang">En</nuxt-link> -->

          <a @click="changeLang('en')" class="lang bu_lang">En</a>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: "Headr",
  data() {
    return {
      online: false,
      avatarImage: ""
    };
  },
  created() {
    if (!process.server) {
      if (this.$auth.strategy.name != `${this.$route.params.bu}Local`)
        if (this.$auth.loggedIn) this.$auth.logout();
    }
  },
  mounted() {
    document
      .getElementsByTagName("html")[0]
      .addEventListener("click", this.hideSideMenu);
    // if(this.$route.params.bu !== "hjh"){
    //   $('.header-navbar-rht li a.header-login,.lang').css(
    //     {
    //       'border':'2px solid #307AC4',
    //       'color': '#307AC4'
    //     }
    //     );
    //   $('.lang').css('background-color','#307AC4');
    //   $('.header-navbar-rht li a.header-login').hover(function(){
    //     $('.header-navbar-rht li a.header-login').css({'background-color':'#307AC4',color:'#fff'})
    //   },function(){
    //     $('.header-navbar-rht li a.header-login').css({'background-color':'transparent',color:'#307AC4'})
    //   });
    //   $('.lang').hover(function(){
    //     $('.lang').css({'background-color':'transparent',color:'#000'})
    //   },function(){
    //     $('.lang').css({'background-color':'#307AC4',color:'#307AC4'})
    //   })
    // }
  },
  head(context) {
    return {
      htmlAttrs: {
        lang: this.$i18n.locale,
        dir: this.$i18n.locale == "ar" ? "rtl" : "ltr"
      }
    };
  },
  methods: {
    avatar() {
      if (this.$auth.user.role === 2) {
        this.avatarImage = require("../assets/img/ag-audience-active.png");
        console.log(this.avatarImage);
        return this.avatarImage;
      } else if (this.$auth.user.role === 0) {
        this.avatarImage = require("../assets/img/avatar-doctor.png");
        console.log(this.avatarImage);
        return this.avatarImage;
      }
    },
    changeLang(lang) {
      this.$i18n.setLocale(lang);
    },
    changeToEn() {
      this.$i18n.locale = "en";
      window.history.replaceState("", "", this.switchLocalePath("en"));
      // this.$store.dispatch("setLangEn", "en");
      // this.$store.dispatch("setDirEn", "ltr");
      if ("en" === this.$store.state.i18n.locale) {
        return;
      }
      this.$store.commit("i18n/i18nSetLocale", "en");
      import(`../locales/en.js`).then(module => {
        this.$i18n.locale = "en";
        this.$i18n.setLocaleMessage("en", module.default);
        window.history.replaceState("", "", this.switchLocalePath("en"));
      });
    },
    changeToAr() {
      this.$i18n.locale = "ar";
      window.history.replaceState("", "", this.switchLocalePath("ar"));

      // this.$store.dispatch("setLangAr", "ar");

      // this.$store.dispatch("setDirAr", "rtl");
      if ("ar" === this.$store.state.i18n.locale) {
        return;
      }
      this.$store.commit("i18n/i18nSetLocale", "ar");
      import(`../locales/ar.js`).then(module => {
        this.$i18n.locale = "ar";
        this.$i18n.setLocaleMessage("ar", module.default);
        window.history.replaceState("", "", this.switchLocalePath("ar"));
      });
    },
    showSideMenu() {
      document.getElementsByTagName("html")[0].classList.add("menu-opened");
    },
    hideSideMenu() {
      document.getElementsByTagName("html")[0].classList = [];
    }
  }
};
</script>

<style scoped lang="scss">
.img-header {
  height: 40px;
  display: inline-block;
  margin-right: 1rem;
  border-radius: 50%;
}
a {
  cursor: pointer;
}

.doctor {
  // border: 2px solid rgba(197, 0, 0, 0.77);
}
.hide-bg {
  display: none;
}
@media only screen and (max-width: 992px) {
  .hide-bg {
    display: block;
  }
  .hide-sm {
    display: none;
  }
}
.lang {
  background: #307ac4;
  padding: 5px;
  border-radius: 50%;
  height: 40px;
  width: 40px;
  border: 2px solid transparent;
  color: #fff;
  transition: all ease-in-out 0.3s;
  @media (max-width: 992px) {
    width: 100%;
    height: auto;
    border-radius: 0;
  }
}
</style>
