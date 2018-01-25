<template>
<div id="app" ref="app">
  <router-view></router-view>
</div>
</template>

<script>
export default {
  name: 'app',
  mounted() {
    // var oH = window.screen.height + 'px',
      // oW = window.screen.width + 30 + 'px',
      // oApp = this.$refs.app;
    // oApp.style.width = oW;
    // oApp.style.height = oH;
  },
  methods: {

  }
}
</script>

<style lang="scss" scoped>
#app {
    width: calc(100% + 27px);
    height: 100%;
    overflow-y: auto;
    overflow-x: hidden;
}
</style>
