<script>
import { Doughnut } from 'vue-chartjs';
import axios from 'axios';
export default {
	extends: Doughnut,
		data () {
			return {
				chartStats: [],
				chartData: {
					labels: ["OK", "Broken", "Not Available"],
					datasets: [{
						borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)'               
						],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)'                
						],
						data: [1000, 500, 1500]
						}]
					},
					options: {
						legend: {
							display: true
						},
						responsive: true,
						maintainAspectRatio: false
						}
					}
				},
				mounted () {
					this.renderChart(this.chartData, this.options)
				},
				methods: {
					async getStats() {
						await axios.post("http://localhost:8100/read")
						.then(response => chartStats = response.data);

					},
						
				},
				computed: {
					
				},
}
</script>

<style scoped>
</style>
