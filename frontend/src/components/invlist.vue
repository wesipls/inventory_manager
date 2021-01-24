//invlist.vue

<template>
	<div id="main">
		<div id="topbar">
			<input type="text"  id="searchbox" placeholder="Search Inventory" v-model="query" @keyup="getInventorylist()" />
			<h4 id="counter">There are a total of {{ inventorylist.length }} devices found with current keyword</h4>
			<div id="topspanner">
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
			</div>
		</div>
		<div id="wrap">
			<table>
				<tr v-for="data in inventorylist" :key=data.id>
					<td style="width: 50px;">{{ data.laptop_id }}</td>
					<td class="default">{{ data.laptop_location }}</td>
					<td class="default">{{ data.laptop_name }}</td>
					<td class="default">{{ data.laptop_model }}</td>
					<td class="default">{{ data.laptop_manufacturer }}</td>
					<td class="default">{{ data.laptop_price }}</td>
					<td class="default">{{ data.laptop_purchase_date }}</td>
					<td class="default">{{ data.laptop_warranty_date }}</td>
					<td style="width:462px;">{{ data.laptop_info }}</td>
					<td style="width: 80px;">{{ data.laptop_status }}</td>
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
				axios.post("http://localhost:8000" , {
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
		position: fixed;
		background-color: #CAF0F8;;
	}
	#searchbox {
		width: 800px;
	}
	#topspanner {
		float: left;
		background-color: #48CAE4;
		padding-right: 20px;
	}
	#wrap {
		background-color: #48CAE4;
		float: left;
		width: 1600px;
		margin-top: 115px;
	}
	table {
	table-layout: fixed;
	}
	td:nth-child(2) {
		max-width: 150px;
		overflow: hidden;
	}
	td:nth-child(3) {
		max-width: 150px;
		overflow: hidden;
	}
	td:nth-child(4) {
		max-width: 150px;
		overflow: hidden;
	}
	td:nth-child(5) {
		max-width: 150px;
		overflow: hidden;
	}
	td:nth-child(6) {
		max-width: 150px;
		overflow: hidden;
	}
	td:nth-child(7) {
		max-width: 150px;
		overflow: hidden;
	}
	td:nth-child(8) {
		max-width: 150px;
		overflow: hidden;
	}
	tr:nth-child(odd) {
		background-color: #CAF0F8;
	}
	tr:nth-child(even) {
		background-color: white;
	}
	.default {
		width: 150px;
		overflow: scroll;
	}
</style>
