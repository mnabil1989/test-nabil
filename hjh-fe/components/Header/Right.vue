<template>
  <div class="right-menu">
    <div @click="$router.push(localePath('/home'))" class="center">
      <img src="@/assets/img/logo-header.webp" alt="logo-andalusia" class="logo"/>
    </div>
    <div v-if="$auth.loggedIn" class="profile-container center">
      <div
        class="profile"
        :style="{
          backgroundImage: `url(${$auth.user.avatar}), url('https://cdn2.atlantamagazine.com/wp-content/uploads/sites/4/2019/06/0719_TopDoctors2019MichaelQuinones_BenRollins_oneuseonly.jpg')`
        }"
      >
        <div class="dropdown-content">
          <nuxt-link :to="localePath('/profile')">{{$t('profile')}}</nuxt-link>
          <!-- <a href="#">{{$t('notification')}}</a> -->
          <a class="last-item" @click="logout()">{{$t('logout')}}</a>
        </div>
      </div>
    </div>
    <div v-else class="profile-container center">
      <div>
        <nuxt-link :to="localePath('/auth/login')" class="login">{{$t('login')}}</nuxt-link>
      </div>
    </div>
    <!-- <div class="search center">
      <i class="fa fa-search"></i>
    </div>-->
  </div>
</template>

<script>
export default {
  mounted() {
    document.addEventListener("click", () => {
      this.ProfileHoverd = true;
    });
  },
  data() {
    return {
      ProfileHoverd: false
    };
  },

  methods: {
    logout() {
      this.$auth.logout().then(() => {
        this.$router.push(this.localePath("/"));
      });
    },

    showDropDown() {
      this.ProfileHoverd = !this.ProfileHoverd;
      event.stopPropagation();
    }
  }
};
</script>

<style scoped lang="scss">
.right-menu {
  display: grid;
  grid-template-columns: 1fr 1fr;
  justify-items: center;
  align-items: stretch;
}

.logo {
  cursor: pointer;
  height: 100%;
  width: 185px;
  padding: 10px;
  /*background-image: url("https://alborsaanews.com/app/uploads/2016/07/1468329684_762_86406_-512x435.png");*/
  background-size: cover;
  img{
    height: 54px;
  }
}
.profile-container {
  position: relative;
  transition: all ease-in-out .4s;
  &:hover{
    .dropdown-content{
      opacity: 1;
    }
  }
}
.profile {
  height: 3vw;
  width: 3vw;
  background-image: url("https://cdn2.atlantamagazine.com/wp-content/uploads/sites/4/2019/06/0719_TopDoctors2019MichaelQuinones_BenRollins_oneuseonly.jpg");
  background-size: cover;
  background-position: 100%;
  border-radius: 50%;
  cursor: pointer;
  border: 1px solid #ffffff;
}
.dropdown-content {
  bottom: -9.2vw;
}
.dropdown-content a {
  color: #003580;
  width: 90%;
  margin: 0 auto;
  text-align: center;
  padding: 12% 16px;
  text-decoration: none;
  border-bottom: 1px solid #f5ae48;
  display: block;
}
.last-item {
  padding-bottom: 20% !important;
  border-bottom: none !important;

  text-decoration: none;
}
.dropdown-content a:hover {
  color: #f5ae48;
}
.show {
  display: block;
}
.login {
  font-size: 100%;
  text-decoration: none;
  color: #003580;
}
.search {
  color: #003580;
  font-size: 150%;
}
.profile-container:hover .dropdown-content {
  display: block;
}
@media only screen and (max-width: 850px) {
  .right-menu {
    grid-template-columns: 1fr;
    font-size: 14px;
    text-align: center;
  }
  .profile {
    width: 10vw;
    height: 10vw;
  }
  .dropdown-content {
    width: 40vw;
    left: 6% !important;
    bottom: -30vw !important;
    right: auto;
  }
}
</style>
