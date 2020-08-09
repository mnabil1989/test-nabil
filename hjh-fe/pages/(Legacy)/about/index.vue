<template>
  <div class="about-us-container container" dir="rtl">
    <div class="first-section">
      <div class="first-half">
        <h1>من نحن</h1>
      </div>
      <div class="second-half">
        <div class="img-container">
          <img
            src="https://www.computerhope.com/jargon/r/random-dice.jpg"
            alt
          />
        </div>
      </div>
    </div>
    <div class="second-section">
      <div class="title-container">
        <h1>مستشفى أندلسية حي الجامعة</h1>
      </div>
      <div class="content-container">
        <p>
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
        <img
          src="https://azbigmedia.com/wp-content/uploads/2017/11/doctor-shortage.jpg"
          alt
        />
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
      <div class="title-container">
        <h2>اتصل بنا</h2>
      </div>
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
export default {};
</script>

<style scoped>
div.first-section {
  color: #1d4590;
  display: flex;
  justify-content: center;
}
div.first-section > div {
  width: 50%;
  display: flex;
  justify-content: center;
  margin-top: 50px;
  margin-bottom: 20px;
}
.first-half > h1 {
  align-self: center;
  font-size: 4rem;
}
.second-half > .img-container {
  border: 2px solid #ffce8a;
}
.second-half > .img-container > img {
  margin: 20px -20px -20px 20px;
}
div.second-section {
  color: #1d4590;
  margin: 100px;
  margin-bottom: 0;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.second-section > div {
  margin: 20px;
}
.second-section > .content-container {
  padding: 50px;
  text-align: center;
  font-size: 1.5rem;
}
.figures-container {
  margin-bottom: 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.figures-container > .square {
  width: 30px;
  height: 30px;
  border: 2px solid #ffce8a;
  transform: rotate(45deg);
}

.square-two {
  margin-top: -10px;
  background: white;
}
.square-three {
  margin: 20px 0 0 5px;
}
.fourth-section {
  position: relative;
  width: 100%;
  margin-bottom: 50px;
}
.fourth-section > .img-container {
  padding: 0;
  width: 100%;
}
.fourth-section > .img-container > img {
  width: 100%;
}

.fourth-section > .text-container {
  position: absolute;
  background: transparent;
  background: black;
}

.fourth-section > .title-container {
  bottom: 30%;
  right: 2%;
  margin-bottom: 10px;
  background: transparent;
}
.fourth-section > .content-container {
  bottom: 0;
  top: 70%;
  width: 100%;
  padding: 30px 10px 0 80px;
  text-align: right;
  color: white;
  font-size: 1.25rem;
  opacity: 0.5;
  border-radius: 200px 0 0 0;
}

.fifth-section {
  display: flex;
  justify-content: space-around;
  margin-bottom: 200px;
  color: white;
}
.address-icon-container {
  display: flex;
  background: wheat;
  border-radius: 400px 0;
  margin-left: 20%;
  padding: 0 10% 0 30%;

  margin-left: 0;
}
.fifth-section > .title-container {
  background: wheat;
  align-self: start;
  width: 100%;
  text-align: start;
  padding: 1%;
}

.fifth-section > .address-icon-container > .address-container > ul {
  list-style: none;
  padding: 0;
  text-align: center;
  font-size: 1.5rem;
}

.fifth-section > .address-icon-container > .icon-container > span {
  font-size: 11rem;
  margin-right: 90%;
}
span > i {
  transform: rotate(20deg);
  margin-top: 60%;
}
</style>
