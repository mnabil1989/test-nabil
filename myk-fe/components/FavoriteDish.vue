<template>
  <div class="col-md-4 col-sm-6 col-12">
    <img :src="favDish.image" alt="news" class="img-fluid favorite-dish-img">
    <h4 class="favorite-name-dish">{{favDish.title}}</h4>
  </div>
</template>

<script>
  export default {
    name: "FavoriteDish",
    props: {
      favDish: {
        type: Array
      }
    }
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .favorite-dish-img {
    box-shadow: 0 5px 18px 0 rgba(0, 0, 0, 0.36);
    max-height: 350px;
    display: block;
    margin: 0 auto 1.5rem;

  }

  .favorite-name-dish {
    font-size: 1.5rem;
    color: $main-color;
    margin: 1.5rem 0;
    text-align: center;
    font-weight: bold;
  }
</style>
