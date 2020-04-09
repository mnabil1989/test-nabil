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
        <div class="col-md-12 col-lg-6 mr-auto ml-auto">
          <!-- Change Password Form -->
          <ValidationObserver v-slot="{ handleSubmit }">
            <form @submit.prevent="handleSubmit(login())">
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
              <ValidationProvider rules="required|confirmed:confirmation" v-slot="{ errors }">
                <div class="form-group">
                  <label>{{$t('Confirm Password')}}</label>
                  <input
                    type="password"
                    class="form-control"
                    :placeholder="$t('Confirm Password')"
                    v-model="update.new_password_confirmation"
                  />
                </div>
                <p class="p-error">{{ errors[0] }}</p>
              </ValidationProvider>
              <div class="submit-section">
                <button type="submit" class="btn btn-primary submit-btn">{{$t('Save Changes')}}</button>
              </div>
            </form>
            <!-- /Change Password Form -->
          </ValidationObserver>
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
  async created() {
    let resetResponse = await this.$axios.post(`/api/password/reset`, {
      email: "user@user.com",
      reset_token: this.$route.params.forgetPassword
    });
    this.token = resetResponse.data["token"];
  },
  components: { ValidationProvider },
  data() {
    return {
      update: {
        new_password: "",
        new_password_confirmation: ""
      },
      token: "",
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
      if (this.update.new_password != this.update.new_password_confirmation)
        return;

      try {
        let resetResponse = await this.$axios.post(
          "/api/password/reset",
          {
            password: this.update.new_password
          },
          {
            headers: {
              Authorization: `Bearer ${this.token}`
            }
          }
        );
        this.$router.push(this.localePath("/auth/login"));
      } catch (e) {
        this.error = e.response.data;
      }
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
