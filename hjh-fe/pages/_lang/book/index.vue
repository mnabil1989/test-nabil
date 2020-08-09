<template>
  <div class="margin-top-mobile" :dir="$i18n.locale == 'ar' ? 'rtl' : 'ltr'">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="hold-all-form">
            <div class="form-heading">
              <div class="center ">{{$t('bookO')}}</div>
              <div class="divider center small-divider mt-3"></div>
            </div>
            <form  @submit.prevent="search">
              <div>
                <div>
                  <label>
                    <select class="select-item" id="clincDrop">
                      <option selected disabled value="-1">{{$t('clinic')}}</option>
                      <option v-for="(item, index) in clinics" :value="item.id" :key="index">{{ item.name }}</option>
                    </select>
                  </label>
                </div>
              </div>
              <div>
                <div>
                  <label>
                    <select class="select-item" v-model="genderSelected" id="genderDrop">
                      <option selected disabled>{{$t('gender')}}</option>
                      <option>{{ $t('male') }}</option>
                      <option>{{ $t('female') }}</option>
                    </select>
                  </label>
                </div>
              </div>
              <input type="submit" :value="$t('search')" class="search-btn" />
            </form>
          </div>
        </div>
        <div class="col-lg-8 col-12">
          <div class="img-container">
            <img class="img-fluid" src="../../../assets/img/315891-P8RUWI-712.png" alt="doctor" />
          </div>
        </div>
      </div>
    </div>
    <div class="row ml-auto mr-auto" v-if="pageNumber>0">
      <div class="col-11 ml-auto mr-auto space-between-col search-result">
        <div v-swiper:mySwiper="swiperOption">
          <div class="swiper-wrapper">
            <div class="space-around swiper-slide" v-for="(item, index) in pageNumber" :key="index">
              <div v-for="(item, index) in getDoctorsPage(index + 1)" :key="index" class="result-item">
                <div class="item-desc">
                  <div class="row">
                    <div class="col-lg-2 col-12">
                      <div class="img-avatar">
                        <img class="img-fluid" :src="item.photo" alt="doctor" :alt="item.image_alt" :title="item.image_title" />
                      </div>
                    </div>
                    <div class="col-lg-10 col-12">
                      <div class="doctor-name">{{$i18n.locale == 'ar' ? item.title_ar :item.title_en }}</div>
                      <div class="doctor-title">{{item.position}}</div>
                      <div>
                        <p class="text-center">المواعيد المتالحه</p>
                        <ul class="text-right" v-if="item.working_hours.length >= 1">
                          <li v-for="workHour in item.working_hours" :key="workHour.id" class="workHour">
                            <span class="day">{{new Date(workHour.start).toLocaleDateString('ar-eg',{ weekday: 'long'})}} </span>
                            <span class="start">بدايه من  {{(new Date(workHour.start).getHours()) > 12 ? new Date(workHour.start).getHours() - 12 +"مساءا" : new Date(workHour.start).getHours() + "صباحا"}}</span>
                            <span class="end"> الى  {{(new Date(workHour.end).getHours()) > 12 ? new Date(workHour.end).getHours() - 12 +"مساءا" : new Date(workHour.end).getHours() + "صباحا"}}</span>
                          </li>
                        </ul>
                        <ul class="text-right" v-if="item.working_hours.length === 0">
                          <li class="workHour">نأسف لا يوجد مواعيد متاحه الأن</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="book-btn center" @click="book(item.id)" :class="item.working_hours.length === 0 ? 'd-none':''">{{$t('book')}}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="navigation-container mb-5">
          <div class="hr-divider"></div>
          <div class="navigation-btns">
            <div @click="mySwiper.slidePrev()" class="navigation-btn">
              <i class="fa fa-angle-left"></i>
            </div>
            <div @click="mySwiper.slideNext()" class="navigation-btn swiper-slide-next">
              <i class="fa fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ----------------------------------------------------------------------- -->
    <!-- BookingModal -->
    <!-- ----------------------------------------------------------------------- -->
    <div
      class="payment-Modal"
      style="font-size:14px;"
      :class="{ 'd-none': !modalShowed , 'd-block': modalShowed}"
    >
      <div class="modal-container">
        <form @submit.prevent="confirmBook">
          <div class="modal-header">{{$t('BookNow')}}</div>
          <div class="modal-body" :style="{textAlign: $i18n.locale=='ar'? 'right':'left'}">
            <!-- <div class="d-flex"> -->
            <div class="form-group row">
              <label for="inputemail" class="col-sm-2 col-form-label">{{$t('email')}}</label>
              <div class="col-sm-10">
                <input
                  type="email"
                  class="form-control"
                  v-model="bookInfo.email"
                  id="inputemail"
                  :placeholder="$t('email')"
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="inputname" class="col-sm-2 col-form-label">{{$t('name')}}</label>
              <div class="col-sm-10">
                <input
                  type="name"
                  class="form-control"
                  id="inputname"
                  v-model="bookInfo.name"
                  :placeholder="$t('name')"
                />
              </div>
            </div>
            <!-- </div> -->

            <div class="form-group row">
              <label for="inputphone" class="col-sm-2 col-form-label">{{$t('phone')}}</label>
              <div class="col-sm-10">
                <label>
                  <input
                    type="phone"
                    class="form-control"
                    id="inputphone"
                    v-model="bookInfo.phone"
                    :placeholder="$t('phone')"
                  />
                </label>
              </div>
            </div>
            <div class="input-Container">
              <label>{{$t('Comments')}} :
              <textarea rows="5" v-model="bookInfo.comments" class="form-control floating" />
              </label>
            </div>
          </div>
          <div class="model-footer">
            <button class="btn btn-primary" type="submit">{{$t('Confirm')}}</button>
            <a class="btn btn-danger" @click="()=>{modalShowed=false; }">{{$t('close')}}</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  layout: "noForm",
  created() {
    if(process.browser){
      this.baseUrl = window.location.origin + window.location.pathname
    }
  },
  head(){
    return{
      link: [
        {
          rel: "canonical",
          href:  this.baseUrl
        }
      ]
    }
  },
  async asyncData(context) {
    let clincsRes = await context.$axios.get(
      `/api/clinics?lang=${context.app.i18n.locale}`
    );

    return {
      clinics: clincsRes["data"]["clinics"]
    };
  },

  async mounted() {
    let res = await this.$axios
      .get("/api/clinics?all_doctors=true&lang=ar")

      .then(res => {
        this.doctors = res["data"]["data"];
        return this.doctors;
      });
  },
  methods: {
    book(doctorID) {
      this.modalShowed = true;
      this.bookInfo.doctor_id = doctorID;
    },
    async search() {
      var e = document.getElementById("clincDrop");
      console.log(e.options[e.selectedIndex]);
      let selectedClinic = e.options[e.selectedIndex].value;

      let hasClincs = selectedClinic != "-1" ? `clinics=${selectedClinic}&` : "";

      let hasGender = this.genderSelected != this.$t("gender") ? `gender=${this.genderSelected}&` : "";
      let getAll = hasClincs == hasGender ? "all_doctors=true&" : "";
      let DoctorsRes = await this.$axios.get(
        `/api/clinics?${hasClincs}${hasGender}${getAll}lang=${this.$i18n.locale}`
      );
      console.log(DoctorsRes["data"]);
      this.doctors = DoctorsRes["data"]["data"];
    },
    getDoctorsPage(index) {
      return this.doctors.slice(1 * index - 1, 1 * index);
    },
    async confirmBook() {
      await this.$axios.post("/api/booking", {
        ...this.bookInfo
      });
      this.modalShowed = false;
    }
  },
  computed: {
    pageNumber: function() {
      return Math.ceil(this.doctors.length / 1);
    }
  },
  data() {
    return {
      baseUrl:'',
      modalShowed: false,
      bookInfo: {
        email: this.$auth.loggedIn ? this.$auth.user.email : "",
        name: this.$auth.loggedIn ? this.$auth.user.name : "",
        phone: this.$auth.loggedIn ? this.$auth.user.phone : "",
        comments: "",
        doctor_id: ""
      },
      genderSelected: this.$t("gender"),
      selectedDoctor: "",
      doctors: [],
      swiperOption: {
        loop: true,
        slidesPerView: 1,
        initialSlide: 0,
        centeredSlides: true,
        on: {
          slideChange: () => {
            let oldSlide = document.getElementsByClassName("dot-active")[0];
            if (oldSlide != undefined) oldSlide.classList.remove("dot-active");
            let newSlide = document.getElementById(
              "result" + this.mySwiper.realIndex
            );
            if (newSlide != undefined) newSlide.classList.add("dot-active");
          },
          tap() {
            console.log("onTap", this);
          }
        }
      }
    };
  }
};
</script>

