<template>
<div class="bodyBox">
  <div class="page">
    <page-head></page-head>
    <body-border></body-border>
    <!-- <header class="two-head" style="background-image:url('http://www.yeshengrong.com/newimgs/case/1.png')">
      <div>
        <h1>SINOYE   BRAND  DESIGN</h1>
        <h2>Our team culture: work is not just a livelihood but a way of life</h2>
        <h3>团队文化</h3>
        <h4>案例展示</h4>
      </div>
    </header> -->

    <section class="cases-imgs">
      <router-link v-for="(item,key) in caseAll" :key="key" :to="{path:'/cases/casesDet/'+item.id,params: {id: item.id}}" @click="goTop()">
        <div class="cases-img">
          <article>
            <img :src="item.logo" alt="案例">
            <aside>
              <i></i>
              <h2>{{item.title}}</h2>
              <h3>{{item.subtitle}}</h3>
              <h4>详情点击</h4>
            </aside>
          </article>
          <span>{{item.title}}</span>
        </div>
      </router-link>
    </section>
    <body-foot></body-foot>
    <copy-right></copy-right>
    <side-bar></side-bar>
  </div>

  <div class="sm-sidebar">
    <aside>
      <div></div>
      <div class="sm-bar-list">
        <span v-for="item in caseName" :data-id="item.id" :data-pid="item.pid" @click="emitNum($event)">{{item.name}}</span>
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
  name: "cases",
  data() {
    return {
      caseAll: {},
      caseName: {},
      receiveNum: 1,
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
  mounted() {
    this.getCaseAll()
    this.getCaseName()
    this.$common.smBar()

    $(window).on('scroll', () => {
      if (this.scrollWatch) {
        // this.scrollText()
        // moveL();
        // moveR();
      }
    })
  },
  updated() {
    this.$common.smBar()
  },
  methods: {
    emitNum(e) {
      console.log(e.target.getAttribute('data-pid'))
      this.receiveNum = e.target.getAttribute('data-id')
    },
    goTop() {
      document.body.scrollTop = document.documentElement.scrollTop = 0 + 'px';
    },
    getCaseAll() {
      var _this = this;
      this.$ajax.get('home/case/type/' + this.receiveNum).then(function(res) {
        _this.caseAll = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getCaseName() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/case/name',
        data: {}
      }).then(function(res) {
        _this.caseName = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    }
  },
  destroyed() {
    this.scrollWatch = false;
  },
  watch: {
    'receiveNum': 'getCaseAll'
  }

}
</script>

<style lang="scss" scoped>
@import "../assets/sass/common.scss";
@import "../assets/sass/cases.scss";
@import "../assets/sass/comps-scss/two-head.scss";
@import "../assets/sass/comps-scss/case-bar.scss";
</style>
