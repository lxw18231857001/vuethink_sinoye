<template lang="html">
  <!-- 项目案例 -->
  <section class="ysr-case">
    <div class="ysr-case-head">
      <h1>项目案例</h1>
      <!-- <ul class="case-menus"> -->
        <!-- <li class="case-menu menu-list">品牌策略咨询</li>
        <li class="case-menu">品牌塑造</li>
        <li class="case-menu">品牌营销</li>
        <li class="case-menu">品牌全案</li> -->
      <!-- </ul> -->
    </div>

    <div class="ysr-case-imgs">
      <div class="ysr-case-mid">
        <div class="case-mid-box">
          <div class="case-top-left" ref="caseTopLeft">
            <span>{{this.caseSlider.subtitle}}</span>
            <p class="imgs-static" v-for="item in caseSlider" ><img :src="item.logo" alt="img"></p>
          </div>
          <div class="case-top-right">
            <div v-for="item in caseTop">
              <router-link to="/cases/casesDet16">
                <span>{{item.subtitle}}</span>
                <p class="imgs-static4 imgsmove"><img :src="item.logo" alt="img"></p>
              </router-link>
            </div>
          </div>
        </div>

        <div class="mid-bot-box">
          <div v-for="item in caseBot">
            <router-link to="/cases/casesDet1">
              <span>{{item.subtitle}}</span>
              <p class="imgs-static imgsmove"><img :src="item.logo" alt="img"></p>
            </router-link>
          </div>
        </div>

      </div>
      <div class="ysr-case-bot">
        <div class="case-bot-more">
					<router-link to="/cases" @click="this.$common.goTop"><h1>查看更多</h1></router-link>
        </div>
      </div>
    </div>

  </section>
  <!-- 项目案例... -->

</template>

<script>
export default {
  data() {
    return {
      caseSlider: {},
      caseTop: {},
      caseBot: {},
      scrollWatch: true
    }
  },
  props: [],
  updated: function() {
    this.caseMove()
  },
  mounted() {
    this.getSlider()
    this.getTop()
    this.getBot()
    $(window).on('mousewheel', () => {
      if (this.scrollWatch) {
        var scrollTop = $(document).scrollTop();
        var caseheadoffsettop = $('.ysr-case-head').offset().top;
        var casehead = caseheadoffsettop - scrollTop;
        if (casehead < 550) {
          $('.ysr-case-head h1').addClass('left-to');
          $('.ysr-case-head .case-menus').addClass('right-to');
        }
      }
    })
  },
  destroyed() {
    this.scrollWatch = false;
  },
  methods: {
    caseMove() {
      let caseImgBox = this.$refs.caseTopLeft,
        pSlide = caseImgBox.getElementsByTagName("p"),
        pLen = pSlide.length,
        imgsNum = 0,
        timer1 = null;

      pSlide[0].className = 'imgsmove';

      function Move() {
        for (let i = 0; i < pLen; i++) {
          pSlide[i].className = 'imgs-static'
        }
        pSlide[imgsNum].className = 'imgsmove'
      }

      function moueAuto() {
        imgsNum++;
        imgsNum = imgsNum > pLen ? 0 : imgsNum;
        Move();
      }
      timer1 = setInterval(moueAuto, 6000);
      caseImgBox.onmouseover = () => clearInterval(timer1);
      caseImgBox.onmouseout = () => timer1 = setInterval(moueAuto, 6000);
    },
    getSlider() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/casesslider',
      }).then(function(res) {
        _this.caseSlider = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getTop() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/casesright',
      }).then(function(res) {
        _this.caseTop = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getBot() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/casesbottom',
      }).then(function(res) {
        _this.caseBot = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    }
  }
}

</script>

<style lang="scss">
@import "../../assets/sass/common.scss";
@import "../../assets/sass/comps-scss/slider.scss";
</style>
