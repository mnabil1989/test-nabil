<template>
  <div class="main-container" dir="rtl">
    <div class="form-container">
      <div class="col-12 upper-form-shadow-one"></div>
      <div class="col-lg-12 upper-form-shadow-two"></div>
      <Login />
    </div>
    <div class="col-lg-4 image-container">
      <nuxt-link :to="localePath('/home')">
        <img src="@/assets/img/logo-header.webp" alt="logo-andalusia" class="logo"/>
      </nuxt-link>
    </div>
  </div>
</template>

<script>
import Login from "@/components/Form/Login";
export default {
  components: {
    Login
  },
  layout: "splash",
  head(){
    return{
      link: [
        {
          rel: "canonical",
          href:  this.baseUrl
        }
      ]
    }
  },
  created() {
    if(process.browser){
      this.baseUrl = window.location.origin + window.location.pathname
    }
  },
  data: function() {
    return {
      baseUrl:''
    };
  }
};
</script>

<style scoped lang="scss">
.main-container {
  display: flex;
  justify-content: space-around;
  align-items: center;
}
.main-container > .form-container {
  align-self: baseline;
  border: 1px solid #ffc77a;
  border-radius: 10%;
  background: #ffffff;
  margin-top: 7rem;
  padding: 2%;
  position: relative;
  align-self: end;
  width: 35%;
  z-index: 9999;
  @media (max-width: 768px) {
    margin-top: 10%;
  }
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
  border-radius: 10%;
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
  object-fit: contain;
}

@media only screen and (max-width: 750px) {
  .form-container {
    width: 90% !important;
  }
  .image-container {
    display: none;
  }
}
</style>
