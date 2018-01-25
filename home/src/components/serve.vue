<template>
<div class="bodyBox">
  <div class="page">
    <page-head></page-head>
    <body-border></body-border>
    <section class="serve" v-for="(item, key, index) in serveContent" :style="{backgroundImage:'url('+item.backimage+')'}" v-html="item.content"></section>
    <body-foot></body-foot>
    <copy-right></copy-right>
    <side-bar></side-bar>
  </div>

  <div class="sm-sidebar">
    <aside>
      <div></div>
      <div class="sm-bar-list">
        <span class="orderMenu" @click="orderScroll(1)">品牌+</span>
        <span class="orderMenu" @click="orderScroll(3)">互联网+</span>
        <span class="orderMenu" @click="orderScroll(5)">传播+</span>
      </div>
    </aside>
  </div>
</div>
</template>

<script>
import pageHead from "./small-comps/head";
import bodyBorder from "./small-comps/border";
import bodyFoot from "./small-comps/foot";
import sideBar from "./small-comps/sidebar";
import copyRight from "./small-comps/copyright";

export default {
  name: "serve",
  data() {
    return {
      serve: 'serve page',
      serveContent: {},
      scrollWatch: true
    }
  },
  components: {
    pageHead,
    bodyBorder,
    bodyFoot,
    sideBar,
    copyRight
  },
  methods: {
    getServe() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/service',
        data: {}
      }).then(function(res) {
        _this.serveContent = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    scrollText() {
      $('.serve-move').each(function(index) {
        var serverScrollTop = $(document).scrollTop();
        var serveMoveOffsettop = $(this).offset().top;
        var serveMoveSize = serveMoveOffsettop - serverScrollTop;
        if (serveMoveSize > 800) {
          $(this).addClass("trans-down").removeClass("trans-up");
        } else {
          $(this).addClass("trans-up").removeClass("trans-down");
        }
      })
    },
    orderScroll(orderNum) {
      var serveTop = $('.serve-move').eq(orderNum).offset().top;
      $('#app').animate({
        scrollTop: serveTop
      }, 500, 'swing')
    }
  },
  beforeUpdated() {

  },
  updated() {
    this.scrollText()

    $('.serve').eq($('.serve').length - 1).css('marginBottom', '8%')
    // var orderH = $('.orderMenu').parent().height(($('.orderMenu').length - 1) * 40)
    // $('.sm-sidebar').mouseover(function(){
    // })
  },
  mounted() {
    this.getServe()
    $(window).on('mousewheel', () => {
      if (this.scrollWatch) {
        this.scrollText()
      }
    })
  },
  destroyed() {
    this.scrollWatch = false;
  }
}
</script>

<style lang="scss">
.bodyBox {
    position: relative;
    width: 100%;
    height: 100%;
}
@import "../assets/sass/common.scss";
@import "../assets/sass/serve.scss";
@import "../assets/sass/comps-scss/sm-sidebar.scss";
</style>
