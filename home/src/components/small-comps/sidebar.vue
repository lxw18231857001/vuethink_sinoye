<template lang="html">
  <div>
		<div class="sidebar">
			<a class="sidebar-ph"><p>010-59455994&nbsp;&nbsp;&nbsp;&nbsp;4006-0303-99</p></a>
			<!-- <a class="sidebar-qq" href="http://wpa.qq.com/msgrd?v=3&uin=1425784&site=qq&menu=yes" target="_blank"></a> -->
			<a class="sidebar-dg"><router-link to="/server"></router-link> </a>
			<a class="sidebar-wx"><img src="../../assets/imgs/wx.png" alt="" /></a>
			<a class="go-top" @click="this.$common.goTop"></a>
		</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      scrollWatch: true
    }
  },
  methods: {

  },
  updated() {

  },
  destroyed() {
    this.scrollWatch = false;
  },
  mounted() {
    $(window).on('mousewheel', () => {
      if (this.scrollWatch) {
        var offsetTop = $('.foot').offset().top;
        if (offsetTop < 500) {
          $('.sidebar').css('opacity', 1);
        } else {
          $('.sidebar').css('opacity', 0);
        }
      }
    })
  }
}
</script>

<style lang="scss" scoped>
.sidebar {
    width: 60px;
    height: 210px;
    position: fixed;
    right: 0;
    bottom: 10px;
    background: #fcc800;
    z-index: 99999;
    transition: all 1s ease-out 0s;
    -webkit-transition: all 1s ease-out 0s;
    -moz-transition: all 1s ease-out 0s;
    opacity: 0;
    @media screen and(max-width: 1024px) {
        display: none;
    }
    a {
        width: 40px;
        height: 40px;
        opacity: 1;
        margin: 10px 5px 10px 15px;
        text-align: center;
        line-height: 40px;
        color: #000;
        display: block;
        position: relative;
        transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        &.sidebar-ph {
            p {
                height: 40px;
                line-height: 40px;
                width: 240px;
                color: #000;
                padding-left: 40px;
                font-size: 14px;
                background-color: #fcc800;
                position: absolute;
                left: 0;
                top: 0;
                transition: all 0.5s ease-in-out;
                -webkit-transition: all 0.5s ease-in-out;
                -moz-transition: all 0.5s ease-in-out;
                background: #fcc800 url("../../assets/imgs/ph1.png") no-repeat -3px center;
            }
            &:hover {
                p {
                    background: #fcc800 url("../../assets/imgs/ph2.png") no-repeat 0 center;
                    left: -240px;
                    color: #000;
                }
            }
        }
        &.sidebar-qq {
            background: #fcc800 url("../../assets/imgs/qq1.png") no-repeat center;
            &:hover {
                background-image: url("../../assets/imgs/qq2.png");
                background-color: #fcc800;
            }
        }
        &.sidebar-dg {
            background: #fcc800 url("../../assets/imgs/dg1.png") no-repeat center;
            &:hover {
                background-image: url("../../assets/imgs/dg2.png");
                background-color: #fcc800;
            }
        }
        &.sidebar-wx {
            position: relative;
            width: 40px;
            height: 40px;
            background: #fcc800 url("../../assets/imgs/wx1.png") no-repeat center center;
            &:hover {
                background: #fcc800 url("../../assets/imgs/wx2.png") no-repeat center center;
                background-color: #fcc800;
                img {
                    opacity: 1;
                    visibility: visible;
                    z-index: 1;
                    filter: alpha(opacity=  '100');
                    transition: all 0.3s ease-in-out;
                    -moz-transition: all 0.3s ease-in-out;
                    -webkit-transition: all 0.3s ease-in-out;
                }
            }
            img {
                width: 100px;
                height: 100px;
                position: absolute;
                left: -115px;
                top: 0;
                opacity: 1;
                visibility: hidden;
                z-index: -4;
                filter: alpha(opacity=  '0');
                transition: all 0.3s ease-in-out;
                -moz-transition: all 0.3s ease-in-out;
                -webkit-transition: all 0.3s ease-in-out;
            }
        }
        &.go-top {
            background: #fcc800 url("../../assets/imgs/up1.png") no-repeat center;
            cursor: pointer;
            &:hover {
                background-image: url("../../assets/imgs/up2.png");
                background-color: #fcc800;
            }
        }
    }

}
</style>
