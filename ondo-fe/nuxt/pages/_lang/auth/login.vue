<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="text-center">
            <p
              class="user"
              @click="patient"
              :class="{'patientActive':patientActive}"
            >{{$t('patient')}}</p>|
            <p class="user" @click="doctor" :class="{'doctorActive':doctorActive}">{{$t('Doctor')}}</p>
          </div>
        </div>
        <div class="col-md-6 mx-auto">
          <!-- Login Tab Content -->
          <div v-if="type==='patient'" class="account-content">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 login-right">
                <div class="login-header">
                  <h3>{{$t('Login')}}</h3>
                </div>
                <p style="color:red; text-align:center;">{{error}}</p>
                <ValidationObserver v-slot="{ handleSubmit }">
                  <form @submit.prevent="handleSubmit(login(loginInfo))">
                    <ValidationProvider rules="required|email" v-slot="{ errors }">
                      <div class="form-group form-focus">
                        <input type="email" class="form-control floating" v-model="loginInfo.email" />
                        <label class="focus-label">{{$t('Email')}}</label>
                        <p class="p-error">{{ errors[0] }}</p>
                        <div v-for="error in errorMail" :key="error">
                          <p class="p-error">{{error}}</p>
                        </div>
                      </div>
                    </ValidationProvider>
                    <ValidationProvider rules="required" v-slot="{ errors }">
                      <div class="form-group form-focus">
                        <input
                          type="password"
                          class="form-control floating"
                          v-model="loginInfo.password"
                        />
                        <label class="focus-label">{{$t('Password')}}</label>
                        <p class="p-error">{{ errors[0] }}</p>
                        <div v-for="error in errorPassword" :key="error">
                          <p class="p-error">{{error}}</p>
                        </div>
                      </div>
                    </ValidationProvider>
                    <div class="text-right">
                      <nuxt-link
                        :to="localePath('/auth/reset')"
                        class="forgot-link"
                      >{{$t('Forgot Password ?')}}</nuxt-link>
                    </div>
                    <button
                      class="btn btn-primary btn-block btn-lg login-btn"
                      type="submit"
                    >{{$t('Login')}}</button>
<!--                    <div class="login-or">-->
<!--                      <span class="or-line"></span>-->
<!--                      <span class="span-or">{{$t('or')}}</span>-->
<!--                    </div>-->
<!--                    <div class="row form-row social-login">-->
<!--                      <div class="col-6">-->
<!--                        <a @click="fbLogin" class="btn btn-facebook btn-block">-->
<!--                          <i class="fab fa-facebook-f mr-1"></i>-->
<!--                          {{$t('Login')}}-->
<!--                        </a>-->
<!--                      </div>-->
<!--                      <div class="col-6">-->
<!--                        <a href="#" class="btn btn-google btn-block">-->
<!--                          <i class="fab fa-google mr-1"></i>-->
<!--                          {{$t('Login')}}-->
<!--                        </a>-->
<!--                      </div>-->
<!--                    </div>-->
                    <div class="text-center dont-have">
                      {{$t(
                      'Don’t have an account?'
                      )}}
                      <nuxt-link :to="localePath('/auth/register')">{{$t('Register')}}</nuxt-link>
                    </div>
                  </form>
                </ValidationObserver>
              </div>
            </div>
          </div>
          <!--           /Login Tab Content -->
          <!--           Login Doctor Tab Content -->
          <div v-if="type==='doctor'" class="account-content">
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
                      <div v-for="error in errorMail" :key="error">
                        <p class="p-error">{{error}}</p>
                      </div>
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
                      <div v-for="error in errorPassword" :key="error">
                        <p class="p-error">{{error}}</p>
                      </div>
                    </ValidationProvider>
                    <div class="text-right">
                      <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
<!--                    <div class="login-or">-->
<!--                      <span class="or-line"></span>-->
<!--                      <span class="span-or">or</span>-->
<!--                    </div>-->
<!--                    <div class="row form-row social-login">-->
<!--                      <div class="col-6">-->
<!--                        <a href="#" class="btn btn-facebook btn-block">-->
<!--                          <i class="fab fa-facebook-f mr-1"></i>-->
<!--                          {{$t('Login')}}-->
<!--                        </a>-->
<!--                      </div>-->
<!--                      <div class="col-6">-->
<!--                        <a href="#" class="btn btn-google btn-block">-->
<!--                          <i class="fab fa-google mr-1"></i>-->
<!--                          {{$t('Login')}}-->
<!--                        </a>-->
<!--                      </div>-->
<!--                    </div>-->
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
import { mapGetters, mapActions } from "vuex";

export default {
  layout: "default",
  components: { ValidationProvider },
  head: {
    title: "Andalusia Dot Care | Login"
  },
  data() {
    return {
      type: "patient",
      patientActive: true,
      doctorActive: false,
      loginInfo: {
        email: "",
        password: ""
      },
      error: null,
      errorMail: null,
      errorPassword: null
    };
  },
  computed: {
    ...mapGetters({
      redirectable: "redirectable"
    })
  },
  methods: {
    ...mapActions({ redirectLogin: "reirectedLogin" }),

    async login() {
      console.log(this.redirectable);
      try {
        await this.$auth.loginWith("local", {
          data: this.loginInfo
        });

        if (this.redirectable) {
          this.$router.back();
          return;
        }
        this.$router.push(this.localePath("/"));
      } catch (e) {
        this.error = e.response.data.error;
        console.log(e.response.data);
      }
    },
    async fbLogin() {
      let faceBook = await this.$auth.loginWith("facebook");
      console.log(faceBook);
    },
    async loginDoctor() {
      try {
        await this.$auth.loginWith("local2", {
          data: this.loginInfo
        });

        if (this.redirectable) {
          this.$router.back();
          return;
        }
        this.$router.push(this.localePath("/"));
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
