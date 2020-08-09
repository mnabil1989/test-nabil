<template>
    <div class="social">
      <img src="../assets/images/instagram.png"  alt="instagram" class="img-fluid">
      <img src="../assets/images/snap-icon-22.png" alt="snap" class="img-fluid">
      <img src="../assets/images/twitter.png" alt="twitter" class="img-fluid">
      <img src="../assets/images/facebook.png" alt="facebook" class="img-fluid">
    </div>
</template>

<script>
    export default {
        name: "SocialLinks"
    }
</script>

<style scoped lang="scss">
  @import "assets/css/mixin";
  .social{
    @include flex_center;
    img{
      display: inline-block;
      margin: 0 .3rem;
      @media (max-width: 768px) {
        height: 23px;
      }
    }
  }
</style>
