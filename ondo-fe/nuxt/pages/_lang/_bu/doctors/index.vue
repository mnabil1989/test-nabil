<template>
  <div class="main-wrapper">
    <div class="model-search" v-if="filterModel">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Breadcrumb -->
    <breadcrumb :link-to="'Home'" :current-page="'Search'"></breadcrumb>
    <!-- /Breadcrumb -->
    <!-- Page Content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
            <!-- Search Filter -->
            <div
              class="card search-filter"
              :class="{
      'show-menu-animation': menuClicked,
      'hide-menu-animation': showHideMenuAnim
    }"
            >
              <div class="card-header d-flex justify-content-between">
                <h4
                  class="card-title mb-0 d-flex justify-content-center align-items-center"
                >{{$t("Search Filter" )}}</h4>
                <div class="btn-search dis-none">
                  <button
                    type="button"
                    @click="Filter"
                    class="btn btn-block btn-filter"
                  >{{$t("Search-btn")}}</button>
                </div>
                <div @click="showMenuAnimation()" class="hamb-icon">
                  <i class="fa fa-bars"></i>
                </div>
              </div>
              <div class="card-body">
                <div class="filter-widget">
                  <h4>{{$t("Select Clinic")}}</h4>
                  <div v-for="sp in clinics" :key="sp.slug">
                    <label
                      :style="{paddingRight: $i18n.locale=='ar'? '12%':'0'}"
                      class="custom_check"
                    >
                      <input
                        v-if="specialitySelected==sp.id"
                        type="checkbox"
                        :value="$i18n.locale=='ar'?sp.id :sp.id"
                        name="clinic_type"
                        checked
                      />

                      <input v-else type="checkbox" :value="sp.id" name="clinic_type" />
                      <span :style="{right: $i18n.locale=='ar'? '0':''}" class="checkmark"></span>
                      {{ sp.name }}
                    </label>
                  </div>
                </div>
                <div class="filter-widget">
                  <h4>{{$t("Select Gender")}}</h4>
                  <div>
                    <label
                      :style="{paddingRight: $i18n.locale=='ar'? '12%':'0'}"
                      class="custom_check"
                    >
                      <input type="checkbox" name="gender_type" value="male" />
                      <span class="checkmark" :style="{right: $i18n.locale=='ar'? '0':''}"></span>
                      {{$t('Male')}}
                    </label>
                  </div>
                  <div>
                    <label
                      :style="{paddingRight: $i18n.locale=='ar'? '12%':'0'}"
                      class="custom_check"
                    >
                      <input type="checkbox" name="gender_type" value="female" />
                      <span class="checkmark" :style="{right: $i18n.locale=='ar'? '0':''}"></span>
                      {{$t('Female')}}
                    </label>
                  </div>
                </div>
                <!-- <div class="filter-widget">
                  <h4>{{$t("Select Specialist")}}</h4>
                  <div v-for="sp in speciality" :key="sp.id">
                    <label
                      :style="{paddingRight: $i18n.locale=='ar'? '12%':'0'}"
                      class="custom_check"
                    >
                      <input
                        v-if="specialitySelected==($i18n.locale=='ar'?sp.id :sp.id)"
                        type="checkbox"
                        :value="$i18n.locale=='ar'?sp.id :sp.id"
                        name="select_specialist"
                        checked
                      />
                      <input
                        v-else
                        type="checkbox"
                        :value="$i18n.locale=='ar'?sp.id :sp.id"
                        name="select_specialist"
                      />
                      <span :style="{right: $i18n.locale=='ar'? '0':''}" class="checkmark"></span>
                      {{ $i18n.locale=='ar'?sp.name :sp.name_en}}
                    </label>
                  </div>
                </div>-->
              </div>
              <div class="btn-search d-md-none">
                <button
                  type="button"
                  @click="Filter"
                  class="btn btn-block btn-filter"
                >{{$t("Search-btn")}}</button>
              </div>
            </div>
            <!-- /Search Filter -->
          </div>
          <div class="col-md-12 col-lg-8 col-xl-9">
            <!-- Doctor Widget -->
            <div class="card" v-for="doctor in getArrs" :key="doctor.slug">
              <div class="card-body">
                <div class="doctor-widget">
                  <div class="doc-info-left arabic-Info">
                    <div class="doctor-img arabic-img">
                      <nuxt-link
                        :to="localePath(`/${$route.params.bu}/doctors/${$i18n.locale==='ar'?doctor.slug_ar:doctor.slug_en}`)"
                      >
                        <img :src="doctor.photo" class="img-fluid" alt="User Image" />
                      </nuxt-link>
                    </div>
                    <div class="doc-info-cont arabic-Info">
                      <h4 class="doc-name">
                        <nuxt-link
                          :to="localePath(`/${$route.params.bu}/doctors/${$i18n.locale==='ar'?doctor.slug_ar:doctor.slug_en}`)"
                        >{{$i18n.locale=='ar'?doctor.title_ar:doctor.title_en}}</nuxt-link>
                      </h4>
                      <p
                        class="doc-speciality"
                      >{{$i18n.locale=='ar'? doctor.speciality_ar :doctor.speciality_en}}</p>
                      <h5
                        class="doc-department"
                      >{{$i18n.locale=='ar'? doctor.position_ar :doctor.position_en}}</h5>
                      <!--                      <div class="clinic-details">-->
                      <!--                        <p class="doc-location">-->
                      <!--                          <i class="fas fa-map-marker-alt"></i>-->
                      <!--                          {{$t("Jeddah, KSA")}}-->
                      <!--                        </p>-->
                      <!--                      </div>-->
                      <!--                      <div class="clinic-services">-->
                      <!--                        <span>Dental Fillings</span>-->
                      <!--                        <span>Whitneing</span>-->
                      <!--                      </div>-->
                    </div>
                  </div>
                  <div class="doc-info-right arabic-Info">
                    <div class="clini-infos">
                      <ul>
                        <li class="bu-marker">
                          <i class="fas fa-map-marker-alt"></i>
                          {{$t("Jeddah, KSA")}}
                        </li>
                        <li>
                          <i class="far fa-money-bill-alt"></i>
                          {{$t('SAR')+' '}} {{doctor.price === null ? "":doctor.price}}
                        </li>
                      </ul>
                    </div>
                    <div class="clinic-booking">
                      <nuxt-link
                        :to="localePath(`/${$route.params.bu}/doctors/${$i18n.locale=='ar'?doctor.slug_ar:doctor.slug_en}`)"
                        class="view-pro-btn"
                      >{{$t("View Profile")}}</nuxt-link>
                      <nuxt-link
                        class="apt-btn"
                        :to="localePath(`/${$route.params.bu}/doctors/${$i18n.locale=='ar'?doctor.slug_ar:doctor.slug_en}/appointment`)"
                      >{{$t("Book Appointment")}}</nuxt-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div v-if="filterdDoctors.length === 0" class="no-result">
              <p>{{$t('sorry we have no results')}}</p>
            </div>
            <div class="load-more text-center">
              <client-only>
                <a
                  v-if="filterdDoctors.length>doctorsArr.length"
                  class="btn btn-primary btn-sm text-white"
                  @click="test"
                >{{$t("Load More")}}</a>
              </client-only>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Page Content -->
  </div>
