<template>
  <div class="footer">
    <div class="empty"></div>
    <div class="right-footer">
      <div class="Finfo-container">
        <div class="awards-title">
          <div class="center">تواصل معنا</div>
          <div class="divider center small-divider"></div>
        </div>
        <div class="awards-list">
          <ul>
            <li class="algin-center">
              <div class="award-desc">sari@andalusiagroup.net</div>
            </li>
            <li class="algin-center">
              <div class="award-desc">3258 شارع صارى, تقاطع شارع الخطيب</div>
            </li>
            <li class="algin-center">
              <div class="award-desc">التبريزى, حى البوادى, جدة</div>
            </li>
            <li class="algin-center">
              <div class="award-desc">0122166677</div>
            </li>
            <li class="algin-center">
              <div class="award-desc">0122166677</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="middle-footer">
      <div class="Finfo-container">
        <div class="awards-title">
          <div class="center">تواصل معنا</div>
          <div class="divider center small-divider"></div>
        </div>
        <div class="awards-list">
          <ul>
            <li class="algin-center">
              <div class="award-desc">أندلسية للخدمات الطبية</div>
            </li>
            <li class="algin-center">
              <div class="award-desc">مستشفى أندلسية حي الجامعة</div>
            </li>
            <li class="algin-center">
              <div class="award-desc">مراكز أندلسية لطب الأسنان</div>
            </li>
            <li class="algin-center">
              <div class="award-desc">عيادات أندلسية (الأمير فواز - السنابل)</div>
            </li>
            <li class="algin-center">
              <div class="award-desc">أندلسية لصحة وجمال المرأة</div>
            </li>
            <li class="algin-center">
              <div class="award-desc">مستشفيات أندلسية</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="left-footer">
      <img
        src="../../../assets/img/cbahi-logo.png"
        srcset="../../../assets/img/cbahi-logo@2x.png 2x, ../../../assets/img/cbahi-logo@3x.png 3x"
        class="cbahi-logo"
        alt="logo"
      />
      <div class="awards-title mr-auto ml-auto mb-2">
        <div class="center">تواصل معنا</div>
        <div class="divider center small-divider"></div>
      </div>
      <div class="mob-app">
        <div class="mob-store">
          <img src="../../../assets/img/Google-Play.png" alt="Google-Play" />
        </div>
        <div class="mob-store">
          <img src="../../../assets/App-store.png" alt="App-store" />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ListContainer from "@/components/Common/ListContainer";
import LeftContainer from "./LeftContainer.vue";

export default {};
</script>
<style scoped lang="scss">
.right-footer,
.middle-footer,
.left-footer {
  justify-self: center;
  color: #fff;
  @media (max-width: 768px) {
    margin-top: 1rem;
  }
}
.small-divider {
  background: #ee9c2b;
}
.Finfo-container {
  width: 100%;
  color: #ffffff;
  height: 100%;
}
.cbahi-logo {
  width: 25vw;
  object-fit: contain;
  @media (max-width: 768px) {
    width:75%
  }
}

.awards-title {
  margin-top: 5%;
  width: 50%;
  line-height: 2.2;
  font-size: 120%;
}

ul {
  padding-top: 1%;
}
ul li {
  font-size: 90%;
  margin: 2% auto;
}

.mob-app {
  display: flex;
  justify-content: right;
  align-content: center;
  color: #fff;
  flex: 1;
}
.mob-store:first-of-type {
  flex: 1;
  text-align: end;
}
.mob-store:nth-child(2) {
  flex: 1;
  text-align: start;
}
.mob-app img {
  margin-right: 1%;
  width: 10vw;
  object-fit: scale-down;
  height: 2.1vw;
  @media (max-width: 768px) {
    width: 70%;
    object-fit: contain;
    height: auto;
    display: block;
    margin: 1rem auto;
  }
}
@media only screen and (max-width: 600px) {
  .left-footer {
    text-align: center;
    width: 100%;
  }
}
</style>
