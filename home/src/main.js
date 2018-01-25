// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import babel from 'babel-polyfill'
import $ from 'jquery'
import 'jquery-mousewheel'

import axios from 'axios'

// axios.defaults.baseURL = 'http://47.93.97.127/php/';
// axios.defaults.timeout = 1000 * 15
// // axios.defaults.headers['Content-Type'] = 'application/json'
// axios.defaults.headers.get['X-Requested-With'] = 'XMLHttpRequest';
// Vue.prototype.$ajax = axios;

var ajax = axios.create({
  // baseURL: 'http://47.93.97.127/php/',
  baseURL: 'http://192.168.1.138/vuethink/php/index.php/',
  // baseURL: 'http://www.netjc.cn/phpsinoye/index.php/',
  timeout: 1000,
  headers: {
    'X-Requested-With': 'XMLHttpRequest'
  },
});
Vue.prototype.$ajax = ajax;

import common from "./assets/js/common.js"
Vue.prototype.$common = common;
Vue.use(common);

// import EasyScroll from 'easyscroll';
// Vue.use(EasyScroll);

Vue.config.productionTip = false
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: {
    App
  }
})
