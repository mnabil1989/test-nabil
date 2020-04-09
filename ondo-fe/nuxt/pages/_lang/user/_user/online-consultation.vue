<template>
  <!-- Main Wrapper -->
  <div class="main-wrapper">
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <nuxt-link :to="localePath('/')">Home</nuxt-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$t('onlineConsultation')}}</li>
              </ol>
            </nav>
            <h2 class="breadcrumb-title">{{$t('onlineConsultation')}}</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Profile Sidebar -->
          <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
            <div class="profile-sidebar">
              <div class="widget-profile pro-widget-content">
                <div class="profile-info-widget">
                  <div class="profile-det-info">
                    <h3>{{$auth.user.first_name}}</h3>
                  </div>
                </div>
              </div>
              <div class="dashboard-widget">
                <nav class="dashboard-menu">
                  <ul>
                    <li>
                      <nuxt-link :to="localePath('/user/person/profile-settings')">
                        <i class="fas fa-user-cog"></i>
                        <span>{{$t('Profile Settings')}}</span>
                      </nuxt-link>
                    </li>
                    <li>
                      <nuxt-link :to="localePath('/user/person/change-password')">
                        <i class="fas fa-lock"></i>
                        <span>{{$t('Change Password')}}</span>
                      </nuxt-link>
                    </li>
                    <li>
                      <a @click="handleLogout" class="sign-out">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>{{$t('Logout')}}</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <!-- / Profile Sidebar -->

          <div class="col-md-7 col-lg-8 col-xl-9">
            <div class="card">
              <div class="card-body pt-0">
                <!-- Tab Menu -->
                <nav class="user-tabs mb-4">
                  <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab">{{$t('Appointments')}}</a>
                    </li>
                    <li class="nav-item d-none">
                      <a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Prescriptions</a>
                    </li>
                    <li class="nav-item d-none">
                      <a class="nav-link" href="#pat_medical_records" data-toggle="tab">
                        <span class="med-records">Medical Records</span>
                      </a>
                    </li>
                    <li class="nav-item d-none">
                      <a class="nav-link" href="#pat_billing" data-toggle="tab">Billing</a>
                    </li>
                  </ul>
                </nav>
                <!-- /Tab Menu -->

                <!-- Tab Content -->
                <div class="tab-content pt-0">
                  <!-- Appointment Tab -->
                  <div id="pat_appointments" class="tab-pane fade show active">
                    <div class="card card-table mb-0">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover table-center mb-0">
                            <thead>
                              <tr>
                                <th>{{$t('Doctor')}}</th>
                                <th>{{$t('Appt Date')}}</th>
                                <th>{{$t('Booking Date')}}</th>
                                <th>{{$t('Status')}}</th>

                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="(item, index) in appointments" :key="index">
                                <td>
                                  <h2 class="table-avatar">
                                    <nuxt-link
                                      :to="localePath(`/doctors/${item.doctor.slug}`)"
                                      class="avatar avatar-sm mr-2"
                                    >
                                      <img
                                        class="avatar-img rounded-circle"
                                        :src="item.doctor.photo"
                                        alt="User Image"
                                      />
                                    </nuxt-link>
                                    <nuxt-link :to="localePath(`/doctors/${item.doctor.slug}`)">
                                      {{item.doctor.title }}
                                      <span>{{item.doctor.speciality}}</span>
                                    </nuxt-link>
                                  </h2>
                                </td>
                                <td>
                                  <span class="d-block text-info">
                                    {{new Date(item.start.replace('"',"").replace(/-/g, '/')).toLocaleString($i18n.locale, { hour: 'numeric', minute: 'numeric', hour12: true })
                                    }}
                                  </span>
                                </td>
                                <td>
                                  <!-- {{item.start + ''}} -->
                                  {{new Date((item.start.replace('"',"").replace(/-/g, '/'))).getDate()}} {{new
                                  Date((item.start.replace('"',"").replace(/-/g, '/'))).toLocaleString($i18n.locale, {
                                  month: "short"
                                  })}} {{new Date((item.start.replace('"',"").replace(/-/g, '/'))).getFullYear()}}
                                </td>
                                <!--                                <td>-->
                                <!--                                  {{new Date((item.start.replace('"',""))).getDate()}} {{new Date((item.start.replace('"',""))).toLocaleString($i18n.locale, {-->
                                <!--                                  month: "short"-->
                                <!--                                  })}} {{new Date((item.start.replace('"',""))).getFullYear()}}-->
                                <!--                                </td>-->
                                <td>
                                  <span
                                    class="badge badge-pill"
                                    :class="{'bg-success-light':item.confirmed>0 , 'bg-danger-light': item.confirmed==0 || item.confirmed ==undefined}"
                                  >{{ item.confirmed==0 || item.confirmed ==undefined?$t("unConfirmed"):$t('confirmed')}}</span>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      v-if="item.confirmed==1"
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-info-light"
                                      @click="handleModals(('modal-'+index),item.start)"
                                    >{{$t('join')}}</a>

                                    <b-modal :id="'modal-'+index">
                                      <section class="login-wrapper">
                                        <div class="login-header">
                                          <p
                                            class="login-subtitle"
                                          >Powering Real-Time Communications</p>
                                        </div>
                                        <div class="login-body">
                                          <div class="columns">
                                            <div class="columns d-none">
                                              <div class="column is-7">
                                                <BaseOptions @change="handleBaseMode"></BaseOptions>
                                              </div>
                                              <div class="columns">
                                                <div class="column">
                                                  <div id="attendeeMode" class="control">
                                                    <label class="radio">
                                                      <input
                                                        @click="handleAttendeeMode"
                                                        value="video"
                                                        type="radio"
                                                        name="attendee"
                                                        checked
                                                      />
                                                      <span class="radio-btn"></span>
                                                      <span class="radio-img video"></span>
                                                      <span
                                                        class="radio-msg"
                                                      >Video Call : join with video call</span>
                                                    </label>
                                                    <br />
                                                    <label class="radio">
                                                      <input
                                                        @click="handleAttendeeMode"
                                                        value="audio-only"
                                                        type="radio"
                                                        name="attendee"
                                                      />
                                                      <span class="radio-btn"></span>
                                                      <span class="radio-img audio"></span>
                                                      <span
                                                        class="radio-msg"
                                                      >Audio-only : join with audio call</span>
                                                    </label>
                                                    <br />
                                                    <!--                                                  <label class="radio">-->
                                                    <!--                                                    <input-->
                                                    <!--                                                      @click="handleAttendeeMode"-->
                                                    <!--                                                      value="audience"-->
                                                    <!--                                                      type="radio"-->
                                                    <!--                                                      name="attendee"-->
                                                    <!--                                                    />-->
                                                    <!--                                                    <span class="radio-btn"></span>-->
                                                    <!--                                                    <span class="radio-img audience"></span>-->
                                                    <!--                                                    <span-->
                                                    <!--                                                      class="radio-msg"-->
                                                    <!--                                                    >Audience : join as an audience</span>-->
                                                    <!--                                                  </label>-->
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="login-footer">
                                          <a
                                            id="joinBtn"
                                            @click="handleJoin(item.doctor.slug, item.id)"
                                            :disabled="!joinBtn"
                                            class="ag-rounded button is-info"
                                          >Join</a>
                                        </div>
                                      </section>
                                    </b-modal>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Appointment Tab -->
                </div>
                <!-- Tab Content -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- *********************************************************** -->
    <!-- Timer-Modal -->
    <!-- *********************************************************** -->
    <div class="payment-Modal" :class="{ 'd-none': !TimerModal , 'd-block':TimerModal}">
      <div class="modal-container">
        <form action="GET" @submit.prevent="handleModal()" class="text-center">
          <div class="modal-header text-center">{{$t('Kindly wait until the appointment is ready')}}</div>
          <div class="modal-body" :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}">
            <!-- <div class="body-title">{{$t('Please Write a comment:')}}</div> -->
            <div class="banck-acc">{{$t('Time Left :')}} {{TimerCounter}}</div>
            <!-- <div>{{$t('Are you sure you want to proceed?')}}</div> -->
          </div>
          <div class="model-footer">
            <button class="btn btn-primary submit-condition" type="submit">{{$t('Confirm')}}</button>
            <!-- <a class="btn btn-danger" @click="hideModal">{{$t('close')}}</a> -->
          </div>
        </form>
      </div>
    </div>
    <!-- /Page Content -->
    <div class="warning">
      <p>something went to wrong</p>
    </div>
  </div>
  <!-- /Main Wrapper -->
