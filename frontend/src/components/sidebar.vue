//sidebar.vue

<template>
	<div id="sidebarmain">
		<h1>Read</h1>
		<h1>Write</h1>
		<h1>About</h1>
		<h1>TBA</h1>
	</div>
</template>

<script>
	export default {
		name: 'sidebar',
	}
</script>
<style scoped>
	#sidebarmain {
		position: fixed;
		width: 100%;
		background-color: #ADE8F4;
		overflow: hidden;
	}
	#sidebarmain h1 {
		color: #03045E;
		text-align: center;
		width: 25%;
		float: left;
		font-size: 25px;
		margin: 0px;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	#sidebarmain h1:hover {
		background-color: #0077B6;
	}
</style>
