<template>
  <section :dir="$i18n.locale === 'ar' ? 'rtl' : 'ltr'">
    <div class="offers-box">
      <ul class="offers-list">
        <li v-for="(item, index) in events" :key="index">
          <div class="date-time-container">
            <div class="icon-text">
              <p>
                {{ new Date(item.start).getFullYear() }}
                <i class="far fa-calendar"></i>
              </p>
            </div>
            <div class="icon-text">
              <p>
                {{
                `${new Date(item.start).getHours()}:${new Date(
                item.start
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
              new Date(item.start).toLocaleString($i18n.locale, {
              weekday: "long"
              })
              }}
            </p>
            <p>{{ item.title }}</p>
          </div>
        </li>
      </ul>
      <div class="offer-footer">
        <div class="color-divider"></div>
        <div class="more-offers-container">
          <div @click="$router.push(this.localePath('/events'))" class="more-offers-btn">
            <a>{{$t('moreOffers')}}</a>
          </div>
          <div class="more-offers-icon">
            <div v-for="(item, index) in 3" :key="index" class="small-circle"></div>
            <i class="fa" :class="$i18n.locale=='ar'?'fa-chevron-left':'fa-chevron-right'"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="cardic-box">
      <div class="clinc-btn">
        <a href="#">{{$t('heartClinic')}}</a>
        <div class="more-offers-icon">
          <div v-for="(item, index) in 3" :key="index" class="small-circle"></div>
          <i class="fa" :class="$i18n.locale=='ar'?'fa-chevron-left':'fa-chevron-right'"></i>
        </div>
      </div>
      <div class="line-with-dots">
        <div class="dots-box">
          <div class="dot-line-container">
            <div class="dots">
              <div v-for="(item, index) in 3" :key="index" class="big-circle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  computed: {
    ...mapGetters({ events: "home/getEvents" })
  }
};
</script>

<style lang="scss" scoped>
section {
  display: grid;
  margin: 0 2vw;
  margin-top: 8%;
  grid-column-gap: 3vw;
  grid-template-rows: 30.7vw;
  grid-template-columns: 1fr 1fr;
}

/* OFFERS-AREA */
.offers-box {
  background: #d9dff4;
}
.offers-list {
  display: flex;
  flex-direction: column;
  margin-top: 4.1%;
  height: 63%;
  justify-content: space-between;
}
.offers-list li {
  display: flex;
  margin-right: 1vw;
}

.icon-text {
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: bold;
  font-size: 120%;
  color: #1d4590;
}
.icon-text p {
  padding: 0;
  margin: 0;
  line-height: 1;
  margin-left: 0.7vw;
}
.icon-text p i {
  color: #ffff;
  font-size: 70%;
  line-height: 1.2;
}
.offer {
  display: flex;
  justify-content: space-between;
}
.date-time-container {
  display: flex;
}
.offer {
  justify-content: space-around;
  align-items: center;
  border: solid 1px #ffffff;
  border-radius: 92px;
  width: 72%;
  height: 100%;
  padding: 0 2%;
}
.offer p {
  padding: 0;
  margin: 0;
}
.offer p:first-of-type {
  color: #ffff;
  font-size: 160%;
}
.offer p:last-child {
  color: #1d4590;
  font-size: 135%;
}

.color-divider {
  width: 70%;
  margin: 0 auto;
  height: 1px;
  background: #ffc77a;
}

.offer-footer {
  margin-top: 8%;
}
.more-offers-container {
  display: flex;
  margin-right: 10%;
  margin-top: 3%;
  justify-content: space-between;
  width: 35%;
}
.more-offers-container:lang(en) {
  margin-left: 10%;
}
.more-offers-btn {
  width: 68.54%;
  display: flex;
  text-decoration: none;
  font-size: 110%;
  background: white;
  border-radius: 52px;
  justify-content: center;
  align-items: center;
  height: 9%;
}
.more-offers-btn a {
  color: #1d4590;
  padding: 2px 0;
}
.more-offers-icon {
  display: flex;
  width: 20%;
  color: #1d4590;
  align-items: center;
  justify-content: space-between;
}
.small-circle {
  height: 4px;
  width: 4px;
  border-radius: 50%;
  background: #1d4590;
}
.big-circle {
  height: 7px;
  width: 7px;
  border-radius: 50%;
  background: #1d4590;
}
/* ***************************************************** */
/* CARDIC-BOX */
/* ***************************************************** */
.cardic-box {
  position: relative;
  background: url("../../assets/img/IMGL1667-Edit.png") no-repeat;
  background-position: 100% 100%;
  background-size: cover;
  grid-column-start: 0;
}

.clinc-btn {
  position: absolute;
  z-index: 5;
  border: solid 1px #ffc77a;
  text-decoration: none;
  width: 25%;
  height: 6.9%;
  display: flex;
  border-radius: 52px;
  justify-content: space-around;
  align-items: center;
  background: white;
  bottom: 4%;
  right: 7%;
}
.clinc-btn a {
  color: #1d4590;
  font-size: 100%;
  font-weight: 300;
  line-height: 1;
  text-align: center;

  text-decoration: none;
}
.dots {
  width: 35%;
  display: flex;
  margin-right: 42%;
  justify-content: space-between;
}
.dots:lang(en) {
  margin-left: 24%;
}
.dot-line-container {
  display: flex;
  position: absolute;
  width: 100%;
  height: 50px;
  justify-content: space-between;
}
.dot-line-container::after {
  position: absolute;
  content: "";
  top: 5%;
  width: 100%;
  height: 2px;
  background: #ffc77a;
  z-index: -1;
}
.dots-box {
  position: relative;
  z-index: 1;
}
.line-with-dots {
  position: absolute;
  width: 100%;
  bottom: 8%;
}
.more-offers-btn {
  cursor: pointer;
}
.more-offers-btn:hover {
  opacity: 0.8;
}

@media only screen and (max-width: 413px) {
  section {
    grid-row-gap: 3vw;
    grid-template-rows: 55vw 55vw;
    grid-template-columns: 1fr;
    font-size: 8px;
  }
}
@media only screen and (min-width: 413px) {
  section {
    grid-row-gap: 3vw;
    grid-template-rows: 55vw 55vw;
    grid-template-columns: 1fr;
    font-size: 11px;
  }
}
@media only screen and (min-width: 600px) {
  section {
    grid-row-gap: 3vw;
    grid-template-rows: 50vw 50vw;
    grid-template-columns: 1fr;
    font-size: 12px;
  }
}
@media only screen and (min-width: 700px) {
  section {
    font-size: 9px;
  }
  section {
    display: grid;
    margin: 0 2vw;
    margin-top: 8%;
    grid-column-gap: 3vw;
    grid-template-rows: 30.7vw;
    grid-template-columns: 1fr 1fr;
  }
}

@media only screen and (min-width: 800px) {
  section {
    font-size: 10px;
  }
}

@media only screen and (min-width: 900px) {
  section {
    font-size: 11px;
  }
}

@media only screen and (min-width: 1000px) {
  section {
    font-size: 13px;
  }
}

@media only screen and (min-width: 1200px) {
  section {
    font-size: 16px;
  }
}
</style>
