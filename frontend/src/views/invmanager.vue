<template>
	<div>
		<a v-on:click="isHidden = !isHidden" href="#">Add Entry</a>
		<addentry v-if="!isHidden"></addentry>
		<invlist />
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
				isHidden: true
			};
		}
	}

</script>
