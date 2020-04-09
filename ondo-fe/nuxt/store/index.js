import axios from "axios";

export const state = () => ({
  locales: ['en', 'ar'],
  locale: 'en',
  categories: [],
  lang: 'en',
  reirectedLogin: false,
  appointment: 0,
  dir: 'ltr',
  home: null,
  menu: null,
  client: {},
  token: '',
});

export const getters = {
  redirectable(state) {
    return state.reirectedLogin;
  }
};

export const mutations = {
  setLangEn(state, payload) {
    state.lang = payload;
  },
  setDirEn(state, payload) {
    state.dir = payload;
  },
  setLangAr(state, payload) {
    state.lang = payload;
  },
  setDirAr(state, payload) {
    state.dir = payload;
  },
  SET_LANG(state, locale) {
    if (state.locales.includes(locale)) {
      state.locale = locale
    }
  },
  fillClient(state, payload) {
    state.client = payload;
  },
  SetToken(state, payload) {
    state.token = payload;
  }
  , reirected_login(state, payload) {
    state.reirectedLogin = payload
  },
  SetAppointment(state, payload) {
    state.appointment = payload;
  },
};

export const actions = {
  setLangEn({ commit }, payload) {
    commit('setLangEn', payload);
  },
  setDirEn({ commit }, payload) {
    commit('setDirEn', payload);
  },
  setLangAr({ commit }, payload) {
    commit('setLangAr', payload);
  },
  setDirAr({ commit }, payload) {
    commit('setDirAr', payload);
  },
  fillClient({ commit }, payload) {
    commit("fillClient", payload)
  },
  setToken({ commit }, payload) {
    commit("SetToken", payload)
  },
  reirectedLogin({ commit }, payload) {
    commit("reirected_login", payload)
  },
  setAppointment({commit}, payload) {
    commit('SetAppointment', payload)
  }
};
