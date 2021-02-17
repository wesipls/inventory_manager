<template>
	<div id="main">
	<p>memes</p>
	<form v-on:submit.prevent="submitForm">
		<label for="location">Location</label>
		<input type="text" id="location" placeholder="Location">
		<label for="name">Name</label>
		<input type="text" id="name" placeholder="Name">
	</form>
	</div>
</template>
<script>
	export default {
		name: 'addentry',
	};

</script>
<style scoped>
#main {
	z-index: 2;
}
</style>
