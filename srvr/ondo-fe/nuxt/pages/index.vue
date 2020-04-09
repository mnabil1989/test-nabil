<template>
  <div class="main-wrapper">
    <!-- Header -->
    <!-- /Header -->
    <!-- Home Banner -->

    <section class="section section-search">
      <div class="container-fluid">
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
                <input
                  ref="search"
                  type="text"
                  class="form-control"
                  :placeholder="$t('search')"
                  v-model="searchKey"
                  @keyup="search"
                />
                <span class="form-text"></span>
                <div class="result-search" v-if="showResultTap">
                  <div class="card" v-for="doctor in doctorsSearch" :key="doctor.slug_en">
                    <nuxt-link class="card-body" :to="localePath(`/doctors/${doctor.slug_en}`)">
                      <div class="doctor-widget">
                        <div class="doc-info-left">
                          <div class="doctor-img">
                            <img
                              :src="'https://admin.andalusia.care/storage/'+doctor.photo"
                              class="img-fluid"
                              alt="User Image"
                            />
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
                              :to="localePath(`/doctors/${doctor.slug_en}`)"
                              class="view-pro-btn"
                            >{{$t('View Profile')}}</nuxt-link>
                            <nuxt-link
                              class="apt-btn"
                              :to="localePath(`/doctors/${doctor.slug_en}/appointment`)"
                            >{{$t('Book Now')}}</nuxt-link>
                          </div>
                        </div>
                      </div>
                    </nuxt-link>
                  </div>
                </div>
              </div>

              <button @click="search" class="btn btn-primary search-btn">
                <i class="fas fa-search"></i>
                <span>{{$t('search')}}</span>
              </button>
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
          <h2>{{$t('Clinic')}}</h2>
          <!-- <p class="sub-title">{{$t('clinic-Description')}}</p> -->
        </div>
        <div class="row justify-content-center">
          <div class="col-md-9">
            <!-- Slider -->
            <client-only>
              <siema
                class="specialities-slider slider siema"
                auto-play
                :current.sync="currPage"
                :ready="true"
                @init="initFunc"
                @change="Onchange"
                :loop="true"
                :options="options"
              >
                <div id="element0" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-05.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Dentist')}}</p>
                </div>

                <!-- Slider Item -->
                <div id="element1" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-01.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Urology')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element2" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-02.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Neurology')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element3" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-03.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Orthopedic')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element4" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-04.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Cardiologist')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element5" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-05.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Dentist')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element6" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-01.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Urology')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element7" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-02.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Neurology')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element8" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-03.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Orthopedic')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element9" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-04.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Cardiologist')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element10" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-05.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Dentist')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element11" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-01.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Urology')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element12" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-02.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Neurology')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element13" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-03.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Orthopedic')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div
                  v-for="(item, index) in 6"
                  :key="index"
                  id="element14"
                  class="speicality-item text-center"
                >
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-04.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Cardiologist')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element15" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-05.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Dentist')}}</p>
                </div>
                <!-- /Slider Item -->

                <!-- Slider Item -->
                <div id="element16" class="speicality-item text-center">
                  <div class="speicality-img">
                    <img
                      src="~/assets/img/specialities/specialities-01.png"
                      class="img-fluid"
                      alt="Speciality"
                    />
                    <span>
                      <i class="fa fa-circle" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p>{{$t('Urology')}}</p>
                </div>
                <!-- /Slider Item -->
              </siema>
            </client-only>
            <!-- /Slider -->
          </div>
        </div>
      </div>
    </section>
    <!-- Clinic and Specialities -->

    <!-- Popular Section -->
    <section class="section section-doctor">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
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
          <div class="col-lg-8">
            <client-only>
              <siema
                ref="siema"
                class="doctor-slider slider siema"
                :current.sync="currPage"
                :ready="true"
                @init="initFunc"
                @change="Onchange"
                :options="options2"
                auto-play
                :loop="true"
              >
                <!-- Doctor Widget -->
                <div class="profile-widget" v-for="(item, index) in doctors" :key="index">
                  <div class="doc-img">
                    <nuxt-link :to="localePath(`/doctors/${item.slug}`)">
                      <img class="img-fluid" alt="User Image" :src="item.photo" />
                    </nuxt-link>
                    <!--                    <a href="javascript:void(0)" class="fav-btn">-->
                    <!--                      <i class="far fa-bookmark"></i>-->
                    <!--                    </a>-->
                  </div>
                  <div class="pro-content">
                    <h3 class="title">
                      <nuxt-link :to="localePath(`/doctors/${item.slug}`)">{{item.title}}</nuxt-link>
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
                          :to="localePath(`/doctors/${item.slug}`)"
                          class="btn view-btn"
                        >{{$t('View Profile')}}</nuxt-link>
                      </div>
                      <div class="col-6">
                        <nuxt-link
                          :to="localePath(`/doctors/${item.slug}/appointment`)"
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
import axios from "axios";

export default {
  layouts: "default",
  components: {
    Logo
  },
  head: {
    title: "Andalusia Dot Care | Home"
  },
  data() {
    return {
      showResultTap: false,
      doctorsSearch: null,
      active: true,
      currPage: 0,
      searchKey: "",
      options: {
        duration: 200,
        easing: "ease-out",
        perPage: { 1200: 5, 900: 4, 800: 3, 600: 3, 500: 2, 400: 2 },
        startIndex: 0,
        draggable: true,
        multipleDrag: true,
        threshold: 10,
        // loop: true,
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
      }
    };
  },
  methods: {
    search() {
      axios
        .get(
          `/api/specialities?query_search=${this.searchKey}&with_doctors=true`
        )
        .then(res => {
          console.log(res.data.data);
          this.showResultTap = true;
          this.doctorsSearch = res.data.data;
          if (this.$refs.search.value === "") {
            this.showResultTap = false;
          }
        })
        .catch(e => console.log(e));
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
    }
  },

  asyncData(context) {
    context.app.i18n.defaultLocale = "ar";
    return context.$axios
      .get(`/api/doctors?lang=${context.app.i18n.locale}`)
      .then(response => {
        console.log(response);
        return { doctors: response.data.doctors };
      })
      .catch(err => {
        console.log("biiiiiiiiiiiiiiig errrrrrrrrrrorrrrrrrrrrrrrrrr");

        console.log(err.response.body);
      });
  },
  created() {
    axios.get(`/api/seo?lang=${this.$i18n.locale}`).then(res => {
      this.socialLinks = res.data.SEO.Social;
    });
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
</style>
