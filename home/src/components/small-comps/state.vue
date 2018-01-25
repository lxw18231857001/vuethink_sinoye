<template lang="html">
<div id="Scanbar" class="ysr-body-box">
<section class="ysr-newsList">
  <div class="ysr-point-head">
    <h1>观点动态</h1>
    <!-- <div class="point-menus">
      <span class="point-menu">观点动态</span>
    </div> -->
  </div>

  <div class="centerbox">
    <!-- <div class="lft-news lftdie" v-for="item in imgsrc"> -->
    <div class="lft-news">
        <div class="lft-news-slider">
          <span class="left"></span>
          <!-- <div>
            <i class="news-slider newsmove" :style="{backgroundImage:'url('+item[3].img4+')'}"></i>
            <i class="news-slider" :style="{backgroundImage:'url('+item[4].img5+')'}"></i>
            <i class="news-slider" :style="{backgroundImage:'url('+item[5].img6+')'}"></i>
          </div> -->
          <div>
            <i class="news-slider newsmove" style="backgroundImage:url('http://www.yeshengrong.com/newimgs/index/point1.png')"></i>
            <i class="news-slider" style="backgroundImage:url('http://www.yeshengrong.com/newimgs/index/point1.png')"></i>
            <i class="news-slider" style="backgroundImage:url('http://www.yeshengrong.com/newimgs/index/point1.png')"></i>
          </div>
          <span class="right"></span>
        </div>
    </div>
    <div class="rit-news">
      <article v-for="item in stateContent">
        <div>
					<time>{{item.create_time}}</time>
          <h3>{{item.title}}</h3>
        </div>
        <aside v-html="item.content"></aside>
      </article>
    </div>
  </div>
</section>

<section class="ysr-works">
  <video class="v1" :src="this.vedioUrl.url" autoplay loop></video>
  <div class="works-slide">
    <ul class="sub-slides">
      <li class="cur" v-for="item in text">
        <div class="contsd">
          <div class="neis">
            <div class="textsz" v-html="item.content">
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <!-- <div class="words-slide">
    <ul>
      <li class="cues">
        <i></i>
        <span>01</span>
        <font>高端网站建设</font>
      </li>
      <li>
        <i></i>
        <span>02</span>
        <font>移动端与微信</font>
      </li>
      <li>
        <i></i>
        <span>03</span>
        <font>企业年度运维</font>
      </li>
    </ul>
  </div> -->
</section>
</div>
</template>

<script>
export default {
  data() {
    return {
      vedioUrl: '',
      text: {},
      scrollWatch: true,
      stateContent: {},
    }
  },
  props: [],
  updated() {
    this.vedioMove()
  },
  mounted() {
    this.getState()

    this.getTxt()
    this.getV()
    this.leftMove()
    this.vedioMove()
    $(window).on('mousewheel', () => {
      if (this.scrollWatch) {
        var scrollTop = $(document).scrollTop();
        var pointheadoffsettop = $('.ysr-point-head').offset().top;
        var pointhead = pointheadoffsettop - scrollTop;
        if (pointhead < 550) {
          $('.ysr-point-head h1').addClass('left-to');
          $('.ysr-point-head .point-menus').addClass('right-to');
        }

        // leftnew  rightnew
        var lftnewsoffsettop = $('.lft-news').offset().top;
        var lftnews = lftnewsoffsettop - scrollTop;
        if (lftnews < 600) {
          $('.lft-news').addClass('left-to');
        }

        var ritnewsoffsettop = $('.rit-news').offset().top;
        var ritnews = ritnewsoffsettop - scrollTop;
        if (ritnews < 550) {
          $('.rit-news').addClass('right-to');
        }
      }
    })
  },
  destroyed() {
    this.scrollWatch = false;
  },
  methods: {
    getState() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/news',
      }).then(function(res) {
        _this.stateContent = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    vedioMove() {
      var vHeight = $('.v1').height();
      $('.ysr-works').height(vHeight);
      var wslide = $('.ysr-works .sub-slides li');
      var nslide = $('.ysr-works .words-slide ul li');
      var wlengh = wslide.length;
      var wi = 0;
      wslide.eq(0).addClass('cur').siblings('li').removeClass('cur');

      function sides() {
        wi++;
        wi = wi == wlengh ? 0 : wi;
        wslide.eq(wi).addClass('cur').siblings('li').removeClass('cur');
        nslide.eq(wi).addClass('cues').siblings('li').removeClass('cues')
      }
      setInterval(sides, 5000)
    },
    leftMove() {
      // leftnews
      var smallLenth = $('.news-slider').length - 1;
      var smallNum = 0;
      var smallTimer = null;

      function smallMove() {
        $('.news-slider').eq(smallNum).addClass('newsmove').siblings().removeClass('newsmove');
      }

      function smallMoueAuto() {
        smallNum++;
        smallNum = smallNum > smallLenth ? 0 : smallNum;
        smallMove();
      }

      function toLeft() {
        smallNum--;
        smallNum = smallNum < 0 ? smallLenth : smallNum;
        smallMove();
      }
      smallTimer = setInterval(smallMoueAuto, 3000);

      $('.right').click(function() {
        smallMoueAuto()
      })
      $('.left').click(function() {
        toLeft()
      })
      $('.lft-news-slider').mouseover(function() {
        clearInterval(smallTimer);
      })
      $('.lft-news-slider').mouseout(function() {
        smallTimer = setInterval(smallMoueAuto, 3000);
      })
    },
    getTxt() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/videoinfo',
      }).then(function(res) {
        _this.text = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getV() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/video',
      }).then(function(res) {
        _this.vedioUrl = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    }
  }
}
</script>

<style lang="scss">
@import "../../assets/sass/common.scss";
@import "../../assets/sass/comps-scss/state.scss";
</style>