<style lang="scss" scoped>
  .workHour{
    list-style: none;
    position: relative;
    padding-right: 1rem;
    &:before{
      content: "";
      position: absolute;
      width: 10px;
      height: 10px;
      display: block;
      right: 0;
      top: 50%;
      transform: translate(-50%,-50%);
      background: #1d4590;
      border-radius: .25rem;
    }
    .day,.start,.end{
      display: inline-block;
      margin: 0 .5rem;
    }
  }
/************************************************************************************ */
/* BOOk-CONTAINER */
/************************************************************************************ */
.result-item{
  width: 90%;
  margin: 0 auto;
}
.hold-all-form{
  border-radius: .5rem;
  box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
  margin-top: 4rem;
  form{
    min-height: 260px;
  }
  .form-heading{
    padding: 2rem 0;
    font-size: 1.5rem;
  }
  .select-item{
    height: 40px;
    border-radius: .5rem;
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
    margin: 2rem auto;
    display: block;
    width: 80%;
    outline: none;
    border: none;
    padding: 0 .5rem;
  }
}
.search-btn{
  padding: .5rem;
  width: 40%;
  margin: 2rem auto;
  border-radius: .5rem;
  box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.2);
  display: block;
  outline: none;
  border: none;
  transition: all ease-in-out .5s;
  &:hover{
    background-color: #ffc77a;

  }
}
.section {
  position: relative;
  padding-top: 6%;
  padding-left: 4%;
}
.img-container {
  position: absolute;
  top: 3%;
  /* right: 6%; */
  height: 47.5vw;
}
.ar-img {
  left: 6% !important;
}
.en-img {
  right: 6% !important;
}
.book-container {
  position: relative;
  background: #ffffff;
  border-radius: 23px;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  height: 38vw;
  width: 46.001%;
  padding-top: 9.5%;
  @media (max-width: 768px) {
    width: 90%;
    height: 100%;
    margin: 0 auto;
  }
}

