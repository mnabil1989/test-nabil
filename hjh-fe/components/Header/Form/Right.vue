<template>
    <div>
      <ul class="nav nav-justified" dir="ltr">
        <li class="nav-item">
          <a class="nav-link mt-2" href="#">
           <span> تسجيل الدخول</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <img :src="googlePlaySrc" 
                    alt="google-play" 
                    class="play-image">
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <img :src="appStoreSrc" 
                    alt="app-store" 
                    class="app-store-image">
          </a>
        </li>
        
      </ul>
                                      <!-- Search Box  -->
      
    </div>
</template>

<script>
import UserImage from '@/components/UserProfile/ImageProfile';
export default {
    components:{UserImage},
    data: function(){
        return {
            googlePlaySrc:'http://media.alwasatnews.com/data/2016/5170/images/9c5a0afb6467d940.png',
            appStoreSrc:"https://visitick.com/images/store/appstore.png"
        }
    }
}
</script>

<style scoped>
    ul > li > a{
        font-size: 0.8rem;
        font-weight: 600;
        color:#008ed3;
    }
    ul > li > a> img{
        width:110%;
    }
    a > span:hover{
        color: #ffc77a;
    }
</style>

