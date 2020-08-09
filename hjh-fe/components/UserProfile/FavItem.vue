<template>
    <div class="user-body">
        <div class="triangle"></div>
        <img :src="url" alt="">
            <p class="user-body-title">{{title}}</p>
            <p class="user-body-content">{{content}}</p>
        <div class="icon-container">
            <a @click="removeFavItem(id)"><i class="far fa-trash-alt"></i></a>
            <a><i class="fas fa-arrow-alt-circle-right"></i></a>
        </div>
    </div>
</template>

<script>
export default {
    props:['url', 'title', 'content', 'id'],
    methods:{
        removeFavItem(id){
           this.$emit('removeItem', id)
        }
    }
}
</script>

<style scoped>
    .triangle {
     width:0; 
    border-left:297px dashed #ffc87a00; 
    border-bottom:60px solid white; 
    border-right:1px solid #ffc77a;
    position: absolute;
    top:140px;
}
    .user-body{
    height: 400px;
    width:300px;
    padding:0;
    border: 1px solid #ffc77a;
    }

    .user-body > img {
    width:100%;
    height: 50%;
    }

    .user-body-title{
    font-weight: 600;
    text-align: end;
    margin:0 auto 0 auto;
    }

    .user-body-content{
        border-top: none;
        margin-top: 0;
        padding-top: 20px
    }
    .icon-container{
        display: flex;
    }
    .icon-container > a{
        cursor: pointer;
        margin:0 auto;
        color:#ffc77a;
        font-size:1.5rem;
    }
</style>