<template>
  <div class="col-9 mx-auto">
    <div class="dish">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-10 dish-name">{{dish.title}}</div>
            <div class="col-2 d-flex justify-content-center align-items-center">
              <span class="dish-price" :style="dish.offer_cost === null ? ' text-decoration-line: none !important':' text-decoration-line: line-through'">${{dish.cost}}</span>
              <span class="new-dish-price" v-if="dish.offer_cost">${{dish.offer_cost}}</span>
            </div>
            <div class="col-12">
              <div class="line"></div>
            </div>
            <div class="col-12 dish-description">
              {{dish.description}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Dish",
    props: {
      dish: {
        type: Object
      }
    }
  }
</script>

<style scoped lang="scss">

</style>
