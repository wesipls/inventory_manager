//invlist.vue

<template>
	<div>
		<button v-on:click="getInventorylist">lol</button>
		<div v-for="data in inventorylist" :key="data.id">
		<span>{{data.laptop_name}}</span>
		</div>
	</div>
</template>

<script>
import axios from 'axios';
	export default {
		name: 'invlist',
		data() {
			return {
				inventorylist: []
		};
	},
	methods: {
		getInventorylist() {
			axios
				.get("http://localhost:8000")
				.then(response => (this.inventorylist = response.data));
				}
			}
		};
</script>
