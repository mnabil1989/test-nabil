<template>
  <div class="container-fluid">
    <div class="row">
      <div style="overflow:hidden;position: relative; width: 100%;" v-if="siteType === 'bistro'">
        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="600"
                type="text/html"
                src="https://www.youtube.com/embed/o5q6iGYynHc?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0"></iframe>
        <div style="position: absolute;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"></div>
        <style>.newst {
          position: relative;
          text-align: right;
          height: 420px;
          width: 520px;
        }

        #gmap_canvas img {
          max-width: none !important;
          background: none !important
        }</style>
      </div>
      <div style="overflow:hidden;position: relative; width: 100%;" v-if="siteType === 'kids'">
        <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="600"
                type="text/html"
                src="https://www.youtube.com/embed/lUAM1LSLqKI?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0"></iframe>
        <div style="position: absolute;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"></div>
        <style>.newst {
          position: relative;
          text-align: right;
          height: 420px;
          width: 520px;
        }

        #gmap_canvas img {
          max-width: none !important;
          background: none !important
        }</style>
      </div>
    </div>
  </div>
</template>

<script>
  import {mapGetters} from "vuex";

  export default {
    name: "Video",
    data() {
      return {
        videoBackground: true,
        autoplay: ''
      }
    },
    computed: {
      ...mapGetters(['home', 'siteType'])
    },
    methods: {
      // playVideo(){
      //   this.videoBackground = false;
      //   this.autoplay = 'autoplay';
      //   this.$refs.video.play();
      //   this.$refs.video.onended = ()=> {
      //     console.log(this);
      //       this.videoBackground = true;
      //       console.log(this.videoBackground);
      //       this.autoplay = '';
      //
      //
      //   };
      //
      // }
    }
  }
</script>

<style scoped lang="scss">
  .for-relative {
    position: relative;

    .video-icon {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      cursor: pointer;
      transition: all linear .3s;
      z-index: 25;
      border-radius: 50%;

      &:hover {
        box-shadow: 0 -2px 15px 0 rgba(0, 0, 0, 0.36);
      }
    }
  }

  .videoBackground {
    background: linear-gradient(to right, rgba(187, 143, 50, 0.24), rgba(187, 143, 50, 0.24)), url("../assets/images/poster.png") !important;
    background-size: cover;
    background-position: 50% 50%;
    width: 100%;
    object-fit: cover;
    height: 100%;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    object-fit: cover;
    transition: all ease-in-out .3s;
  }
</style>
