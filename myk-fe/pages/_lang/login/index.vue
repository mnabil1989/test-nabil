<template>
  <div class="login-page">
    <div class="pop-up-error">
      <p>{{$t('something went wrong')}}</p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-7"></div>
        <div class="col-lg-5">
          <div class="hold-bordered-form">
            <div class="bordered"></div>
            <div class="bordered"></div>
            <div class="form text-center">
              <ValidationObserver v-slot="{ handleSubmit }">
                <form @submit.prevent="handleSubmit(login(loginInfo))">
                  <div class="heading">
                    <nuxt-link :to="localePath('/')">
                      <img src="../../../assets/images/login-form.png">
                    </nuxt-link>
                  </div>
                  <ValidationProvider rules="required" v-slot="{ errors }">
                    <label for="email" class="g-input">
                      <input id="email" type="email" :placeholder="$t('enter your email address')" v-model="loginInfo.email">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorMail" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <ValidationProvider rules="required" v-slot="{ errors }">
                    <label for="password" class="g-input">
                      <input id="password" type="password" :placeholder="$t('enter the password')" v-model="loginInfo.password">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorPassword" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <a class="alt-link d-none" href="#">forget your password</a>
                  <button class="sign-in" type="submit">{{$t('sign in')}}</button>
                  <p class="my-4">{{$t('or login with')}}</p>
                  <div>
                    <div class="social-links">
<!--                      <a @click="fbLogin()"><img src="../../assets/images/face.png" alt="face" class="social-icon"></a>-->
                      <a @click="googleLogin()"><img src="../../../assets/images/google.png" alt="face" class="social-icon"></a>
                    </div>
                  </div>
                  <nuxt-link class="alt-link account" :to="localePath('/register')">{{$t('create account')}}</nuxt-link>
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
  import SocialLinks from "../../../components/SocialLinks";
  import {ValidationProvider} from "vee-validate";
  import ImageProfile from "../../../components/ImageProfile";

  export default {
    name: "index",
    components: {ImageProfile, SocialLinks, ValidationProvider},
    data() {
      return {
        loginInfo: {
          email: "",
          password: "",
        },
        error: null,
        errorMail: null,
        errorMailAr: '',
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
          $(".pop-up-error")
            .animate({left: ".5%"}, 1000)
            .delay(4000)
            .animate({left: "-130%"}, 1500);
        }
      },
      // fbLogin() {
      //   try {
      //     this.$auth.loginWith(`facebook`)
      //       .then(function (r) {
      //         console.log(r)
      //       })
      //   } catch (e) {
      //     this.error = e.response.data;
      //     console.log(this.error);
      //   }
      // },
      googleLogin() {
        let google =  this.$auth.loginWith(`google`);
        console.log(google);
      },
    }
  }
</script>

<style lang="scss" scoped>
  $main-color: #bb8f32;
  $opacity-color: rgba(0, 97, 159, 0.25);
  $main-font: 'Poppins';
  * {
    font-family: $main-font;
  }

  .login-page {
    background: linear-gradient(to right, $opacity-color, $opacity-color), url("../../../assets/images/login-background.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50% 32%;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .form {
    padding-top: 2rem;
    color: #F5F5F5;
    border: solid 1px #0074c0;
    border-radius: 60px;
    z-index: 22;
    transition: all linear .3s;
    @media (max-width: 425px) {
      border-radius: 40px;
    }

    img {
      height: 64px;
      display: inline-block;
      margin: 1rem 0;
    }

    .g-input {
      width: 80%;
      margin: 0 auto;
      display: inline-block;
      background: transparent;
      margin-bottom: 1rem;

      input {
        width: 100%;
        display: block;
        background: transparent;
        border-radius: 14px;
        box-shadow: 0 2px 4px 0 rgba(4, 102, 122, 0.13);
        border: solid 1px #0074c0;
        padding: .5rem 0 .5rem 1.5rem;
        outline: none;
        color: #fff;
        transition: all linear .3s;

        &::placeholder {
          text-transform: capitalize;
          color: #fff;
        }

        &:focus {
          box-shadow: 0 2px 4px 0 rgba(4, 163, 185, 0.13);
          background: rgba(4, 163, 185, 0.3);
          color: #fff;
        }
      }
    }

    .alt-link {
      display: block;
      text-transform: capitalize;
      text-align: left;
      width: 71%;
      margin: 0 auto;
      margin-bottom: 1rem;
      font-size: 12px;
      color: #ccd1e0;
    }

    .sign-in {
      width: 25%;
      height: 35px;
      margin: 0 auto;
      border-radius: 14px;
      box-shadow: 0 2px 4px 0 rgba(4, 102, 122, 0.13);
      border: solid 1px #0074c0;
      background: transparent;
      color: #fff;
      outline: none;
      transition: all linear .3s;
      @media (max-width: 425px) {
        width: 50%;
      }

      &:hover {
        box-shadow: 0 2px 4px 0 rgba(4, 163, 185, 0.13);
        background: rgba(4, 163, 185, 0.3);
        color: #fff;
      }
    }

    .account {
      display: block;
      margin: .5rem auto;
      width: 30%;
      text-align: center;
      @media (max-width: 425px) {
        width: 50%;
      }
    }
  }

  .hold-bordered-form {
    position: relative;
    margin-top: 5rem;

    .bordered {
      border: solid 1px #0074c0;
      border-right: solid 1px #0074c0;
      border-left: solid 1px #0074c0;
      border-bottom: transparent;
      border-top-right-radius: 40px;
      border-top-left-radius: 40px;
      position: absolute;
      width: 100%;
      height: 70px;
      top: -1rem;
      z-index: 2;
      &:first-of-type {
        top: -3rem;
        height: 67px;
      }
    }
  }
  .p-error {
    color: $main-color;
    width: 80%;
    margin: 0 auto;
    display: inline-block;
    background: transparent;
    margin-bottom: .3rem;
    text-align: right;
  }
  .social-links {
    margin: 1rem auto;
    width: 40%;
    display: flex;
    justify-content: center;
    align-items: center;
    @media (max-width: 425px) {
      width: 80%;
    }
    .social-icon {
      height: 26px;
      cursor: pointer;
    }
  }
  .pop-up-error{
    top: 5%;
  }
</style>
