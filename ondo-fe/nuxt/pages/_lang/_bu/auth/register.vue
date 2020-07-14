<template>
  <div class="content">
    <div class="pop-up-success">{{$t('your request sent successfully')}}</div>
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
      <div
        v-if="errorPassword.join('') === 'The password must be at least 6 characters'  && $i18n.locale === 'ar'"
      >
        <p>الرقم السرى يجب ان يكون من 6 ارقام فاكثر</p>
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
      <div
        v-if="errorPhone.join('') === 'The phone has already been taken.' && $i18n.locale === 'ar'"
      >
        <p>رقم الهاتف موجود بالفعل</p>
      </div>
      <div v-if="errorGov.length >= 1 && $i18n.locale === 'en'">
        <p v-for="errorgov in errorGov" :key="errorgov">{{errorgov}}</p>
      </div>
      <div v-if="errorGov.length >= 1 && $i18n.locale === 'ar'">
        <p>مطلوب رقم الهوية</p>
      </div>
      <!--      <p>{{$t('please check your credentials')}}</p>-->
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <!--          <div class="text-center">-->
          <!--            <p class="user" @click="patient" :class="{'patientActive':patientActive}">{{$t('patient')}}</p> |-->
          <!--            <p class="user" @click="doctor" :class="{'doctorActive':doctorActive}">{{$t('Doctor')}}</p>-->
          <!--          </div>-->
          <!-- Login user Tab Content -->
          <div v-if="type==='patient'" class="account-content">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 login-right">
                <div class="login-header">
                  <h3>{{$t('Register as patient')}}</h3>
                </div>
                <!--                action="https://dreamguys.co.in/demo/doccure/index.html"-->
                <ValidationObserver v-slot="{ handleSubmit }">
                  <form @submit.prevent="handleSubmit(submit(registerInfo))">
                    <div class="row for-Number">
                      <ValidationProvider class="col-12" rules="required" v-slot="{ errors }">
                        <div class="form-group form-focus">
                          <input
                            id="name"
                            type="text"
                            class="form-control floating"
                            autocomplete
                            :placeholder="$t('Name')"
                            v-model="registerInfo.name"
                          />
                        </div>
                        <p class="p-error">{{ errors[0] }}</p>
                        <!--                      <div v-for="error in errorName" :key="error">-->
                        <!--                        <p class="p-error">{{error}}</p>-->
                        <!--                      </div>-->
                      </ValidationProvider>
                      <ValidationProvider class="col-12" rules="required|email" v-slot="{ errors }">
                        <div class="form-group form-focus">
                          <input
                            type="email"
                            class="form-control floating"
                            autocomplete
                            :placeholder="$t('Email')"
                            v-model="registerInfo.email"
                          />
                        </div>
                        <p class="p-error">{{ errors[0] }}</p>
                        <!--                      <div v-for="error in errorMail" :key="error">-->
                        <!--                        <p class="p-error">{{error}}</p>-->
                        <!--                      </div>-->
                      </ValidationProvider>
                      <ValidationProvider
                        class="col-12"
                        rules="required"
                        v-slot="{ errors }"
                        vid="confirmation"
                      >
                        <div class="form-group form-focus">
                          <input
                            type="password"
                            class="form-control floating"
                            autocomplete
                            :placeholder="$t('Password')"
                            v-model="registerInfo.password"
                          />
                        </div>
                        <p class="p-error">{{ errors[0] }}</p>
                        <!--                      <div v-for="error in errorPassword" :key="error">-->
                        <!--                        <p class="p-error">{{error}}</p>-->
                        <!--                      </div>-->
                      </ValidationProvider>
                      <ValidationProvider
                        class="col-12"
                        rules="required|confirmed:confirmation"
                        v-slot="{ errors }"
                      >
                        <div class="form-group form-focus">
                          <input
                            type="password"
                            class="form-control floating"
                            autocomplete
                            :placeholder="$t('Password confirmation')"
                            v-model="registerInfo.password_confirmation"
                          />
                        </div>
                        <p class="p-error">{{ errors[0] }}</p>
                        <!--                      <div v-for="error in errorConfirmationPassword" :key="error">-->
                        <!--                        <p class="p-error">{{error}}</p>-->
                        <!--                      </div>-->
                      </ValidationProvider>
                      <!--                      //govId-->
                      <ValidationProvider
                        class="col-12"
                        :rules="{required: true,regex: /^([0-9]{0,60})$/}"
                        v-slot="{ errors }"
                      >
                        <div class="form-group form-focus">
                          <input
                            type="tel"
                            class="form-control floating"
                            autocomplete
                            :placeholder="$t('govID')"
                            v-model="registerInfo.government_id"
                          />
                        </div>
                        <p class="p-error">{{ errors[0] }}</p>
                        <!--                      <div v-for="error in errorConfirmationPassword" :key="error">-->
                        <!--                        <p class="p-error">{{error}}</p>-->
                        <!--                      </div>-->
                      </ValidationProvider>
                      <!--                      <div class="col-5 col-md-3 number">-->
                      <!--                        <div class="ksaPhone">-->
                      <!--                          <img-->
                      <!--                            src="../../../../assets/img/saudi-flag.jpg"-->
                      <!--                            alt="saudi-flag"-->
                      <!--                            class="img-number"-->
                      <!--                          />+966-->
                      <!--                        </div>-->
                      <!--                      </div>-->
                      <!--                      <ValidationProvider class="col-3 col-md-3 number" :rules="{required: true,regex: /^([0-9]{0})$/}" v-slot="{ errors }">-->
                      <!--                        <div>-->
                      <!--                          <div class="d-flex justify-content-center align-items-center">-->
                      <!--                            <div class="row for-Number">-->
                      <!--                              <p class="ksaPhone my-0 init-number">05</p>-->
                      <!--                              <input-->
                      <!--                                class="firstNumber"-->
                      <!--                                maxlength="1"-->
                      <!--                                v-model="firstNum"-->
                      <!--                                autocomplete-->
                      <!--                                type="tel"-->
                      <!--                              />-->
                      <!--                            </div>-->
                      <!--                          </div>-->
                      <!--                        </div>-->
                      <!--                      </ValidationProvider>-->
                      <ValidationProvider
                        class="col-12"
                        :rules="{required: true,regex: /^05([0-9]{8})$/}"
                        v-slot="{ errors }"
                      >
                        <div class="form-group form-focus form-control" style="direction: ltr">
                          <div class="row">
                            <p class="fixed-number">&#10088;+966&#10089; -</p>
                            <input
                              maxlength="10"
                              v-model="phoneKsa"
                              autocomplete
                              type="tel"
                              class="tel"
                              :placeholder="$t('Phone')"
                            />
                            <!--                          <the-mask mask="##-########" class="phone-ksa" style="direction: ltr" v-model="registerInfo.phone" type="tel"  :placeholder="$t('Phone')"></the-mask>-->
                          </div>
                        </div>
                        <p class="p-error">{{ errors[0] }}</p>
                      </ValidationProvider>
                      <button
                        class="btn btn-primary btn-block btn-lg login-btn mt-2"
                        type="submit"
                      >{{$t('create account')}}</button>
                      <div class="col-12">
                        <p class="text-center my-2">{{$t('or')}}</p>
                      </div>
                      <div class="col-12">
                        <p class="text-center">
                          <nuxt-link
                            :to="localePath(`/${$route.params.bu}/auth/login`)"
                            class="login-again"
                          >{{$t('Existing Customer?')}} {{$t('Click here to login')}}</nuxt-link>
                        </p>
                      </div>
                    </div>
                  </form>
                </ValidationObserver>
              </div>
            </div>
          </div>
          <!-- /Login Tab Content -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import axios from "axios";
