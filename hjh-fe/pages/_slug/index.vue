<template>
  <div class="margin-top-mobile">
    <div class="large-card-container" :style="{'background':`url(${post.image})`}"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-12">
          <div class="row">
            <div class="col-12">
              <h1 class="title text-right">{{post.title}}</h1>
            </div>
            <div class="col-12 description">
              <div v-html="post.body"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="sidebar">
            <div class="row">
              <div class="col-12">
                <div class="side-title">المنشور الاخير</div>
              </div>
              <div class="col-12">
                <div v-for="(item, index) in latestAllPosts.slice(latestAllPosts.length - 3, latestAllPosts.length)" :key="index" class="side-item">
                  <nuxt-link :to="localePath(`/${item.slug}`)">
                    <div class="row">
                      <div class="col-lg-4 col-12">
                        <div class="img-container">
                          <img :src="item.image" :alt="item.image_alt" :title="item.image_title" />
                        </div>
                      </div>
                      <div class="col-lg-8 col-12">
                        <div class="info-container">
                          <div class="info-title">{{item.title}}</div>
                          <div class="info-sub-description">
                            {{item.excerpt | cutLongString}}
                          </div>
                        </div>
                      </div>
                    </div>
                  </nuxt-link>
                </div>
              </div>
              <div class="col-12">
                <div class="side-title">العلامات</div>
              </div>
              <div class="col-12">
                <div  class="side-item tag">
                  <nuxt-link :to="localePath(`/tag/${tag.slug}`)" v-for="(tag, index) in post.tag" :key="index">
                    <div class="info-title info-container tag-name">{{tag.name}}</div>
                  </nuxt-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import LargeCardImg from "@/components/Doctors/LargeCardImg";

  export default {
    components: { LargeCardImg },
    data(){
      return{
        baseUrl:''
      }
    },
    filters: {
      cutLongString(value) {
        if (value.length > 60) {
          return value.substr(0, 50) + '...'
        } else {
          return value;
        }
      }
    },
    head() {
      return{
        title: `${this.post.title}`,
        meta:[
          {hid:'description',name:'description',content:`${this.post.meta_description}`},
          {hid:'keywords',name:'keywords',content:`${this.post.meta_keywords}`},
          {hid:'og:description',property:`og:description`,content: `${this.post.facebook_description}`},
          {hid:'og:image',property:`og:image`,content: `${this.post.facebook_image}`},
          {hid:'og:title',property:`og:title`,content: `${this.post.facebook_title}`},
          {hid:'twitter:description',name:`twitter:description`,content: `${this.post.twitter_description}`},
          {hid:'twitter:image',name:`twitter:image`,content: `${this.post.twitter_image}`},
          {hid:'twitter:title',name:`twitter:title`,content: `${this.post.twitter_title}`}
        ],
        link: [
          {
            rel: "canonical",
            href: this.baseUrl
          }
        ]
      }
    },
    created() {
      if(process.browser){
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    async asyncData({ params, $axios, $i18n, app }) {
      let res = await $axios.$get(
        `/api/post/${encodeURI(params.slug)}?lang=${app.i18n.locale}`
      );
      let allPosts = await $axios.$get(
        `/api/posts?lang=${app.i18n.locale}`
      );
      return {
        post: res["post"],
        latestAllPosts: allPosts.posts
      };
    }
  };
</script>

<style lang="scss" scoped>
  .title{
    color: #1d4590;
    position: relative;
    padding-right: 2rem;
    @media (max-width: 768px) {
      font-size: 1.5rem;
      padding-right: 0;
    }
    &:after{
      position: absolute;
      content: "";
      display: block;
      width: 9%;
      margin: 1rem 0;
      height: 4px;
      border-radius: .25rem;
      background-color: #ffc77a;
      @media (max-width: 768px) {
        width: 35%;
      }
    }
  }
  .tag{
    a{
      width: 90%;
      margin: 0 auto;
      margin-bottom: 1rem;
      padding: 0 !important;
    }
  }
  .tag-name{
    background: #F5F5F5;
    border-radius: .25rem;
    padding: .5rem;
  }
  .large-card-container {
    width: 100%;
    height: 500px;
    background: transparent;
    clip-path: polygon(0 0, 100% 0%, 100% 65%, 0 90%);
    background-position: 100%;
    background-size: cover !important;
    background-repeat: no-repeat !important;
  }
  .description{
    div{
      margin-top: 2rem;
      text-align: right;
      font-size: 1.5rem;
      line-height: 2;
      padding-right: 2rem;
      @media (max-width: 768px) {
        font-size: 1.2rem;
        line-height: 1.7;
        padding-right: 0;
      }
    }

  }
  .content-container {
    display: grid;
    direction: ltr;

    grid-template-columns: 4fr 11fr;
  }
  .sidebar {
    background-color: #c756a10c; /* opacity: 0.05; */
  }

  .side-title {
    text-align: right;
    font-size: 145%;
    color: #1d4590;
    font-weight: 600;
    padding: 1rem;
  }

  .img-container {
    height: 80px;
  }
  .img-container img {
    width: 100%;
    height: 100%;
    border-radius: 0.25rem;
    object-fit: cover;
  }
  .side-item {
    a{
      text-decoration: none;
      padding: 1rem;
      display: block;
    }
  }
  .info-container {
    text-align: right;
    line-height: 1.8;
    font-size: 1rem
  }
  .info-sub-description{
    color: #000;
  }
  .info-title{
    font-weight: bold;
    color: #1d4590;
  }
</style>
