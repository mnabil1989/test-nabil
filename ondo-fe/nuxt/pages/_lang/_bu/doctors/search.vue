<template>
  <div>

  </div>
</template>

<script>
  export default {
    name: "search",
    created() {
      this.$router.push(`/${this.$route.params.bu}/doctors`)
    }
  }
</script>

<style scoped>

</style>
