<template>
  <section class="margin-top-mobile" :dir="$i18n.locale == 'ar' ? 'rtl' : 'ltr'">
    <div class="large-card-container"></div>
    <div v-swiper:mySwiper="swiperOption">
      <div class="swiper-wrapper">
        <div class="c-w-100">
          <div>
            <div v-for="(item, index) in pageNumb" :key="index" class="body-container swiper-slide">
              <ul class="events-list">
                <li v-for="(event, i) in events(index + 1)" :key="i">
                  <div class="item-bullet"></div>
                  <nuxt-link :to="localePath(`/events/${event.slug}`)" class="link-event">
                    <!--                @click="goToSingleEvent(event.slug)"-->
                    <div class="events-item" :class="{ 'active-item': i % 2 == 0 }">
                      <div class="date-time-container">
                        <div class="icon-text">
                          <p>
                            {{ new Date(event.start).getFullYear() }}
                            <i class="far fa-calendar"></i>
                          </p>
                        </div>
                        <div class="icon-text">
                          <p>
                            {{
                            `${new Date(event.start).getHours()}:${new Date(
                            event.start
                            ).getMinutes()}`
                            }}
                            <i
                              dir="rtl"
                              class="far fa-clock"
                            ></i>
                          </p>
                        </div>
                      </div>
                      <div class="offer">
                        <p>
                          {{
                          new Date(event.start).toLocaleString($i18n.locale, {
                          weekday: "long"
                          })
                          }}
                        </p>
                        <p>{{ event.title }}</p>
                      </div>
                    </div>
                  </nuxt-link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="navigation-container">
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
        <div class="navigation-btn">
          <i class="fa fa-angle-left"></i>
        </div>
        <div class="navigation-btn">
          <i class="fa fa-angle-right"></i>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import {mapGetters, mapMutations, mapActions} from "vuex";

  export default {
    created() {
      // this.setevents(this.$i18n.locale);
      if (process.browser) {
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    head() {
      return {
        link: [
          {
            rel: "canonical",
            href: this.baseUrl
          }
        ]
      }
    },
    async fetch({store, app}) {
      await store.dispatch('events/setevents', app.i18n.locale)
    },
    mounted() {
      setTimeout(() => {
        var currentPage = document.getElementById(
          `result${this.mySwiper.realIndex}`
        );
        if (currentPage) {
          document
            .getElementById(`result${this.mySwiper.realIndex}`)
            .classList.add("dot-active");
        }
      }, 1000);
    },
    data() {
      return {
        baseUrl: "",
        swiperOption: {
          loop: true,
          slidesPerView: 1,
          initialSlide: 0,
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
    computed: {
      ...mapGetters({
        events: "events/getevents",
        pageNumb: "events/getPageNumber"
      })
    },
    methods: {
      ...mapActions({setevents: "events/setevents"}),
      // goToSingleEvent(slug) {
      //   this.$router.push({
      //     path: this.localePath(`/events/${slug}`)
      //   });
      // }
    }
  };
</script>

<style scoped lang="scss">
  /* **************************************************************************************************** */
  /* STACKED-IMAGES-AREA*/
  /* **************************************************************************************************** */
  .link-event {
    display: inline-block;
    width: 80%;
    margin: 0 auto;
    text-decoration: none;
    @media (max-width: 768px) {
      width: 100%;
    }
  }
  .c-w-100{
    width: 100%;
  }
  .large-card-container {
    width: 100%;
    height: 500px;
    background: url("../../../assets/img/Sleeping-Lab-Insomania-254x302@3x.png");
    clip-path: polygon(0 0, 100% 0%, 100% 65%, 0 90%);
    background-position: 100%;
    background-size: cover;
  }

  .images-container {
    position: relative;
    height: 31.4vw;
  }

  .images-container img:first-of-type {
    position: absolute;
    top: 0;
    right: 0;
    width: 63vw;
    height: 17.5vw;
    z-index: 1;
  }

  .images-container img:nth-child(2) {
    position: absolute;
    left: 0;
    top: 6.8vw;
    z-index: 0;
    height: 17vw;
    width: 52vw;
  }

  .images-container img:nth-child(3) {
    position: absolute;
    right: 10.3vw;
    top: 7vw;
    z-index: 2;
    height: 23.8vw;
    width: 51vw;
  }

  /* **************************************************************************************************** */
  /* events-List-Area */
  /* **************************************************************************************************** */
  .events-list {
    display: flex;
    flex-direction: column;
    margin-top: 4.1%;
    align-items: flex-start;
    justify-content: space-between;

  }

  .eng-events-list {
    margin-left: 11% !important;
  }

  .events-item {
    cursor: pointer;
    padding: 1rem;
    margin-bottom: 2%;
    display: flex;
    border-radius: 92px;
    background: #d4deff;
    color: #ffffff;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.16);
    transition: 0.4s;
    font-size: .8rem;
    @media (max-width: 768px) {
      display: block;
    }
    @media (max-width: 1300px) {
      font-size: .8rem;
    }
  }

  .events-item:hover {
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.4);
  }

  .active-item {
    background: #fceedc;
    color: #1d4590;
  }

  li {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    width: 75%;
    margin: 0 auto;
    @media (max-width: 768px) {
      width: 95%;
    }
  }

  .item-bullet {
    height: 1.66vw;
    background: #1d4590;
    border-radius: 50%;
    width: 1.66vw;
    margin-left: .5rem;
  }

  .icon-text {
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    font-size: 158%;
  }

  .icon-text p {
    padding: 0;
    margin: 0;
    line-height: 1;
    margin-right: 1vw;
    margin-left: 0.7vw;
  }

  .icon-text p i {
    /* color: #ffff; */
    font-size: 92.27%;
    line-height: 1.2;
  }

  .offer {
    display: flex;
    justify-content: space-between;
    @media (max-width: 768px) {
      display: block;
    }
  }

  .date-time-container {
    display: flex;
    @media (max-width: 768px) {
      justify-content: center;
      margin: 1rem 0;
    }
  }

  .offer {
    justify-content: space-around;
    align-items: center;
    width: 72%;
    padding: 0 2%;
    @media (max-width: 768px) {
      width: 100%;
      height: 100%;
    }
  }

  .offer p {
    padding: 0;
    margin: 0;
    @media (max-width: 768px) {
      text-align: center;
    }
  }

  .offer p:first-of-type {
    /* color: black; */
    font-size: 210.90909088%;
    @media (max-width: 768px) {
      margin: 1rem 0;
    }
  }

  .offer p:last-child {
    /* color: #1d4590; */
    font-size: 177.95454543%;
  }

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
    border: 1px solid #ffc77a;
    transition: 0.2s;
  }

  .dot-active {
    background: #ffc77a;
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
    color: #ffc77a;
    font-size: 150%;
  }
</style>
