<template>
  <section dir="rtl">
    <div class="services-container">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="services-box">
              <div class="awards-container">
                <div class="types-title">
                  <h2 class="">{{$t('healthInfo')}}</h2>
                  <div class="divider center small-divider"></div>
                </div>
                <div class="awards-list">
                  <ul>
                    <li class="algin-center" v-for="(item, index) in posts" :key="index">
                      <div class="item-bullet"></div>
                      <div class="award-desc">
                        <nuxt-link :to="localePath(`/${item['slug']}`)">{{ item["title"] }}</nuxt-link>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="slider-box align-self-center">
              <img src="../../assets/img/services-slider.png" alt="POSTS"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import axios from "axios";

  export default {
    data() {
      return {
        posts: null
      }
    },
    created() {
      axios.get(`/api/posts?lang=${this.$i18n.locale}`).then(res => {
        this.posts = res.data.posts.splice(res.data.posts.length - 5, res.data.posts.length);
      }).catch(e => {

      })
    }
  };
</script>

<style scoped lang="scss">
  .award-desc{
    a{
      color: #1d4590;
      text-decoration: none;
      transition:  all ease-in-out .4s;
      &:hover{
        color: #fff;
      }
    }
  }
  section {
    background: #ffc77a;
    color: #1d4590;
    position: relative;
    margin-top: 5%;
  }

  .services-container {
    width: 98%;
    height: 50vw;
    margin: 0 auto;
    @media (max-width: 992px) {
      height: auto;
    }
  }

  .slider-box img {
    width: 100%;
    height: 100%;
    object-fit: contain;
  }

  .services-box {
    color: #1d4590;
  }
  .awards-title {
    margin-top: 5%;
    width: 20%;
    line-height: 2.2;
  }

  .item-bullet {
    height: 1vw;
    background: #1d4590;
    border-radius: 50%;
    width: 1vw;
    margin: 0 2%;
  }

  ul {
    padding-top: 1%;
  }

  ul li {
    font-size: 200%;
    margin: 0.5%;
    @media (max-width: 768px) {
      font-size: 100%;
    }
  }

  .types-title {
    font-size: 300%;
    line-height: 2.2;
    width: 60%;
    h2{
      text-align: right;
      margin: 1rem 0;
    }
    @media (max-width: 768px) {
      font-size: 150%;
      width: 100%;
      h2{
        text-align: center;
      }
    }
  }
  .types-title{
    .divider {
      margin: 0;
      margin-left: auto;
      opacity: 0.4;
      @media (max-width: 768px) {
        margin: 0 auto;
      }
    }
  }
</style>
