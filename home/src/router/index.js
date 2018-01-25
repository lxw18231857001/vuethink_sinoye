import Vue from 'vue'
import Router from 'vue-router'

// import index from '@/components/index'
// import serve from '@/components/serve'
// import cases from '@/components/cases'
// import point from '@/components/point'
// import ours from '@/components/ours'
// import call from '@/components/call'
// import server from '@/components/server'

const index = r => require.ensure([], () => r(require('@/components/index')), 'chunkname1')
const serve = r => require.ensure([], () => r(require('@/components/serve')), 'chunkname2')
const cases = r => require.ensure([], () => r(require('@/components/cases')), 'chunkname3')
const point = r => require.ensure([], () => r(require('@/components/point')), 'chunkname4')
const ours = r => require.ensure([], () => r(require('@/components/ours')), 'chunkname5')
const call = r => require.ensure([], () => r(require('@/components/call')), 'chunkname6')
const server = r => require.ensure([], () => r(require('@/components/server')), 'chunkname7')


// 观点三级页面路由
// import pointDet from '@/components/three-comps/point-det'
// import casesDet from '@/components/three-comps/cases-det'
// import addMap from '@/components/three-comps/add-map'

const pointDet = r => require.ensure([], () => r(require('@/components/three-comps/point-det')), 'chunkname8')
const casesDet = r => require.ensure([], () => r(require('@/components/three-comps/cases-det')), 'chunkname9')
const addMap = r => require.ensure([], () => r(require('@/components/three-comps/add-map')), 'chunkname10')

//观点三级页面路由...

Vue.use(Router)

export default new Router({
  routes: [{
      path: '/',
      component: index
    },
    {
      path: '/serve',
      component: serve
    },
    {
      path: '/cases',
      component: cases
    },
    {
      path: '/point',
      component: point
    },
    {
      path: '/ours',
      component: ours
    },
    {
      path: '/call',
      component: call
    },
    {
      path: '/server',
      component: server
    },
    //观点三级页面路由
    {
      path: '/point/pointDet/:id',
      component: pointDet
    },

    {
      path: '/cases/casesDet/:id',
      component: casesDet
    },
    {
      path: '/call/addMap/:add',
      component: addMap
    },
    //观点三级页面路由...
  ]
})
