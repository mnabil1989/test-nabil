<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="text-center">
            <p class="user" @click="patient" :class="{'patientActive':patientActive}">patient</p> |
            <p class="user" @click="doctor" :class="{'doctorActive':doctorActive}">doctor</p>
          </div>
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
                    <ValidationProvider rules="required" v-slot="{ errors }">
                      <div class="form-group form-focus">
                        <input
                          id="name"
                          type="text"
                          class="form-control floating"
                          autocomplete
                          placeholder="enter your full name"
                          v-model="registerInfo.name"
                        />
                        <label class="focus-label">{{$t('Name')}}</label>
                      </div>
                      <p class="p-error">{{ errors[0] }}</p>
                      <div v-for="error in errorName" :key="error">
                        <p class="p-error">{{error}}</p>
                      </div>
                    </ValidationProvider>
                    <ValidationProvider rules="required|email" v-slot="{ errors }">
                      <div class="form-group form-focus">
                        <input
                          type="email"
                          class="form-control floating"
                          autocomplete
                          placeholder="enter your email address"
                          v-model="registerInfo.email"
                        />
                        <label class="focus-label">{{$t('Email')}}</label>
                      </div>
                      <p class="p-error">{{ errors[0] }}</p>
                      <div v-for="error in errorMail" :key="error">
                        <p class="p-error">{{error}}</p>
                      </div>
                    </ValidationProvider>
                    <ValidationProvider rules="required" v-slot="{ errors }" vid="confirmation">
                      <div class="form-group form-focus">
                        <input
                          type="password"
                          class="form-control floating"
                          autocomplete
                          placeholder="password"
                          v-model="registerInfo.password"
                        />
                        <label class="focus-label">{{$t('Password')}}</label>
                      </div>
                      <p class="p-error">{{ errors[0] }}</p>
                      <div v-for="error in errorPassword" :key="error">
                        <p class="p-error">{{error}}</p>
                      </div>
                    </ValidationProvider>
                    <ValidationProvider rules="required|confirmed:confirmation" v-slot="{ errors }">
                      <div class="form-group form-focus">
                        <input
                          type="password"
                          class="form-control floating"
                          autocomplete
                          placeholder="confirm password"
                          v-model="registerInfo.password_confirmation"
                        />
                        <label class="focus-label">{{$t("Password confirmation")}}</label>
                      </div>
                      <p class="p-error">{{ errors[0] }}</p>
                      <div v-for="error in errorConfirmationPassword" :key="error">
                        <p class="p-error">{{error}}</p>
                      </div>
                    </ValidationProvider>
                    <ValidationProvider
                      :rules="{required: true,regex: /^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/}"
                      v-slot="{ errors }"
                    >
                      <div class="form-group form-focus">
                        <span
                          class="phone-ksa"
                          :style="{
    left: $i18n.locale=='ar'
