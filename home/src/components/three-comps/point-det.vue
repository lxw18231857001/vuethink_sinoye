<template lang="html">
<div class="page">
	<page-head></page-head>
	<body-border></body-border>
	<point-head></point-head>

	<section class="point-det1">
		<header>
			<h1>{{this.pointDetCon.title}}</h1>
			<div><span>发布者：{{this.pointDetCon.writer}}</span><time>时间：{{this.pointDetCon.create_time}}</time></div>
		</header>
		<article v-html="this.pointDetCon.content"></article>
	</section>

  <body-foot></body-foot>
	<copy-right></copy-right>
</div>
</template>

<script>
import pageHead from "../small-comps/head";
import bodyBorder from "../small-comps/border";
import bodyFoot from "../small-comps/foot";
import pointHead from "../small-comps/point-head";
import copyRight from "../small-comps/copyright";

export default {
  name: "point",
  data() {
    return {
      point: 'point page',
      pointDetCon: {}
    }
  },
  components: {
    pageHead,
    bodyBorder,
    bodyFoot,
    pointHead,
    copyRight
  },
  updated() {
    // this.getPointDet()
  },
  mounted() {
    this.getPointDet()
  },
  methods: {
    getPointDet() {
      let _this = this;
      // var CancelToken = this.$ajax.CancelToken;
      // var source = CancelToken.source();
      //
      // this.$ajax.get('home/newsDetails/' + this.$route.params.id, {
      //   CancelToken: source.token
      // }).then(function(res) {
      //   _this.pointDetCon = res.data.data;
      // }).catch(function(err) {
      //   // console.log(err)
      //   if (this.$ajax.isCancel(err)) {
      //     console.log('Request canceled', err.message);
      //   } else {
      //     // handle error
      //   }
      // })
      // // 取消请求（message 参数是可选的）
      // source.cancel('Operation canceled by the user.');


      this.$ajax.get('home/newsDetails/' + this.$route.params.id).then(function(res) {
        if (res.data.code === '200') {
          console.log('err= ' + res.data.code)
        } else {
          _this.pointDetCon = res.data.data;
        }
      }).catch(function(err) {
        console.log(err)
      });
    },
  },
  watch: {
    "$route": "this.$common.goTop()"
  }
}
</script>

<style lang="scss">
@import "../../assets/sass/common.scss";
@import "../../assets/sass/comps-scss/point-det.scss";
</style>
