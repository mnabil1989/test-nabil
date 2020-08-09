<template>
  <div class="container margin-top-mobile">
    <section>
      <div class="slider-container">
        <div v-swiper:mySwiper="swiperOption">
          <div class="swiper-wrapper">
            <img
              v-for="(item, index) in serviceList"
              class="swiper-slide"
              :key="index"
              :src="item.photo"
              :alt="item.image_alt"
              :title="item.image_title"
            />
          </div>
        </div>
        <div @click="mySwiper.slideNext()" class="nav-btn left">
          <i class="fa fa-arrow-left"></i>
        </div>
        <div @click="mySwiper.slidePrev()" class="nav-btn right">
          <i class="fa fa-arrow-right"></i>
        </div>
      </div>
    </section>
    <div class="service-list-container">
      <ul>
        <!-- {{
        serviceList }}-->
        <ServiceListItem
          v-for="listItem in serviceList"
          :key="listItem.slug"
          :title="listItem.name"
          :linkTo="listItem.slug"
          :content="listItem.small_description"
        />
      </ul>
    </div>
  </div>
</template>

<script>
  import ServiceListItem from "@/components/Services/ServiceListItem";
  import MenuBar from "@/components/Services/MenuBar";
  import { mapGetters, mapActions } from "vuex";

  export default {
    components: {
      ServiceListItem,
      MenuBar
    },
    created() {
      console.log("this.metaService");
      console.log(this.metaService);
      if(process.browser){
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    head() {
      return{
        title: `${this.metaService.meta_title}`,
        meta:[
          {hid:'description',name:'description',content:`${this.metaService.meta_description}`},
          {hid:'keywords',name:'keywords',content:`${this.metaService.meta_keywords}`},
          {hid:'og:description',property:`og:description`,content: `${this.openGraph.open_graph_description}`},
          {hid:'og:image',property:`og:image`,content: `${this.openGraph.open_graph_image}`},
          {hid:'og:title',property:`og:title`,content: `${this.openGraph.open_graph_title}`},
          {hid:'twitter:description',name:`twitter:description`,content: `${this.Twitter.twitter_card_description}`},
          {hid:'twitter:image',name:`twitter:image`,content: `${this.Twitter.twitter_card_image}`},
          {hid:'twitter:title',name:`twitter:title`,content: `${this.Twitter.twitter_card_title}`}
        ],
        link: [
          {
            rel: "canonical",
            href: this.baseUrl
          }
        ]
      }
    },

    data: function() {
      return {
        baseUrl: '',
        swiperOption: {
          slidesPerView: 1,
          initialSlide: 0,
          speed: 800,
          loop: true,
          autoplay: {
            delay: 4000,
          },
          effect:'coverflow',
          coverflowEffect: {
            rotate: 30,
            slideShadows: false,
          }
        }
      };
    },
    methods: {
      ...mapActions({ setServices: "services/setservices" })
    },
    async fetch({store, app}){
      await store.dispatch('services/setservices',app.i18n.locale)
    },
    computed: {
      ...mapGetters({ serviceList: "services/getservices" ,
        metaService: 'services/getServiceMeta',
        openGraph: 'services/getServiceOpenGraph',
        Twitter: 'services/getServiceTwitter',
      })
    }
  };
</script>

<style scoped>
  .slider-container {
    width: 100%;
    position: relative;
    margin: 3% auto;
    margin-bottom: 10%;
    height: 40vw;
  }
  .swiper-container {
    height: 100%;
  }
  .slider-container img {
    width: 100%;
    height: 100%;
  }
  .nav-btn {
    cursor: pointer;
    position: absolute;
    top: 46%;
    color: #1d4590;
    background: white;
    border: 1px solid #1d4590;
    padding: 1% 1.5%;
    z-index: 999999;
    transition: 0.4s;
  }
  .nav-btn:hover {
    color: white;
    background: #1d4590;
  }
  .nav-btn.left {
    left: -2.4%;
  }
  .nav-btn.right {
    right: -2.4%;
  }
</style>
