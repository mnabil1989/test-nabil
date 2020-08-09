import Vue from 'vue'
import {mapState} from 'vuex'

const User = {
    install(Vue, options){
        Vue.mixin({
            computed:{
                ...mapState({
                    user: state => state.auth.user,
                    authenticated: state => state.auth.loggedIn
                    //"auth/authenticated"
                })
            }
        })
    }
}

Vue.use(User);