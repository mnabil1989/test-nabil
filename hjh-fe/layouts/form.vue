<template>
    <div class="form">
        <nuxt />
    </div>
</template>
<script>
import Header from '@/components/Header/Form'
export default {
    components:{
        Header
    }
}
</script>
<style>
  .form{
    background-position: 35% 25%;
    background-size: 1800px;
    background-image: url("../assets/img/splash.png");
  }
</style>
