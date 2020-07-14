<template>
  <div class="main-wrapper">
    <div class="pop-up-error">
      <div v-if="errorName.length >= 1 && $i18n.locale === 'en'">
        <p v-for="nameError in errorName">{{nameError}}</p>
      </div>
      <div v-if="errorName.length >= 1 && $i18n.locale === 'ar'">
        <p>مطلوب كتابه الإسم</p>
      </div>
      <div v-if="errorMail.length >= 1 && $i18n.locale === 'en'">
        <p v-for="emailError in errorMail">{{emailError}}</p>
      </div>
      <div v-if="errorMail.length >= 1 && $i18n.locale === 'ar'">
        <p>تحقق من البريد الإلكترونى</p>
      </div>
      <div
        v-if="errorMail.join('') === 'The email has already been taken.'&& $i18n.locale === 'ar'"
      >
        <p>البريد الإلكترونى موجود بالفعل</p>
      </div>
      <div v-if="errorPassword.length >= 1 && $i18n.locale === 'en'">
        <p v-for="passwordError in errorPassword">{{passwordError}}</p>
      </div>
      <div v-if="errorPassword.length >= 1 && $i18n.locale === 'ar'">
        <p>مطلوب الرقم السرى</p>
      </div>
      <div v-if="errorPhone.length >= 1 && $i18n.locale === 'en'">
        <p v-for="phoneError in errorPhone">{{phoneError}}</p>
      </div>
      <div v-if="errorGov.length >= 1 && $i18n.locale === 'en'">
        <p v-for="errorgov in errorGov">{{errorgov}}</p>
      </div>
      <div v-if="errorGov.length >= 1 && $i18n.locale === 'ar'">
        <p>مطلوب رقم الهوية</p>
      </div>
      <div v-if="errorPhone.length >= 1 && $i18n.locale === 'ar'">
        <p>تحقق من رقم الهاتف</p>
      </div>
      <div
        v-if="errorPhone.join('') === 'The phone has already been taken.' && $i18n.locale === 'ar'"
      >
        <p>رقم الهاتف موجود بالفعل</p>
      </div>
      <p>{{$t('please check your credentials')}}</p>
    </div>
    <!-- Breadcrumb -->
    <breadcrumb :link-to="'Home'" :current-page="'Checkout'"></breadcrumb>
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
                >{{error}}
                </div>
                <div v-if="!$auth.loggedIn" class="info-widget">
                  <h4
                    class="card-title"
                    :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                  >{{$t('Register')}}</h4>
                  <ValidationObserver v-slot="{ handleSubmit }">
                    <form @submit.prevent="handleSubmit(SubmitNewUser(registerInfo))">
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
                        <ValidationProvider
                          class="col-12"
                          rules="required|email"
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
                        <!--                        <div class="col-5 col-md-3 number">-->
                        <!--                          <div class="ksaPhone"><img src="../../../../../../assets/img/saudi-flag.jpg" alt="saudi-flag" class="img-number">+966</div>-->
                        <!--                        </div>-->
                        <!--                        <ValidationProvider class="col-3 col-md-3 number" :rules="{required: true,regex: /^(5|0|3|6|4|9|1|8|7)([0-9]{0})$/}" v-slot="{ errors }">-->
                        <!--                          <div>-->
                        <!--                            <div class="d-flex justify-content-center align-items-center">-->
                        <!--                              <div class="row for-Number">-->
                        <!--                                <p class="ksaPhone my-0 init-number">05</p>-->
                        <!--                                <input-->
                        <!--                                  class="firstNumber"-->
                        <!--                                  maxlength="1"-->
                        <!--                                  v-model="firstNum"-->
                        <!--                                  autocomplete-->
                        <!--                                  type="tel"-->
                        <!--                                /></div>-->
                        <!--                            </div>-->
                        <!--                          </div>-->
                        <!--                          <p class="phone-ksa paragraph">-->
                        <!--                          </p>-->
                        <!--                          <p class="p-error">{{ errors[0] }}</p>-->
                        <!--                        </ValidationProvider>-->
                        <!--                        <ValidationProvider class="col-4 col-md-6 number"-->
                        <!--                                            :rules="{required: true,regex: /^([0-9]{7})$/}"-->
                        <!--                                            v-slot="{ errors }"-->
                        <!--                        >-->
                        <!--                          <div>-->
                        <!--                            <input-->
                        <!--                              class="secondNumber"-->
                        <!--                              autocomplete-->
                        <!--                              maxlength="7"-->
                        <!--                              :placeholder="$t('Phone')"-->
                        <!--                              type="tel"-->
                        <!--                              v-model="seconNum"-->
                        <!--                            />-->
                        <!--                          </div>-->
                        <!--                          <p class="phone-ksa paragraph">-->
                        <!--                          </p>-->
                        <!--                          <p class="p-error">{{ errors[0] }}</p>-->
                        <!--                        </ValidationProvider>-->
                        <!--                        <ValidationProvider class="col-12">-->
                        <!--                          <div class="form-group form-focus form-control" style="direction: ltr">-->
                        <!--                            <p class="fixed-number">&#10088;+966&#10089; - </p><the-mask mask="5#-#######" class="phone-ksa" style="direction: ltr" v-model="registerInfo.phone" type="tel"  :placeholder="$t('Phone')"></the-mask>-->
                        <!--                          </div>-->
                        <!--                        </ValidationProvider>-->
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
                      </div>
                      <button
                        class="btn btn-primary btn-block btn-lg login-btn"
                        type="submit"
                      >{{$t('Submit')}}
                      </button>
                    </form>
                  </ValidationObserver>
                  <div
                    class="exist-customer"
                    :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                  >
                    {{$t('Existing Customer?')}}
                    <a
                      style="cursor: pointer"
                      @click="login()"
                    >{{$t('Click here to login')}}</a>
                  </div>
                </div>
                <!-- /Personal Information -->

                <div
                  class="payment-widget"
                  :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                >
                  <h4 class="card-title">{{$t('Payment Method')}}</h4>

                  <!-- Paypal Payment -->
                  <!-- <div
                    @click="showModal()"
                    :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                    class="payment-list"
                  >
                    <label class="payment-radio paypal-option" :class="{'pr-4':$i18n.locale=='ar'}">
                      <input v-model="paymentSelected" value="notSelected" type="radio" />

                      <span class="checkmark" :style="{right: $i18n.locale=='ar'? '0':'left'}"></span>
                      {{$t('Bank Accounts')}}
                    </label>
                  </div>-->
                  <!-- <div
                  @click="showModal()"-->

                  <div
                    :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}"
                    class="payment-list"
                  >
                    <label class="payment-radio paypal-option" :class="{'pr-4':$i18n.locale=='ar'}">
                      <input v-model="paymentSelected" value="free" type="radio"/>
                      <!-- <input type="radio" v-model="paymentSelected" name="radio" /> -->
                      <span class="checkmark" :style="{right: $i18n.locale=='ar'? '0':'left'}"></span>
                      {{$t('free')}}
                    </label>
                    <label class="payment-radio paypal-option" :class="{'pr-4':$i18n.locale=='ar'}"
                           style="text-transform: lowercase">
                      <input v-model="paymentSelected" value="mada" type="radio"/>
                      <!-- <input type="radio" v-model="paymentSelected" name="radio" /> -->
                      <img src="@/assets/img/mada-logo.png" alt="mada" class="mada-logo" style="width: 60px">
                      <span class="checkmark" :style="{right: $i18n.locale=='ar'? '0':'left'}"></span>
                      {{$t('mada')}}
                    </label>
                    <label class="payment-radio paypal-option d-none" :class="{'pr-4':$i18n.locale=='ar'}">
                      <input v-model="paymentSelected" value="sadad" type="radio"/>
                      <!-- <input type="radio" v-model="paymentSelected" name="radio" /> -->
                      <span class="checkmark" :style="{right: $i18n.locale=='ar'? '0':'left'}"></span>
                      {{$t('sadad')}}
                    </label>
                    <label class="payment-radio paypal-option" :class="{'pr-4':$i18n.locale=='ar'}">
                      <input v-model="paymentSelected" value="payFort" type="radio"/>
                      <!-- <input type="radio" v-model="paymentSelected" name="radio" /> -->
                      <img src="@/assets/img/MasterCard.png" alt="MasterCard" class="mada-logo" style="width: 60px">
                      <span class="checkmark" :style="{right: $i18n.locale=='ar'? '0':'left'}"></span>
                      {{$t('Credit Card')}}
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
                      <input v-model="accepted" type="checkbox" id="terms_accept"/>
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
                      :disabled="accepted && paymentSelected ? false : true"
                      class="btn btn-primary submit-btn"
                    >
                      <div class="loader-03" v-if="false"></div>
                      <p style="display: inline-block; margin: 0">{{$t('Confirm and Pay')}}</p>
                    </button>
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
                  <nuxt-link
                    :to="localePath(`/${$route.params.bu}/doctors/${doctor.slug}`)"
                    class="booking-doc-img"
                  >
                    <img :src="doctor.photo" alt="User Image"/>
                  </nuxt-link>
                  <div class="booking-info">
                    <h4>
                      <nuxt-link
                        :to="localePath(`/${$route.params.bu}/doctors/${doctor.slug}`)"
                      >{{doctor.title}}
                      </nuxt-link>
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
        <div v-if="isPay" class="card-wrapper"></div>
        <form class="form-group" id="payFort">
          <div class="input-group mt-2 hold-mada-logo">
            <img v-if="showLogo" src="@/assets/img/mada-logo.png" alt="mada" class="mada-logo">
            <input
              class="form-control input-card"
              type="text"
              id="card_number"
              v-model="CNumber"
              name="card_number"
              :placeholder="$t('number')"
              @keyup="showLogoType($event)"
              @drop="showLogoType($event)"
            />
          </div>
          <div class="input-group mt-2">
            <input class="form-control input-card" type="text" name="name" :placeholder="$t('name')"/>
          </div>
          <input
            class="form-control mt-2 input-card"
            type="text"
            id="expiry_date"
            name="expiry_date"
            maxlength="7"
            v-model="Edate"
            :placeholder="$t('MM/YY')"
          />
          <input
            class="form-control mt-2 mb-2 input-card"
            type="text"
            name="card_security_code"
            v-model="cCode"
            :placeholder="$t('cvc')"
          />
          <a @click="submitPayFort" class="btn btn-primary btn-lg w-100" :class="disabledBtnMada ? 'disableClass' : ''">{{$t('submit')}}</a>
        </form>
        <div>
          <form :action="paymentObj.action" method="post" id="RpayFort">
            <input
              type="hidden"
              name="card_number"
              :value="CNumber.replace(/ /g,'')"
            />
            <input
              type="hidden"
              name="expiry_date"
              :value="(Edate.replace(' ' ,'').split('/')[1]+Edate.replace(' ' ,'').split('/')[0]).replace(' ','')"
            />
            <input type="hidden" name="card_security_code" id="cv_code" :value="cCode"/>
            <input
              type="hidden"
              name="merchant_identifier"
              :value="paymentObj.data.merchant_identifier"
            />
            <input type="hidden" name="access_code" :value="paymentObj.data.access_code"/>
            <input
              type="hidden"
              name="merchant_reference"
              :value="paymentObj.data.merchant_reference"
            />
            <input type="hidden" name="service_command" :value="paymentObj.data.service_command"/>
            <input type="hidden" name="language" :value="paymentObj.data.language"/>
            <input type="hidden" name="currency" :value="paymentObj.data.currency"/>
            <input type="hidden" name="return_url" :value="paymentObj.data.return_url"/>
            <input type="hidden" name="signature" :value="paymentObj.data.signature"/>
            <button type="submit" class="d-none" id="frm-submit">{{$t('submit')}}</button>
          </form>
        </div>
        <div class="model-footer">
          <!-- <a class="btn btn-primary" @click="()=>{modalShowed=false; }">{{$t('Confirm')}}</a> -->
          <!-- <a class="btn btn-danger" @click="hideModal">{{$t('close')}}</a> -->
        </div>
      </div>
    </div>
    <form :action="paymentObjTwo.action" method="post" id="sadadPay">
      <input type="hidden" name="merchant_identifier" :value="paymentObjTwo.data.merchant_identifier">
      <input type="hidden" name="access_code" :value="paymentObjTwo.data.access_code">
      <input type="hidden" name="merchant_reference" :value="paymentObjTwo.data.merchant_reference">
      <input type="hidden" name="command" :value="paymentObjTwo.data.command">
      <input type="hidden" name="language" :value="paymentObjTwo.data.language">
      <input type="hidden" name="currency" :value="paymentObjTwo.data.currency">
      <input type="hidden" name="return_url" :value="paymentObjTwo.data.return_url">
      <input type="hidden" name="signature" :value="paymentObjTwo.data.signature">
      <input type="hidden" name="payment_option" :value="paymentObjTwo.data.payment_option">
      <input type="hidden" name="amount" :value="paymentObjTwo.data.amount">
      <input type="hidden" name="customer_email" :value="paymentObjTwo.data.customer_email">
      <input type="hidden" name="customer_ip" :value="paymentObjTwo.data.customer_ip">
      <button class="d-none" type="submit" id="pay-two-submit">{{$t('submit')}}</button>
    </form>
    <!-- ----------------------------------------------------------------------- -->
    <!-- TermsModal -->
    <!-- ----------------------------------------------------------------------- -->

    <div class="payment-Modal" :class="{ 'd-none': !termsModal, 'd-block': termsModal}">
      <div class="modal-terms-container">
        <div
          class="modal-header justify-content-center align-items-center"
        >{{$t('Terms and Conditions')}}
        </div>
        <div class="modal-body" :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}">
          <div class="banck-acc" v-html=" $i18n.locale=='ar'?settings.terms_ar:settings.terms"></div>
        </div>
        <div class="model-footer d-flex justify-content-center align-items-center">
          <a
            class="btn Accept mx-1"
            @click="()=>{
            termsModal=false;
            accepted=true;
            }"
          >{{$t('Accept')}}</a>
          <a class="btn Decline mx-1" @click="hideTerms">{{$t('Decline')}}</a>
        </div>
      </div>
    </div>
    <!-- ----------------------------------------------------------------------- -->
    <!-- TermsModal -->
    <!-- ----------------------------------------------------------------------- -->

    <div class="payment-Modal" :class="{ 'd-none': !loadingModal, 'd-block': loadingModal}"></div>
    <!-- /Page Content -->
  </div>
