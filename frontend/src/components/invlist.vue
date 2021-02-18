//invlist.vue

<template>
	<div id="main">
		<div id="topbar">
			<input type="text"  id="searchbox" placeholder="Search Inventory" v-model="query" @keyup="getInventorylist()" />
			<h4 id="counter">There are a total of {{ inventorylist.length }} devices found with current keyword</h4>
			<div id="topspanner">
				<span style="width:5%">ID</span>
				<span style="width:10%">LOC</span>
				<span style="width:10%">NAME</span>
				<span style="width:10%">MDL</span>
				<span style="width:10%">MFR</span>
				<span style="width:10%">PR</span>
				<span style="width:10%">DOP</span>
				<span style="width:10%">WTY</span>
				<span style="width:20%">INFO</span>
				<span style="width:5%">STAT</span>
			</div>
		</div>
		<div id="wrap">
			<table>
				<tr v-for="data in inventorylist" :key=data.id>
					<td style="width: 5%">{{ data.device_id }}</td>
					<td style="width:10%">{{ data.device_location }}</td>
					<td style="width:10%">{{ data.device_name }}</td>
					<td style="width:10%">{{ data.device_model }}</td>
					<td style="width:10%">{{ data.device_manufacturer }}</td>
					<td style="width:10%">{{ data.device_price }}</td>
					<td style="width:10%;">{{ data.device_purchase_date }}</td>
					<td style="width:10%">{{ data.device_warranty_date }}</td>
					<td style="width:20%">{{ data.device_info }}</td>
					<td style="width:5%">{{ data.device_status }}</td>
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
				inventorylist: [],
				query:'',
				nodata:false,
			};
		},
		methods: {
			getInventorylist() {
				axios.post("http://localhost:8100/read" , {
					query:this.query
				}).then((response) => {
					if(response.data.length > 0)
					{
						this.inventorylist = response.data;
						this.nodata = false;
					}
					else
					{
						this.inventorylist = '';
						this.nodata = true;
					}
					}
					)}
			},
			beforeMount() {
			this.getInventorylist()
		}
		}
</script>
<style scoped>
	#main {
		text-align: center;
		}
	#topbar {
		padding-top: 40px;
		position: fixed;
		background-color: #CAF0F8;
		width: calc(100% - 240px);
	}
	#searchbox {
		width: 60%;
	}
	#topspanner {
		background-color: #48CAE4;
		width: 100%;
	}
	span {
		display: inline-block;
		margin: 0;
		padding: 0;
	}
	#wrap {
		background-color: #48CAE4;
		width: 100%;
		padding-top: 110px;
	}
	table {
		width: 100%;
	}
	td:nth-child(n+2):nth-child(-n+8) {
		width: 150px;
	}
	tr:nth-child(odd) {
		background-color: #CAF0F8;
	}
	tr:nth-child(even) {
		background-color: white;
	}
</style>
