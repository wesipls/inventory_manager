//invlist.vue
<template>
	<div id="main">
		<div id="topbar">
		<h4 id="counter">Found {{ inventorylist.length }} devices</h4>
		<input type="text"  id="searchbox" placeholder="Search Inventory" v-model="query" @keyup="getInventorylist()" />
		<button type="button" @click="$refs.addentry.addNewForm();">New Entry</button>
		<button type="button" @click="submitUpdates(); submitNewEntries(); loadList();">Submit entries</button>	
			<p style="float: left; margin-top: 0px;">{{ notification }}</p>
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
					<td style="width:10%"><input class="tbl" type="text" v-model="data.device_location" v-on:input=stopPolling();></td>
					<td style="width:10%"><input class="tbl" type="text" v-model="data.device_name" v-on:input="stopPolling();"></td>
					<td style="width:10%"><input class="tbl" type="text" v-model="data.device_model" v-on:input="stopPolling();"></td>
					<td style="width:10%"><input class="tbl" type="text" v-model="data.device_manufacturer" v-on:input="stopPolling();"></td>
					<td style="width:10%"><input class="tbl" type="text" v-model="data.device_price" v-on:input="stopPolling();"></td>
					<td style="width:10%"><input class="tbl" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" v-model="data.device_purchase_date" v-on:input="stopPolling();"></td>
					<td style="width:10%"><input class="tbl" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" v-model="data.device_warranty_date" v-on:input="stopPolling();"></td>
					<td style="width:20%"><input class="tbl" type="text" v-model="data.device_info" v-on:input="stopPolling;"></td>
					<td style="width:5%"><input class="tbl" type="text" v-model="data.device_status" v-on:input="stopPolling();"></td>
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
		this.loadList();
		},
		data() {
			return {
				inventorylist: [],
				query:'',
				nodata:false,
				notification:'',
			};
		},
		methods: {
			async getInventorylist() {
					await axios.post("http://localhost:8100/read" , {
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
			loadList() {
				this.polling = setInterval(() => {
					this.getInventorylist();
				}, 10000)
				this.notification = '';
			},
			async submitNewEntries() {
				await this.$refs.addentry.submitForm();
				await this.getInventorylist();
			},
			async submitUpdates(){
				await axios.post("http://localhost:8100/update" , this.inventorylist);
			},
			stopPolling(){
				clearInterval(this.polling);
				this.notification = "Polling stopped";
			},

		},

			beforeMount() {
				this.getInventorylist();
		},
			beforeDestroy() {
				this.stopPolling();
			}
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
		width: 15%;
		margin-top: 5px;
		float: left;
		margin-bottom: 0px;
		padding-bottom: 0px;
	}
	#searchbox {
		width: 30%;
		float: left;
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
		padding-top: 50px;
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
