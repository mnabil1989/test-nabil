<template>
  <div :dir="$i18n.locale == 'ar' ? 'ltr' : 'rtl'">
    <div v-swiper:mySwiper="swiperOption">
      <div class="swiper-wrapper">
        <div v-for="(item, index) in pageNumb" :key="index" class="info-container swiper-slide">
          <div class="p1">
            <infoImgCard
              v-for="(post, i) in getP1Arr(posts(index + 1))"
              :url="post.image"
              :name="post.title"
              :postID="post.id"
              :post="post"
              :slug="post.slug"
              :desc="post.excerpt"
              :onLike="like"
              :liked="true"
              :onNavigate="navigate"
              :key="i"
            />
          </div>
          <div class="p2">
            <infoImgCard
              v-for="(post, i) in getP2Arr(posts(index + 1))"
              :url="post.image"
              :name="post.title"
              :postID="post.id"
              :post="post"
              :slug="post.slug"
              :desc="post.excerpt"
              :onLike="like"
              :liked="true"
              :onNavigate="navigate"
              :key="i"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="navigation-container mb-5">
      <div class="hr-divider"></div>

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
import infoImgCard from "../Common/infoImgCard";
import { mapGetters, mapMutations, mapActions } from "vuex";
export default {
  components: {
    infoImgCard
  },
  created() {
    this.setFavPosts(this.$i18n.locale);
  },
  computed: {
    ...mapGetters({
      posts: "posts/getFavposts",
      pageNumb: "posts/getFavPageNumber"
    })
  },
  data() {
    return {
      swiperOption: {
        slidesPerView: 1,
        initialSlide: 0,
        spaceBetween: 100,
        centeredSlides: true,
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
      window.scrollBy(0, 250);
    },
    ...mapMutations({ currPageChanged: "authObj/changeCurrentPath" }),
    ...mapActions({
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
      this.$router.push(this.localePath(`/healthInfo/${slug}`));
    },
    async like(post) {
      if (this.checkLogging()) {
        await this.$axios.post("/api/favorite-user", { post_id: post.id });
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
  grid-column-gap: 5%;
  grid-row-gap: 3%;
  margin: 0 auto 0 auto;
  @media (max-width: 768px) {
    grid-template-columns: 1fr;
  }
}
.swiper-container {
  width: 70% !important;
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
  top: 70%;
  right: 23%;
  width: 8vw;
  height: 8.5vw;
}
.dashed-border {
  width: 7.5vw;
  height: 7.5vw;
  border-radius: 50%;
  border: 3px dashed #ffc77a;
}
.inner-border {
  width: 6.8vw;
  height: 6.8vw;
  border-radius: 50%;
  font-size: 400%;
  color: #fff;
  background: #ffc77a;
}

.p1 {
  /* margin-top: 30%; */
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
  padding: 2% 0;
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
    padding-bottom: 20%;
  }
  .swiper-container {
    width: 43vw !important;
  }
}
</style>