</template>

<script>
  import {mapActions, mapGetters} from "vuex";
  import Breadcrumb from "../../../../../../components/breadcrumb";
  import {TheMask} from "vue-the-mask";
  import Card from "card";

  export default {
    name: "bank",
    components: {Breadcrumb, TheMask},
    mounted() {
      let card = new Card({
        form: "#payFort",
        container: ".card-wrapper",
        formSelectors: {
          numberInput: "input#card_number", // optional — default input[name="number"]
          expiryInput: "input#expiry_date", // optional — default input[name="expiry"]
          cvcInput: "input#cv_code" // optional — default input[name="cvc"]
        }
      });
    },
    head() {
      return {
        title: "Andalusia Dot Care",
        link: [
          {
            rel: "stylesheet",
            href: `/${this.style}.css`
          }
        ],
        meta: [{name: "theme-color", content: `${this.themeColor}`}]
      };
    },
    data() {
      return {
        Edate: "",
        CNumber: "",
        cCode: "",
        isPay: true,
        showLogo: false,
        paymentObj: {
          action: "",
          data: {
            access_code: "",
            currency: "",
            language: "",
            merchant_identifier: "",
            merchant_reference: 0,
            return_url: "",
            service_command: "",
            signature: ""
          }
        },
        paymentObjTwo: {
          action: "",
          data: {
            access_code: "",
            amount: 0,
            command: "",
            currency: "",
            customer_email: "",
            customer_ip: "",
            language: "",
            merchant_identifier: "",
            merchant_reference: "",
            payment_option: "",
            return_url: "",
            signature: ""
          }
        },
        style: "hjh",
        themeColor: "#1D6EBF",
        order_id: "",
        loading: true,
        phoneKsa: null,
        loadingModal: false,
        accepted: false,
        paymentSelected: false,
        paymentSelectedMeeza: false,
        paymentMessage: false,
        termsMessage: false,
        termsModal: false,
        modalShowed: false,
        madaModalShowed: false,
        disabledBtn: true,
        numberOfCards: [529741, 111111, 222222],
        order_id: null,
        registerInfo: {
          name: "",
          email: "",
          address: "s",
          gender: "male",
          password: null,
          password_confirmation: null,
          government_id: "",
          phone: null
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
    async asyncData(context) {
      context.app.i18n.defaultLocale = "ar";
      let settingsResponse = await context.$axios.get(
        `/${context.params.bu}-api/settings`
      );
      let doctorResponse = await context.$axios.get(
        `/${context.params.bu}-api/doctor/${encodeURIComponent(
          context.route.params.slug
        )}?lang=${context.app.i18n.locale}`
      );
      return {
        doctor: doctorResponse.data["doctor"],
        settings: settingsResponse.data.settings
      };
    },
    async created() {
      // if(!this.getDate){
      //   this.$router.push(this.localePath(`/${this.$route.params.bu}/doctors/${encodeURIComponent(
      //     this.$route.params.slug
      //   )}/appointment`))
      // }
      // this.loadingModal = true;
      let data = new FormData();
      data.append("slug", this.$route.params.slug);
      data.append("start", this.getFormatedDate);
      data.append("comments", this.getComment);
      if (this.getAttachment.length >= 1)
        data.append("attachments[]", this.getAttachment);
      this.$axios.post(`/${this.$route.params.bu}-api/appointment_transit`, data, {
        headers: {
          "Content-Type": "application/json",
          Authorization: `${this.$auth.getToken(`${this.$route.params.bu}Local`)}`
        }
      }).then(res => {
        console.log(res);
        this.order_id = res.data.order_id;
        localStorage.setItem("andalusia-bu", this.$route.params.bu);
        localStorage.setItem("order-id", res.data.order_id);
        localStorage.setItem("free-mode", "free");

        // order_id: res.data.order_id;
      });
      console.log(this.paymentObj);
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
    },
    computed: {
      ...mapGetters({
        getDate: "book/getDate",
        getTime: "book/getTime",
        getComment: "book/getComment",
        getAttachment: "book/getAttachment",
        getFormatedDate: "book/getFormatedDate"
      }),
      disabledBtnMada() {
        if (this.paymentSelected === "mada" && this.numberOfCards.includes(Number(this.CNumber.replace(' ', '').slice(0, 6))) && this.CNumber.length >= 6 && this.Edate.length > 0 && this.cCode.length > 0) {
          return false;
        } else if (this.paymentSelected === "payFort") {
          this.disabledBtn = false;
        } else {
          return true;
        }
      },
    },
    methods: {
      ...mapActions({redirectLogin: "reirectedLogin"}),
      onScriptLoaded(event = null) {
        if (event) {
          console.log("Was added");
        } else {
          console.log("Already existed");
        }
      },
      submitPayFort() {
        // console.log(document.getElementById("RpayFort"));
        document.getElementById("frm-submit").click();
      },
      submitMada() {
        // console.log(document.getElementById("RpayFort"));
        document.getElementById("submitMada-btn").click();
      },
      login() {
        this.redirectLogin(true);
        this.$router.push(
          this.localePath(`/${this.$route.params.bu}/auth/login`)
        );
      },
      async SubmitNewUser(registerInfo) {
        this.registerInfo.phone = this.phoneKsa.slice(2);
        await this.$axios
          .post(`/${this.$route.params.bu}-api/register`, registerInfo)
          .then(async res => {
            await this.$auth.loginWith(`${this.$route.params.bu}Local`, {
              data: registerInfo
            });
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
              .animate({left: ".5%"}, 1000)
              .delay(1500)
              .animate({left: "-130%"}, 1500);
          });
      },
      acceptPayment() {
        if (this.$auth.loggedIn) {
          if (this.paymentSelected === "free" && this.accepted) {
            console.log(this.paymentSelected);
            console.log(this.$auth.loggedIn && this.paymentSeleced !== "" && this.accepted);
            if (this.$auth.loggedIn && this.paymentSeleced !== "" && this.accepted) {
              // this.loadingModal = true;
              let data = new FormData();
              data.append("slug", this.$route.params.slug);
              data.append("start", this.getFormatedDate);
              data.append("comments", this.getComment);
              if (this.getAttachment.length >= 1)
                data.append("attachments[]", this.getAttachment);
              this.$axios.post(`/${this.$route.params.bu}-api/appointment_transit`, data, {
                headers: {
                  "Content-Type": "application/json",
                  Authorization: `${this.$auth.getToken(`${this.$route.params.bu}Local`)}`
                }
              }).then(res => {
                console.log(res);
                this.order_id = res.data.order_id;
                localStorage.setItem("andalusia-bu", this.$route.params.bu);
                localStorage.setItem("order-id", res.data.order_id);
                localStorage.setItem("free-mode", "free");

                // order_id: res.data.order_id;

                this.$router.push(
                  this.localePath({
                    path: `/${this.$route.params.bu}/receiptPage`
                  })
                );
              });
            }
          } else if (this.paymentSelected === "payFort" && this.accepted) {
            localStorage.setItem("free-mode", "payFort");
            this.modalShowed = true;
            this.$axios.post(
              `/${this.$route.params.bu}-api/pay`,
              {
                amount: this.doctor.price,
                language: this.$i18n.locale,
                order_id : this.order_id,
                redirect_to: `${window.location.origin}/${this.$route.params.bu}/receiptPage`
              },
              {
                headers: {
                  "Content-Type": "application/json",
                  Authorization: `${this.$auth.getToken(
                    `${this.$route.params.bu}Local`
                  )}`
                }
              }
            ).then(res => {
              this.paymentObj = res.data
            }).catch(e => console.log(e))
          } else if (this.paymentSelected === "mada" && this.accepted) {
            localStorage.setItem("free-mode", "mada");
            this.$axios.post(
              `/${this.$route.params.bu}-api/pay`,
              {
                amount: this.doctor.price,
                language: this.$i18n.locale,
                order_id : this.order_id,
                redirect_to: `${window.location.origin}/${this.$route.params.bu}/receiptPage`
              },
              {
                headers: {
                  "Content-Type": "application/json",
                  Authorization: `${this.$auth.getToken(
                    `${this.$route.params.bu}Local`
                  )}`
                }
              }
            ).then(res => {
              this.paymentObj = res.data
            }).catch(e => console.log(e))
            // this.paymentObj = paymentResponse.data;
            this.modalShowed = true;
            this.isPay = false
          } else if (this.paymentSelected === "sadad" && this.accepted) {
            this.$axios.post(`/${this.$route.params.bu}-api/pay`, {
              amount: this.doctor.price,
              language: this.$i18n.locale,
              order_id : this.order_id,
              redirect_to: `${window.location.origin}/${this.$route.params.bu}/receiptPage`,
              payment_option: "SADAD"
            }, {
              headers: {
                "Content-Type": "application/json",
                Authorization: `${this.$auth.getToken(
                  `${this.$route.params.bu}Local`
                )}`
              }
            }).then(res => {
              this.paymentObjTwo = res.data;
              console.log(this.paymentObjTwo);
              // setTimeout(function(){
              //
              // },10000)
            }).then(function () {
              document.getElementById("pay-two-submit").click();
            })
          }
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
        // this.paymentSelected = 0;
        this.modalShowed = false;
      },
      hideTerms() {
        this.termsModal = false;
        this.accepted = false;
      },
      showLogoType($event) {
        if (this.paymentSelected === 'mada' && $event.target.value.length >= 6 && this.numberOfCards.includes(Number(this.CNumber.replace(' ', '').slice(0, 6)))) {
          this.showLogo = true;

        } else {
          this.showLogo = false
        }
      },
      submitCheckout() {
        if (!this.$auth.loggedIn) {
          alert("please register first");
          return;
        }
        if (this.paymentSelected === 0) {
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

  .disableClass {
    opacity: .4;
    cursor: default !important;
    pointer-events: none;
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

  /*.phone-ksa {
    transform: translateY(-50%);
    left: 1rem;
    position: absolute;
    top: 50%;
  }*/

  /*input[type="tel"] {
    padding-left: 4.5rem;
  }*/

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

  html:lang(ar) {
    /*.phone-ksa {
      transform: translateY(-50%);
      left: 1rem;
      position: absolute;
      top: 50%;
      direction: ltr;
    }*/
    /*input[type="tel"] {
      padding-left: 1rem;
    }*/
    .booking-doc-img {
      margin-right: 0;
      margin-left: 15px;
    }

    .for-Number {
      flex-direction: row-reverse;
    }

    .paragraph {
      display: flex;
      justify-content: flex-end;
    }
  }

  .loader-03 {
    border: 0.2em solid currentcolor;
    border-bottom-color: transparent;
    border-radius: 50%;
    animation: 1s loader-03 linear infinite;
    position: relative;
    width: 20px;
    height: 20px;
    margin: 0 0.3rem;
    display: inline-block;
  }

  @keyframes loader-03 {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }

  .card-master {
    height: 50px;
  }

  .Accept {
    width: 80px;
    background: #1d4590;
    color: #fff;
    border: 2px solid transparent;
    transition: all ease-in-out 0.3s;

    &:hover {
      background: transparent;
      border: 2px solid #1d4590;
      color: #1d4590;
    }
  }

  .Decline {
    width: 80px;
    background: #ff0000;
    color: #fff;
    border: 2px solid transparent;
    transition: all ease-in-out 0.3s;

    &:hover {
      background: transparent;
      border: 2px solid #ff0000;
      color: #ff0000;
    }
  }
  .input-card,.jp-card .jp-card-front .jp-card-lower .jp-card-number{
    direction: ltr;
  }

  .hold-mada-logo {
    position: relative;

    .mada-logo {
      position: absolute;
      width: 60px;
      height: 40px;
      z-index: 12;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
    }
  }
</style>