.select-custom {
  position: absolute;
  width: 100%;
  top: 0;
}
.book-title {
  position: absolute;
  top: 5%;
  left: 5%;
  color: #1d4590;
  font-size: 180%;
}
.select-box {
  position: relative;
  width: 100%;
}

.book-container form {
  padding: 0;
  height: 70%;
  display: flex;
  flex-direction: column;
  width: 70%;
  margin: 0 auto;
  align-items: center;
  justify-content: space-between;
  @media (max-width: 768px) {
    height: 100%;
    width: 100%;
  }
}
.book-container input[type="submit"] {
  align-self: flex-end;
  color: #ffc77a;
  outline: none;
  font-size: 150%;
  border: none;
  width: 30%;
  border-radius: 30px;
  padding-left: 5px;
  padding-right: 5px;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  background-color: #ffffff;
}

.select-custom select {
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  background-color: #ffffff;
  color: #1d4590;
  width: 100%;
  height: 3vw;
  border: none;
  padding: 0 1.5vw;
  cursor: pointer;
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  outline: none;
  border-radius: 10px;
}
.eng-select-custom::after {
  color: #1d4590;
  display: flex;
  justify-content: center;
  align-items: center;
  content: "\25BC";
  border-top-right-radius: 27px;
  border-bottom-right-radius: 27px;
  position: absolute;
  pointer-events: none;
  cursor: pointer;
  font-size: 50%;
  top: 0;
  right: 0;
  width: 12%;
  height: 3vw;
}
.ar-select-custom::after {
  color: #1d4590;
  display: flex;
  justify-content: center;
  align-items: center;
  content: "\25BC";
  border-top-right-radius: 27px;
  border-bottom-right-radius: 27px;
  position: absolute;
  pointer-events: none;
  cursor: pointer;
  font-size: 50%;
  top: 0;
  left: 0;
  width: 12%;
  height: 3vw;
}
/* ********************************************** */
/* Search Result */
/* ********************************************** */

