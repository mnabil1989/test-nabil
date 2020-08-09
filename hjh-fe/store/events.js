export const state = () => ({
  events: []
})

export const mutations = {
  set_events(state, events) {
    state.events = events;
  },

}
export const getters = {
  getevents: (state) => pageNum => {

    return state.events.slice(5 * pageNum - 5, 5 * pageNum)
  },
  getPageNumber: (state) => {
    let numb = Math.ceil((state.events.length) / 5);
    return numb;
  }
}

export const actions = {
  async setevents({
    commit
  }, lang) {
    const data = await this.$axios.$get(`/api/events?lang=${
      lang
      }`);
    console.log(data)
    commit('set_events', data['events']);
  }
}
