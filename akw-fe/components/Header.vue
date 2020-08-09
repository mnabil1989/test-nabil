<template>
  <div>
    <div class="header">
      <div class="container-fluid">
        <div class="row header-flex">
          <div class="col-md-4">
            <div class="search-profile-logo">
              <div class="logo">
                <nuxt-link to="/home">
                  <img src="@/assets/images/akw-type-logo.png" alt="akw" class="img-fluid">
                  <img src="@/assets/images/akw-logo.png" alt="akw" class="img-fluid">
                </nuxt-link>
              </div>
              <template>
                <nuxt-link to="/login" v-if="!$auth.loggedIn" class="sign-in-button">{{$t('sign in')}}</nuxt-link>
                <div v-else>
                  <label class="img-profile">
                    <img src="../assets/images/img-profile.png" alt="img-profile"
                         class="img-fluid img-nav">
                    <input type="text" class="for-dropmenu" @focus="isOpen = true"
                           @blur="isOpen = false">
                    <transition name="fade">
                      <div class="dropdownMenu" v-if="isOpen">
                        <i class="fas fa-arrow-up"></i>
                        <div class="hold-menu">
                          <img src="../assets/images/img-profile.png" alt="img-profile-dropMenu"
                               class="img-fluid img-profile-dropMenu">
                          <h5 class="name-profile">{{$auth.user.name}}</h5>
                          <ul class="setting">
                            <li>
                              <nuxt-link :to="localePath('/setting')">
                                <i class="fas fa-cogs"></i>
                                <span>{{$t('setting')}}</span>
                              </nuxt-link>
                            </li>
                            <li>
                              <a @click="$auth.logout()">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>{{$t('sign-out')}}</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </transition>
                  </label>
                </div>
              </template>
            </div>
          </div>
          <div class="col-md-5">
            <div class="search">
              <form>
                <input type="search" :placeholder="$t('search')">
                <i class="fas fa-search search-icon"></i>
              </form>
            </div>
          </div>
          <div class="col-md-3 lang">
            <span class="phone"><i class="fas fa-phone"></i> 00201066269735</span>
            <button class="lang" @click="changeLang('ar')" v-if="this.$i18n.locale === 'en'"><i class="fas fa-globe"></i> العربيه </button>
            <button class="lang" @click="changeLang('en')" v-else><i class="fas fa-globe"></i> en</button>
          </div>
        </div>
        <div class="row">
          <div class="col-12 px-0 menu">
            <ul class="main-taps">
              <li>
                <label class="img-profile">
                  <span class="service-menu family">{{$t('Our clinics')}}</span>
                  <input type="text" class="for-dropmenu" @focus="isOpenClinic = true" @blur="isOpenClinic = false">
                  <transition name="fade">
                    <div class="services-dropdownMenu clinic-menu" v-if="isOpenClinic">
                      <i class="fas fa-arrow-up"></i>
                      <div class="hold-menu">
                        <ul class="setting">
                          <li>
                            <nuxt-link :to="localePath('/dental-clinic')"><span>{{$t('dental-clinic')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('/public-child-clinic')"><span>{{$t('public-child-clinic')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('/eye-clinic')"><span>{{$t('eye-clinic')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('/child-nutrition-unit')"><span>{{$t('child-nutrition-unit')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('/clinic-to-treat')"><span>{{$t('clinic-to-treat')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('/autism-alone')"><span>{{$t('autism-alone')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('/counseling-clinic')"><span>{{$t('counseling-clinic')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('/medicine-clinic')"><span>{{$t('medicine-clinic')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('/ear-nose-clinic')"><span>{{$t('ear-nose-clinic')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('hearing-clinic')"><span>{{$t('hearing-clinic')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('physiotherapy-clinic')"><span>{{$t('physiotherapy-clinic')}}</span></nuxt-link>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </transition>
                </label>
              </li>
              <li>
                <label class="img-profile">
                  <span class="service-menu">{{$t('Our services')}}</span>
                  <input type="text" class="for-dropmenu" @focus="isOpenService = true" @blur="isOpenService = false">
                  <transition name="fade">
                    <div class="services-dropdownMenu" v-if="isOpenService">
                      <i class="fas fa-arrow-up"></i>
                      <div class="hold-menu">
                        <ul class="setting">
                          <li>
                            <nuxt-link :to="localePath('/work-space')"><span>{{$t('workspace')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('/programs')"><span>{{$t('programs')}}</span></nuxt-link>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </transition>
                </label>
              </li>
              <li>
                <nuxt-link to="sd">{{$t('the-medical-team')}}</nuxt-link>
              </li>
              <li>
                <label class="img-profile">
                  <span class="service-menu family">{{$t('Child and family')}}</span>
                  <input type="text" class="for-dropmenu" @focus="isOpenFamily = true" @blur="isOpenFamily = false">
                  <transition name="fade">
                    <div class="services-dropdownMenu" v-if="isOpenFamily">
                      <i class="fas fa-arrow-up"></i>
                      <div class="hold-menu">
                        <ul class="setting">
                          <li>
                            <nuxt-link :to="localePath('/education')"><span>{{$t('Child / Family Education Materials')}}</span></nuxt-link>
                          </li>
                          <li>
                            <nuxt-link :to="localePath('/child-gate')"><span>{{$t('child gate')}}</span></nuxt-link>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </transition>
                </label>
              </li>
              <li>
                <a href="https://www.andalusia.care/">{{$t('Your doctor online')}}</a>
              </li>
              <li>
                <nuxt-link :to="localePath('/offer-share')">{{$t('Social sharing')}}</nuxt-link>
              </li>
              <li>
                <nuxt-link :to="localePath('/about')">{{$t('about us')}}</nuxt-link>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header-mobile">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-3 menu-tap toggle-menu">
            <div class="toggle-span" @click="showSlide = !showSlide">
              <span
                :style="showSlide? 'transform : translateY(125%) translateX(50%) rotate(-45deg) ; margin : 0':''"></span>
              <span
                :style="showSlide? 'opacity : 0 ; margin : 0' : 'transform : translateX(25%) ; opacity : 1 ; margin: .4rem 0'"></span>
              <span
                :style="showSlide? 'transform : translateY(-50%) translateX(50%) rotate(45deg) ;  margin : 0 ' : ''"></span>
            </div>
          </div>
          <div class="col-md-6 col-9 logo-menu-mobile">
            <div class="logo">
              <nuxt-link to="/home">
                <img src="@/assets/images/akw-type-logo.png" alt="akw" class="img-fluid">
                <img src="@/assets/images/akw-logo.png" alt="akw" class="img-fluid">
              </nuxt-link>
            </div>
            <transition name="slide-fade">
              <div class="menu-mobile" v-if="showSlide">
                <ul>
                  <li v-if="!$auth.loggedIn">
                    <nuxt-link :to="localePath('/login')">{{$t('sign in')}}</nuxt-link>
                  </li>
                  <li>
                    <span class="key-sub-menu" @click="clinicLinks = !clinicLinks"><i class="fas" :class="clinicLinks? 'fa-minus' : 'fa-plus' "></i> {{$t('Our clinics')}} </span>
                    <transition name="slide-fade">
                      <ul class="sub-menu" v-if="clinicLinks">
                        <li>
                          <nuxt-link :to="localePath('/dental-clinic')">{{$t('dental-clinic')}}</nuxt-link>
                        </li>
                        <li>
                          <nuxt-link :to="localePath('/public-child-clinic')">{{$t('public-child-clinic')}}</nuxt-link>
                        </li>
                        <li>
                          <nuxt-link :to="localePath('/eye-clinic')">{{$t('eye-clinic')}}</nuxt-link>
                        </li>
                        <li>
                          <nuxt-link :to="localePath('/child-nutrition-unit')">{{$t('child-nutrition-unit')}}</nuxt-link>
                        </li>
                        <li>
                          <nuxt-link :to="localePath('/clinic-to-treat')">{{$t('clinic-to-treat')}}</nuxt-link>
                        </li>
                        <li>
                          <nuxt-link :to="localePath('/autism-alone')">{{$t('autism-alone')}}</nuxt-link>
                        </li>
                        <li>
                          <nuxt-link :to="localePath('/counseling-clinic')">{{$t('counseling-clinic')}}</nuxt-link>
                        </li>
                        <li>
                          <nuxt-link :to="localePath('/medicine-clinic')">{{$t('medicine-clinic')}}</nuxt-link>
                        </li>
                        <li>
                          <nuxt-link :to="localePath('/ear-nose-clinic')">{{$t('ear-nose-clinic')}}</nuxt-link>
                        </li>
                        <li>
                          <nuxt-link :to="localePath('hearing-clinic')">{{$t('hearing-clinic')}}</nuxt-link>
                        </li>
                        <li>
                          <nuxt-link :to="localePath('physiotherapy-clinic')">{{$t('physiotherapy-clinic')}}</nuxt-link>
                        </li>
                      </ul>
                    </transition>
                  </li>
                  <li>
                    <span class="key-sub-menu" @click="servicesLinks = !servicesLinks"><i class="fas" :class="servicesLinks? 'fa-minus' : 'fa-plus' "></i>{{$t('Our services')}}</span>
                    <transition name="slide-fade">
                      <ul class="sub-menu" v-if="servicesLinks">
                        <li @click="showSlide = false">
                          <nuxt-link :to="localePath('/work-space')">{{$t('workspace')}}</nuxt-link>
                        </li>
                        <li @click="showSlide = false">
                          <nuxt-link :to="localePath('/programs')">{{$t('programs')}}</nuxt-link>
                        </li>
                      </ul>
                    </transition>
                  </li>
                  <li>
                    <nuxt-link to="sd">{{$t('the-medical-team')}}</nuxt-link>
                  </li>
                  <li>
                    <span class="key-sub-menu" @click="childFamily = !childFamily"><i class="fas" :class="childFamily? 'fa-minus' : 'fa-plus' "></i>{{$t('Child and family')}}</span>
                    <transition name="slide-fade">
                      <ul class="sub-menu" v-if="childFamily">
                        <li @click="showSlide = false">
                          <nuxt-link :to="localePath('/education')">{{$t('Child / Family Education Materials')}}</nuxt-link>
                        </li>
                        <li @click="showSlide = false">
                          <nuxt-link :to="localePath('/child-gate')">{{$t('child gate')}}</nuxt-link>
                        </li>
                      </ul>
                    </transition>
                  </li>
                  <li>
                    <a href="https://www.andalusia.care/">{{$t('Your doctor online')}}</a>
                  </li>
                  <li @click="showSlide = false">
                    <nuxt-link :to="localePath('/offer-share')">{{$t('Social sharing')}}</nuxt-link>
                  </li>
                  <li @click="showSlide = false">
                    <nuxt-link :to="localePath('/about')">{{$t('about us')}}</nuxt-link>
                  </li>
                  <li>
                    <button class="lang" @click="changeLang('ar')" v-if="this.$i18n.locale === 'en'"><i class="fas fa-globe"></i> العربيه</button>
                    <button class="lang" @click="changeLang('en')" v-else><i class="fas fa-globe"></i> en</button>
                  </li>
                </ul>
              </div>
            </transition>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Header",
    head(context) {
      return {
        htmlAttrs: {
          lang: this.$i18n.locale,
          dir: this.$i18n.locale == 'ar' ? 'rtl' : 'ltr'
        },
      }
    },
    data() {
      return {
        isOpen: false,
        isOpenClinic: false,
        isOpenService: false,
        isOpenFamily: false,
        showSlide: false,
        clinicLinks: false,
        servicesLinks: false,
        childFamily: false,
      }
    },
    methods: {
      changeLang(lang) {
        this.$i18n.setLocale(lang);
        this.showSlide = false
      }
    }
  }
</script>

<style scoped lang="scss">
  @import "assets/css/main";

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
  {
    opacity: 0;
  }

  .service-menu {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: $mainColor;
  }

  .services-dropdownMenu {
    border-radius: 5px;
    position: absolute;
    top: 150%;
    z-index: 2;
    background-color: #fff;
    padding: .3rem;
    right: -4rem !important;
    width: 175px !important;
    .hold-menu {
      border: 1px solid $mainColor;
      border-radius: 5px;
      text-align: center;
      position: relative;
      .setting{
        li{
          margin: .5rem 0;
          text-transform: capitalize;
          &:after{
            content: "";
            background-color: $mainColor;
            width: 50%;
            margin: .5rem auto;
            display: block;
            height: 2px;
            border-radius: 15px;
          }
          &:last-of-type{
            &:after{
              display: none;
            }
          }
        }
        span{
          font-size: .8rem;
          margin: .5rem .2rem;
          text-transform: capitalize;
        }
      }
    }

    .fa-arrow-up {
      position: absolute;
      top: -6% !important;
      right: 50%;
      transform: translate(50%, -50%);
      color: $mainColor;
    }
  }

  .dropdownMenu {
    .fa-arrow-up {
      position: absolute;
      right: 7% !important;
      top: -7%;
      color: $mainColor;
    }
  }

  .sign-in-button {
    color: $mainColor;
    display: inline-block;
    margin: 0 1rem;
  }

  .family {
    width: 100px
  }

  .fa-globe {
    margin-left: .3rem;
  }
  .clinic-menu{
    width: 230px !important;
    top: 150%;
    right: -5.5rem !important;
    .fa-arrow-up{
      top: -2% !important;
      right: 50%;
    }
  }
html:lang(en){
  .fa-globe {
    margin-right: .3rem;
    margin-left: auto;
  }
  .service-menu{
    width: 120px;
    text-align: center;
  }
}
</style>
