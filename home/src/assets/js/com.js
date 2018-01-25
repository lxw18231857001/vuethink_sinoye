// window.onload = function() {
$(function() {
  var winHeight = $(window).height();
  var offseth = $(".ysr-brand").offset();
  var offsetk = $(".IndexList").offset();
  var h = offseth.top;
  var k = offsetk.top;

  // slider
  var slide = $('.curs');
  var leng = slide.length - 1;
  var slideI = 0;

  function Animate() {
    slide.eq(slideI).addClass('visb').siblings().removeClass('visb')
  }
  setInterval(function() {
    slideI++;
    slideI = slideI > leng ? 0 : slideI;
    Animate();
  }, 2000)
  // slider...

  // caseslider
  var len = $('.imgs-static1').length - 1;
  var imgsNum = 0;
  var timer1 = null;

  function Move() {
    $('.imgs-static1').eq(imgsNum).addClass('imgsmove').siblings().removeClass('imgsmove');
    $('.imgs-static2').eq(imgsNum).addClass('imgsmove').siblings().removeClass('imgsmove');
    $('.imgs-static3').eq(imgsNum).addClass('imgsmove').siblings().removeClass('imgsmove');
    $('.imgs-static4').eq(imgsNum).addClass('imgsmove').siblings().removeClass('imgsmove');
    $('.imgs-static5').eq(imgsNum).addClass('imgsmove').siblings().removeClass('imgsmove');
    $('.imgs-static6').eq(imgsNum).addClass('imgsmove').siblings().removeClass('imgsmove');
    $('.imgs-static7').eq(imgsNum).addClass('imgsmove').siblings().removeClass('imgsmove');
    $('.imgs-static8').eq(imgsNum).addClass('imgsmove').siblings().removeClass('imgsmove');
    $('.imgs-static9').eq(imgsNum).addClass('imgsmove').siblings().removeClass('imgsmove');
    $('.case-menu').eq(imgsNum).addClass('menu-list').siblings().removeClass('menu-list');
  }

  function moueAuto() {
    imgsNum++;
    imgsNum = imgsNum > len ? 0 : imgsNum;
    Move();
  }

  timer1 = setInterval(moueAuto, 3000);

  for (var i = 0; i < $('.case-menu').length; i++) {
    $('.case-menu')[i].index = i;
    $('.case-menu')[i].onmouseover = function() {
      imgsNum = this.index;
      Move();
    }
  }

  $('.ysr-case').mouseover(function() {
    clearInterval(timer1);
  })
  $('.ysr-case').mouseout(function() {
    timer1 = setInterval(moueAuto, 3000);
  })
  // caseslider...

  // state
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
  // nslide.click(function() {
  //   $('.works-slide ul').stop();
  //   this_ = $(this).index();
  //   wi = this_;
  //   wslide.eq(wi).addClass('cur').siblings('li').removeClass('cur');
  //   nslide.eq(wi).addClass('cues').siblings('li').removeClass('cues')
  // });
  setInterval(sides, 3000)


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
  // leftnews...


  // window.onscroll = function() {
  $(window).scroll(function() {
    var scrollTop = $(document).scrollTop();
    // $('.sub-mouse').click(function() {
    //   $("html,body").animate({
    //     "scrollTop": winHeight
    //   }, 500)
    // });

    // 摆动栏
    // var offsetwaperbox = $('.index-waper-box').offset();
    var waperboxoffsettop = $('.index-waper-box').offset().top;
    var waperbox = waperboxoffsettop - scrollTop;
    if (waperbox < 300) {
      $('.index-waper-box').addClass('wapermovein').removeClass('wapermoveout');
    } else {
      $('.index-waper-box').addClass('wapermoveout').removeClass('wapermovein');
    }
    // 摆动栏...

    // var e = ".ysr-waperTit;.IndexList;".split(";");
    // var c = 0;
    // function d() {
    //    if (c == e.length) return !1;
    //    var f = $(e[c]).offset().top,
    //      b = $(window).scrollTop() - 300;
    //    if (f < b)
    //      if ($(e[c]).addClass("active"), c++, c < e.length) d();
    //      else return !1;
    //    else return !1
    //  }
    //  d();
    //  $(window).scroll(function() {
    //  d();
    //  });


    // var e = ".ysr-waperTit;.IndexList;".split(";");
    // var c = 0;
    // function d(){
    //   if (c == e.length) return !1;
    //   var offsetf = $(e[c]).offset();
    //   var f = offsetf.top;
    //   var g = f - scrollTop;
    //   if (g < 500) {
    //     $(e[c]).addClass("active");
    //     c++;
    //     if (c < e.length) {
    //       d();
    //     } else {
    //       return !1;
    //     }
    //   } else {
    //     return !1;
    //   }
    // }
    // d();

    var waperboxoffsettop = $('.ysr-waperTit').offset().top;
    var wapertit = waperboxoffsettop - scrollTop;
    if (wapertit < 300) {
      $('.ysr-waperTit').addClass('active');
    }

    var indexlistoffsettop = $('.IndexList').offset().top;
    var indexlist = indexlistoffsettop - scrollTop;
    if (indexlist < 300) {
      $('.IndexList').addClass('active');
    }

    function b() {
      $('.nub').eq(0).XNumber(2005, true);
      $('.nub').eq(1).XNumber(9000, true);
      $('.nub').eq(2).XNumber(9000, true);
      $('.nub').eq(3).XNumber(9000, true);
    };

    function cc() {
      $('.nub').eq(0).XNumber(1999, true);
      $('.nub').eq(1).XNumber(1234, true);
      $('.nub').eq(2).XNumber(5678, true);
      $('.nub').eq(3).XNumber(3578, true);
    }
    // var offseth = $(".ysr-brand").offset();
    // var offsetk = $(".IndexList").offset();
    // var h = offseth.top;
    // var k = offsetk.top;
    // var e = $(document).scrollTop();
    if (scrollTop >= k - winHeight) {
      b()
    }
    // else {
    //   cc()
    // }
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
        h = [];
        for (a = 0; a < f; a++) h[a] = g.substring(a, a + 1);
        if (!0 === c)
          for (b.children(".NumContent").removeClass("active"), a = 0; a < f; a++) b.children(".NumContent").children().eq(a).css({
            transform: "translateY(" +
              -(parseInt(h[a]) + 10) * height + "px)",
            opacity: "1"
          });
        else if (!1 === c) b.children(".NumContent").addClass("active"), b.children(".NumContent").children().css({
          transform: "translateY(0px)",
          opacity: "0"
        });
        else return !1
      }
    })(jQuery);


    // // foot
    // var contextoffsettop = $(".sub-conText").offset().top;
    // var context = contextoffsettop - scrollTop;
    // if (context < 500 && context > -300) {
    //   $('.sub-conText').addClass('sublive').removeClass('subdie');
    // } else {
    //   $('.sub-conText').addClass('subdie').removeClass('sublive');
    // }
    // // foot...

    // leftnew  rightnew
    var lftnewsoffsettop = $('.lft-news').offset().top;
    var lftnews = lftnewsoffsettop - scrollTop;
    if (lftnews < 500 && lftnews > -250) {
      $('.lft-news').addClass("lftlive").removeClass("lftdie");
    } else {
      $('.lft-news').addClass("lftdie").removeClass("lftlive");
    }


    var ritnewsoffsettop = $('.rit-news').offset().top;
    var ritnews = ritnewsoffsettop - scrollTop;
    if (ritnews < 500 && ritnews > -250) {
      $('.rit-news').addClass("ritlive").removeClass("ritdie");
    } else {
      $('.rit-news').addClass("ritdie").removeClass("ritlive");
    }
    // leftnew  rightnew...
  })
  // }
})
// }
