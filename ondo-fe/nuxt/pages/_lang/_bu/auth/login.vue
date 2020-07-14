<template>
  <div class="content">
    <div class="pop-up-error">
      <div v-if="errorMail.length >= 1 && $i18n.locale === 'en'">
        <p v-for="emailError in errorMail" :key="emailError">{{emailError}}</p>
      </div>
      <div v-if="errorMail.length >= 1 && $i18n.locale === 'ar'">
        <p>من فضلك تحقق من البريد الإلكترونى الخاص بك</p>
      </div>
      <div v-if="errorPassword.length >= 1 && $i18n.locale === 'en'">
        <p v-for="passwordError in errorPassword" :key="passwordError">{{passwordError}}</p>
      </div>
      <div v-if="errorPassword.length >= 1 && $i18n.locale === 'ar'">
        <p>من فضلك تحقق من الرقم السرى الخاص بك</p>
      </div>
      <div v-if="errorPassword.length === 0 && errorMail.length ===0 && error">
        <p>{{$t('please check your credentials')}}</p>
      </div>
      <div v-if="error.length >= 1 && $i18n.locale === 'en'">
        <p v-for="error in errorMail" :key="error">{{error}}</p>
      </div>
      <div v-if="error.length >= 1 && $i18n.locale === 'ar'">
        <p>البيانات غير موجوده فى سجلتنا</p>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <!--        <div class="col-12">-->
        <!--          <div class="text-center">-->
        <!--            <p-->
        <!--              class="user"-->
        <!--              @click="patient"-->
        <!--              :class="{'patientActive':patientActive}"-->
        <!--            >{{$t('patient')}}</p>-->
        <!--            <p class="user d-none" @click="doctor" :class="{'doctorActive':doctorActive}">{{$t('Doctor')}}</p>-->
        <!--          </div>-->
        <!--        </div>-->
        <div class="col-md-6 mx-auto">
          <!-- Login Tab Content -->
          <div v-if="type==='patient'" class="account-content">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 login-right">
                <div class="login-header">
                  <h3>{{$t('Login')}}</h3>
                </div>
                <!--                <p style="color:red; text-align:center;">{{error}}</p>-->
                <ValidationObserver v-slot="{ handleSubmit }">
                  <form @submit.prevent="handleSubmit(login(loginInfo))">
                    <ValidationProvider rules="required|email" v-slot="{ errors }">
                      <div class="form-group form-focus">
                        <input
                          type="email"
                          class="form-control floating"
                          :placeholder="$t('Email')"
                          v-model="loginInfo.email"
                        />
                        <p class="p-error">{{ errors[0] }}</p>
                        <!--                        <div v-for="error in errorMail" :key="error">-->
                        <!--                          <p class="p-error">{{error}}</p>-->
                        <!--                        </div>-->
                      </div>
                    </ValidationProvider>
                    <ValidationProvider rules="required" v-slot="{ errors }">
                      <div class="form-group form-focus">
                        <input
                          type="password"
                          class="form-control floating"
                          v-model="loginInfo.password"
                          :placeholder="$t('Password')"
                        />
                        <p class="p-error">{{ errors[0] }}</p>
                        <!--                        <div v-for="error in errorPassword" :key="error">-->
                        <!--                          <p class="p-error">{{error}}</p>-->
                        <!--                        </div>-->
                      </div>
                    </ValidationProvider>
                    <div class="text-right">
                      <nuxt-link
                        :to="localePath(`/${$route.params.bu}/auth/reset`)"
                        class="forgot-link"
                      >{{$t('Forgot Password ?')}}</nuxt-link>
                    </div>
                    <button
                      class="btn btn-primary btn-block btn-lg login-btn"
                      type="submit"
                    >{{$t('Login')}}</button>
                    <div class="login-or">
                      <span class="or-line"></span>
                      <span class="span-or">{{$t('or')}}</span>
                    </div>
                    <div class="row form-row social-login">
                      <!-- <div class="col-6">
                        <a @click="fbLogin" class="btn btn-facebook btn-block">
                          <i class="fab fa-facebook-f mr-1"></i>
                          {{$t('Login')}}
                        </a>
                      </div>-->
                      <div class="col-12">
                        <a @click="googleLogin" class="btn btn-google btn-block">
                          <i class="fab fa-google mr-1"></i>
                          {{$t('Login')}}
                        </a>
                      </div>
                    </div>
                    <div class="text-center dont-have">
                      {{$t(
                      'Don’t have an account?'
                      )}}
                      <nuxt-link
                        :to="localePath(`/${$route.params.bu}/auth/register`)"
                      >{{$t('Register')}}</nuxt-link>
                    </div>
                  </form>
                </ValidationObserver>
              </div>
            </div>
          </div>
          <!--           /Login Tab Content -->
          <!--           Login Doctor Tab Content -->
          <div v-if="type==='doctor'" class="account-content d-none">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 login-right">
                <div class="login-header">
                  <h3>{{$t('Login as doctor')}}</h3>
                </div>
                <ValidationObserver v-slot="{ handleSubmit }">
                  <form @submit.prevent="handleSubmit(loginDoctor(loginInfo))">
                    <ValidationProvider
                      :rules="{required: true,regex: /^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(Andalusiagroup|andalusiagroup)\.net$/}"
                      v-slot="{ errors }"
                    >
                      <div class="form-group form-focus">
                        <input type="email" class="form-control floating" v-model="loginInfo.email" />
                        <label class="focus-label">{{$t('Email')}}</label>
                      </div>
                      <p class="p-error">{{ errors[0] }}</p>
                      <!--                      <div v-for="error in errorMail" :key="error">-->
                      <!--                        <p class="p-error">{{error}}</p>-->
                      <!--                      </div>-->
                    </ValidationProvider>
                    <ValidationProvider rules="required" v-slot="{ errors }">
                      <div class="form-group form-focus">
                        <input
                          type="password"
                          class="form-control floating"
                          v-model="loginInfo.password"
                        />
                        <label class="focus-label">Password</label>
                      </div>
                      <p class="p-error">{{ errors[0] }}</p>
                      <!--                      <div v-for="error in errorPassword" :key="error">-->
                      <!--                        <p class="p-error">{{error}}</p>-->
                      <!--                      </div>-->
                    </ValidationProvider>
                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                    <div class="text-center dont-have">
                      {{$t(
                      'Don’t have an account?'
                      )}}
                      <nuxt-link to="/auth/register">{{$t('Register')}}</nuxt-link>
                    </div>
                  </form>
                </ValidationObserver>
              </div>
            </div>
          </div>
          <!--           /Login Tab Content -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ValidationProvider } from "vee-validate";
