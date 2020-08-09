<template>
  <div v-if="siteType === 'bistro'" class="main-page">
    <client-only>
      <siema class="siema" ref="siema" auto-play
             :current.sync="currPage"
             :ready="true"
             @init="initFunc"
             @change="Onchange"
             :options="options">
        <div class="content-img">
          <div class="logo-slogan d-none">
            <div>
              <img src="../../../assets/images/mykanos-type.png" alt="mykanos" class="img-fluid slider-img">
              <img src="../../../assets/images/main-logo.png" alt="mykanos" class="img-fluid slider-img-logo">
              <img src="../../../assets/images/quote.png" alt="mykanos" class="img-fluid quote-img">
            </div>
          </div>
          <img src="../../../assets/images/mykanos-dish.png" alt="mykanos-dish" class="img-fluid cover">
        </div>
        <div v-for="imgSlider in home.sliders.sliders_bistro" class="content-img">
          <img :src="imgSlider.photo" alt="mykanos-dish" class="img-fluid">
        </div>
      </siema>
      <div class="icons">
        <button @click="prevSlider"><img src="../../../assets/images/left.png" alt="left"></button>
        <button @click="nextSlider"><img src="../../../assets/images/right.png" alt="right"></button>
      </div>
      <div class="dots">
        <ul>
          <li v-for="(dots,index) in 3" :id="'element'+index" :key="dots" @click="goToSlide(index)"></li>
        </ul>
      </div>
    </client-only>
    <div class="welcome d-none">
      <div class="container">
        <div class="welcome-lab-top">
          <div class="row">
            <div class="col-md-4 col-12">
              <img src="../../../assets/images/fruit.png" class="img-fluid">
            </div>
            <div class="col-md-4 col-12 text-center">
              <h3 class="heading-welcome">{{$t('welcome')}}</h3>
              <div class="hold-img">
                <img src="../../../assets/images/main-logo.png" class="img-fluid">
              </div>
            </div>
            <div class="col-md-4 col-12">
              <img src="../../../assets/images/fruit.png" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="welcome-mobile">
          <div class="row">
            <div class="col-12 text-center">
              <h3 class="heading-welcome">{{$t('welcome')}}</h3>
              <div class="hold-img">
                <img src="../../../assets/images/main-logo.png" class="img-fluid">
              </div>
            </div>
            <div class="col-12">
              <img src="../../../assets/images/fruit.png" class="img-fluid">
            </div>
            <div class="col-12">
              <img src="../../../assets/images/fruit.png" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="menu">
      <div class="container">
        <h3 class="col-12 text-center heading-menu">{{$t('This week’s specials')}}<br><span>{{$t('FROM OUR MENU')}}</span></h3>
      </div>
      <div class="container-fluid">
        <div class="row">
          <!-- dish-->
          <div class="col-md-6 px-5 dish d-none" v-for="dish in home.offered_dishes">
            <div class="row">
              <div class="col-lg-4 col-12">
                <div class="hold-img-menu">
                  <img :src="'/images/'+dish.image" class="img-fluid img-dish">
                </div>
              </div>
              <div class="col-lg-8 col-12">
                <div class="description-menu">
                  <div class="fix-flex">
                    <div class="heading">
                      <p class="menu-name">{{dish.title}}</p>
                      <div class="hold-lines">
                        <span class="line-v"></span>
                        <span class="line-v"></span>
                      </div>
                      <span class="price"
                            :style="dish.offer_cost === null ? ' text-decoration-line: none !important':' text-decoration-line: line-through'">${{dish.cost}}</span>
                      <span class="new-price">${{dish.offer_cost}}</span>
                    </div>
                    <div class="title">{{dish.description}}</div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6 px-5 dish" v-for="(dish,index) in home.dishes_bistro">
            <div v-if="index < 8" class="row">
              <div class="col-lg-4 col-12">
                <div class="hold-img-menu">
                  <img :src="'/images/'+dish.image" class="img-fluid img-dish">
                </div>
              </div>
              <div class="col-lg-8 col-12">
                <div class="description-menu">
                  <div class="fix-flex">
                    <div class="heading">
                      <p class="menu-name">{{dish.title}}</p>
                      <div class="hold-lines">
                        <span class="line-v"></span>
                        <span class="line-v"></span>
                      </div>
                      <span class="price"
                            :style="dish.offer_cost === null ? ' text-decoration-line: none !important':' text-decoration-line: line-through'">${{dish.cost}}</span>
                      <span class="new-price" v-if="dish.offer_cost === !null">${{dish.offer_cost}}</span>
                    </div>
                    <div class="title">{{dish.description}}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /dish-->
          <div class="col-12 text-center">
            <nuxt-link :to="localePath('/menu')" class="view-menus">{{$t('view all')}}</nuxt-link>
          </div>
        </div>
      </div>
    </div>
    <div class="news">
      <div class="container-fluid px-0">
        <div class="col-12">
          <h2 class="news-heading">{{$t('top dishes')}}</h2>
          <p class="news-sub-heading">{{$t("today's special")}}</p>
        </div>
        <div class="col-12">
          <div class="card-news">
            <div class="row">
              <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
                <div class="main-card text-center">
                  <h2 class="heading-news">{{dishOfDay.dishOfDay_bistro.title}}</h2>
                  <p class="title-news">{{dishOfDay.dishOfDay_bistro.description}}</p>
                  <nuxt-link class="view-menu" :to="localePath('/top-dishes')">view full menu</nuxt-link>
                </div>
              </div>
              <div class="col-lg-6 col-12">
                <img :src="'/images/'+dishOfDay.dishOfDay_bistro.image" alt="news" class="img-fluid img-card dishOfday">
              </div>
            </div>
          </div>
        </div>
      </div>
      <Video></Video>
