<template>
	<div>
		<v-parallax
		src="images/background/fondo.jpg"
		height="700"
		>
				<v-col cols="12" >
					 <v-row class="d-flex flex-column flex-md-row">
			       	<v-col sm="12" md="8" class="d-flex justify-center align-start " height="700">
			       		<transition
			       				name="animate.css"
								enter-active-class="animated fadeInLeftBig"
								appear
								>
			       			<img src="images/icons/zeg.png" alt="" width="500"  >
						</transition>
			       	</v-col>
			       	<v-col  sm="12" md="4">
			       		<v-card height="700" class="grey lighten-4 d-flex justify-center align-center" >
			       			<v-col class="mx-7">
								<h1 class="text-center display-2 mb-5 font-weight-black">Iniciar Sesión</h1>
								<iniciar-sesion></iniciar-sesion>
			       			</v-col>
			       		</v-card>
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
  created () {
      this.$vuetify.theme.dark = false
    },
}
</script>

<style lang="css" scoped>
</style>