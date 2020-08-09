<template>
  <div class="row">
    <div class="col-12">
      <h4 class="heading-posts">instagram posts</h4>
    </div>
    <div class="col-12">
      <div class="hold-images-posts">
        <div class="row">
          <div class="col-sm-4 col-6 my-1">
            <img src="../assets/images/img-post.png" class="img-fluid image-insta" alt="image">
          </div>
          <div class="col-sm-4 col-6 my-1">
            <img src="../assets/images/img-post-two.png" class="img-fluid image-insta" alt="image">
          </div>
          <div class="col-sm-4 col-6 my-1">
            <img src="../assets/images/img-post-three.png" class="img-fluid image-insta" alt="image">
          </div>
          <div class="col-sm-4 col-6  my-1">
            <img src="../assets/images/img-post-four.png" class="img-fluid image-insta" alt="image">
          </div>
          <div class="col-sm-4  col-6 my-1">
            <img src="../assets/images/img-post-five.png" class="img-fluid image-insta" alt="image">
          </div>
          <div class="col-sm-4  col-6 my-1">
            <img src="../assets/images/img-post-six.png" class="img-fluid image-insta" alt="image">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "InstaPosts"
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .heading-posts {
    color: $main-color;
    text-transform: uppercase;
  }
  .image-insta{
    width: 100%;
    object-fit: cover;
    object-position: center;
  }
</style>
