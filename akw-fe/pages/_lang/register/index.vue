<template>
  <div class="login-page">
    <div class="pop-up-error">
      <div v-if="errorName.length >= 1 && $i18n.locale === 'en'">
        <p v-for="nameError in errorName" :key="nameError">{{nameError}}</p>
      </div>
      <div v-if="errorName.length >= 1 && $i18n.locale === 'ar'">
        <p>مطلوب كتابه الإسم</p>
      </div>
      <div v-if="errorMail.length >= 1 && $i18n.locale === 'en'">
        <p v-for="emailError in errorMail" :key="emailError">{{emailError}}</p>
      </div>
      <div v-if="errorMail.length >= 1 && $i18n.locale === 'ar'">
        <p>تحقق من البريد الإلكترونى</p>
      </div>
      <div
        v-if="errorMail.join('') === 'The email has already been taken.'&& $i18n.locale === 'ar'"
      >
        <p>البريد الإلكترونى موجود بالفعل</p>
      </div>
      <!--      v-if="errorMail.join('') === 'The email has already been taken.'-->
      <div v-if="errorPassword.length >= 1 && $i18n.locale === 'en'">
        <p v-for="passwordError in errorPassword" :key="passwordError">{{passwordError}}</p>
      </div>
      <div v-if="errorPassword.join('') === 'The password must be at least 6 characters'  && $i18n.locale === 'ar'">
        <p>  الرقم السرى يجب ان يكون من 6 ارقام فاكثر</p>
      </div>
      <div v-if="errorPassword.length >= 1 && $i18n.locale === 'ar'">
        <p>مطلوب الرقم السرى</p>
      </div>
      <div v-if="errorPhone.length >= 1 && $i18n.locale === 'en'">
        <p v-for="phoneError in errorPhone" :key="phoneError">{{phoneError}}</p>
      </div>
      <div v-if="errorPhone.length >= 1 && $i18n.locale === 'ar'">
        <p>تحقق من رقم الهاتف</p>
      </div>
      <div v-if="errorPhone.join('') === 'The phone has already been taken.' && $i18n.locale === 'ar'">
        <p>رقم الهاتف موجود بالفعل</p>
      </div>
      <!--      <p>{{$t('please check your credentials')}}</p>-->
    </div>
    <div class="container">
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
                <form @submit.prevent="handleSubmit(submit(registerInfo))" class="row">
                  <div class="heading">
                  </div>
                  <ValidationProvider rules="required" v-slot="{ errors }" class="col-12 my-2">
                    <label for="name" class="g-input">
                      <input id="name" type="text" autocomplete :placeholder="$t('enter your full name')"
                             v-model="registerInfo.name">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorName" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <ValidationProvider rules="required|email" v-slot="{ errors }" class="col-12 my-2">
                    <label for="email" class="g-input">
                      <input id="email" type="email" autocomplete :placeholder="$t('enter your email address')"
                             v-model="registerInfo.email">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorMail" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <ValidationProvider rules="required" v-slot="{ errors }" vid="confirmation" class="col-12 my-2">
                    <label for="password" class="g-input">
                      <input id="password" autocomplete type="password" :placeholder="$t('enter the password')"
                             v-model="registerInfo.password">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorPassword" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <ValidationProvider rules="required|confirmed:confirmation" v-slot="{ errors }" class="col-12 my-2">
                    <label for="confirm-password" class="g-input">
                      <input id="confirm-password" autocomplete type="password" :placeholder="$t('confirm password')"
                             v-model="registerInfo.password_confirmation">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorConfirmationPassword" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <ValidationProvider :rules="{regex: /^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/}" v-slot="{ errors }" class="col-12 my-2">
                    <label for="phone" class="g-input">
                      <span class="phone-ksa">{{phoneKsa}}</span>
                      <input id="phone" maxlength="8" autocomplete type="tel" v-model="registerInfo.phone">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorPhone" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <div class="col-12">
                    <button class="sign-in account">{{$t('create an account')}}</button>
                  </div>
                  <div class="social-icons justify-content-center align-items-center col-12">
                    <div class="mt-4">
                      <a href="#"><img src="@/assets/images/instagram.png" class="img-fluid icon" alt="insta"></a>
                      <a href="#"><img src="@/assets/images/twitter.png" class="img-fluid icon" alt="twitter"></a>
                      <a href="#"><img src="@/assets/images/facebook.png" class="img-fluid icon" alt="facebook"></a>
                      <a href="#"><img src="@/assets/images/gmail.png" class="img-fluid icon" alt="gmail"></a>
                    </div>
                  </div>
                  <nuxt-link class="alt-link" :to="localePath('/login')">{{$t('have an account')}}</nuxt-link>
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
  import axios from "axios";

  export default {
    name: "index",
    layout: 'intro',
    components: {},
    data() {
      return {
        phoneKsa: '+966 5',
        registerInfo: {
          name: "",
          email: "",
          address: "s",
          gender: "male",
          password: null,
          password_confirmation: null,
          phone: null,
        },
        errors: [],
        errorName: [],
        errorMail: [],
        errorPassword: [],
        errorConfirmationPassword: [],
        errorPhone: [],
      }
    },
    methods: {
      async submit(registerInfo) {
        await this.$axios.post('/api/register', registerInfo).then(res => {
          this.$auth.loginWith("local", {
            data: registerInfo
          });
          console.log(res);
        })
          .catch(e => {
            let errors = e.response.data;
            console.log(errors);
            this.errorName = errors.name ? errors.name : [];
            this.errorMail = errors.email ? errors.email : [];
            this.errorPassword = errors.password ? errors.password : [];
            this.errorConfirmationPassword = errors.password_confirmation ? errors.password_confirmation : [];
            this.errorPhone = errors.phone ? errors.phone : [];
            $('.pop-up-error').animate({left:'1%'},700).delay(3000).animate({left:'-130%'},1700)
          });
      }
    },
    mounted() {

    }
  }
</script>

<style lang="scss" scoped>
  @import "assets/css/shared";
  @import "assets/css/variable";
  .login-page {
    background-image: url("../../../assets/images/background-login.png") ;
  }

  .form {
    color: #F5F5F5;
    border-radius: 60px;
    z-index: 22;
    @media (max-width: 425px) {
      border-radius: 40px;
    }

    img {
      height: 75px;
      display: inline-block;
      margin: 1rem 0;
    }

    .alt-link {
      display: block;
      text-transform: capitalize;
      text-align: center;
      width: 71%;
      margin: 0 auto;
      margin-bottom: 1rem;
      font-size: 12px;
      color: #fff;
    }

    .sign-in {
      width: 50%;
      height: 35px;
      margin: 0 auto;
      border-radius: 14px;
      box-shadow: 0 2px 4px 0 rgba(4, 102, 122, 0.13);
      border: solid 1px #0074c0;
      background: transparent;
      color: #fff;
      transition: all linear .3s;
      text-transform: capitalize;
      @media (max-width: 425px) {
        width: 75%;
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
      height: 35px;
      border-radius: 14px;
      box-shadow: 0 2px 4px 0 rgba(4, 102, 122, 0.13);
      border: solid 1px #fff;
      background: transparent;
      color: #fff;
      transition: all linear .3s;
      text-transform: capitalize;
      @media (max-width: 425px) {
        width: 50%;
      }
    }
  }
.g-input{
  position: relative;
  .phone-ksa{
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
    direction: ltr;
  }
}
</style>
