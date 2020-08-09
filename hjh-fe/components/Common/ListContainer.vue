<template>
    <div class="list-container">
        <h3>{{title}}</h3>
        <div class="colored-line"></div>
        <ul>
            <li v-for="listItem in listItems" :key="listItem" class="list-item">
                {{listItem}}
            </li>
        </ul>
    </div>
    
</template>
<script>
export default {
    props:{
        title:{type:String, default:'Contact Us'},
        listItems:{
            type:Array, required: true,
        }
        }
}
</script>
<style scoped>
    .list-container{
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    ul{
        list-style: none;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: start;
        
    }

    .list-container >h3{
        align-self: start;
        color: white;
        margin-left:10px;
        
    }
    .colored-line{
        background-color: #ffc77a;
        height:2px;
        width: 30%;
        margin:5px;
        margin-left:30px;
        margin-right:30px;
        
    }
    ul> li{
        margin-top:2%
    }
</style>