<template>
  <div class="icon-bar-container">
    <ul :style="{ 'flex-direction': column === 'true' ? 'column' : 'row' }">
      <li>
        <a
          :style="{ 'font-size': iconSize ? iconSize : '35px' }"
          :href="'https://facebook.com/' + facebookCompanyPath"
          target="_blank"
        >
          <i
            @click="onFacbookIcon()"
            class="fab fa-facebook"
            aria-hidden="true"
          ></i>
        </a>
      </li>
      <li>
        <a
          :style="{ 'font-size': iconSize ? iconSize : '35px' }"
          :href="'https://twitter.com/' + twitterCompanyPath"
          target="_blank"
        >
          <i class="fab fa-twitter-square" aria-hidden="true"></i>
        </a>
      </li>
      <li>
        <a
          :style="{ 'font-size': iconSize ? iconSize : '35px' }"
          :href="'https://snapchat.com/' + snapChatCompanyPath"
          target="_blank"
        >
          <i class="fab fa-snapchat"></i>
        </a>
      </li>
      <li>
        <a
          :style="{ 'font-size': iconSize ? iconSize : '35px' }"
          :href="'https://instagram.com/' + instagramCompanyPath"
          target="_blank"
        >
          <i class="fab fa-instagram" aria-hidden="true"></i>
        </a>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  props: ["column", "iconSize", "onFacbookIcon"],
  data: function() {
    return {
      facebookCompanyPath: "",
      twitterCompanyPath: "",
      snapChatCompanyPath: "",
      instagramCompanyPath: ""
    };
  }
};
</script>
<style scoped>
ul {
  list-style: none;
  display: flex;
  margin: 0 auto;
  /* margin-top: 10%; */
  align-items: center;
  background: transparent;
}
ul li a {
  background-color: #fff;
  text-align: center;
  margin: 0 10px;
  border-radius: 50%;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  background: transparent;
}
ul li .fab {
  position: relative;
  transition: 0.4s;
}
ul li a .fa-facebook {
  color: steelblue;
}
ul li a .fa-twitter-square {
  color: deepskyblue;
}
ul li a .fa-snapchat {
  color: yellow;
}

ul li a .fa-instagram {
  color: coral;
}

ul li a:hover .fab {
  color: gainsboro;
}
</style>
