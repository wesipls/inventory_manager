//invlist.vue

<template>
	<div>
		<button v-on:click="getInventorylist">lol</button>
		<table>
			<tr v-for="data in inventorylist" :key=data.id>
				<td style="width: 50px;">{{ data.laptop_id }}</td>
				<td class="default">{{ data.laptop_name }}</td>
				<td class="default">{{ data.laptop_manufacturer }}</td>
				<td class="default">{{ data.laptop_price }}</td>
				<td class="default">{{ data.purchase_date }}</td>
				<td class="default">{{ data.warranty_date }}</td>
				<td style="width: 300px;">{{ data.info }}</td>
			</tr>
		</table>
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
<style scoped>
td {
border: solid 1px;
}
.default {
	width: 150px;
}
</style>
