<template>
    <div class="container">
        <div class="imageContainer">
            <UserImage :url = "url"/>
            <h2>{{name}}</h2>
        </div>
        <div class="favContainer">
            <FavItem v-for="favItem in favItems"
            :key="favItem.id" 
            :title="favItem.title" 
            :content="favItem.content" 
            :url="favItem.imgUrl"
            :id="favItem.id"
            v-on:removeItem="removeUserFavItem($event)" />
        </div>
    </div>
    
</template>
<script>
import UserImage from '@/components/UserProfile/ImageProfile';
import FavItem from '@/components/UserProfile/FavItem';
import userData from "~/dataFile/userProfileData.js";

export default {
    data(){
        return {
            name:userData.name,
            url:userData.profileImageUrl,
            favItems:userData.favItems
        }
    },
    components:{
        UserImage, FavItem
    },

    mounted(){
        //here we get the user data from an api
        //Also the user datat could be an object and you can import any details from the user object here
        // this.name= userData.name
        // this.url = userData.profileImageUrl,
        // this.favItems= userData.favItems
        
    },
    methods:{
        removeUserFavItem(favItemID){
            this.favItems = this.favItems.filter(item => item.id !== favItemID)
        }
    }
}
</script>

<style scoped>
.container{
    display: flex;
    flex-direction: column
}
.favContainer{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

</style>