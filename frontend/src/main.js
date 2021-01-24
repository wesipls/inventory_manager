import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';

Vue.config.productionTip = false

Vue.use(VueRouter);

import Dashboard from './views/dashboard.vue';
import Read from './components/invlist.vue';
import Write from './components/newentry.vue';

const router = new VueRouter({
	mode: 'history',
	base: __dirname,
	routes: [
		{ path: '/', component: Dashboard },
		{ path: '/read', component: Read },
		{ path: '/write', component: Write },

	]
});

new Vue({
	router,
	render: h => h(App),
}).$mount('#app')
