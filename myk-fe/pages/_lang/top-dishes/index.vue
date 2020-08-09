<template>
  <div class="news-page">
    <div class="container">
      <div class="row">
        <Closing></Closing>
        <div class="col-12 d-flex justify-content-center align-items-center">
          <div class="row">
            <HeadingPage :heading="$t('top dishes')" :sub-title="''"></HeadingPage>
          </div>
        </div>
        <div class="col-12">
          <TopDish :topDishes=topDishes></TopDish>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Closing from "@/components/Closing";
  import HeadingPage from "@/components/HeadingPage";
  import TopDish from "@/components/TopDish";
  export default {
    name: "index",
    layout: "main-layout",
    components:{TopDish, Closing,HeadingPage},
    mounted() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    },
    asyncData(context){
      return context.$axios.get(`/api/top-dishes?lang=${context.app.i18n.locale}`).then(res =>{
        return {topDishes : res.data.home.topDishes.map( obj => ({...obj, showParagraph: false}))};
      }).catch(e =>{
      })
    }
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  $opacity-color: rgba(0, 97, 159, 0.25);
  .news-page{
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("../../../assets/images/contact.png");
    background-size: cover;
    background-position: 50% 0;
    padding: 7rem 0;
    padding-bottom: 18rem;
  }

</style>
