<template>
  <div class="register-container">
    <div class="pop-up-error">
      <p v-for="(error, index) in errors" :key="index">{{ error }}</p>
    </div>
    <div class="image-container">
      <nuxt-link :to="localePath('/home')">
        <img src="@/assets/img/logo.png" alt="logo-andalusia"/>
      </nuxt-link>
    </div>
    <div>
      <form @submit.prevent="handleSubmit" class="align-center d-col">
        <Input :label="$t('enterEmail')" type="email" v-model.trim="form.email" required="true" />
        <Input
          :label="$t('enterPass')"
          type="password"
          v-model.trim="form.password"
          required="true"
        />

        <button type="submit">{{$t('login')}}</button>
      </form>
    </div>
    <div class="lower-section">
      <div class="icon-container">
        <IconBar iconSize="150%" :onFacbookIcon="FacebookLogin" />
      </div>

      <div class="signin-option">
        <span>
          {{$t('notUser')}}
          <NuxtLink :to="localePath('/auth/register')">{{$t('newAcc')}}</NuxtLink>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import Input from "@/components/Common/Input";
import IconBar from "@/components/Common/IconBar";
import { mapMutations, mapGetters } from "vuex";
export default {
  components: { Input, IconBar },
  data() {
    return {
      form: {
        email: "",
        password: ""
      },
      errors:null
    };
  },
  methods: {
    ...mapMutations({ currPageChanged: "authObj/changeCurrentPath" }),
    ...mapGetters({ hasChangedPath: "authObj/hasChangedPath" }),
    async FacebookLogin() {
      await this.$auth.loginWith("facebook");
    },

    async handleSubmit() {
      await this.$auth
        .loginWith("local", { data: this.form })
        .then(() => {
          ` this has changed path has changed this ${this.hasChangedPath()}`;

          if (this.hasChangedPath()) {
            this.currPageChanged(false);
            this.$router.back();
            return;
          }

          this.$router.push(this.localePath("/home"));
        })
        .then(res => {
          this.$axios.defaults.headers.common = {
            Authorization: ` ${this.$auth.getToken("local")}`
          };
        })
        .catch(err => {
          this.errors = err.response.data;
          $(".pop-up-error")
            .animate({left: ".5%"}, 1000)
            .delay(4000)
            .animate({left: "-130%"}, 1500);
        });
    }
  }
};
</script>

<style scoped lang="scss">
.register-container {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  height: 430px;
}
.register-container form {
  width: 100%;
  margin: 0 auto;
}
.lower-section {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: center;
}
form {
  direction: rtl;
}
.image-container {
  margin: 0 auto;
  margin-top: 12.75px;
  height: 133px;
  width: 14.791666666666666vw;
}

.image-container img {
  text-align: center;
  width: 100%;
  height: 100%;
  object-fit: contain;
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
.signin-option > span {
  color: #003580;
}
.signin-option > span > a {
  cursor: pointer;
}

/* Responsive */
@media only screen and (max-width: 500px) {
  .image-container {
    width: 60%;
  }
  .register-container {
    height: 500px;
    font-size: 13px;
  }
}

@media only screen and (max-width: 850px) {
  .image-container {
    width: 60%;
  }
  .register-container {
    height: 500px;
    font-size: 15px;
  }
}
@media only screen and (min-width: 850px) {
  .register-container {
    height: 430px;
  }
}
</style>