import { TheMask } from "vue-the-mask";
export default {
  name: "register",
  components: { TheMask },
  head() {
    return {
      title: "Andalusia Dot Care | register",
      link: [
        {
          rel: "stylesheet",
          href: `/${this.style}.css`
        }
      ],
      meta: [{ name: "theme-color", content: `${this.themeColor}` }]
    };
  },
  data() {
    return {
      style: "hjh",
      themeColor: "#1D6EBF",
      type: "patient",
      patientActive: true,
      doctorActive: false,
      final_access_token: null,
      phoneKsa: null,
      registerInfo: {
        name: "",
        email: "",
        address: "s",
        gender: "male",
        government_id: "",
        password: null,
        // avatar: "",
        password_confirmation: null,
        phone: ""
      },
      errorName: [],
      errorMail: [],
      errorPassword: [],
      errorConfirmationPassword: [],
      errorPhone: [],
      errorGov: [],
      errors: []
    };
  },
  computed: {
    comPhone() {
      return this.registerInfo.firstNum + "" + this.registerInfo.seconNum;
    }
  },
  filters: {
    phoneNumber(value) {
      if (!value) {
        return;
      }
      value = value.toString();
      return `+966 05${value.substring(1, 0)} ` + value.slice(1);
    }
  },
  methods: {
    getNumber() {
      console.log("Dfdf");
      console.log(this.$refs.number.value);
    },
    async submit(registerInfo) {
      this.registerInfo.phone = this.phoneKsa.slice(2);
      await this.$axios
        .post(`/${this.$route.params.bu}-api/register`, registerInfo)
        .then(async res => {
          await this.$auth.loginWith(`${this.$route.params.bu}Local`, {
            data: registerInfo
          });
          this.$router.push(this.localePath(`/${this.$route.params.bu}/`));
          // console.log(res);
        })
        .catch(e => {
          let errors = e.response.data;
          this.errorName = errors.name ? errors.name : [];
          this.errorMail = errors.email ? errors.email : [];
          this.errorPassword = errors.password ? errors.password : [];
          this.errorConfirmationPassword = errors.password_confirmation
            ? errors.password_confirmation
            : [];
          this.errorPhone = errors.phone ? errors.phone : [];
          this.errorGov = errors.government_id ? errors.government_id : [];
          $(".pop-up-error")
            .animate({ left: ".5%" }, 1000)
            .delay(4000)
            .animate({ left: "-130%" }, 1500);
          console.log(errors);
        });
      // this.$router.push(this.localePath("/"));
      // console.log(res);
    },
    async docSubmit(registerInfo) {
      await this.$axios
        .post(`/${this.$route.params.bu}-api/doctor/register`, registerInfo)
        .then(async res => {
          await this.$auth.loginWith(`${this.$route.params.bu}Local`, {
            data: registerInfo
          });
          console.log(registerInfo);
          this.$router.push(this.localePath(`/${this.$route.params.bu}/`));
          // console.log(res);
        })
        .catch(e => {
          let errors = e.response.data;
          this.errorName = errors.name;
          this.errorMail = errors.email;
          this.errorPassword = errors.password;
          this.errorConfirmationPassword = errors.password_confirmation;
          this.errorPhone = errors.phone;
          console.log(errors);
          $(".pop-up-error")
            .animate({ left: ".5%" }, 1000)
            .delay(8000)
            .animate({ left: "-130%" }, 1500);
        });
      // this.$router.push(this.localePath("/"));
      // console.log(res);
    },
    // async loginGoogle() {
    //   try {
    //     await this.$auth.loginWith("local", {
    //       data: {
    //         "token": `${this.final_access_token}`,
    //         "provider": "google",
    //       }
    //     })
    //   } catch (e) {
    //     console.log(e);
    //   }
    // },
    patient() {
      this.patientActive = true;
      this.doctorActive = false;
      this.type = "patient";
    },
    doctor() {
      this.patientActive = false;
      this.doctorActive = true;
      this.type = "doctor";
    }
  },
  mounted() {
    console.log(this.$auth.strategy.name);
    // get name of strategy
    console.log(this.$router.currentRoute.hash.length);
    if (process.client) {
      // if (this.$auth.strategy.name === `${this.$route.params.bu}Google`) {
      if (this.$router.currentRoute.hash.length > 0) {
        let access_token = this.$router.currentRoute.hash;
        let res = access_token.split("&");
        let y = res.map(x => x.split("="));
        this.final_access_token = y.length > 1 ? y[1][1] : null;
        let objectGoogleLogin = {
          token: `${this.final_access_token}`,
          provider: "google"
        };
        this.$axios
          .post(`/${this.$route.params.bu}-api/social-login`, objectGoogleLogin)
          .then(async res => {
            this.$auth.setToken(
              `${this.$route.params.bu}Local`,
              "Bearer " + res.data.token
            );
            this.$auth.setStrategy(`${this.$route.params.bu}Local`);
            await this.$auth.fetchUser();
            this.$router.push(this.localePath(`/${this.$route.params.bu}`));

            // get data from google
          })
          .catch(e => {
            console.log(e);
            this.$axios
              .get(
                `https://www.googleapis.com/oauth2/v3/userinfo?access_token=${this.final_access_token}`
              )
              .then(res => {
                this.registerInfo.email = res.data.email;
                this.registerInfo.name =
                  res.data.given_name + res.data.family_name;
                console.log(res.data);
              })
              .catch(e => console.log(e));
          });
      } else if (
        this.$auth.strategy.name === `${this.$route.params.bu}Facebook`
      ) {
        let access_token = this.$router.currentRoute.hash;
        let res = access_token.split("&");
        let y = res.map(x => x.split("="));
        this.final_access_token = y[0][1];
        let objectFaceBookLogin = {
          token: `${this.final_access_token}`,
          provider: "facebook"
        };
        this.$axios
          .post(
            `/${this.$route.params.bu}-api/social-login`,
            objectFaceBookLogin
          )
          .then(async res => {
            this.$auth.setToken(
              `${this.$route.params.bu}Local`,
              "Bearer " + res.data.token
            );
            this.$auth.setStrategy(`${this.$route.params.bu}Local`);
            await this.$auth.fetchUser();
            this.$router.push(this.localePath(`/${this.$route.params.bu}`));
          })
          .catch(e =>
            this.$axios
              .get(
                `https://graph.facebook.com/v6.0/me?fields=id,gender,name,email,about,picture{url}&access_token=${this.final_access_token}`
              )
              .then(res => {
                console.log(this.final_access_token);
                this.registerInfo.email = res.data.email;
                this.registerInfo.name = res.data.name;
                // this.registerInfo.avatar = res.data.picture.data.url;
                console.log(res.data);
              })
              .catch(e => console.log(e))
          );
      }
    }
    if (this.$route.params.bu === "hjh") {
      this.style = "hjh";
      this.themeColor = "#1D6EBF";
    } else if (this.$route.params.bu === "apc") {
      this.style = "apc";
      this.themeColor = "#0066B4";
    } else if (this.$route.params.bu === "akw") {
      this.style = "akw";
      this.themeColor = "#63C7C9";
    } else if (this.$route.params.bu === "adc") {
      this.style = "adc";
      this.themeColor = "#23692B";
    }
  }
};
</script>

