import Vuex from 'vuex';
import axios from "axios";

const createStore = () => {
  return new Vuex.Store({
    state: () => ({
      locales: ['en', 'ar'],
      locale: 'ar',
      categories: [],
      lang: 'en',
      dir: 'ltr',
      home: null,
      menu: null,
      siteType: 'bistro',
    }),
    getters:{
      siteType : state => {
        return state.siteType;
      },
      home: state => {
        return state.home
      }
    },
    mutations: {
      setCategories(state, categories) {
        state.categories = categories
      },
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
      SiteType(state, payload) {
        state.siteType = payload;
      },
      SET_LANG(state, locale) {
        if (state.locales.includes(locale)) {
          state.locale = locale
        }
      },
      setStateLogin(state, payload) {
        state.auth.loggedIn = payload;
      },
    },
    actions: {
      setCategories({commit}) {
        commit('setCategories');
      },
      setLangEn({commit}, payload) {
        commit('setLangEn', payload);
      },
      setDirEn({commit}, payload) {
        commit('setDirEn', payload);
      },
      setLangAr({commit}, payload) {
        commit('setLangAr', payload);
      },
      setDirAr({commit}, payload) {
        commit('setDirAr', payload);
      },
      SiteType({commit}, payload) {
        commit('SiteType', payload)
      },
      setStateLogin({ commit }, payload) {
        commit('setStateLogin', payload)
      },
    }
  })
};

export default createStore
