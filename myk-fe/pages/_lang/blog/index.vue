<template>
  <div class="blog-page">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h3 class="heading-blog">We love Mykonos!</h3>
        </div>
        <div class="col-12 text-center">
          <h3 class="heading-date">10 December</h3>
        </div>
        <div class="col-12">
          <p class="paragraph-blog">Curabitur blandit tempus porttitor. Nullam id dolor id nibh
            ultricies vehicula ut id elit. Duis mollis, est non commodo luctus,
            nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec id elit
            non mi porta gravida at eget metus. Lorem ipsum dolor sit amet,
            consectetur adipiscing elit.</p>
        </div>
        <div class="col-12">
          <BlogPost v-for="blogPost in posts" :key="blogPost.id" :post="blogPost"></BlogPost>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Dish from "@/components/Dish";
  import BlogPost from "@/components/BlogPost";
  import axios from "axios";

  export default {
    name: "index",
    components: {BlogPost, Dish},
    layout: "main-layout",
    // asyncData(context) {
    //   return axios.get(`/api/posts?lang=${context.app.i18n.locale}`).then(response => {
    //     return {posts : response.data.posts}
    //   }).catch(error => {
    //   });
    // },
    methods: {},
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .blog-page {
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("../../../assets/images/blog.png");
    background-size: cover;
    background-position: 50% 5%;
    padding-top: 7rem;
  }

  .heading-blog {
    color: #fff;
    font-size: 4rem;
    margin: 3rem 0 1.5rem 0;
  }

  .heading-date {
    position: relative;
    width: 30%;
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
      width: 60%;
    }
    @media (max-width: 600px) {
      width: 80%;
      font-size: 1.5rem;
    }

  }

  .paragraph-blog {
    font-size: 1.4rem;
    color: #fff;
    width: 80%;
    margin: 1.5rem auto;
    line-height: 2.5;

    @media (max-width: 992px) {
      width: 100%
    }
    @media (max-width: 600px) {
      font-size: 1.4rem;
      width: 100%;
      line-height: 2;
    }
  }
</style>
