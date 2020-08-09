<template>
  <div class="left-menu">
    <div class="events">
      <nuxtLink :to="localePath('/events')">
        <i class="fa fa-calendar"></i>
      </nuxtLink>
    </div>
    <div class="d-none">
      <div v-if="$i18n.locale === 'ar'">
        <NuxtLink :to="switchLocalePath('en')">
          <p>
            <i class="fas fa-globe"></i>
            English
            <i class="fa fa-caret-down"></i>
          </p>
        </NuxtLink>
      </div>
      <div class="langer" v-else-if="$i18n.locale === 'en'">
        <NuxtLink :to="switchLocalePath('ar')">
          <p>
            <i class="fas fa-globe"></i> العربية
          </p>
        </NuxtLink>
      </div>
    </div>
    <div class="v-divider"></div>
    <div class="social-bar">
      <a href="#"><img
        src="../../assets/img/fb.png"
        srcset="../../assets/img/fb@2x.png 2x, ../../assets/img/fb@3x.png 3x"
        class="social-icon"
        alt="fb"
      /></a>
      <a href="#">
        <img
          src="../../assets/img/twitter.png"
          srcset="../../assets/img/twitter@2x.png 2x, ../../assets/img/twitter@3x.png 3x"
          class="social-icon"
          alt="twitter"
        />
      </a>
      <a href="#">
        <img
          src="../../assets/img/snap-icon-22.png"
          srcset="../../assets/img/snap-icon-22@2x.png 2x, img/snap-icon-22@3x.png 3x"
          class="social-icon"
          alt="snap"
        />
      </a>
      <a href="#">
        <img
          src="../../assets/img/Instagram_icon.png"
          srcset="../../assets/img/Instagram_icon@2x.png 2x, ../../assets/img/Instagram_icon@3x.png 3x"
          class="social-icon"
          alt="Instagram_icon"
        />
      </a>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
.left-menu {
  display: grid;
  grid-template-columns: 1fr 2fr 1px 3fr;
  grid-gap: 8px;
  align-items: center;
  /* justify-items: center; */
}
.left-menu a {
  color: #003580;
  display: inline-block;
  margin: 0 .3rem;
}
/* social */

.social-icon {
  width: 1.5vw;
  height: 1.5vw;
  object-fit: contain;
}

.social-bar {
  display: flex;

  justify-content: space-around;
}

.v-divider {
  height: 65%;
  border-right: 1px solid #003580;
}
p {
  padding: 0px;
  margin: 0px;
}
.events {
  font-size: 150%;
}

.langer,
.fa-globe {
  font-size: 0.85em;
}

@media only screen and (max-width: 850px) {
  .bg-screen {
    display: none;
  }
  .sm-screen {
    display: inline;
  }
  .left-menu {
    font-size: 10px;
    grid-template-columns: 1fr;

    font-size: 14px;
    width: 100%;
    text-align: center;
    grid-template-rows: repeat(3, 10vw);
    justify-items: stretch;
  }

  .v-divider {
    display: none;
  }
  .social-icon {
    width: 7vw;
    height: 7vw;
  }
}
</style>
