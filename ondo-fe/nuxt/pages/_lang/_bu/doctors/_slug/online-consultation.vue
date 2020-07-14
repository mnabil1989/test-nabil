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
                  <nuxt-link :to="localePath(`/${$route.params.bu}/`)">Home</nuxt-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </nav>
            <h2 class="breadcrumb-title">Dashboard</h2>
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
                    <h3>Richard Wilson</h3>
                  </div>
                </div>
              </div>
              <div class="dashboard-widget">
                <nav class="dashboard-menu">
                  <ul>
                    <li>
                      <nuxt-link :to="localePath(`/${$route.params.bu}/wer/profile-settings`)">
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                      </nuxt-link>
                    </li>
                    <li>
                      <nuxt-link :to="localePath(`/${$route.params.bu}/sf/change-password`)">
                        <i class="fas fa-lock"></i>
                        <span>Change Password</span>
                      </nuxt-link>
                    </li>
                    <li>
                      <a @click="handleLogout" class="sign-out">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
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
                      <a
                        class="nav-link active"
                        href="#pat_appointments"
                        data-toggle="tab"
                      >Appointments</a>
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
                                <th>Doctor</th>
                                <th>Appt Date</th>
                                <th>Booking Date</th>
                                <th>Follow Up</th>
                                <th>Status</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-01.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Ruby Perrin
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td>
                                  14 Nov 2019
                                  <span class="d-block text-info">10.00 AM</span>
                                </td>
                                <td>12 Nov 2019</td>
                                <td>16 Nov 2019</td>
                                <td>
                                  <span class="badge badge-pill bg-success-light">Confirm</span>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-info-light"
                                      v-b-modal.modal-1
                                    >join</a>
                                  </div>
                                </td>
                              </tr>

                              <b-modal id="modal-1">
                                <section class="login-wrapper">
                                  <div class="login-header">
                                    <p class="login-subtitle">Powering Real-Time Communications</p>
                                  </div>
                                  <div class="login-body">
                                    <div class="columns">
                                      <div class="columns d-none">
                                        <div class="column is-7">
                                          <BaseOptions @change="handleBaseMode"></BaseOptions>
                                        </div>
                                        <div class="column is-5">
                                          <AdvancedOptions
                                            :onRadioChange="handleTranscode"
                                            :onSelectChange="handleVideoProfile"
                                          ></AdvancedOptions>
                                        </div>
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
                                            <label class="radio">
                                              <input
                                                @click="handleAttendeeMode"
                                                value="audience"
                                                type="radio"
                                                name="attendee"
                                              />
                                              <span class="radio-btn"></span>
                                              <span class="radio-img audience"></span>
                                              <span class="radio-msg">Audience : join as an audience</span>
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="login-footer">
                                    <a
                                      id="joinBtn"
                                      @click="handleJoin"
                                      :disabled="!joinBtn"
                                      class="ag-rounded button is-info"
                                    >Join</a>
                                  </div>
                                </section>
                              </b-modal>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Appointment Tab -->

                  <!-- Prescription Tab -->
                  <div class="tab-pane fade" id="pat_prescriptions">
                    <div class="card card-table mb-0">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover table-center mb-0">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Created by</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>14 Nov 2019</td>
                                <td>Prescription 1</td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-01.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Ruby Perrin
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>13 Nov 2019</td>
                                <td>Prescription 2</td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-02.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Darren Elder
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>12 Nov 2019</td>
                                <td>Prescription 3</td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-03.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Deborah Angel
                                      <span>Cardiology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>11 Nov 2019</td>
                                <td>Prescription 4</td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-04.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Sofia Brient
                                      <span>Urology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>10 Nov 2019</td>
                                <td>Prescription 5</td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-05.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Marvin Campbell
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>9 Nov 2019</td>
                                <td>Prescription 6</td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-06.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Katharine Berthold
                                      <span>Orthopaedics</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>8 Nov 2019</td>
                                <td>Prescription 7</td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-07.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Linda Tobin
                                      <span>Neurology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>7 Nov 2019</td>
                                <td>Prescription 8</td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-08.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Paul Richard
                                      <span>Dermatology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>6 Nov 2019</td>
                                <td>Prescription 9</td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-09.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. John Gibbs
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>5 Nov 2019</td>
                                <td>Prescription 10</td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-10.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Olga Barlow
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Prescription Tab -->

                  <!-- Medical Records Tab -->
                  <div id="pat_medical_records" class="tab-pane fade">
                    <div class="card card-table mb-0">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover table-center mb-0">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Attachment</th>
                                <th>Created</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <a href="javascript:void(0);">#MR-0010</a>
                                </td>
                                <td>14 Nov 2019</td>
                                <td>Dental Filling</td>
                                <td>
                                  <a href="#">dental-test.pdf</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-01.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Ruby Perrin
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="javascript:void(0);">#MR-0009</a>
                                </td>
                                <td>13 Nov 2019</td>
                                <td>Teeth Cleaning</td>
                                <td>
                                  <a href="#">dental-test.pdf</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-02.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Darren Elder
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="javascript:void(0);">#MR-0008</a>
                                </td>
                                <td>12 Nov 2019</td>
                                <td>General Checkup</td>
                                <td>
                                  <a href="#">cardio-test.pdf</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-03.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Deborah Angel
                                      <span>Cardiology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="javascript:void(0);">#MR-0007</a>
                                </td>
                                <td>11 Nov 2019</td>
                                <td>General Test</td>
                                <td>
                                  <a href="#">general-test.pdf</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-04.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Sofia Brient
                                      <span>Urology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="javascript:void(0);">#MR-0006</a>
                                </td>
                                <td>10 Nov 2019</td>
                                <td>Eye Test</td>
                                <td>
                                  <a href="#">eye-test.pdf</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-05.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Marvin Campbell
                                      <span>Ophthalmology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="javascript:void(0);">#MR-0005</a>
                                </td>
                                <td>9 Nov 2019</td>
                                <td>Leg Pain</td>
                                <td>
                                  <a href="#">ortho-test.pdf</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-06.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Katharine Berthold
                                      <span>Orthopaedics</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="javascript:void(0);">#MR-0004</a>
                                </td>
                                <td>8 Nov 2019</td>
                                <td>Head pain</td>
                                <td>
                                  <a href="#">neuro-test.pdf</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-07.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Linda Tobin
                                      <span>Neurology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="javascript:void(0);">#MR-0003</a>
                                </td>
                                <td>7 Nov 2019</td>
                                <td>Skin Alergy</td>
                                <td>
                                  <a href="#">alergy-test.pdf</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-08.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Paul Richard
                                      <span>Dermatology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="javascript:void(0);">#MR-0002</a>
                                </td>
                                <td>6 Nov 2019</td>
                                <td>Dental Removing</td>
                                <td>
                                  <a href="#">dental-test.pdf</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-09.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. John Gibbs
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="javascript:void(0);">#MR-0001</a>
                                </td>
                                <td>5 Nov 2019</td>
                                <td>Dental Filling</td>
                                <td>
                                  <a href="#">dental-test.pdf</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-10.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Olga Barlow
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Medical Records Tab -->

                  <!-- Billing Tab -->
                  <div id="pat_billing" class="tab-pane fade">
                    <div class="card card-table mb-0">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover table-center mb-0">
                            <thead>
                              <tr>
                                <th>Invoice No</th>
                                <th>Doctor</th>
                                <th>Paid On</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <a href="invoice-view.html">#INV-0010</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-01.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Ruby Perrin
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td>14 Nov 2019</td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="invoice-view.html">#INV-0009</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-02.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Darren Elder
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>

                                <td>13 Nov 2019</td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="invoice-view.html">#INV-0008</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-03.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Deborah Angel
                                      <span>Cardiology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td>$150</td>
                                <td>12 Nov 2019</td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="invoice-view.html">#INV-0007</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-04.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Sofia Brient
                                      <span>Urology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td>$50</td>
                                <td>11 Nov 2019</td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="invoice-view.html">#INV-0006</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-05.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Marvin Campbell
                                      <span>Ophthalmology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td>$600</td>
                                <td>10 Nov 2019</td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="invoice-view.html">#INV-0005</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-06.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Katharine Berthold
                                      <span>Orthopaedics</span>
                                    </a>
                                  </h2>
                                </td>
                                <td>$200</td>
                                <td>9 Nov 2019</td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="invoice-view.html">#INV-0004</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-07.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Linda Tobin
                                      <span>Neurology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td>$100</td>
                                <td>8 Nov 2019</td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="invoice-view.html">#INV-0003</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-08.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Paul Richard
                                      <span>Dermatology</span>
                                    </a>
                                  </h2>
                                </td>
                                <td>$250</td>
                                <td>7 Nov 2019</td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="invoice-view.html">#INV-0002</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-09.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. John Gibbs
                                      <span>Dental</span>
                                    </a>
                                  </h2>
                                </td>
                                <td>$175</td>
                                <td>6 Nov 2019</td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="invoice-view.html">#INV-0001</a>
                                </td>
                                <td>
                                  <h2 class="table-avatar">
                                    <a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                                      <img
                                        class="avatar-img rounded-circle"
                                        src="../../../../../assets/img/doctors/doctor-thumb-10.jpg"
                                        alt="User Image"
                                      />
                                    </a>
                                    <a href="doctor-profile.html">
                                      Dr. Olga Barlow
                                      <span>#0010</span>
                                    </a>
                                  </h2>
                                </td>
                                <td>$550</td>
                                <td>5 Nov 2019</td>
                                <td class="text-right">
                                  <div class="table-action">
                                    <a href="invoice-view.html" class="btn btn-sm bg-info-light">
                                      <i class="far fa-eye"></i> View
                                    </a>
                                    <a
                                      href="javascript:void(0);"
                                      class="btn btn-sm bg-primary-light"
                                    >
                                      <i class="fas fa-print"></i> Print
                                    </a>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Billing Tab -->
                </div>
                <!-- Tab Content -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Page Content -->
  </div>
  <!-- /Main Wrapper -->
