<template lang="html">
  <div class="page">
    <page-head></page-head>
    <body-border></body-border>
    <section class="case-det" v-html="this.casesDetCon.content"></section>
    <body-foot></body-foot>
    <copy-right></copy-right>
  </div>
</template>

<script>
import pageHead from "../small-comps/head";
import bodyBorder from "../small-comps/border";
import bodyFoot from "../small-comps/foot";
import copyRight from "../small-comps/copyright";

export default {
  name: "caseDet",
  data() {
    return {
      casesDetCon: {}
    }
  },
  components: {
    pageHead,
    bodyBorder,
    bodyFoot,
    copyRight
  },
  updated() {
    this.getCaseDet()
  },
  mounted() {
    this.getCaseDet()
  },
  methods: {
    getCaseDet() {
      let _this = this;
      this.$ajax.get('home/case/' + this.$route.params.id).then(function(res) {
        _this.casesDetCon = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
  },
  // watch: {
  //   "$route": "getCaseDet"
  // }
}
</script>

<style lang="scss">
@import "../../assets/sass/common.scss";
@import "../../assets/sass/comps-scss/case-det.scss";
</style>
