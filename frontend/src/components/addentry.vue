<template>
	<div class="modal" v-if="show">
		<div class="modal__backdrop" @click="closeModal()"/>
			<div class="modal__dialog">
				<div class="modal__header">
					<slot name="header"/>
					<button type="button" class="modal__close" @click="closeModal()">
					</button>
				</div>
				<div class="modal__body">
					<slot name="body"/>
				</div>
				<div class="modal__footer">
					<slot name="footer"/>
				</div>
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
	background-color: red;
	
}
</style>
