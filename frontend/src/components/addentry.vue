<template>
	<div id="main">
		<form v-on:submit.prevent="submitForm">
		<div :key="index.id" v-for="(form, index) in forms" id="inputbox">
			<table>
				<tr>
				<td style="width:5%;"><button type="button" v-on:click="removeForm(index)">Rem - </button></td>
				<td style="width:10%;"><input type="text" class="tbl" id="location" placeholder="Device location" v-model="form.location"></td>
				<td style="width:10%;"><input type="text" class="tbl" id="name" placeholder="Device name" v-model="form.name"></td>
				<td style="width:10%;"><input type="text" class="tbl" id="model" placeholder="Model" v-model="form.model"></td>
				<td style="width:10%;"><input type="text" class="tbl" id="manufacturer" placeholder="Manufacturer" v-model="form.manufacturer"></td>
				<td style="width:10%;"><input type="number" class="tbl" id="price" min="0.00" step="any" placeholder="Price" v-model="form.price"></td>
				<td style="width:10%;"><input type="text" class="tbl" onfocus="(this.type='date')" onblur="(this.type='text')" id="dateofpurchase" placeholder="Date of Purchase" v-model="form.dateofpurchase"></td>
				<td style="width:10%;"><input type="text" class="tbl" onfocus="(this.type='date')" onblur="(this.type='text')" id="warrantydate" placeholder="Warranty date end" v-model="form.warrantydate"></td>
				<td style="width:20%;"><input type="text" class="tbl" id="info" placeholder="Info" v-model="form.info"></td>
				<td style="width:5%;"><input type="text" class="tbl" id="status" placeholder="Device status" v-model="form.status"></td>
				</tr>
			</table>
		</div>
		</form>
	</div>
</template>

<script>
import axios from 'axios';
import vue from 'vue';
export default {
	name: "addentry",
	data() {
		return {
		form: {
			location: '',
			name: '',
			model: '',
			manufacturer: '',
			price: '',
			dateofpurchase: '',
			warrantydate: '',
			info: '',
			status: '',
		},
		forms: [],
		};
	},
	methods:{
		addNewForm() {
			this.forms.push(vue.util.extend({}, this.form))
		},
		removeForm(index) {
			vue.delete(this.forms, index);
		},
		submitForm(){
			console.log(this.forms);
			axios.post("http://localhost:8100/create" , this.forms);
		},
		resetFields () {
            Object.assign(this.$data, this.$options.data.call(this));
		},
	}
};
</script>
<style scoped>
#main {
	width: 100%;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
	-webkit-appearance: none;
	margin: 0;
}
input[type=number] {
	-moz-appearance: textfield;
}
label {
	display: inline-block;
	width: 10%;
}
.tbl {
	width:80%;
	border: 0;
	-webkit-appearance: none;
	background-color: transparent;
	outline: none;
}
table {
	width: 100%;
}
tr:nth-child(odd) {
	background-color: #CAF0F8;
}
tr:nth-child(even) {
	background-color: white;
	}
button {
	font-size: 8px;
}
</style>
