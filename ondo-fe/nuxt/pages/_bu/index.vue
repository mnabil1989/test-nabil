<template>
  <div class="main-wrapper">
    <!-- Header -->
    <!-- /Header -->
    <!-- Home Banner -->

    <section class="section section-search">
      <client-only>
        <siema
          class="hidden-mobile"
          :current.sync="currPage"
          :ready="true"
          :options="mainOptions"
          auto-play
          :loop="true"
        >
          <div v-for="mainSlider in buSlider.sliders" class="slider">
            <img :src="mainSlider.photo" class="img-fluid img-slider" alt="Speciality" />
          </div>
        </siema>
      </client-only>
      <div class="container-fluid search-form">
        <div class="banner-wrapper">
          <div class="banner-header text-center">
            <h1>{{ $t("homeHeader")}}</h1>
            <p>{{$t("discover")}}</p>
          </div>
          <!-- Search -->
          <div class="search-box">
            <form @submit.prevent>
              <!--              <div class="form-group search-location">-->
              <!--                <input type="text" class="form-control" placeholder="Search Location">-->
              <!--                <span class="form-text">Based on your Location</span>-->
              <!--              </div>-->
              <div class="form-group search-info">
                <div class="row">
                  <div class="col-md-11 col-12">
                    <input
                      ref="search"
                      type="text"
                      class="form-control"
                      :placeholder="$t('search')"
                      v-model="searchKey"
                      @keyup="search"
                    />
                  </div>
                  <div class="col-md-1 col-12">
                    <button @click="search" class="btn btn-primary search-btn mt-md-0 mt-sm-1">
                      <i class="fas fa-search"></i>
                      <span>{{$t('search')}}</span>
                    </button>
                  </div>
                  <div class="col-12 mt-1">
                    <div class="result-search alternate" v-if="showResultTap">
                      <div class="card" v-for="doctor in doctorsSearch" :key="doctor.slug_en">
                        <nuxt-link
                          class="card-body"
                          :to="localePath(`/${$route.params.bu}/doctors/${doctor.slug_en}`)"
                        >
                          <div class="doctor-widget">
                            <div class="doc-info-left">
                              <div class="doctor-img">
                                <img :src="doctor.photo" class="img-fluid" alt="User Image" />
                              </div>
                              <div class="doc-info-cont">
                                <h4 class="doc-name">
                                  <p>{{$i18n.locale=='en'? doctor.title_en :doctor.title_ar}}</p>
                                  <span>{{doctor.title}}</span>
                                </h4>
                                <p
                                  class="doc-speciality"
                                >{{$i18n.locale=='ar'? doctor.name :doctor.name_en}}</p>
                                <h5 class="doc-department">{{doctor.position}}</h5>
                              </div>
                            </div>
                            <div class="doc-info-right">
                              <div class="clinic-booking">
                                <nuxt-link
                                  :to="localePath(`/${$route.params.bu}/doctors/${doctor.slug_en}`)"
                                  class="view-pro-btn"
                                >{{$t('View Profile')}}</nuxt-link>
                                <nuxt-link
                                  class="apt-btn"
                                  :to="localePath(`/${$route.params.bu}/doctors/${doctor.slug_en}/appointment`)"
                                >{{$t('Book Now')}}</nuxt-link>
                              </div>
                            </div>
                          </div>
                        </nuxt-link>
                      </div>
                    </div>
                    <div class="result-search alternate" v-if="searchLoading">
                      <div class="card">
                        <div class="card-body">
                          <div class="doctor-widget">
                            <div class="doc-info-left">
                              <div class="doc-info-cont">
                                <p class="doc-speciality">{{$t('loading search')}}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="result-search alternate" v-if="noResult">
                      <div class="card">
                        <div class="card-body">
                          <div class="doctor-widget">
                            <div class="doc-info-left">
                              <div class="doc-info-cont">
                                <p class="doc-speciality">{{$t('no result')}}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--                <span class="form-text"></span>-->
              </div>
            </form>
          </div>
          <!-- /Search -->
        </div>
      </div>
    </section>
    <!-- /Home Banner -->

    <!-- Clinic and Specialities -->

    <section class="section section-specialities">
      <div class="container-fluid">
        <div class="section-header text-center">
          <h2>{{$t('clinics')}}</h2>
          <!-- <p class="sub-title">{{$t('clinic-Description')}}</p> -->
        </div>
        <div class="row justify-content-center">
          <div class="col-md-9">
            <client-only>
              <siema
                :current.sync="currPage"
                :ready="true"
                :options="options3"
                auto-play
                :loop="true"
              >
                <div
                  id="element1"
                  class="speicality-item text-center"
                  v-for="(item,index) in sliderImage"
                  :key="index"
                >
                  <div class="speicality-img">
                    <img :src="item.photo" class="img-fluid" alt="Speciality" />
                    <span class="bu_icon">
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p @click="searchDoctor( item.id )">{{ item.name }}</p>
                </div>
              </siema>
            </client-only>
          </div>
        </div>
      </div>
    </section>

    <!-- Clinic and Specialities -->

    <!-- Popular Section -->
    <section class="section section-doctor">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="section-header">
              <h2>{{$t('Book')}}</h2>
              <p>{{$t('doctor-Descrition')}}</p>
            </div>
            <!--            <div class="about-content">-->
            <!--              <p>It is a long established fact that a reader will be distracted by the readable content of a page when-->
            <!--                looking at its layout. The point of using Lorem Ipsum.</p>-->
            <!--              <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will-->
            <!--                uncover many web sites still in their infancy. Various versions have evolved over the years,-->
            <!--                sometimes</p>-->
            <!--              <a href="javascript:;">Read More..</a>-->
            <!--            </div>-->
          </div>
          <div class="col-lg-12">
            <client-only>
              <siema
                ref="siema"
                class="doctor-slider slider siema"
                :current.sync="currPage"
                :ready="true"
                :options="options2"
                auto-play
                :loop="true"
              >
                <!-- Doctor Widget -->
                <div class="profile-widget" v-for="(item, index) in doctors" :key="index">
                  <div class="doc-img">
                    <nuxt-link :to="localePath(`/${$route.params.bu}/doctors/${item.slug}`)">
                      <img class="img-fluid" alt="User Image" :src="item.photo" />
                    </nuxt-link>
                    <!--                    <a href="javascript:void(0)" class="fav-btn">-->
                    <!--                      <i class="far fa-bookmark"></i>-->
                    <!--                    </a>-->
                  </div>
                  <div class="pro-content">
                    <h3 class="title">
                      <nuxt-link
                        :to="localePath(`/${$route.params.bu}/doctors/${item.slug}`)"
                      >{{item.title}}</nuxt-link>
                      <i class="fas fa-check-circle verified"></i>
                    </h3>

                    <ul class="available-info">
                      <li>
                        <!-- <i class="far fa-clock"></i> -->
                        {{item.speciality}}
                      </li>
                      <li>
                        <i class="fas fa-map-marker-alt"></i>
                        {{$t('Jeddah, KSA')}}
                      </li>

                      <li>
                        <i class="far fa-money-bill-alt"></i>
                        {{$t('SAR')+' '}}{{item.price === null ? "":item.price}}
                        <!--                        <i-->
                        <!--                          class="fas fa-info-circle"-->
                        <!--                          data-toggle="tooltip"-->
                        <!--                          title="Lorem Ipsum"-->
                        <!--                        ></i>-->
                      </li>
                    </ul>
                    <div class="row row-sm">
                      <div class="col-6">
                        <nuxt-link
                          :to="localePath(`/${$route.params.bu}/doctors/${item.slug}`)"
                          class="btn view-btn"
                        >{{$t('View Profile')}}</nuxt-link>
                      </div>
                      <div class="col-6">
                        <nuxt-link
                          :to="localePath(`/${$route.params.bu}/doctors/${item.slug}/appointment`)"
                          class="btn book-btn"
                        >{{$t('Book Now')}}</nuxt-link>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Doctor Widget -->
              </siema>
              <div dir="ltr" class="icons">
                <button @click="prevSlider" class="view-pro-btn left">
                  <i class="fas fa-chevron-left"></i>
                </button>
                <button @click="nextSlider" class="view-pro-btn right">
                  <i class="fas fa-chevron-right"></i>
                </button>
              </div>
            </client-only>
          </div>
        </div>
      </div>
    </section>
    <!-- /Popular Section -->
  </div>
