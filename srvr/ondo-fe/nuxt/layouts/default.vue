<template>
  <div class="page-body">
    <Headr />
    <nuxt />
    <Footr />

    <!-- <div class="book-now">
      <a class="btn btn-success" @click="openIframe">{{$t('Book Now')}}</a>
    </div>-->
  </div>
</template>

<script>
import Headr from "../components/Headr";
import Footr from "../components/Footr";
export default {
  components: {
    Headr,
    Footr
  },
  methods: {
    openIframe() {
      let Win = window.open(
        "https://www.google.com",
        "_blank",
        "width=400, height=400 ,left=200 , top=200"
      );

      return false;
    }
  }
};
</script>

<style>
html {
  font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI",
    Roboto, "Helvetica Neue", Arial, sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: border-box;
  margin: 0;
}

.button--green {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #3b8070;
  color: #3b8070;
  text-decoration: none;
  padding: 10px 30px;
}

.button--green:hover {
  color: #fff;
  background-color: #3b8070;
}

.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}

.button--grey:hover {
  color: #fff;
  background-color: #35495e;
}
.page-body {
  position: relative;
}
.book-now {
  position: fixed;
  right: 0;
  top: 50%;
  /* animation: 1s bookNow; */
  animation: bookNow 3s forwards ease-in-out;
}

@keyframes bookNow {
  0% {
    top: 0%;
  }
  80% {
    top: 80%;
  }
  100% {
    top: 55%;
  }
}
</style>
