<template>
	<div id="main">
		<div id="entrytopbar">
			<button @click="$refs.modalName.openModal()">Add entry</button>
			<button>Delete Entry</button>
		</div>
		<invlist />
		<addentry ref="modalName">
		</addentry>
	</div>
</template>

<script>
	import addentry from '../components/addentry.vue'
	import invlist from '../components/invlist.vue'

	export default {
		name: 'invmanager',
		components: {
			addentry,
			invlist
		},

		data() {
			return {
			};
		}
	}

</script>
<style scoped>
	button {
		max-width: 20%;
	}
	#entrytopbar {
		text-align: center;
		background-color: #CAF0F8;
		position: fixed;
		width: calc(100% - 240px);
		z-index: 3;
	}
</style>
