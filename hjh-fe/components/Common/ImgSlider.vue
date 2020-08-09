<template>
  <div class="main-container">
      <div v-for="singleImg in ImgArray" :key="singleImg.id" class="single-img-container">
          <img :src="singleImg.url" :alt="singleImg.alt">
      </div>
  </div>
</template>

<script>
export default {
    props:['ImgArray']
}
</script>

<style scoped>
    .main-container{
        margin-left: auto;
        margin-right: auto;
        max-width: 960px;
        height: 400px;
        padding-right: 10px;
        padding-left: 10px;
        border: 1px solid blue;
        text-align: center;
        position: relative;
    }
    .single-img-container{
        border: 2px solid gray;
    }
    
    .single-img-container > img{
        border: 2px solid green;
        position: absolute;
        max-width: 50%;
        max-height: 100%;
    }

    .single-img-container:first-child {
        position: absolute;
        height: 30%;
        max-height: 30%;
        left: 10%;
        right: 30%;
        top: 25%;
        z-index: -999;
    }
    .single-img-container:nth-child(2) {
        position: absolute;
        height: 50%;
        max-height: 30%;
        left: 15%;
        right: 30%;
        top: 15%;
        z-index: 0;
    }
    .single-img-container:nth-child(3) {
        position: absolute;
        max-height: 30%;
        height: 50%;
        left: 25%;
        right: 30%;
        top: 5%;
        z-index: 999;
    }
    
</style>