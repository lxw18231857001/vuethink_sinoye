<template>
<div class="page">
  <page-head></page-head>
  <body-border></body-border>
  <!-- <point-head></point-head> -->
  <section class="section" id="sect1">
    <ul>
      <li class="list" v-for="item in pointContent">
        <div :style="{backgroundImage: 'url('+item.listpic+')'}"></div>
        <div>
          <h1>{{item.title}}</h1>
          <p v-html="item.content"></p>
          <router-link :to="{path:'/point/pointDet/'+item.id,params: {id: item.id}}" @click="this.$common.goTop()">查看详情</router-link>
        </div>
      </li>
    </ul>
  </section>

  <nav class="point-page-code">
    <div>
      <span @click.prevent="pageMinus($event)">&lt;</span>
      <p style="background:#fcc800;" @click.prevent="fristPage($event)">{{this.nowPage}}</p>
      <em>...</em>
      <p @click.prevent="lastPage($event)">{{this.allPage}}</p>
      <span @click.prevent="pagePlus($event)">&gt;</span>
    </div>
  </nav>

  <body-foot></body-foot>
  <copy-right></copy-right>
  <side-bar></side-bar>
</div>
</template>

<script>
import pageHead from "./small-comps/head";
import bodyBorder from "./small-comps/border";
import bodyFoot from "./small-comps/foot";
import pointHead from "./small-comps/point-head";
import sideBar from "./small-comps/sidebar";
import copyRight from "./small-comps/copyright";

export default {
  name: "point",
  data() {
    return {
      point: 'point page',
      scrollWatch: true,
      pointContent: {},
      nowPage: 1,
      allPage: null,
      onePageList: 10
    }
  },
  components: {
    pageHead,
    bodyBorder,
    bodyFoot,
    pointHead,
    sideBar,
    copyRight
  },
  methods: {
    fristPage(event) {
      this.nowPage = event.currentTarget.innerHTML;
      this.$common.goTop()
    },
    lastPage(event) {
      this.nowPage = event.currentTarget.innerHTML;
      this.$common.goTop()
    },
    pageMinus(event) {
      this.nowPage--;
      if (this.nowPage <= 1) this.nowPage = 1;
      this.$common.goTop()
    },
    pagePlus(event) {
      this.nowPage++;
      if (this.nowPage >= this.allPage) this.nowPage = this.allPage;
      this.$common.goTop()
    },
    getPoint() {
      var _this = this;
      this.$ajax.get('home/news', {
        params: {
          page: this.nowPage,
          limit: this.onePageList
        }
      }).then(function(res) {
        _this.pointContent = res.data.data.list;
        _this.allPage = Math.ceil(res.data.data.dataCount / _this.onePageList);
      }).catch(function(err) {
        console.log(err)
      })
    },
    moveL() {
      $('.list div:nth-child(1)').each(function(index) {
        var listScrollTop = $(document).scrollTop();
        var listOffsettop = $(this).offset().top;
        var listSize = listOffsettop - listScrollTop;
        if (listSize < 600) {
          $(this).addClass("left-to");
        }
      })
    },
    moveR() {
      $('.list div:nth-child(2)').each(function(index) {
        var listScrollTop = $(document).scrollTop();
        var listOffsettop = $(this).offset().top;
        var listSize = listOffsettop - listScrollTop;
        if (listSize < 600) {
          $(this).addClass("right-to");
        }
      })
    }
  },
  watch: {
    'nowPage': 'getPoint',
    deep: true
  },
  updated() {
    this.moveL();
    this.moveR();
  },
  mounted() {
    this.getPoint()

    $(window).on('mousewheel', () => {
      if (this.scrollWatch) {
        this.moveL();
        this.moveR();
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
@import "../assets/sass/point.scss";
</style>
