<template>
  <div class="list-item-container">
    <div class="title-container"><nuxt-link :to="localePath(`/service/${linkTo}`)">{{title}}</nuxt-link></div>
    <div class="content-container">{{content}}</div>
  </div>
</template>

<script>
export default {
  props: ["linkTo","title", "content"]
};
</script>

<style lang="scss" scoped>
.list-item-container {
  margin-top: 20px;
  margin-bottom: 5%;
  text-align: right;
  color: #1d4590;
}
.title-container {
  font-size: calc(2rem + 1vw);
  margin-bottom: 1%;
  border-bottom: 2px solid #ffce8a;
  padding-bottom: 1%;
  display: inline-block;
  a{
    text-decoration: none;
    color: #1d4590;
    transition: all ease-in-out .5s;
    &:hover{
      color: #ffce8a;
    }
  }
}

.content-container {
  font-size: calc(1rem + 1vw);

  @media (max-width: 500px) {
    font-size: calc(1.5rem + 1vw);
  }
}
</style>
