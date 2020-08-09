<template>
  <div class="booking-page">
    <div class="container">
      <div class="row">
        <Closing></Closing>
      </div>
      <div class="row">
        <HeadingPage :heading="'Book Now'" :sub-title="'Our whereabouts'"></HeadingPage>
      </div>
      <BookPost></BookPost>

    </div>
  </div>
</template>

<script>
  import Closing from "../../components/Closing";
  import HeadingPage from "../../components/HeadingPage";
  import BookPost from "../../components/BookPost";

  export default {
    name: "index",
    layout: "main-layout",
    components: {BookPost, Closing, HeadingPage},
    mounted() {
      window.scrollTo({top: 0, behavior: "smooth"})
    }
  }
</script>

<style scoped lang="scss">
  .booking-page {
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("../../assets/images/contact.png");
    background-size: cover;
    background-position: 50% 0;
    padding-top: 7rem;
  }
</style>
