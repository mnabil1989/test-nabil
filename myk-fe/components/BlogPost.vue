<template>
  <div class="blog-posts">

    <div class="row">
      <div class="col-12">
        <nuxt-link :to="localePath(`/blog/${post.slug}`)">
          <div class="hold-img-blog-post">
            <img :src="post.image" alt="blog-post" class="img-fluid">
          </div>
        </nuxt-link>
      </div>
      <div class="col-12">
        <div class="main-info">
          <div class="row">
            <div class="col-10">
              <nuxt-link :to="localePath(`/blog/${post.slug}`)">
              <h4 class="blog-post-name">{{post.title}}</h4>
              </nuxt-link>
              <p class="blog-post-description">{{post.category.name}}</p>
            </div>
            <div class="col-2 d-flex justify-content-end align-items-center">
              <div class="favorite-icon">
                <img src="../assets/images/circle.png" alt="circle">
                <i class="far fa-heart" @click="showPost(post.id)"></i>
              </div>
            </div>
          </div>
        </div>
        <h3 class="heading-post">{{post.title}}</h3>
        <div class="post-paragraph">
          <p>{{post.excerpt}}</p>
        </div>
      </div>


    </div>

  </div>
</template>

<script>
  import axios from "axios";

  export default {
    name: "BlogPost",
    data(){
      return{
        token: ''
      }
    },
    props: {
      post: {
        type: Object
      }
    },
    methods: {
      // showPost(id) {
      //   axios.post('/api/favorite-user', {post_id: id}, {headers: {Authorization: this.token}}).then(response => {
      //     console.log(response)
      //   }).catch(error => {
      //     console.log(error)
      //   })
      // }
    },
    mounted() {
      // this.token = localStorage.getItem('auth._token.local');
    }
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .blog-posts {
    width: 80%;
    margin: 0 auto;

    a {
      text-decoration: none !important;

      &:hover {
        text-decoration: none !important;
      }
    }

    .main-info {
      background-color: rgba(0, 0, 0, 0.76)
    }

    .blog-post-name {
      color: $main-color;
      margin: .5rem 2rem;
    }

    .blog-post-description {
      color: #fff;
      margin: .5rem 2rem;
    }

    @media (max-width: 992px) {
      width: 100%;
    }
  }

  .favorite-icon {
    cursor: pointer;
    position: relative;
    margin-right: 1rem;

    .fa-heart {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      color: #fff;
      font-size: 13px;
    }
  }
</style>
