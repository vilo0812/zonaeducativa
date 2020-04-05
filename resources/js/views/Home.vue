<template>
	<div>
		<!-- start nav bar -->
		<nav-bar></nav-bar>
		<!-- end nav bar -->
		<!-- start imagen de fondo -->
		<!-- src="images/background/vibrante vintage.png"> -->
		<v-parallax 
		src="images/background/fondo.jpg"
		>
			<!-- start contenido de la pagina principal -->
  			<h1 class="display-4 text-center">sistema de seguridad de la zona educativa</h1>	
  			<!-- start llamamos al componente de iniciar sesion -->
  			<v-card width="500px" class="ma-auto">
  				<iniciar-sesion></iniciar-sesion>
  			</v-card>
  			<!-- end llamamos al componente de iniciar sesion -->
			<!-- end contenido de la pagina principal -->
		</v-parallax>
		<!-- end imagen de fondo -->
	</div>
</template>

<script>
import Nav from '.././partials/home/NavBar.vue'
import Log from '.././components/home/Login.vue'
export default {

  name: 'Home',
	components:{
			'nav-bar':Nav,
			'iniciar-sesion':Log
		},
  data () {
    return {

    }
  }
}
</script>

<style lang="css" scoped>
</style>