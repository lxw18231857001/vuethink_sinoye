<template>
<div class="page">
  <page-head></page-head>
  <body-border></body-border>

  <section class="call-adds">
    <router-link v-for="(item,key) in callAddr" :to="{path:'/call/addMap/'+item.id,params: { add: item.id}}" :key="key">
      <div class="call-address">
        <article>
          <img :src="item.backimage" alt="公司地址">
          <aside>
            <h1>{{item.title}}</h1>
            <h2>{{item.address}}</h2>
            <h3>电话：{{item.tel}}</h3>
            <h4>24小时服务专线:{{item.hotline}}</h4>
            <h5>邮箱：{{item.email}}</h5>
            <h6>招聘：{{item.hremail}}</h6>
          </aside>
        </article>
      </div>
    </router-link>
  </section>

  <section class="call-intro">
    <div class="call-intro-slide">
      <ul class="call-intro-lists">
        <li v-for="item in callBanner" class="cur" :style="{backgroundImage:'url('+item.backimage+')'}">
          <div class="call-contsd">
            <div class="call-neis">
              <div class="call-textsz" v-html="item.content"></div>
            </div>
          </div>
        </li>
      </ul>
    </div>

    <div class="words-slide">
      <ul>
        <li class="cues"><span></span></li>
        <li><span></span></li>
        <li><span></span></li>
      </ul>
    </div>
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
  name: "call",
  data() {
    return {
      call: 'call page',
      callAddr: {},
      callBanner: {},
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
  updated() {
    this.getCallAddr()
    this.getCallBanner()
    this.callSlider()
  },
  methods: {
    getCallAddr() {
      var _this = this;
      // this.$ajax.get('home/contact')
      this.$ajax({
        method: 'get',
        url: 'home/contact',
      }).then(function(res) {
        _this.callAddr = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getCallBanner() {
      var _this = this;
      // this.$ajax.get('home/contact/middle')
      this.$ajax({
        method: 'get',
        url: 'home/contact/middle',
      }).then(function(res) {
        _this.callBanner = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    callSlider() {
      var wslide = $('.call-intro .call-intro-lists li');
      var nslide = $('.call-intro .words-slide ul li');
      var wlengh = wslide.length;
      var wi = 0;
      wslide.eq(0).addClass('cur').siblings('li').removeClass('cur');

      function sides() {
        wi++;
        wi = wi == wlengh ? 0 : wi;
        wslide.eq(wi).addClass('cur').siblings('li').removeClass('cur');
        nslide.eq(wi).addClass('cues').siblings('li').removeClass('cues')
      }
      nslide.click(function() {
        $('.call-intro-slide ul').stop();
        this_ = $(this).index();
        wi = this_;
        wslide.eq(wi).addClass('cur').siblings('li').removeClass('cur');
        nslide.eq(wi).addClass('cues').siblings('li').removeClass('cues')
      });
      setInterval(sides, 5000)
    }
  },
  mounted() {
    this.getCallAddr()
    this.getCallBanner()
    this.callSlider()

    $(window).bind('mousewheel', () => {
      if (this.scrollWatch) {

      }
    })
  },
  destroyed() {
    this.scrollWatch = false;
  }
}
</script>

<style lang="scss">
@import "../assets/sass/common.scss";
@import "../assets/sass/call.scss";
</style>
