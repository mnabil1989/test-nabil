<template>
  <div v-if="this.$store.state.siteType == 'bistro'">
    <div class="profile-links">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 text-center">
            <ImageProfile></ImageProfile>
          </div>
          <div class="col-md-5">
            <ToggleLinksProfile></ToggleLinksProfile>
          </div>
          <div class="col-md-4">
            <social-links :isStyleProfile=true></social-links>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <FavoriteDish v-for="f_dish in favoritePosts" :key="f_dish" :favDish="f_dish"></FavoriteDish>
      </div>
    </div>
  </div>
  <div v-else class="kids-favorite">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="profile-setting">
            <div class="logo">
              <div class="text-center">
                <img src="../../../assets/images/login-form.png" class="img-fluid img-header">
              </div>
            </div>
            <div class="kids-image-profile">
              <ImageProfile></ImageProfile>
            </div>
            <ul>
              <li>
                <nuxt-link :to="localePath('/profile/edit-profile')">my profile</nuxt-link>
              </li>
              <li>
                <nuxt-link :to="localePath('/profile')">my favorite</nuxt-link>
              </li>
              <li>
                <a @click="$auth.logout()">sign out</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-8 col-12 my-5">
          <FavoriteDish v-for="f_dish in favoritePosts" :key="f_dish" :favDish="f_dish"></FavoriteDish>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  import ImageProfile from "@/components/ImageProfile";
  import ToggleLinksProfile from "@/components/ToggleLinksProfile";
  import SocialLinks from "@/components/SocialLinks";
  import FavoriteDish from "@/components/FavoriteDish";
  import axios from "axios";

  export default {
    name: "favorite",
    layout: "myprofile",
    components: {FavoriteDish, SocialLinks, ToggleLinksProfile, ImageProfile},
    data() {
      return {
        favoritePosts: [],
        token: ''
      }
    },
    computed: {
      siteType() {
        return this.$store.state.siteType;
      }
    },
    mounted() {
      this.token = localStorage.getItem('auth._token.local');
      axios.get(`/api/user-favorite-posts?lang=${this.$store.state.lang}`, {headers: {Authorization: this.token}}).then(response => {
        this.favoritePosts = response.data.posts;
      }).catch(error => {
      });
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  $kids-color: #f27a25;
  .profile-heading {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
    url("../../../assets/images/profile-header.png");
    background-size: cover;
    background-position: 50% 0;
  }

  .profile-links {
    position: relative;
    margin-bottom: 3rem;

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

  .kids-favorite {
    background-color: #E6F0F6;
  }

  .profile-setting {
    background-color: #fff;

    .kids-image-profile {
      text-align: center;
    }

    ul {
      li {
        text-align: center;
        margin: 1rem 0;

        a {
          color: $kids-color;
          font-size: 1.5rem;
          text-transform: capitalize;
          text-decoration: none;
          transition: all linear .3s;
          cursor: pointer;

          &:hover {
            color: #000;
          }
        }
      }
    }
  }
</style>