.search-result {
  margin-top: 10rem;
  border-radius: 27px;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.23);
  background-color: #ffffff;
}
.img-avatar {
  width: 160px;
  height: 220px;
  border-radius: .5rem;
  overflow: hidden;
  object-fit: contain;
  border: solid 4px #ffc77a;
  @media (max-width: 768px) {
    margin: 0 auto;
  }
}
.img-avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.space-around {
  width: 100%;
}

.item-desc {
  color: #1d4590;
  margin: 3rem 0;
}
.doctor-name {
  font-size: 190%;
  font-weight: 300;
  line-height: 0.95;
  text-align: right;
  @media (max-width: 768px) {
    text-align: center;
    margin: 1rem 0;
  }
}
.doctor-title {
  font-size: 100%;
  line-height: 1.68;
  font-weight: 300;
  text-align: right;
  margin-top: .5rem;
  @media (max-width: 768px) {
    text-align: center;
    margin: 1rem 0;
  }
}
.doctor-info {
  font-weight: 300;
  font-size: 75%;
  width: 100%;
}
.book-btn {
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  text-transform: capitalize;
  font-weight: 500;
  border-radius: .5rem;
  padding: 1% 7%;
  cursor: pointer;
  width: 50%;
  margin: 0 auto;
  background: #ffc77a;
  color: #fff;
  border: 1px solid transparent;
  transition: all ease-in-out .4s;
  &:hover{
    background-color: transparent;
    border: 1px solid #ffc77a;
    color: #ffc77a;
  }
}
.svg-container {
  height: 35.77vw;
  width: 4vw;
  background: #ffc77a;
  clip-path: polygon(0 0, 0 0, 30% 100%, 0 95%);
  direction: ltr;
}
.ar-svg-container:first-of-type {
  transform: rotateY(180deg);
}

.en-svg-container:last-of-type {
  transform: rotateY(180deg) !important;
}
.form-control {
  min-height: 50px !important;
  font-size: 15px;
}
/************************************************************************************ */
/* PAGINATION */
/************************************************************************************ */
.navigation-container {
  display: flex;
  width: 82%;
  margin: 0 auto;
  direction: ltr;
  justify-content: space-around;
  align-items: center;
}
.hr-divider {
  flex: 8;
  height: 3px;
  border-radius: 50px;
  background: #ffc77a;
}
.pagination-dots {
  flex: 1;
  display: flex;
  justify-content: space-around;
  align-items: center;
}
.dot {
  cursor: pointer;
  height: 5px;
  width: 5px;
  border-radius: 50%;
  background-color: #427be5;
  transition: 0.2s;
}
.dot-active {
  background: #1d4590;
}
.navigation-btns {
  flex: 1;
  display: flex;
  justify-content: space-around;
  align-items: center;
}
.navigation-btn {
  cursor: pointer;
  display: flex;
  width: 2.8vw;
  height: 2.8vw;
  border-radius: 50%;
  justify-content: center;
  align-items: center;
  border: 1px solid #ffc77a;
  color: #1d4590;
  font-size: 150%;
  @media (max-width: 768px) {
    width: 6vw;
    height: 6vw;
  }
}
.swiper-container {
  width: 100%;
}
/********************************* */
/* modalAREA */
/********************************* */

.payment-Modal {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0.55);
  height: 100vh;
  z-index: 99999999;
}

.modal-terms-container {
  width: 80%;
  padding: 2%;
  height: 50vw;
  overflow: scroll;
  background: #ffffff;
  margin: 0 auto;
  margin-top: 0%;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
  font-size: 1rem;
}

.modal-container {
  width: 95%;
  overflow-y: scroll;
  height: 500px;
  padding: 2%;
  background: #ffffff;
  margin: 0 auto;
  margin-top: 5%;
  overflow-y: scroll;
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);

  @media (max-width: 600px) {
    height: 400px;
  }
}

.modal-header {
  font-size: 2rem;
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

/************************************************************************************ */
/* Responsive */
/************************************************************************************ */
@media only screen and (max-width: 400px) {
  .svg-container {
    height: 51vw;
  }
}
@media screen and (min-width: 400px) {
  .svg-container {
    height: 35vw;
  }
}
@media only screen and (max-width: 450px) {
  .pagination-dots {
    flex: 2;
  }
  .navigation-btns {
    flex: 2;
  }
}
@media only screen and (max-width: 500px) {
  .img-container {
    display: none;
  }
}

@media only screen and (min-width: 500px) {
  .svg-container {
    height: 35vw;
  }
}
</style>
