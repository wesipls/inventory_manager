//invlist.vue

<template>
	<div id="main">
		<button v-on:click="getInventorylist">Show all entries</button>
		<button>Search</button>
		<div id="wrap">
			<span style="margin-left:20px;">ID</span>
			<span style="margin-left:70px;">Name</span>
			<span style="margin-left:85px;">Manufacturer</span>
			<span style="margin-left:45px;">Purchase price</span>
			<span style="margin-left:45px;">Purchase date</span>
			<span style="margin-left:45px;">Warranty date</span>
			<span style="margin-left:175px;">Addition info</span>
			<table>
				<tr v-for="data in inventorylist" :key=data.id>
					<td style="width: 50px;">{{ data.laptop_id }}</td>
					<td class="default">{{ data.laptop_name }}</td>
					<td class="default">{{ data.laptop_manufacturer }}</td>
					<td class="default">{{ data.laptop_price }}</td>
					<td class="default">{{ data.purchase_date }}</td>
					<td class="default">{{ data.warranty_date }}</td>
					<td style="width: 400px;">{{ data.info }}</td>
				</tr>
			</table>
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
<style scoped>
	#main {
		padding-top: 80px;
		text-align: center;
		}
	button {
		width: 150px;
		margin: 20px;
	}
	span {
		float: left;	
	}
	#wrap {
		background-color: #48CAE4;
		float: left;
		width: 1200px;
	}
	td {
	}
	tr:nth-child(odd) {
		background-color: #CAF0F8;
	}
	tr:nth-child(even) {
		background-color: #ADE8F4;
	}
	.default {
		width: 150px;
	}
</style>
