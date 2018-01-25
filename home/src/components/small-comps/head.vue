<template lang="html">
  <div class="head-box">
    <!-- 头部 -->
    <div class="head" id="head">
      <div class="logo">
        <router-link to="/"><img :src="this.logo" alt="logo"></router-link>
        <router-link :to="{path:'/call/addMap/1',params: { add: 'bj'} }"><span>北京</span></router-link>
        <router-link :to="{path:'/call/addMap/2',params: { add: 'sh'} }"><span style="border-left:1px solid #969696;">上海</span></router-link>
        <router-link :to="{path:'/call/addMap/3',params: { add: 'gz'} }"><span style="border-left:1px solid #969696;">广州</span></router-link>
      </div>

      <nav class="nav">
        <ul><li v-for="list in menu"><router-link :to="list.nav">{{list.title}}</router-link></li></ul>
      </nav>
    </div>
		<div class="layer" id="layer">
			<menu class="menu" id="menu" ref="menu" @click="menuSwitch()"></menu>
			<nav class="hid-nav" id="hid-nav" ref="hidNav">
				<ul><li v-for="list in menu"><router-link :to="list.nav">{{list.title}}</router-link></li></ul>
			</nav>
		</div>
		<!-- 蒙层... -->
    <!-- 头部... -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      oMenu: true,
      menu: {},
      logo: ''
    }
  },
  mounted() {
    this.getHead()
    this.getLogo()
    this.$refs.menu.className = 'menuNormal';

    $(function() {
      $('.hid-nav ul li a').each(function(index) {
        $(this).click(function() {
          $('html,body').scrollTop(0);
        })
      })
    });
  },
  methods: {
    getHead() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/Index/nav',
      }).then(function(res) {
        _this.menu = res.data.data;
      }).catch(function(err) {
        console.log(err)
      })
    },
    getLogo() {
      var _this = this;
      this.$ajax({
        method: 'get',
        url: 'home/index/system',
      }).then(function(res) {
        _this.logo = res.data.data[1].value;
      }).catch(function(err) {
        console.log(err)
      })
    },
    menuSwitch() {
      if (this.oMenu) {
        this.$refs.menu.className = 'menuClose'
        this.$refs.hidNav.className = 'height-to'
      } else {
        this.$refs.menu.className = 'menuNormal'
        this.$refs.hidNav.className = ''
      }
      this.oMenu = !this.oMenu
    },
    pageTop() {
      // $('html,body').scrollTop(0);
      // alert(1)
      document.body.scrollTop = document.documentElement.scrollTop = 0;
    }
  },
}
</script>

<style lang="scss" scoped>
@import "../../assets/sass/common.scss";
@import "../../assets/sass/comps-scss/head.scss";
</style>