<style scoped lang="scss">
.firstNumber,
.secondNumber {
  border-radius: 0.25rem;
  border: 1px solid #e0e0e0;
  padding: 0.3rem;
  text-align: center;
  outline: none;
  margin: 0 0.2rem;
  width: 50%;
}
.secondNumber {
  width: 100%;
}
.number {
  width: 30%;
  display: inline-block;
}
.paragraph {
  display: flex;
  justify-content: flex-start;
  /*.ksaPhone {
    margin-left: 0.3rem;
  }*/
}
.form-focus {
  position: relative;
  /*.phone-ksa {
     transform: translateY(-50%);
     left: 1rem;
     position: absolute;
     top: 45%;
   }

  input[type="tel"] {
    padding-left: 1rem;
    height: auto !important;
  }*/
}

.p-error {
  color: darkred;
  text-align: left;
  transition: all ease-in-out 0.3s;
  margin-bottom: 0;
  font-size: 0.7rem;
}

.errors {
  padding: 15px;
  background-color: teal;
  color: #fff;
}

.user {
  color: #47494e;
  display: inline-block;
  cursor: pointer;
  font-size: 1.1rem;
}

.page-enter-active,
.page-leave-active {
  transition: opacity 0.5s;
}

.page-enter,
.page-leave-active {
  opacity: 0;
}

.activeClass {
  transition: all ease-in-out 0.3s;
  border: 2px solid teal;
  border-radius: 0.25rem;
}

.login-again {
  color: #1d6ebf;
}

html:lang(ar) {
  .for-Number {
    flex-direction: row-reverse;
  }
  .paragraph {
    display: flex;
    justify-content: flex-end;
  }
  /* .phone-ksa {
    direction: ltr;
  }*/
}
</style>
