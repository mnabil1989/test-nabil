<template>
  <div class="contact-page">
    <div class="pop-up-error">
      {{$t('something went wrong')}}
    </div>
    <div class="pop-up-success">
      {{$t('your request sent successfully')}}
    </div>
    <div class="container">
      <div class="row">
        <Closing></Closing>
        <div style="background-color: #F5F5F5">
        </div>
        <div class="col-12">
          <div class="row">
            <HeadingPage :heading="$t('information')" :sub-title="$t('our whereabouts')" class="d-none"></HeadingPage>
            <div class="col-12">
              <ValidationObserver v-slot="{ handleSubmit }">
                <form @submit.prevent="handleSubmit(feedBack(feedBackObj))" ref="feedback">
                  <div class="row">
                    <validation-provider rules="required" v-slot="{errors}" class="col-12">
                      <textarea v-model="feedBackObj.feedback" :placeholder="$t('message')" class="feed-back-message"></textarea>
                      <p class="p-error">{{ errors[0] }}</p>
                    </validation-provider>
                    <div class="col-12">
                      <button type="submit" class="send-feed-back">{{$t('send')}}</button>
                    </div>
                  </div>
                </form>
              </ValidationObserver>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import Closing from "@/components/Closing";
  import HeadingPage from "@/components/HeadingPage";
  import {mapGetters,mapActions} from "vuex"
  import axios from "axios";

  export default {
    name: "index",
    components: {HeadingPage, Closing},
    layout: "main-layout",
    data() {
      return {
        feedBackObj:{
          feedback : '',
          email: this.$auth.user.email
        }
      }
    },
    computed: {
      ...mapGetters(['siteType'])
    },
    methods: {
      feedBack(feedBackObj){
        console.log("before");
        console.log(feedBackObj);
        this.$axios.post('/api/feedback',feedBackObj).then(res =>{
          console.log(feedBackObj);
          console.log('after');
          this.feedBackObj.feedback = '';
          $(".pop-up-success").animate({left: ".5%"}, 1000)
            .delay(4000)
            .animate({left: "-130%"}, 1500);
        }).catch(error =>{
          console.log(error.data);
          $(".pop-up-error")
            .animate({left: ".5%"}, 1000)
            .delay(4000)
            .animate({left: "-130%"}, 1500);
        })
      }
    },
    mounted() {
      window.scrollTo({top: 0, behavior: 'smooth'});
    }
  }
</script>

<style lang="scss" scoped>
  $main-color: #bb8f32;
  $opacity-color: rgba(0, 97, 159, 0.25);
  $main-font: 'Poppins';
  .contact-page {
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("../../../assets/images/contact.png");
    background-size: cover;
    background-position: 50% 0;
    padding-top: 7rem;
  }
  .feed-back-message{
    border-radius: 1rem;
    color: $main-color;
    display: block;
    width: 100%;
    min-height: 250px;
    border: none;
    padding: 2rem;
    outline: none;
    font-size: 1.5rem;
    transition: all ease-in-out .4s;
    margin-bottom: 2rem !important;
    resize: none;
    &::placeholder{
      font-size: 1.5rem;
      color: $main-color;
      text-transform: capitalize;
    }
    &:focus{
      box-shadow: 0 0 5px 3px #BB8F32;
    }
  }
  .send-feed-back{
    outline: none;
    border-radius: 1rem;
    color: $main-color;
    padding: 1rem 2rem;
    background: #fff;
    text-transform: capitalize;
    margin-bottom: 2rem;
    border: 1px solid transparent;
    transition: all ease-in-out .4s;
    &:hover{
      background-color: #0b0b0b3b;
      border: 1px solid $main-color;
    }
  }
  .p-error{
    color: $main-color;
    font-size: 1.2rem;
    text-align: center;
    width: 100%;
  }
</style>
