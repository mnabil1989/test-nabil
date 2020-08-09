<template>
  <div class="blog-post">
    <div class="container">
      <div class="row">
        <Closing></Closing>
        <HeadingPage :heading="postBySlug.title" :sub-title="postBySlug.excerpt"></HeadingPage>
        <div class="col-12">
          <div class="hold-img-blog-post">
            <img :src="postBySlug.image" alt="blog-post" class="img-fluid">
          </div>
        </div>
        <div class="col-md-9 col-12">
          <h3 class="heading-post">{{postBySlug.title}}</h3>
          <div class="post-paragraph">{{postBySlug.meta_description}}</div>
        </div>
        <div class="col-md-3 col-12">
          <h5 class="heading-about">about</h5>
          <p class="paragraph-about">
            Lorem ipsum dolor sit
            amet, con sen sectetur
            adip isicing elit, sed do
            eiusa mod tempor incididunt
          </p>
          <h5 class="heading-category">category</h5>
          <div class="paragraph-category">
            <nuxt-link :to="localePath('/category/+postBySlug.category.slug')">{{postBySlug.category.name}}</nuxt-link>
          </div>
          <InstaPosts></InstaPosts>
          <h5 class="heading-tags">tags</h5>
          <p class="paragraph-tags">
            <nuxt-link :key="TagName.id" :to="localePath(`/tag/${TagName.slug}`)" v-for="TagName in postBySlug.tag">{{TagName.name}}</nuxt-link>
          </p>
        </div>
        <div class="col-3 social">
          <SocialLinks is-full-width="true"></SocialLinks>
        </div>
        <div class="col-6"></div>

        <div class="col-3">
          <h5 class="heading-search">search</h5>
          <Search></Search>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Closing from "@/components/Closing";
  import HeadingPage from "@/components/HeadingPage";
  import InstaPosts from "@/components/InstaPosts";
  import SocialLinks from "@/components/SocialLinks";
  import Search from "@/components/Search";
  import axios from "axios";
  export default {
    name: "index",
    components: {Search, SocialLinks, InstaPosts, HeadingPage, Closing},
    layout: "main-layout",
    // asyncData(context) {
    //   return context.$axios.get(`/api/post/${context.params.slug}?lang=${context.app.i18n.locale}`).then(response =>{
    //     return {postBySlug : response.data.post}
    //   }).catch(error =>{
    //   })
    // },
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .blog-post {
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("../../../assets/images/blog.png");
    background-size: cover;
    background-position: 50% 5%;
    padding-top: 7rem;
  }

  .heading-about, .heading-category, .heading-tags, .heading-search {
    color: $main-color;
    text-transform: uppercase;
    margin: 2rem 0 1.2rem 0;
    font-weight: bold;
  }

  .heading-search {
    margin-top: 0;
  }

  .paragraph-about, .paragraph-category, .paragraph-tags {
    color: #fff;
  }

  .social, .search {
    margin: 2rem 0;
    border: 1px solid #fff;
  }

  .search {
    margin: 1rem auto;

    input {
      width: 80%;
      background-color: transparent;
      color: $main-color;
      border: none;
      outline: none;
      display: inline-block;
      padding: 1rem .5rem;
      transition: all ease-in-out .3s;
      font-size: 1.3rem;

      &::placeholder {
        color: $main-color;
        text-transform: capitalize;
      }
    }

    .fa-search {
      color: $main-color;
      font-size: 1.5rem;
    }
  }

</style>
