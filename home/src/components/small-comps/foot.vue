<template lang="html">
  <section class="foot">
    <div class="contentbox">
      <div class="sub-conts">
        <article class="sub-conText subdie">
          <div v-html="this.footTit.content"></div>
          <div class="tel">
            <aside v-html="this.footCon.content"></aside>
            <div class="tell-way">
              <div class="QQuser">
                <font>
                  <a href="http://wpa.qq.com/msgrd?v=3&uin=1425784&site=qq&menu=yes" target="_blank">
                    <em><img src="../../assets/imgs/q1.png" alt="联系我们"/></em>
                    <i><img src="../../assets/imgs/q2.png" alt="联系我们"/></i>
                  </a>
                  <span>在线咨询</span>
                </font>
              </div>
              <div class="WXuser">
                <font>
                  <em><img src="../../assets/imgs/w1.png" alt="联系我们"/></em>
                  <i><img src="../../assets/imgs/w2.png" alt="联系我们"/></i>
                </font>
                <span><img src="../../assets/imgs/wx.png" alt="微信二维码"/></span>
              </div>
            </div>
          </div>
          <div class="address">
            <ul>
              <li v-for="item in footAddr">
                <h1>{{item.title}}：</h1>
                <span>{{item.address}}</span>
                <p>{{item.tel}}</p>
                <p>24小时服务专线：{{item.hotline}}</p>
              </li>
            </ul>
          </div>
        </article>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      footTit: {},
      footCon: {},
      footAddr: {},
      scrollWatch: true
    }
  },
  mounted() {
    this.getTit()
    this.getCon()
    this.getAdd()
    $(window).on('mousewheel', () => {
      if (this.scrollWatch) {
        var footScrollTop = $(document).scrollTop();
        var contextoffsettop = $(".sub-conText").offset().top;
        var context = contextoffsettop - footScrollTop;
        console.log(context)
        
        if (context < 500) {
          $('.sub-conText').addClass('sublive').removeClass('subdie');
        } else {
          // $('.sub-conText').addClass('subdie').removeClass('sublive');
        }
      }
    })
  },
  destroyed() {
    this.scrollWatch = false;
  },
  methods: {
    getTit() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/foottitle',
      }).then(function(res) {
        _this.footTit = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getCon() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/foottel',
      }).then(function(res) {
        _this.footCon = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getAdd() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/company',
      }).then(function(res) {
        _this.footAddr = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
  }
}
</script>

<style lang="scss">
@import "../../assets/sass/common.scss";
@import "../../assets/sass/comps-scss/foot.scss";
</style>
