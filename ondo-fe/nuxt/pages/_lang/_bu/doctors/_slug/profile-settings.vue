<template>
  <div>
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <nuxt-link :to="localePath(`/${$route.params.bu}/`)">Home</nuxt-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
              </ol>
            </nav>
            <h2 class="breadcrumb-title">Profile Settings</h2>
          </div>
        </div>
      </div>
    </div>
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
                    <h3>Richard Wilson</h3>
                  </div>
                </div>
              </div>
              <div class="dashboard-widget">
                <nav class="dashboard-menu">
                  <ul>
                    <li class="active">
                      <nuxt-link
                        :to="localePath(`/${$route.params.bu}/doctors/doctor/profile-settings`)"
                      >
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                      </nuxt-link>
                    </li>
                    <li>
                      <nuxt-link
                        :to="localePath(`/${$route.params.bu}/doctors/doctor/change-password`)"
                      >
                        <i class="fas fa-lock"></i>
                        <span>Change Password</span>
                      </nuxt-link>
                    </li>
                    <li>
                      <a @click="$auth.logout()" class="sign-out">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
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
                    <ValidationProvider rules="required" v-slot="{ errors }">
                      <div class="form-group form-focus">
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
                    <ValidationProvider rules="required|email" v-slot="{ errors }">
                      <div class="form-group form-focus">
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
                    <ValidationProvider
                      :rules="{regex: /^(5|0|3|6|4|9|1|8|7)([0-9]{7})$/}"
                      v-slot="{ errors }"
                    >
                      <div class="form-group form-focus">
                        <span class="phone-ksa">{{phoneKsa}}</span>
                        <input
                          class="form-control floating"
                          autocomplete
                          placeholder="phone"
                          type="tel"
                          v-model="updateInfo.phone"
                        />
                        <p class="p-error">{{ errors[0] }}</p>
                        <div v-for="error in errorPhone" :key="error">
                          <p class="p-error">{{error}}</p>
                        </div>
                      </div>
                    </ValidationProvider>
                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
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
export default {
  name: "profile",
  middleware: "redirectAuth",
  data() {
    return {
      phoneKsa: "+966 5",
      updateInfo: {
        name: this.$auth.user.first_name,
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
    change() {
      this.updateInfo.name = this.$auth.user.first_name;
      this.updateInfo.email = this.$auth.user.email;
      // this.updateInfo.address = this.$auth.user.address;
      this.updateInfo.phone = this.$auth.user.phone;
    },
    updateProfile(updateInfo) {
      console.log(updateInfo);
      this.$axios
        .put(`/${this.$route.params.bu}-api/update-profile`, updateInfo, {
          headers: { Authorization: this.token }
        })
        .then(response => {
          console.log(response);
          this.updateInfo.name = response.data.user.first_name;
          this.updateInfo.email = response.data.user.email;
          // this.updateInfo.address = this.$auth.user.address;
          this.updateInfo.phone = response.data.user.phone;
          window.location.reload();
          this.$router.push(
            this.localePath(`/${$route.params.bu}/doctors/search`)
          );
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  mounted() {
    // this.change();
    this.token = localStorage.getItem("auth._token.local");
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
  .phone-ksa {
    transform: translateY(-50%);
    position: absolute;
    left: 1rem;
    top: 50%;
  }
  input[type="tel"] {
    padding: 0;
    padding-left: 5rem;
    padding-left: 4.3rem;
    padding-bottom: 1px;
  }
}
.form-focus .form-control {
  padding: 0 1rem;
}
</style>
