<template>
    <div class="user-img-container">
            <img :src="url" alt="">
    </div>
</template>

<script>
export default {
    props:['url']
}
</script>

<style scoped>

.user-img-container{
    background-color:white;
    height: 500px;
    width: 500px;
    margin: 0 auto;
    padding: 0;
    
}

.user-img-container > img{
    width: 100%;
    height: 100%;
    border: 2px solid #ffc77a;
    border-radius: 50%;
    box-sizing: border-box;
     
}

</style>