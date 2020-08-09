<template>
  <div class="card-container">
    <div class="img-container" :style="backgroundStyles(url)">
      <div class="svg-container">
        <svg viewBox="0,0 200,220" xmlns="http://www.w3.org/2000/svg">
          <polygon points="0,0 200,0 200,135  0,207 " stroke="#ffc77a" fill="none" />
        </svg>
      </div>
    </div>
    <div>
      <p class="name">{{ name }}</p>
    </div>
    <div class="speciality-container">
      <p class="speciality">{{ desc | cutLongString }}</p>
    </div>
    <div class="btn-group">
      <i @click="onLike(post)" class="fa fa-heart-o likeh" :class="{ like: liked }"></i>
      <i @click="onNavigate(slug)" class="fas fa-arrow-alt-circle-right"></i>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    "url",
    "name",
    "desc",
    "id",
    "onLike",
    "onNavigate",
    "liked",
    "postID",
    "post",
    "slug"
  ],
  filters:{
    cutLongString(value){
      if(value.length > 400){
        return value.substr(0,285) + '...'
      } else {
        return  value;
      }
    }
  },
  methods: {
    backgroundStyles(image) {
      return {
        "background-image": `url(${image})`
      };
    }
  }
};
</script>

<style scoped lang="scss">
.card-container {
  /* height: 500px; */
  position: relative;
  height: 45vw;
  padding: 0;
  border: 1px solid #ffc77a;
  position: relative;
  text-align: center;
  color: #1d4590;
  width: 80%;
  margin: 0 auto;
  margin-top: 10rem;
  @media (max-width: 768px) {
    height: auto;
    margin-top: 1rem;
  }
}
.speciality-container{
  @media (max-width: 768px) {
    margin-bottom: 5rem;
  }
}
.img-container {
  border: none;
  box-sizing: border-box;
  height: 50%;
  stroke-width: 2px;
  padding: 2%;
  background-position: 100%;
  background-size: cover;
  clip-path: polygon(0 0, 100% 0%, 100% 66%, 0 100%);
}
.name {
  font-size: 120%;
}
.speciality {
  font-size: 100%;
  width: 90%;
  text-align: center;
  margin: 0 auto;
}
.btn-group {
  position: absolute;
  bottom: 5%;
  left: 0;
  right: 0;
  display: flex;
  justify-content: space-between;
  font-size: 200%;
  width: 90%;
  margin: 0 auto;
  color: #ffc77a;
}
.btn-group {
  cursor: pointer;
}
.like {
  color: #1d4590 !important;
}
.likeh:hover {
  color: #1d4590 !important;
}
</style>
