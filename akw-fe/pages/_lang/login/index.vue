<template>
  <div class="login-page">
    <div class="pop-up-error">
      <p>{{$t('something went wrong')}}</p>
    </div>
    <div class="container login-mobile">
      <div class="row">
        <div class="col-12">
          <div>
            <div class="form text-center">
              <div class="d-flex justify-content-center align-items-center">
                <nuxt-link :to="localePath('/')">
                  <img src="@/assets/images/akw-logo.png" alt="logo" class="img-fluid logo-img">
                  <img src="@/assets/images/akw-type-logo.png" alt="logo" class="img-fluid logo-img">
                </nuxt-link>
              </div>
              <ValidationObserver v-slot="{ handleSubmit }">
                <form @submit.prevent="handleSubmit(login(loginInfo))" class="row">
                  <ValidationProvider rules="required" v-slot="{ errors }" class="col-12 my-2">
                    <label for="email" class="g-input">
                      <input id="email" type="email" :placeholder="$t('enter your email address')" v-model="loginInfo.email">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorMail" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <ValidationProvider rules="required" v-slot="{ errors }" class="col-12 my-2">
                    <label for="password" class="g-input">
                      <input id="password" type="password" :placeholder="$t('enter the password')"
                             v-model="loginInfo.password">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorPassword" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <div class="col-12 forgot-password d-none">
                    <nuxt-link to="/">forgot password?</nuxt-link>
                  </div>
                  <div class="col-12 d-flex justify-content-center align-items-center">
                    <button class="sign-in" type="submit">{{$t('sign in')}}</button>
                  </div>
                  <div class="social-icons justify-content-center align-items-center col-12">
                    <div class="mt-4">
                      <a href="#"><img src="@/assets/images/instagram.png" class="img-fluid icon" alt="insta"></a>
                      <a href="#"><img src="@/assets/images/twitter.png" class="img-fluid icon" alt="twitter"></a>
                      <a href="#"><img src="@/assets/images/facebook.png" class="img-fluid icon" alt="facebook"></a>
                      <a href="#"><img src="@/assets/images/gmail.png" class="img-fluid icon" alt="gmail"></a>
                    </div>
                  </div>
                  <div class="create-account d-flex justify-content-center align-items-center col-12 my-2">
                    <p class="text-center sign-in-paragraph">{{$t("don't have account ?")}}</p>
                    <nuxt-link class="account" :to="localePath('/register')">{{$t('create an account')}}</nuxt-link>
                  </div>
                  <div class="col-12 social-links">
                    <a href="#" class="app"><img src="@/assets/images/app.png"></a>
                    <a href="#" class="play"><img src="@/assets/images/play.png"></a>
                  </div>
                </form>
              </ValidationObserver>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import {ValidationProvider} from "vee-validate";
  export default {
    name: "index",
    layout: 'intro',
    components: { ValidationProvider},
    data() {
      return {
        loginInfo: {
          email: "",
          password: "",
        },
        error: null,
        errorMail: null,
        errorPassword: null
      }
    },
    methods: {
      async login(loginInfo) {
        try {
          await this.$auth.loginWith('local', {
            data: loginInfo
          });
        } catch (e) {
          this.error = e.response.data;
          $('.pop-up-error').animate({left:'1%'},700).delay(3000).animate({left:'-130%'},1700)
        }
      },
    }
  }
</script>

<style lang="scss" scoped>
  @import "assets/css/variable";
  @import "assets/css/shared";
  /* * {
     font-family: $main-font;
   }*/

  .login-page {
    background: $backgroundColor;
    background-image: url("../../../assets/images/background-login.png");
    @media (max-width: 1080px) {
      background-size: 320%;
    }
  }


  .sign-in-paragraph {
    margin-top: 1rem;
    text-transform: capitalize;
  }
  .logo-img{
    display: block;
    height: 64px;
    margin: 0 auto;
  }
  .forgot-password{
   a{
     width: 40%;
     display: flex;
     justify-content: flex-start;
     margin: .5rem auto;
     color: #fff;
   }
  }
  .account{
    display: inline-block;
    margin-right: .5rem;
    color: #fff;
    text-decoration: none;
    text-transform: capitalize;
  }
  .login-mobile{
    @media (max-width: 768px) {
      margin-top: 4rem;
    }
  }
  .social-links{
    display: none;
    @media (max-width: 600px) {
      display: block;
    }
  }
  html:lang(en){

  }
</style>
