<template>
  <div class="container">
    <div class="menu-bar-container">
      <!-- this containes both image profile and menu bar -->
      <MenuBar :isNotifications="true" />
      <h1>{{ userName }}</h1>
    </div>
    <div class="notifications-container">
      <h2>الاشعارات</h2>
      <ul dir="rtl">
        <li
          class="notification-item"
          v-for="item in notificationsList"
          :key="item"
        >
          {{ item }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import MenuBar from "@/components/UserProfile/MenuBar";

export default {
  components: {
    MenuBar
  },
  data: function() {
    return {
      userName: "محمــد عبــداللـه",
      notificationsList: [
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`,
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`,
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`,
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`,
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`,
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`
      ]
    };
  }
};
</script>

<style scoped>
.menu-bar-container {
  margin: 20px auto 20px auto;
  padding: 20px;
  text-align: center;
  position: relative;
}
.menu-bar-container > h1 {
  color: #1d4590;
  padding: 60px;
}

.notifications-container {
  margin: 0 auto 200px;
  text-align: right;
  color: #1d4590;
}
.notifications-container > ul {
  list-style: none;
  font-size: 1.5rem;
  text-align: right;
}
ul > li.notification-item {
  border: 2px solid #ffc77a;
  border-radius: 2rem;
  margin: 30px;
  width: 75%;
  padding: 20px;
}
</style>
