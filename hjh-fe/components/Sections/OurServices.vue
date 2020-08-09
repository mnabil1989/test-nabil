<template>
  <section dir="rtl">
    <div class="services-container">
      <div class="container">
        <div class="row row-mobile">
          <div class="col-lg-6 col-12">
            <div class="services-box">
              <div class="awards-container">
                <div class="types-title">
                  <div class="center">{{$t('services')}}</div>
                  <div class="divider center small-divider"></div>
                </div>
                <div class="awards-list">
                  <ul>
                    <li class="algin-center" v-for="(item, index) in getServices" :key="index">
                      <nuxt-link :to="localePath(`/service/${item.slug}`)" class="service-link">
                        <div class="item-bullet"></div>
                        <div class="award-desc">{{ item["name"] }}</div>
                      </nuxt-link>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="slider-box align-self-center">
              <img src="../../assets/img/services-slider.png" alt="services"/>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="divider last-divider"></div>
  </section>
</template>

<script>
  import {mapGetters} from "vuex";

  export default {
    computed: {
      ...mapGetters({getServices: "home/getServices"})
    }
  };
</script>

<style scoped lang="scss">
  .service-link {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    text-decoration: none;
    transition: all ease-in-out .4s;
    margin-bottom: .5rem;
    font-size: 20px;
    color: rgba(29, 69, 144, 0.8);
    &:hover{
      text-decoration: none;
      color: #bd8e5f;
    }
    @media (max-width: 992px) {
      font-size: 17px;
    }
    @media (max-width:360px) {
      font-size: 15px;
    }
  }
  .slider-box {
    height: 43vw;
    @media (max-width: 768px) {
      height: 65vw;
    }
  }

  .slider-box img {
    width: 100%;
    height: 100%;
    @media (max-width: 768px) {
      object-fit: contain;
    }
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
  }

  .types-title {
    font-size: 300%;
    line-height: 2.2;
    width: 30%;
    @media (max-width: 360px) {
      width: 45%;
    }
  }

  .divider {
    opacity: 0.4;
  }
</style>
