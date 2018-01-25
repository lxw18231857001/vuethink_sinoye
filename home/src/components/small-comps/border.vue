<template lang="html">
  <div id="bodyBorder">
    <!-- <div class="border-top"></div>
    <div class="border-right"></div>
    <div class="border-bottom"></div>
    <div class="border-left"></div> -->
  </div>
</template>

<script>
export default {
  name: "border",
  data() {
    return {

    }
  }
}
</script>

<style lang="scss">
.bodyBorders {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    background-color: #fcc800;
    position: fixed;
    z-index: 999999999;

}
.borderheight {
    height: 10px;
    @media screen and (max-width: 767px) {
        height: 5px;
    }
}
.borderwidth {
    width: 10px;
    @media screen and (max-width: 767px) {
        width: 5px;
    }
}
#bodyBorder {
    .border-top {
        @extend .borderheight;
        @extend .bodyBorders;
        width: 100%;
        top: 0;
        left: 0;
    }

    .border-right {
        @extend .borderwidth;
        @extend .bodyBorders;
        height: 100%;
        top: 0;
        right: 0;

    }
    .border-bottom {
        @extend .borderheight;
        @extend .bodyBorders;
        width: 100%;
        left: 0;
        bottom: 0;
    }
    .border-left {
        @extend .borderwidth;
        @extend .bodyBorders;
        height: 100%;
        top: 0;
        left: 0;
    }
}
</style>
