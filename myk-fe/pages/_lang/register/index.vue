<template>
  <div class="login-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-7"></div>
        <div class="col-lg-5">
          <div class="hold-bordered-form">
            <div class="bordered"></div>
            <div class="bordered"></div>
            <div class="form text-center">
              <ValidationObserver v-slot="{ handleSubmit }">
                <form @submit.prevent="handleSubmit(submit(registerInfo))">
                  <div class="heading">
                    <nuxt-link :to="localePath('/')">
                      <img src="../../../assets/images/login-form.png">
                    </nuxt-link>
                  </div>
                  <ValidationProvider rules="required" v-slot="{ errors }">
                    <label for="name" class="g-input">
                      <input id="name" type="text" autocomplete :placeholder="$t('enter your full name')"
                             v-model="registerInfo.name">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorName" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <ValidationProvider rules="required|email" v-slot="{ errors }">
                    <label for="email" class="g-input">
                      <input id="email" type="email" autocomplete :placeholder="$t('enter your email address')"
                             v-model="registerInfo.email">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorMail" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <ValidationProvider rules="required" v-slot="{ errors }" vid="confirmation">
                    <label for="password" class="g-input">
                      <input id="password" autocomplete type="password" :placeholder="$t('password')"
                             v-model="registerInfo.password">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorPassword" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <ValidationProvider rules="required|confirmed:confirmation" v-slot="{ errors }">
                    <label for="confirm-password" class="g-input">
                      <input id="confirm-password" autocomplete type="password" :placeholder="$t('confirm password')"
                             v-model="registerInfo.password_confirmation">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorConfirmationPassword" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <ValidationProvider :rules="{regex: /^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/,required}" v-slot="{ errors }">
                    <label for="phone" class="g-input">
                      <span class="phone-ksa">{{phoneKsa}}</span>
                      <input id="phone" autocomplete type="tel" maxlength="8" v-model="registerInfo.phone">
                    </label>
                    <p class="p-error">{{ errors[0] }}</p>
                    <div v-for="error in errorPhone" :key="error">
                      <p class="p-error">{{error}}</p>
                    </div>
                  </ValidationProvider>
                  <button class="sign-in">{{$t('create account')}}</button>
                  <nuxt-link class="alt-link account" :to="localePath('/login')">{{$t('sign in')}}</nuxt-link>
                  <SocialLinks></SocialLinks>
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
  import SocialLinks from "@/components/SocialLinks";
  import axios from "axios";

  export default {
    name: "index",
    components: {SocialLinks},
    data() {
      return {
        phoneKsa:'+966 05',
        registerInfo: {
          name: "",
          email: "",
          // avatar:'test.png',
          address: "s",
          gender: "male",
          password: '',
          password_confirmation: '',
          phone: '',
        },
        errorName: null,
        errorMail: null,
        errorPassword: null,
        errorConfirmationPassword: null,
        errorPhone: null,
        errors: []
      }
    },
    methods: {
      async submit(registerInfo) {
        await this.$axios.post('/api/register', registerInfo).then(res => {
          this.$auth.loginWith("local", {
            data: registerInfo
          });
        })
          .catch(e => {
            let errors = e.response.data;
            this.errorName = errors.name;
            this.errorMail = errors.email;
            this.errorPassword = errors.password;
            this.errorConfirmationPassword = errors.password_confirmation;
            this.errorPhone = errors.phone;
          });
      }
    },
    created() {
      if (process.client) {
        if (this.$auth.strategy.name === `google`) {
          let access_token = this.$router.currentRoute.hash;
          let res = access_token.split('&');
          let y = res.map(x => x.split("="));
          this.final_access_token = y.length > 1 ? y[1][1] : null;
          let objectGoogleLogin = {
            "token": `${this.final_access_token}`,
            "provider": "google",
          };
          axios.post(`/api/social-login`, objectGoogleLogin).then(res => {
            this.$store.dispatch('setStateLogin', true);
            this.$auth.setToken('local', this.final_access_token);
            console.log(this.$auth.$state.loggedIn);
            console.log(res.data);
            // get data from google
          }).catch(e => {
              console.log(e);
              axios.get(`https://www.googleapis.com/oauth2/v3/userinfo?access_token=${this.final_access_token}`).then(res => {
                console.log(res.data);
                this.registerInfo.email = res.data.email;
                this.registerInfo.name = res.data.name;
                let objectGoogleLogin = {
                  "token": `${this.final_access_token}`,
                  "provider": "google",
                  "name": this.registerInfo.name,
                  'email': this.registerInfo.email,
                  'phone': this.registerInfo.phone,
                  'address': this.registerInfo.address,
                  'gender': this.registerInfo.gender,
                  'password': this.registerInfo.password,
                  'password_confirmation':this.registerInfo.password_confirmation,
                  // 'avatar': res.data.picture
                };

                axios.post('/api/social-registration',objectGoogleLogin)
                  .then(res => console.log('done'))
                  .catch(e => console.log(e));
              }).catch(e => console.log(e))
            }
          );
        }
        // else if (this.$auth.strategy.name === `facebook`) {
        //   let access_token = this.$router.currentRoute.hash;
        //   let res = access_token.split('&');
        //   let y = res.map(x => x.split("="));
        //   this.final_access_token = y[0][1];
        //   let objectFaceBookLogin = {
        //     "token": `${this.final_access_token}`,
        //     "provider": "facebook",
        //   };
        //   axios.post(`/api/social-login`, objectFaceBookLogin).then(res => {
        //     this.$store.dispatch('setStateLogin', true);
        //     console.log(this.$auth.$state.loggedIn);
        //     this.$auth.setToken('local', this.final_access_token);
        //     this._setToken(this.final_access_token);
        //     console.log(this.$auth.$state.loggedIn);
        //   }).catch(e =>
        //     axios.get(`https://graph.facebook.com/v6.0/me?fields=id,gender,name,email,about,picture{url}&access_token=${this.final_access_token}`)
        //       .then(res => {
        //         console.log(this.final_access_token);
        //         this.registerInfo.email = res.data.email;
        //         this.registerInfo.name = res.data.name;
        //         // this.registerInfo.avatar = res.data.picture.data.url;
        //         console.log(res.data);
        //       }).catch(e => console.log(e)));
        // }
      }
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
    color: #F5F5F5;
    border: solid 1px #0074c0;
    border-radius: 60px;
    z-index: 22;
    padding-top: 2rem;
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
      text-align: left;
      width: 71%;
      margin: 0 auto;
      margin-bottom: 1rem;
      font-size: 12px;
      color: #ccd1e0;
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
      height: 49px;
      position: absolute;
      top: -2rem;
      width: 100%;

      &:first-of-type {
        top: -1rem;
        height: 71px;
      }
    }
  }
  .p-error {
    color: $main-color;
    text-align: right;
    transition: all ease-in-out .3s;
    margin-bottom: 0;
  }

  .errors {
    padding: 15px;
    background-color: $main-color;
    color: #fff;
  }

  .g-input{
    position: relative;
    .phone-ksa{
      transform: translateY(-50%);
      position: absolute;
      left: 1rem;
      top: 50%;
    }
    input[type='tel']{
      padding-left: 5.2rem;
      padding-bottom: 8px;
    }
  }

</style>
