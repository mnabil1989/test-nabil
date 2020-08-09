<template>
  <div>
    <div class="post">
      <div class="row">
        <div class="col-lg-8 col-12">
          <div class="book-img">
            <img src="../assets/images/cooker.png" alt="cooker" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="book-info-post">
            <div class="row">
              <div class="col-12">
                <div class="dish">
                  <div class="row">
                    <div class="col-9 dish-name">Parisian Hamburger</div>
                    <div class="col-3">
                      <div class="dish-price">$18</div>
                    </div>
                    <div class="col-12">
                      <div class="line"></div>
                    </div>
                    <div class="col-12 dish-description">
                      Raw onions, beetroots, pickles, capers, horseradish, egg yolk
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <InstaPosts></InstaPosts>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <SocialLinks></SocialLinks>
        </div>
        <div class="col-12">
          <div class="post-description">
            <div class="row">
              <div class="col-12">
                <h3 class="heading-posts">elegant food</h3>
              </div>
              <div class="col-md-8 col-12">
                <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipisicin gelitsed do eiusmod
                  temporinc ididunt utlabor met dolore magna sensal iqua. Ut enim ad minim
                  veniamquis nostrud exercitation ullamco labori nisi ut aliquip ex ea commodo
                  consequat. Duis auteirm ure dolor in reprehenderit in voluptate velit esse cillum
                  dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupin datat non proident,
                  sunt in culpa </p>
              </div>
              <div class="col-md-4 col-12">
                <nuxt-link :to="localePath('/booking/book-now')" class="bookNow">book now</nuxt-link>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="post">
      <div class="row">
        <div class="col-12">
          <div class="book-img">
            <img src="../assets/images/post-two.png" alt="post" class="img-fluid">
          </div>
        </div>
        <div class="col-12">
          <SocialLinks></SocialLinks>
        </div>
        <div class="col-12">
          <div class="post-description">
            <div class="row">
              <div class="col-12">
                <h3 class="heading-posts">elegant food</h3>
              </div>
              <div class="col-md-8 col-12">
                <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipisicin gelitsed do eiusmod
                  temporinc ididunt utlabor met dolore magna sensal iqua. Ut enim ad minim
                  veniamquis nostrud exercitation ullamco labori nisi ut aliquip ex ea commodo
                  consequat. Duis auteirm ure dolor in reprehenderit in voluptate velit esse cillum
                  dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupin datat non proident,
                  sunt in culpa </p>
              </div>
              <div class="col-md-4 col-12">
                <nuxt-link :to="localePath('/booking/book-now')" class="bookNow">book table</nuxt-link>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="post">
      <div class="row">
        <div class="col-md-8 col-12">
          <div class="book-img">
            <img src="../assets/images/cooker.png" alt="cooker" class="img-fluid">
          </div>
        </div>
        <div class="col-md-4 col-12">
          <div class="book-info-post">
            <div class="row">
              <div class="col-12">
                <div class="dish">
                  <div class="row">
                    <div class="col-9 dish-name">Parisian Hamburger</div>
                    <div class="col-3">
                      <div class="dish-price">$18</div>
                    </div>
                    <div class="col-12">
                      <div class="line"></div>
                    </div>
                    <div class="col-12 dish-description">
                      Raw onions, beetroots, pickles, capers, horseradish, egg yolk
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="row">
                  <div class="col-12">
                    <InstaPosts></InstaPosts>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <SocialLinks></SocialLinks>
        </div>
        <div class="col-12">
          <div class="post-description">
            <div class="row">
              <div class="col-12">
                <h3 class="heading-posts">elegant food</h3>
              </div>
              <div class="col-md-8 col-12">
                <p class="paragraph">Lorem ipsum dolor sit amet, consectetur adipisicin gelitsed do eiusmod
                  temporinc ididunt utlabor met dolore magna sensal iqua. Ut enim ad minim
                  veniamquis nostrud exercitation ullamco labori nisi ut aliquip ex ea commodo
                  consequat. Duis auteirm ure dolor in reprehenderit in voluptate velit esse cillum
                  dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupin datat non proident,
                  sunt in culpa </p>
              </div>
              <div class="col-md-4 col-12">
                <nuxt-link :to="localePath('/booking/book-now')" class="bookNow">book now</nuxt-link>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

</template>

<script>
  import SocialLinks from "./SocialLinks";
  import InstaPosts from "./InstaPosts";

  export default {
    name: "BookPost",
    components: {InstaPosts, SocialLinks},
    data() {
      return {
        img: "../assets/images/img-post-six.png"
      }
    }
  }
</script>

<style scoped lang="scss">
  $main-color: #bb8f32;
  .post {
    margin: 2rem 0;
    padding: 2rem 0;
    &:after{
      content: "";
      display: block;
      height: 10px;
      background-color: $main-color;
      border-radius: 10px;
      margin: 2rem auto;
    }
    &:last-of-type{
      &:after{
        content: "";
        display: none
      }
    }
  }
  .post-description {
    .heading-posts {
      letter-spacing: 2.2px;
      font-size: 3rem;
      font-weight: lighter;
      text-transform: uppercase;
      color: $main-color;
    }

    p {
      color: #fff;
      line-height: 2;
      font-weight: lighter;
    }
  }
  .book-img{
    img{
      width: 100%;
    }
  }
</style>
