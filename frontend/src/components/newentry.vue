//newentry.vue

<template>
	<div id="main">
		<span style="margin-left:20px;">ID</span>
		<span style="margin-left: 65px;">Location</span>
		<span style="margin-left:90px;">Name</span>
		<span style="margin-left: 110px;">Model</span>
		<span style="margin-left:80px;">Manufacturer</span>
		<span style="margin-left:45px;">Purchase price</span>
		<span style="margin-left:40px;">Purchase date</span>
		<span style="margin-left:45px;">Warranty date</span>
		<span style="margin-left:185px;">Addition info</span>
		<span style="margin-left: 180px;">Status</span>
		<p>ID</p>
		<input type="text">

	</div>
</template>

<script>
	export default {
		name: 'newentry'
	}
</script>
<style scoped>
	#main {
		float: left;
		background-color: #48CAE4;
	}
	span {
		float: left;
	}
</style>
