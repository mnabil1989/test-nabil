<template>
  <div>
    <!-- Breadcrumb -->
    <breadcrumb :link-to="'Home'" :current-page="'Profile Settings'"></breadcrumb>
    <!-- /Breadcrumb -->
    <!-- Page Content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Profile Sidebar -->
          <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
            <div class="profile-sidebar">
              <div class="widget-profile pro-widget-content">
                <div class="profile-info-widget">
                  <div class="profile-det-info">
                    <h3>{{$auth.user.name}}</h3>
                  </div>
                </div>
              </div>
              <div class="dashboard-widget">
                <nav class="dashboard-menu">
                  <ul>
                    <li class="active">
                      <nuxt-link
                        :to="localePath(`/${$route.params.bu}/user/person/profile-settings`)"
                      >
                        <i class="fas fa-user-cog"></i>
                        <span>{{$t('Profile Settings')}}</span>
                      </nuxt-link>
                    </li>
                    <li>
                      <nuxt-link
                        :to="localePath(`/${$route.params.bu}/user/person/change-password`)"
                      >
                        <i class="fas fa-lock"></i>
                        <span>{{$t('Change Password')}}</span>
                      </nuxt-link>
                    </li>
                    <li>
                      <a @click="handleLogout" class="sign-out">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>{{$t('Logout')}}</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <!-- /Profile Sidebar -->

          <div class="col-md-7 col-lg-8 col-xl-9">
            <div class="card">
              <div class="card-body">
                <!-- Profile Settings Form -->

                <ValidationObserver v-slot="{ handleSubmit }">
                  <form @submit.prevent="handleSubmit(updateProfile(updateInfo))">
                    <div class="row for-Number">
                      <ValidationProvider class="col-12" rules="required" v-slot="{ errors }">
                        <div class="form-group form-focus">
                          <label>{{$t('Name')}}</label>
                          <input
                            id="name"
                            type="text"
                            class="form-control floating"
                            autocomplete
                            placeholder="enter your full name"
                            v-model="updateInfo.name"
                          />
                          <p class="p-error">{{ errors[0] }}</p>
                          <div v-for="error in errorName" :key="error">
                            <p class="p-error">{{error}}</p>
                          </div>
                        </div>
                      </ValidationProvider>
                      <ValidationProvider class="col-12" rules="required|email" v-slot="{ errors }">
                        <div class="form-group form-focus">
                          <label>{{$t('Email')}}</label>
                          <input
                            type="email"
                            class="form-control floating"
                            autocomplete
                            placeholder="enter your email address"
                            v-model="updateInfo.email"
                          />
                          <p class="p-error">{{ errors[0] }}</p>
                          <div v-for="error in errorMail" :key="error">
                            <p class="p-error">{{error}}</p>
                          </div>
                        </div>
                      </ValidationProvider>
                      <label class="col-12">{{$t('Phone')}}</label>
                      <ValidationProvider class="col-12">
                        <div class="form-group form-focus form-control" style="direction: ltr">
                          <p class="fixed-number">&#10088;+966&#10089; - </p><the-mask mask="05########" class="phone-setting" style="direction: ltr" v-model="updateInfo.phone" type="tel"  :placeholder="$t('Phone')"></the-mask>
                        </div>
                      </ValidationProvider>

                      <!--                      <ValidationProvider-->
                      <!--                        class="col-12"-->
                      <!--                        :rules="{required: true,regex: /^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/}"-->
                      <!--                        v-slot="{ errors }"-->
                      <!--                      >-->
                      <!--                        <label>{{$t('Phone')}}</label>-->
                      <!--                        <div class="form-group form-focus">-->
                      <!--                        <span class="phone-ksa" :style="{left: $i18n.locale=='ar'?'':'3.8rem' ,     right: $i18n.locale=='ar'?'5rem':''-->
                      <!--                        }"-->
                      <!--                        >{{phoneKsa}}</span>-->
                      <!--                          <input-->
                      <!--                            class="form-control floating"-->
                      <!--                            autocomplete-->
                      <!--                            :style="{paddingRight:$i18n.locale=='ar'?'8.2rem':'0'-->
                      <!--                        }"-->
                      <!--                            placeholder="phone"-->
                      <!--                            type="tel"-->
                      <!--                            v-model="updateInfo.phone"-->
                      <!--                          />-->
                      <!--                          <p class="p-error">{{ errors[0] }}</p>-->
                      <!--                          <div v-for="error in errorPhone" :key="error">-->
                      <!--                            <p class="p-error">{{error}}</p>-->
                      <!--                          </div>-->
                      <!--                        </div>-->
                      <!--                      </ValidationProvider>-->
                      <button
                        type="submit"
                        class="btn btn-primary submit-btn"
                      >{{$t('Save Changes')}}</button>
                    </div>
                  </form>
                </ValidationObserver>
                <!-- /Profile Settings Form -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Page Content -->
  </div>
