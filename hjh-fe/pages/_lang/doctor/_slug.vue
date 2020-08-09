<template>
  <div class="doctor-container margin-top-mobile" :dir="$i18n.locale == 'ar' ? 'rtl' : 'ltr'">
    <div class="large-card-container">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-12 img-mobile">
            <img :src="doctor.photo" :alt="doctor.image_alt" :title="doctor.image_title" class="doctor-img">
          </div>
          <div class="col-md-8 col-12">
            <div class="row">
              <div class="col-12">
                <h2 class="title">{{ doctor.title }}</h2>
              </div>
              <div class="col-12 doctor-info">
                <div v-html="doctor.description"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import LargeCardImg from "@/components/Doctors/LargeCardImg";
  import DoctorCard from "@/components/Common/DoctorImgCard";
  export default {
    components: {
      DoctorCard,
      LargeCardImg
    },
    data: function () {
      return {
        baseUrl: ''
      }
    },
    created() {
      if(process.browser){
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    head(){
      return{
        title: `${this.doctor.title}`,
        meta:[
          {hid:'description',name:`description`,content:`${this.doctor.meta_description}`},
          {hid:'keywords',name:'keywords',content:`${this.doctor.meta_keywords}`},
          {hid:'og:description',property:`og:description`,content: `${this.doctor.facebook_description}`},
          {hid:'og:image',property:`og:image`,content: `${this.doctor.facebook_image}`},
          {hid:'og:title',property:`og:title`,content: `${this.doctor.facebook_title}`},
          {hid:'twitter:description',name:`twitter:description`,content: `${this.doctor.twitter_description}`},
          {hid:'twitter:image',name:`twitter:image`,content: `${this.doctor.twitter_image}`},
          {hid:'twitter:title',name:`twitter:title`,content: `${this.doctor.twitter_title}`}
        ],
        link: [
          {
            rel: "canonical",
            href: this.baseUrl
          }
        ]
      }
    },
    async asyncData({params, $axios, $i18n, app}) {
      console.log(params);
      var res = await $axios.$get(
        `/api/doctor/${params.slug}?lang=${app.i18n.locale}`
      );
      return {doctor: res["doctor"]};
    }
  };
</script>

<style scoped lang="scss">
  .doctor-img {
    border-radius: .25rem;
    height: 400px;
    object-fit: contain;
    display: block;
    margin: 0 auto;
  }
  .img-mobile{
    @media (max-width: 768px) {
      text-align: center;
    }
  }
  .large-card-container {
    padding-top: 3rem;
    padding-bottom: 2rem;
  }

  .doctor-container {
    color: #1d4590;
  }
  ul {
    padding-top: 1%;
  }

  ul li {
    font-size: 170%;
    margin: 0.5%;
  }

  .doctor-info {
    text-align: right;
  }

  .title {
    font-size: 2.5rem;
    text-align: right;
    position: relative;
    margin-bottom: 2rem;

    &:after {
      content: "";
      display: block;
      width: 40%;
      margin-top: 1rem;
      height: 4px;
      border-radius: .25rem;
      background-color: #ffc77a;
      @media (max-width: 768px) {
        width: 100%;
      }
    }

    @media (max-width: 768px) {
      text-align: center;
    }
  }
</style>
