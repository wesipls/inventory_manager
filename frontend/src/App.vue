//App.vue

<template>
	<div id="app">
	<div id="nav">
	<router-link to="/">Dashboard</router-link>
	<router-link to="/inventory">Inventory</router-link>
	<router-link to="/maintenance">Maintenance</router-link>
	</div>
		<div id="maincontainer">
		<router-view/>
		</div>
	</div>
</template>

<script>

export default {
	name: 'App',
	components: {
	}
}
</script>


<style>
	body {
		margin: 0 auto;
		background-color: #CAF0F8;
	}
	#app {
		font-family: 'Chakra Petch', sans-serif;
	}
	#nav {
	height: 100%;
	background-color: #03045E;
	top: 0;
	left: 0;
	width: 180px;
	z-index: 1;
	position: fixed;
	overflow: hidden;
	}
	#nav a {
	padding: 10px;
	display: block;
	text-decoration: none;
	font-size: 23px;
	padding-left: 20px;
	color: #CAF0F8;
	}
	#nav a.router-link-exact-active {
	background-color: #CAF0F8;
	color: #03045E;
	}
	#maincontainer {
		margin-left: 210px;
		margin-right: 30px;
	}
</style>
