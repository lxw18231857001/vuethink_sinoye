<template>
<div class="bodyBox">
  <div class="page">
    <page-head></page-head>
    <body-border></body-border>
    <!-- <header class="two-head" style="background-image:url('http://www.yeshengrong.com/newimgs/ours/1.png')">
      <div>
        <h1>SINOYE   BRAND  DESIGN</h1>
        <h2>Our team culture: work is not just a livelihood but a way of life</h2>
        <h3>团队文化</h3>
        <h4>关于我们</h4>
      </div>
    </header> -->

    <div class="our-intro">
      <header>
        <h5>{{this.UsIntro[0].en_title}}</h5>
        <h6>{{this.UsIntro[0].zn_title}}</h6>
      </header>
      <article v-for="item in UsIntro">
        <div class="our-art-img1 our-intro-left" :style="{backgroundImage:'url('+item.photo+')'}"></div>
        <div class="our-art-txt1 our-intro-right">
          <h1>{{item.news_title}}</h1>
          <p v-html="item.content"></p>
        </div>
      </article>
      <div class="our-intro-img1" :style="{backgroundImage:'url('+this.UsBanner[0].photo+')'}"></div>
    </div>

    <div class="our-adva">
      <header>
        <h5>{{this.UsAdv[0].en_title}}</h5>
        <h6>{{this.UsAdv[0].zn_title}}</h6>
      </header>
      <article v-html="this.UsAdv[0].content"></article>
      <div class="our-adva-imgs">
        <div class="our-intro-left" :style="{backgroundImage:'url('+this.UsAdv[0].photo+')'}"></div>
        <div class="our-intro-right" :style="{backgroundImage:'url('+this.UsAdv[1].photo+')'}"></div>
      </div>
    </div>

    <div class="our-team">
      <header>
        <h5>{{this.UsTeam[0].en_title}}</h5>
        <h6>{{this.UsTeam[0].zn_title}}</h6>
      </header>
      <!--ours-imgs1 -->
      <div class="our-team-img1" id="our-team-img1">
        <b class="our-img1-left" id="our-img1-left"></b>
        <div class="our-det-imgone" id="our-det-imgone">
          <div class="our-det-imgonelist" id="our-det-imgonelist">
            <main v-for="item in UsTeam">
              <i :style="{backgroundImage:'url('+item.photo+')'}"></i>
              <div v-html="item.content"></div>
            </main>
          </div>
        </div>
        <b class="our-img1-right" id="our-img1-right"></b>
      </div>
      <!--ours-imgs1... -->

      <!--ours-imgs2 -->
      <div class="our-team-img2" id="our-team-img2">
        <div class="our-det-imgtwo" id="our-det-imgtwo">
          <div class="our-det-imgtwolist" id="our-det-imgtwolist">
            <span :style="{backgroundImage:'url('+this.UsSlider[0].photo+')'}"></span>
          </div>
        </div>
      </div>
      <!--ours-imgs2... -->
    </div>
    <body-foot></body-foot>
    <side-bar></side-bar>
    <copy-right></copy-right>
    <router-view></router-view>
  </div>
  <!-- 固定框 -->
  <div class="sm-sidebar">
    <aside>
      <div></div>
      <div class="sm-bar-list">
        <span id="js">叶晟荣介绍</span>
        <span id="ys">我们的优势</span>
        <span id="td">我们的团队</span>
      </div>
    </aside>
  </div>
  <!-- 固定框... -->
</div>
</template>

<script>
import pageHead from "./small-comps/head";
import bodyBorder from "./small-comps/border";
import bodyFoot from "./small-comps/foot";
import sideBar from "./small-comps/sidebar";
import copyRight from "./small-comps/copyright";


