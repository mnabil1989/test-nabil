<template>
  <div class="content">
    <div class="pop-up-error">
      <p>{{$t('please check your credentials')}}</p>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <!-- Login doctor Tab Content -->
          <div class="account-content">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 login-right">
                <div class="login-header">
                  <h3>{{$t('Register as Doctor')}}</h3>
                </div>
                <ValidationObserver v-slot="{ handleSubmit }">
                  <form @submit.prevent="handleSubmit(docSubmit(registerInfo))">
                    <ValidationProvider
                      :rules="{required: true,regex: /^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(Andalusiagroup|andalusiagroup)\.net$/}"
                      v-slot="{ errors }"
                    >
                      <div class="form-group form-focus">
                        <input
                          type="email"
                          class="form-control floating"
                          autocomplete
                          :placeholder="$t('Email')"
                          v-model="registerInfo.email"
                        />
                        <label class="focus-label"></label>
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
                          :placeholder="$t('password')"
                          v-model="registerInfo.password"
                        />
                        <label class="focus-label"></label>
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
                          :placeholder="$t('Password confirmation')"
                          v-model="registerInfo.password_confirmation"
                        />
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
                          :placeholder="$t('Phone')"
                          type="tel"
                          v-model="registerInfo.phone"
                        />
                      </div>
                      <p class="p-error">{{ errors[0] }}</p>
                      <div v-for="error in errorPhone" :key="error">
                        <p class="p-error">{{error}}</p>
                      </div>
                    </ValidationProvider>
                    <button
                      class="btn btn-primary btn-block btn-lg login-btn"
                      type="submit"
                    >{{$t('create account')}}</button>
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

export default {
  name: "register",
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
      type: "patient",
      patientActive: true,
      doctorActive: false,
      phoneKsa: "+966 5",
      themeColor: "#1D6EBF",
      final_access_token: null,
      registerInfo: {
        name: "",
        email: "",
        address: "s",
        gender: "male",
        password: null,
        // avatar: "",
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
            .delay(1500)
            .animate({ left: "-130%" }, 1500);
        });
      // this.$router.push(this.localePath("/"));
      // console.log(res);
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
.form-focus {
  position: relative;

  .phone-ksa {
    transform: translateY(-50%);
    left: 1rem;
    position: absolute;
    top: 45%;
  }

  input[type="tel"] {
    padding-left: 4.5rem;
    height: auto !important;
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
  transition: all ease-in-out 0.3s;
  border: 2px solid teal;
  border-radius: 0.25rem;
}

.login-again {
  color: #1d6ebf;
}

html:lang(ar) {
  .phone-ksa {
    direction: ltr;
  }
}
</style>
