<template>
  <ul :class="{footerMenu: isFooterMenu,kidFooterMenu:isKidFooterMenu}" class="main-menu">
    <li @click="closeMenu()">
      <nuxt-link :to="localePath(`/main`)" nuxt-link-exact-active="active" nuxt-link-active="active">{{$t('home')}}
      </nuxt-link>
    </li>
    <li @click="closeMenu()">
      <nuxt-link :to="localePath(`/menu`)" nuxt-link-exact-active="active" nuxt-link-active="active">{{$t('menu')}}
      </nuxt-link>
    </li>
    <li @click="closeMenu()">
      <nuxt-link :to="localePath(`/top-dishes`)" nuxt-link-exact-active="active" nuxt-link-active="active">{{$t('top dishes')}}
      </nuxt-link>
    </li>
    <li @click="closeMenu()">
      <nuxt-link :to="localePath(`/contact-us`)" nuxt-link-exact-active="active" nuxt-link-active="active">{{$t('contact us')}}
      </nuxt-link>
    </li>
    <li @click="closeMenu()">
      <nuxt-link :to="localePath(`/about-us`)" nuxt-link-exact-active="active" nuxt-link-active="active">{{$t('about us')}}
      </nuxt-link>
    </li>
<!--    <li @mouseover="switchDropDown = true" @mouseleave="switchDropDown = false" class="blog">-->
<!--      <div class="hold-category">-->
<!--        <i class="fas fa-plus" @click="switchDropDown = !switchDropDown"></i>-->
<!--        <nuxt-link :to="localePath('/blog')" nuxt-link-exact-active="active" nuxt-link-active="active">{{$t('blog')}}-->
<!--        </nuxt-link>-->
<!--        <transition name="fade">-->
<!--          <div v-if="switchDropDown" class="dropdownMenu">-->
<!--            <i class="fas fa-arrow-up"></i>-->
<!--            <ul @click="switchDropDown = false">-->
<!--              <li v-for="category in categories" :key="category.id">-->
<!--                <nuxt-link :to="localePath(`/category/${category.slug}`)">{{category.name}}</nuxt-link>-->
<!--              </li>-->
<!--            </ul>-->
<!--          </div>-->
<!--        </transition>-->
<!--      </div>-->
<!--    </li>-->
    <li class="blog-mobile">
      <div class="hold-category">
<!--        <i class="fas fa-plus" @click="switchDropDownMobile = !switchDropDownMobile"></i>-->
<!--        <nuxt-link :to="localePath('/blog')" nuxt-link-exact-active="active" nuxt-link-active="active">{{$t('blog')}}-->
<!--        </nuxt-link>-->
<!--        <transition name="fade">-->
<!--          <div v-if="switchDropDownMobile">-->
<!--            <ul @click="switchDropDownMobile = false">-->
<!--              <li v-for="category in categories" :key="category.id">-->
<!--                <nuxt-link :to="localePath(`/category/${category.slug}`)">{{category.name}}</nuxt-link>-->
<!--              </li>-->
<!--            </ul>-->
<!--          </div>-->
<!--        </transition>-->
      </div>
    </li>
  </ul>
</template>

<script>
  import axios from "axios";

  export default {
    name: "Navigation",
    data() {
      return {
        switchDropDown: false,
        switchDropDownMobile: false
      }
    },
    props: {
      isFooterMenu: {
        type: Boolean,
        default: false
      },
      isKidFooterMenu: {
        type: Boolean,
        default: false
      }
    },
    computed: {
      categories() {
        return this.$store.state.categories;
      },
      menu() {
        return this.$store.state.home
      }
    },
    methods: {
      toBlog() {
        this.$router.push('/blog');
      },
      closeMenu(){
        this.$emit('closeMenu',false)
      }
    }
  }
</script>

<style lang="scss" scoped>
  $main-color: #bb8f32;
  $kids-color: #f27a25;
  $main-font: 'Poppins';
  .main-menu {
    text-align: center;
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;

    li {
      margin: 0 .8rem;
      cursor: pointer;

      &:last-of-type {
        margin: 0;
        padding: 0 1.5rem;
      }

      .dropdownMenu {
        position: absolute;
        right: 0;
        top: 2.5rem;
        width: 185px;
        border: 1px solid $main-color;
        background-color: rgba(0, 0, 0, 0.61);
        @media (max-width: 1200px) {
          position: relative;
          top: 0;
          width: 100%;
          border: 1px solid transparent;
        }

        .fa-arrow-up {
          color: $main-color;
          position: absolute;
          right: .2rem;
          top: -1rem;
          @media (max-width: 1200px) {
            display: none;
          }
        }

        li {
          text-align: center;
          margin: 1rem 0;
          text-transform: capitalize;
          position: relative;
          transition: all linear .3s;

          a {
            color: #fff;
            transition: all linear .3s;
            cursor: pointer;
          }

          &:after {
            content: "";
            display: block;
            width: 25%;
            height: 2px;
            background-color: $main-color;
            margin: .8rem auto;
            @media (max-width: 1200px) {
              display: none;
            }
          }

          &:last-of-type {
            &:after {
              display: none;
            }
          }

          &:hover {
            a {
              color: $main-color;
            }
          }
        }
      }
    }

    a {
      color: #fff;
      text-transform: capitalize;
      text-decoration: none;
      transition: all linear .3s;
      font-size: 1.1rem;

      &:hover {
        color: $main-color;
      }

    }
  }

  .footerMenu {
    display: block;
    width: 50%;
    margin-left: auto;
    margin-top: -2.2rem;

    li {
      margin: 1.5rem 0;
      text-align: center;

      &:first-of-type {
        margin-top: 0;
      }
    }

    a {
      color: $main-color;
      text-transform: capitalize;
      text-decoration: none;
      transition: all linear .3s;
      font-size: 1.1rem;

      &:hover {
        color: #47494e;
      }
    }

    .dropdownMenu {
      display: none;
    }

    @media (max-width: 768px) {
      width: 100%;
    }
    @media (max-width: 768px) {
      margin-top: 0;
    }
  }

  .kidFooterMenu {
    a {
      color: #fff;

      &:hover {
        color: $kids-color;
      }
    }
  }

  .hold-category {
    position: relative;
  }

  ul {
    li {
      p {
        color: #fff;
        margin: 0;
      }
    }
  }

  .fa-plus {
    display: none;
    @media (max-width: 1200px) {
      display: inline-block;
      color: #fff;
      margin: 0 .5rem;
    }
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .8s;
  }

  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
  {
    opacity: 0;
  }
  .blog{
    display: block;
    @media (max-width: 1200px) {
      display: none;
    }
  }
  .blog-mobile{
    display: none;
    @media (max-width: 1200px) {
      display: block;
    }
  }
</style>
