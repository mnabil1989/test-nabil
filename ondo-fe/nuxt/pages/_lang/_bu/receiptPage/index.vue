<template>
  <div class="main-wrapper">
    <!-- Page Content -->
    <div class="content success-page-cont">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <!-- Success Card -->
            <div class="card success-card" v-if="IsSucess==='true'">
              <div class="card-body">
                <div class="success-cont">
                  <i class="fas fa-check" v-if="isDone"></i>
                  <h3 v-if="waiting">{{$t("wait for save operation...")}}</h3>
                  <h3 v-if="isDone">{{$t("Appointment booked Successfully!")}}</h3>
                  <p v-if="isDone">{{$t('Thank you for using Adalusia Care ')}}</p>
                  <div class="op-number">
                    <p v-if="isDone">{{$t('operation number')}}</p>
                    <p v-if="isDone">{{orderNumber}}</p>
                  </div>
                  <button v-if="isDone" @click="goOnlineCon" class="btn btn-primary mt-3">{{$t('goOnlineCon')}}</button>
                </div>
              </div>
            </div>
            <!-- /Success Card -->
            <div class="card success-card" v-else>
              <div class="card-body">
                <div class="success-cont">
                  <i class="fas fa-exclamation" style="background-color:red; border-color: red;"></i>
                  <h3>{{$t("Error")}}</h3>
                  <p>
                    {{msg}}
                    <!-- <strong>{{getDoctor.title}}</strong> -->
                    <br/>
                    <!-- {{$t('on')}} -->
                  </p>
                  <button @click="goHome" class="btn btn-primary mt-3">go home</button>
                  <!--                  <a href="invoice-view.html" class="btn btn-primary view-inv-btn">View Invoice</a>-->
                </div>
              </div>
            </div>
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
        bu: "",
        msg: "",
        IsSucess: false,
        orderNumber: 0,
        isDone: false,
        waiting: true,
      };
    },
    async mounted() {
      console.log(this.$route.query);
      this.msg = this.$route.query.response_message;
      this.IsSucess = this.$route.query.done;
      this.orderNumber = this.$route.query.order_id;
      // let IsFree = localStorage.getItem("free-mode");
      if (localStorage.getItem("free-mode") === 'mada' || localStorage.getItem("free-mode") === 'payFort') {
        if (this.IsSucess) {
          try {
            await this.$axios
              .post(`/${this.$route.params.bu}-api/appointment_confirm`, {
                order_id: this.orderNumber
              })
              .then(res => {
                localStorage.removeItem("order-id");
                this.isDone = true;
                this.waiting = false;
                // localStorage.removeItem("andalusia-bu");
              });
            //  this.$router.push(this.localePath(`/${this.$route.params.bu}/user/person/online-consultation`));
          } catch {
          }
        }
      } else {
        await this.$axios.post(`/${this.$route.params.bu}-api/appointment_free`, {
          order_id: localStorage.getItem('order-id')
        }).then(res=>{
          console.log("else res")
        }).catch(e => console.log(e));
        // this.$router.push(this.localePath(`/${this.$route.params.bu}/user/person/online-consultation`));
        // localStorage.removeItem("free-mode");
      }
    },
    computed: {},
    methods: {
      goHome() {
        this.$router.push(this.localePath(`/${this.$route.params.bu}`));
      },
      goOnlineCon(){
        this.$router.push(this.localePath(`/${this.$route.params.bu}/user/person/online-consultation`));
      }
    }
  };
</script>

<style scoped lang="scss">
  .success-page-cont {
    display: flex;
    height: 100vh;
  }

  .op-number {
    background-color: #e0e0e0;
    color: #1D6EBF;
    border-radius: 0.25rem;
    width: 70%;
    margin: 0 auto;
    padding: 1rem 0;
    p{
      &:last-of-type{
        font-weight: bold;
      }
    }
  }
</style>
