<template>
  <div class="policy">
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-12 col-12">
            <nav aria-label="breadcrumb" class="page-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <nuxt-link :to="localePath('/')">{{$t('Home')}}</nuxt-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{$t('Policy')}}</li>
              </ol>
            </nav>
            <h2 class="breadcrumb-title">{{$t('Policy')}}</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="terms-content" v-html="policy">
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /Page Content -->
  </div>
</template>

<script>
  export default {
    name: "index",
    head: {
      title: "Andalusia Dot Care | Policy"
    },
    data() {
      return {
        policy: ""
      }
    },
    asyncData(context) {
      return context.$axios.get('/api/settings').then(response => {
        return {policy: response.data.settings.consent}
      }).catch(e => console.log(e))
    }
  }
</script>

<style scoped lang="scss">
  html:lang(ar) {
    .policy {
      direction: rtl;
      text-align: right;
    }
  }
</style>
