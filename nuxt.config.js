export default {
  mode: 'universal',
	server: {
    port: 4020, // default: 3000
    host: '172.31.23.146'  // default: localhost
  },
//	 workbox: {
  //  nuxtAssetsRuntime: false,
  //},

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
      lang: 'en',
      dir: 'ltr'
    },
    title: process.env.npm_package_name || 'Andalusia DotCare',
    meta: [
      {charset: 'utf-8'},
      {name: 'viewport', content: 'width=device-width, initial-scale=1'},
      {hid: 'description', name: 'description', content: process.env.npm_package_description || ''}
    ],
    link: [
      {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'},
      {rel: 'stylesheet', href: '/fontawesome/css/all.min.css'},
      {
        rel: "stylesheet",
        href: "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",
        integrity: "sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN",
        crossorigin: "anonymous"
      },
      {rel: 'stylesheet', href: '/fontawesome/css/fontawesome.min.css'},
    ],

    script: [{src: "https://cdn.agora.io/sdk/web/AgoraRTCSDK-2.1.0.js"}]
  },
  /*
  ** Customize the progress-bar color
  */
  loading: {color: '#20c0f3'},
  /*
  ** Global CSS
  */
  css: [
    '@/assets/scss/main.scss',
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~/plugins/auth.js',
    "~/plugins/vee-validate",
    //{src: "~/plugins/AgoraRTC.js", ssr: false},
    "~/plugins/vue-instantsearch",
    {src: "~/plugins/AgoraRTC.js", ssr: false},
    {
      src: '~/plugins/siema.js',
      ssr: false
    }
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
    defaultLocale: 'en',
    detectBrowserLanguage: {
      useCookie: true,
      cookieKey: 'i18n_redirected'
    },
    lazy: true,
    langDir: 'locales/',
    vueI18n: {
      fallbackLocale: 'en',
      messages: {
        en: {},
        ar: {}
      }
    }
  },
  /*
 ** Axios module configuration
 ** See https://axios.nuxtjs.org/options
 */
  axios: {	   
	  baseURL: "https://admin.dotbeit.com",
    proxy: true
  },
  proxy: {
    '/api/': 'https://admin.dotbeit.com',
  },
  auth: {
    strategies: {
      local: {
        _scheme: 'local',
        endpoints: {
		login: { url: '/api/login', method: 'post', propertyName: 'token'},
                user: { url: '/api/user', method: 'get', propertyName: 'user'}
        },
      },
     },
   
   
       //   login: {url: '/api/login', method: 'post', propertyName: 'token'},
       //   user: {url: '/api/user', method: 'get', propertyName: 'user'}
       // },
      // },
      // local2: {
      //   _scheme: 'local',
      //   endpoints: {
      //     login: {url: '/api/doctor/login', method: 'post', propertyName: 'token'},
      //     user: {url: '/api/doctor/me', method: 'get', propertyName: 'user'}
      //   },
      // }
      // facebook: {
      //   client_id: '602285083689655',
      //   authorization_endpoint: 'https://facebook.com/v6.0/dialog/oauth',
      //   userinfo_endpoint: "https://graph.facebook.com/v6.0/me?fields=id,gender,name,email,about,picture{url}",
      //   scope: ['public_profile', 'email'],
      //   redirect_uri: 'http://localhost:3000/register',
      // },
      // facebook: {
      //   client_id: '602285083689655',
      //   authorization_endpoint: 'https://facebook.com/v6.0/dialog/oauth',
      //   scope: ['name','id', 'birthday', 'gender', 'email'],
      // },
      // google: {
      //   client_id: '',
      //   user: false,
      //   redirect_uri: '/google/callback'
      //
      // },
      // loggedIn: false,
    // },
  //  redirect: {
    //  login: '/doctors/search',
      //logout: '/',
      //callback: '/login',
      //home: '/doctors/search'
   // }
    redirect: {
      login: '/auth/login',
      logout: '/',
      callback: false,
      home: false
    }
  },
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
    'nuxt-i18n',
    [
      'nuxt-fontawesome', {
      imports: [
        {
          set: '@fortawesome/free-solid-svg-icons',
          icons: ['fas']
        },
        {
          set: '@fortawesome/free-brands-svg-icons',
          icons: ['fab']
        }
      ]
    }
    ]

  ],

  /*
  ** Build configuration
  */
  build: {
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
