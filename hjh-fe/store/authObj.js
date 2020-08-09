export const state = () => ({
  authObj: {
    defredirectPath: "/home",
    hasChangedPath: false,
  }
})
export const mutations = {
  changeCurrentPath(state, val) {
    state.authObj.hasChangedPath = val;
  },
}
export const getters = {
  hasChangedPath(state) {
    return state.authObj.hasChangedPath;
  }
}