</template>

<script>
// import axios from "axios";
import {TheMask} from 'vue-the-mask'
import Breadcrumb from "../../../../../components/breadcrumb";

export default {
  name: "profile",
  components: { Breadcrumb ,TheMask },
  middleware: "redirectAuth",
  head() {
    return {
      title: "Andalusia Dot Care",
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
      phoneKsa: "+966 05",
      updateInfo: {
        name: this.$auth.user.name,
        email: this.$auth.user.email,
        address: "s",
        gender: "male",
        avatar: "",
        phone: this.$auth.user.phone
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
    async handleLogout() {
      await this.$auth.logout();
      this.$router.push(this.localePath(`/${this.$route.params.bu}/`));
    },
    change() {
      this.updateInfo.name = this.$auth.user.first_name;
      this.updateInfo.email = this.$auth.user.email;
      // this.updateInfo.address = this.$auth.user.address;
      this.updateInfo.phone = this.$auth.user.phone;
    },
    updateProfile(updateInfo) {
      // console.log(updateInfo);
      this.$axios
        .put(`/${this.$route.params.bu}-api/update-profile`, updateInfo, {
          headers: { Authorization: this.token }
        })
        .then(response => {
          console.log("response");
          console.log(response.data);
          this.updateInfo.name = response.data.user.first_name;
          this.updateInfo.email = response.data.user.email;
          // this.updateInfo.address = this.$auth.user.address;
          this.updateInfo.phone = response.data.user.phone;
          $(".pop-up-success")
            .animate({ left: ".5%" }, 1000)
            .delay(3000)
            .animate({ left: "-130%" }, 1500);
          console.log("pop-up-success");
          window.location.reload();
          this.$router.push(
            this.localePath(`/${this.$route.params.bu}/doctors/search`)
          );
        })
        .catch(error => {
          // console.log(error);
        });
    }
  },
  mounted() {
    this.change();
    this.token = localStorage.getItem("auth._token.local");
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
input {
  &::placeholder {
    color: #000;
  }
}

.form-focus {
  position: relative;

  /*.phone-ksa {
    position: absolute;
    left: 1rem;
    top: 50%;
  }*/

  /*input[type="tel"] {
    padding: 0;
    padding-left: 5rem;
    padding-left: 4.3rem;
    padding-bottom: 1px;
  }*/
}

.form-focus .form-control {
  padding: 0 1rem;

  &::placeholder {
    color: #000;
  }
}

.form-focus {
  position: relative;

  /*.phone-ksa {
    transform: translateY(-50%);
    position: absolute;
    left: 1rem !important;
    top: 50%;
  }*/

 /* input[type="tel"] {
    padding: 0;
    padding-left: 5rem;
    padding-left: 4.3rem;
    padding-bottom: 1px;
  }*/
}

.form-focus .form-control {
  padding: 0 1rem;
}

html:lang(ar) {
  /*.phone-ksa {*/
  /*  direction: ltr;*/
  /*  left: 1rem !important;*/
  /*  right: auto !important;*/
  /*  top: 51%;*/
  /*}*/
  /*.form-focus {*/
  /*  direction: ltr;*/
  /*  left: 1rem !important;*/
  /*  right: auto !important;*/
  /*  top: 51%;*/
  /*}*/

  /*.form-focus input[type="tel"] {*/
  /*  padding-right: 1rem !important;*/
  /*}*/
}
.phone-setting{
  position: absolute;
  left: 5rem;
  top: 16%;
  border: none;
  padding-left: 0 !important;
  transform: translateY(14%);
  outline: none;
}
</style>
