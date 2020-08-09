<template>
    <div>
        <div class="menu-bar-container">
            <!-- this containes both image profile and menu bar -->
            <MenuBar 
            :isFavourites="true"/>
            <h1>{{name}}</h1>
        </div>
        <h2>المفضلة</h2>
        <div class="favourites-container">
            <div v-for="favItem in favItems"
                    :key="favItem.id"
                    class="col-lg-5 fav-item-container">
                <FavItem 
                    :title="favItem.title" 
                    :content="favItem.content" 
                    :url="favItem.imgUrl"
                    :id="favItem.id"
                    v-on:removeItem="removeUserFavItem($event)" />
            </div>
        </div>
    </div>
</template>

<script>
import MenuBar from '@/components/UserProfile/MenuBar'
import FavItem from '@/components/UserProfile/FavItem'
import userData from "~/dataFile/userProfileData.js";

export default {
    components:{
         MenuBar, FavItem
    },
    data: function(){
        return {
            name:userData.name,
            url:userData.profileImageUrl,
            favItems:userData.favItems
        }
    },
    methods:{
        removeUserFavItem(favItemID){
            this.favItems = this.favItems.filter(item => item.id !== favItemID)
        },
    },
}
</script>

<style>
    .menu-bar-container {
        margin: 20px auto 20px auto;
        padding: 20px;
        text-align: center;
        position: relative;
    }
    h1{
        color: #1d4590;
        padding: 60px;
    }
    h2{
        color: #1d4590;
        text-align: right;
        padding: 0 20px 20px 20px;
    }
    .favourites-container{
        margin:0 auto 200px auto;
        text-align: right;
        color: #1d4590;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }
    .fav-item-container:nth-child(odd){
        margin-top: 10%;
    }
    .fav-item-container{
        margin-bottom: 40px;
    }
    
</style>