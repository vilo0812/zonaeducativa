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
                <h1 class="text-center mb-5">Verificar de Tickets
                </h1>
                <!-- start boton de busqueda -->
                <v-row justify="center">
                  <v-col cols="12" sm="6">
                    <v-text-field
                      label="Buscar ticket según cédula o codigo del ticket"
                      outlined
                      prepend-icon="mdi-magnify"
                      @change="searching"
                      v-model="search"
                    ></v-text-field>
                  </v-col>
                </v-row>
                <!--end boton que busqueda-->
                  
              <v-row>
              </v-row>

                  
          </v-container>
        </v-card>
      	</content-center>
    	<!-- end el main donde ira el contenido principal -->
	</div>
</template>

<script>
import Side from '.././partials/SideBar.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
export default {
  mounted(){
    // axios.get('/api/getTickets').then(res => {
    //     this.tickets = res.data;
    //   }).catch(err => {
    //     console.log(err);
    //   });
  },
  components:{
      'side-bar':Side,
  		'nav-bar':Nav,
      'content-center':ContentCenter,
  	},
  name: 'CheckingTicket',

  data () {
    return {
    drawer: null,
    search: ''
    }
  },
  created () {
      this.$vuetify.theme.dark = true
    },
    methods: {
      searching(){
        console.log('hola')
      }
    },
    computed: {
    }
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