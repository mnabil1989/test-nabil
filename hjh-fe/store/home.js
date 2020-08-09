export const state = () => ({
  home: {
    clinics: [],
    posts: [{
      title: ''
    }]
  }
})

export const mutations = {
  SethomePage(state, homeObj) {
    state.home = homeObj;
  },

}
export const getters = {
  getHome: (state) =>{
    return state.home
  },
  getMenu: (state) => {
    return state.home.menu
  },
  getServices: (state) => {
    return state.home.services
  },
  getEvents: (state) => {
    return state.home.events
  },
  getPosts: (state) => {
    return state.home.posts
  },
  getSliders: (state) => {
    return state.home.sliders
  },
  getClincs: (state) => part => {

    if (part == 1)
      return state.home.clinics.slice(0, 2);

    return state.home.clinics.slice(2, 4);
  },

}

export const actions = {
  async setHome({
    commit
  }, lang) {
    const data = await this.$axios.$get(`/api/home?lang=${
      lang
      }`);
    console.log("data");
    console.log(data);
    commit('SethomePage', data['home'])
  }
}
