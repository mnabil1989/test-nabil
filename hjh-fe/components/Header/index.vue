<template>
  <div>
    <header
      class="header"
      :class="{
      'show-menu-animation': menuClicked,
      'hide-menu-animation': showHideMenuAnim
    }"
      :dir="$i18n.locale === 'ar' ? 'rtl' : 'ltr'"
    >
      <Right />
      <Middle />
      <Left />
      <!-- <div
        class="book-now"
        v-if="!bookClicked"
        @click="showBookAnimation()"
        :class="{ 'show-animation': !bookClicked, 'hide-animation': bookClicked }"
      >{{$t('bookNow')}}</div>-->
      <div
        class="book-now"
        v-if="!bookClicked"
        @click="goToAndalusiaCare()"
        :class="{ 'show-animation': !bookClicked, 'hide-animation': bookClicked }"
      >{{$t('bookNow')}}</div>
      <div
        class="book-container"
        :class="{
        'show-animation': bookClicked,
        'hide-animation': showHideAnimation
      }"
      >
        <div @click="bookClicked = false" class="icon-close">
          <i class="fa fa-close"></i>
        </div>
        <form @submit.prevent>
          <div v-for="(item, index) in 4" :key="index" class="select-box">
            <div class="select-custom">
              <select>
                <option selected disabled>المستشفي</option>

                <option v-for="(item, index) in 3" :key="index">item{{ index }}</option>
              </select>
            </div>
          </div>
          <input type="submit" value="احجز" />
        </form>
      </div>
      <div class="chat-container">
        <a href="#"><img src="../../assets/img/facebook-messenger-logo-preview.png" alt="facebook-messenger"/></a>
        <a href="#"><img src="../../assets/img/logo whatsapp.png" alt="whatsapp"/></a>
      </div>
    </header>
    <div class="header-mobile">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-3 menu-tap toggle-menu">
            <div class="toggle-span" @click="showSlide = !showSlide">
              <span
                :style="showSlide? 'transform : translateY(125%) translateX(50%) rotate(-45deg) ; margin : 0':''"></span>
              <span
                :style="showSlide? 'opacity : 0 ; margin : 0' : 'transform : translateX(25%) ; opacity : 1 ; margin: .4rem 0'"></span>
              <span
                :style="showSlide? 'transform : translateY(-50%) translateX(50%) rotate(45deg) ;  margin : 0 ' : ''"></span>
            </div>
          </div>
          <div class="col-md-6 col-9 logo-menu-mobile">
            <div class="logo">
              <nuxt-link to="/home">
                <img src="@/assets/img/logo-header.webp" alt="logo-andalusia" class="logo"/>
              </nuxt-link>
            </div>
            <transition name="slide-fade">
              <div class="menu-mobile" v-if="showSlide">
                <ul>
                  <li v-if="!$auth.loggedIn" @click="showSlide = false">
                    <nuxt-link :to="localePath('/auth/login')">{{$t('login')}}</nuxt-link>
                  </li>
                  <li v-if="$auth.loggedIn">
                    <nuxt-link :to="localePath('/profile')" class="profile-img"><img :src="$auth.user.avatar" alt="profile-img"></nuxt-link>
                  </li>
                  <li v-if="$auth.loggedIn">
                    <nuxt-link :to="localePath('/profile')">{{$t('profile')}}</nuxt-link>
                  </li>
                  <li v-if="$auth.loggedIn">
                    <a class="last-item" @click="logout()">{{$t('logout')}}</a>
                  </li>
                  <li @click="showSlide = false">
                    <nuxt-link :to="localePath('/service')">{{$t('services')}}</nuxt-link>
                  </li>
                  <li  @click="showSlide = false">
                    <nuxt-link :to="localePath('/clinic')">{{$t('clinics')}}</nuxt-link>
                  </li>
                  <li  @click="showSlide = false" v-for="(item, index) in getNaveMenu" :key="index">
                    <nuxt-link :to="localePath(`${item.url}`)">{{ item.name }}</nuxt-link>
                  </li>
                </ul>
              </div>
            </transition>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Right from "./Right.vue";
import Middle from "./Middle.vue";
import Left from "./Left";
import IconBar from "@/components/Common/IconBar";
import { mapGetters } from "vuex";

