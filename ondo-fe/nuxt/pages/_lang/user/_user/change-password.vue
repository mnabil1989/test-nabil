<template>
  <!-- Main Wrapper -->
  <div class="main-wrapper">
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <nuxt-link :to="localePath('/')">{{$t('Home')}}</nuxt-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$t('Change Password')}}</li>
              </ol>
            </nav>
            <h2 class="breadcrumb-title">{{$t('Change Password')}}</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
            <!-- Profile Sidebar -->
            <div class="profile-sidebar">
              <div class="widget-profile pro-widget-content">
                <div class="profile-info-widget">
                  <div class="profile-det-info">
                    <h3>{{$auth.user.first_name }}</h3>
                  </div>
                </div>
              </div>
              <div class="dashboard-widget">
                <nav class="dashboard-menu">
                  <ul>
                    <li>
                      <nuxt-link :to="localePath('/user/person/profile-settings')">
                        <i class="fas fa-user-cog"></i>
                        <span>{{$t('Profile Settings')}}</span>
                      </nuxt-link>
                    </li>
                    <li class="active">
                      <nuxt-link :to="localePath('/user/person/change-password')">
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
            <!-- /Profile Sidebar -->
          </div>

          <div class="col-md-7 col-lg-8 col-xl-9">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-lg-6">
                    <!-- Change Password Form -->

                    <ValidationObserver v-slot="{ handleSubmit }">
                      <form @submit.prevent="handleSubmit(updatePassword(update))">
                        <ValidationProvider rules="required" v-slot="{ errors }">
                          <div class="form-group">
                            <label>{{$t('current Password')}}</label>
                            <input
                              id="password"
                              class="form-control"
                              type="password"
                              :placeholder="$t('password')"
                              v-model="update.current_password"
                            />
                          </div>
                          <p class="p-error">{{ errors[0] }}</p>
                        </ValidationProvider>
                        <ValidationProvider rules="required" v-slot="{ errors }" vid="confirmation">
                          <div class="form-group">
                            <label>{{$t('New Password')}}</label>
                            <input
                              type="password"
                              class="form-control"
                              :placeholder="$t('New Password')"
                              v-model="update.new_password"
                            />
                          </div>
                          <p class="p-error">{{ errors[0] }}</p>
                        </ValidationProvider>
                        <ValidationProvider
                          rules="required|confirmed:confirmation"
                          v-slot="{ errors }"
                        >
                          <div class="form-group">
                            <label>{{$t('Password confirmation')}}</label>
                            <input
                              type="password"
                              class="form-control"
                              :placeholder="$t('Password confirmation')"
                              v-model="update.new_password_confirmation"
                            />
                          </div>
                          <p class="p-error">{{ errors[0] }}</p>
                        </ValidationProvider>
                        <div class="submit-section">
                          <button
                            type="submit"
                            class="btn btn-primary submit-btn"
                          >{{$t('Save Changes')}}</button>
                        </div>
                      </form>
                      <!-- /Change Password Form -->
                    </ValidationObserver>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Page Content -->
  </div>
  <!-- /Main Wrapper -->
</template>

<script>
import axios from "axios";

export default {
  name: "change-password",
  middleware: "auth",
  data() {
    return {
      update: {
        current_password: null,
        new_password: null,
        new_password_confirmation: null
      }
    };
  },
  methods: {
    async handleLogout() {
      await this.$auth.logout();
      this.$router.push(this.localePath("/"));
    },
    updatePassword(update) {
      axios
        .put("/api/update-profile-password", update, {
          headers: { Authorization: this.token }
        })
        .then(response => {
          // this.$router.push("/doctors/search")
          window.location.href = "user/person/profile-settings";
        })
        .catch(error => {})
        .catch(error => {});
    }
  },
  mounted() {
    this.token = localStorage.getItem("auth._token.local");
  }
};
</script>

<style scoped>
</style>
