<template lang="html">
	<!-- <header class="point-head" style="background-image:url(http://www.yeshengrong.com/newimgs/point/1.png)"> -->
    <!-- <div class="c_left" id="c_left">
			<div class="c_left_font">
				<h1>CUSTOM</h1>
				<p>DREAM HOME</p>
				<span>家装案例</span>
			</div>
		</div> -->
  <!-- </header> -->
</template>

<script>
export default {
  mounted() {
    // function scaleTo() {
    //   var pointScrollTop = $(document).scrollTop();
    //   var pointOffsettop = $('.point-head').offset().top;
    //   var pointSize = pointOffsettop - pointScrollTop;
    //   if (pointSize < 500) {
    //     $('.point-head').addClass("scale-to");
    //   }
    // }
    // scaleTo();
  }
}
</script>

<style lang="scss" scoped>
@import "../../assets/sass/common.scss";
.point-head {
    width: 100%;
    height: 4.5rem;
    min-height: 180px;
    margin: 0 auto;
    background-position: 20%;
    background-size: cover;
    overflow: hidden;
    position: relative;
    @extend .delay1000;
    @include transform-scale(0);
    opacity: 0;
    &.scale-to {
        opacity: 1;
        @extend .delay1000;
        @include transform-scale(1);
    }
}
// /*主区域 左边*/
//
// .c_left {
//   width: 50%;
//   height: 100%;
//   margin-left: 5%;
// }
//
// .c_left_font {
//   width: auto;
//   position: absolute;
//   bottom: 20px;
// }
//
// .c_left_font h1 {
//   font-family: "arial black";
//   font-size: 0.7rem;
//   color: #FFF;
//   font-weight: bold;
//   letter-spacing: 0px;
//   word-spacing: 0px;
// }
//
// .c_left_font p {
//   font-family: "arial";
//   font-size: 0.7rem;
//   color: #FFFFFF;
//   font-weight: normal;
//   letter-spacing: 0px;
//   word-spacing: 0px;
//   margin-top: 3%;
// }
//
// .c_left_font span {
//   font-size: 0.4rem;
//   color: #FFF;
//   display: block;
//   margin-top: 3%;
// }
</style>
