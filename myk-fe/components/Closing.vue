<template>
  <div class="col-12 d-flex justify-content-center align-items-center">
    <nuxt-link :to="localePath('/main')" class="text-capitalize to-home">
<!--      <img src="../assets/images/close.svg">-->
      {{$t('back to home')}}
    </nuxt-link>
  </div>
</template>

<script>
  export default {
    name: "Closing",
    computed:{
      siteType(){
        return this.$store.state.siteType;
      }
    }
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  img {
    margin: 4rem 0;
  }
  .to-home{
    color: $main-color;
    margin: 4rem auto 2rem auto ;
    text-decoration: none;
    transition: all ease-in-out .4s;
    &:hover{
      text-decoration: none;
      color: #fff;
    }
  }
</style>
