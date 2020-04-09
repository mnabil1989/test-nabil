<template>
  <header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
      <div class="navbar-header">
        <a id="mobile_btn" href="javascript:void(0);" @click="showSideMenu">
          <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </a>
        <nuxt-link :to="localePath('/')" class="navbar-brand logo">
          <img src="../assets/img/logo.png" class="img-fluid" alt="Logo" />
        </nuxt-link>
      </div>
      <div class="main-menu-wrapper">
        <div class="menu-header">
          <nuxt-link :to="localePath('/')" class="menu-logo">
            <img src="../assets/img/logo.png" class="img-fluid" alt="Logo" />
          </nuxt-link>
          <a id="menu_close" class="menu-close" @click="hideSideMenu" href="javascript:void(0);">
            <i class="fas fa-times"></i>
          </a>
        </div>
        <ul class="main-nav">
          <li>
            <nuxt-link :to="localePath('/')">{{$t("Home")}}</nuxt-link>
          </li>
          <li class="has-submenu">
            <nuxt-link :to="localePath('/doctors/search')">{{$t("Doctors")}}</nuxt-link>
          </li>
          <li class="has-submenu" v-if="$auth.loggedIn">
            <nuxt-link
              :to="localePath('/user/person/online-consultation')"
            >{{$t("onlineConsultation")}}</nuxt-link>
          </li>
          <li class="has-submenu hide-bg" v-if="!this.$auth.loggedIn">
            <nuxt-link :to="localePath('/auth/login')">{{$t('login / Signup')}}</nuxt-link>
          </li>
          <li class="has-submenu hide-bg" v-else>
            <nuxt-link :to="localePath('/user/person/profile-settings')">{{$t('Profile')}}</nuxt-link>
          </li>
          <li class="has-submenu hide-bg" v-if="$i18n.locale != 'ar'">
            <nuxt-link @click="changeToAr" :to="switchLocalePath('ar')">العربيه</nuxt-link>
          </li>
          <li class="has-submenu hide-bg" v-else>
            <nuxt-link :to="switchLocalePath('en')" @click="changeToEn">En</nuxt-link>
          </li>
          <!--          <li class="has-submenu">-->
          <!--            <a href="#">Patients <i class="fas fa-chevron-down"></i></a>-->
          <!--            <ul class="submenu">-->
          <!--              <li><a href="search.html">Search Doctor</a></li>-->
          <!--              <li><a href="doctor-profile.html">Doctor Profile</a></li>-->
          <!--              <li><a href="booking.html">Booking</a></li>-->
          <!--              <li><a href="checkout.html">Checkout</a></li>-->
          <!--              <li><a href="booking-success.html">Booking Success</a></li>-->
          <!--              <li><a href="patient-dashboard.html">Patient Dashboard</a></li>-->
          <!--              <li><a href="favourites.html">Favourites</a></li>-->
          <!--              <li><a href="chat.html">Chat</a></li>-->
          <!--              <li><a href="profile-settings.html">Profile Settings</a></li>-->
          <!--              <li><a href="change-password.html">Change Password</a></li>-->
          <!--            </ul>-->
          <!--          </li>-->
          <!--          <li class="has-submenu active">-->
          <!--            <a href="#">Pages <i class="fas fa-chevron-down"></i></a>-->
          <!--            <ul class="submenu">-->
          <!--              <li><a href="voice-call.html">Voice Call</a></li>-->
          <!--              <li><a href="video-call.html">Video Call</a></li>-->
          <!--              <li><a href="search.html">Search Doctors</a></li>-->
          <!--              <li><a href="calendar.html">Calendar</a></li>-->
          <!--              <li><a href="components.html">Components</a></li>-->
          <!--              <li class="has-submenu">-->
          <!--                <a href="invoices.html">Invoices</a>-->
          <!--                <ul class="submenu">-->
          <!--                  <li><a href="invoices.html">Invoices</a></li>-->
          <!--                  <li><a href="invoice-view.html">Invoice View</a></li>-->
          <!--                </ul>-->
          <!--              </li>-->
          <!--              <li class="active"><a href="blank-page.html">Starter Page</a></li>-->
          <!--              <li><a href="login.html">Login</a></li>-->
          <!--              <li><a href="register.html">Register</a></li>-->
          <!--              <li><a href="forgot-password.html">Forgot Password</a></li>-->
          <!--            </ul>-->
          <!--          </li>-->
          <!--          <li class="has-submenu">-->
          <!--            <a href="#">Blog <i class="fas fa-chevron-down"></i></a>-->
          <!--            <ul class="submenu">-->
          <!--              <li><a href="blog-list.html">Blog List</a></li>-->
          <!--              <li><a href="blog-grid.html">Blog Grid</a></li>-->
          <!--              <li><a href="blog-details.html">Blog Details</a></li>-->
          <!--            </ul>-->
          <!--          </li>-->
          <!--          <li>-->
          <!--            <a href="admin/index.html" target="_blank">Admin</a>-->
          <!--          </li>-->

          <!-- <li class="login-link" v-else>
            <img src="../assets/img/ag-logo.png" class="img-fluid" />
          </li>-->
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
            <nuxt-link :to="localePath('/auth/login')" class="nav-link header-login">login / Signup</nuxt-link>
          </li>
          <nuxt-link
            :style="{marginLeft:$i18n.locale=='ar'?'0.7rem':'0'}"
            :to="localePath('/user/person/profile-settings')"
            v-else
          >
            <img
              src="../assets/img/ag-audience-active.png"
              class="img-fluid img-header"
              :class="{'doctor':true}"
            />
          </nuxt-link>
        </template>
        <li class="has-submenu hide-sm" v-if="$i18n.locale != 'ar'">
          <!--        :to="`/ar` + $route.fullPath"-->
          <nuxt-link
            @click="changeToAr"
            :to="switchLocalePath('ar')"
            class="arabic lang"
            style="color: #fff"
          >العربيه</nuxt-link>
        </li>
        <li class="has-submenu hide-sm" v-else>
          <nuxt-link
            style="color: #fff"
            class="lang"
            :to="switchLocalePath('en')"
            @click="changeToEn"
          >En</nuxt-link>
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
      online: false
    };
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
    changeToEn() {
      this.$store.dispatch("setLangEn", "en");
      this.$store.dispatch("setDirEn", "ltr");
    },
    changeToAr() {
      this.$store.dispatch("setLangAr", "ar");
      this.$store.dispatch("setDirAr", "rtl");
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
</style>
