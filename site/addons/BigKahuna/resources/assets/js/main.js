Vue.prototype.$eventHub = new Vue(); // Global event bus
Vue.component('bkmenulist', require('./components/BkMenuList.vue'));
Vue.component('bkcreatemenu', require('./components/BkCreateMenu.vue'));
Vue.component('bkfilter', require('./components/BkFilter.vue'));
Vue.component('bkcustomlink', require('./components/BkCustomLink.vue'));
Vue.component('bkbranch', require('./components/BkBranch.vue'));
Vue.component('bkbranches', require('./components/BkBranches.vue'));
Vue.component('bkpagetree', require('./components/BkPageTree.vue'));
