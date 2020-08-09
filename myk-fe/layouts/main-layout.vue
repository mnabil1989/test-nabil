<template>
  <div class="mobile-relative" id="mobile-relative" v-if="this.$store.state.siteType == 'bistro'">
    <AltHeader></AltHeader>
    <transition name="fade">
      <nuxt/>
    </transition>
    <MainFooter></MainFooter>
  </div>

  <div class="mobile-relative" id="mobile-kids-relative" v-else>
    <AltHeader :isKidHeader='true'></AltHeader>
    <transition name="fade">
      <nuxt/>
    </transition>
    <KidFooter></KidFooter>
  </div>

</template>

<script>
  import AltHeader from "../components/AltHeader";
  import MainFooter from "../components/MainFooter";
  import KidFooter from "../components/KidFooter";
  import axios from "axios";

  export default {
    name: "main-layout",
    components: {MainFooter, AltHeader,KidFooter},
    // middleware: 'auth',
    data() {
      return {}
    },
    mounted() {
      if(this.$store.state.siteType == 'bistro'){
        window.addEventListener('scroll', function (e) {
          if (window.pageYOffset > 200 && window.innerWidth > 1200) {
            $("#mobile-relative").addClass('toggleClass');
          } else {
            $("#mobile-relative").removeClass("toggleClass")
          }
        });
      } else{
        window.addEventListener('scroll', function (e) {
          if (window.pageYOffset > 200 && window.innerWidth > 1200) {
            $('#mobile-kids-relative').addClass("toggleClass")
          } else {
            $('#mobile-kids-relative').removeClass("toggleClass");
          }
        });
      }
    }
  }
</script>

<style lang="scss" scoped>
  $main-font: 'Poppins';
  * {
    font-family: $main-font;
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity 1s;
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
  {
    opacity: 0;
  }

  .mobile-relative {
    @media (max-width: 1200px) {
      position: relative;
    }
  }

  .toggleClass {
    .alt-header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.76);
      transition: all ease-in-out .3s;
      padding: 1rem .2rem;
      .img-header {
        opacity: 0 !important;
      }
    }

    @media (max-width: 1200px) {
      display: none;
    }
  }
</style>
