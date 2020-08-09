<template>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-12 img-mobile">
        <img :src="url" alt="doctor" class="doctor-img">
      </div>
      <div class="col-md-8 col-12">
        <h2 class="title">{{ title }}</h2>
      </div>
      <div class="triangle-container"></div>
    </div>

<!--    url-->

  </div>
</template>

<script>
export default {
  props: ["url", "title"]
};
</script>

<style scoped lang="scss">
.card-container {
  /* background: red; */
  height: 529px;
  height: 40vw;
  width: 100%;
  padding: 0;
  position: relative;
  text-align: center;
  color: #1d4590;
  margin-bottom: 10%;
}
.title-container {
  /* bottom: 10vw; */
  left: 68%;
  /* background: red; */
  top: 79%;
  display: inline-block;
  position: absolute;
  z-index: 999;
  border-bottom: 4px solid #ffc77a;
  padding-bottom: 0.5%;
  @media (max-width: 768px) {
    left: 55%;
  }
}
.img-mobile{
  @media (max-width: 768px) {
    text-align: center;
    img{
      margin-bottom: 1rem;
    }
  }
}


</style>
