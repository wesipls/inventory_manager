//invlist.vue

<template>
	<div id="main">
		<div id="topbar">
		<input type="text"  id="searchbox" placeholder="Search Inventory" v-model="query" @keyup="getInventorylist()" />
		<button type="button" @click="$refs.addentry.addNewForm();">New Entry</button>
		<button type="button" @click="submitUpdates(); $refs.addentry.submitForm(); delayedUpdate(); $refs.addentry.resetFields();">Submit entries</button>
		<button type="button">Archive entries</button>
			<h4 id="counter">Search found {{ inventorylist.length }} devices</h4>
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
		<addentry ref="addentry">
		</addentry>
			<form>
			<table>
				<tr v-for="data in inventorylist" :key=data.id>
					<td style="width:5%"><input class="tbl" type="text" v-model="data.device_id"></td>
					<td style="width:10%"><input class="tbl" type="text" v-model="data.device_location"></td>
					<td style="width:10%"><input class="tbl" type="text" v-model="data.device_name"></td>
					<td style="width:10%"><input class="tbl" type="text" v-model="data.device_model"></td>
					<td style="width:10%"><input class="tbl" type="text" v-model="data.device_manufacturer"></td>
					<td style="width:10%"><input class="tbl" type="text" v-model="data.device_price"></td>
					<td style="width:10%"><input class="tbl" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" v-model="data.device_purchase_date"></td>
					<td style="width:10%"><input class="tbl" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" v-model="data.device_warranty_date"></td>
					<td style="width:20%"><input class="tbl" type="text" v-model="data.device_info"></td>
					<td style="width:5%"><input class="tbl" type="text" v-model="data.device_status"></td>
				</tr>
			</table>
			</form>
		</div>
			
	</div>
</template>

<script>
import axios from 'axios';
import addentry from '../components/addentry.vue'
	export default {
		name: 'invlist',
		components: { 
		addentry,
		},
		created() {
		this.$root.$refs.invlist = this;
		},
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
					)
			},
			submitUpdates(){
				axios.post("http://localhost:8100/update" , this.inventorylist);
			},
			delayedUpdate() {
				setTimeout(() => {
					axios.post("http://localhost:8100/read")
					.then(response => (this.inventorylist = response.data))
				}, 200)
			},

		},

			beforeMount() {
			this.getInventorylist()
		},
	}
</script>
<style scoped>
	#main {
		text-align: center;	
	}
	#topbar {
		position: fixed;
		background-color: #CAF0F8;
		width: calc(100% - 240px);
	}
	#counter {
		width: 20%;
		margin-top: 5px;
	}
	#searchbox {
		width: 40%;
		margin-right: 200px;
	}
	#topspanner {
		background-color: #48CAE4;
		margin: 0;
		padding: 0;
		left: 0;
		right: 0;
	}
	span {
		display: inline-block;
		margin: 0;
		padding: 0;
	}
	#wrap {
		background-color: #48CAE4;
		width: 100%;
		padding-top: 100px;
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
	.tbl {
		width:80%;
		border: 0;
		-webkit-appearance: none;
		background-color: transparent;
		outline: none;
	}	
</style>