</template>

<script>
import * as Cookies from "js-cookie";

export default {
  name: "online-consultation",
  middleware: "auth",
  components: {
    BaseOptions: () => import("@/components/BaseOptions"),
    AdvancedOptions: () => import("@/components/AdvancedOptions"),
    InputChannel: () => import("@/components/InputChannel")
  },
  data() {
    return {
      joinBtn: false,
      channel: "",
      timer: undefined,
      selectedAppDate: 0,
      TimerModal: false,
      appointment_selected: 0,
      baseMode: "avc",
      transcode: "interop",
      attendeeMode: "video",
      videoProfile: "720p_6"
    };
  },
  computed: {
    TimerCounter: function() {
      let time = this.msToTime(this.selectedAppDate);

      return time;
    }
  },

  mounted() {
    this.$nextTick(() => {
      window.addEventListener("keypress", e => {
        e.keyCode === 13 && this.handleJoin();
      });
    });
  },
  async asyncData(context) {
    let appointmentsRes = await context.$axios.get("/api/appointments/mine", {
      headers: {
        Authorization: `Basic ${context.$auth.getToken("local")}`
      }
    });
    // console.log(appointmentsRes);
    return { appointments: appointmentsRes["data"]["data"] };
  },
  methods: {
    handleChannel(val, state) {
      this.channel = val;
      this.joinBtn = state;
    },
    async handleLogout() {
      await this.$auth.logout();
      this.$router.push(this.localePath("/"));
    },
    handleModal() {
      this.TimerModal = false;
      clearInterval(this.timer);
    },

    msToTime(duration) {
      var milliseconds = parseInt((duration % 1000) / 100),
        seconds = Math.floor((duration / 1000) % 60),
        minutes = Math.floor((duration / (1000 * 60)) % 60),
        hours = Math.floor((duration / (1000 * 60 * 60)) % 24);

      hours = hours < 10 ? "0" + hours : hours;
      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      return hours + ":" + minutes + ":" + seconds;
    },
    handleModals(modalId, startTime) {
      let bookDate = new Date(startTime.replace('"', "").replace(/-/g, "/"));
      let todayDate = new Date();
      let fiveMin = 1000 * 60 * 5;
      if (bookDate.getTime() - todayDate.getTime() <= fiveMin) {
        this.$bvModal.show(modalId);
        return;
      }
      let seletctedDate = this.selectedAppDate;
      if (this.timer != undefined) clearInterval(this.timer);
      this.timer = setInterval(() => {
        this.selectedAppDate = bookDate.getTime() - new Date().getTime();
        console.log("hello");
      }, 1000);
      this.TimerModal = true;
    },
    handleUser(val, state) {
      this.user_id = "1010101010";
      this.joinBtn = state;
    },
    async asyncData(context) {
      let appointmentsRes = await context.$axios.get("/api/appointments/mine", {
        headers: {
          Authorization: `Basic ${context.$auth.getToken("local")}`
        }
      });
      // console.log(appointmentsRes);
      return { appointments: appointmentsRes["data"]["data"] };
    },

    handleChannel(val, state) {
      this.channel = val;
      this.joinBtn = state;
    },
    handleUser(val, state) {
      this.user_id = "1010101010";
      this.joinBtn = state;
    },
    handleToken(val, state) {
      this.token = val;
      this.joinBtn = state;
    },

    handleBaseMode(val) {
      this.baseMode = val;
    },

    handleTranscode(val) {
      this.transcode = val;
    },

    handleVideoProfile(val) {
      this.videoProfile = val;
    },

    handleAttendeeMode(e) {
      this.attendeeMode = e.currentTarget.value;
    },

    handleJoin(slug, id) {
      this.appointment_id = id;
      this.$axios
        .post("/api/videoAppointment", {
          headers: {
            Authorization: `Basic ${this.$auth.getToken("local")}`
          },
          body: {
            appointment_id: id.toString()
          }
        })
        .then(r => {
          if (r.status !== 200) {
            $(".warning")
              .animate(
                {
                  top: "2%"
                },
                800
              )
              .delay(500)
              .animate({ top: "-55%" }, 800);
            this.$router.push(
              this.localePath("/user/person/online-consultation")
            );
          }
          let objectClient = {
            baseMode: this.baseMode,
            transcode: this.transcode,
            attendeeMode: this.attendeeMode,
            videoProfile: this.videoProfile,
            channel: r.data.channelName,
            user_id: r.data.userId,
            token: r.data.token,
            doctor: r.data.doctor_name,
            doctor_slug: r.data.doctor_slug,
            appointmentTime: this.selectedAppDate
          };
          this.$store.dispatch("fillClient", objectClient);
          this.$store.dispatch("setAppointment", this.appointment_id);
          this.$router.push(
            this.localePath(
              `/user/${objectClient.user_id}/${objectClient.doctor_slug}`
            )
          );
        })
        .catch(function(err) {
          console.error(err);
        });
    }
  }
};
</script>

