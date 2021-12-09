<template>
	<div class="countdown">
		<flip-countdown :labels="labels" deadline="2021-11-16 11:00:00"></flip-countdown>
	</div>
</template>

<script>
	import FlipCountdown from 'vue2-flip-countdown';

	export default {
		components: { FlipCountdown },
		data() {
			return {
				labels: {
					days: 'Өдөр',
					hours: 'Цаг',
					minutes: 'Миниут',
					seconds: 'Секунд'
				}
			}
		},
		mounted() {
			console.log("counter down mounted");
		}
	}
</script>