<template>
  <div class="margin-top-mobile" :dir="$i18n.locale == 'ar' ? 'ltr' : 'rtl'">
    <div class="landing">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-6">
            <div class="l-right">
              <div class="box">
                <img src="../../../assets/img/Sleeping-Lab-Insomania-254x302@3x.png" alt="Sleeping"/>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-6">
            <div class="l-left">
              <h1 class="contact-us">{{$t('healthInfo')}}</h1>
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
    <div v-swiper:mySwiper="swiperOption">
      <div class="swiper-wrapper" style="width: 100% !important;">
        <div v-for="(item, index) in pageNumb" :key="index" class="swiper-slide">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-12">
                <infoImgCard
                  v-for="(post, i) in getP1Arr(posts(index + 1))"
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
              <div class="col-lg-6 col-12 mt-5">
                <infoImgCard
                  v-for="(post, i) in getP2Arr(posts(index + 1))"
                  :url="post.image"
                  :name="post.title"
                  :postID="post.id"
                  :post="post"
                  :slug="post.slug"
                  :desc="post.excerpt"
                  :onLike="like"
                  :liked="checkFav(post.id)"
                  :onNavigate="navigate"
                  :key="i"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="navigation-container my-5">
      <div class="hr-divider"></div>
      <div class="pagination-dots">
        <div class="dot" id="result0" @click="mySwiper.slideTo(0)"></div>
        <div
          class="dot"
          v-for="(item, index) in pageNumb > 0 ? pageNumb - 1 : pageNumb"
          :key="index"
          :id="`result${index + 1}`"
          @click="mySwiper.slideTo(index + 1)"
        ></div>
      </div>
      <div class="navigation-btns">
        <div @click="mySwiper.slidePrev()" class="navigation-btn">
          <i class="fa fa-angle-left"></i>
        </div>
        <div @click="mySwiper.slideNext()" class="navigation-btn swiper-slide-next">
          <i class="fa fa-angle-right"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import infoImgCard from "../../../components/Common/infoImgCard";
import { mapGetters, mapMutations, mapActions } from "vuex";
export default {
  components: {
    infoImgCard
  },
  head(){
    return{
      title: `${this.meta_posts.meta_title}`,
      meta:[
        {hid:'description',name:'description',content:`${this.meta_posts.meta_description}`},
        {hid:'keywords',name:'keywords',content:`${this.meta_posts.meta_keywords}`},
        {hid:'og:description',property:`og:description`,content: `${this.OpenGraph.open_graph_description}`},
        {hid:'og:image',property:`og:image`,content: `${this.OpenGraph.open_graph_image}`},
        {hid:'og:title',property:`og:title`,content: `${this.OpenGraph.open_graph_title}`},
        {hid:'twitter:description',name:`twitter:description`,content: `${this.twitter_card.twitter_card_description}`},
        {hid:'twitter:image',name:`twitter:image`,content: `${this.twitter_card.twitter_card_image}`},
        {hid:'twitter:title',name:`twitter:title`,content: `${this.twitter_card.twitter_card_title}`},
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
    console.log(this.twitter_card);
    if(process.browser){
      this.baseUrl = window.location.origin + window.location.pathname
    }
    if (this.$auth.loggedIn) {
      this.setFavPosts(this.$i18n.locale);
    }
  },
  async fetch({store,app}){
    await store.dispatch('posts/setposts',app.i18n.locale)
  },
  computed: {
    ...mapGetters({
      posts: "posts/getposts",
      meta_posts: "posts/getMetaposts",
      OpenGraph: "posts/getOpenGraphPosts",
      twitter_card: "posts/getTwitterPosts",
      checkFav: "posts/checkFav",
      pageNumb: "posts/getPageNumber"
    })
  },
  data() {
    return {
      baseUrl:"",
      title: "الأطبــاء",
      swiperOption: {
        loop: true,
        slidesPerView: 1,
        initialSlide: 0,
        spaceBetween: 100,
        centeredSlides: true,
        breakpoints: {
          // when window width is >= 320px
          320: {
            slidesPerView: 1,
            spaceBetween: 10
          },
          // when window width is >= 480px
          768: {
            slidesPerView: 1,
            spaceBetween: 10
          },
          // when window width is >= 640px
          992: {
            slidesPerView: 1,
            spaceBetween: 10
          },
          on: {
            slideChange() {
              console.log('onSlideChangeEnd', this);
            },
            tap() {
              console.log('onTap', this);
            }
          }
        },
        on: {
          slideChange: () => {
            let curractive = document.getElementsByClassName("dot-active")[0];
            if (curractive) curractive.classList.remove("dot-active");
            let newactive = document.getElementById(
              "result" + this.mySwiper.realIndex
            );
            if (newactive) newactive.classList.add("dot-active");
          },
          tap() {
            console.log("onTap", this);
          }
        }
      }
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
      deleteFavPost: "posts/deleteFavPost",
      addFavPost: "posts/addFavPost"
    }),
    getP1Arr(arr) {
      var newArr = arr.splice(0, Math.ceil(arr.length / 2));
      return newArr;
    },
    getP2Arr(arr) {
      var newArr = arr.splice(Math.ceil(arr.length / 2), arr.length);
      return newArr;
    },
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
</style>