export default {
  name: "ours",
  data() {
    return {
      ours: 'ours page',
      scrollWatch: true,
      UsIntro: {},
      UsBanner: {},
      UsAdv: {},
      UsTeam: {},
      UsSlider: {}
    }
  },
  components: {
    pageHead,
    bodyBorder,
    bodyFoot,
    sideBar,
    copyRight
  },

  methods: {
    getUsIntro() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/aboutus',
      }).then(function(res) {
        _this.UsIntro = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getUsBanner() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/aboutus/banner',
      }).then(function(res) {
        _this.UsBanner = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getUsAdv() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/aboutus/advandages',
      }).then(function(res) {
        _this.UsAdv = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getUsTeam() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/aboutus/team',
      }).then(function(res) {
        _this.UsTeam = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getUsSlider() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/aboutus/slider',
      }).then(function(res) {
        _this.UsSlider = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    oursLeftTo() {
      $('.our-intro-left').each(function(index) {
        var oursLeftScrollTop = $(document).scrollTop();
        var oursLeftOffsettop = $(this).offset().top;
        var oursLeftSize = oursLeftOffsettop - oursLeftScrollTop;
        if (oursLeftOffsettop < 600) {
          $(this).addClass("left-to");
        }
      })
    },
    oursRightTo() {
      $('.our-intro-right').each(function(index) {
        var oursRightScrollTop = $(document).scrollTop();
        var oursRightOffsettop = $(this).offset().top;
        var oursRightSize = oursRightOffsettop - oursRightScrollTop;
        if (oursRightSize < 600) {
          $(this).addClass("right-to");
        }
      })
    },
    oursDownTo() {
      var str = ".our-intro header h5;.our-intro header h6;.our-adva header h5;.our-adva header h6;.our-adva-para em;.our-team header h5;.our-team header h6;".split(";");
      for (var i = 0; i < str.length; i++) {
        var twoHeadOffset = $(str.charAt(i)).offset().top;
        var scrollTop = $(document).scrollTop();
        if ((twoHeadOffset - scrollTop) < 800) {
          $(str.charAt(i)).addClass("down-to");
        }
      }
    },
  },
  updated() {

    // this.oursLeftTo()
    // this.oursRightTo()
    //
    // this.getUsIntro()
    // this.getUsBanner()
    // this.getUsAdv()
    // this.getUsTeam()
    // this.getUsSlider()
    //
    // this.oursDownTo()

    this.$nextTick(() => {
      this.oursLeftTo()
      this.oursRightTo()

      this.getUsIntro()
      this.getUsBanner()
      this.getUsAdv()
      this.getUsTeam()
      this.getUsSlider()
      this.oursDownTo()
    })
  },
  mounted() {
    // this.oursLeftTo()
    // this.oursRightTo()
    //
    // this.getUsIntro()
    // this.getUsBanner()
    // this.getUsAdv()
    // this.getUsTeam()
    // this.getUsSlider()
    // this.oursDownTo()

    this.$nextTick(() => {
      this.oursLeftTo()
      this.oursRightTo()

      this.getUsIntro()
      this.getUsBanner()
      this.getUsAdv()
      this.getUsTeam()
      this.getUsSlider()
      this.oursDownTo()
    })

    $(window).on('mousewheel', () => {
      if (this.scrollWatch) {
        this.oursLeftTo()
        this.oursRightTo()
        this.oursDownTo()
      }
    })
    $(function() {
      // var twoHeadNum = 0;
      // var str = ".our-intro header h5;.our-intro header h6;.our-adva header h5;.our-adva header h6;.our-adva-para em;.our-team header h5;.our-team header h6;".split(";");
      // function oursDownTo() {
      //   var twoHeadOffset = $(str[twoHeadNum]).offset().top;
      //   var scrollTop = $(document).scrollTop();
      //   if ((twoHeadOffset - scrollTop) < 800) {
      //     if ($(str[twoHeadNum]).addClass("down-to"), twoHeadNum++, twoHeadNum < str.length) {
      //       oursDownTo();
      //     }
      //   }
      // }
      // oursDownTo();

      // function scaleTo() {
      //   var twoHeadScrollTop = $(document).scrollTop();
      //   var twoHeadOffsettop = $('.two-head').offset().top;
      //   var twoHeadSize = twoHeadOffsettop - twoHeadScrollTop;
      //   if (twoHeadSize < 800) {
      //     $('.two-head').addClass("scale-to");
      //   }
      // }
      // scaleTo();

      // ours-imgs1
      var imgonelist = $('#our-det-imgonelist').html() + $('#our-det-imgonelist').html();
      $('#our-det-imgonelist').html(imgonelist);
      $('#our-det-imgonelist').width($('#our-det-imgonelist span').eq(0).innerWidth() * $('#our-det-imgonelist span').length + "px");
      var ourImgOneWidth = -$('#our-det-imgonelist').outerWidth() / 2 + 'px';
      var oneW = 0;
      var ourImgOneNum = 0;
      var teamTimer;
      var oSpanW = parseInt($('#our-det-imgonelist span').eq(0).innerWidth());

      function ourImgOneMove() {
        $('#our-det-imgonelist').stop().animate({
          left: oneW
        }, 300, 'linear', function() {
          oneW = parseInt(oneW) - oSpanW;
          if (oneW == parseInt(ourImgOneWidth)) {
            $('#our-det-imgonelist').css('left', 0);
            oneW = 0;
            ourImgOneMove();
          } else {
            // teamTimer = setTimeout(function() {
            //   ourImgOneMove();
            // }, 900)
          }
        })
      }
      ourImgOneMove();

      function clickLeftMove() {
        if (Math.abs(parseInt($('#our-det-imgonelist').css('left'))) >= Math.abs(parseInt(ourImgOneWidth))) {
          ourImgOneNum = 0;
        }
        ourImgOneNum -= oSpanW;
        $('#our-det-imgonelist').css('left', ourImgOneNum + 'px');
      }

      function clickRightMove() {
        if (parseInt($('#our-det-imgonelist').css('left')) >= 0) {
          ourImgOneNum = parseInt(ourImgOneWidth);
        }
        ourImgOneNum += oSpanW;
        $('#our-det-imgonelist').css('left', ourImgOneNum + 'px');
      }

      $('#our-img1-left').on('mouseover', function() {
        $('#our-det-imgonelist').stop();
        clearInterval(teamTimer);
      });

      $('#our-img1-right').on('mouseover', function() {
        $('#our-det-imgonelist').stop();
        clearInterval(teamTimer);
      });

      $('#our-img1-left').on('mouseleave', function() {
        oneW = ourImgOneNum;
        ourImgOneMove();
      });

      $('#our-img1-right').on('mouseleave', function() {
        oneW = ourImgOneNum;
        ourImgOneMove();
      });

      $('#our-img1-right').on('click', function() {
        clickLeftMove();
      });

      $('#our-img1-left').on('click', function() {
        clickRightMove();
      });
      // ours-imgs1...

      // ours-imgs2
      var imgtwolist = $('#our-det-imgtwolist').html() + $('#our-det-imgtwolist').html();
      $('#our-det-imgtwolist').html(imgtwolist);
      $('#our-det-imgtwolist').width($('#our-det-imgtwolist span').eq(0).outerWidth() * $('#our-det-imgtwolist span').length + "px");
      var ourImgTwoWidth = -$('#our-det-imgtwolist').outerWidth() / 2 + 'px';

      function ourImgTwoMove() {
        $('#our-det-imgtwolist').stop().animate({
          left: ourImgTwoWidth
        }, 8000, 'linear', function() {
          $('#our-det-imgtwolist').css('left', 0);
          ourImgTwoMove();
        })
      }
      ourImgTwoMove();


      $('#our-det-imgtwo').on('mouseover', function() {
        $('#our-det-imgtwolist').stop(true);
      });
      $('#our-det-imgtwo').on('mouseleave', function() {
        ourImgTwoMove();
      });
      // ours-imgs2...

      // sidebar
      var ourIntroTop = $('.our-intro').offset().top;
      var ourAdvaTop = $('.our-adva').offset().top;
      var ourTeamTop = $('.our-team').offset().top;
      $('#js').click(function() {
        $('#app').animate({
          scrollTop: ourIntroTop
        }, 500, 'swing')

        console.log(ourIntroTop)
      })
      $('#ys').click(function() {
        $('#app').animate({
          scrollTop: ourAdvaTop
        }, 500, 'swing')
      })
      $('#td').click(function() {
        $('#app').animate({
          scrollTop: ourTeamTop
        }, 500, 'swing')
      })
      // sidebar...
    })
  },
  destroyed() {
    this.scrollWatch = false;
  }
}
</script>

<style lang="scss">
@import "../assets/sass/common.scss";
@import "../assets/sass/ours.scss";
@import "../assets/sass/comps-scss/sm-sidebar.scss";
@import "../assets/sass/comps-scss/two-head.scss";
</style>
