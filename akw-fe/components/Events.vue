<template>
  <section dir="rtl">
    <div class="offers-box">
      <div class="days">
        <ul>
          <li>الاحد</li>
          <li>الاثنين</li>
          <li>الثلاثاء</li>
          <li>الاربعاء</li>
          <li>الخميس</li>
        </ul>
        <div class="info-event">
          <p>إنتهاء</p>
        </div>
        <div class="appointment">
          <div class="year">
            <span>2020</span>
            <span><font-awesome-icon class="calendar-icon" :icon="['fas','calendar']"/></span>
          </div>
          <div class="time">
            <span>10:00</span>
            <span><font-awesome-icon class="clock-icon" :icon="['fas','clock']"/></span>
          </div>
        </div>
      </div>
      <div class="offer-footer">
        <div class="color-divider"></div>
        <div class="more-offers-container">
          <div class="more-offers-btn">
            <a href="#">المزيد من العروض</a>
          </div>
          <div class="more-offers-icon">
            <div v-for="(item, index) in 3" :key="index" class="small-circle"></div>
            <font-awesome-icon :icon="['fas','arrow-left']"/>
            <i class="fa fa-chevron-left"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="cardic-box">
      <div class="clinc-btn">
        <a href="#">عياده امراض القلب</a>
        <div class="more-offers-icon">
          <div v-for="(item, index) in 3" :key="index" class="small-circle"></div>
          <i class="fa fa-chevron-left"></i>
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
  export default {};
</script>

<style scoped lang="scss">
  @import "assets/css/shared";
  section {
    display: grid;
    margin: 0 2vw;
    margin-top: 8%;
    grid-column-gap: 3vw;
    grid-template-rows: 30.7vw;
    grid-template-columns: 1fr 1fr;
  }

  /* OFFERS-AREA */
  .days{
    position: relative;
    height: 100%;
    ul{
      display: flex;
      justify-content: center;
      align-items: center;
      border-bottom: 1px solid #fff;
      li{
        color: #1d4590;
        margin: 1rem 1.8rem;
        cursor: pointer;
      }
    }
    .info-event{
      text-align: right;
      margin: 0 5rem;
      height: 100%;
      p{
        margin: 1rem 0;
      }
    }
    .appointment{
      position: absolute;
      bottom: 2%;
      left: 2%;
      span{
        color: #1d4590;
        font-size: 1.1rem;
        font-weight: 600;
      }
      .calendar-icon,.clock-icon{
        color: #ffc77a;
      }
    }
  }
  .offers-box {
    background: #d9dff4;
    position: relative;
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
    width: 100%;
    margin: 0 auto;
    height: 1px;
    background: #ffc77a;
  }

  .offer-footer {
    position: absolute;
    bottom: 2%;
    left: 0;
    right: 15%;
  }
  .more-offers-container {
    display: flex;
    margin-right: 10%;
    margin-top: 3%;
    justify-content: space-between;
    width: 40%;
  }
  .more-offers-btn {
    display: flex;
    text-decoration: none;
    background: white;
    border-radius: 52px;
    justify-content: center;
    align-items: center;
    height: 9%;
    padding: .3rem 1rem;
    text-align: right;
  }
  .more-offers-btn a {
    color: #1d4590;
    font-size: .9rem;
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
    background: url("../assets/images/clinicdoc.png") no-repeat;
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
