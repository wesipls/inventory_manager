//dashboard.vue

<template>
	<div id="main">
	<h1>THIS IS A TEMPORARY PAGE FOR THE FRONTPAGE DASHBOARD</h1>
	<alldevices/>
	</div>
</template>

<script>
import alldevices from '../components/alldevices.vue'
	export default {
		name: 'dashboard',
		components: { alldevices,
		},
	};
</script>
<style scoped>
</style>
