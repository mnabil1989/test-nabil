<template>
  <div class="main-wrapper">
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-8 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <nuxt-link :to="localePath('/')">{{$t('Home')}}</nuxt-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$t("Search")}}</li>
              </ol>
            </nav>
            <h2 class="breadcrumb-title">{{$t("Search")}}</h2>
          </div>
          <div class="col-md-4 col-12 d-md-block d-none">
            <!--            <div class="sort-by">-->
            <!--              <span class="sort-title">Sort by</span>-->
            <!--              <span class="sortby-fliter">-->
            <!--									<select class="select">-->
            <!--										<option>Select</option>-->
            <!--										<option class="sorting">Rating</option>-->
            <!--										<option class="sorting">Popular</option>-->
            <!--										<option class="sorting">Latest</option>-->
            <!--										<option class="sorting">Free</option>-->
            <!--									</select>-->
            <!--								</span>-->
            <!--            </div>-->
          </div>
        </div>
      </div>
    </div>
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
                <h4 class="card-title mb-0">{{$t("Search Filter" )}}</h4>
                <div @click="showMenuAnimation()" class="hamb-icon">
                  <i class="fa fa-bars"></i>
                </div>
              </div>
              <div class="card-body">
                <div class="filter-widget d-none">
                  <h4>Gender</h4>
                  <div>
                    <label class="custom_check">
                      <input type="checkbox" name="gender_type" checked />
                      <span class="checkmark"></span> Male Doctor
                    </label>
                  </div>
                  <div>
                    <label class="custom_check">
                      <input type="checkbox" name="gender_type" />
                      <span class="checkmark"></span> Female Doctor
                    </label>
                  </div>
                </div>
                <div class="filter-widget">
                  <h4>{{$t("Select Specialist")}}</h4>
                  <div v-for="sp in speciality" :key="sp.id">
                    <label
                      :style="{paddingRight: $i18n.locale=='ar'? '12%':'0'}"
                      class="custom_check"
                    >
                      <input
                        type="checkbox"
                        :value="$i18n.locale=='ar'?sp.name :sp.name_en"
                        name="select_specialist"
                      />
                      <span :style="{right: $i18n.locale=='ar'? '0':''}" class="checkmark"></span>
                      {{ $i18n.locale=='ar'?sp.name :sp.name_en}}
                    </label>
                  </div>
                </div>
                <div class="btn-search">
                  <button type="button" @click="Filter" class="btn btn-block">{{$t("Search-btn")}}</button>
                </div>
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
                      <nuxt-link :to="localePath(`/doctors/${doctor.slug}`)">
                        <img :src="doctor.photo" class="img-fluid" alt="User Image" />
                      </nuxt-link>
                    </div>
                    <div class="doc-info-cont arabic-Info">
                      <h4 class="doc-name">
                        <nuxt-link :to="localePath(`/doctors/${doctor.slug}`)">{{doctor.title}}</nuxt-link>
                      </h4>
                      <p class="doc-speciality">{{doctor.speciality}}</p>
                      <h5 class="doc-department">{{doctor.position}}</h5>
                      <div class="clinic-details">
                        <p class="doc-location">
                          <i class="fas fa-map-marker-alt"></i>
                          {{$t("Jeddah, KSA")}}
                        </p>
                      </div>
                      <!--                      <div class="clinic-services">-->
                      <!--                        <span>Dental Fillings</span>-->
                      <!--                        <span>Whitneing</span>-->
                      <!--                      </div>-->
                    </div>
                  </div>
                  <div class="doc-info-right arabic-Info">
                    <div class="clini-infos">
                      <ul>
                        <li>
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
                        :to="localePath(`/doctors/${doctor.slug}`)"
                        class="view-pro-btn"
                      >{{$t("View Profile")}}</nuxt-link>
                      <nuxt-link
                        class="apt-btn"
                        :to="localePath(`/doctors/${doctor.slug}/appointment`)"
                      >{{$t("Book Appointment")}}</nuxt-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="load-more text-center">
              <a
                v-if="filterdDoctors.length!=doctorsArr.length"
                class="btn btn-primary btn-sm text-white"
                @click="pageNum++"
              >{{$t("Load More")}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Page Content -->
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "search",
  head: {
    title: "Andalusia Dot Care | Doctors"
  },
  asyncData(context) {
    context.app.i18n.defaultLocale = "ar";
    return context.$axios
      .get(`/api/doctors?lang=${context.app.i18n.locale}`)
      .then(response => {
        return { doctors: response.data.doctors };
      })
      .catch(err => {
        console.log(err.response.body);
      });
  },
  computed: {
    getArrs: function() {
      this.filterdDoctors = this.doctors.filter(doctor => {
        let show = true;
        for (let i = 0; i < this.selectedSpecialities.length; i++) {
          const element = this.selectedSpecialities[i];
          if (doctor.speciality == element) {
            show = true;
            break;
          }
          show = false;
        }
        return show;
      });

      this.doctorsArr.push(
        ...this.filterdDoctors.slice(6 * this.pageNum - 6, 6 * this.pageNum)
      );

      return this.doctorsArr;
    }
  },
  data() {
    return {
      price: 300,
      pageNum: 1,
      doctorsArr: [],
      filterdDoctors: [],
      doctors: [],
      menuClicked: false,
      menuIntialized: false,
      speciality: [],
      selectedSpecialities: []
    };
  },
  created() {
    axios
      .get("/api/specialities")
      .then(response => {
        this.speciality = response.data.data;
      })
      .catch(e => console.log(e));
  },
  methods: {
    Filter() {
      let boxArr = document.getElementsByName("select_specialist");
      this.selectedSpecialities = [];
      this.doctorsArr = [];
      this.pageNum = 1;
      for (let i = 0; i < boxArr.length; i++) {
        const element = boxArr[i];
        console.log(element.value);
        if (element.checked) this.selectedSpecialities.push(element.value);
      }
      console.log(this.selectedSpecialities);
      $("html,body").animate({ scrollTop: 0 }, 400);
    },
    showMenuAnimation() {
      this.menuIntialized = true;
      this.menuClicked = !this.menuClicked;
    }
  }
};
</script>

<style scoped lang="scss">
.doctor-img img {
  object-fit: cover;
  height: 130px;
}
.show-menu-animation {
  animation: show-menu 2s forwards;
}
.hide-menu-animation {
  animation: hide-menu 2s forwards;
}
@keyframes show-menu {
  0% {
    max-height: 60px;
  }
  100% {
    max-height: 250vw;
  }
}
@keyframes hide-menu {
  0% {
    max-height: 250vw;
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

@media only screen and(max-width: 768px) {
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
</style>
