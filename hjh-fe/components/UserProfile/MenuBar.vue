<template>
    <div>
        <div class="semi-circle-dashed-container">
            <div class="semi-circle-dashed-line">

            </div>
        </div>
        <UserImage :url="url" />
        <div class="setting-container">
             <a :class="[{'active-icon': isEdit}, 'link-container']"><i class="fas fa-image"></i></a>
             <a :class="{'active-icon': isNotifications}"><i class="far fa-bell"></i></a>
             <a href="#"><i></i></a>
             <a href="#"><i></i></a>
             <a :class="{'active-icon': isFavourites}"><i class="fas fa-heart"></i></a>
             <a :class="{'active-icon': isSettings}"><i class="fas fa-cog"></i></a>
            
        </div>
    </div>
</template>
<script>
import userData from '~/dataFile/userProfileData.js'
import UserImage from '@/components/UserProfile/ImageProfile'
export default {
    props:['isFavourites', 'isNotifications', 'isSettings', 'isEdit'],
    components:{
        UserImage
    },
    data(){
        return{
            url:''
        }
    },
    mounted(){
        this.url = userData.profileImageUrl
    }
}
</script>
<style scoped>
    .semi-circle-dashed-container {
        top:-10%;
        left:10%;
        right: 0%;
        height: 110%;
        width: 80%;
        position: absolute;
        z-index: -999;
        
    }
    .semi-circle-dashed-line{
        position: relative;
        border: 2px dashed #ffc77a;
        width: 100%;
        height: 100%;
        bottom: 50%;
        border-radius: 50%;
    }
.setting-container{
    
    display: flex;
    width: 90%;
    margin: 0 auto;
    justify-content: space-between;
    position: relative;
}

.setting-container > a{
    color: #1d4590;
    font-size: 1.5rem;
    cursor: pointer;
}
a:first-child{
    position:relative;
    bottom:495px;
    left:60px;
}
a:nth-child(2){
    position:relative;
    bottom:350px;
    left: -62px;
}
a:nth-child(5){
    position:relative;
    bottom:350px;
    left: 65px;
}
a:nth-child(6){
    position:relative;
    bottom:495px;
    left:-60px;
}
.active-icon > i{
    color: #ffc77a;
}
</style>