<template>
  <div class="contact-container">
    <div class="title">{{$t('contactUs')}}</div>
    <div>
      <form class="col-12" @submit.prevent="submitForm">
        <div class="row">
          <div class="col-md-6 col-12 mt-3">
            <label for="email">{{$t('email')}} :</label>
            <div>
              <input
                type="email"
                class="form-control"
                name="email"
                id="email"
                v-model="ContactInfo.email"
              />
            </div>
          </div>
          <div class="col-md-6 col-12 mt-3">
            <label for="phone">{{$t('phone')}} :</label>
            <div class="phone-input">
              <p class="fixed-number" style="z-index:555;">&#10088;+966&#10089; -</p>
              <input
                v-model="ContactInfo.phone"
                type="tel"
                style="text-align:ltr;"
                class="form-control"
                name="phone"
                id="phone"
                maxlength="10"
                pattern="^(05)([0-9]{8})$"
                title="phone number must be 10 numbers only.
           phone number start with 05 .
           e.g. 0512345679"
              />
            </div>
          </div>
          <div class="col-md-6 col-12 mt-3">
            <label for="clincDrop">{{$t('clinics')}} :</label>
            <div>
              <select class="form-control" id="clincDrop">
                <option selected disabled>{{$t('clinic')}}</option>
                <option v-for="(item, index) in clinics" :value="item.id" :key="index">{{ item.name }}</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 col-12 mt-3">
            <label for="name">{{$t('name')}} :</label>
            <div>
              <input type="name" v-model="ContactInfo.name" class="form-control" name="name" id="name"/>
            </div>
          </div>
          <div class="col-12 mt-3">
            <label>{{$t('Comments')}} :</label>
            <textarea v-model="ContactInfo.comments" rows="5" class="form-control"/>
          </div>
          <div class="col-12">
            <input type="submit" :value="$t('submit')" class="submit-btn"/>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  export default {
    async created() {
      let clincsRes = await this.$axios.get(
        `/api/clinics?lang=${this.$i18n.locale}`
      );
      console.log(clincsRes);

      this.clinics = clincsRes["data"]["clinics"];
    },
    methods: {
      async submitForm() {
        var e = document.getElementById("clincDrop");
        let selectedClinic = e.options[e.selectedIndex].value;

        await this.$axios.post("/api/booking", {
          ...this.ContactInfo,
          clinic_id: selectedClinic
        });
      }
    },
    data() {
      return {
        clinics: [],
        ContactInfo: {
          email: this.$auth.loggedIn ? this.$auth.user.email : "",
          name: this.$auth.loggedIn ? this.$auth.user.name : "",
          // phone: this.$auth.loggedIn ? this.$auth.user.phone : "",
          phone: "",
          comments: ""
        }
      };
    }
  };
</script>

<style lang='scss'>
  .contact-container {
    @media (max-width: 500px) {
      width: 100%;
    }
    background: white;
    box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.23);
    padding: 2%;
    min-height: 500px;
    border-radius: 20px;
    width: 85%;
    margin: 0 auto;

    .title {
      font-size: 24px;
      text-align: center;
      color: #1d4590;
      font-weight: 600;
      @media (max-width: 500px) {
        font-size: 18px;
      }
    }

    .v-spacer {
      height: 50px;
    }

    .form-control {
      font-size: 15px;
      min-height: 40px;
    }

    .phone-input {
      position: relative;

      .fixed-number {
        direction: ltr;
        position: absolute;
        top: 50%;
        font-size: 15px;
        left: 20px;
        transform: translateY(-50%);
        margin: 0;
        color: #1d4590;
      }

      input {
        direction: ltr;
        padding-left: 5rem;
      }
    }
  }

  label {
    display: block;
    text-align: right;
    color: #1d4590;

  }

  .submit-btn {
    width: 50%;
    margin: 2rem auto;
    display: block;
    border: 1px solid #ffc77a;
    font-size: 180%;
    box-shadow: 0 2px 4px 0 rgba(4, 102, 122, 0.13);
    border-radius: 8px;
    background: white;
    color: #003580;
    transition: all ease-in-out .4s;
    outline: none;

    &:hover {
      background-color: #ffc77a;
      color: white;
    }
  }

  .form-control {
    border: 1px solid #ffc77a;
    outline: none;
    transition: all ease-in-out .3s;

    &:focus {
      box-shadow: 0 2px 4px 0 #ffc77a59;
      background: #ffc77acf;
      color: #003580;
      border: none;
    }
  }
</style>
