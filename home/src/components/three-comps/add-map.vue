<template lang="html">
  <div class="">
    <page-head></page-head>
    <body-border></body-border>
    <section class="add-box">
      <iframe name="add-iframe" class="add-iframe" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes"></iframe>
    </section>
    <body-foot></body-foot>
    <side-bar></side-bar>
    <copy-right></copy-right>
    <router-view></router-view>
  </div>
</template>

<script>
import pageHead from "../small-comps/head";
import bodyBorder from "../small-comps/border";
import bodyFoot from "../small-comps/foot";


import sideBar from "../small-comps/sidebar";
import copyRight from "../small-comps/copyright";
// import BMap from 'BMap';

export default {
  data() {
    return {
      imgsrc: []
    }
  },

  components: {
    pageHead,
    bodyBorder,
    bodyFoot,
    sideBar,
    copyRight
  },

  props: [],
  methods: {
    // address() {
    //   if (this.$route.params.add == 'bj') {
    //     $('.add-iframe').attr({
    //       src: 'http://www.yeshengrong.com/mapbj.html'
    //     })
    //   } else if (this.$route.params.add == 'sh') {
    //     $('.add-iframe').attr({
    //       src: 'http://www.yeshengrong.com/mapsh.html'
    //     })
    //   } else {
    //     $('.add-iframe').attr({
    //       src: 'http://www.yeshengrong.com/mapgz.html'
    //     })
    //   }
    // }

    address() {
      if (this.$route.params.add == 1) {
        $('.add-iframe').attr({
          src: 'http://www.yeshengrong.com/mapbj.html'
        })
      } else if (this.$route.params.add == 2) {
        $('.add-iframe').attr({
          src: 'http://www.yeshengrong.com/mapsh.html'
        })
      } else {
        $('.add-iframe').attr({
          src: 'http://www.yeshengrong.com/mapgz.html'
        })
      }
    }
  },

  mounted() {
    $('.add-box').css({
      height: $(window).height()
    })
    this.address()
    // if(this.$route.params.add=='bj'){
    //   $('.add-iframe').attr({
    //     src:'http://www.yeshengrong.com/mapbj.html'
    //   })
    // }else if (this.$route.params.add=='sh') {
    //   $('.add-iframe').attr({
    //     src:'http://www.yeshengrong.com/mapsh.html'
    //   })
    // }else{
    //   $('.add-iframe').attr({
    //     src:'http://www.yeshengrong.com/mapgz.html'
    //   })
    // }
  },
  watch: {
    "$route": "address"
  }
}
</script>
<style lang="scss" scoped>
.add-box {
    width: 90%;
    display: flex;
    margin: 10px auto 8%;
    @media screen and(max-width: 767px) {
        margin: 5px auto 8%;
    }
    .add-iframe {
        width: 100%;
        height: 100%;
        margin: auto;
    }
}
</style>
