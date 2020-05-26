<template>
	<div id="inspire" class="fondo">
		<!-- start Nav Bar -->
		<nav-bar v-on:showSideBar="drawer = !drawer"></nav-bar><!-- recordar que este nav bar es capaz de mostrar el side bar que se mantiene oculto -->
		<!-- end Nav Bar -->
	  	<!-- start cuadro que se mantiene oculto y solo aparecera si drawer es true -->
	    <v-navigation-drawer
	      v-model="drawer"
	      app
	      clipped
	    >
	    <!-- start nav bar -->
	    <side-bar></side-bar>
	    <!-- end nav bar -->
	    </v-navigation-drawer>
	    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
			<!-- start el main donde ira el contenido principal -->
        <content-center>
      <v-card class="d-inline-block mx-auto title" color="grey darken-2">
          <v-container>
              <h1 class="text-center">Visualizar Tickets </h1>
              <!-- start boton de actualizar -->
              
              <!-- start llamamos a el selec que nos permite seleccionar el piso que quiere ver de ticket -->
              <v-row>
                 <v-btn
                color="primary"
                class="ma-2 white--text mr-5"
                >
                  Actualizar Tickets
                  <v-icon right dark>mdi-refresh</v-icon>
                </v-btn> 
                  <Floors @floor="getDataFloor"/>
                  <v-text-field
                    outlined
                    label="Buscar Ticket"
                    prepend-inner-icon="mdi-magnify"
                  ></v-text-field>
              </v-row>
              <!-- end llamamos a el selec que nos permite seleccionar el piso que quiere ver de ticket -->
              <!-- end boton de descarga -->
          </v-container>
        </v-card>
      	</content-center>
        <content-center>
      		<ticket direction="PLANTA BAJA - ZONA 1 - A"/>
      		<ticket direction="PLANTA BAJA - ZONA 1 - B"/>
      		<ticket direction="PLANTA BAJA - ZONA 1 - C"/>
      		<ticket direction="PLANTA BAJA - ZONA 1 - D"/>
      		<ticket direction="PLANTA BAJA - ZONA 1 - E"/>
      	</content-center>
    	<!-- end el main donde ira el contenido principal -->
	</div>
</template>

<script>
import Side from '.././partials/SideBar.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
import Ticket from '.././components/ManagementTickets/Ticket.vue'
import Floors from '.././components/viewFloors/Floors.vue'
export default {
  components:{
      'side-bar':Side,
  		'nav-bar':Nav,
      'content-center':ContentCenter,
  		'ticket': Ticket,
      'Floors': Floors
  	},
  name: 'GestionTickets',

  data () {
    return {
    drawer: null
    }
  },
  created () {
      this.$vuetify.theme.dark = true
    },
    methods: {
      viewTicket () {
        console.log('hola que hace');
      },
      getDataFloor(floor){
        console.log(floor)
      }
    },
}
</script>

<style lang="css" scoped>
.fondo{
    background: #EEEEEE;
    min-height: 1000px;
  }
.title{
  min-width: 1000px;
}
</style>