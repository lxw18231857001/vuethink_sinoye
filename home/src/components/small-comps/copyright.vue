<template lang="html">
  <div class="copyright">
		<!-- <em>↑</em> -->
  	<!-- <p>Copyright &copy; 2017 叶晟荣品牌策划与设计 版权所有</p> -->
    <p>{{this.copyTxt}}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      copyTxt: ''
    }
  },
  mounted() {
    this.getCopy()
  },
  updated() {
    this.getCopy()
  },
  methods: {
    getCopy() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/system',
      }).then(function(res) {
        _this.copyTxt = res.data.data[5].value;
      }).catch(function(err) {
        console.log(err)
      })
    },
  }
}
</script>

<style lang="scss" scoped>
// @import "../../assets/sass/common.scss";
.copyright {
    width: 100%;
    height: 100px;
    line-height: 100px;
    @media screen and(max-width: 767px) {
        width: 92%;
    }
    // em {
    //     width: 100%;
    //     height: auto;
    //     line-height: 20px;
    //     text-align: center;
    //     display: block;
    //     color: #fcc800;
    // }
    p {
        width: 100%;
        height: 20px;
        font-size: 14px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 20px;
        letter-spacing: 0;
        color: #666666;
        text-align: center;
        display: inline-block;
    }

}
</style>
