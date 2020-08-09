<template>
  <div class="main-container" dir="rtl">
    <div class="form-container">
      <div class="col-lg-12 upper-form-shadow-one"></div>
      <div class="col-lg-12 upper-form-shadow-two"></div>
      <Register
        :profile="profile"
        :provider="'facebook'"
        :token="SocialToken"
      />
    </div>
    <div class="col-lg-4 image-container">
      <img :src="andalusiaSrc" />
    </div>
  </div>
</template>

<script>
import Register from "@/components/Form/Register";
export default {
  components: {
    Register
  },
  data() {
    return {
      profile: {},
      andalusiaSrc:
        "https://alborsaanews.com/app/uploads/2016/07/1468329684_762_86406_-512x435.png",
      SocialToken: ""
    };
  },
  async mounted() {
    let token = this.$route.hash.substring(14);
    let graphResponse = await this.$axios.get(
      `https://graph.facebook.com/v2.12/me?fields=name,first_name,last_name,picture{url},email&access_token=${token}`
    );

    this.$nextTick(() => {
      this.profile = graphResponse["data"];
      this.SocialToken = token;
    });
  },
  layout: "splash"
};
</script>

<style scoped>
.main-container {
  display: flex;
  justify-content: space-around;
  align-items: center;
  overflow: hidden;
}
.main-container > .form-container {
  align-self: baseline;
  border: 1px solid #ffc77a;
  border-radius: 12%;
  background: #ffffff;
  margin-top: 4.4%;
  padding: 2%;
  position: relative;
  align-self: end;
  width: 35%;
  z-index: 9999;
}
.upper-form-shadow-one {
  position: absolute;
  border: 1px solid #ffc77a;
  border-bottom: none;
  top: -8.2%;
  left: 0;
  background: #ffffff;
  opacity: 0.17;
  height: 350px;
  border-radius: 12%;
  z-index: -1;
}
.upper-form-shadow-two {
  position: absolute;
  border: 1px solid #ffc77a;
  background: #ffffff;
  opacity: 0.17;
  border-bottom: none;
  top: -4.1%;
  left: 0;
  z-index: -1;
  height: 350px;
  border-radius: 12%;
}
.main-container > .image-container {
  height: 305px;
  width: 40vw;
}
.image-container img {
  height: 100%;
  width: 100%;
}
@media only screen and (max-width: 720px) {
  .form-container {
    width: 90% !important;
  }
  .image-container {
    display: none;
  }
}
</style>
