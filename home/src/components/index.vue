<template>
<div class="bodyBox">
  <div class="page">
    <pageHead/>
    <bodyBorder/>
    <!-- 轮播图1 -->
    <div class="scrollBar">
      <div id="Banner" class="banner">
        <ul ref="banner">
          <li class="curs" v-for="(item,i) in imgsrc" :style="{backgroundImage: 'url('+(item.banner)+')'}"></li>
        </ul>
      </div>
      <!-- 摆动栏 -->
      <div class="index-waper-box">
        <div class="index-back-box">
          <ul>
            <li>
              <router-link to="/serve">
                <i></i>
                <em>品牌+</em>
                <span>品牌解释</span>
              </router-link>
            </li>
            <li>
              <router-link to="/serve">
                <i></i>
                <em>互联网+</em>
                <span>互联网解释</span>
              </router-link>
            </li>
            <li>
              <router-link to="/serve">
                <i></i>
                <em>传播+</em>
                <span>传播解释</span>
              </router-link>
            </li>
            <li>
              <router-link to="/serve">
                <i></i>
                <em>天方叶谈</em>
                <span>天方叶谈解释</span>
              </router-link>
            </li>
          </ul>
        </div>
      </div>
      <!-- 摆动栏... -->
    </div>
    <!-- </section> -->
    <!-- 轮播图1... -->

    <section class="ysr-brand">
      <article class="ysr-waperTit">
        <h2>{{this.num[0].title}}</h2>
        <p v-html="this.num[0].content"></p>
      </article>
      <div class="indexList">
        <ul>
          <li>
            <em class="nub"></em>
            <span class="pd">创建时间</span>
          </li>
          <li>
            <em class="nub"></em>
            <span class="pd">设计方案</span>
          </li>
          <li>
            <em class="nub"></em>
            <span class="pd">服务项目</span>
          </li>
          <li>
            <em class="nub"></em>
            <span class="pd">成功客户</span>
          </li>
        </ul>
      </div>
    </section>

    <bodySlider/>
    <pageState/>
    <bodyFoot/>
    <copyRight/>
  </div>
  <!-- 固定框 -->
  <sideBar/>
  <!-- 固定框... -->
</div>
</template>

<script>
import pageHead from "./small-comps/head";
import bodyBorder from "./small-comps/border";
import bodyFoot from "./small-comps/foot";
import bodySlider from "./small-comps/slider";
import pageState from "./small-comps/state";
import sideBar from "./small-comps/sidebar";
import copyRight from "./small-comps/copyright";

export default {
  data() {
    return {
      imgsrc: {},
      num: {},
      scrollWatch: true
    }
  },
  components: {
    pageHead,
    bodyBorder,
    bodySlider,
    bodyFoot,
    pageState,
    sideBar,
    copyRight
  },
  props: [],
  updated: function() {
    this.banner()
  },
  methods: {
    getImgs() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/banner',
      }).then(function(res) {
        _this.imgsrc = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getNum() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/num',
      }).then(function(res) {
        _this.num = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    banner() {
      let slide = this.$refs.banner.children,
        leng = slide.length - 1,
        slideI = 0;

      slide[0].className = 'visb';
      function Animate() {
        for (var i = 0; i < leng; i++) {
          slide[i].className = 'curs'
        }
        slide[slideI].className = 'visb'
      }
      setInterval(function() {
        slideI++;
        slideI = slideI > leng ? 0 : slideI;
        Animate();
      }, 2000)
    }
  },
  mounted() {
    this.getImgs()
    this.getNum()

    $(window).on('mousewheel', () => {
      if (this.scrollWatch) {
        let winH = $(window).height(),
          scrollTop = $(document).scrollTop(),
          offsetwaperbox = $('.index-waper-box').offset(),
          waperboxoffsettop = offsetwaperbox.top,
          waperbox = waperboxoffsettop - scrollTop;

        if (waperbox < 550) {
          $('.index-waper-box').addClass('wapermovein').removeClass('wapermoveout');
        } else {
          $('.index-waper-box').addClass('wapermoveout').removeClass('wapermovein');
        }
        // 摆动栏...

        var waperboxoffsettop = $('.ysr-waperTit').offset().top,
          wapertit = waperboxoffsettop - scrollTop;

        if (wapertit < 550) {
          $('.ysr-waperTit').addClass('active');
        }

        var indexlistoffsettop = $('.indexList').offset().top,
          indexlist = indexlistoffsettop - scrollTop;
        if (indexlist < 550) {
          $('.indexList').addClass('active');
        }

        (function(d) {
          d.fn.XNumber = function(e, c) {
            var g = String(e),
              f = g.length,
              b = d(this);
            if (!b.html()) {
              for (var h = ["NumGe", "NumShi", "NumBai", "NumQian", "NumWan"], k = "", l = "", m = 0; 2 > m; m++)
                for (var a = 0; 10 > a; a++) k = k + '<b class="Txt">' + a + "</b>";
              for (a = 0; a < f; a++) l = l + '<p class="' + h[f - 1 - a] + '">' + k + "</p>";
              b.append('<div class="NumContent">' + l + "</div>")
            }
            var height = b.find(".Txt").height();
            var offsetk = $(".indexList").offset().top;
            h = [];
            for (a = 0; a < f; a++) h[a] = g.substring(a, a + 1);
            if (scrollTop >= offsetk - winH) {
              for (b.children(".NumContent").removeClass("active"), a = 0; a < f; a++) b.children(".NumContent").children().eq(a).css({
                transform: "translateY(" +
                  -(parseInt(h[a]) + 10) * height + "px)",
                opacity: "1"
              });
            } else {
              b.children(".NumContent").addClass("active"), b.children(".NumContent").children().css({
                transform: "translateY(0px)",
                opacity: "0"
              });
            }
          }
        })(jQuery);

        $('.nub').eq(0).XNumber(2005, true);
        $('.nub').eq(1).XNumber(9000, true);
        $('.nub').eq(2).XNumber(9000, true);
        $('.nub').eq(3).XNumber(9000, true);
      }
    })
  },
  destroyed() {
    this.scrollWatch = false;
  }
}
</script>


<style lang="scss" scoped>
@import "../assets/sass/common.scss";
@import "../assets/sass/index.scss";
</style>

<style lang="css">
  @import "../assets/sass/normalize.css";
  .nub {
    font-size: 48px;
    color: #000;
    line-height: 48px;
    height: 48px;
    display: inline-block;
  }

  .NumContent {
    height: 48px;
    display: 48px;
    overflow: hidden;
    position: relative;
    line-height: 48px;
    font-size: 48px;
  }

  .NumContent > p {
    line-height: 48px;
    font-size: 48px;
    display: inline-block;
    transition: all 2s cubic-bezier(.35, .75, .55, 1) 0s;
    -webkit-transition: all 2s cubic-bezier(.35, .75, .55, 1) 0s;
    -moz-transition: all 2s cubic-bezier(.35, .75, .55, 1) 0s;
  }

  .NumContent > p > b {
    line-height: 48px;
    font-size: 48px;
    color: #fcc800;
    display: block;
    font-weight: normal;
  }

</style>