</template>

<script>
import * as Cookies from "js-cookie";

export default {
  name: "online-consultation",
  middleware: "redirectAuth",
  components: {
    BaseOptions: () => import("@/components/BaseOptions"),
    AdvancedOptions: () => import("@/components/AdvancedOptions"),
    InputChannel: () => import("@/components/InputChannel")
  },
  data() {
    return {
      joinBtn: false,
      channel: "test",
      baseMode: "avc",
      transcode: "interop",
      attendeeMode: "video",
      videoProfile: "720p_6"
    };
  },
  methods: {
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
    async handleLogout() {
      await this.$auth.logout();
      this.$router.push(this.localePath(`/${this.$route.params.bu}/`));
    },

    handleJoin() {
      // Cookies.set("channel", this.channel);
      // Cookies.set("user_id", this.user_id);
      // Cookies.set("token", this.token);
      // Cookies.set("baseMode", this.baseMode);
      // Cookies.set("transcode", this.transcode);
      // Cookies.set("attendeeMode", this.attendeeMode);
      // Cookies.set("videoProfile", this.videoProfile);
      let objectClient = {
        channel: this.channel,
        user_id: "1010101010",
        token:
          "006193d6f008e9e43b2b9a3655808daed7dIACm/xInmErzPNxPMJyx/dmsHO69HaE0GyNSK+UVyxa4Mwx+f9jXlvFJIgCH+iujmQqDXgQAAQApx4FeAgApx4FeAwApx4FeBAApx4Fe",
        baseMode: this.baseMode,
        transcode: this.transcode,
        attendeeMode: this.attendeeMode,
        videoProfile: this.videoProfile
      };
      this.$store.dispatch("fillClient", objectClient);
      this.$router.push(this.localePath(`/${this.$route.params.bu}/doctors/sd/${this.channel}`));
      // ${this.user_id}
    }
  },
  mounted() {
    this.$nextTick(() => {
      window.addEventListener("keypress", e => {
        e.keyCode === 13 && this.handleJoin();
      });
    });
  }
};
</script>

<style scoped>
</style>
