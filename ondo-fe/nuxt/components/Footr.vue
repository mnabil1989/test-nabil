<template>
  <footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-12">
            <!-- Footer Widget -->
            <div class="footer-widget footer-about">
              <div class="footer-logo">
                <img src="../assets/img/footer-logo.png" alt="logo" />
              </div>
              <div class="footer-about-content">
                <p>{{$t('clinic-Description')}}</p>
              </div>
            </div>
            <!-- /Footer Widget -->
          </div>

          <div class="col-lg-3 col-md-6 pt-3">
            <!-- Footer Widget -->
            <div class="footer-widget footer-menu websites">
              <h2 class="footer-title">{{$t('andalusia-websites')}}</h2>
              <ul>
                <li>
                  <a href="https://www.andalusiahjh.com/">
                    <i class="fas fa-angle-double-right"></i>
                    {{$t("hai Al Jami'ah")}}
                  </a>
                </li>
                <li>
                  <a href="https://www.andalusiackw.com/">
                    <i class="fas fa-angle-double-right"></i>
                    {{$t('Kids wellness')}}
                  </a>
                </li>
                <li>
                  <a href="https://www.andalusiaclinic.com/">
                    <i class="fas fa-angle-double-right"></i>
                    {{$t('Poly clinics')}}
                  </a>
                </li>
                <li>
                  <a href="https://www.andalusia-dentalcenters.com/">
                    <i class="fas fa-angle-double-right"></i>
                    {{$t('Dental centers')}}
                  </a>
                </li>
                <li :class="$route.params.bu =='adc' || $route.params.bu =='akw' ?'d-none':''">
                  <a
                    :href="$route.params.bu === 'hjh'? 'https://page.andalusiahjh.com/home-care-go':'https://page.andalusiaclinics.com/ga-homecare'"
                  >
                    <i class="fas fa-angle-double-right"></i>
                    {{$t('Home Care')}}
                  </a>
                </li>
              </ul>
            </div>
            <!-- /Footer Widget -->
          </div>

          <div class="col-lg-2 col-md-6 pt-3">
            <!-- Footer Widget -->
            <div class="footer-widget footer-menu">
              <h2 class="footer-title">{{$t('Policy')}}</h2>
              <ul>
                <li>
                  <nuxt-link
                    :to="localePath(`/${$route.params.bu}/terms`)"
                  >{{$t('Terms and Conditions')}}</nuxt-link>
                </li>
                <li>
                  <nuxt-link :to="localePath(`/${$route.params.bu}/policy`)">{{$t('Policy')}}</nuxt-link>
                </li>
                <li>
                  <nuxt-link
                    :to="localePath(`/${$route.params.bu}/refund-policy`)"
                  >{{$t('Refund Policy')}}</nuxt-link>
                </li>
              </ul>
            </div>
            <!-- /Footer Widget -->
          </div>
          <div class="col-lg-3 col-md-6 pt-3">
            <!-- Footer Widget -->
            <div class="footer-widget footer-contact">
              <h2 class="footer-title">{{$t('Contact Us')}}</h2>
              <div class="footer-contact-info">
                <div class="footer-address">
                  <span>
                    <i class="fas fa-map-marker-alt"></i>
                  </span>
                  <a href="https://www.google.com/maps?cid=6547307480212582168&authuser=1" v-if="$route.params.bu=='hjh'">{{$t("location")}}</a>
                  <a href="https://goo.gl/maps/Uj8nT4GveQk7ab7X8" v-if="$route.params.bu=='akw'">{{$t("akw-location")}}</a>
                  <div  v-if="$route.params.bu=='apc'">
                    <li class="map-location">
                      <a href="https://www.google.com/maps/place/%D8%B9%D9%8A%D8%A7%D8%AF%D8%A9+%D8%A7%D9%84%D8%A7%D9%86%D8%AF%D9%84%D8%B3%D9%8A%D8%A9%E2%80%AD/@21.4287494,39.2947741,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x5aa9d840d9b7b1d9!8m2!3d21.4287494!4d39.2969628"
                         v-if="$route.params.bu=='apc'">{{$t("s-location")}}</a></li>
                      <li><a href="https://goo.gl/maps/4AMpCHNbhZQiHsub7">{{$t("s-location-two")}}</a></li>
                    </ul>
                  </div>
                  <div  v-if="$route.params.bu=='adc'">
                    <ul class="map-location">
                      <li><a href="https://goo.gl/maps/DkfSEqdD7QbJ635A9" v-if="$route.params.bu=='adc'">{{$t("adc-location")}}</a></li>
                      <li><a href="https://goo.gl/maps/XFuaM62ZUpqJuQDMA" v-if="$route.params.bu=='adc'">{{$t("adc-location-two")}}</a></li>
                    </ul>
                  </div>
                </div>
                <a href="tel:012-216-66-66">
                  <i class="fas fa-phone-alt"></i>
                  012-216-66-66
                </a>
                <a
                  class="mb-0"
                  :href="`mailTo:${mail}`"
                >
                  <i class="fas fa-envelope"></i>
                  {{ mail}}
                </a>

                <img v-if="$route.params.bu=='hjh'" src="../assets/img/hjh.png" class="logo-footer" />

                <img
                  v-else-if="$route.params.bu=='akw'"
                  src="../assets/img/akw.logo-white.png"
                  class="logo-footer"
                />
                <img
                  v-else-if="$route.params.bu=='adc'"
                  src="../assets/img/adc-logo.png"
                  class="logo-footer"
                />
                <img v-else src="../assets/img/xclinics-logo-ar.png" class="logo-footer" />
              </div>
            </div>
            <!-- /Footer Widget -->
          </div>
        </div>
      </div>
    </div>
    <!-- /Footer Top -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <div class="container-fluid">
        <!-- Copyright -->
        <div class="copyright">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="copyright-text">
                <p class="mb-0">&copy; 2020 andalusia.care. {{$t('All rights reserved.')}}</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="copyright-menu d-none">
                <ul class="policy-menu">
                  <li>
                    <nuxt-link
                      :to="localePath(`/${$route.params.bu}/terms`)"
                    >{{$t('Terms and Conditions')}}</nuxt-link>
                  </li>
                  <li>
                    <nuxt-link :to="localePath(`/${$route.params.bu}/policy`)">{{$t('Policy')}}</nuxt-link>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- /Copyright -->
      </div>
    </div>
    <!-- /Footer Bottom -->
  </footer>
