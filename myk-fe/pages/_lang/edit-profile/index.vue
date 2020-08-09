<template>
  <div class="edit-profile">
    <div class="pop-up-error">
      {{$t('something went wrong')}}
    </div>
    <div class="pop-up-success">
      {{$t('your request sent successfully')}}
    </div>
    <div class="profile-links">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 text-center upload-img">
            <form enctype="multipart/form-data" class="loading-img">
              <div class="model-search" v-if="loadingModel">
                <div class="spinner-border" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
              <img :src="'/storage/'+$auth.user.avatar" alt="profile-img" class="img-fluid profile-img">
              <label for="image" class="input-image">
                <input type="file" accept="image/*" @change="uploadImage($event)" id="image">
                <i class="fas fa-plus-circle"></i>
              </label>
            </form>
          </div>
          <div class="col-md-5">
            <ToggleLinksProfile></ToggleLinksProfile>
          </div>
          <div class="col-md-4">
            <SocialLinks :isStyleProfile=true></SocialLinks>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="form text-center edit-form my-3">
          <ValidationObserver v-slot="{ handleSubmit }">
            <form @submit.prevent="handleSubmit(updateProfile(updateInfo))">
              <i class="fas fa-cog" @click="change"></i>
              <ValidationProvider rules="required" v-slot="{ errors }">
                <label for="name" class="g-input">
                  <input id="name" type="text" :placeholder="$t('enter your full name')" v-model="updateInfo.name">
                </label>
                <p class="p-error">{{ errors[0] }}</p>
                <div v-for="error in errorName" :key="error">
                  <p class="p-error">{{error}}</p>
                </div>
              </ValidationProvider>
              <ValidationProvider rules="required|email" v-slot="{ errors }">
                <label for="email" class="g-input">
                  <input id="email" type="email" :placeholder="$t('enter your email address')"
                         v-model="updateInfo.email">
                </label>
                <p class="p-error">{{ errors[0] }}</p>
                <div v-for="error in errorMail" :key="error">
                  <p class="p-error">{{error}}</p>
                </div>
              </ValidationProvider>
              <ValidationProvider rules="required|digits:8" v-slot="{ errors }">
                <label for="phone" class="g-input">
                  <input id="phone" type="tel" :placeholder="$t('your phone')" v-model="updateInfo.phone">
                </label>
                <p class="p-error">{{ errors[0] }}</p>
                <div v-for="error in errorPhone" :key="error">
                  <p class="p-error">{{error}}</p>
                </div>
              </ValidationProvider>
              <button class="save-change">{{$t('save change')}}</button>
            </form>
          </ValidationObserver>


        </div>
        <!--password -->
        <div class="form text-center edit-form">
          <ValidationObserver v-slot="{ handleSubmit }">
            <form @submit.prevent="handleSubmit(updatePassword(update))">
              <ValidationProvider rules="required" v-slot="{ errors }">
                <label for="password" class="g-input">
                  <input id="password" type="password" :placeholder="$t('password')" v-model="update.current_password">
                </label>
                <p class="p-error">{{ errors[0] }}</p>
              </ValidationProvider>
              <ValidationProvider rules="required" v-slot="{ errors }" vid="confirmation">
                <label for="newPassword" class="g-input">
                  <input id="newPassword" type="password" :placeholder="$t('new password')" v-model="update.new_password">
                </label>
                <p class="p-error">{{ errors[0] }}</p>
              </ValidationProvider>
              <ValidationProvider rules="required|confirmed:confirmation" v-slot="{ errors }">
                <label for="confirm-password" class="g-input">
                  <input id="confirm-password" type="password" :placeholder="$t('confirm password')"
                         v-model="update.new_password_confirmation">
                </label>
                <p class="p-error">{{ errors[0] }}</p>
              </ValidationProvider>
              <button class="save-change">{{$t('save change')}}</button>
            </form>
          </ValidationObserver>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import ImageProfile from "@/components/ImageProfile";
  import ToggleLinksProfile from "@/components/ToggleLinksProfile";
  import SocialLinks from "@/components/SocialLinks";
  import axios from "axios";

  export default {
    name: "index",
    layout: "myprofile",
    components: {ImageProfile, ToggleLinksProfile, SocialLinks},
    data() {
      return {
        Image: require('@/assets/images/avatar-user.jpg'),
        imageUrl: null,
        loadingModel: false,
        update: {
          current_password: null,
          new_password: null,
          new_password_confirmation: null,
        },
        updateInfo: {
          name: "",
          email: "",
          address: "s",
          gender: "male",
          phone: null,
        },
        errorName: null,
        errorMail: null,
        errorPassword: null,
        errorConfirmationPassword: null,
        errorPhone: null,
        errors: [],
      }
    },
    methods: {
      change() {
        this.updateInfo.name = this.$auth.user.name;
        this.updateInfo.email = this.$auth.user.email;
        this.updateInfo.address = this.$auth.user.address;
        this.updateInfo.phone = this.$auth.user.phone;
      },
      uploadImage($event) {
        this.loadingModel = true;
        const image = $event.target.files[0];
        var form_data = new FormData();
        form_data.append('avatar', image);
        axios.post('/api/update-profile-image', form_data, {headers: {Authorization: this.token}}).then(res => {
            this.loadingModel = false;
            this.Image = 'images'+res.data.user.avatar;
            $(".pop-up-success")
              .animate({left: ".5%"}, 1000)
              .delay(4000)
              .animate({left: "-130%"}, 1500);
            this.$router.go();
          }
        ).catch(e => {
            $(".pop-up-error")
              .animate({left: ".5%"}, 1000)
              .delay(4000)
              .animate({left: "-130%"}, 1500);
          }
        );
      },
      updatePassword(update) {
        axios.put('/api/update-profile-password', update, {headers: {Authorization: this.token}}).then(response => {
          console.log(response)
          $(".pop-up-success")
            .animate({left: ".5%"}, 1000)
            .delay(4000)
            .animate({left: "-130%"}, 1500);
          this.$router.go();
        }).catch(error => {
          console.log(error);
          $(".pop-up-error")
            .animate({left: ".5%"}, 1000)
            .delay(4000)
            .animate({left: "-130%"}, 1500);
        })
      },
      updateProfile(updateInfo) {
        console.log(updateInfo);
        axios.put('/api/update-profile', updateInfo, {headers: {Authorization: this.token}}).then(response => {
          $(".pop-up-success")
            .animate({left: ".5%"}, 1000)
            .delay(4000)
            .animate({left: "-130%"}, 1500);
          this.$router.go();
        }).catch(error => {
          $(".pop-up-error")
            .animate({left: ".5%"}, 1000)
            .delay(4000)
            .animate({left: "-130%"}, 1500);
        })
      }
    },
    mounted() {
      this.change();
      this.token = localStorage.getItem('auth._token.local');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .edit-form {
    border: 1px solid $main-color;
    border-radius: 10px;
    padding-top: 1.5rem;
    width: 80%;
    margin: 0 auto;
    position: relative;

    .fa-cog {
      color: $main-color;
      position: absolute;
      right: 1rem;
      top: 1.5rem;
      @media (max-width: 545px) {
        top: .5rem;
      }
    }
  }

  .profile-links {
    position: relative;
    margin-bottom: 3rem;

    &:before {
      content: "";
      display: block;
      width: 100%;
      height: 2px;
      background: $main-color;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
    }
  }

  .save-change {
    color: $main-color;
    border: 1px solid $main-color;
    border-radius: 15px;
    background-color: transparent;
    margin: 1rem 0;
    padding: .5rem 1rem;
    transition: all ease-in-out .3s;
    @media (max-width: 992px) {
      margin: 0 0 1rem 0;
    }

    &:hover {
      background-color: rgba(0, 0, 0, 0.6);
      color: #fff;
    }
  }

  .g-input {
    input {
      box-shadow: 0 2px 4px 0 rgba(4, 102, 122, 0.13);
      border: solid 1px $main-color;
      color: #000;

      &::placeholder {
        color: $main-color;
      }

      &:focus {
        box-shadow: 0 2px 4px 0 #a87c31;
        background: rgba(187, 143, 50, 0.6);
        color: #000;
      }
    }
  }

  .upload-img {
    position: relative;
    margin-top: 1rem;
    .input-image {
      position: absolute;
      bottom: -.5rem;
      left: 65%;
      transform: translate(-50%);
      text-align: center;
      display: flex;
      justify-content: center;
      margin: 0;

      .fa-plus-circle {
        font-size: 2.2rem;
        cursor: pointer;
      }

      input {
        visibility: hidden;
        display: none;
      }
    }
  }

  .profile-img {
    width: 266px;
    height: 266px;
    object-fit: cover;
    border-radius: 50%;
    background-color: #fff;
  }
  html:lang(ar){
    .save-change{
      font-family: myFirstFont
    }
    .g-input input{
      font-family: 'Poppins';
    }
  }
  .loading-img{
    position: relative;
    .model-search {
      border-radius: 50%;
      width: 266px;
      height: 266px;
      margin: 0 auto;
      position: absolute;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      background: rgba(62, 64, 70, 0.41);
      z-index: 666;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      .spinner-border {
        margin-top: 38%;
        width: 4rem;
        height: 4rem;
      }
    }
  }
</style>
