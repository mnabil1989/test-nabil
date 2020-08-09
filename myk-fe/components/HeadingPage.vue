<template>
  <div class="col-12">
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h2 class="sub-heading">{{heading}}</h2>
    </div>
    <div class="col-12 d-flex justify-content-center align-items-center">
      <p class="heading-title">{{subTitle}}</p>
    </div>
  </div>
</template>

<script>
  export default {
    name: "HeadingPage",
    props: {
      heading: {
        type: String,
        default: ""
      },
      subTitle: {
        type: String,
        default: ""
      }
    }
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .sub-heading {
    font-size: 6rem;
    color: #fff;
    text-transform: capitalize;
    margin-bottom: 1rem;
    @media (max-width: 992px) {
      font-size: 3rem;
    }
    @media (max-width: 600px) {
      font-size: 1.5rem;
    }
  }

  .heading-title {
    font-weight: lighter;
    color: $main-color;
    font-size: 2.4rem;

    &:first-letter {
      text-transform: capitalize;
    }

    @media (max-width: 992px) {
      font-size: 1.4rem;
    }
    @media (max-width: 600px) {
      font-size: .9rem;
    }
  }
</style>
