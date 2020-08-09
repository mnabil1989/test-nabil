<template>
  <div class="wrapper">
    <div class="middle-menu">
      <div class="item center">
        <a>{{$t('Centers')}}</a>
        <i class="fa fa-caret-down"></i>

        <div id="myDropdown" class="dropdown-content">
          <nuxt-link
            :to="localePath('/service')"
            class="last-item"
            exact-active-class="active"
          >{{$t('services')}}</nuxt-link>

          <nuxt-link
            :to="localePath('/clinic')"
            class="last-item"
            exact-active-class="active"
          >{{$t('clinics')}}</nuxt-link>
        </div>
      </div>
      <div class="item center" v-for="(item, index) in getNaveMenu" :key="index">
        <nuxt-link
          :to="localePath(`${item.url}`)"
          class="last-item"
          exact-active-class="active"
        >{{ item.name }}</nuxt-link>
      </div>
      <!-- <div class="item center">
        <NuxtLink :to="localePath(`/healthInfo`)">معلومات صحيه</NuxtLink>
      </div>
      <div class="item center">
        <NuxtLink :to="localePath('/doctors')">الأطباء</NuxtLink>
      </div>
      <div class="item center">
        <a>من نحن</a>
      </div>-->
    </div>
  </div>
</template>
<script>
import { mapGetters } from "vuex";

export default {
  created() {
    console.log("this is nave menu");
    console.log(this.getNaveMenu);

    // document.addEventListener("click", () => {
    //   this.itemHoverd = false;
    // });
  },
  data() {
    return {
      // itemHoverd: false
    };
  },
  computed: {
    ...mapGetters({ getNaveMenu: "home/getMenu" })
  },
  methods: {
    showDropDown() {
      // this.itemHoverd = !this.itemHoverd;
      event.stopPropagation();
    }
  }
};
</script>

<style scoped>
.wrapper {
  display: flex;
  justify-self: center;
}
.middle-menu {
  display: grid;
  grid-template-columns: repeat(5, fit-content(100%));
  grid-gap: 20px;
  justify-items: center;
  align-items: stretch;
  color: #003580;
}
a {
  color: #003580;
  font-size: 110%;
  text-decoration: none;
  cursor: pointer;
}
.item center{
  transition:  all ease-in-out .5s;
}
.dropdown-content {
  transition:  all ease-in-out .5s;
  top: 65px;
  /* bottom: -113px; */
}
.item {
  position: relative;
  /* display: inline-block; */
}
.dropdown-content a {
  color: #003580;
  width: 90%;
  margin: 0 auto;
  text-align: center;
  padding: 12% 16px;
  text-decoration: none;
  border-bottom: 1px solid #f5ae48;
  display: block;
}
.last-item {
  /* padding-bottom: 20% !important; */
  border-bottom: none !important;

  text-decoration: none;
}
.dropdown-content a:hover {
  color: #f5ae48;
}
.item:hover .dropdown-content {
  opacity: 1;
}
.show {
  display: block;
}
.bg-screen {
  display: inline;
}
.sm-screen {
  display: none;
}
@media only screen and (max-width: 850px) {
  .bg-screen {
    display: none;
  }
  .sm-screen {
    display: inline;
  }
  .middle-menu {
    grid-template-columns: 1fr;
    /* align-items: stretch; */
    font-size: 14px;
    width: 100%;
    text-align: center;
    grid-template-rows: repeat(5, 7vw);
    justify-items: stretch;
  }
  .dropdown-content {
    width: 40vw;
    top: 0;
    left: 5% !important;
    /* bottom: -25vw !important; */
    right: auto;
  }
}
</style>