export default {
  components: { Right, Middle, Left },
  data() {
    return {
      showSlide: false,
      itemTextColor: "#4465a8",
      bookIntialized: false,
      bookClicked: false,
      menuClicked: false,
      menuIntialized: false
    };
  },
  methods: {
    goToAndalusiaCare() {
      this.$router.push(this.localePath("/book"));
      // window.location.href = "https://www.andalusia.care/hjh";
    },
    showBookAnimation() {
      this.bookIntialized = true;
      this.bookClicked = true;
    },
    showMenuAnimation() {
      this.menuIntialized = true;
      this.menuClicked = !this.menuClicked;
    }
  },
  computed: {
    ...mapGetters({
      secondContainerItemList: "router/getHomeMenu",
      getNaveMenu: "home/getMenu"
    }),
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
  .profile-img{
    display: block;
    img{
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin: 0 auto;
    }
  }
/* header */
html,
body {
  height: 100%;
  width: 100%;
  margin: 0px;
}

body {
  background-repeat: no-repeat;
  background-size: cover;
}

.header {
  position: relative;
  padding: 0 2%;
  display: grid;
  grid-template-columns: 1fr 3fr 1fr;
  border: solid 1px #ffc77a;
  font-size: 0.75rem;
  @media (max-width: 992px) {
    display: none;
  }
}
.show-menu-animation {
  animation: show-menu 2s forwards;
}
.hide-menu-animation {
  animation: hide-menu 2s forwards;
}
@keyframes show-menu {
  0% {
    max-height: 150px;
  }
  100% {
    max-height: 250vw;
  }
}
@keyframes hide-menu {
  0% {
    max-height: 250vw;
  }
  100% {
    max-height: 150px;
  }
}
.hamb-icon {
  font-size: 400%;
  cursor: pointer;
  display: none;
  color: #1d4590;
  justify-self: right;
}
.book-now {
  position: fixed;
  right: 0;
  bottom: 0;
  background: #e8e9ef;
  padding: 14px 30px;
  font-size: 20px;
  border-radius: 10px 0 0 10px;
  cursor: pointer;
  color: #1d4590;
  z-index: 90;
  box-shadow: 0 8px 21px 0 rgba(0, 0, 0, 0.17);
  transition: all ease-in-out .5s;
  @media (max-width: 500px) {
    padding: 10px;
    font-size: 15px;
    border-radius: 5px 0 0 5px;
  }
}
.book-now:hover {
  background: #ffc77a;
  color: #1d4590;
}
.chat-container {
  position: fixed;
  left: 0;
  padding-top: 0.2vw;
  padding-bottom: 0.2vw;
  top: 50vh;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  width: 3.91vw;
  height: 85px;
  z-index: 90;
  border-top-right-radius: 10px;
  border: solid 1px #70707007;
  background-color: #c756a10c;
}
.chat-container img {
  width: 2.703vw;
  height: 2.703vw;
}
.chat-container img:last-child {
  width: 2.703vw;
  height: 2.703vw;
}
/************************************************************************************ */
/* BOOk-CONTAINER */
/************************************************************************************ */

.book-container {
  opacity: 0;
  position: relative;
  background: #e8e9ef;
  height: 40.325vw;
  width: 29.001%;
  padding-top: 9.5%;
  position: fixed;
  bottom: 0;
  right: 0;
  z-index: -1;
}

.show-animation {
  animation: show-book 1s forwards;
}
.hide-animation {
  animation: hide-book 1s forwards;
}
@keyframes show-book {
  0% {
    opacity: 0;
    z-index: -1;
  }
  1% {
    z-index: 9999;
  }
  100% {
    z-index: 9999;

    opacity: 1;
  }
}
@keyframes hide-book {
  0% {
    opacity: 1;
    z-index: 99999;
  }
  99% {
    z-index: 99999;
  }
  100% {
    z-index: -1;

    opacity: 0;
  }
}
.select-custom {
  position: absolute;
  width: 100%;
  top: 0;
}
.icon-close {
  position: absolute;
  top: 20px;
  left: 5%;
  cursor: pointer;
  color: white;
  font-size: 28px;
}
.select-box {
  position: relative;
  width: 100%;
}

.book-container form {
  margin: 0;
  padding: 0;
  height: 22vw;
  display: flex;
  flex-direction: column;
  width: 70%;
  margin: 0 auto;
  align-items: center;
  justify-content: space-between;
}
.book-container input[type="submit"] {
  align-self: flex-end;
  color: #1d4590;
  outline: none;
  border: none;
  width: 30%;
  border-radius: 30px;
  padding-left: 5px;
  padding-right: 5px;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  background-color: #ffffff;
}

.select-custom select {
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  background-color: #ffffff;
  color: #1d4590;
  width: 100%;
  height: 6vh;
  padding: 0 1.5vw;
  cursor: pointer;
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  outline: none;
  border-radius: 27px;
}
.select-custom::after {
  color: #1d4590;
  display: flex;
  justify-content: center;
  align-items: center;
  content: "\25BC";
  border-top-right-radius: 27px;
  border-bottom-right-radius: 27px;
  position: absolute;
  pointer-events: none;
  cursor: pointer;
  font-size: 5.6px;
  top: 0;
  left: 0;
  width: 12%;
  height: 6vh;
}

/************************************************************************************ */
/* BOOk-CONTAINER */
/************************************************************************************ */

@media only screen and (max-width: 500px) {
  .book-container {
    padding-top: 20%;
    height: 100vw;
    width: 70%;
  }
  .book-container form {
    height: 65vw;
    width: 70%;
  }
  .chat-container {
    height: 65px;
    width: 15vw;
  }
  .chat-container img {
    width: 8vw;
    height: 8vw;
  }
  .chat-container img:last-child {
    width: 8vw;
    height: 8vw;
  }
}

@media only screen and (min-width: 500px) {
  .book-container {
    padding-top: 13%;
    height: 70vw;
    width: 50%;
  }
  .book-container form {
    height: 50vw;
    width: 70%;
  }
  .chat-container {
    height: 70px;
    width: 7vw;
  }
  .chat-container img {
    width: 5vw;
    height: 5vw;
  }
  .chat-container img:last-child {
    width: 4.8vw;
    height: 4.8vw;
  }
}
@media only screen and (min-width: 600px) {
  .book-container {
    padding-top: 9.5%;
    height: 50vw;
    width: 40%;
  }
  .book-container form {
    height: 35vw;
    width: 70%;
  }
  .chat-container {
    height: 70px;
    width: 15vw;
  }
  .chat-container img {
    width: 3.8vw;
    height: 3.8vw;
  }
  .chat-container img:last-child {
    width: 3.4vw;
    height: 3.4vw;
  }
}

@media only screen and (min-width: 800px) {
  .book-container {
    padding-top: 9.5%;
    height: 40vw;
    width: 33%;
  }
  .book-container form {
    height: 28vw;
    width: 70%;
  }
  .chat-container {
    height: 75px;
  }
  .chat-container img {
    width: 3.2vw;
    height: 3.2vw;
  }
  .chat-container img:last-child {
    width: 3vw;
    height: 3vw;
  }
}

@media only screen and (max-width: 850px) {
  .header {
    grid-template-columns: 1fr;
    max-height: 42px;
    padding: 1% 2%;
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
      max-height: 42px;
    }
    100% {
      max-height: 250vw;
    }
  }
  @keyframes hide-menu {
    0% {
      max-height: 250vw;
    }
    100% {
      max-height: 42px;
    }
  }
  .hamb-icon {
    display: block;
    font-size: 25px;
  }
}

@media only screen and (min-width: 900px) {
  .book-container {
    padding-top: 9.5%;
    height: 37.5vw;
    width: 29.001%;
  }

  .book-container form {
    height: 22vw;
    width: 70%;
  }
}

@media screen and (min-width: 950px) {
  .chat-container {
    height: 85px;
    width: 4vw;
  }
  .chat-container img {
    width: 2.703vw;
    height: 2.703vw;
  }
  .chat-container img:last-child {
    width: 2.2vw;
    height: 2.2vw;
  }
}
.header-mobile {
  display: none;
  background-color: rgba(255, 255, 255, 0.95);
  z-index: 9999;
  position: fixed;
  top: 0;
  right: 0;
  left: 0;

  @media (max-width: 992px) {
    display: block;
  }

  .toggle-menu {
    display: flex;
    justify-content: flex-end;
    align-items: center;

    div {
      width: 50px;
      margin-left: auto;
      margin-right: 2rem;
      @media (max-width: 600px) {
        margin-right: 1.3rem;
      }
    }

    span {
      display: block;
      margin: .4rem 0;
      width: 100%;
      height: 2px;
      background-color: #1d4590;
    }
  }

  .toggle-span {
    span {
      &:first-of-type{
        transform : translateX(50%) rotate(0) ; margin: .4rem 0
      }
      &:last-of-type{
        transform : translateX(50%) rotate(0) ; margin: .4rem 0
      }
      transition: all linear .3s;
    }
  }

  .logo-menu-mobile {
    position: relative;

    .logo {
      margin: .5rem 0 .5rem 2rem;
      display: flex;
      justify-content: flex-end;
      align-items: center;

      img {
        height: 50px;
      }

      @media (max-width: 600px) {
        margin: .5rem 0 .5rem 0;
        img {
          height: 40px;
        }
      }
    }

    .menu-mobile {
      width: 85%;
      background-color: rgba(255, 255, 255, 0.95);
      height: 100%;
      margin-right: auto;
      top: 72px;
      left: 0;
      position: fixed;
      overflow: auto;
      ul {
        li {
          a, span {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            margin: 1rem 0;
            padding-right: .5rem;
            color: #1d4590;
            text-transform: capitalize;
          }

          border-bottom: 1px solid #f5ae48;

          &:last-of-type {
            border-bottom: none;
          }
        }
      }

      .key-sub-menu {
        margin-bottom: 0.5rem;
      }

      .sub-menu {
        li {
          a, span {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
            margin: .5rem 0;
            margin-top: 0;
            padding-right: 3rem;
            color: #1d4590;
          }

          border-bottom: 1px solid #f5ae48;

          &:last-of-type {
            border-bottom: none;
          }
        }
      }
    }

    .fa-plus, .fa-minus {
      margin: 0 .3rem;
      transition: all ease-in-out .4s;
    }
  }
}
</style>
