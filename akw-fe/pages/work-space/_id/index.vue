<template>
  <div class="individual-workspace">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 px-0">
          <div class="workspace-item">
            <img src="@/assets/images/andalusia.png" alt="andalusia">
            <p class="workspace-heading">{{$t('workspace name')}}</p>
          </div>
        </div>
        <div class="summer-club col-12">
          <div class="row">
            <div class="summer-club-img col-md-4 col-12">
              <div class="line-up"></div>
              <div class="line-side"></div>
              <img src="@/assets/images/andalusia.png" alt="summer-club" class="img-fluid">
            </div>
            <div class="summer-club-info col-md-8 col-12">
              <div class="detail">
                <h4>{{$t('workspace name')}}</h4>
                <p>{{$t('discover')}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    name: "index",
    layout: 'main-layout'
  }
</script>
<style lang="scss">
  @import "assets/css/variable";
  @import "assets/css/shared";
  .individual-workspace{
    background: linear-gradient(to right, $backgroundColor, $backgroundColor), url("../../../assets/images/p-top.png");
    background-position: 152% 2%;
    background-repeat: no-repeat;
    padding-bottom: 5rem;
    .workspace-item{
      height: 400px;
      img{
        object-fit: cover;
        width: 100%;
        height: 100%;
        display: block;
        object-position: center;
        clip-path: polygon(0% 0%, 100% 0%, 100% 70%, 0% 100%);
      }
      .workspace-heading{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        color: #fff;
        font-size: 3rem;
        text-transform: capitalize;
      }
    }
    .summer-club{
      background-color: transparent;
      box-shadow: none;
      .detail{
        color: #fff;
        p{
          font-size: 1.5rem ;
          margin-top: 1.5rem;
        }
      }
    }
  }
</style>
