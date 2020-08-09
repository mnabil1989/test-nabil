<template>
  <div class="social-links"
       :class="{'fullWidth' : isFullWidth,'profile-link-style':isStyleProfile,'main-style':mainStyle}">
    <a :href="siteType === 'bistro'?'https://twitter.com/mykonos_sa?lang=ar':'https://twitter.com/kidsmykonos'"><img src="../assets/images/twitter.png" alt="twitter" class="social-icon"></a>
    <a :href="siteType === 'bistro'?'https://www.facebook.com/Mykonos.sa/':'https://www.facebook.com/Mykonos.Kids/'"><img src="../assets/images/face.png" alt="face" class="social-icon"></a>
    <a :href="siteType === 'bistro'?'https://www.instagram.com/mykonos.sa/':'https://www.instagram.com/mykonos.kids/'"><img src="../assets/images/insta.png" alt="insta" class="social-icon"></a>
    <a :href="siteType === 'bistro'?'https://www.youtube.com/channel/UCMSb2uc3zgB8SmxdPbQbwlQ':'https://www.youtube.com/channel/UCMSb2uc3zgB8SmxdPbQbwlQ'"><img src="../assets/images/youtube.png" alt="youtube" class="social-icon"></a>
    <button class="feed-back-button" @click="feedBackTo"><img src="../assets/images/feedback.png" alt="whats"></button>
  </div>
</template>

<script>
  import {mapGetters} from "vuex";
  export default {
    name: "SocialLinks",
    props: {
      isFullWidth: {
        type: Boolean,
        default: false
      },
      isStyleProfile: {
        type: Boolean,
        default: false
      },
      mainStyle: {
        type: Boolean,
        default: false
      }
    },
    computed:{
      ...mapGetters(['siteType'])
    },
    methods:{
      feedBackTo(){
        if (this.$auth.loggedIn){
          this.$router.push(this.localePath('/feed-back'))
        } else {
          this.$router.push(this.localePath('/login'))
        }
      }
    }
  }
</script>

<style lang="scss" scoped>
  $main-color: #bb8f32;
  .fullWidth {
    width: 100% !important;
    height: 60% !important;

    .social-icon {
      height: 35px !important;
    }
  }

  .social-links {
    margin: 1rem auto;
    width: 40%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    a,.feed-back-button{
      transition: all ease-in-out .4s;
      outline: none;
      display: flex;
      height: 60px;
      width: 60px;
      margin: 5px auto;
      background: transparent;
      justify-content: center;
      align-items: center;
      border: 1px solid transparent;
      border-radius: 50%;
    }
    @media (max-width: 425px) {
      width: 80%;
    }
    .social-icon {
      height: 26px;
    }
  }

  .profile-link-style {
    width: 75% !important;
    margin: 3rem auto !important;

    img {
      height: 30px;
    }
  }
  .feed-back-button{
    transition: all ease-in-out .4s;
    display: flex;
    height: 60px;
    width: 60px;
    margin: 5px auto;
    background: transparent;
    justify-content: center;
    align-items: center;
    border: 1px solid transparent;
    border-radius: 50%;
    padding: 0;
  }
  .main-style {
    display: block;
    width: 5%;
    text-align: center;
    top: 50%;
    position: fixed;
    right: 0;
    transform:  translate(-50%,-50%);
    z-index: 32;
    a {
      /*display: block;*/
      margin: 0 auto;
      img{
        height: 30px !important;
      }
    }
  }

  .with-background a,.with-background .feed-back-button{
    display: flex;
    height: 60px;
    width: 60px;
    margin: 5px auto;
    background: #fff;
    justify-content: center;
    align-items: center;
    border: 1px solid $main-color;
    border-radius: 50%;
    transition: all ease-in-out .4s;
  }
  .footer {
    .social-links{
      a{
        background: transparent !important;
        border: none !important;
      }
    }
    .feed-back-button{
      border: none;
      display: none;
      @media (max-width: 992px) {
        display: flex;
      }
    }
  }
  .kidFooter{
    .feed-back-button{
      border: none;
      background-color: transparent;
    }
  }
  .form{
    .social-links{
      button{
        display: none;
      }
    }
  }
</style>
