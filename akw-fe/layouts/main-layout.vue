<template>
  <div>
    <Header class="headerNav"></Header>
    <nuxt/>
    <Footer></Footer>
  </div>
</template>

<script>

  import Header from "../components/Header";
  import Footer from "../components/Footer";

  export default {
    name: "main-layout",
    components: {Footer, Header},
    mounted() {
      $(document).scroll(function(){
        if($(this).scrollTop() > 300){
          $(".headerNav").addClass("toggleClass");
          $(this).find(".menu").css("background-color","transparent")
        } else{
          $(".headerNav").removeClass("toggleClass")
        }
      })
    }
  }
</script>

<style scoped lang="scss">
  @import "assets/css/variable";
  .headerNav{
    background-color: $backgroundColor;
  }
  .toggleClass {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    transition: all ease-in-out .3s;
    z-index: 55;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    box-shadow: 0 2px 4px 0 rgba(61, 4, 122, 0.2);
    background-color: #fff !important;
  }

</style>
