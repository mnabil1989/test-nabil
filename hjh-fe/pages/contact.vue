<template>
  <div class="wrapper margin-top-mobile" dir="ltr">
    <div class="landing">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-6">
            <div class="l-right">
              <div class="box">
                <img class="image" src="@/assets/andalusia-arabic-slogan.png" alt="andalusia"/>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-6">
            <div class="l-left">
              <div class="contact-us">{{$t('WhoWeAre')}}</div>
              <div @click="scrollDown()" class="scroll-down space-between d-col">
                <div class="dashed-border center">
                  <div class="inner-border center">
                    <i class="fa fa-long-arrow-down"></i>
                  </div>
                </div>
                <div class="divider"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="contact-body">
      <form action="Post" @submit.prevent="submit">
        <div class="contact-form">
          <div class="row">
            <div class="col-12 mt-3">
              <div class="book-title">
                <div class="center">{{$t('contactUs')}}</div>
                <div class="divider center small-divider"></div>
              </div>
            </div>
            <div class="col-12 mt-3">
              <label for="fname">
                <input
                  type="text"
                  id="fname"
                  v-model="contactInfo.first_name"
                  :placeholder="$t('enterName')"
                  name="fname"
                  class="input-contact"
                />
              </label>
            </div>
            <div class="col-12 mt-3">
              <div class="hold-phone">
                <div class="phoneInput">+966 05</div>
                <label for="phone">
                  <input
                    type="tel"
                    class="input-contact phone"
                    v-model="contactInfo.phone"
                    id="phone"
                    name="phone"
                    :placeholder="$t('enterPhone')"
                    maxlength="8"
                    pattern="^(5|0|3|6|4|9|1|8|7)([0-9]{7})$"
                    title="phone number must be 8 numbers only.
           phone number must not begin with 2 .
           e.g. 51234568"
                  />
                </label>
              </div>
            </div>
            <div class="col-12 mt-3">
              <label for="email">
                <input
                  class="input-contact"
                  type="email"
                  v-model="contactInfo.email"
                  id="email"
                  :placeholder="$t('enterEmail')"
                  name="email"
                />
              </label>
            </div>
            <div class="col-12 mt-3">
              <label for="comment">
                <textarea
                  class="input-contact"
                  v-model="contactInfo.further_requirements"
                  :placeholder="$t('notes')"
                  rows="5"
                  id="comment"
                ></textarea>
              </label>
            </div>
            <div class="btns-group d-flex align-items-center">
              <button class="send-btn center" type="submit">{{$t('send')}}</button>
              <IconBar iconSize="140%"/>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  import IconBar from "@/components/Common/IconBar";
  export default {
    layout: "noForm",
    data() {
      return {
        baseUrl:'',
        contactInfo: {
          first_name: this.$auth.loggedIn ? this.$auth.user.name : "",
          email: this.$auth.loggedIn ? this.$auth.user.email : "",
          phone: this.$auth.loggedIn ? this.$auth.user.phone : "",
          further_requirements: ""
        }
      };
    },
    created() {
      if(process.browser){
        this.baseUrl = window.location.origin + window.location.pathname
      }
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
    components: {
      IconBar
    },
    name: "contact",
    methods: {
      scrollDown() {
        window.scrollTo({top: 650, behavior: "smooth"});
      },
      async submit() {
        try {
          let res = await this.$axios.post("/api/contact_us", this.contactInfo);
        } catch (err) {
        }
      }
    }
  };
</script>

<style scoped lang="scss">
  .wrapper {
    position: relative;
  }

  .contact-body {
    margin: 15%;
    position: relative;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    border-radius: 1.2vw;
    padding-top: 1%;
    padding-bottom: 2%;
    background-color: white;
    @media (max-width: 768px) {
      margin: 4%;
    }
  }

  .book-title {
    /*position: absolute;*/
    top: 3%;
    right: 5%;
    color: #1d4590;
    font-size: 270%;
  }

  .contact-form {
    margin-top: 14.4%;
    @media (max-width: 768px) {
      padding: 10px;
    }
  }

  .input-container {
    position: relative;
    width: 74.5%;
    margin: 5% auto !important;

  }



  .phone:lang(en) {
    padding-left: 10rem !important;
  }

  .divider {
    margin-top: 8%;
    width: 75% !important;
    height: 0.2vw;
    border-radius: 20vw;
  }

  .contact-form input {
    height: 60px;
    direction: rtl;
    outline: none;
    color: #1d4590;
    padding-right: 3.7%;
    border: 1px solid #ffc87a;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    border-radius: 1.2vw;
    font-size: 200%;
    &::placeholder{
      font-size: 20px;
    }
  }

  .textarea-container {
    width: 74.5%;
    margin: 5% auto !important;
    margin-bottom: 2% !important;
  }

  .contact-form textarea {
    padding-right: 3.7%;
    outline: none;
    color: #1d4590;
    border: 1px solid #ffc87a;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    direction: rtl;
    border-radius: 1.2vw;
    resize: none;
    font-size: 200%;
  }
  ::placeholder {
    opacity: 0.4;
  }

  .btns-group {
    width: 74.5%;
    margin: 0 auto !important;
  }

  .send-btn {
    border: none;
    outline: none;
    background: white;
    color: #ffc77a;
    height: 3vw;
    width: 10vw;
    border-radius: 1.2vw;
    cursor: pointer;
    font-size: 150%;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.12);
    margin-right: 5%;
    transition: all ease-in-out .3s;
  }

  .send-btn:hover {
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.3);
  }
  .input-contact{
    width: 75%;
    margin: 1rem auto;
    display: block;
    @media (max-width: 768px) {
      width: 90%;
    }

  }
  .hold-phone{
    position: relative;
    width: 75%;
    margin: 0 auto;
    .phone{
      width: 100%;
    }
    .phoneInput {
      transform: translateY(-50%);
      left: 1rem;
      color: #1d4590;
      font-size: 200%;
      position: absolute;
      top: 50%;
      direction: ltr;
      @media (max-width: 768px) {
        font-size: 100%;
        left: 2rem;
      }
    }
    @media (max-width: 768px) {
      width: 90%;
    }
  }
</style>
