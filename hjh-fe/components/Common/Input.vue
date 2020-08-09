<template>
  <div dir="rtl" class="group">
    <label>
      <input
        class="form-input"
        :type="type"
        :placeholder="label"
        :value="value"
        :required="required"
        v-on:input="$emit('input',$event.target.value)"
      />
    </label>
    <!-- <label :class="['form-input-label', {'shrink': isShrink}]">{{label}}</label> -->
  </div>
</template>
<script>
export default {
  props: {
    label: { type: String },
    type: { type: String },
    value: { type: String, default: "" },
    required: { type: String },
    smallLink: { type: String, default: "" }
  },
  computed: {
    isShrink: function() {
      return this.value ? true : false;
    }
  }
};
</script>


<style lang="scss" scoped>
// npm install sass-loader node-sass --save-dev
$sub-color: #003580;
$main-color: #ffc77a;

@mixin shrinkLabel {
  top: -17px;
  font-size: 12px;
  color: $main-color;
}

.group {
  position: relative;
  margin: 4% auto;
  width: 90%;

  .form-input {
    background: none;
    background-color: white;
    color: $sub-color;
    font-size: 18px;
    text-align: right;
    padding: 2.5%;
    display: block;
    width: 100%;
    border: solid 1px #ffc77a;
    border-radius: 8px;
    margin: 0;
    &:lang(en) {
      text-align: left;
    }
    &:focus {
      outline: none;
    }

    &:focus ~ .form-input-label {
      @include shrinkLabel();
    }
  }

  input[type="password"] {
  }

  .form-input-label {
    color: $sub-color;
    font-size: 14px;
    font-weight: normal;
    position: absolute;
    pointer-events: none;
    left: 0%;
    top: 10px;
    transition: 300ms ease all;

    &.shrink {
      @include shrinkLabel();
    }
  }
}
input::placeholder {
  color: #003580;
  opacity: 0.54;
  font-size: 1.2em;
}
</style>
