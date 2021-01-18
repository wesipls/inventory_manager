//App.vue

<template>
	<div id="app">
		<sidebar />
		<div id="maincontainer">
			<invlist />
		</div>
	</div>
</template>

<script>
import sidebar from './components/sidebar.vue'
import invlist from './components/invlist.vue'

export default {
	name: 'App',
	components: {
		invlist,
		sidebar
	}
}
</script>


<style>
	body {
		margin: 0 auto;
	}
	#app {
		font-family: 'Chakra Petch', sans-serif;
	}
	#maincontainer {
		width: 1200px;
		margin: 0 auto;
	}
</style>
