import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';

Vue.config.productionTip = false

Vue.use(VueRouter);

import Dashboard from './views/dashboard.vue';
import Manager from './views/invmanager.vue';
import Maintenance from './views/maintenance.vue';

const router = new VueRouter({
	mode: 'history',
	base: __dirname,
	routes: [
		{ path: '/', component: Dashboard },
		{ path: '/inventory', component: Manager },
		{ path: '/maintenance', component: Maintenance },
	]
});

new Vue({
	router,
	render: h => h(App),
}).$mount('#app')
