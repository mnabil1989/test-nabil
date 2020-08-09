<template>
  <div class="search">
    <input type="search" placeholder="type here">
    <i class="fas fa-search"></i>
  </div>
</template>

<script>
    export default {
        name: "Search"
    }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .search {
    margin: 1rem auto;

    input {
      width: 80%;
      background-color: transparent;
      color: $main-color;
      border: none;
      outline: none;
      display: inline-block;
      padding: 1rem .5rem;
      transition: all ease-in-out .3s;
      font-size: 1.3rem;

      &::placeholder {
        color: $main-color;
        text-transform: capitalize;
      }
    }

    .fa-search {
      color: $main-color;
      font-size: 1.5rem;
    }
  }
</style>
