<template>
  <div class="settings-container">
    <div class="errors">
      <div class="err-body center" v-for="(error, index) in errors" :key="index">{{ error[0] }}</div>
    </div>
    <form action="post" @submit.prevent="update()">
      <div class="input">
        <input
          type="password"
          name="user-pass"
          v-model="oldPass"
          :placeholder="$t('o-passPlaceholder')"
        />
      </div>
      <div class="input">
        <input
          type="password"
          name="user-c-cpass"
          v-model="password"
          :placeholder="$t('c-passPlaceholder')"
        />
      </div>
      <div class="input">
        <input
          type="password"
          name="user-c-pass"
          v-model="cpassword"
          :placeholder="$t('c-cpassPlaceholder')"
        />
      </div>

      <input type="submit" style="display:none; " id="sub-btn" />
    </form>
    <div @click="submit()" v-if="!unChanged" class="update-btn center">{{$t('changePass')}}</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      cpassword: "",
      password: "",
      oldPass: "",
      errors: {}
    };
  },
  methods: {
    async submit() {
      document.getElementById("sub-btn").click();
    },
    update() {
      this.$axios
        .put("/api/update-profile-password", {
          current_password: this.oldPass,
          new_password: this.password,
          new_password_confirmation: this.cpassword
        })
        .then(res => {
          console.log(res);
          this.$auth.fetchUser();
          this.$router.push(this.localePath("/profile"));
          this.errors = {};
        })
        .catch(err => {
          console.log(err.response.data);
          this.errors = err.response.data;
        });
    }
  },
  computed: {
    unChanged: function() {
      let emChanged = this.cpassword == "";
      let passChanged = this.password == "";
      let phoneChanged = this.oldPass == "";
      return emChanged && passChanged && phoneChanged;
    }
  }
};
</script>

<style scoped>
.settings-container {
  padding-top: 1.8%;
  padding-bottom: 5%;
}
.input {
  width: 76%;
  margin: 0 auto;
}
input {
  width: 100%;
  outline: none;
  border: none;
  border: 1px solid #ffc77a;
  border-radius: 20px;
  padding: 1rem;
  font-size: 150%;
  color: #003580;
  margin-bottom: 2rem;
}
input::placeholder {
  color: #003580;
  opacity: 1;
}
.update-btn {
  border: 1px solid #ffc77a;
  border-radius: 25vw;
  height: 5.8vw;
  width: 30%;
  color: #003580;

  margin: 0 auto;
  /* margin-right: 11%; */
  font-size: 160%;
  transition: 0.4s;
}
.update-btn:hover {
  cursor: pointer;
  color: #ffffff;
  background: #ffc77a;
}
.errors {
  color: red;
}
</style>
