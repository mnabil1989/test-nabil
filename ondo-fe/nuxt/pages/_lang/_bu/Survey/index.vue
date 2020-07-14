<template>
  <div class="survey-wrapper mt-5">
    <div
      class="survey-title text-align-center h5"
    >Thank you for using our telemedicine services. Andalusia is very keen on providing you with best medical services available. Please help us improve our performance by</div>
    <div class="survey-Container mb-5">
      <div class="survey-body">
        <div
          class="survey-question mb-5"
          v-for="(question, index) in suveyData['questions']"
          :key="index"
        >
          <div class="question text-">{{question.question}}</div>
          <div class="answers">
            <div class="answer-item" v-for="(answer, i) in question.answers" :key="i">
              <!-- <div class="answer-title">POOR</div>
              <input type="radio" name="answer-radio" />-->

              <label class="payment-radio paypal-option" :class="{'pr-4':$i18n.locale=='ar'}">
                <input type="radio" :value="answer.id" :name="`radio${index}`" required />
                <span class="checkmark" :style="{right: $i18n.locale=='ar'? '0':'left'}"></span>
                {{answer.answer}}
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex">
        <button class="btn-primary submit-condition confirm" @click="SubmitButton">{{$t('Confirm')}}</button>

        <nuxt-link :to="localePath(`/${$route.params.bu}/`)" class="btn btn-danger skip">Skip</nuxt-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: "redirectAuth",
  async asyncData(context) {
    try {
      let SurveyResponse = await context.$axios.get(
        `/${context.params.bu}-api/surveys/1`
      );
      return { suveyData: SurveyResponse["data"]["data"] };
    } catch (err) {
      console.log(err);
      return { suveyData: [] };
    }
  },
  methods: {
    async SubmitButton() {
      let answersList = [];
      for (let index = 0; index < this.suveyData.questions.length; index++) {
        let arr = document.getElementsByName(`radio${index}`);
        let itemChecked = false;
        for (let j = 0; j < arr.length; j++) {
          if (arr[j].checked) {
            itemChecked = true;
            answersList.push(arr[j].value);
            break;
          }
        }
      }
      let objArr = answersList.map(item => {
        return { answer_id: parseInt(item) };
      });
      console.log(objArr);

      if (answersList.length == this.suveyData.questions.length);
      this.$axios
        .post(
          `/${this.$route.params.bu}-api/surveys_users_answers`,
          {
            survey_id: 1,
            answers: objArr
          },
          {
            headers: {
              Authorization: `${this.$auth.getToken(
                `${this.$route.params.bu}Local`
              )}`,
              Accept: "application/json"
            }
          }
        )
        .then(res => {
          this.$router.push(this.localePath(`/${this.$route.params.bu}/`));
        });
    }
  }
};
</script>

<style lang='scss'>
.survey-title {
  width: 98%;
  margin: 2% auto;
}
.survey-wrapper {
  width: 80%;
  margin: 0 auto;
  /* background: white; */
  /* padding: 2%; */
}
.survey-Container {
  /* width: 80%; */
  /* margin: 0 auto; */
  border-radius: 1rem;
  background: white;
  padding: 2%;
}
.answers {
  display: flex;
  justify-content: space-around;
}
.answer-item {
  display: flex;
  align-items: center;
}
.answer-title {
  margin-right: 10%;
}
input {
  transition: 5s;
}

.confirm {
  color: #1d4590;
  margin-right: 1%;
  margin-left: 1%;
  background-color: #fff;
}
.skip {
  color: red;
  margin-left: 1%;
  margin-right: 1%;
  background-color: #fff;
}
</style>