?'':'3.8rem' ,     right: $i18n.locale=='ar'
?'5rem':''
                        }"
                        >{{phoneKsa}}</span>
                        <input
                          class="form-control floating"
                          autocomplete
                          :style="{
                        paddingRight:$i18n.locale=='ar'?'8.2rem':'0'
                        }"
                          placeholder="phone"
                          type="tel"
                          v-model="registerInfo.phone"
                        />
                        <label class="focus-label">{{$t('Phone')}}</label>
                      </div>
                      <p class="p-error">{{ errors[0] }}</p>
                      <div v-for="error in errorPhone" :key="error">
                        <p class="p-error">{{error}}</p>
                      </div>
                    </ValidationProvider>
                    <button
                      class="btn btn-primary btn-block btn-lg login-btn"
                      type="submit"
                    >{{$t('create account')}}
                    </button>
                  </form>
                </ValidationObserver>
              </div>
            </div>
          </div>
          <!-- /Login Tab Content -->
          <!-- Login doctor Tab Content -->
          <div v-if="type==='doctor'" class="account-content">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 login-right">
                <div class="login-header">
                  <h3>Register as Doctor</h3>
                </div>
                <ValidationObserver v-slot="{ handleSubmit }">
                  <form @submit.prevent="handleSubmit(docSubmit(registerInfo))">
                    <ValidationProvider
                      :rules="{required: true,regex: /^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(Andalusiagroup|andalusiagroup)\.net$/}"
                      v-slot="{ errors }">
                      <div class="form-group form-focus">
                        <input
                          type="email"
                          class="form-control floating"
                          autocomplete
                          placeholder="enter your email address"
                          v-model="registerInfo.email"
                        />
                        <label class="focus-label">Email</label>
                        <p class="p-error">{{ errors[0] }}</p>
                        <div v-for="error in errorMail" :key="error">
                          <p class="p-error">{{error}}</p>
                        </div>
                      </div>
                    </ValidationProvider>
                    <ValidationProvider rules="required" v-slot="{ errors }" vid="confirmation">
                      <div class="form-group form-focus">
                        <input
                          type="password"
                          class="form-control floating"
                          autocomplete
                          placeholder="password"
                          v-model="registerInfo.password"
                        />
                        <label class="focus-label">password</label>
                      </div>
                      <p class="p-error">{{ errors[0] }}</p>
                      <div v-for="error in errorPassword" :key="error">
                        <p class="p-error">{{error}}</p>
                      </div>
                    </ValidationProvider>
                    <ValidationProvider rules="required|confirmed:confirmation" v-slot="{ errors }">
                      <div class="form-group form-focus">
                        <input
                          type="password"
                          class="form-control floating"
                          autocomplete
                          placeholder="confirm password"
                          v-model="registerInfo.password_confirmation"
                        />
                        <label class="focus-label">password confirmation</label>
                      </div>
                      <p class="p-error">{{ errors[0] }}</p>
                      <div v-for="error in errorConfirmationPassword" :key="error">
                        <p class="p-error">{{error}}</p>
                      </div>
                    </ValidationProvider>
                    <ValidationProvider
                      :rules="{required: true,regex: /^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/}"
                      v-slot="{ errors }"
                    >
                      <div class="form-group form-focus">
                        <span class="phone-ksa">{{phoneKsa}}</span>
                        <input
                          class="form-control floating"
                          autocomplete
                          placeholder="phone"
                          type="tel"
                          v-model="registerInfo.phone"
                        />
                        <label class="focus-label">phone</label>
                        <p class="p-error">{{ errors[0] }}</p>
                        <div v-for="error in errorPhone" :key="error">
                          <p class="p-error">{{error}}</p>
                        </div>
                      </div>
                    </ValidationProvider>
                    <button
                      class="btn btn-primary btn-block btn-lg login-btn"
                      type="submit"
                    >create account
                    </button>
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
  import axios from "axios";

  export default {
    name: "register",
    head: {
      title: "Andalusia Dot Care | register"
    },
    data() {
      return {
        type: "patient",
        patientActive: true,
        doctorActive: false,
        phoneKsa: "+966 5",
        registerInfo: {
          name: "",
          email: "",
          address: "s",
          gender: "male",
          password: null,
          password_confirmation: null,
          phone: null
        },
        errorName: null,
        errorMail: null,
        errorPassword: null,
        errorConfirmationPassword: null,
        errorPhone: null,
        errors: []
      };
    },
    methods: {
      async submit(registerInfo) {
        await this.$axios
          .post("/api/register", registerInfo)
          .then(async res => {
            await this.$auth.loginWith("local", {
              data: registerInfo
            });
            this.$router.push(this.localePath("/"));
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
          });
        // this.$router.push(this.localePath("/"));
        // console.log(res);
      },
      async docSubmit(registerInfo) {
        await this.$axios
          .post("/api/doctor/register", registerInfo)
          .then(async res => {
            await this.$auth.loginWith("local2", {
              data: registerInfo
            });
            this.$router.push(this.localePath("/"));
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
          });
        // this.$router.push(this.localePath("/"));
        // console.log(res);
      },
      patient() {
        this.patientActive = true;
        this.doctorActive = false;
        this.type = 'patient';
      },
      doctor() {
        this.patientActive = false;
        this.doctorActive = true;
        this.type = 'doctor';
      }
    },
    created() {
      let access_token = this.$router.currentRoute.hash.split('=');
      console.log(access_token);
      let objectFbLogin = {
        "token": "EAAItzmWxg3kBAHZAKMn4JZBgG7QMbhQEhzIx3EIy9sJUDQ2RMdoy6OZCiPZBi1gKKXw758F4IaZCeB0n5McbcB5SC4cpIRPfsGFS1M0k102IcoVdd29TjJO2zBlAUnPanHt2KM7d4XJUQcHaYr6xIHFi1qXTwJq0swIBhKgcPlOwxBzqVZCOG5Ry28dG33fwcZD",
        "provider": "facebook"
      };
      axios.post('/api/social-login', objectFbLogin).then(res => console.log(res)).catch(e => console.log(e))
    }
  };
</script>

<style scoped lang="scss">
  .form-focus {
    position: relative;

    .phone-ksa {
      transform: translateY(-50%);
      left: 3.8rem;
      position: absolute;
      top: 50%;
    }

    input[type="tel"] {
      padding: 0;
      padding-left: 5rem;
      padding-left: 7rem;
      padding-bottom: 1px;
    }
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
    transition: all ease-in-out .3s;
    border: 2px solid teal;
    border-radius: .25rem;
  }
</style>
