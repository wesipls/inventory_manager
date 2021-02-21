<template>
	<div class="modal" v-if="show">
		<div id="innerModal">
		<p> test</p>
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
	width: 60%;

}

</style>
