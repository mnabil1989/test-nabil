<template>
  <footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6">
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

          <div class="col-lg-3 col-md-6">
            <!-- Footer Widget -->
            <div class="footer-widget footer-menu">
              <h2 class="footer-title">{{$t('andalusia-websites')}}</h2>
              <ul>
                <li>
                  <a href="https://www.andalusiahjh.com/">
                    <i class="fas fa-angle-double-right"></i> {{$t("hai Al Jami'ah")}}
                  </a>
                </li>
                <li>
                  <a href="https://www.andalusiackw.com/">
                    <i class="fas fa-angle-double-right"></i> {{$t('Kids wellness')}}
                  </a>
                </li>
                <li>
                  <a href="https://www.andalusiaclinic.com/">
                    <i class="fas fa-angle-double-right"></i> {{$t('Poly clinics')}}
                  </a>
                </li>
                <li>
                  <a href="https://www.andalusia-dentalcenters.com/">
                    <i class="fas fa-angle-double-right"></i> {{$t('Dental centers')}}
                  </a>
                </li>
              </ul>
            </div>
            <!-- /Footer Widget -->
          </div>

          <div class="col-lg-3 col-md-6">
            <!-- Footer Widget -->
            <div class="footer-widget footer-menu">
              <h2 class="footer-title">{{$t('Services')}}</h2>
              <ul>
<!--                <li>-->
<!--                  <a href="appointments.html">-->
<!--                    <i class="fas fa-angle-double-right"></i> {{$t('Pharmacies')}}-->
<!--                  </a>-->
<!--                </li>-->
                <li>
                  <a href="https://page.andalusiahjh.com/home-care-go">
                    <i class="fas fa-angle-double-right"></i> {{$t('Home Care')}}
                  </a>
                </li>
              </ul>
            </div>
            <!-- /Footer Widget -->
          </div>
          <div class="col-lg-3 col-md-6">
            <!-- Footer Widget -->
            <div class="footer-widget footer-contact">
              <h2 class="footer-title">{{$t('Contact Us')}}</h2>
              <div class="footer-contact-info">
                <div class="footer-address">
                  <span>
                    <i class="fas fa-map-marker-alt"></i>
                  </span>
                  <p>{{$t("location")}}</p>
                </div>
                <a href="tel:012-216-66-66">
                  <i class="fas fa-phone-alt"></i>
                  012-216-66-66
                </a>
                <a class="mb-0" href="hjh.info@andalusiagroup.net">
                  <i class="fas fa-envelope"></i>
                  hjh.info@andalusiagroup.net
                </a>
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
              <div class="copyright-menu">
                <ul class="policy-menu">
                  <li>
                    <nuxt-link :to="localePath('/terms')">{{$t('Terms and Conditions')}}</nuxt-link>
                  </li>
                  <li>
                    <nuxt-link :to="localePath('/policy')">{{$t('Policy')}}</nuxt-link>
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
import axios from "axios";

export default {
  name: "Footr",
  data() {
    return {
      socialLinks: null
    };
  },
  created() {
    axios
      .get(`/api/seo?lang=${this.$i18n.locale}`)
      .then(res => {
        this.socialLinks = res.data.SEO.Social;
        console.log(this.socialLinks);
      })
      .catch(e => console.log(e));
  }
};
</script>

<style scoped lang="scss">
  .policy-menu, .copyright-text p {
    @media (max-width: 768px) {
      text-align: center !important;
    }
  }
</style>
