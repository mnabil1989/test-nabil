<template>
  <div class="settings-container">
    <div class="errors">
      <div class="err-body center" v-for="(error, index) in errors" :key="index">{{ error[0] }}</div>
    </div>
    <form action="post" @submit.prevent="update()">
      <div class="input">
        <input type="email" name="user-email" v-model="email" :placeholder="$t('emailPlaceholder')" />
      </div>

      <div class="input">
        <input
          type="text"
          name="user-mobile"
          v-model="phone"
          maxlength="8"
          pattern="^(5|0|3|6|4|9|1|8|7)([0-9]{7})$"
          title="phone number must be 8 numbers only.
           phone number must not begin with 2 .
           e.g. 51234567"
          :placeholder="$t('YourPhone') "
        />
      </div>
      <input type="submit" style="display:none; " id="sub-btn" />
    </form>
    <div @click="submit()" v-if="!unChanged" class="update-btn center">{{$t('saveChanges')}}</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: this.$auth.user.email,
      password: "",
      phone: this.$auth.user.phone,
      errors: {}
    };
  },
  methods: {
    async submit() {
      document.getElementById("sub-btn").click();
    },
    update() {
      this.$axios
        .put("/api/update-profile", {
          first_name: this.$auth.user.first_name,
          last_name: this.$auth.user.last_name
            ? this.$auth.user.last_name
            : "last Name",
          name: this.$auth.user.name,
          address: this.$auth.user.address,
          gender: this.$auth.user.gender,
          email: this.email,
          phone: this.phone,
          password: this.password,
          password_confirmation: this.password
        })
        .then(res => {
          console.log(res);
          this.$auth.fetchUser();
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
      let emChanged = this.email == this.$auth.user.email;
      let passChanged = this.password == "";
      let phoneChanged = this.phone == this.$auth.user.phone;
      return emChanged && passChanged && phoneChanged;
    }
  }
};
</script>

<style scoped lang="scss">
.settings-container {
  padding-top: 1.8%;
  padding-bottom: 5%;
}
.input {
  width: 76%;
  margin: 0 auto;
  @media (max-width: 768px) {
    width: 90%;
  }
}
input {
  width: 100%;
  outline: none;
  border: none;
  border: 1px solid #ffc77a;
  color: #003580;
  border-radius: 20px;
  padding: 1rem;
  font-size: 150%;
  margin-bottom: 2rem;
}
input::placeholder {
  color: #003580;
  opacity: 1;
}
.update-btn {
  color: #003580;
  border: 1px solid #ffc77a;
  border-radius: 20px;
  width: 15%;
  line-height: 2;
  margin: 0 auto;
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
