<template>
	<div>
		<addentry />
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
		}
	}
</script>
