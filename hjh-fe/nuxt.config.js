import webpack from 'webpack';
export default {
  mode: "universal",
          server: {
    port: 4020, // default: 3000
    host: '172.31.28.191'  // default: localhost
  },

  transition:'slide-fade',
  /*
   ** Headers of the page
   */
  head: {
    title: process.env.npm_package_name || "",
    title: "افضل مستشفيات جدة 2020 | مستشفي اندلسية حي الجامعة",
    meta: [{
      charset: "utf-8"
    },
      {
        name: "viewport",
        content: "width=device-width, initial-scale=1"
      },
      {
        hid: "description",
        name: "description",
        content: process.env.npm_package_description || ""
      }
    ],
    link: [{
      rel: "icon",
      type: "image/x-icon",
      href: "/favicon.ico"
    },
      {
        rel: "stylesheet",
        href: "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",
        integrity: "sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN",
        crossorigin: "anonymous"
      },
    ],
    script: [{
      src: "https://kit.fontawesome.com/daad4d5851.js",
      crossorigin: "anonymous"
    },
      {
        type: "application/ld+json",
        json: {
          "@context": "http:\/\/schema.org",
          "@type": "WebSite",
          "@id": "#website",
          "url": "https:\/\/www.andalusiahjh.com\/",
          "name": "Andalusia HJH",
          "potentialAction": {
            "@type": "SearchAction",
            "target": "https:\/\/www.andalusiahjh.com\/?s={search_term_string}",
            "query-input": "required name=search_term_string"
          }
        }
      }
    ]
  },
  /*
   ** Customize the progress-bar color
   */

  /*
   ** Global CSS
   */
  css: ["@/assets/shared.scss", "swiper/dist/css/swiper.css"],
  router: {
    linkActiveClass: 'active-link',
    linkExactActiveClass: 'exact-active-link',
  },
  /*
   ** Plugins to load before mounting the App
   */
  plugins: [
    "~/plugins/i18n.js",
    "~/plugins/mixins/user.js",
    {
      src: "~/plugins/swiper.js",
      ssr: false
    }
  ],
  /*
   ** Nuxt.js dev-modules
   */
  buildModules: [
    // Doc: https://github.com/nuxt-community/webpackmonitor-module
    "@nuxtjs/webpackmonitor"
  ],
  /*
   ** Nuxt.js modules
   */
  modules: [
    [
      "@nuxtjs/sitemap",
      {
        // custom configuration
      }
    ],
    // Doc: https://bootstrap-vue.js.org
    "bootstrap-vue/nuxt",
    "@nuxtjs/axios",
    "@nuxtjs/auth",
    "@nuxtjs/proxy",
    ['nuxt-i18n', {
      locales: [
	     // {
        //code: 'en',
        //iso: 'en-US',
        //file: 'en.js'
      //},
        {
          code: 'ar',
          iso: 'ar-EG',
          file: 'ar.js'
        },
      ],
      defaultLocale: 'ar',
      seo: true,
      lazy: true,
      langDir: 'locales/',
      vueI18n: {
        fallbackLocale: 'ar',
      },
    }],
  ],
  bootstrapVue: {
    components: [],
    directives: []
  },
  axios: {
	  baseURL: "http://157.175.37.217:4050",
    proxy: true,
    credentials: true,
    debug: true,
  },
  proxy: {
    "/api/": "http://157.175.37.217:4050"
  },
  auth: {
    redirect: {
      login: '/auth/login',
      logout: false,
      callback: false,
      home: false
    },
    strategies: {
      local: {
        endpoints: {
          // TO BE DONE :authintcation urls  from our apis
          login: {
            url: "/api/login",
            method: "post",
            propertyName: "token"
          },
          logout: false,
          user: {
            url: "/api/user",
            method: "get",
            propertyName: "user"
          }
        },
        tokenRequired: true,
        tokenType: "bearer"
      },
      facebook: {
        client_id: '602285083689655',
        endpoints: {
          userInfo: 'https://graph.facebook.com/v2.12/me?fields=about,name,picture{url},email,birthday'
        },

        redirect_uri: 'http://157.175.37.217:4020/auth/socialRegister',
        scope: ['public_profile', 'user_gender', 'email', 'user_birthday', "user_gender", "user_hometown"]
      },
    }
  },
  /*
   ** Axios module configuration
   ** See https://axios.nuxtjs.org/options
   */

  /*
   ** Build configuration
   */
  build: {
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {
    }
  }
};
