import webpack from 'webpack'
export default {
  mode: 'universal',
	 server: {
    port: 4040, // default: 3000
    host: '172.31.18.242'  // default: localhost
  },

  transition:'slide-fade',
  router: {
    linkActiveClass: 'active-link',
    linkExactActiveClass: 'exact-active-link',
    middleware: 'i18n'
  },
  /*
  ** Headers of the page
  */
  head: {
    htmlAttrs: {
      lang: 'ar',
      dir: 'rtl'
    },
    title: process.env.npm_package_name || '',
    meta: [
      {charset: 'utf-8'},
      {name: 'viewport', content: 'width=device-width, initial-scale=1'},
      {hid: 'description', name: 'description', content: process.env.npm_package_description || ''},
      {name:'theme-color',content : '#C756A1'}
    ],
    link: [
      {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'},
      {
        rel: "stylesheet",
        href: "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",
        integrity: "sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN",
        crossorigin: "anonymous"
      }
    ],
    script: [
      {
        src: "https://code.jquery.com/jquery-3.3.1.slim.min.js",
        type: "text/javascript"
      },
      {
        src: "https://kit.fontawesome.com/daad4d5851.js",
        crossorigin: "anonymous"
      }]
  },
  /*
  ** Customize the progress-bar color
  */
  loading: {color: '#C756A1'},
  /*
  ** Global CSS
  */
  css: ["swiper/css/swiper.css"],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    "~/plugins/vee-validate", {src: "~/plugins/vue-swiper.js", ssr: false},

    ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [],
  /*
  ** Nuxt.js modules
  */
  modules: [
    // Doc: https://bootstrap-vue.js.org
    'bootstrap-vue/nuxt',
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',
    '@nuxtjs/auth',
    'nuxt-i18n'
  ],
  /*
  ** Axios module configuration
  ** See https://axios.nuxtjs.org/options
  */
  axios: {
    baseURL: "http://15.185.56.15:4030",
    proxy: true
  },
  proxy: {
    '/api/': 'http://15.185.56.15:4030',
  },
  i18n: {
    strategy: 'prefix_except_default',
    locales: [
      {
        code: 'en',
        file: 'en.js'
      },
      {
        code: 'ar',
        file: 'ar.js'
      },
    ],
    // locales: ['en', 'ar'],
    defaultLocale: 'ar',
    detectBrowserLanguage: {
      useCookie: true,
      cookieKey: 'i18n_redirected',
      alwaysRedirect:true
    },
    lazy: true,
    langDir: 'locales/',
    vueI18n: {
      fallbackLocale: 'ar',
      messages: {
        en: {},
        ar: {}
      }
    }
  },
  auth: {
    strategies: {
      local: {
        endpoints: {
          login: {url: '/api/login', method: 'post', propertyName: 'token'},
          user: {url: '/api/user', method: 'get', propertyName: 'user'}
        },
      },
      loggedIn: true,
    },
    redirect: {
      login: '/home',
      logout: '/login',
      callback: '/login',
      home: '/home'
    }
  },
  /*
  ** Build configuration
  */
  build: {
    transpile: [
      "vee-validate/dist/rules"
    ],
    plugins: [
      new webpack.ProvidePlugin({
        jQuery: 'jquery',
        $: 'jquery',
        'window.jQuery': 'jquery'
      })
    ],
    /*
    ** You can extend webpack config here
    */
    extend(config, ctx) {
    }
  }
}
