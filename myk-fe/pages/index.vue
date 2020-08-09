<template>
  <div class="main-page">
    <div class="container index">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="text-center col-12">
              <img src="../assets/images/mykanos-type.png" alt="mykanos-type" class="d-block logo-type img-fluid">
              <img src="../assets/images/main-logo.png" alt="main-logo" class="d-block mx-auto main-logo img-fluid">
              <div class="hold-links col-12">
                <div class="row">
                  <div class="col-12">
                    <img src="../assets/images/quote.png" alt="quote" class="d-block mx-auto quote">
                  </div>
                  <div class="col">
                    <button class="kids" @click="setSiteTypeKids"><p>kids</p></button>
                  </div>
                  <div class="col">
                    <button class="bistro kids" @click="setSiteTypeBistro"><p>bistro</p></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  export default {
    components: {},
    methods:{
      setSiteTypeKids(){
        this.$store.dispatch('SiteType','kids');
        this.$router.push('/main');
      },
      setSiteTypeBistro(){
        this.$store.dispatch('SiteType','bistro');
        this.$router.push('/main');
      }
    }
  }
</script>

<style lang="scss" scoped>
  $main-color: #bb8f32;
  $opacity-color: rgba(0, 97, 159, 0.25);
  $main-font: 'Poppins';
  .main-page {
    /*background-color: */
    background: linear-gradient(to right, $opacity-color, $opacity-color), url("../assets/images/mykanos-food.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50% 20%;
    min-height: 100vh;

    .index {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .main-logo {
      height: 221.9px;
      margin: 2rem 0;
      @media (max-width: 450px) {
        height: 200.9px;
      }
      @media (max-width: 350px) {
        height: 180.9px;
      }
    }

    .logo-type {
      height: 68px;
      margin: 0 auto 0 auto;
      @media (max-width: 450px) {
        height: 48px;
      }
      @media (max-width: 350px) {
        height: 38px;
      }
    }
  }

  .hold-links {
    position: relative;

    .quote {
      margin-bottom: 3rem;
      @media (max-width: 450px) {
        height: 15px;
      }
      @media (max-width: 350px) {
        height: 12px;
      }
    }
  }

  .kids {
    background-color: transparent;
    width: 60px;
    height: 60px;
    border: solid 3px #ffffff;
    display: inline-flex;
    margin: 0 auto;
    transform: rotate(45deg);
    position: absolute;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color: #bb8f32;
    transition: all ease-in-out .3s;
    &:hover {
      text-decoration: none;
      color: #fff;
      transform: rotate(0);

      p {

        transform: rotate(0);
      }
    }

    p {
      transition: all ease-in-out .3s;
      transform: rotate(-45deg);
      width: 150%;
      height: 150%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      font-size: 1rem;
      text-transform: capitalize;
      font-weight: bold;
      font-family: $main-font;
    }

    &:first-of-type {
      left: 1rem;

    }

    &:nth-of-type(2) {
      transform: translateX(-50%) rotate(45deg);
      left: 50%;

      p {
        transform: rotate(-45deg);
      }
    }

    &:last-of-type {
      right: 0;
    }
  }
</style>
