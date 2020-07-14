<template>
  <div class="breadcrumb-bar">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-8 col-12">
          <nav aria-label="breadcrumb" class="page-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <nuxt-link :to="localePath(`/${$route.params.bu}/`)">{{ $t(linkTo) }}</nuxt-link>
              </li>
              <li class="breadcrumb-item active" aria-current="page">{{ $t(currentPage) }}</li>
            </ol>
          </nav>
          <h2 class="breadcrumb-title">{{ $t(currentPage) }}</h2>
        </div>
        <div class="col-md-4 col-12 d-md-block d-none text-right">
          <img
            v-if="$route.params.bu=='hjh'"
            src="@/assets/img/hjh.png"
            alt="hjh"
            class="img-fluid img-hjh"
          />
          <img v-if="$route.params.bu=='apc'" src="@/assets/img/xclinics-logo-ar.png" class="img-fluid img-hjh"/>
          <img v-if="$route.params.bu=='adc'" src="@/assets/img/adc-logo.png" class="img-fluid img-hjh"/>
          <img v-if="$route.params.bu=='akw'" src="@/assets/img/akw.logo-white.png" class="img-fluid img-hjh"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "breadcrumb",
    props: {
      linkTo:{
        default:'home',
        type: String
      },
      currentPage:{
        default:'Search',
        type: String
      }
    },
  }
</script>

<style scoped>

</style>
