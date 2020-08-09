<template>
  <div class="margin-top-mobile" :dir="$i18n.locale == 'ar' ? 'ltr' : 'rtl'">
    <div class="landing">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-6">
            <div class="l-right">
              <div class="box">
                <img src="@/assets/img/Sleeping-Lab-Insomania-254x302@3x.png" alt="Sleeping"/>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-6">
            <div class="l-left">
              <div class="contact-us">{{$t('healthInfo')}}</div>
              <div @click="scrollDown()" class="scroll-down space-between d-col">
                <div class="dashed-border center">
                  <div class="inner-border center">
                    <i class="fa fa-long-arrow-down"></i>
                  </div>
                </div>
                <div class="divider"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">

        <div class="col-lg-6 col-12" :class="i % 2 === 1 ? 'mt-5':''" v-for="(post, i) in postsTag">
          <infoImgCard
            :url="post.image"
            :name="post.title"
            :onLike="like"
            :slug="post.slug"
            :postID="post.id"
            :post="post"
            :onNavigate="navigate"
            :desc="post.excerpt"
            :liked="checkFav(post.id)"
            :key="i"
          />
        </div>
      </div>
    </div>
    <div class="navigation-container my-5">
      <div class="hr-divider"></div>
    </div>
  </div>
</template>

<script>
  import infoImgCard from "@/components/Common/infoImgCard";
  import { mapGetters, mapMutations, mapActions } from "vuex";
  export default {
    components: {
      infoImgCard
    },
    head(){
      return{
        title: `${this.metaTags.name}`,
        meta:[
          {hid:'description',name:'description',content:`${this.metaTags.meta_description}`},
          {hid:'keywords',name:'keywords',content:`${this.metaTags.meta_keywords}`},
          {hid:'og:description',property:`og:description`,content: `${this.metaTags.facebook_description}`},
          {hid:'og:image',property:`og:image`,content: `${this.metaTags.facebook_image}`},
          {hid:'og:title',property:`og:title`,content: `${this.metaTags.facebook_title}`},
          {hid:'twitter:description',name:`twitter:description`,content: `${this.metaTags.twitter_description}`},
          {hid:'twitter:image',name:`twitter:image`,content: `${this.metaTags.twitter_image}`},
          {hid:'twitter:title',name:`twitter:title`,content: `${this.metaTags.twitter_title}`}
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
      if (this.$auth.loggedIn) {
        this.setFavPosts(this.$i18n.locale);
      }
    },
    asyncData(context){
      return context.$axios.get(`api/tag/${context.params.slug}?lang=${context.app.i18n.locale}`).then(res =>{
        return{
          postsTag: res.data.tag.Posts,
          metaTags: res.data.tag
        }
      }).catch( e => {
        console.log(e.data);
      })
    },
    computed: {
      ...mapGetters({
        posts: "posts/getposts",
        meta_posts: "posts/getMetaposts",
        checkFav: "posts/checkFav",
        pageNumb: "posts/getPageNumber"
      })
    },
    data() {
      return {
        baseUrl:"",
      };
    },
    methods: {
      scrollDown() {
        window.scrollTo({top:650, behavior:"smooth"});
      },
      ...mapMutations({ currPageChanged: "authObj/changeCurrentPath" }),
      ...mapActions({
        setPosts: "posts/setposts",
        setFavPosts: "posts/setFavPosts",
        addFavPost: "posts/addFavPost"
      }),
      navigate(slug) {
        this.$router.push(this.localePath(`/${slug}`));
      },
      async like(post) {
        if (this.checkLogging()) {
          await this.$axios
            .post("/api/favorite-user", { post_id: post.id })
            .then(res => {
              if (
                !(res.data == `Post successfully added to your favorite list :)`)
              ) {
                this.deleteFavPost(post.id);
                return;
              }
              this.addFavPost(post);
            });
          await this.setFavPosts(this.$i18n.locale);
        }
      },
      checkLogging() {
        if (!this.$auth.loggedIn) {
          this.currPageChanged(true);
          this.$router.push(this.localePath("/auth/login"));
          return false;
        }
        return true;
      }
    }
  };
</script>

<style scoped lang="scss">
  .images-container {
    position: relative;
    height: 43vw;
  }
  .info-container {
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto;
    grid-column-gap: 25%;
    grid-row-gap: 3%;
    margin: 5% auto 15% auto;
  }
  .l-right {
    position: relative;
    width: 100%;
    padding-top: 10%;
    display: flex;
    flex-direction: row-reverse;
  }
  .scroll-down {
    position: absolute;
    cursor: pointer;
    bottom: 0;
    right: 50%;
    transform: translate(50%,0);
    width: 8vw;
    height: 8.5vw;
    @media (max-width: 992px) {
      top: 70%;
      right: 40%;
    }
  }
  .dashed-border {
    width: 7.5vw;
    height: 7.5vw;
    border-radius: 50%;
    border: 3px dashed #ffc77a;
    @media (max-width: 992px) {
      width: 40px;
      height: 40px;
    }
  }
  .box {
    position: relative;
    border: 2px #ffc77a solid;
    border-radius: 5px;
    margin-right: 10%;
    max-width: 33vw;
    min-width: 33vw;
    max-height: 33vw;
    min-height: 33vw;
  }
  .box img {
    border-radius: 5px;
    position: absolute;
    margin: auto;
    width: 100%;
    height: 100%;
    top: 10%;
    right: -10%;
  }
  .inner-border {
    width: 6.8vw;
    height: 6.8vw;
    border-radius: 50%;
    color: #fff;
    background: #ffc77a;
    @media (max-width: 992px) {
      width: 30px;
      height: 30px;
      .fa-long-arrow-down{
        font-size: 23px;
      }
    }
  }
  .l-left {
    font-size: 310%;
    margin: auto;
  }
  .contact-us {
    color: #1d4590;
    font-weight: 600;
    text-align: center;
    margin-top: 30%;
    @media (max-width: 992px) {
      margin-top: 15%;
      font-size: 2rem;
    }
    @media (max-width: 545px) {
      margin-top: 25%;
      font-size: 1.5rem;
    }
  }

  .images-container img {
    position: absolute;
    box-shadow: 0 3px 19px 0 rgba(0, 0, 0, 0.28);
    border: 1px solid #ffc77a;
    border-radius: 8px;
  }
  .images-container h1 {
    position: absolute;
    right: 15%;
    top: 20%;
    font-size: 300%;
    color: #1d4590;
    font-weight: bold;
  }
  .images-container img:first-of-type {
    top: 10%;
    left: 13.5%;
    height: 36vw;
    width: 34.7vw;
    z-index: 3;
  }
  .images-container img:nth-child(2) {
    top: 14%;
    left: 16%;
    height: 31vw;
    width: 34.7vw;
    z-index: 2;
  }
  .images-container img:nth-child(3) {
    top: 11%;
    left: 15%;
    height: 35vw;
    width: 34.7vw;
    z-index: 1;
  }
  .scroll-down {
    position: absolute;
    cursor: pointer;
    bottom: 0;
    right: 50%;
    transform: translate(50%,0);
    width: 8vw;
    height: 8.5vw;
    @media (max-width: 992px) {
      top: 70%;
      right: 40%;
    }
  }

  .inner-border {
    width: 6.8vw;
    height: 6.8vw;
    border-radius: 50%;
    color: #fff;
    background: #ffc77a;
    @media (max-width: 992px) {
      width: 30px;
      height: 30px;
      .fa-long-arrow-down{
        font-size: 23px;
      }
    }
  }

  .p1 {
    margin-top: 30%;
    display: grid;
    grid-template-columns: 1fr;
    grid-row-gap: 10%;
  }
  .p2 {
    display: grid;
    grid-template-columns: 1fr;
    grid-row-gap: 10%;
  }

  /************************************************************************************ */
  /* PAGINATION */
  /************************************************************************************ */
  .navigation-container {
    display: flex;
    width: 82%;
    margin: 0 auto;
    direction: ltr;
    justify-content: space-around;
    align-items: center;
  }
  .hr-divider {
    flex: 8;
    height: 3px;
    border-radius: 50px;
    background: #ffc77a;
  }
  .pagination-dots {
    flex: 1;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }
  .dot {
    cursor: pointer;
    height: 5px;
    width: 5px;
    border-radius: 50%;
    background-color: #427be5;
    transition: 0.2s;
  }
  .dot-active {
    background: #1d4590;
  }
  .navigation-btns {
    flex: 1;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }
  .navigation-btn {
    cursor: pointer;
    display: flex;
    width: 2.8vw;
    height: 2.8vw;
    border-radius: 50%;
    justify-content: center;
    align-items: center;
    border: 1px solid #ffc77a;
    color: #1d4590;
    font-size: 150%;
  }
  @media only screen and (max-width: 500px) {
    .info-container {
      font-size: 8px;
      width: 43%;
      grid-template-columns: 1fr;
      grid-row-gap: 10%;
      padding-bottom: 120%;
    }

  }
</style>
