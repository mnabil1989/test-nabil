<template>
  <div class="margin-top-mobile">
    <slider/>
    <OurServices/>
    <Clincs/>
    <HealthInfo/>

<!--    <Comments class="d-none" :comments="comments"/>-->
  </div>
</template>

<script>
  import Offers from "../../../components/Sections/Offers";
  import Clincs from "../../../components/Sections/Clincs";
  import slider from "../../../components/Sections/slider";
  import OurServices from "../../../components/Sections/OurServices";
  import HealthInfo from "../../../components/Sections/HealthInfo";
  import {mapGetters, mapActions} from "vuex";
  import axios from "axios";

  export default {
    components: {Offers, Clincs, slider, OurServices, HealthInfo},
    layout: "noForm",
    head() {
      return{
        title:`${this.homeSeo.seo.title_meta.Title_Template}`,
        meta:[
          {hid:'description',name:`description`,content:`${this.homeSeo.seo.title_meta.Meta_Description_Template}`},
          {hid:'keywords',name:'keywords',content:`${this.homeSeo.seo.title_meta.meta_keywords}`},
          {hid:'og:description',property:`og:description`,content: `${this.homeSeo.seo.open_graph.description}`},
          {hid:'og:image',property:`og:image`,content: `${this.homeSeo.seo.open_graph.image}`},
          {hid:'og:title',property:`og:title`,content: `${this.homeSeo.seo.open_graph.title}`},
          {hid:'twitter:description',name:`twitter:description`,content: `${this.homeSeo.seo.twitter_card.description}`},
          {hid:'twitter:image',name:`twitter:image`,content: `${this.homeSeo.seo.twitter_card.image}`},
          {hid:'twitter:title',name:`twitter:title`,content: `${this.homeSeo.seo.twitter_card.title}`}
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
        baseUrl:"",
      }
    },
    created() {
      if(process.browser){
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    async fetch({store, app}){
      await store.dispatch('home/setHome',app.i18n.locale)
    },
    computed:{
      ...mapGetters({ homeSeo: "home/getHome" }),
    },
    methods: {
      ...mapActions({setHome: "home/setHome"})
    },
  };
</script>
