<template>
  <section>
    <h2 class="title">{{$t('clinics')}}</h2>
    <div class="container">
      <div class="clinc-container">
        <div class="row">
          <div class="col-lg-6 col-12 left-clinic px-0">
              <div v-for="(item, index) in clinic('1')" :key="index" class="hold-all-clinic">
                <nuxt-link :to="localePath(`/clinic/${item.slug}`)" class="to-clinics">
                <p class="main-hading-clinic">{{ item.name }}</p>
                <div  class="clinc-box" :style="backgroundStyles(item.photo)" :class="`g${index}`">
                  <div class="hold-info-clinic">
                    <p>{{ item.small_description }}</p>
                  </div>
                </div>
                </nuxt-link>
              </div>
          </div>
          <div class="col-lg-6 col-12 right-clinic px-0">
            <div v-for="(item, index) in clinic('2')" :key="index" class="hold-all-clinic">
              <nuxt-link :to="localePath(`/clinic/${item.slug}`)" class="to-clinics">
              <p class="main-hading-clinic">{{ item.name }}</p>
              <div  class="clinc-box" :style="backgroundStyles(item.photo)" :class="`g${index}`">
                <div class="hold-info-clinic">
                  <p>{{ item.small_description }}</p>
                </div>
              </div>
              </nuxt-link>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="more-box" @click="$router.push(localePath('/clinic'))">
      <div class="circle-arrow">
        <div class="half-circle"></div>
        <i class="fas" :class="$i18n.locale=='ar'?'fa-arrow-left':'fa-arrow-right'"></i>
      </div>
      <h3>{{$t('more-btn')}}</h3>
    </div>

    <div class="color-divider"></div>
  </section>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  methods: {
    // key
    backgroundStyles(image) {
      return {
        backgroundImage: `url(${image})`
      };
    }
  },
  computed: {
    ...mapGetters({ clinic: "home/getClincs" })
  }
};
</script>

<style scoped lang="scss">
section {
  position: relative;
  margin-top: 5%;
  /* background: red; */
}
.to-clinics{
  text-decoration: none;
}
.color-divider {
  width: 70%;
  margin: 0 auto;
  margin-top: 6vw;
  height: 1px;
  background: #ffc77a;
  @media (max-width: 768px) {
    margin-top: 8vw;
  }
}
.title {
  text-align: center;
  font-size: 200%;
  font-weight: 500;
  color: #1d4590;
  margin-bottom: 3vw;
}
/* ********************************************************************************** */
/* CLINIC-AREA */
/* ********************************************************************************** */
.main-hading-clinic{
  margin-bottom: 1rem;
}
.hold-all-clinic{
  width: 100%;

}
.left-clinic,.right-clinic{
  .hold-all-clinic{
    position: relative;
    height: 300px;
    &:before{
      content: "";
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #1d4590;
      position: absolute;
      top: 0;
      left: 0;
      transform: translate(-50%,0);
      @media (max-width: 992px) {
        display: none;
      }
    }
    @media (max-width: 992px) {
      height: 400px;
    }
  }
}
.right-clinic {
  margin-top: 8rem;
  .hold-all-clinic {
    margin-top: 0;
    &:before {
      left: auto;
      right: 0;
      transform: translate( 50% , 50%);
      @media (max-width: 992px) {
        display: none;
      }
    }
  }
  @media (max-width: 992px) {
    margin-top: 0;
  }
}
.clinc-box {
  height: 182px;
  width: 60%;
  margin: 0 auto;
  transition: all ease-in-out 0.4s;
  position: relative;
  background-size: cover;
  border-radius: .50rem;
  background-position: center;
  box-shadow: 0 0 9px 0 #00000059;
  .hold-info-clinic{
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    opacity: 0;
    background-color: rgba(0, 0, 0, 0.7);
    border-radius: .50rem;
    overflow: hidden;
    transition: opacity ease-in-out .5s .5s;
    padding: 1rem;
    p{
      color: #fff;
      line-height: 2;
      margin: 0;
      font-size: 1rem;
      @media (max-width: 992px) {
        line-height: 1.7;
      }
    }
  }
  &:hover{
    width: 85%;
    height: 250px;
    .hold-info-clinic{
      opacity: 1;
    }
    @media (max-width: 992px) {
      height: 350px;
    }
  }
}
/* ********************************************************************************** */
/* CLINIC-AREA */
/* ********************************************************************************** */
.left {
  display: flex;
  flex-direction: column;
  height: 33vw;
  margin-top: 9.5vw;
  width: 100%;
  align-items: flex-end;
  justify-content: space-between;
}
p {
  text-align: center;
  font-size: 120%;
  color: #1d4590;
  font-weight: 500;
}

.ball-incicator {
  background-color: #1d4590;
  height: 2.3vw;
  width: 2.3vw;
  border-radius: 50%;
}
.grid {
  display: grid;
  width: 53.59%;
  margin: 0 auto;
  grid-gap: 2.5vw;
  grid-template-columns: 1fr 2.3vw 1fr;
  grid-template-rows: auto;
}
.right {
  /* height: 730px; */
  height: 52vw;
  display: flex;

  flex-direction: column;
  justify-content: space-between;
}
.middle {
  display: flex;
  /* height: 570px; */
  height: 42vw;

  flex-direction: column;
  justify-content: space-between;
}

/* ******************************************************************** */
.our-clincs-box {
  width: 7.39vw;
  position: absolute;
  right: 3.125vw;
  bottom: 3%;
}
.our-clincs-box p {
  font-size: 130%;
  /* margin: 0; */
  padding: 4%;
}
/* MORE-BOX-AREA */
.more-box {
  position: absolute;
  left: 19vw;
  bottom: 1vw;
  width: 9vw;
  display: flex;
  justify-content: space-between;
  align-items: center;
  h3{
    color: #1d4590;
  }
}
.more-box p {
  padding: 0;
  margin: 0;
  line-height: 1;
  font-size: 170%;
  font-weight: 500;
}
.half-circle:lang(ar) {
  width: 1.8vw;
  height: 46px;
  height: 3.4vw;
  border-top-left-radius: 90px;
  border-bottom-left-radius: 90px;
  border: 0.6vw solid #1d4590;
  border-right: 0;
}
.circle-arrow i {
  position: absolute;
  font-size: 200%;
  font-size: 2.4vw;
  top: 0.5vw;
  left: 1vw;
  color: #1d4590;
  padding: 0;
  margin: 0;
}
.circle-arrow {
  position: relative;
}
.more-box {
  cursor: pointer;
  transition: 0.3s;
}
.more-box:hover {
  opacity: 0.8;
}
</style>