</template>

<script>
import Logo from "~/components/Logo.vue";
import { mapActions } from "vuex";

export default {
  layouts: "default",
  components: {
    Logo
  },
  head() {
    return {
      title: "Andalusia Dot Care | Home",
      link: [
        {
          rel: "stylesheet",
          href: `/${this.style}.css`
        }
      ],
      meta: [{ name: "theme-color", content: `${this.themeColor}` }]
    };
  },
  data() {
    return {
      specialityImages: [],
      showResultTap: false,
      doctorsSearch: [],
      active: true,
      currPage: 0,
      searchKey: "",
      noResult: false,
      searchLoading: false,
      style: "hjh",
      themeColor: "#1D6EBF",
      // options: {
      //   duration: 200,
      //   easing: "ease-out",
      //   perPage: { 1400: 4 , 1200: 5, 900: 4, 800: 3, 600: 3, 500: 2, 400: 2 },
      //   startIndex: 0,
      //   draggable: true,
      //   multipleDrag: true,
      //   threshold: 10,
      //   // loop: true,
      //   rtl: false
      // },
      mainOptions: {
        duration: 100,
        easing: "ease-out",
        perPage: { 1200: 1, 800: 1, 400: 1 },
        startIndex: 0,
        draggable: true,
        multipleDrag: true,
        threshold: 10,
        loop: true,
        rtl: false
      },
      options2: {
        duration: 200,
        easing: "ease-out",
        perPage: { 1200: 3, 800: 3, 400: 1 },
        startIndex: 0,
        draggable: true,
        multipleDrag: true,
        threshold: 10,
        // loop: true,
        rtl: false
      },
      options3: {
        duration: 200,
        easing: "ease-out",
        perPage: {
          1200: 5,
          756: 3,
          320: 2
        },
        startIndex: 0,
        draggable: true,
        multipleDrag: true,
        threshold: 10
      }
    };
  },
  methods: {
    ...mapActions({ setSelectedSpeciality: "setSpeciality" }),
    searchDoctor(item) {
      this.setSelectedSpeciality(item).then(res => {
        this.$router.push(this.localePath(`/${this.$route.params.bu}/doctors`));
      });
    },
    search() {
      if (this.searchKey.length >= 3) {
        this.searchLoading = false;
        console.log(this.searchKey.length);
        setTimeout(() => {
          this.$axios
            .get(
              `/${this.$route.params.bu}-api/specialities?query_search=${this.searchKey}&with_doctors=true`
            )
            .then(res => {
              console.log(res.data.data);
              this.showResultTap = true;
              this.doctorsSearch = res.data.data;
              if (this.doctorsSearch.length === 0) {
                this.noResult = true;
                this.showResultTap = false;
              }
              if (this.$refs.search.value === "") {
                this.showResultTap = false;
              }
            })
            .catch(e => console.log(e));
        }, 500);
      } else if (this.searchKey.length < 3) {
        this.searchLoading = true;
        this.showResultTap = false;
        this.noResult = false;
        console.log("showResultTap ", this.showResultTap);
      }
      if (this.$refs.search.value === "") {
        this.searchLoading = false;
        this.showResultTap = false;
        this.noResult = false;
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
    }
    // initFunc() {
    // }
  },
  async asyncData(context) {
    let doctorRes = await context.$axios.get(
      `/${context.params.bu}-api/doctors?lang=${context.app.i18n.locale}`
    );
    let slider = await context.$axios.get(
      `/${context.params.bu}-api/clinics?lang=${context.app.i18n.locale}`
    );

    let mainSlider = await context.$axios.get(
      `/${context.params.bu}-api/home?lang=${context.app.i18n.locale}`
    );
    console.log(mainSlider.data.home);
    return {
      doctors: doctorRes.data.data,
      sliderImage: slider.data.clinics,
      buSlider: mainSlider.data.home
    };
  },
  created() {
    this.$axios
      .get(`/${this.$route.params.bu}-api/seo?lang=${this.$i18n.locale}`)
      .then(res => {
        this.socialLinks = res.data.SEO.Social;
      });
    if (this.$route.params.bu === "hjh") {
      this.style = "hjh";
      this.themeColor = "#1D6EBF";
    } else if (this.$route.params.bu === "apc") {
      this.style = "apc";
      this.themeColor = "#0066B4";
    } else if (this.$route.params.bu === "akw") {
      this.style = "akw";
      this.themeColor = "#63C7C9";
    } else if (this.$route.params.bu === "adc") {
      this.style = "adc";
      this.themeColor = "#23692B";
    }
  }
};
</script>

<style lang="scss">
.card {
  border: 1px solid #f0f0f0;
  margin-bottom: 0.6rem;
}

.card-body {
  padding: 0.6rem;
}

.doctor-img {
  display: inline-block;
  flex: 0 0 92px;

  img {
    object-fit: contain !important;
  }
}

.icons {
  text-align: center;
  margin: 1rem 0;

  button {
    color: #1d6ebf;
    font-size: 13px;
    border: 2px solid #1d6ebf;
    text-align: center;
    font-weight: 500;
    padding: 6px;
    opacity: 0.8;

    &:hover {
      background-color: #1d6ebf;
      color: #fff;
      opacity: 1;
    }
  }

  .fa-chevron-left,
  .fa-chevron-right {
    width: 35px;
    font-size: 17px;
  }

  .view-pro-btn.left {
    position: absolute;
    left: 0;
    top: 35%;
  }

  .view-pro-btn.right {
    position: absolute;
    right: 0;
    top: 35%;
  }
}
.result-search {
  height: 410px;
  overflow-y: auto;
  padding-left: 0;
}
.speicality-item {
  p {
    cursor: pointer;
  }
}
.alternate {
  .doc-info-left {
    text-align: center !important;
  }
  .doc-info-cont {
    width: 100%;
    text-align: center !important;
    p {
      margin: 0;
    }
  }
}
</style>
