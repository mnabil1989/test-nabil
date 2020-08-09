<template>
  <div dir="rtl" class="profile-container margin-top-mobile">
    <transition name="slide-fade">
      <div v-show="uploadPhoto" class="popUp-box">
        <div class="content-container-upload">
          <div class="popUp-title">{{$t('uploadPhoto')}}</div>
          <div class="divider"></div>
          <div @click="uploadImage()" class="popUp-btn center">{{$t('upload')}}</div>
          <input @change="addPhoto($event)" type="file" id="upload-btn" style="display:none"/>
        </div>
      </div>
    </transition>

    <div class="container profile-box">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="image-box">
            <img id="avatar" :src="$auth.user.avatar" alt="not found"/>
          </div>
        </div>
        <div class="col-lg-8 col-12">
          <div :style="{ opacity: uploadPhoto ? 0.6 : 1 }">
            <div class="user-info-container">
              <div class="info">
                <div class="user-name center">{{ $auth.user.name }}</div>
                <div class="user-phone center">{{ $auth.user.phone }}</div>
              </div>
              <div class="profile-btns space-between">
                <i
                  @click.stop="showPopUp()"
                  class="fas fa-image"
                  :class="{ 'active-section': activeSection == 'image' }"
                ></i>
                <!-- <i
                  @click="changeSection('notification')"
                  class="fa fa-bell-o"
                  :class="{ 'active-section': activeSection == 'notification' }"
                ></i>-->
                <i
                  @click="changeSection('like')"
                  class="fa fa-heart"
                  :class="{ 'active-section': activeSection == 'like' }"
                ></i>

                <i
                  @click="changeSection('settings')"
                  class="fa fa-cog"
                  :class="{ 'active-section': activeSection == 'settings' }"
                ></i>
                <i
                  @click="changeSection('changePass')"
                  class="fa fa-key"
                  :class="{ 'active-section': activeSection == 'changePass' }"
                ></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="profile-section">
            <transition name="slide-fade">
              <likes v-if="activeSection == 'like'"/>
              <notification v-if="activeSection == 'notification'"/>
              <settings v-if="activeSection == 'settings'"/>
              <changePass v-if="activeSection == 'changePass'"/>
            </transition>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import likes from "../../../components/profile/likes";
  import notification from "../../../components/profile/notification";
  import settings from "../../../components/profile/settings";
  import changePass from "../../../components/profile/changePass";

  export default {
    middleware: "auth",
    components: {
      likes,
      notification,
      settings,
      changePass
    },
    head() {
      return{
        link: [
          {
            rel: "canonical",
            href: this.baseUrl
          }
        ]
      }
    },
    mounted() {
      window.addEventListener("click", () => {
        this.uploadPhoto = false;
      });
    },
    created() {
      if(process.browser){
        this.baseUrl = window.location.origin + window.location.pathname
      }
    },
    data() {
      return {
        baseUrl:'',
        activeSection: "settings",
        uploadPhoto: false
      };
    },
    methods: {
      changeSection(section) {
        this.activeSection = section;
      },
      showPopUp() {
        this.uploadPhoto = true;
      },
      uploadImage() {
        document.getElementById("upload-btn").click();
      },
      async addPhoto(event) {
        let selectedFile = event.target.files[0];
        let reader = new FileReader();
        let image = document.getElementById("avatar");
        image.title = selectedFile.name;
        reader.onload = function (event) {
          image.src = event.target.result;
        };
        reader.readAsDataURL(selectedFile);
        console.log(selectedFile);
        const fmData = new FormData();
        fmData.append("avatar", selectedFile, selectedFile.name);
        await this.$axios
          .post("/api/update-profile-image", fmData)
          .then(res => {
            console.log(res);
            this.$auth.fetchUser();
          })
          .catch(err => {
            console.log(err.response);
          });
      }
    }
  };
</script>

<style scoped lang="scss">
  .profile-container {
    height: auto;
    position: relative;
    padding-top: 9.3%;
  }

  .image-box {
    position: absolute;
    width: 100%;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    max-height: 450px;
    top: -2rem;
    right: 10.8%;
    border-radius: 20px;
    @media (max-width: 768px) {
      position:relative;
      top: auto;
      right: auto;
    }
  }

  .image-box img {
    width: 100%;
    object-fit: cover;
    max-height: 450px;
    border-radius: 20px;
  }

  .profile-box {
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    width: 100%;
    margin: 0 auto;
    border-radius: 20px;
  }

  .user-info-container {
    width: 94%;
    margin-right: auto;
  }

  .info {
    padding-top: 6.3%;
  }

  .info div {
    background: #edebeb;
    border: 1px solid #ffc77a;
    line-height: 2;
    border-radius: 20px;
    color: #1d4590;
    font-size: 180%;
    margin-top: 5.7%;
  }

  .profile-btns {
    direction: ltr;
    cursor: pointer;
    color: #1d4590;
    width: 45%;
    margin: 0 auto;
    font-size: 200%;
    margin-top: 11%;
    transition: 0.4s;
    @media (max-width: 768px) {
      width: 90%;
    }
  }

  .active-section {
    color: #ffc77a;
  }

  .profile-btns i:hover {
    color: #ffc77a;
  }

  .profile-section {
    margin-top: 10%;
  }

  /* ************************************************************* */
  /* POPUP-SECTION */
  /* ************************************************************* */

  .popUp-box {
    position: fixed;
    background: rgba(76, 76, 76, 0.7);
    top: 0;
    left: 0;
    right: 0;
    margin: 0 auto;
    height: 100%;
    width: 100%;
    z-index: 150;
    color: #1d4590;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .popUp-title {
    font-size: 150%;
    text-align: center;
    margin: 1rem 0;
    @media (max-width: 768px) {
      font-size: 120%;
    }
  }

  .content-container-upload {
    width: 50%;
    margin: 0 auto;
    border: 2px solid #ffc77a;
    border-radius: 20px;
    background-color: #fff;
    @media (max-width: 768px) {
      width: 90%;
    }
  }

  .divider {
    height: 4px;
    border-radius: 20px;
  }

  .popUp-btn {
    border: 1px solid #ffc77a;
    border-radius: 20px;
    font-size: 140%;
    width: 35%;
    line-height: 2;
    margin: 2rem auto;
    transition: 0.4s;
    @media (max-width: 768px) {
      width: 70%;
      margin: 1rem auto;
    }
  }

  .popUp-btn:hover {
    cursor: pointer;
    color: #ffffff;
    background: #ffc77a;
  }
</style>
