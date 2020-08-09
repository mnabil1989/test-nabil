<template>
  <div class="footer kidFooter">
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
        <div class="col-md-3 col-12 d-flex justify-content-start align-items-center">
          <div class="kids-social">
            <SocialLinks :is-full-width="true"></SocialLinks>
          </div>
        </div>
        <div class="col-md-9"></div>
        <div class="col-md-4 col-12">
          <div class="contact-info">
            <a class="email" href="mailTo:info@resturant.com"><i class="fas fa-envelope"></i> info@resturant.com</a>
            <a class="phone" href="tel:0122166606"><i class="fas fa-mobile-alt"></i>0122166606</a>
            <a class="location" href="https://www.google.com.eg/maps/place/Mykonos+Kids+Restaurant+%D9%85%D8%B7%D8%B9%D9%85+%D9%85%D9%8A%D9%83%D9%88%D9%86%D9%88%D8%B3+%D9%84%D9%84%D8%A7%D8%B7%D9%81%D8%A7%D9%84+%2F+%D9%85%D8%B7%D8%B9%D9%85+%D9%8A%D9%88%D9%86%D8%A7%D9%86%D9%89%E2%80%AD/@21.5833836,39.1740934,17z/data=!3m1!4b1!4m5!3m4!1s0x15c3d1bcd8e21d47:0xaeeb9868d27e8fb9!8m2!3d21.5833786!4d39.1719047?hl=ar"><i class="fas fa-map-marker-alt"></i>{{$t('Mykonos kids Restaurant')}}</a>
            <!--            <p>Myknons RESTAURANT-->
          </div>
        </div>
        <div class="col-md-4 col-12 d-flex justify-content-center align-items-center">
          <div class="contact-info d-none">
            <p class="email">info@resturant.com</p>
            <p class="phone"><a href="tel:+12 476 357 384" style="direction: ltr">{{$t('phoneNumber')}}</a></p>
          </div>
        </div>
        <div class="col-md-4 col-12">
          <Navigation :isFooterMenu=true :isKidFooterMenu="true"></Navigation>
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
    name: "KidFooter",
    components: {Navigation, SocialLinks},
  }
</script>

<style lang="scss" scoped>
  $main-color: #bb8f32;
  .footer {
    margin-top: 4rem;
  }

  .kidFooter {
    background: linear-gradient(to right, rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url("../assets/images/kid-footer.png") no-repeat;
    background-size: cover;
    background-position: 50% 0;
    margin-top: 0;
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
      color: #fff;
      font-weight: bolder;
      text-transform: uppercase;
    }
  }

  .kids-social {
    //margin-top: -4rem;
    width: 100%;
  }

  .contact-info {
    color: #fff;
    a{
      display: block;
      color: #fff;
      margin: 1rem 0;
      transition: all ease-in-out .3s;
      &:hover{
        text-decoration: none;
        color: $main-color;
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
    color: #fff;
  }
  .phone{
    direction: ltr;
    &:hover{
      text-decoration: none;
      color: #fff;
    }
  }
  .fa-envelope,.fa-mobile-alt,.fa-map-marker-alt{
    margin: 0 .5rem ;
  }
  html:lang(ar){
    .contact-info a{
      font-family: 'Poppins';
      direction: rtl;
    }
  }
</style>
