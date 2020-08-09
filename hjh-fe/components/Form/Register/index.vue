<template>
  <div class="register-container">
    <div class="pop-up-error">
      <p v-for="(error, index) in errors" :key="index">{{ error[0] }}</p>
    </div>
<!--    <div class="errors">-->
<!--      <div class="err-body center" v-for="(error, index) in errors" :key="index">{{ error[0] }}</div>-->
<!--    </div>-->
    <form @submit.prevent="handleSubmit">
      <div class="input-group">
        <input
          :placeholder="$t('enterName')"
          type="text"
          v-model.trim="form.name"
          required="true"
          autofocus
        />
      </div>
      <div class="input-group">
        <input
          :placeholder="$t('enterEmail')"
          type="email"
          v-model.trim="form.email"
          required="true"
        />
      </div>

      <div class="input-group">
        <input
          type="text"
          :placeholder="$t('enterPhone')"
          name="user-mobile"
          v-model="form.phone"
          maxlength="8"
          pattern="^(5|0|3|6|4|9|1|8|7)([0-9]{7})$"
          title="phone number must be 8 numbers only.
           phone number must not begin with 2 .
           e.g. 51234567"
          required="true"
        />
      </div>

      <div class="input-group">
        <input
          :placeholder="$t('enterPass')"
          type="password"
          v-model.trim="form.password"
          required="true"
        />
      </div>
      <div class="input-group">
        <input
          :placeholder="$t('entercPass')"
          type="password"
          v-model.trim="form.password_confirmation"
          required="true"
        />
      </div>

      <button type="submit">{{$t('register')}}</button>
    </form>
    <div class="lower-section">
      <div class="icon-container"></div>

      <div class="signin-option">
        <span>
          {{$t('haveAcc')}}
          <NuxtLink :to="localePath('/auth/login')">{{$t('login')}}</NuxtLink>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import Input from "@/components/Common/Input";
import IconBar from "@/components/Common/IconBar";
export default {
  components: { Input, IconBar },
  props: ["profile", "token", "provider"],
  data() {
    return {
      errors: {},
      form: {
        name: "",
        email: "",
        phone: "",
        password: "",
        password_confirmation: ""
      }
    };
  },
  watch: {
    profile() {
      this.form.name = this.profile.name;
      this.form.email = this.profile.email;
    }
  },

  methods: {
    async handleSubmit() {
      console.log(this.form);
      //Here We can handle the registeration process
      if (this.form.password !== this.form.password_confirmation) {
        alert("your password didn't match");
        this.form.password = "";
        this.form.password_confirmation = "";
        return;
      } else {
        if (!this.provider) {
          this.registerNormal();
          return;
        }
        this.registerSocial();
      }
    },
    async registerNormal() {
      this.$axios
        .post("/api/register", {
          name: this.form.name,
          email: this.form.email,
          phone: this.form.phone,
          address: "dummy",
          government_id: 1000000000,
          gender: "dummy",
          password: this.form.password,
          password_confirmation: this.form.password
        })
        .then(item => {
          this.$auth
            .loginWith("local", {
              data: {
                email: this.form.email,
                password: this.form.password
              }
            })
            .then(res => {
              window.console.log("success logged in and authenticated");
              this.$router.push(this.localePath("/"));
            });
        })
        .catch(err => {
          this.errors = err.response.data;
          $(".pop-up-error")
            .animate({left: ".5%"}, 1000)
            .delay(4000)
            .animate({left: "-130%"}, 1500);
        });
    },
    async registerSocial() {
      this.$axios
        .post("/api/social-registration", {
          token: this.token,
          provider: this.provider,
          name: this.form.name,
          email: this.form.email,
          phone: this.form.phone,
          address: "dummy",
          gender: this.profile.gender,
          password: this.form.password,
          password_confirmation: this.form.password
        })
        .then(item => {
          this.$auth
            .loginWith("local", {
              data: {
                email: this.form.email,
                password: this.form.password
              }
            })
            .then(res => {
              window.console.log("success logged in and authenticated");
              this.$router.push(this.localePath("/"));
            });
        })
        .catch(err => {
          this.errors = err.response.data;
          setTimeout(() => {
            this.errors = {};
          }, 3000);
        });
    }
  }
};
</script>

<style lang='scss' scoped>

.register-container {
  display: flex;
  flex-direction: column;
  padding: 5%;
  @media (min-width: 400px) {
    height: 480px;
  }
}
.register-container form {
  width: 100%;
  margin: 0 auto;
}
.lower-section {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.icon-container {
  /* margin: auto 0 auto 40px; */
}
form > button {
  border: 1px solid #ffc77a;
  font-size: 180%;
  box-shadow: 0 2px 4px 0 rgba(4, 102, 122, 0.13);
  border-radius: 8px;
  background: white;
  color: #003580;
  display: block;
  margin: 2.2% auto;
  padding: 2% 5%;
  transition: all ease-in-out .4s;
  outline: none;
}
form > button:hover {
  background-color: #ffc77a;
  color: white;
}
.input-group {
  width: 90%;
  height: 50px;
  margin: 0 auto;
  margin-bottom: 5%;
}
input {
  width: 100%;
  outline: none;
  border: 1px solid #ffc77a;
  padding-right: 2%;
  border-radius: .5rem;
  &:lang(en) {
    direction: ltr;
    text-align: left;
    padding-left: 2%;
  }
  color: #003580;
  font-size: 140%;
}
.err-body {
  color: red;
}
input::placeholder {
  color: #003580;
  opacity: 0.54;
  /* font-size: 1.2em; */
}
.signin-option > span {
  color: #003580;
}
.signin-option > span > a {
  cursor: pointer;
}

/* Responsive */
@media only screen and (max-width: 580px) {
  .image-container {
    width: 60%;
  }
  .register-container {
    font-size: 14px;
  }
}

@media only screen and (min-width: 580px) {
  .image-container {
    width: 60%;
  }
  .register-container {
    font-size: 15px;
  }
}
@media only screen and (min-width: 850px) {
  .register-container {
  }
}
</style>
