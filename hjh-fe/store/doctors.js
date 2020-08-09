export const state = () => ({
  doctors: [],
  metaDoctors:[],
  openGraphDoctors:[],
  twitterDoctors:[],
})

export const mutations = {
  set_doctors(state, doctors) {
    state.doctors = doctors;
  },
  set_doctors_meta(state, metaDoctors){
    state.metaDoctors = metaDoctors
  },
  set_doctors_openGraph(state, openGraphDoctors){
    state.openGraphDoctors = openGraphDoctors
  },
  set_doctors_twitter_card(state, twitter_card){
    state.twitterDoctors = twitter_card
  }
}
export const getters = {
  getDoctors: (state) => pageNum => {

    return state.doctors.slice(6 * pageNum - 6, 6 * pageNum)
  },
  getPageNumber: (state) => {
    let numb = Math.ceil((state.doctors.length) / 6);
    return numb;
  },
  getMetaDoctors : (state) =>{
    return state.metaDoctors
  },
  getOpenGraphDoctors : (state) =>{
    return state.openGraphDoctors
  },
  getTwitterDoctors : (state) =>{
    return state.twitterDoctors
  }
}

export const actions = {
  async setDoctors({commit}, lang) {
    const data = await this.$axios.$get(`/api/doctors?lang=${lang}`);
    commit('set_doctors', data['data']);
    commit('set_doctors_meta', data['meta_tags']);
    commit('set_doctors_openGraph', data['open_graph']);
    commit('set_doctors_twitter_card', data['twitter_card']);
  }
}
