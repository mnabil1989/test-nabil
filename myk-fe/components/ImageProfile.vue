<template>
  <div class="hold-img">
    <img src="../assets/images/profile-pic.png" alt="profile-img" class="img-fluid profile-img">
  </div>
</template>

<script>
    export default {
        name: "ImageProfile"
    }
</script>

<style scoped lang="scss">
  .hold-img{
    padding: 2rem 0;
  }
  .profile-img{
    border-radius: 50%;
    height: 200px;
    @media (max-width: 800px) {
      height: 150px;
    }
  }
</style>
