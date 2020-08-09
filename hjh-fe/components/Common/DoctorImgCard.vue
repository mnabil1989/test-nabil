<template>
  <div class="card-container">
    <div class="img-container" :style="backgroundStyles(url)">
      <div class="svg-container">
        <svg viewBox="0,0 200,213" xmlns="http://www.w3.org/2000/svg">
          <polygon points="0,0 200,0 200,139  0,213 " stroke="#ffc77a" fill="none"/>
        </svg>
      </div>
    </div>
    <div>
      <h2 class="name">{{ name }}</h2>
    </div>
    <div class="speciality-container">
      <p class="speciality">{{ speciality }}</p>
    </div>
  </div>
</template>

<script>
  export default {
    props: ["url", "name", "speciality", "id"],

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
    height: 36.4vw;
    width: 100%;
    padding: 0;
    border: 1px solid #ffc77a;
    position: relative;
    text-align: center;
    color: #1d4590;
    @media (max-width: 768px) {
      height: auto;
    }
  }

  .img-container {
    border: none;
    box-sizing: border-box;
    height: 70%;
    stroke-width: 2px;
    padding: 2%;
    background-position: 0 0;
    background-size: cover;
    clip-path: polygon(0 0, 100% 0%, 100% 66%, 0 100%);
  }

  .name {
    font-size: 150%;
  }

  .speciality {
    font-size: 100%;
  }
</style>
