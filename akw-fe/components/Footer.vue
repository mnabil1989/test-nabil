<template>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="upper-footer">
            <div class="row">
              <div class="col-md-4 col-6 social-flex">
                <SocialLinks></SocialLinks>
              </div>
              <div class="col-md-4 col-6">
                <div class="logo">
                  <img src="../assets/images/akw-logo.png" class="img-fluid logo-footer" alt="logo">
                  <img src="../assets/images/akw-type-logo.png" class="img-fluid logo-footer" alt="logo">
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="google-item">
                  <div>
                    <img src="../assets/images/google-maps.png">
                    <img src="../assets/images/google.png">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="main-footer">
            <div class="row">
              <div class="col-md-4 col-12">
                <div class="social-mobile-version">
                  <ul class="social">
                    <li><a href="#"><img src="../assets/images/book.png" class="img-fluid"></a></li>
                    <li><a href="#"><img src="../assets/images/whatsapp.png" class="img-fluid"></a></li>
                    <li><a href="#"><img src="../assets/images/messenger.png" class="img-fluid"></a></li>
                  </ul>
                  <div class="mobile-version">
                    <h5>{{$t('mobile-version')}}</h5>
                    <div class="mobile">
                      <a href="#"><img src="../assets/images/play.png"></a>
                      <a href="#"><img src="../assets/images/app.png"></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="about">
                  <h5>{{$t('andalusia-group')}}</h5>
                  <p>{{$t('group-p')}}</p>
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="contact">
                  <h5>{{$t('contact-us')}}</h5>
                  <ul>
                    <li>sari@andalusiagroup.net</li>
                    <li>3258 شارع صارى, تقاطع شارع الخطيب</li>
                    <li>التبريزى, حى البوادى, جدة</li>
                    <li>0122166677</li>
                    <li>0122166677</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <p class="copyright"> {{$t('copyright')}}  2020&copy; </p>
  </div>
</template>

<script>
  import SocialLinks from "./SocialLinks";

  export default {
    name: "Footer",
    components: {SocialLinks}
  }
</script>

<style scoped lang="scss">
  @import "assets/css/variable";
  @import "assets/css/mixin";
  @import "assets/css/shared";

  .footer {
    background-color: $secondColor;

    .upper-footer {
      position: relative;
      background-color: #fff;
      padding: 1rem 0;
      border-radius: 15px;
      top: -50%;

      .social-flex {
        @include flex_center;
      }

      .logo {
        text-align: center;

        .logo-footer {
          height: 50px;
          display: block;
          margin: 0 auto;
        }
      }

      .google-item {
        display: flex;
        justify-content: center;
        align-items: center;

        img {
          display: block;
          height: 50px;
          margin: 0 auto;
        }
      }
      @media (max-width: 768px) {
        top: -25%;
      }
    }

    .main-footer {
      .social-mobile-version {
        .social {
          @include flex_center;
          li {
            width: 30px;
            height: 30px;
            margin: 0 .5rem;
          }
        }

        .mobile-version {
          h5 {
            text-align: center;
            color: #fff;
            position: relative;
            margin: 3rem 0;
            text-transform: capitalize;
            @include borderAfter;
            @media (max-width: 768px) {
              margin: 1rem 0;
            }
          }
          .mobile{
            text-align: center;
            a{
              display: inline-block;
              img{
                height: 25px;
                display: inherit;
                margin: 0 .5rem;
              }
            }
            @media (max-width: 768px) {
              margin-bottom: 1rem;
            }
          }
        }
      }

      .about, .contact {
        text-align: right;
        color: #fff;
        margin-right: auto;
        width: 75%;
        h5 {
          text-transform: capitalize;
          @include borderRightAfter;
        }
        p {
          font-size: 1.1rem;
          width: 95%;
          margin-left: auto;
          line-height: 2;
        }
        @media (max-width: 768px) {
          width: 100%;
          text-align: center;
        }
      }

      .contact {
        ul {
          li {
            margin: .6rem 0;
          }
        }
      }
    }
    .copyright{
      color: #fff;
      background-color: #51CCCC;
      text-align: center;
      padding: .5rem 0;
      margin: 0;
      text-transform: capitalize;
      @media (max-width: 768px) {
        padding: .5rem;
      }
    }
  }
</style>