<!--      <p v-if="this.$store.state.siteType === 'bistro'">{{this.$store.state.home.bistro_video}}bistro_video </p>-->
<!--      <p v-if="this.$store.state.siteType === 'kids'">{{this.$store.state.home.kids_video}} kids_video</p>-->
    </div>
    <SocialLinks :main-style="true" class="hidden-in-mobile social-links" @scroll.native="handleScroll"></SocialLinks>
  </div>
  <div v-else>
    <div class="main-page-kids">
      <div class="slider">
        <client-only>
          <siema class="siema" ref="siema" auto-play
                 :current.sync="currPage"
                 :ready="true"
                 @init="initFunc"
                 @change="Onchange"
                 :options="options">
            <div class="content-img">
              <div class="logo-slogan d-none">
                <div>
                  <img src="../../../assets/images/mykanos-type.png" alt="mykanos" class="img-fluid slider-img">
                  <img src="../../../assets/images/main-logo.png" alt="mykanos" class="img-fluid slider-img-logo">
                  <img src="../../../assets/images/quote.png" alt="mykanos" class="img-fluid quote-img">
                </div>
              </div>
              <img src="../../../assets/images/mykanos-dish.png" alt="mykanos-dish" class="img-fluid cover">
            </div>
            <div v-for="imgSlider in home.sliders.sliders_kids" class="content-img">
              <img :src="imgSlider.photo" alt="mykanos-dish" class="img-fluid">
            </div>
          </siema>
          <div class="icons">
            <button @click="prevSlider"><img src="../../../assets/images/left.png" alt="left"></button>
            <button @click="nextSlider"><img src="../../../assets/images/right.png" alt="right"></button>
          </div>
          <div class="dots d-none">
            <ul>
              <li v-for="(dots,index) in 3" :id="'element'+index" :key="dots" @click="goToSlide(index)"></li>
            </ul>
          </div>
        </client-only>
      </div>
      <div class="welcome-kids d-none">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
              <img src="../../../assets/images/chief.png" alt="chief" class="img-fluid chief">
            </div>
            <div class="col-lg-6 col-12">
              <div class="quote">
                <h3 class="heading-welcome">{{$t('Welcome At')}}</h3>
                <p>Myknons RESTAURANT“Action
                  ullamco laboris nisi ut aliquip ex ea
                  commodo consequat. Duis aute
                  irure dolor in reprehenderit in
                  voluptate”.Lorem ipsum dolor sit
                  amet,consecteturadipisicing elit,
                  sed do eiusmod tempor incididunt
                  ut labore et dolore magna aliqua.
                  Ut enim ad minim veniam, quis
                  nostrud exercitation ullamco
                  laborisnisi ut aliquip ex ea
                  commodo consequat. Duis
                  aute irure dolor in reprehenderit in
                  voluptate velit esse cillum dolore</p>
                <h4>{{$t('about us')}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="menu" v-if="home.dishes_kids.length >= 1">
        <h3 class="menu-km-kids text-center">Mykonos</h3>
        <span class="menu-span">{{$t('menu')}}</span>
        <div class="main-menu">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 px-5 dish d-none" v-for="dish in home.offered_dishes">
                <div class="row">
                  <div class="col-lg-4 col-12">
                    <div class="hold-img-menu">
                      <img :src="dish.image" class="img-fluid img-dish">
                    </div>
                  </div>
                  <div class="col-lg-8 col-12">
                    <div class="description-menu">
                      <div class="fix-flex">
                        <div class="heading">
                          <p class="menu-name">{{dish.title}}</p>
                          <div class="hold-lines">
                            <span class="line-v"></span>
                            <span class="line-v"></span>
                          </div>
                          <span class="price"
                                :style="dish.offer_cost === null ? ' text-decoration-line: none !important':' text-decoration-line: line-through'">${{dish.cost}}</span>
                          <span class="new-price">${{dish.offer_cost}}</span>
                        </div>
                        <div class="title">{{dish.description}}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 px-5 dish" v-for="(dish_kids,index) in home.dishes_kids">
                <div v-if="index < 8" class="row">
                  <div class="col-lg-4 col-12">
                    <div class="hold-img-menu">
                      <img :src="'/images/'+dish_kids.image" class="img-fluid img-dish">
                    </div>
                  </div>
                  <div class="col-lg-8 col-12">
                    <div class="description-menu">
                      <div class="fix-flex">
                        <div class="heading">
                          <p class="menu-name">{{dish_kids.title}}</p>
                          <div class="hold-lines">
                            <span class="line-v"></span>
                            <span class="line-v"></span>
                          </div>
                          <span class="price"
                                :style="dish_kids.offer_cost === null ? ' text-decoration-line: none !important':' text-decoration-line: line-through'">${{dish_kids.cost}}</span>
                          <span class="new-price" v-if="dish_kids.offer_cost === !null">${{dish_kids.offer_cost}}</span>
                        </div>
                        <div class="title">{{dish_kids.description}}</div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-12 text-center">
                <nuxt-link :to="localePath('/menu')" class="view-menus">{{$t('view all')}}</nuxt-link>
              </div>
            </div>
          </div>
        </div>
        <h4>{{$t("what's on the menu")}}</h4>
      </div>
      <div class="news">
        <div class="container-fluid px-0">
          <div class="col-12">
            <h2 class="news-heading">{{$t('top dishes')}}</h2>
            <p class="news-sub-heading">{{$t("today's special")}}</p>
          </div>
          <div class="col-12">
            <div class="card-news">
              <div class="row">
                <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
                  <div class="main-card text-center">
                    <h2 class="heading-news">{{dishOfDay.dishOfDay_kids.title}}</h2>
                    <p class="title-news">{{dishOfDay.dishOfDay_kids.description}}</p>
                    <nuxt-link class="view-menu" :to="localePath('/top-dishes')">view full menu</nuxt-link>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <img :src="'/images/'+dishOfDay.dishOfDay_kids.image" alt="news" class="img-fluid img-card dishOfday">
                </div>
              </div>
            </div>
          </div>
        </div>
        <Video></Video>
        <!--      <p v-if="this.$store.state.siteType === 'bistro'">{{this.$store.state.home.bistro_video}}bistro_video </p>-->
        <!--      <p v-if="this.$store.state.siteType === 'kids'">{{this.$store.state.home.kids_video}} kids_video</p>-->
      </div>
      <SocialLinks :main-style="true" class="hidden-in-mobile social-links" @scroll.native="handleScroll"></SocialLinks>
    </div>
  </div>
</template>

<script>
  import axios from "axios";
  import SocialLinks from "@/components/SocialLinks";
  import Video from "@/components/Video";
  import {mapGetters} from "vuex";
  export default {
    name: "index",
    components: {Video, SocialLinks},
    layout: "main-layout",
    async asyncData(context) {
      // context.app.i18n.defaultLocale = 'ar';
       let homeResponse = await context.$axios.get(`/api/home?lang=${context.app.i18n.locale}`);
       let dishOfDay = await  context.$axios.get(`/api/dish_of_day?lang=${context.app.i18n.locale}`);
      context.store.state.categories = homeResponse.categories;
      context.store.state.home = homeResponse.data.home;
      console.log(homeResponse.data.home);
      return {
        homeSite: homeResponse.data.home,
        dishOfDay : dishOfDay.data.dishOfDay,
        // dishOfDayBistro : dishOfDay.data.dishOfDay.DishOfDay_bistro,
        // dishOfDaykids : dishOfDay.data.dishOfDay.DishOfDay_Kids,
      }
    },
    data() {
      return {
        active: true,
        currPage: 0,
        options: {
          duration: 500,
          easing: "ease-out",
          perPage: 1,
          startIndex: 0,
          draggable: true,
          multipleDrag: true,
          threshold: 20,
          loop: true,
          rtl: false
        }
      }
    },
    computed: {
      ...mapGetters(['home','siteType'])
    },
    methods: {
      handleScroll(){
        if (window.pageYOffset > 600){
          $('.social-links').addClass("with-background")
        } else{
          $('.social-links').removeClass("with-background")
        }
      },
      prevSlider() {
        this.$refs.siema.prev();
      },
      nextSlider() {
        this.$refs.siema.next();
      },
      goToSlide(index) {
        this.$refs.siema.goTo(index);
      },
      initFunc() {
        document
          .getElementById("element" + this.currPage)
          .classList.add("active");
      },
      Onchange() {
        this.changeActive();
      },
      changeActive() {
        document
          .getElementsByClassName("active")[0]
          .classList.remove("active");
        document
          .getElementById("element" + this.currPage)
          .classList.add("active");
      }
    },
    mounted() {
      window.addEventListener('scroll', this.handleScroll);
      window.scrollTo({ top: 0, behavior: 'smooth' });
      // console.log(this.home)
    },
    destroyed () {
      window.removeEventListener('scroll', this.handleScroll);
    }
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  $kids-color: #f27a25;
  $main-font: 'Poppins';
  * {
    font-family: $main-font;
  }

  .heading-welcome {
    color: $main-color;
    font-size: 3.5rem;
    @media (max-width: 768px) {
      margin-top: 1rem;
    }
  }

  .siema {
    /*margin-bottom: 4rem;*/
  }

  .content-img {
    position: relative;
    .logo-slogan {
      position: absolute;
      left: 3%;
      top: 35%;
      display: flex;
      justify-content: center;
      align-items: center;
      @media (max-width: 992px) {
        top: 6rem;
      }
      @media (max-width: 400px) {
        top: 4.5rem;
      }

      .slider-img, .quote-img {
        display: block;
        width: 290px;
        margin: 0 auto;
        @media (max-width: 992px) {
          width: 185px;
        }
        @media (max-width: 704px) {
          width: 120px;
        }
        @media (max-width: 450px) {
          width: 120px;
        }
        @media (max-width: 400px) {
          width: 100px;
        }
      }

      .slider-img-logo {
        display: block;
        width: 110px;
        margin: 0.5rem auto 1.5rem auto;
        @media (max-width: 992px) {
          width: 90px;
        }
        @media (max-width: 704px) {
          width: 55px;
        }
        @media (max-width: 450px) {
          margin: 0.5rem auto 0.5rem auto;
          width: 50px;
        }
        @media (max-width: 400px) {
          width: 40px;
        }
      }
    }

    .cover {
      width: 100% !important;
    }
  }

  .icons {
    position: absolute;
    bottom: 3rem;
    left: 10%;
    @media (max-width: 992px) {
      display: none;
    }


    button {
      background-color: transparent;
      border: none;
      outline: none;

      &:first-of-type {
        position: absolute;
        top: -1rem;
        left: -1rem;
      }
    }
  }

  .dots {
    position: absolute;
    bottom: 4rem;
    left: 15%;
    @media (max-width: 992px) {
      display: none;
    }


    ul {
      display: flex;
      justify-content: center;
      align-items: center;

      li {
        width: 9px;
        height: 9px;
        background-color: #fff;
        margin: 0 .5rem;
        border-radius: 50%;
        cursor: pointer;
      }

      .active {
        background-color: $main-color;
      }
    }

  }

  .hold-img {
    height: 91%;
    display: flex;
    justify-content: center;
    align-items: center;
    @media (max-width: 768px) {
      height: auto;
      margin-bottom: 1rem;
    }

    img {
      height: 250px;
      @media (max-width: 992px) {
        height: 125px
      }
      @media (max-width: 768px) {
        height: 150px
      }
    }
  }

  .content-img {
    height: 100vh;

    img {
      object-fit: cover;
      width: 100%;
    }

    @media (max-width: 1050px) {
      height: auto;
    }
  }

  .heading-doing {
    color: $main-color;
    font-size: 2rem;
    font-weight: 700;
    letter-spacing: 3.24px;
    margin-top: 1rem;
    margin-bottom: 2rem;
  }

  .sub-heading {
    color: $main-color;
    font-size: 2.5rem;
    font-weight: 600;
    letter-spacing: 2.24px;
  }

  .paragraph {
    color: $main-color;
    font-weight: 600;
    width: 58%;
    line-height: 2.2;
    margin: 2rem auto;
    @media (max-width: 545px) {
      width: 90%;
    }
  }

  .news {
    .news-heading {
      font-weight: bold;
      text-align: center;
      font-size: 4.5rem;
      color: $main-color;
      text-transform: capitalize;

    }

    .news-sub-heading {
      color: #173661;
      text-transform: capitalize;
      letter-spacing: 4.97px;
      text-align: center;
      font-size: 3rem;
      margin: 3rem 0 2rem 0;
    }

    .card-news {
      box-shadow: 0 -2px 15px 0 rgba(0, 0, 0, 0.36);
      margin: 3rem auto;
      width: 80% !important;
      .dishOfday{
        height: 100%;
        object-fit: cover;
      }
      .img-card {
        width: 100%;
        @media (max-width: 992px) {
          height: 250px;
          object-fit: cover;
          display: block;
          margin-top: 2rem;
        }
      }

      .heading-news {
        color: $main-color;
        font-size: 3rem;
        width: 60%;
        margin: 0 auto;
        font-weight: 600;
        @media (max-width: 1200px) {
          font-size: 2rem;
          width: 80%;
          margin: 4rem auto 0 auto;
        }

      }

      .title-news {
        width: 65%;
        color: #173661;
        margin: 3rem auto;
        font-size: 1.2rem;
        line-height: 2.5;
        text-transform: capitalize;

        @media (max-width: 992px) {
          font-size: 2rem;
          width: 80%;
          margin: 3rem auto;
        }
        @media (max-width: 768px) {
          font-size: 1rem;
        }

      }

      .view-menu {
        color: $main-color;
        text-transform: uppercase;
        text-decoration: none;
        background: transparent;
        background-position: bottom;
        padding: 1rem;
        transition: border-top-right-radius .3s linear .5s,
        border-bottom-left-radius .3s linear .5s,
        background-color linear .3s,
        opacity linear .3s;

        &:hover {
          background-position: top;
          background-color: #000;
          opacity: .5;
          border-top-right-radius: 8px;
          border-bottom-left-radius: 8px;

        }
      }

      @media (max-width: 768px) {
        width: 100%;
      }
    }
  }

  .hidden-in-mobile {
    @media (max-width: 992px) {
      display: none;
    }
  }

  .welcome-lab-top {
    @media (max-width: 768px) {
      display: none;
    }
  }

  .welcome-mobile {
    display: none;

    img {
      display: block;
      margin: 1rem 0;
    }

    @media (max-width: 768px) {
      display: block;
    }
  }











  .main-page-kids{
    .siema{
      margin-bottom: 0;
    }
    .logo-slogan {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      display: flex;
      justify-content: center;
      align-items: center;
      @media (max-width: 992px) {
        top: 6rem;
      }
      @media (max-width: 400px) {
        top: 4.5rem;
      }

      .slider-img-logo {
        display: block;
        width: 250px;
        @media (max-width: 992px) {
          width: 90px;
        }
        @media (max-width: 704px) {
          width: 55px;
        }
        @media (max-width: 450px) {
          margin: 0.5rem auto 0.5rem auto;
          width: 50px;
        }
        @media (max-width: 400px) {
          width: 40px;
        }
      }
    }

    .dots {
      position: absolute;
      left: 5%;
      top: 50%;
      transform: translate(-50%, -50%);
      @media (max-width: 992px) {
        display: none;
      }

      ul {
        display: block;

        li {
          width: 25px;
          height: 2px;
          border-radius: 2px;
          margin-top: 1rem;
          transition: all linear .3s .5s;
        }

        .active {
          width: 40px;
          background-color: $main-color;
        }
      }
    }

    .welcome-kids {
      background: url("../../../assets/images/about-kids.png") fixed no-repeat;
      background-size: cover;
      background-position: 50% 0;
      .chief {
        width: 290px;
        object-position: center;
        object-fit: cover;
        display: block;
        margin: 3rem 0;
      }

      .quote {
        background-color: rgba(0, 0, 0, 0.71);
        padding: 0 3rem;
        height: 100%;
        .heading-welcome, h4 {
          color: $kids-color;
          padding: 2rem 0;
          text-transform: capitalize;
        }

        p {
          line-height: 1.5;
          letter-spacing: 3.98px;
          color: #fff;
          width: 85%;
          @media (max-width: 545px) {
            width: 100%;
            letter-spacing: 0;
          }
        }

        h4 {
          border-left: 3px solid $kids-color;
          padding-left: 2rem;
          margin: 3rem 0 4rem 0;
        }
        @media (max-width: 545px) {
          height: 95%;
          padding: 0 1rem;
        }
      }
    }

    .menu {
      background: url("../../../assets/images/back-menu.png") fixed no-repeat;
      background-size: cover;
      background-position: 50% 0;
      padding-bottom: 2rem;

      .menu-km-kids {
        color: $kids-color;
        padding: 3rem 0 2rem 0;
        font-size: 4rem;
      }

      .main-menu {
        width: 95%;
        margin: 0 auto;
        background-color: rgba(0, 0, 0, 0.85);
      }

      .menu-span {
        display: block;
        font-size: 2rem;
        position: relative;
        margin: 0 auto 2rem auto;
        width: 85%;
        padding-left: 3rem;
        text-transform: capitalize;
        text-align: center;
        color: #fff;

        &:before {
          content: "";
          width: 7%;
          height: 2px;
          background-color: #f27a25;
          position: absolute;
          top: 50%;
          left: 40%;
          @media (max-width: 545px) {
            width: 10%;
            left: 30%;
          }
        }
      }

      h4 {
        border-left: 3px solid $kids-color;
        margin: 2rem auto 0 auto;
        text-align: center;
        color: #fff;
        text-transform: capitalize;
        width: 25%;
        padding: 1rem 0;
        font-weight: bold;
        @media (max-width: 545px) {
          width: 93%;
        }
      }
    }

    .news {

      .news-heading {
        font-weight: bold;
        text-align: center;
        font-size: 4.5rem;
        color: $kids-color;
        text-transform: capitalize;

      }

      .news-sub-heading {
        color: #173661;
        text-transform: capitalize;
        letter-spacing: 4.97px;
        text-align: center;
        font-size: 3rem;
        margin: 3rem 0 2rem 0;
      }

      .card-news {
        box-shadow: 0 -2px 15px 0 rgba(0, 0, 0, 0.15);
        margin: 1.5rem auto;
        width: 100%;
        .img-card {
          @media (max-width: 992px) {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
            margin-top: 2rem;
          }
        }

        .heading-news {
          color: $kids-color;
          font-size: 1.7rem;
          margin: 1rem auto 0 auto;
          font-weight: 600;
          width: 90%;
          @media (max-width: 1200px) {
            font-size: 1rem;
            margin: 1rem auto 0 auto;
          }
        }

        .title-news {
          color: #173661;
          margin: 1rem auto;
          font-size: 1.2rem;
          line-height: 1.5;
          text-transform: capitalize;
          width: 90%;
          @media (max-width: 992px) {
            font-size: 2rem;
            width: 80%;
            margin: 3rem auto;
          }
          @media (max-width: 768px) {
            font-size: 1rem;
          }

        }

        .view-menu {
          color: $kids-color;
          text-transform: uppercase;
          text-decoration: none;
          background: transparent;
          background-position: bottom;
          padding: 1rem;
          transition: border-top-right-radius .3s linear .5s,
          border-bottom-left-radius .3s linear .5s,
          background-color linear .3s,
          opacity linear .3s;

          &:hover {
            background-position: top;
            background-color: #000;
            opacity: .5;
            border-top-right-radius: 8px;
            border-bottom-left-radius: 8px;

          }
        }

        @media (max-width: 768px) {
          width: 100%;
        }
      }
    }
  }
  .main-card{
    margin: 6rem 0;
  }
  .with-background a{
    display: flex;
    height: 70px;
    width: 70px;
    margin: 0 auto;
    background: #fff;
    justify-content: center;
    align-items: center;
    border: 1px solid #000;
    border-radius: 50%;
  }
</style>
