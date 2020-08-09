import Vuex from 'vuex';
const createStore = () => {
  return new Vuex.Store({
    state: () => ({
      locales: ['en', 'ar'],
      locale: 'ar',
    }),
    getters:{
    },
    mutations: {
      SET_LANG(state, locale) {
        if (state.locales.includes(locale)) {
          state.locale = locale
        }
      },
    },
    actions: {
    }
  })
};

export default createStore
