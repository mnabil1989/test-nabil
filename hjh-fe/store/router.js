// here we use all data for pages navigation

export const state = () => ({
    //home page data requested from home page fetch method
    homePage:{}
  })
  
  export const getters = {
    //return all home page data from the state
    getHomeData(state){
      return state.homePage
    },
    // returns the menus of the header navbar of home page
    getHomeMenu(state){
        return state.homePage.menus
    },
    // returns the title of a home page
    getHomeTitle(state){
      return state.homePage.settings[0].address_ar
    }
  }
  
  export const mutations = {
      //sets the home page data
    SET_HOME_DATA(state, payload) {
        state.homePage  = payload
      }
  }
  
  export const actions = {
    setHomeData({commit}, payload){
        commit('SET_HOME_DATA', payload)
    }
  }
  