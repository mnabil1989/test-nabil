import Vue from 'vue';
import { ValidationObserver, ValidationProvider , extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import { required , confirmed , email ,regex} from 'vee-validate/dist/rules';
Vue.component('ValidationObserver', ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);

Object.keys(rules).forEach(rule => {
  extend(rule, rules[rule]);
});

extend('required', {
  ...required,
  message: 'This field is required'
});
extend('email', {
  ...email,
  message: 'email is not valid'
});
extend('regex', {
  ...regex,
  message: 'this field is not valid'
});
extend('confirmed', {
  ...confirmed,
  message: 'This field is not match with password field'
});