</template>

<script>
export default {
  name: "Footr",
  data() {
    return {
      socialLinks: null,
      mail:''
    };
  },
  created() {
    this.$axios
      .get(`/${this.$route.params.bu}-api/seo?lang=${this.$i18n.locale}`)
      .then(res => {
        this.socialLinks = res.data.SEO.Social;
        // console.log(this.socialLinks);
      })
      .catch(e => console.log(e));
    if(this.$route.params.bu === 'hjh'){
      this.mail = 'hjh.info@andalusiagroup.net';
    } else if(this.$route.params.bu === 'apc'){
      this.mail = 'Clinicssanabel@Andalusiagroup.net';
    } else if(this.$route.params.bu === 'adc'){
      this.mail = 'Andalusia.Dental@Andalusiagroup.net';
    } else if (this.$route.params.bu === 'akw'){
      this.mail = 'sari@andalusiagroup.net';
    }
  }
};
</script>

<style scoped lang="scss">
.policy-menu,
.copyright-text p {
  @media (max-width: 768px) {
    text-align: center !important;
  }
}
.logo-footer {
  height: 97px;
  object-fit: contain;
  display: block;
  margin: 1rem auto;
}
.websites {
  padding-left: 2rem;
  @media (max-width: 992px) {
    padding-left: 0;
  }
}
.footer-address{
  a{
    color: #fff;
  }
}
.map-location{
  margin: 0;
  padding: 0;
  list-style: disc inside;
  li{
    margin-bottom: .5rem;
    font-size: 14px;
  }
}
html:lang(ar) {
  .websites {
    padding-right: 2rem;
    @media (max-width: 992px) {
      padding-right: 0;
    }
  }
}
</style>
