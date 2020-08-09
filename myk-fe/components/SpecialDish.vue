<template>
  <div class="col-12">
    <div class="hold-special-dish">
      <div class="bill">
        <i class="far fa-bell"></i>
      </div>
      <div class="special-dish">
        <div class="row">
          <h4 class="special-dish-heading col-12">{{$t("chef's notice")}}</h4>
          <p class="col-12">{{siteType === 'bistro'? home.restaurants_site_settings.site_setting_bistro.advice_chef : home.restaurants_site_settings.site_setting_Kids.advice_chef }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import {mapGetters} from "vuex";
  export default {
    name: "SpecialDish",
    props:{
      home:{
        type: Object,
        default: {}
      }
    },
    computed: {
      ...mapGetters(['siteType'])
    },
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .hold-special-dish {
    position: relative;
    margin: 7rem 0;

    .bill {
      position: absolute;
      left: 50%;
      top: 0;
      height: 100px;
      width: 100px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #fff;
      color: $main-color;
      transform: translate(-50%, -50%) rotate(20deg);
      font-size: 2.7rem;
      @media (max-width: 500px) {
        height: 70px;
        width: 70px;
        font-size: 1.7rem;
      }
    }
  }

  .special-dish {
    background: rgba(187, 143, 50, 0.74);
    width: 100%;
    padding: 0 3rem;
    border-radius: 15px;
    color: #fff;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: flex-start;

    .special-dish-heading {
      text-transform: uppercase;
      margin: 1.5rem 0;
      @media (max-width: 500px) {
        margin: 1rem 0;
        margin-top: 3rem;
        font-size: 21px;
      }
    }
    p{
      @media (max-width: 500px) {
        font-size: 17px;
      }
    }
  }
</style>
