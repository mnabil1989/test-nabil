<template>
  <div class="terms">
    <!-- Breadcrumb -->
    <breadcrumb :link-to="'Home'" :current-page="'Terms and Conditions'"></breadcrumb>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="terms-content" v-html="$i18n.locale === 'ar'? terms.terms_ar : terms.terms">
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /Page Content -->
  </div>
</template>

<script>
  import Breadcrumb from "../../../../components/breadcrumb";
  export default {
    name: "index",
    components: {Breadcrumb},
    head(){
      return{
        title: "Andalusia Dot Care | Terms",
        link: [
          {
            rel: "stylesheet",
            href: `/${this.style}.css`
          }
        ],
        meta: [{ name: 'theme-color', content: `${this.themeColor}` }]
      }
    },
    data() {
      return {
        style:'hjh',
        themeColor: '#1D6EBF',
        terms: "<h2>put url only , remove this message from data()</h2>"
      }
    },
    asyncData(context) {
      return context.$axios.get(`/${context.params.bu}-api/settings`).then(response => {
        console.log(response.data);
        return {terms: response.data.settings}
      }).catch(e => console.log(e))
    },
    created() {
      if (this.$route.params.bu === "hjh") {
        this.style = "hjh";
        this.themeColor = '#1D6EBF'
      } else if (this.$route.params.bu === "apc") {
        this.style = "apc";
        this.themeColor = '#0066B4'
      } else if (this.$route.params.bu === "akw") {
        this.style = "akw";
        this.themeColor = '#63C7C9'
      } else if (this.$route.params.bu === "adc") {
        this.style = "adc";
        this.themeColor = '#23692B'
      }
    }
  }
</script>

<style scoped lang="scss">
  .terms-content{
    padding: 15px;
  }
  html:lang(ar) {
    .terms {
      direction: rtl;
      text-align: right;
    }
  }
</style>
