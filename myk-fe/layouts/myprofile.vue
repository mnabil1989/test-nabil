<template>
  <div>
    <div class="profile-heading">
      <AltHeader :isProfileHeader="true" :is-hidden="true"></AltHeader>
    </div>
    <nuxt/>
    <MainFooter v-if="this.$store.state.siteType == 'bistro'"></MainFooter>
    <KidFooter v-else></KidFooter>
  </div>
</template>

<script>
  import AltHeader from "../components/AltHeader";
  import MainFooter from "../components/MainFooter";
  import ImageProfile from "../components/ImageProfile";
  import ToggleLinksProfile from "../components/ToggleLinksProfile";
  import SocialLinks from "../components/SocialLinks";
  import KidFooter from "../components/KidFooter";

  export default {
    name: "myprofile",
    // middleware: 'auth',
    components: {SocialLinks, ToggleLinksProfile, ImageProfile, AltHeader, MainFooter, KidFooter}
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .profile-heading {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
    url("../assets/images/profile-header.png");
    background-size: cover;
    background-position: 50% 0;
  }

  .profile-links {
    position: relative;

    &:before {
      content: "";
      display: block;
      width: 100%;
      height: 2px;
      background: $main-color;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
    }
  }
</style>
