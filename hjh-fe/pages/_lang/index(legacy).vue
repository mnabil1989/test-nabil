<template>
  <div class="container img-slider-container">
    <ImgSlider :ImgArray="sliderImages" />
    <NuxtLink to="auth/login">Login Now</NuxtLink>
    <h1>h1-example</h1>

    <!-- <h3>Login state : {{loggedIn}} + {{$store.state.auth.loggedIn}}</h3> -->
    <h2>is Authenticated : {{ authenticated }}</h2>
  </div>
</template>

<script>
import ImgSlider from "@/components/Common/ImgSlider";
import axios from "axios";
import { mapGetters } from "vuex";

export default {
  components: {
    ImgSlider
  },
  computed: {
    loggedIn: function() {
      return false;
    }
  },
  data: function() {
    return {
      settings: "my title",
      itemList: [],
      sliderImages: [
        {
          id: 0,
          url:
            "https://www.dreamhost.com/blog/wp-content/uploads/2018/06/SEO-Tools-for-Optimization-DreamHost-2-750x498.jpg",
          alt: "img0"
        },
        {
          id: 1,
          url:
            "https://blog.addthiscdn.com/wp-content/uploads/2018/01/09151130/13-Tips-For-Speeding-Up-Your-Website-full.png",
          alt: "img0"
        },
        {
          id: 2,
          url:
            "https://blog.addthiscdn.com/wp-content/uploads/2018/01/09151130/13-Tips-For-Speeding-Up-Your-Website-full.png",
          alt: "img0"
        }
      ]
    };
  },
  async fetch(context) {
    try {
      let res = await axios.get("http://15.185.60.74:8080/api/home");
      context.store.commit("router/SET_HOME_DATA", res.data);
      //return {itemList : res.data.menus, settings: res.data.settings}
    } catch (error) {
      console.log("error from home page fetching" + error);
      return;
    }
  }
};
</script>

<style scoped>
.img-slider-container {
  border: 1px solid black;
  margin-bottom: 200px;
}

.example {
  border: 1px solid black;
}
</style>
