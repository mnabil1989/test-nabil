<template>
  <div class="main-wrapper">
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.html">{{$t('Home')}}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$t('Checkout')}}</li>
              </ol>
            </nav>
            <h2 class="breadcrumb-title">{{$t('Checkout')}}</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- /Breadcrumb -->
    <!-- Page Content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-lg-8">
            <div class="card">
              <div class="card-body">
                <!-- Checkout Form -->
                <!-- Personal Information -->
                <div
                  style="color:red;"
                  v-for="(error, index) in errorMessages"
                  :key="index"
                >{{error}}</div>
                <div v-if="!$auth.loggedIn" class="info-widget">
                  <h4
                    class="card-title"
                    :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                  >{{$t('Register')}}</h4>
                  <ValidationObserver v-slot="{ handleSubmit }">
                    <form @submit.prevent="handleSubmit(SubmitNewUser(registerInfo))">
                      <ValidationProvider rules="required" v-slot="{ errors }">
                        <div class="form-group form-focus">
                          <label class="focus-label">{{$t('Name')}}</label>
                          <input
                            id="name"
                            type="text"
                            class="form-control floating"
                            autocomplete
                            placeholder="enter your full name"
                            v-model="registerInfo.name"
                          />
                          <p class="p-error">{{ errors[0] }}</p>
                          <div v-for="error in errorName" :key="error">
                            <p class="p-error">{{error}}</p>
                          </div>
                        </div>
                      </ValidationProvider>
                      <ValidationProvider rules="required|email" v-slot="{ errors }">
                        <div class="form-group form-focus">
                          <label class="focus-label">{{$t('email')}}</label>
                          <input
                            type="email"
                            class="form-control floating"
                            autocomplete
                            placeholder="enter your email address"
                            v-model="registerInfo.email"
                          />
                          <p class="p-error">{{ errors[0] }}</p>
                          <div v-for="error in errorMail" :key="error">
                            <p class="p-error">{{error}}</p>
                          </div>
                        </div>
                      </ValidationProvider>
                      <ValidationProvider rules="required" v-slot="{ errors }" vid="confirmation">
                        <div class="form-group form-focus">
                          <label class="focus-label">{{$t('password')}}</label>
                          <input
                            type="password"
                            class="form-control floating"
                            autocomplete
                            placeholder="password"
                            v-model="registerInfo.password"
                          />
                        </div>
                        <p class="p-error">{{ errors[0] }}</p>
                        <div v-for="error in errorPassword" :key="error">
                          <p class="p-error">{{error}}</p>
                        </div>
                      </ValidationProvider>
                      <ValidationProvider
                        rules="required|confirmed:confirmation"
                        v-slot="{ errors }"
                      >
                        <div class="form-group form-focus">
                          <label class="focus-label">{{$t('confirm password')}}</label>
                          <input
                            type="password"
                            class="form-control floating"
                            autocomplete
                            placeholder="confirm password"
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
                      >{{$t('Submit')}}</button>
                    </form>
                  </ValidationObserver>
                  <div
                    class="exist-customer"
                    :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                  >
                    {{$t('Existing Customer?')}}
                    <a @click="login()">{{$t('Click here to login')}}</a>
                  </div>
                </div>
                <!-- /Personal Information -->

                <div
                  class="payment-widget"
                  :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                >
                  <h4 class="card-title">{{$t('Payment Method')}}</h4>

                  <!-- Paypal Payment -->
                  <div
                    @click="showModal()"
                    :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                    class="payment-list"
                  >
                    <label class="payment-radio paypal-option" :class="{'pr-4':$i18n.locale=='ar'}">
                      <input type="radio" v-model="paymentSeleced" name="radio" />
                      <span class="checkmark" :style="{right: $i18n.locale=='ar'? '0':'left'}"></span>
                      {{$t('Bank Accounts')}}
                    </label>
                  </div>
                  <transition name="fade">
                    <div class="alert Message" v-if="paymentMessage">
                      <p>{{$t('please select payment method')}}</p>
                    </div>
                  </transition>

                  <!-- /Paypal Payment -->

                  <!-- Terms Accept -->
                  <div class="terms-accept">
                    <div class="custom-checkbox">
                      <input v-model="accepted" type="checkbox" id="terms_accept" />
                      <label for="terms_accept">
                        {{$t('I have read and accept')}}
                        <a @click="termsModal=true">
                          {{$t('Terms')}}
                          &amp; {{$t(' Conditions')}}
                        </a>
                      </label>
                    </div>
                    <transition name="fade">
                      <div class="alert Message" v-if="termsMessage">
                        <p>{{$t("please accept the terms and conditions")}}</p>
                      </div>
                    </transition>
                  </div>
                  <!-- /Terms Accept -->

                  <!-- Submit Section -->
                  <div class="submit-section mt-4">
                    <button
                      type="submit"
                      @click="acceptPayment"
                      class="btn btn-primary submit-btn"
                    >{{$t('Confirm and Pay')}}</button>
                  </div>
                  <!-- /Submit Section -->
                </div>

                <!-- /Checkout Form -->
              </div>
            </div>
          </div>

          <div class="col-md-5 col-lg-4 theiaStickySidebar">
            <!-- Booking Summary -->
            <div class="card booking-card">
              <div class="card-header">
                <h4
                  class="card-title"
                  :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                >{{$t('Booking Summary')}}</h4>
              </div>
              <div class="card-body">
                <!-- Booking Doctor Info -->
                <div class="booking-doc-info">
                  <a href="doctor-profile.html" class="booking-doc-img">
                    <img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image" />
                  </a>
                  <div class="booking-info">
                    <h4>
                      <nuxt-link :to="localePath(`/doctors/${doctor.slug}`)">{{doctor.title}}</nuxt-link>
                    </h4>
                  </div>
                </div>
                <!-- Booking Doctor Info -->

                <div class="booking-summary">
                  <div
                    class="booking-item-wrap"
                    :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                  >
                    <ul
                      class="booking-date"
                      :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                    >
                      <li>
                        {{$t('Date')}}
                        <span
                          :style="{float: $i18n.locale=='ar'? 'left':'right'}"
                        >{{getDate}}</span>
                      </li>
                      <li>
                        {{$t('Time')}}
                        <span
                          :style="{float: $i18n.locale=='ar'? 'left':'right'}"
                        >{{tConvert( getTime)}}</span>
                      </li>
                    </ul>
                    <ul
                      class="booking-fee"
                      :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                    >
                      <li>
                        {{$t('Consulting Fee')}}
                        <span
                          :style="{float: $i18n.locale=='ar'? 'left':'right'}"
                        >{{ $t('SAR')+' '+doctor.price}}</span>
                      </li>
                    </ul>
                    <div class="booking-total">
                      <ul class="booking-total-list">
                        <li>
                          <span>{{$t(' Total')}}</span>
                          <span
                            :style="{float: $i18n.locale=='ar'? 'left':'right'}"
                            class="total-cost"
                          >{{$t('SAR')+' '+doctor.price}}</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Booking Summary -->
          </div>
        </div>
      </div>
    </div>
    <!-- ----------------------------------------------------------------------- -->
    <!-- BankModal -->
    <!-- ----------------------------------------------------------------------- -->
    <div class="payment-Modal" :class="{ 'd-none': !modalShowed , 'd-block': modalShowed}">
      <div class="modal-container">
        <div class="modal-header">{{$t('Confirm Payment')}}</div>
        <!--        <div class="modal-body" :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}">-->
        <!--          <div class="body-title">{{$t('Bank Accounts:')}}</div>-->
        <!--          <div class="banck-acc">{{$t('Bank of riyadh: 9301716529940')}}</div>-->
        <!--          <div class="banck-acc">{{$t('International account (IBAN): SA8310000011100038539803')}}</div>-->
        <!--          <div class="banck-acc">{{$t('International account (BBAN): 11100038539803')}}</div>-->
        <!--          <div-->
        <!--            class="body-footer"-->
        <!--          >{{$t('please transfer the payment to the account and send a photo of the transfer on the WhatsApp number.')}}</div>-->
        <!--          &lt;!&ndash; <div>{{$t('Are you sure you want to proceed?')}}</div> &ndash;&gt;-->
        <!--        </div>-->
        <div class="model-footer">
          <a class="btn btn-primary" @click="modalShowed=false">{{$t('Confirm')}}</a>
          <!-- <a class="btn btn-danger" @click="hideModal">{{$t('close')}}</a> -->
        </div>
      </div>
    </div>
    <!-- ----------------------------------------------------------------------- -->
    <!-- TermsModal -->
    <!-- ----------------------------------------------------------------------- -->

    <div class="payment-Modal" :class="{ 'd-none': !termsModal, 'd-block': termsModal}">
      <div class="modal-terms-container">
        <div class="modal-header">{{$t('Terms and Conditions')}}</div>
        <div class="modal-body" :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}">
          <div
            class="banck-acc"
            v-html=" $i18n.locale=='ar'?settings['terms']:settings['terms_en']"
          ></div>
        </div>
        <div class="model-footer">
          <a
            class="btn btn-primary"
            @click="()=>{
            termsModal=false;
            accepted=true;
            }"
          >{{$t('Accept')}}</a>
          <a class="btn btn-danger" @click="hideTerms">{{$t('Decline')}}</a>
        </div>
      </div>
    </div>

    <!-- /Page Content -->
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "bank",
  data() {
    return {
      phoneKsa: "+966 5",
      accepted: false,
      paymentSeleced: "",
      paymentMessage: false,
      termsMessage: false,
      termsModal: false,
      modalShowed: false,
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
  async asyncData(context) {
    context.app.i18n.defaultLocale = "ar";
    let settingsResponse = await context.$axios.get("/api/settings");
    let doctorResponse = await context.$axios.get(
      `/api/doctor/${encodeURIComponent(context.route.params.slug)}?lang=${
        context.app.i18n.locale
      }`
    );

    return {
      doctor: doctorResponse.data["doctor"],
      settings: settingsResponse["data"]["settings"]
    };
  },
  computed: {
    ...mapGetters({
      getDate: "book/getDate",
      getTime: "book/getTime",
      getComment: "book/getComment",
      getFormatedDate: "book/getFormatedDate"
    })
  },
  methods: {
    ...mapActions({ redirectLogin: "reirectedLogin" }),
    login() {
      this.redirectLogin(true);
      this.$router.push(this.localePath("/auth/login"));
    },
    async SubmitNewUser(registerInfo) {
      await this.$axios
        .post("/api/register", registerInfo)
        .then(async res => {
          await this.$auth.loginWith("local", { data: registerInfo });
        })
        .catch(e => {
          let errors = e.response.data;
          this.errorName = errors.name;
          this.errorMail = errors.email;
          this.errorPassword = errors.password;
          this.errorConfirmationPassword = errors.password_confirmation;
          this.errorPhone = errors.phone;
        });
    },
    acceptPayment() {
      console.log(
        this.$auth.loggedIn && this.paymentSeleced !== "" && this.accepted
      );
      if (this.$auth.loggedIn && this.paymentSeleced !== "" && this.accepted) {
        this.$axios
          .post(
            "/api/appointments",
            {
              slug: this.$route.params.slug,
              start: this.getFormatedDate,
              comments: this.getComment
            },
            {
              headers: {
                Authorization: `${this.$auth.getToken("local")}`
              }
            }
          )
          .then(res => {
            this.$router.push(
              this.localePath({
                path: `/doctors/${this.doctor.slug}/checkout/thank-you`
              })
            );
          });
      }
    },
    sendComment() {
      this.commentModal = false;
      this.concentModal = true;
    },
    showModal() {
      this.modalShowed = true;
    },
    hideModal() {
      this.paymentSeleced = "";
      this.modalShowed = false;
    },
    hideTerms() {
      this.termsModal = false;
      this.accepted = false;
    },
    submitCheckout() {
      if (!this.$auth.loggedIn) {
        alert("please register first");
        return;
      }
      if (this.paymentSeleced == "") {
        // alert("please select payment method");
        this.paymentMessage = true;
        return;
      } else {
        this.paymentMessage = false;
      }
      if (!this.accepted) {
        this.termsMessage = true;
        return;
      } else {
        this.termsMessage = false;
      }

      this.commentModal = true;
    },
    tConvert(time) {
      time = time
        .toString()
        .match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

      if (time.length > 1) {
        // If time format correct
        time = time.slice(1); // Remove full string match value
        time[5] = +time[0] < 12 ? ` ${this.$t("AM")}` : ` ${this.$t("PM")}`; // Set AM/PM
        time[0] = +time[0] % 12 || 12; // Adjust hours
      }
      return time.join(""); // return adjusted time or original string
    }
  }
};
</script>

<style scoped lang="scss">
.payment-Modal {
  position: fixed;
  top: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0.55);
  height: 100vh;
  z-index: 99999999;
}