</template>

<script>
// import axios from "axios";
import { mapGetters } from "vuex";
import Breadcrumb from "../../../../components/breadcrumb";
export default {
  name: "search",
  components: { Breadcrumb },
  head() {
    return {
      title: "Andalusia Dot Care | Doctors",
      link: [
        {
          rel: "stylesheet",
          href: `/${this.style}.css`
        }
      ],
      meta: [{ name: "theme-color", content: `${this.themeColor}` }]
    };
  },
  asyncData(context) {
    context.app.i18n.defaultLocale = "ar";

    // return context.$axios
    //   .get(
    //     `/${context.params.bu}-api/clinics?gender=male,female&lang=${context.app.i18n.locale}&specialities=${context.app.store.getters.specialitySelected}`
    //   )
    //   .then(response => {
    //     console.log(response.data.data);

    //     return { doctors: response.data.data };
    //   })
    //   .catch(err => {
    //     console.log(err.response.body);
    //   });a
  },
  computed: {
    ...mapGetters({ specialitySelected: "specialitySelected" }),
    getArrs: function() {
      this.filterdDoctors = this.doctors.filter(doctor => {
        return true;
      });
      this.doctorsArr.push(
        ...this.filterdDoctors.slice(6 * this.pageNum - 6, 6 * this.pageNum)
      );

      return this.doctorsArr;
    }
  },
  data() {
    return {
      themeColor: "#1D6EBF",
      style: "hjh",
      price: 300,
      pageNum: 1,
      filterModel: true,
      doctorsArr: [],
      filterdDoctors: [],
      doctors: [],
      menuClicked: false,
      menuIntialized: false,
      speciality: [],
      clinics: [],
      selectedSpecialities: []
    };
  },
  created() {
    this.filterModel = true;
    this.$axios
      .get(`/${this.$route.params.bu}-api/specialities`)
      .then(response => {
        this.speciality = response.data.data;
      })
      .catch(e => console.log(e));
    this.$axios
      .get(`/${this.$route.params.bu}-api/clinics?lang=${this.$i18n.locale}`)
      .then(response => {
        console.log(response);
        this.clinics = response.data.clinics;
      })
      .catch(e => console.log(e));
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
  },
  methods: {
    test() {
      this.pageNum++;
      console.log(this.filterdDoctors.length, this.doctorsArr.length);
    },
    async Filter() {
      this.filterModel = true;
      let boxArr = document.getElementsByName("select_specialist");
      let clinicBox = document.getElementsByName("clinic_type");
      let genderBox = document.getElementsByName("gender_type");
      let specialityQuerey = "";
      let clinicQuerey = "";
      let genderQuerey = "";
      this.selectedSpecialities = [];
      this.selectedClinics = [];
      this.selectedGender = [];

      this.doctorsArr = [];
      this.pageNum = 1;
      let j = 0;

      for (let i = 0; i < boxArr.length; i++) {
        const element = boxArr[i];
        if (element.checked) {
          specialityQuerey = `${specialityQuerey}${j > 0 ? "," : ""}${
            element.value
          }`;
          j++;
        }
      }
      j = 0;

      for (let i = 0; i < clinicBox.length; i++) {
        const element = clinicBox[i];
        console.log(element.value);
        if (element.checked) {
          clinicQuerey = `${clinicQuerey}${j > 0 ? "," : ""}${element.value}`;
          j++;
        }
      }
      j = 0;

      for (let i = 0; i < genderBox.length; i++) {
        const element = genderBox[i];
        console.log(element.value);
        if (element.checked) {
          genderQuerey = `${genderQuerey}${j > 0 ? "," : ""}${element.value}`;
          j++;
        }
      }
      let newResponse;
      if (clinicQuerey || specialityQuerey || genderQuerey) {
        newResponse = await this.$axios.get(
          `/${this.$route.params.bu}-api/clinics?${
            clinicQuerey != "" ? `clinics=${clinicQuerey}&` : ""
          }${
            specialityQuerey != "" ? `specialities=${specialityQuerey}&` : ""
          }${genderQuerey != "" ? `gender=${genderQuerey}&` : ""}lang=${
            this.$i18n.locale
          }`
        );
      } else {
        newResponse = await this.$axios.get(
          `/${this.$route.params.bu}-api/clinics?all_doctors=true&lang=${this.$i18n.locale}`
        );
      }
      this.doctors = [];
      this.doctorsArr = [];
      this.filterdDoctors = [];
      this.$nextTick(() => {
        this.filterModel = false;
        this.doctors = newResponse.data.data;
      });

      console.log(newResponse);
      console.log(this.selectedSpecialities);
      console.log(this.selectedClinics);
      console.log(this.selectedGender);

      // $("html,body").animate({ scrollTop: 0 }, 400);
    },
    showMenuAnimation() {
      this.menuIntialized = true;
      this.menuClicked = !this.menuClicked;
    }
  },
  mounted() {
    // this.doctors = [];
    // let doctorStr = localStorage.getItem(
    // `filterdDoctors-${this.$route.params.bu}`
    // );
    // if (doctorStr) this.doctors = JSON.parse(doctorStr);

    this.$axios
      .get(
        `/${this.$route.params.bu}-api/clinics?gender=male,female&lang=${this.$i18n.locale}&clinics=${this.$store.getters.specialitySelected}`
      )
      .then(response => {
        // if (doctorStr != JSON.stringify(response.data.data)) {
        // this.doctors = [];
        this.doctors = response.data.data;
        this.filterModel = false;
        // doctorStr = JSON.stringify(response.data.data);
        // localStorage.setItem(
        // `filterdDoctors-${this.$route.params.bu}`,
        // doctorStr
        // );
        // }
      })
      .catch(err => {
        console.log(err.response.body);
      });
  }
};
</script>

