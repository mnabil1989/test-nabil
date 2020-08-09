<template>
  <div class="footer" :class="{kidFooter:isKidFooter}">
    <div class="container">
      <div class="row">
        <span class="line"></span>
        <div class="col-12 d-flex justify-content-center align-items-center">
          <div class="hold-logo">
            <img src="../assets/images/mykanos-type.png" alt="mykanos" class="img-fluid logo-type">
            <img src="../assets/images/main-logo.png" alt="mykanos" class="img-fluid main-logo">
            <p class="text-center slogan">greek mediterranean cuisine</p>
          </div>
        </div>
        <div class="col-md-4 col-12">
          <div class="contact-info">
            <a class="email" href="mailTo:info@resturant.com"><i class="fas fa-envelope"></i> info@resturant.com</a>
            <a class="phone" href="tel:0122166606"><i class="fas fa-mobile-alt"></i>0122166601</a>
            <a class="location" href="https://www.google.com.eg/maps/place/Mykonos+Restaurant+%D9%85%D8%B7%D8%B9%D9%85+%D9%85%D9%8A%D9%83%D9%88%D9%86%D9%88%D8%B3+%D8%A7%D9%84%D9%8A%D9%88%D9%86%D8%A7%D9%86%D9%8A%E2%80%AD/@21.5966176,39.1565847,15z/data=!4m5!3m4!1s0x0:0x88c1984e53b9c8f8!8m2!3d21.5966176!4d39.1565847?hl=ar"><i class="fas fa-map-marker-alt"></i>{{$t('Mykonos Restaurant')}}</a>
<!--            <p>Myknons RESTAURANT-->
<!--              “Action ullamco laboris nisi ut aliquip-->
<!--              ex ea commodo consequat. Duis aute irure-->
<!--              dolor in reprehenderit in voluptate”.</p>-->
          </div>
        </div>
        <div class="col-md-4 col-12">
          <SocialLinks :is-full-width="true"></SocialLinks>
        </div>
        <div class="col-md-4 col-12">
          <Navigation :isFooterMenu=true></Navigation>
        </div>
        <div class="col-12 text-center">
          <p class="copy-right">{{$t('copyright')}} - Myknons 2020 &copy;</p>

        </div>
      </div>
    </div>
  </div>

</template>

<script>
  import SocialLinks from "./SocialLinks";
  import Navigation from "./Navigation";

  export default {
    name: "MainFooter",
    components: {Navigation, SocialLinks},
    props: {
      isKidFooter: {
        type: Boolean,
        default: false
      }
    },
  }
</script>

<style lang="scss" scoped>
  $main-color: #bb8f32;
  .footer {
    margin-top: 4rem;
  }

  .kidFooter {
    background: linear-gradient(to right, rgba(0, 0, 0, .3), rgba(0, 0, 0, .3)), url("../assets/images/kid-footer.png") no-repeat;
    background-size: cover;
    background-position: 50% 0;
  }

  .line {
    display: block;
    width: 90%;
    height: 2px;
    background-color: rgba(116, 119, 125, 0.42);
    margin: 0 auto;
  }

  .hold-logo {
    img {
      display: block;
      margin: 0 auto;
    }

    .logo-type {
      height: 45px;
      margin: 2rem auto 1rem auto;
    }

    .main-logo {
      height: 95px;
      margin-bottom: 1rem;
    }

    .slogan {
      color: $main-color;
      font-weight: bolder;
      text-transform: uppercase;
    }
  }

  .contact-info {
    color: $main-color;
    margin-top: -2.2rem;
    a{
      display: block;
      color: $main-color;
      margin: 1rem 0;
      transition: all ease-in-out .3s;
      &:hover{
        text-decoration: none;
        color: #000;
      }
    }
    @media (max-width: 768px) {
      text-align: center;
    }
    @media (max-width: 768px) {
      margin-top: 0;
    }
  }

  .copy-right {
    color: $main-color;
  }
  .fa-envelope,.fa-mobile-alt,.fa-map-marker-alt{
    margin: 0 .5rem ;
  }
  html:lang(ar){
    .phone{
      font-family: 'Poppins' !important;
    }
  }
</style>
