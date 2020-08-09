export const state = () => ({
  posts: [],
  metaPosts:[],
  openGraph:[],
  twitter:[],
  favPosts: []
})

export const mutations = {
  set_posts(state, posts) {
    state.posts = posts;
  },
  set_Meta_Posts(state, metaPosts){
    state.metaPosts = metaPosts
  },
  set_openGraph_Posts(state, openGraph){
    state.openGraph = openGraph
  },
  set_twitter_Posts(state, twitter){
    state.twitter = twitter
  },
  set_fav(state, posts) {
    state.favPosts = posts;
  },
  del_fav(state, postId) {
    let result = state.favPosts.filter(item => {
      return item.id != postId
    });
    state.favPosts = result;
  },
  add_fav(state, post) {

    state.favPosts.push(post);
  }
}
export const getters = {
  getposts: (state) => pageNum => {
    return state.posts.slice(4 * pageNum - 4, 4 * pageNum)
  },
  getMetaposts: (state)  => {
    return state.metaPosts
  },
  getOpenGraphPosts: (state)  => {
    return state.openGraph
  },
  getTwitterPosts: (state)  => {
    return state.twitter
  },
  getFavposts: (state) => pageNum => {
    return state.favPosts.slice(4 * pageNum - 4, 4 * pageNum)
  },
  checkFav: (state) => postId => {
    let isFav = state.favPosts.some(item => item.id == postId);

    return isFav;
  },
  getPageNumber: (state) => {
    let numb = Math.ceil((state.posts.length) / 4);
    return numb;
  },
  getFavPageNumber: (state) => {
    console.log(state)
    let numb = Math.ceil((state.favPosts.length) / 4);
    return numb;
  }
}

export const actions = {
  async setposts({commit}, lang) {
    const data = await this.$axios.$get(`/api/posts?lang=${lang}`);
    console.log("data")
    console.log(data)
    commit('set_posts', data['posts']);
    commit('set_Meta_Posts', data['meta_tags']);
    commit('set_openGraph_Posts', data['open_graph']);
    commit('set_twitter_Posts', data['twitter_card']);
  },
  async setFavPosts({
    commit
  }, lang) {
    const data = await this.$axios.$get(`/api/user-favorite-posts?lang=${
      lang
      }`);

    commit('set_fav', data['posts']);
  },
  deleteFavPost({
    commit
  }, postId) {

    commit('del_fav', postId);

  },
  addFavPost({
    commit
  }, post) {

    commit('add_fav', post);

  }

}
