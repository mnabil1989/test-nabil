<template>
  <div class="above-footer">
    <div class="row">
      <div class="col-lg-4 col-12">
        <div class="maps">
          <a href="#"><img
            src="../../../assets/img/google-2015.png"
            srcset="../../../assets/img/google-2015@2x.png 2x, ../../../assets/img/google-2015@3x.png 3x"
            alt="google"
            class="google-2015"
          /></a>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <nuxt-link :to="localePath('/home')"><img
          src="../../../assets/img/logo-footer.png"
          class="center-logo" alt="logo-footer"
        /></nuxt-link>
      </div>
      <div class="col-lg-4 col-12 d-flex justify-content-center align-items-center">
        <div class="social-bar">
          <a href="#"> <img
            src="../../../assets/img/fb.png"
            srcset="../../../assets/img/fb@2x.png 2x, ../../../assets/img/fb@3x.png 3x"
            class="social-icon"
            alt="fb"
          /></a>
          <a href="#"><img
            src="../../../assets/img/twitter.png"
            srcset="../../../assets/img/twitter@2x.png 2x, ../../../assets/img/twitter@3x.png 3x"
            class="social-icon"
            alt="twitter"
          /></a>
          <a href="#">
            <img
              src="../../../assets/img/snap-icon-22.png"
              srcset="../../../assets/img/snap-icon-22@2x.png 2x, ../../../assets/img/snap-icon-22@3x.png 3x"
              class="social-icon"
              alt="snap"
            />
          </a>
          <a href="#">
            <img
              src="../../../assets/img/Instagram_icon.png"
              srcset="../../../assets/img/Instagram_icon@2x.png 2x, ../../../assets/img/Instagram_icon@3x.png 3x"
              class="social-icon"
              alt="Instagram_icon"
            />
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {};
</script>

<style scoped lang="scss">
  .above-footer {
    z-index: 10;
    border: solid 1px white;
    border-radius: 15px;
    background-color: white;
    top: 30px;
    width: 70%;
    margin: 0 auto;
    position: relative;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  }

  .google-2015 {
    width: 8.33vw;
    height: 6vw;
    object-fit: contain;
    display: block;
    margin: 0 auto;
    @media (max-width: 768px) {
      width: 100%;
      height: 12vw;
      margin: .5rem 0;
    }
  }

  .social-icon {
    width: 23px;
    width: 2.5vw;
    height: 2.5vw;
    object-fit: contain;
    @media (max-width: 768px) {
      width: 80%;
      height: 100%;
    }
  }

  .social-bar {
    width: 80%;
    display: flex;
    justify-content: space-around;
    @media (max-width: 768px) {
      margin: 1rem 0;
    }
  }

  .center-logo {
    width: 8.07vw;
    height: 6vw;
    object-fit: contain;
    display: block;
    margin: 0 auto;
    @media (max-width: 768px) {
      width: 100%;
      height: 20vw;
    }
  }
</style>
