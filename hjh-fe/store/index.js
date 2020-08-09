export const state = () => ({
  locales: ['en', 'ar'],
  locale: 'ar',
})

export const getters = {}

export const mutations = {
  SET_LANG (state, payload) {
      state.locale = payload
    },
}

export const actions = {}
