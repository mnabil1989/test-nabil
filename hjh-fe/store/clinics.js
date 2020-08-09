export const state = () => ({
  clinics: [],
  clinic_meta:[],
  openGraph:[],
  twitter:[],
})

export const mutations = {
  set_clinics(state, clinics) {
    state.clinics = clinics;
  },
  set_clinics_meta(state,clinic_meta){
    state.clinic_meta = clinic_meta
  },
  set_openGraph_Clinics(state, openGraph){
    state.openGraph = openGraph
  },
  set_twitter_Clinics(state, twitter){
    state.twitter = twitter
  }
}
export const getters = {
  getclinics: (state) => pageNum => {
    return state.clinics.slice(6 * pageNum - 6, 6 * pageNum)
  },
  getClinicsMeta: (state) => {
    return state.clinic_meta
  },
  getOpenGraphClinics: (state)  => {
    return state.openGraph
  },
  getTwitterClinics: (state)  => {
    return state.twitter
  },
  getPageNumber: (state) => {
    let numb = Math.ceil((state.clinics.length) / 6);
    return numb;
  }
}

export const actions = {
  async setclinics({commit}, lang) {
    const data = await this.$axios.$get(`/api/clinics?lang=${lang}`);
    console.log("clinic");
    commit('set_clinics', data['clinics']);
    commit('set_clinics_meta', data['meta_tags']);
    commit('set_openGraph_Clinics', data['open_graph']);
    commit('set_twitter_Clinics', data['twitter_card']);
  }
}
