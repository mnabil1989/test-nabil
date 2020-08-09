<template>
  <div class="doctor-container margin-top-mobile" :dir="$i18n.locale == 'ar' ? 'rtl' : 'ltr'">
    <div class="large-card-container">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-12 img-mobile">
            <img :src="serviceData.photo" alt="doctor" class="doctor-img" :alt="serviceData.image_alt" :title="serviceData.image_title">
          </div>
          <div class="col-md-8 col-12">
            <div class="row">
              <div class="col-12">
                <h2 class="title">{{ serviceData.name }}</h2>
              </div>
              <div class="col-12 doctor-info">
                <div v-html="serviceData.description"></div>
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
  import doctorsData from "~/dataFile/doctorsData.js";

  export default {
    components: {
      DoctorCard,
      LargeCardImg
    },
    created() {
      console.log("this.serviceData")
      console.log(this.serviceData)
      if(process.browser){
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    head(){
      return{
        title: `${this.serviceData.name}`,
        meta:[
          {hid:'description',name:'description',content:`${this.serviceData.meta_description}`},
          {hid:'keywords',name:'keywords',content:`${this.serviceData.meta_keywords}`},
          {hid:'og:description',property:`og:description`,content: `${this.serviceData.facebook_description}`},
          {hid:'og:image',property:`og:image`,content: `${this.serviceData.facebook_image}`},
          {hid:'og:title',property:`og:title`,content: `${this.serviceData.facebook_title}`},
          {hid:'twitter:description',name:`twitter:description`,content: `${this.serviceData.twitter_description}`},
          {hid:'twitter:image',name:`twitter:image`,content: `${this.serviceData.twitter_image}`},
          {hid:'twitter:title',name:`twitter:title`,content: `${this.serviceData.twitter_title}`}
        ],
        link: [
          {
            rel: "canonical",
            href: this.baseUrl
          }
        ]
      }
    },
    data() {
      return {
        baseUrl:''
      }
    },

    asyncData({params, $axios, $i18n, app}) {
      console.log(params);
      return $axios.$get(`/api/service/${params.slug}?lang=${app.i18n.locale}`).then(res => {
        console.log("data fdfdf");
        console.log(res.service)
        // this.forSeo = res.service;
        return {serviceData: res.service};
      }).catch(e => console.log(e));


    }
  };
</script>

<style scoped lang="scss">
  .doctor-img {
    border-radius: .25rem;
  }

  .img-mobile {
    img {
      width: 100%;
      height: 320px;
      object-fit: contain;
    }
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

  .exp-text {
    font-size: 170%;
    font-weight: 500;
    line-height: 2.2;
    text-align: center;
  }

  .awards-title {
    margin-top: 5%;
    width: 20%;
    line-height: 2.2;
    font-size: 170%;
  }

  .item-bullet {
    height: 1.66vw;
    background: #1d4590;
    border-radius: 50%;
    width: 1.66vw;
    margin: 0 2%;
  }

  ul {
    padding-top: 1%;
  }

  ul li {
    font-size: 170%;
    margin: 0.5%;
  }

  .types-title {
    font-size: 170%;
    line-height: 2.2;
    width: 30%;
  }

  .doctor-info {

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
