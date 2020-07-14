<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!--          <div class="text-center">-->
          <!--            <p class="user" @click="type='patient'">patient</p> |-->
          <!--            <p class="user" @click="type='doctor'">doctor</p>-->
          <!--          </div>-->
        </div>
        <div class="col-md-6 mx-auto">
          <!-- Login Tab Content -->
          <div class="account-content">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 login-right">
                <div class="login-header">
                  <h3>{{$t('Reset Password')}}</h3>
                </div>
                <div
                  :style="{color: backEndMessage.type=='error'?'red':'green'}"
                >{{backEndMessage.msg}}</div>
                <ValidationObserver v-slot="{ handleSubmit }">
                  <form @submit.prevent="handleSubmit(login(loginInfo))">
                    <ValidationProvider rules="required|email" v-slot="{ errors }">
                      <div class="form-group form-focus">
                        <input type="email" class="form-control floating" v-model="loginInfo.email" :placeholder="$t('Email')"/>
                        <p class="p-error">{{ errors[0] }}</p>
                        <div v-for="error in errorMail" :key="error">
                          <p class="p-error">{{error}}</p>
                        </div>
                      </div>
                    </ValidationProvider>

                    <button
                      class="btn btn-primary btn-block btn-lg login-btn"
                      type="submit"
                    >{{$t('Send')}}</button>
                  </form>
                </ValidationObserver>
              </div>
            </div>
          </div>
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
  head() {
    return {
      title: "Andalusia Dot Care",
      link: [
        {
          rel: "stylesheet",
          href: `/${this.style}.css`
        }
      ],
      meta: [{ name: 'theme-color', content: `${this.themeColor}` }]
    }
  },
  data() {
    return {
      style:'hjh',
      type: "patient",
      themeColor: '#1D6EBF',
      loginInfo: {
        email: ""
      },
      backEndMessage: {},
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

      let ResetResponse = await this.$axios
        .post(`/${this.$route.params.bu}-api/password/link`, {
          email: this.loginInfo.email
        })
        .then(res => {
          this.backEndMessage = { msg: res.data.email, type: "sucess" };
        })
        .catch(e => {
          this.error = e.response.data;
          console.log(e.response);

          this.backEndMessage = {
            msg: e.response.data.email,
            type: "error"
          };
        });
    }
  },
  created() {
    if (this.$route.params.bu === "hjh") {
      this.style = "hjh";
      this.themeColor = '#1D6EBF'
    } else if (this.$route.params.bu === "apc") {
      this.style = "apc";
      this.themeColor = '#0066B4'
    } else if (this.$route.params.bu === "akw") {
      this.style = "akw";
      this.themeColor = '#63C7C9'
    } else if (this.$route.params.bu === "adc") {
      this.style = "adc";
      this.themeColor = '#23692B'
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