<style scoped lang="scss">
.warning {
  border-radius: 0.25rem;
  background-color: rgba(255, 0, 0, 0.89);
  color: #fff;
  width: 250px;
  position: absolute;
  top: -55%;
  left: 50% !important;
  transform: translate(-50%);
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1rem;
  text-transform: capitalize;
  p {
    margin: 0;
  }
}
.payment-Modal {
  position: fixed;
  top: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0.55);
  height: 100vh;
  z-index: 99999999;
  border-radius: 0.25rem;
}

.modal-container {
  width: 50%;
  padding: 2%;
  background: #ffffff;
  margin: 0 auto;
  margin-top: 7%;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  border-radius: 0.25rem;
}
.modal-header {
  font-size: 2rem;
  justify-content: center;
  align-items: center;
}

.modal-body {
  font-size: 1.4rem;
}

.body-footer {
  font-size: 1.2rem;
  font-weight: 700;
}

.body-title {
  font-weight: 700;
}

.banck-acc {
  font-size: 1.06rem;
  margin: 1% 0;
}

.model-footer {
  font-size: 1rem;
  color: #ffffff;
}

@media only screen and (max-width: 650px) {
  .modal-container {
    width: 90%;
    padding: 2%;
    background: #ffffff;
    margin: 0 auto;
    margin-top: 7%;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    border-radius: 0.25rem;
  }
}
</style>