import { isRelativeURL } from "../../../../utils/nuxtjs-auth";
import { mapGetters, mapActions } from "vuex";

export default {
  layout: "default",
  components: { ValidationProvider },
  head() {
    return {
      title: "Andalusia Dot Care | Login",
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
      loginInfo: {
        email: "",
        password: ""
      },
      error: [],
      errorMail: [],
      errorPassword: []
    };
  },
  mounted() {
    if (this.$auth.loggedIn) {
      this.redirect();
    }
  },
  computed: {
    ...mapGetters({
      redirectable: "redirectable"
    })
  },
  methods: {
    ...mapActions({ redirectLogin: "reirectedLogin" }),
    redirect() {
      if (this.$route.query.next && isRelativeURL(this.$route.query.next)) {
        this.$router.push(this.$route.query.next);
      } else {
        this.$router.push(this.localePath(`/${this.$route.params.bu}/`));
      }
    },
    async login() {
      console.log(this.redirectable);
      try {
        await this.$auth.loginWith(`${this.$route.params.bu}Local`, {
          data: this.loginInfo
        });
        if (this.redirectable) {
          this.$router.back();
          return;
        }

        this.redirect();

        // this.$router.push(this.localePath("/"));
      } catch (e) {
        this.error = e.response.data.error;
        // this.errorPassword = JSON.parse(e.response.data).password ? JSON.parse(e.response.data).password : [];
        // this.errorMail = JSON.parse(e.response.data).email ? JSON.parse(e.response.data).email : [];
        $(".pop-up-error")
          .animate({ left: ".5%" }, 1000)
          .delay(4000)
          .animate({ left: "-130%" }, 1500);
      }
    },
    async fbLogin() {
      try {
        this.$auth
          .loginWith(`${this.$route.params.bu}Facebook`)
          .then(function(r) {
            console.log(r);
          });
      } catch (e) {
        this.error = e.response.data;
        console.log(this.error);
      }
    },
    async googleLogin() {
      let google = await this.$auth.loginWith(`${this.$route.params.bu}Google`);
      console.log(google);
    },
    async loginDoctor() {
      try {
        await this.$auth.loginWith(`${this.$route.params.bu}Local`, {
          data: this.loginInfo
        });

        if (this.redirectable) {
          this.$router.back();
          return;
        }

        this.redirect();
      } catch (e) {
        this.error = e.response.data;
        console.log(e);
      }
    },
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
  created() {
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
</style>
