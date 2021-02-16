<template>
	<div id="main">
	<p>memes</p>
	<form v-on:submit.prevent="submitForm">
		<label for="location">Location</label>
		<input type="text" id="location" placeholder="Location" v-model="form.location">
		<label for="name">Name</label>
		<input type="text" id="name" placeholder="Name" v-model="form.name">
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
	margin-top: 500px;
	margin-left: 500px;
	float: left;
}
</style>
