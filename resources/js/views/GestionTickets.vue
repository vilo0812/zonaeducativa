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
        <!-- start dialog -->
        <v-dialog
        v-model="dialog"
        max-width="550"
        :light="true"
        >
      <v-card>
        <v-card-title class="headline">¿Estas seguro de querer actualizar los tickets?</v-card-title>

        <v-card-text>
          Vamos a actualizar el codigo de todos los tickets del edificio con codigos nuevos para mejorar la seguridad, los codigos anteriores dejaran de funcionar ¿esta seguro que desea continuar?
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="error"
            @click="dialog = false"
          >
            cancelar
          </v-btn>

          <v-btn
            color="primary"
            @click="updateTickets"
          >
            continuar
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <!-- end dialog -->
      <v-card class="d-inline-block mx-auto title" color="grey darken-2">
          <v-container>
                <h1 class="text-center mb-5">Gestion de Tickets
                </h1>
                <!-- start boton de actualizar -->
                <v-row justify="space-between">
                 <v-btn
                @click.stop="dialog = true"
                color="primary"
                class="ma-2 white--text mr-5"
                >
                  Actualizar Tickets
                  <v-icon right dark>mdi-refresh</v-icon>
                </v-btn> 
                <v-col sm="12" md="4">
                <v-select
                  color="dark"
                  label="Buscar"
                  :items="searching"
                  item-text="search"
                  item-value="id"
                  prepend-icon="mdi-magnify"
                  v-model="search"
                  @change="getSelectors"
                ></v-select>
                </v-col>
                </v-row>
                <!--end boton que actualiza-->
              <v-row>
                 <!-- start llamamos a el selec que nos permite seleccionar el piso que quiere ver de ticket -->
                 <v-col v-if="showSelectorByFloor" sm="12" md="12">
                   <Floors @floor="getTicketsByFloor"/>
                 </v-col>
                  
                  <!-- end floor -->
                  <!-- start boton para ver todos los tickets en pdf -->
                  <v-col v-if="showSelectorBySector" sm="12" md="12">
                  <Sectors @sector="getTicketsBySector"/>
                  </v-col>
                <!-- end boton para ver todos los tickets en pdf -->
              </v-row>

                  
          </v-container>
        </v-card>
      	</content-center>
        <content-center>
      		<ticket v-for="(item,index) in tickets" :key="index" :ticket="item"/>
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
import Sectors from '.././components/viewFloors/Sectors.vue'
export default {
  mounted(){
    axios.get('/api/getTickets').then(res => {
        this.tickets = res.data;
      }).catch(err => {
        console.log(err);
      });
  },
  components:{
      'side-bar':Side,
  		'nav-bar':Nav,
      'content-center':ContentCenter,
  		'ticket': Ticket,
      'Floors': Floors,
      'Sectors': Sectors
  	},
  name: 'GestionTickets',

  data () {
    return {
    dialog:null,
    drawer: null,
    tickets:[],
    searching:[
    {search:'buscar segun el piso',id:1},
    {search:'buscar segun el sector',id:2}
    ],
    search:null,
    showSelectorByFloor:null,
    showSelectorBySector:null,
    }
  },
  created () {
      this.$vuetify.theme.dark = true
    },
    methods: {
      updateTickets(){
        axios.post('/api/updateTickets').then(res => {
        this.dialog = false;
        swal({
            title:'Completado',
            text:res.data.mensaje,
            icon:'success',
            closeOnClickOutside:false,
            CloseOnEsc:false
          }).then(select=>{
            if(select){
              location.reload();
            }
          });
      }).catch(err => {
        swal('Error','se ha producido un error inesperado','error');
      });
      },
      getSelectors(){
        if(this.search == 1){
          this.showSelectorBySector = false
          this.showSelectorByFloor = true
        }else if(this.search == 2){
          this.showSelectorByFloor = false
          this.showSelectorBySector = true
        }
      },
      getTicketsBySector(sector){
        axios.get(`/api/getTicketsBySector/${sector}`).then(res => {
        this.tickets = res.data;
      }).catch(err => {
        console.log(err);
      });
      },
      getTicketsByFloor(floor){
      axios.get(`/api/getTicketsByFloor/${floor}`).then(res => {
        this.tickets = res.data;
      }).catch(err => {
        console.log(err);
      });
      },
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