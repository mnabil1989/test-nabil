<template>
  <div class="contact-us">
    <div class="pop-up-success">{{$t('your request sent successfully')}}</div>
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
      <!--      v-if="errorMail.join('') === 'The email has already been taken.'-->
      <div v-if="errorPassword.length >= 1 && $i18n.locale === 'en'">
        <p v-for="passwordError in errorPassword">{{passwordError}}</p>
      </div>
      <div v-if="errorPassword.length >= 1 && $i18n.locale === 'ar'">
        <p>مطلوب الرقم السرى</p>
      </div>
      <div v-if="errorPhone.length >= 1 && $i18n.locale === 'en'">
        <p v-for="phoneError in errorPhone">{{phoneError}}</p>
      </div>
      <div v-if="errorPhone.length >= 1 && $i18n.locale === 'ar'">
        <p>تحقق من رقم الهاتف</p>
      </div>
      <div
        v-if="errorPhone.join('') === 'The phone has already been taken.' && $i18n.locale === 'ar'"
      >
        <p>رقم الهاتف موجود بالفعل</p>
      </div>
      <div v-if="errorGov.length >= 1 && $i18n.locale === 'ar'">
        <p>مطلوب رقم الهوية</p>
      </div>
      <!--      <p>{{$t('please check your credentials')}}</p>-->
    </div>
    <div class="row">
      <div class="col-12">
        <div class="text-center text-capitalize">
          <h3>{{$t('contact-us')}}</h3>
        </div>
      </div>
      <div class="col-md-6 col-12">
        <img :src="contactUsImage()" alt="أندلسية" class="img-contact" />
      </div>
      <div class="col-md-6 col-12">
        <ValidationObserver v-slot="{ handleSubmit }">
          <form @submit.prevent="handleSubmit(submit(contactInfo))" ref="form_contact">
            <div class="row for-Number">
              <ValidationProvider
                class="col-12"
                rules="required"
                v-slot="{ errors }"
                v-if="!$auth.loggedIn"
              >
                <div class="form-group form-focus">
                  <input
                    id="name"
                    type="text"
                    class="form-control floating"
                    autocomplete
                    :placeholder="$t('Name')"
                    v-model="contactInfo.first_name"
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
                v-if="!$auth.loggedIn"
              >
                <div class="form-group form-focus">
                  <input
                    type="email"
                    class="form-control floating"
                    autocomplete
                    :placeholder="$t('Email')"
                    v-model="contactInfo.email"
                  />
                </div>
                <p class="p-error">{{ errors[0] }}</p>
                <!--                      <div v-for="error in errorMail" :key="error">-->
                <!--                        <p class="p-error">{{error}}</p>-->
                <!--                      </div>-->
              </ValidationProvider>
              <ValidationProvider v-if="!$auth.loggedIn" class="col-12" :rules="{required: true,regex: /^05([0-9]{8})$/}" v-slot="{ errors }">
                <div class="form-group form-focus form-control" style="direction: ltr">
                  <div class="row">
                    <p class="fixed-number">&#10088;+966&#10089; - </p>
                    <input maxlength="10" v-model="phoneKsa" autocomplete type="tel" class="tel" :placeholder="$t('Phone')"/>
                    <!--                          <the-mask mask="##-########" class="phone-ksa" style="direction: ltr" v-model="registerInfo.phone" type="tel"  :placeholder="$t('Phone')"></the-mask>-->
                  </div>
                </div>
                <p class="p-error">{{ errors[0] }}</p>
              </ValidationProvider>
<!--              <ValidationProvider class="col-12" >-->
<!--                <div class="form-group form-focus form-control" style="direction: ltr">-->
<!--                  <p class="fixed-number">&#10088;+966&#10089; - </p><the-mask mask="5# - #######" class="phone-ksa" style="direction: ltr" v-model="contactInfo.phone" type="tel"  :placeholder="$t('Phone')"></the-mask>-->
<!--                </div>-->
<!--              </ValidationProvider>-->
              <ValidationProvider class="col-12" rules="required" v-slot="{ errors }">
                <div class="form-group form-focus">
                  <textarea
                    class="form-control floating"
                    :placeholder="$t('your message')"
                    v-model="contactInfo.further_requirements"
                  />
                </div>
                <p class="p-error">{{ errors[0] }}</p>
                <!--                      <div v-for="error in errorMail" :key="error">-->
                <!--                        <p class="p-error">{{error}}</p>-->
                <!--                      </div>-->
              </ValidationProvider>
              <button
                class="btn btn-primary btn-block btn-lg login-btn col-12 send-contact"
                type="submit"
              >{{$t('submit')}}</button>
            </div>
          </form>
        </ValidationObserver>
      </div>
    </div>
  </div>
</template>

<script>
// import axios from "axios";
import {TheMask} from 'vue-the-mask'
export default {
  name: "index",
  components: {TheMask},
  head() {
    return {
      title: "Andalusia Dot Care | Contact Us",
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
      contact_firstNum: "",
      contact_secondNum: "",
      contactImage: "@/assets/img/عيادات-أندلسية-1.jpg",
      phoneKsa:null,
      contactInfo: {
        first_name: this.$auth.loggedIn ? this.$auth.user.name : "",
        email: this.$auth.loggedIn ? this.$auth.user.email : "",
        phone: this.$auth.loggedIn ? this.$auth.user.phone : "",
        further_requirements: ""
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
  methods: {
    submit(contactInfo) {
      console.log(contactInfo);
      this.contactInfo.phone = this.phoneKsa.slice(2);
      this.$axios
        .post(`/${this.$route.params.bu}-api/contact_us`, contactInfo)
        .then(res => {
          console.log(res);
          this.$refs.form_contact.reset();
          $(".pop-up-success")
            .animate({ left: ".5%" }, 1000)
            .delay(3000)
            .animate({ left: "-130%" }, 1500);
        })
        .catch(e => {
          console.log(e);
          let errors = e.response.data;
          this.errorName = errors.first_name ? errors.first_name : [];
          this.errorMail = errors.email ? errors.email : [];
          this.errorPhone = errors.phone ? errors.phone : [];
          $(".pop-up-error")
            .animate({ left: ".5%" }, 1000)
            .delay(8000)
            .animate({ left: "-130%" }, 1500);
        });
    },
    contactUsImage() {
      if (this.$route.params.bu === "hjh") {
        return (this.contactImage = require("@/assets/img/hjh-contact.jpeg"));
      } else if (this.$route.params.bu === "apc") {
        return (this.contactImage = require("@/assets/img/عيادات-أندلسية-1.jpg"));
      } else if (this.$route.params.bu === "adc") {
        return (this.contactImage = require("@/assets/img/contact-adc.jpg"));
      } else if (this.$route.params.bu === "akw") {
        return (this.contactImage = require("@/assets/img/contact-akw.jpg"));
        // return this.style = require("akw");
      }
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
.contact-us {
  padding: 2rem 0;
  form {
    width: 90%;
    input {
      &::placeholder {
        text-transform: capitalize;
      }
    }
  }
  textarea {
    min-height: 160px;
    &::placeholder {
      text-transform: capitalize;
    }
  }
}
.img-contact {
  width: 100%;
  height: 100%;
  max-height: 360px;
  object-fit: cover;
}
input[type="tel"] {
  padding-left: 6.5rem;
}
html:lang(ar) {
  .phone-ksa {
    direction: ltr;
  }
}
</style>
