<template>
  <div class="main-wrapper">
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <nuxt-link :to="localePath('/')">{{$t('Home')}}</nuxt-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$t('Booking')}}</li>
              </ol>
            </nav>
            <h2 class="breadcrumb-title">{{$t('Booking')}}</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content success-page-cont">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <!-- Success Card -->
            <div class="card success-card">
              <div class="card-body">
                <div class="success-cont">
                  <i class="fas fa-check"></i>
                  <h3>{{$t("Appointment booked Successfully!")}}</h3>
                  <p>
                    {{$t(
                    'Appointment booked with'
                    )}}
                    <strong>{{getDoctor.title}}</strong>
                    <br />
                    {{$t('on')}}
                    <strong>
                      {{new Date(getDate).getDate()}} {{new Date(getDate).toLocaleString($i18n.locale, {
                      month: "short"
                      }) }} {{new Date(getDate).getFullYear()}} {{tConvert(getTime)}}
                    </strong>
                  </p>
                  <!--                  <a href="invoice-view.html" class="btn btn-primary view-inv-btn">View Invoice</a>-->
                </div>
              </div>
            </div>
            <!-- /Success Card -->
          </div>
        </div>
      </div>
    </div>
    <!-- /Page Content -->
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "thank-you",
  computed: {
    ...mapGetters({
      getDate: "book/getDate",
      getTime: "book/getTime",
      getDoctor: "book/getdoctor"
    })
  },
  methods: {
    tConvert(time) {
      time = time
        .toString()
        .match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

      if (time.length > 1) {
        // If time format correct
        time = time.slice(1); // Remove full string match value
        time[5] = +time[0] < 12 ? ` ${this.$t("AM")}` : ` ${this.$t("PM")}`;
        time[0] = +time[0] % 12 || 12; // Adjust hours
      }
      return time.join(""); // return adjusted time or original string
    }
  }
};
</script>

<style scoped>
</style>
