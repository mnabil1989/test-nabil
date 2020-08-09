<template>
  <div class="notification-container">
    <div v-for="(item, index) in 5" :key="index" class="notification-item center">
      لأن الحياة مع ابتسامه طفلك ,عيادة الأنسان بمركز أندلسية لصحة الطفل تقدم
      تجربة ترفيهية و ممتعة ,حتي لا يشعر طفلك بأي خوف أو توتر , و يتميز طاقمنا
      الطبي بالتعامل المرن و المرح مع الأطفال
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang='scss' scoped>
.notification-container {
  padding-bottom: 5%;
}
.notification-item {
  height: 200px;
  @media (max-width: 600px) {
    height: 100px;
  }
  width: 72%;
  border: 1px solid #ffc77a;
  border-radius: 1vw;
  margin: 0 auto;
  font-size: calc(120% + 1vw);
  text-align: right;
  padding-right: 7%;
  padding-left: 3%;
  color: #1d4590;
  margin-bottom: 5%;
}
</style>
