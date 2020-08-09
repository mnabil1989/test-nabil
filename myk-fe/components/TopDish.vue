<template>
  <div class="row">
    <div class="col-12" v-for="(topDish,index) in topDishes">
      <div class="row" v-if="index % 2 === 0">
        <div class="col-lg-8 col-12">
          <div class="card-news">
            <div class="row flex-mobile">
              <div class="col-lg-6  pr-lg-0 col-12">
                <div class="main-card text-center">
                  <h2 class="heading-news">{{topDish.title}}</h2>
                  <p class="title-news">{{topDish.description}}</p>
                  <button class="view-menu"  @click="topDish.showParagraph = !topDish.showParagraph">view full menu</button>
                </div>
                <transition name="fade">
                  <div class="paragraph text-center" v-if="topDish.showParagraph">
                    {{topDish.sub_description}}
                  </div>
                </transition>
              </div>
              <div class="col-lg-6 pl-lg-0 col-12">
                <img :src="'/images/'+topDish.image" alt="news" class="img-fluid img-card">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4"></div>
      </div>
      <div class="row" v-if="index % 2 === 1">
        <div class="col-lg-4"></div>
        <div class="col-lg-8 col-12">
          <div class="card-news">
            <div class="row">
              <div class="col-lg-6 pr-lg-0 col-12">
                <img :src="'/images/'+topDish.image" alt="news" class="img-fluid img-card">
              </div>
              <div class="col-lg-6 pl-lg-0 col-12 reflect">
                <div class="main-card text-center">
                  <h2 class="heading-news">{{topDish.title}}</h2>
                  <p class="title-news">{{topDish.description}}</p>
                  <button class="view-menu" @click="topDish.showParagraph = !topDish.showParagraph">view full menu</button>
                </div>
                <transition name="fade">
                  <div class="paragraph text-center" v-if="topDish.showParagraph">
                    {{topDish.sub_description}}
                  </div>
                </transition>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    name: "New",
    data() {
      return {
        showParagraph: false
      }
    },
    props:{
      topDishes:{
        default:[],
      }
    },
    methods:{
      // showClosestParagraph(){
      //   this.showParagraph = ! this.showParagraph;
      // }
    }
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .paragraph {
    padding: 10px;
    line-height: 2;
    /*position: absolute;*/
    /*height: 100%;*/
    border: 0;
    background: #fff;
    z-index: 25;
    width: 100%;
  }
  .card-news {
    margin: 3rem 0;
    .main-card {
      background: #fff;
      height: 100%;
      overflow: hidden;
    }

    .img-card {
      object-fit: cover;
      height: 300px;
      display: block;
      width: 100%;
    }

    .heading-news {
      color: $main-color;
      font-size: 2.5rem;
      width: 75%;
      margin: 0 auto;
      font-weight: 600;
      padding-top: 1rem;
      @media (max-width: 1200px) {
        font-size: 1.5rem;
      }
    }

    .title-news {
      color: #173661;
      margin: 1rem auto;
      font-size: 1.2rem;
      line-height: 2.5;
      text-transform: capitalize;
      @media (max-width: 1100px) {
        line-height: 1.5;
        padding: 10px;
      }
    }

    .view-menu {
      color: $main-color;
      text-transform: uppercase;
      text-decoration: none;
      background: transparent;
      background-position: bottom;
      padding: 1rem;
      transition: border-top-right-radius .3s linear .5s,
      border-bottom-left-radius .3s linear .5s,
      background-color linear .3s,
      opacity linear .3s;
      border: none;
      outline: none;
      &:hover {
        background-position: top;
        background-color: #000;
        opacity: .5;
        border-top-right-radius: 8px;
        border-bottom-left-radius: 8px;
      }
      @media (max-width: 1200px) {
        margin: 1rem 0;
      }
    }
  }
  .reflect{
    /*.paragraph{*/
    /*  left: auto !important;*/
    /*  right: 15px;*/
    /*}*/
  }
  .flex-mobile{
    @media (max-width: 992px) {
      flex-direction: column-reverse;
    }
  }
  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
  {
    opacity: 0;
  }


</style>
