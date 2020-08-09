<template>
  <footer :dir="$i18n.locale === 'ar' ? 'rtl' : 'ltr'">
    <div @click="scrollToTop()" class="scroll-down space-between d-col">
      <div class="dashed-border center">
        <div class="inner-border center d-col">
          <div class="FAT-LINE"></div>
          <i class="fa fa-arrow-up"></i>
        </div>
      </div>
    </div>

    <UpperSection/>
    <div class="footer-container">
      <LowerSection/>
    </div>
  </footer>
</template>
<script>
  import UpperSection from "./UpperSection/index";
  import LowerSection from "./LowerSection/index";

  export default {
    components: {
      UpperSection,
      LowerSection
    },
    methods: {
      scrollToTop() {
        window.scrollTo({top: 0, behavior: "smooth"})
      }
    }
  };
</script>

<style scoped lang="scss">
  footer {
    position: relative;
  }

  .footer-container {
    background: white;
  }

  .footer {
    height: 350px;
    opacity: 0.78;
    background-color: #1d4590;
    padding: 1%;
    display: grid;
    grid-template-columns: 1fr 3fr 3fr 3fr;
    align-items: center;
    position: relative;
  }

  .google-2015 {
    width: 160px;
    height: 115px;
    object-fit: contain;
  }

  .scroll-down {
    position: absolute;
    cursor: pointer;
    top: 30%;
    z-index: 99;
    right: 5%;
    width: 8vw;
    height: 8.5vw;
    @media (max-width: 768px) {
      width: 12vw;
      height: 12vw;
      top: 25%;
      right: 1%;
    }
  }
  .dashed-border {
    width: 7vw;
    height: 7vw;
    border-radius: 50%;
    border: 3px dashed #ffffff;
    @media (max-width: 768px) {
      width: 80%;
      height: 80%;
    }
  }

  .inner-border {
    width: 5.7vw;
    height: 5.7vw;
    font-size: 200%;
    border-radius: 50%;
    color: #fff;
    border: solid 5px #1d4590;
    @media (max-width: 768px) {
      width: 80%;
      height: 80%;
      .fa-arrow-up{
        font-size: 14px;
      }
    }
  }

  .FAT-LINE {
    height: 6%;
    width: 50%;
    margin-bottom: 3%;
    background: #ffffff;
  }

  @media only screen and (max-width: 600px) {
    .footer {
      grid-template-columns: 1fr;
      font-size: 16px;
      height: 100%;
    }
  }
</style>
