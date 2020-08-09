<template>
  <div class="menu-page">
    <div class="container">
      <div class="row">
        <Closing></Closing>
        <div class="col-12 d-flex justify-content-center align-items-center">
          <div class="row">
            <HeadingPage :heading="$t('menu')" :sub-title="$t('What\'s cooking')"></HeadingPage>
          </div>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center">
          <i class="fas fa-utensils icon"></i>
        </div>
        <span class="line"></span>
        <div class="col-12">
          <div>
            <TabsMenu :menuWithType="menu"></TabsMenu>
          </div>
        </div>
        <div class="col-12">
          <SpecialDish :home="home"></SpecialDish>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Closing from "@/components/Closing";
  import HeadingPage from "@/components/HeadingPage";
  import TabsMenu from "@/components/TabsMenu";
  import SpecialDish from "@/components/SpecialDish";
  import {mapGetters} from "vuex";
  import axios from "axios";
  export default {
    name: "index",
    components: {SpecialDish, TabsMenu, Closing,HeadingPage},
    layout: "main-layout",
    async asyncData(context) {
      let Menu =  await context.$axios.get(`/api/menu-categories?lang=${context.app.i18n.locale}`);
      let Home =  await context.$axios.get(`/api/home?lang=${context.app.i18n.locale}`);
      context.store.state.menu = Menu.data.menu;
      console.log(Menu.data);
      return {
        menu : Menu.data,
        home : Home.data.home
      }
    },
    computed: {
      // ...mapGetters(['home'])
    },
    mounted() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  }
</script>

<style lang="scss" scoped>
  $main-color: #bb8f32;
  $opacity-color: rgba(0, 97, 159, 0.25);
  $main-font: 'Poppins';
  .menu-page {
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("../../../assets/images/contact.png");
    background-size: cover;
    background-position: 50% 0;
    padding-top: 7rem;
    .icon{
      font-size: 3rem;
      margin-bottom: 2rem;
    }
  }
  .line{
    display: block;
    width: 100%;
    height: 1px;
    background: $main-color ;
    margin: .5rem 0;
  }
</style>
