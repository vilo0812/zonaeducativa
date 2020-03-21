<template>
	<div class="">
		<center>
			<v-col cols="12">
				<h1 class="text-center">pagina no encontrada</h1>
			</v-col>
			<v-col cols="12">
				<center>
					<img src="images/background/DinosaurioConfundido.png" alt="">
				</center>
			</v-col>
		</center>
	</div>
</template>
<script>
import ContentCenter from '.././structures/Center.vue'
	export default{
		name:'NotFound',
		components:{
			'center':ContentCenter
		}
	}
</script>