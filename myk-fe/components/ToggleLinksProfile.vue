<template>
    <div>
      <ul class="profile-link">
        <nuxt-link :to="localePath('/')">{{$t('home')}}</nuxt-link>
        <nuxt-link :to="localePath('/edit-profile')">{{$t('my profile')}}</nuxt-link>
<!--        <nuxt-link :to="localePath('/profile')">favorite</nuxt-link>-->
        <li @click="$auth.logout()">{{$t('sign out')}}</li>
<!--        <nuxt-link :to="localePath('/blog')">blog</nuxt-link>-->
      </ul>
    </div>
</template>

<script>
    export default {
        name: "ToggleLinksProfile"
    }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .profile-link{
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 3rem;
    li,a{
      color: $main-color;
      display: block;
      text-align: center;
      text-decoration: none;
      font-size: 1.5rem;
      text-transform: capitalize;
      cursor: pointer;
      transition: all linear .3s;
      &:hover{
        color: #000;
      }
      @media (max-width: 800px) {
        font-size: 1rem;
      }
      @media (max-width: 545px) {
        text-align: center;
        margin: .5rem 0;
      }
    }
    @media (max-width: 545px) {
      display: block;
    }
  }
  html:lang(ar){
    .profile-link {
      display: flex;
      justify-content: space-around;
      align-items: center;
      margin-top: 3rem;
      li, a {
        font-family: myFirstFont
      }
    }
  }
</style>
