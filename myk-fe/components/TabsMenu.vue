<template>
  <div class="row">
    <div v-if="siteType === 'bistro'" class="tabs-menu col-12">
      <ul>
        <li v-for="Menu in menuWithType.menu_bistro" :key="Menu.id" @click="changeMenu(Menu.name)">{{Menu.name}}
        </li>
      </ul>
      <transition name="fade">
        <div class="main-menu col-12" v-for="Menu in menuWithType.menu_bistro" :key="Menu.id" v-if="Menu.name === current">
          <div style="background-color: #F5F5F5">
          </div>
          <div class="row" v-for="subMenu in Menu.sub" :key="Menu.id">
            <div class="col-12">
              <h3 class="heading text-center">{{subMenu.name}}</h3>
            </div>
            <div class="col-12">
              <div class="row">
                <Dish v-for="(dish,index) in subMenu.dishes" :dish="dish" :key="index"></Dish>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
    <div v-if="siteType === 'kids'" class="tabs-menu col-12">
      <ul>
        <li v-for="Menu in menuWithType.menu_kids" :key="Menu.id" @click="changeMenu(Menu.name)">{{Menu.name}}
        </li>
      </ul>
      <transition name="fade">
        <div class="main-menu col-12" v-for="Menu in menuWithType.menu_kids" :key="Menu.id" v-if="Menu.name === current_kids">
          <div style="background-color: #F5F5F5">
          </div>
          <div class="row" v-for="subMenu in Menu.sub" :key="Menu.id">
            <div class="col-12">
              <h3 class="heading text-center">{{subMenu.name}}</h3>
            </div>
            <div class="col-12">
              <div class="row">
                <Dish v-for="(dish_kids,index) in subMenu.dishes" :dish="dish_kids" :key="index"></Dish>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
  import Dish from "./Dish";
  import {mapGetters} from "vuex";
  export default {
    name: "TabsMenu",
    components: {Dish},
    props:{
      menuWithType:{
        type:Object,
        default:{}
      }
    },
    data() {
      return {
        current: '',
        current_kids: '',
        Active: false
      }
    },
    methods: {
      changeMenu(name) {
        this.Active = true;
        if (this.siteType === 'bistro'){
          this.current = name;
        } else if(this.siteType === 'kids'){
          this.current_kids = name;
        }
      }
    },
    computed: {
      ...mapGetters(['siteType']),
      menu() {
        return this.$store.state.menu;
      }
    },
    mounted() {
      this.current = this.menuWithType.menu_bistro[0].name;
      this.current_kids =  this.menuWithType.menu_kids[0].name ;
    }
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .tabs-menu {
    ul {
      display: flex;
      justify-content: center;
      align-items: center;

      li {
        margin: 3rem 2rem;
        border: solid 1px transparent;
        padding: .3rem 1rem;
        border-radius: 20px;
        color: #fff;
        cursor: pointer;
        text-transform: uppercase;
        text-decoration: none;
        transition: all linear .3s;

        &:hover,
        &:active {
          border: solid 1px $main-color;
        }

        @media (max-width: 600px) {
          text-align: center;
        }
      }

      .active {
        border: solid 1px $main-color;
      }

      @media (max-width: 600px) {
        display: block;
        align-items: center;
      }
    }

    @media (max-width: 600px) {
      align-items: center;
    }
  }

  .heading {
    position: relative;
    width: 20%;
    font-size: 2.5rem;
    color: $main-color;
    margin: 4rem auto;

    &:before, &:after {
      content: "";
      display: inline-block;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: $main-color;
      position: absolute;
      left: 0;
      top: 50%;
      transform: translate(-50%, -50%);
    }

    &:after {
      left: auto;
      right: 0 !important;
    }

    @media (max-width: 1200px) {
      width: 50%;
    }
    @media (max-width: 545px) {
      width: 80%;
    }
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .8s;
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
  {
    opacity: 0;
  }
</style>
