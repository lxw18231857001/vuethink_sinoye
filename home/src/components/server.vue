<template>
<div class="page">
  <page-head></page-head>
  <body-border></body-border>

  <section class="server-box">
    <iframe name="server-iframe" class="server-iframe" src="http://p.qiao.baidu.com/cps/chat?siteId=6271463&userId=8145697" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
  </section>

  <body-foot></body-foot>
  <copy-right></copy-right>
  <side-bar></side-bar>
  <router-view></router-view>
</div>
</template>

<script>
import pageHead from "./small-comps/head";
import bodyBorder from "./small-comps/border";
import bodyFoot from "./small-comps/foot";
import sideBar from "./small-comps/sidebar";
import copyRight from "./small-comps/copyright";

export default {
  name: 'server',
  data() {
    return {
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

  },
  mounted() {
    $(window).on('mousewheel', () => {
      if (this.scrollWatch) {

      }
    })

    $(function() {
      var oW = $(window).width() - 20;
      var oH = $(window).height() - 100;
      $('.server-box').css({
        width: oW,
        height: oH
      })
    })
  },
  destroyed() {
    this.scrollWatch = false;
  }
}
</script>

<style lang="scss" scoped>
.server-box {
    display: flex;
    margin: 10px auto 10%;
    @media screen and(max-width: 767px) {
        margin: 5px auto 10%;
    }
    .server-iframe {
        width: 100%;
        height: 100%;
        margin: auto;
    }
}
</style>
