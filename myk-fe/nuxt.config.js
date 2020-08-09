import webpack from 'webpack';
export default {
  transition: 'fade',
  router: {
    linkActiveClass: 'active-link',
    linkExactActiveClass: 'exact-active-link',
    middleware: 'i18n'
  },
  mode: 'universal',
        server: {
    port: 4020, // default: 3000
    host: '172.31.18.242'  // default: localhost
  },

  /*
  ** Headers of the page
  */
  head: {
    htmlAttrs: {
      lang: 'en',
      dir: 'ltr'
    },
    title: 'mykonos' || '',
    meta: [
      {charset: 'utf-8'},
      {name: 'viewport', content: 'width=device-width, initial-scale=1'},
      {hid: 'description', name: 'description', content: process.env.npm_package_description || ''},
      {name:'theme-color',content : '#bb8f32'}
    ],
    link: [
      {rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Poppins&display=swap'},
      {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'},
      {rel: "stylesheet", href: "https://fonts.googleapis.com/icon?family=Material+Icons"},
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
  loading: {color: '#bb8f32', height: '5px'},
  /*
  ** Global CSS
  */
  css: [
    '@/assets/scss/main.scss'
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    "~/plugins/vee-validate",
    {
      src: '~/plugins/siema.js',
      ssr: false
    }
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
    '@nuxtjs/axios',
    '@nuxtjs/auth',
    'nuxt-i18n'
  ],
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
      cookieKey: 'i18n_redirected'
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
  axios: {
    baseURL: "http://15.185.56.15:4030",
    proxy: true
  },
  proxy: {
    '/api/': 'http://15.185.56.15:4030',
    '/images/': { target: 'http://15.185.56.15:4030', pathRewrite: { '^/images/': '' } },
    '/storage/': { target: 'http://15.185.56.15:4030', pathRewrite: { '^/storage/': '' } },
  },
  auth: {
    strategies: {
      local: {
        endpoints: {
          login: {url: '/api/login', method: 'post', propertyName: 'token'},
          user: {url: '/api/user', method: 'get', propertyName: 'user'}
        }
      },
      // facebook: {
      //   client_id: '517158992296804',
      //   userinfo_endpoint: 'https://graph.facebook.com/v2.12/me?fields=about,name,picture{url},email,birthday',
      //   // scope: ['public_profile', 'email', 'user_birthday']
      //   redirect_uri: 'http://localhost:3000/register'
      // },
      google: {
        client_id: '548021895890-696f275566cibe80j8o07hhn062ih4uq.apps.googleusercontent.com',
        userinfo_endpoint: 'https://www.googleapis.com/oauth2/v3/userinfo',
        scope: ['openid', 'profile', 'email'],
        user: false,
        //redirect_uri: 'http://15.185.60.74:4020/register'
      },
    },
    redirect: {
      login: '/main',
      logout: '/',
      callback: '/login',
      home: '/main'
    }
  },
  /*
  ** Build configuration
  */
  build: {
    plugins: [
      new webpack.ProvidePlugin({
        jQuery: 'jquery',
        $: 'jquery',
        'window.jQuery': 'jquery'
      })
    ],
    transpile: [
      "vee-validate/dist/rules"
    ],
    /*
    ** You can extend webpack config here
    */
    extend(config, ctx) {
    }
  }
}
