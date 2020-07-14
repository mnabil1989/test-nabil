<template>
  <div class="main-wrapper">
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
                    'Thank you for using Adalusia Care '
                    )}}
                    <!-- <strong>{{getDoctor.title}}</strong> -->
                    <br />
                    <!-- {{$t('on')}} -->
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
export default {
  name: "receiptPage",
  layout: "recipt",
  data() {
    return {
      bu: ""
    };
  },
  mounted() {
    this.bu = localStorage.getItem("andalusia-bu");

    this.$axios
      .post(`/${this.bu}-api/appointment_confirm`, {
        order_id: localStorage.getItem("order-id")
      })
      .then(res => {
        localStorage.removeItem("order-id");
        localStorage.removeItem("andalusia-bu");
      });

    // setTimeout(() => {
    //   this.$router.push(
    //     this.localePath(`/${this.bu}/user/person/online-consultation`)
    //   );
    // }, 2000);
  },
  computed: {},
  methods: {}
};
</script>

<style scoped>
.success-page-cont {
  display: flex;
  height: 100vh;
}
</style>
