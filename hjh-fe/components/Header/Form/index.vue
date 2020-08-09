<template>
    <div class="navbar-container" dir="rtl">
        <div class="first-container col-lg-4">
            <Right />
        </div>
        <div class="second-container col-lg-4">
            <Middle :itemList="secondContainerItemList" :itemTextColor="itemTextColor"/>
        </div>
        <div class="third-container col-lg-3">
            <IconBar iconSize="25px"/>
        </div>
    </div>
</template>
<script>
import Right from './Right'
import Middle from '@/components/Header/Middle'
import IconBar from '@/components/Common/IconBar'
export default {
    components:{Right, Middle, IconBar},
    data(){
        return{
            secondContainerItemList:[],
            itemTextColor:'#4465a8'
        }
    }
}
</script>

<style scoped>
.navbar-container{
    height: 60px;
    width:100%;
    background-color:white;
    display: flex;
    justify-content: center;
}
.navbar-container > div{
    margin:0 auto;
}
.second-container{
    padding:0 2px;
}
.third-container{
    display: flex;
    justify-content: center
}
</style>