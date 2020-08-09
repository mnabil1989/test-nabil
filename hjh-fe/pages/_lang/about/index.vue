<template>
  <div dir="ltr" class="about-us-container margin-top-mobile">
    <div class="landing">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-6">
            <div class="l-right">
              <div class="box">
                <img class="image" src="../../../assets/andalusia-arabic-slogan.png" alt="andalusia"/>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-6">
            <div class="l-left">
              <div class="contact-us">{{$t('WhoWeAre')}}</div>
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
    <div class="second-section">
      <div class="title-container">
        <h1>{{$t('hjh-name')}}</h1>
      </div>
      <div class="content-container">
        <p class="main-content">
          تأسست في جدة عام 1984 على يد مالكها د. درويش مصطفى زقزوق، ثم أصبحت
          رائدة في تقديم الرعاية الطبية في المملكة، واستطاعت المستشفى أن تستحوذ
          على ثقة عملائها كأفضل مستشفى في جدة، وخلال عامين فقط تم مضاعفة سعة
          المستشفى بزيادة عدد السرائر والعيادات وغرف العمليات والولادة، ونسعى
          دائماً لتوفير أفضل طرق العناية بصحة مرضانا والتطور المستمر لتقديم أفضل
          مستويات الخدمات الطبية
        </p>
      </div>
    </div>
    <div class="third-section figures-container">
      <div class="square square-one"></div>
      <div class="square square-two"></div>
      <div class="square square-three"></div>
    </div>
    <div class="fourth-section">
      <div class="img-container">
        <img src="@/assets/img/doctor-shortage.jpg" alt="doctor-shortage"/>
      </div>
      <div class="text-container title-container">
        <h2>مجموعة أندلسية للخدمات الطبية</h2>
      </div>
      <div class="text-container content-container">
        <p>
          إحدى المؤسسات الرائدة في مجال الرعاية الصحية في الشرق الأوسط، والتي
          تضم مجموعة مميزة من المستشفيات العامة والمراكز الطبية المتخصصة وعدد من
          العيادات المتنوعة في مصر والسعودية .استطاعت أندلسية منذ بدايتها عام
          1984 في جدة بالسعودية، وبفضل د. درويش زقزوق أن تضع بصمتها الفريدة في
          تقديم رعاية وخدمات متميزة .وتوسعت خلال أكثر من 34 عامًا لتصبح مجموعة
          متكاملة للخدمات الطبية في السعودية ومصر
        </p>
      </div>
    </div>
    <div class="fifth-section">
      <div class="title-container center">اتصل بنا</div>
      <div class="address-icon-container">
        <div class="address-container">
          <ul>
            <li>العنوان</li>
            <li>حي الجامعة - شارع السيرة العطرة</li>
            <li>البريد الالكتروني</li>
            <li>hjh.info@andulasiagroup.net</li>
            <li>الهاتف</li>
            <li>0126806666</li>
            <li>رقم الهاتف</li>
            <li>6803380</li>
          </ul>
        </div>
        <div class="icon-container">
          <span>
            <i class="fas fa-phone-alt"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data(){
      return{
        baseUrl:''
      }
    },
    head(){
      return{
        link: [
          {
            rel: "canonical",
            href:  this.baseUrl
          }
        ]
      }
    },
    created() {
      if(process.browser){
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    methods: {
      scrollDown() {
        window.scrollTo({top:650, behavior:"smooth"});
      }
    }
  };
</script>

<style lang='scss' scoped>
  .about-us-container {
    position: relative;
  }

  div.first-section {
    color: #1d4590;
    display: flex;
    justify-content: center;
  }

  div.first-section > div {
    width: 50%;
    display: flex;
    justify-content: center;
    margin-top: 5%;
    margin-bottom: 3%;
  }

  .first-half > h1 {
    align-self: center;
    font-size: 400%;
  }

  .second-half > .img-container {
    border: 2px solid #ffce8a;
  }

  .second-half > .img-container > img {
    margin: 10% -10% -10% 10%;
  }

  div.second-section {
    color: #1d4590;
    margin: 7%;
    margin-bottom: 0;
    padding: 2%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .second-section > div {
    margin: 2%;
    @media (max-width: 545px) {
      margin: 0;
    }
  }

  .second-section > .content-container {
    padding: 5%;
    text-align: center;
    font-size: 1.5rem;
    @media (max-width: 545px) {
      padding: 0;
      margin-top: 1rem;
    }
  }

  .figures-container {
    margin-bottom: 5%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .figures-container > .square {
    width: 3vw;
    height: 3vw;
    border: 2px solid #ffce8a;
    transform: rotate(45deg);
  }

  .square-two {
    margin-top: -1%;
    background: white;
  }

  .square-three {
    margin: 2% 0 0 0.5%;
  }

  .fourth-section {
    position: relative;
    width: 100%;
    margin-bottom: 5%;
    @media (max-width: 768px) {
      margin-top: 4rem;
    }
  }

  .fourth-section > .img-container {
    padding: 0;
    width: 100%;
  }

  .fourth-section > .img-container > img {
    width: 100%;
    @media (max-width: 768px) {
      height: 650px;
      object-fit: cover;
    }
    @media (max-width: 454px) {
      height: 800px;
    }
  }

  .fourth-section > .text-container {
    color: #1d4590;
    font-weight: 900;
    position: absolute;
    background: transparent;
    background: black;
  }
  .title-container{
    @media (max-width: 545px) {
      margin: 0;
      h1{
        font-size: 1.3rem;
      }
    }
  }
  .fourth-section > .title-container {
    text-align: center;
    bottom: 50%;
    right: 2%;
    margin-bottom: 1%;
    background: transparent;
    @media (max-width: 768px) {
      bottom: 102%;
      right: 0;
      left: 0;
      text-align: center;
      h2{
        font-size: 1.3rem;
      }
    }
  }

  .fourth-section > .content-container {
    bottom: 0;
    top: 55%;
    width: 100%;
    padding: 3% 1% 0 8%;
    text-align: right;
    color: white;
    font-size: 1.25rem;
    opacity: 0.5;
    border-radius: 200px 0 0 0;
    p {
      line-height: 2.9;
      font-size: 1.5rem;
      font-weight: lighter;
      width: 96%;
      margin: 0 auto;
    }
    @media (max-width: 768px) {
      right: 0;
      left: 0;
      top: 0;
      bottom: 0;
      border-radius: 0;
      padding: 0;
      p{
        line-height: 3;
        width: 100%;
        font-size: 1.5rem;
        padding: 25px;
      }
    }
    @media (max-width: 545px) {
      right: 0;
      left: 0;
      top: 0;
      bottom: 0;
      border-radius: 0;
      padding: 0;
      p{
        line-height: 1.7;
        width: 100%;
        font-size: 1.5rem;
        padding: 25px;
      }
    }
  }

  .fifth-section {
    position: relative;
    display: flex;
    /*justify-content: space-around;*/
    margin-bottom: 10%;
    width: 100%;
    color: white;
  }

  .address-icon-container {
    display: flex;
    flex-direction: row-reverse;
    justify-content: space-between;
    background: #ffc77a;
    border-radius: 400px 0;
    width: 100%;
    padding-right: 20%;
    padding-left: 10%;
    margin-right: 13.8%;
    @media (max-width: 992px) {
      border-radius: 100px 0;
      display: block;
      margin-right: 0;
      padding-right: 10%;
      padding-left: 10%;
    }
  }

  .fifth-section > .title-container {
    position: absolute;
    background: #ffc77a;
    right: 0;
    font-size: 200%;
    height: 7vw;
    width: 15%;
    @media (max-width: 992px) {
      top: 3%;
      right: 50%;
      width: 65%;
      transform: translateX(50%);
    }
  }

  .fifth-section > .address-icon-container > .address-container > ul {
    list-style: none;
    padding: 0;
    text-align: center;
    font-size: 1.5rem;
    @media (max-width: 992px) {
      margin-top: 6rem;
    }
  }
  .fifth-section > .address-icon-container > .address-container > ul > li{
    margin-top: 1.2rem;
    @media (max-width: 992px) {
      font-size: 16px;
    }
  }
  .fifth-section > .address-icon-container > .icon-container > span {
    font-size: 11rem;
    margin-right: 90%;
    margin-top: 10rem;
    display: block;
    @media (max-width: 992px) {
      margin-right: auto;
      font-size: 6rem;
      margin-top: 0;
      text-align: center;
    }
  }

  span > i {
    transform: rotate(20deg);
    margin-top: 60%;
    @media (max-width: 992px) {
      margin-top: 15%;
    }
  }

  .main-content {
    line-height: 3;
    @media (max-width: 992px) {
      line-height: 1.8;
    }
  }
</style>