.modal-terms-container {
  width: 80%;
  padding: 2%;
  height: 100vh;
  overflow: scroll;
  background: #ffffff;
  margin: 0 auto;
  margin-top: 0%;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  font-size: 1rem;
}

.modal-container {
  width: 50%;
  padding: 2%;
  background: #ffffff;
  margin: 0 auto;
  margin-top: 7%;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
}

.modal-header {
  font-size: 2rem;
}

.modal-body {
  font-size: 1.4rem;
}

.body-footer {
  font-size: 1.2rem;
  font-weight: 700;
}

.body-title {
  font-weight: 700;
}

.banck-acc {
  font-size: 1.06rem;
  margin: 1% 0;
}

.model-footer {
  font-size: 1rem;
  color: #ffffff;
}

.Message {
  background-color: #15558d;
  color: #fff;
  text-align: center;
  margin: 1rem 0;

  p {
    margin: 0;
  }
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
 {
  opacity: 0;
}

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

input {
  /*padding-right: 8%;*/
}

.form-focus .focus-label {
  top: -18px !important;
}

@media only screen and (max-width: 650px) {
  .modal-terms-container {
    width: 90%;
    padding: 2%;
    height: 80vh;
    overflow: scroll;
    background: #ffffff;
    margin: 4% auto;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    font-size: 1rem;
    border-radius: 0.25rem;
  }

  .modal-container {
    width: 90%;
    padding: 2%;
    background: #ffffff;
    margin: 0 auto;
    margin-top: 7%;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    border-radius: 0.25rem;
  }
}
</style>
