<template>
  <div>
    <div class="header-intro">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 col-5 app-social">
            <a href="#" class="app"><img src="../assets/images/app.png"></a>
            <a href="#" class="play"><img src="../assets/images/play.png"></a>
            <nuxt-link :to="localePath('/login')" class="sign-in-intro">{{$t('sign in')}}</nuxt-link>
          </div>
          <div class="col-md-4 col-7">
            <div class="lang">
              <span class="phone"><i class="fas fa-phone"></i>  00201066269735 </span>
              <a  @click="changeLang('ar')" v-if="this.$i18n.locale != 'ar'"><i class="fas fa-globe"></i> العربيه </a>
              <a @click="changeLang('en')" v-else><i class="fas fa-globe"></i> en</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nuxt/>
  </div>
</template>

<script>
  export default {
    name: "intro",
    head(context) {
      return {
        htmlAttrs: {
          lang: this.$i18n.locale,
          dir: this.$i18n.locale == 'ar' ? 'rtl' : 'ltr'
        },
      }
    },
    methods:{
      changeLang(lang){
        this.$i18n.setLocale(lang);
      }
    }
  }
</script>

<style scoped lang="scss">
  @import "assets/css/shared";
  @import "assets/css/variable";
  .play,.app{
    @media (max-width: 600px) {
      display: none !important;
    }
  }
</style>