<style scoped lang="scss">
.doc-info-cont {
  padding-top: 1rem;
}
.doctor-img {
  display: flex;
  justify-content: center;
  align-items: center;
  a {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    img {
      object-fit: cover;
    }
  }
}
.doctor-img img {
  object-fit: cover;
  height: 130px;
}
.show-menu-animation {
  animation: show-menu 3s forwards;
}
.hide-menu-animation {
  animation: hide-menu 3s forwards;
}
@keyframes show-menu {
  0% {
    max-height: 60px;
  }
  100% {
    max-height: 1500px;
  }
}
@keyframes hide-menu {
  0% {
    max-height: 1200px;
  }
  100% {
    max-height: 60px;
  }
}
.hamb-icon {
  font-size: 1.2rem;
  cursor: pointer;
  display: none;
  color: #1d4590;
  justify-self: right;
}

@media only screen and(max-width: 765px) {
  .arabic-img {
    margin-right: auto !important;
    margin-left: auto !important;
  }
  .arabic-Info {
    text-align: center !important;
    margin: 0 !important;
  }
}
@media only screen and (max-width: 990px) {
  .search-filter {
    max-height: 55px;
    overflow: hidden;
  }
  .hamb-icon {
    display: block;
  }
}
.no-result {
  font-size: 1.1rem;
  text-transform: capitalize;
  height: 100px;
  border-radius: 0.25rem;
  background-color: #fff;
  border-bottom: 1px solid #f0f0f0;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: 500;
}
.model-search {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background: rgba(71, 73, 78, 0.41);
  z-index: 666;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  .spinner-border {
    margin-top: 25%;
    width: 4rem;
    height: 4rem;
  }
}
</style>

