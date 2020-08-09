<template>
  <div class="body-container">
    <Header />
    <nuxt />
    <Footer />
  </div>
</template>
<script>
import Header from "@/components/Header";
import Footer from "@/components/Footer";
import contactUs from "@/components/Sections/contatctUs";
import { mapGetters, mapMutations, mapActions } from "vuex";
export default {
  created() {
    this.setHome(this.$i18n.locale);
  },
  components: {
    Header,
    contactUs,
    Footer
  },
  head(context) {
    return {
      htmlAttrs: {
        lang: this.$i18n.locale,
        dir: this.$i18n.locale == "ar" ? "rtl" : "ltr"
      }
    };
  },

  methods: {
    ...mapActions({ setHome: "home/setHome" })
  }
};
</script>
<style scoped>
.body-container {
  background-image: url("../assets/img/body.png");
  background-repeat: no-repeat;
  background-position: 50% -90px;
  background-size: 240vw;
}
</style>
