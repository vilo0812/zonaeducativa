<template>
	<div>
		<!-- start nav bar -->
		<!-- <nav-bar></nav-bar> -->
		<!-- end nav bar -->
		<!-- start imagen de fondo -->
		<!-- src="images/background/vibrante vintage.png"> -->
		<v-parallax
		src="images/background/fondo.jpg"
		height="700"
		>
				<v-col cols="12" >
					 <v-row>
			       	<v-col cols="7" class="d-flex justify-center align-start">
			       		<transition
			       				name="animate.css"
								enter-active-class="animated fadeInLeftBig"
								appear>
			       			<img src="images/icons/zeg.png" alt="" width="500" class="mt-5">
						</transition>
			       	</v-col>
			       	<v-col cols="5">
			       		<v-card height="700" class="grey lighten-4 d-flex justify-center align-center" >
			       			<v-col class="mx-7">
								<h1 class="text-center display-2 mb-5 font-weight-black">Iniciar Sesión</h1>
								<iniciar-sesion></iniciar-sesion>
			       			</v-col>
			       		</v-card>
			  			<!-- <v-card height="800"> -->
			  			<!-- <h1 class="text-center display-2">Iniciar Sesión</h1> -->
			  			<!-- start llamamos al componente de iniciar sesion -->
			  				<!-- <iniciar-sesion></iniciar-sesion> -->
			  			<!-- end llamamos al componente de iniciar sesion -->
			  			<!-- </v-card> -->
			       	</v-col>
			       	</v-row>
				</v-col>
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
  },
}
</script>

<style lang="css" scoped>
</style>