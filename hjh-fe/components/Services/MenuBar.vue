<template>
    <div>
        <div class="semi-circle-dashed-container">
            <div class="semi-circle-dashed-line">
                
            </div>
        </div>
        <UserImage :url="url" />
        <section class="dots-container">
            <div class="single-dot">
            </div>
            <div class="single-dot">
            </div>
            <div class="single-dot">
            </div>
            <div class="single-dot">
            </div>
            <div class="single-dot">
            </div>
            <div class="single-dot">
            </div>
        </section>
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
        left:15%;
        right: 15%;
        height: 90%;
        width: 70%;
        position: absolute;
        z-index: -999;
    }
    .semi-circle-dashed-line{
        position: relative;
        border: 1.5px solid #ffc77a;
        width: 100%;
        height: 140%;
        bottom: 50%;
        border-radius: 50%;
    }
.dots-container{
    display: flex;
    width: 70%;
    margin: 0 auto;
    justify-content: space-between;
    position: relative;
}

.dots-container > .single-dot{
    background-color: #1d4590;
    height: 12px;
    width: 12px;
    border-radius:50%;
}
.single-dot:first-child{
    position:relative;
    bottom:22.5rem;
}
.single-dot:nth-child(2){
    position:relative;
    bottom:11.85rem;
}
.single-dot:nth-child(5){
    position:relative;
    bottom:11.85rem;
}
.single-dot:nth-child(6){
    position:relative;
    bottom:22.5rem;
}

.single-dot:nth-child(3){
    background-color:white;
}
.single-dot:nth-child(4){
    background-color:white;
}
</style>