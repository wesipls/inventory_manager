<template>
	<div class="modal" v-if="show">
		<div id="innerModal">
			<form>
				<div id="labelbox">
					<label for="location">Location</label>
					<label for="name">Name</label>
					<label for="model">Model</label>
					<label for="manufacturer">Manufacturer</label>
					<label for="price">Price</label>
					<label for="dateofpurchase">Date of purchase</label>
					<label for="warrantydate">Warranty date</label>
					<label for="info">Info</label>
					<label for="status">Status</label>
				</div>
				<div id="inputbox">
					<input type="text" class="default" id="location" placeholder="Device location">
					<input type="text" class="default" id="name" placeholder="Device name">
					<input type="text" class="default" id="model" placeholder="Model">
					<input type="text" class="default" id="manufacturer" placeholder="Manufacturer">
					<input type="number" class="default" id="price" min="0.00" step="any" placeholder="Price">
					<input type="text" class="default" onfocus="(this.type='date')" onblur="(this.type='text')" id="dateofpurchase" placeholder="Date of Purchase">
					<input type="text" class="default" onfocus="(this.type='date')" onblur="(this.type='text')" id="warrantydate" placeholder="Warranty date end">
					<input type="text" class="default" id="info" placeholder="Info">
					<input type="text" class="default" id="status" placeholder="Device status">
				</div>
			</form>
			<button type="button" @click="closeModal()">Save</button>
			<button type="button" @click="closeModal()">Close</button>
		</div>
	</div>
</template>

<script>
export default {
  name: "addentry",
  data() {
    return {
      show: false
    };
  },
  methods: {
    closeModal() {
      this.show = false;
      document.querySelector("body").classList.remove("overflow-hidden");
    },
    openModal() {
      this.show = true;
      document.querySelector("body").classList.add("overflow-hidden");
    }
  }
};
</script>


<style scoped>
.modal {
	width: 100%;
	height: 100%;
	position: fixed;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	z-index: 9;
	overflow-x: hidden;
	overflow-y: auto;
	background-color: rgba(102,102,153,0.8);
	text-align: center;
}
#innerModal {
	background-color: #CAF0F8;
	margin: 0 auto;
	width: 80%;

}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
	-webkit-appearance: none;
	margin: 0;
}
input[type=number] {
	-moz-appearance: textfield;
}
.default {
	width: 9%;
}
label {
	display: inline-block;
	width: 10%;
}

</style>
