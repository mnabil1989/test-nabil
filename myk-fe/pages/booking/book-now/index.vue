<template>
  <div class="book-now">
    <Closing></Closing>
    <HeadingPage heading="book now" sub-title="Our whereabouts"></HeadingPage>
    <div class="container">
      <form>
        <div class="row">
          <div class="col-12">
            <label class="customSelect">
              <select name="options">
                <option value="">Select an option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
              </select>
            </label>
          </div>
          <div class="col-12">
            <label class="customSelect">
              <select name="options">
                <option value="">Select an option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
              </select>
            </label>
          </div>
          <div class="col-12">
            <label class="customSelect">
              <select name="options">
                <option value="">Select an option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
              </select>
            </label>
          </div>
          <div class="col-12">
            <label class="customSelect">
              <select name="options">
                <option value="">Select an option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
              </select>
            </label>
          </div>
          <div class="col-md-11 offset-md-1">
            <button type="submit" class="book-now-button">book now</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  import Closing from "../../../components/Closing";
  import HeadingPage from "../../../components/HeadingPage";

  export default {
    name: "index",
    components: {HeadingPage, Closing},
    layout: "main-layout"
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .book-now {
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("../../../assets/images/contact.png");
    background-size: cover;
    background-position: 50% 0;
    padding-top: 7rem;
  }

  .customSelect {
    position: relative;
    display: block;
    max-width: 400px;
    min-width: 75%;
    margin: 2rem auto;
    border: 1px solid #fff;
    background-color: transparent;
    z-index: 10;
    border-radius: 0 !important;
  }

  .customSelect select {
    border: none;
    outline: none;
    background: transparent !important;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0;
    margin: 0;
    padding: 1rem .5rem;
    display: block;
    width: 100%;
    font-size: 14px;
    color: #fff;
  }

  .customSelect select option {
    color: rgba(187, 143, 50, 0.89);
    text-align: center;

    &:hover {
      color: $main-color;
      background-color: transparent;
    }
  }

  .customSelect:after {
    position: absolute;
    right: 0.5rem;
    top: 65%;
    transform: translateY(-50%);
    width: 0;
    height: 50%;
    line-height: 38px;
    content: "";
    display: block;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-top: 10px solid #fff;
    color: #fff;
    font-size: 24px;
  }

  .book-now-button {
    background-color: transparent;
    border: 2px solid #fff;
    color: $main-color;
    padding: .5rem 1rem;
    font-size: 1.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 20%;
    margin: 2rem auto 5rem 2.5rem;
    position: relative;
    transition: all ease-in-out .3s;

    &:after {
      content: "";
      display: block;
      width: 100%;
      height: 100%;
      border: 1px solid rgba(255, 255, 255, 0.28);
      position: absolute;
      right: -1.5rem;
      top: -.6rem;
      transition: all ease-in-out .3s;
    }

    &:hover {
      &:after {
        right: 0;
        top: 0;
      }
    }
  }
</style>
