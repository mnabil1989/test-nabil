<template>
    <div class="container">
        <div class="menu-bar-container">
            <!-- this containes both image profile and menu bar -->
            <MenuBar 
            :isSettings="true"/>
            <h1>{{name}}</h1>
        </div>
        <h2> الاعدادات </h2>
        <div class="settings-container">
            <UserSettings />
        </div>
    </div>
</template>

<script>
import MenuBar from '@/components/UserProfile/MenuBar'
import UserSettings from '@/components/Form/UserSettings'
import userData from "~/dataFile/userProfileData.js";

export default {
    components:{
         MenuBar, UserSettings
    },
    data: function(){
        return {
            name:userData.name,
            url:userData.profileImageUrl,
        }
    },
}
</script>

<style>
    .menu-bar-container {
        margin: 90px auto 20px auto;
        padding: 0;
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
    .settings-container{
        margin:0 200px 400px 200px;
        text-align: right;
        color: #1d4590;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        flex-wrap: wrap;
        
    }

    .fav-item-container{
        margin-bottom: 40px;
    }
    
</style>