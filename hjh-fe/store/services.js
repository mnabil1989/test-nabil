export const state = () => ({
  services: [],
  servicesMeta: [],
  openGraph_services:[],
  twitter_card_services: []
})

export const mutations = {
  set_services(state, services) {
    state.services = services;
  },
  set_Meta_services(state,meta){
    state.servicesMeta = meta;
  },
  set_openGraph_services(state,meta){
    state.openGraph_services = meta;
  },
  set_twitter_card_services(state,meta){
    state.twitter_card_services = meta;
  }

}
export const getters = {
  getservices: (state) => {

    return state.services;
  },
  getServiceMeta: (state) =>{
    return state.servicesMeta;
  },
  getServiceOpenGraph: (state) =>{
    return state.openGraph_services;
  },
  getServiceTwitter: (state) =>{
    return state.twitter_card_services;
  },
  getPageNumber: (state) => {
    let numb = Math.ceil((state.services.length) / 6);
    return numb;
  }
}

export const actions = {
  async setservices({commit}, lang) {
    const data = await this.$axios.$get(`/api/services?lang=${lang}`);
    console.log("services");
    console.log(data)
    commit('set_services', data['services']);
    commit('set_Meta_services', data['meta_tags']);
    commit('set_openGraph_services', data['open_graph']);
    commit('set_twitter_card_services', data['twitter_card']);
  }
}
