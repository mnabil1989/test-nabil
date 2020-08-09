<template>
  <div class="doctor-container margin-top-mobile" :dir="$i18n.locale == 'ar' ? 'rtl' : 'ltr'">
    <div class="large-card-container">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-12 img-mobile">
            <img :src="clinicData.photo" :title="clinicData.image_title" :alt="clinicData.image_alt" class="doctor-img">
          </div>
          <div class="col-md-8 col-12">
            <div class="row">
              <div class="col-12">
                <h2 class="title">{{ clinicData.name }}</h2>
              </div>
              <div class="col-12 doctor-info">
                <div v-html="clinicData.description"></div>
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
    created() {
      if(process.browser){
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    head(){
      return{
        title: `${this.clinicData.name}`,
        meta:[
          {hid:'description',name:'description',content:`${this.clinicData.meta_description}`},
          {hid:'keywords',name:'keywords',content:`${this.clinicData.meta_keywords}`},
          {hid:'og:description',property:`og:description`,content: `${this.clinicData.facebook_description}`},
          {hid:'og:image',property:`og:image`,content: `${this.clinicData.facebook_image}`},
          {hid:'og:title',property:`og:title`,content: `${this.clinicData.facebook_title}`},
          {hid:'twitter:description',name:`twitter:description`,content: `${this.clinicData.twitter_description}`},
          {hid:'twitter:image',name:`twitter:image`,content: `${this.clinicData.twitter_image}`},
          {hid:'twitter:title',name:`twitter:title`,content: `${this.clinicData.twitter_title}`}
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
        baseUrl:'',
        clinicData: {}
      }
    },

    asyncData({params, $axios, app}) {
      console.log(params);
      return $axios.$get(`/api/clinic/${params.slug}?lang=${app.i18n.locale}`).then(res => {
        return {clinicData: res.clinic};
      }).catch(e =>{});


    }
  };
</script>

<style scoped lang="scss">
  .doctor-img {
    border-radius: .25rem;
  }

  .img-mobile {
    margin-bottom: 2rem;
    img {
      border-radius: .25rem;
      width: 100%;
      height: 100%;
      max-height: 280px;
      object-fit: cover;
      display: block;
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
