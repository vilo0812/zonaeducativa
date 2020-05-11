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
    <!-- start side bar -->
      <side-bar></side-bar>
      <!-- end side  bar -->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
    	<!-- start contenido de muestra -->
  <v-card class="d-inline-block mx-auto" color="grey darken-2">
    <v-container>
		    <h1 class="text-center">Visualizar Visitas</h1>
        <!-- start boton de descargar -->
        <v-btn
          color="success"
          class="ma-2 white--text"
          href="/showVisits"
        >
          Visualizar PDF
          <v-icon right dark>mdi-file-pdf</v-icon>
        </v-btn>
        <v-btn
          color="blue"
          class="ma-2 white--text"
          href="/pdfVisits"
        >
          Descargar PDF
          <v-progress-circular
      indeterminate
      color="primary"
    ></v-progress-circular>
          <v-icon right dark>mdi-cloud-upload</v-icon>
        </v-btn>
        <!-- end boton de descargar -->
        <!-- start visualizacion de las visitas al edificio -->
      <v-simple-table>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Nombre</th>
              <th class="text-left">Apellido</th>
              <th class="text-left">Cedula</th>
              <th class="text-left">teléfono</th>
              <th class="text-left">sector</th>
              <th class="text-left">llegada</th>
              <th class="text-left">salida</th>
            </tr>
          </thead>
          <tbody>
            <template v-if="visitas.length">
            <tr v-for="item in visitas" :key="item.id">
              <td>{{ item.first_name }}</td>
              <td>{{ item.last_name }}</td>
              <td>{{ item.identification_card }}</td>
              <td>{{ item.phone }}</td>
              <td>{{ item.sector }}</td>
              <td>{{ item.input }}</td>
              <td>{{ item.output }}</td>
            </tr>
          </template>
          <template v-else>
              <h2 class="text-center">no hay registros...</h2>
          </template>
          </tbody>
        </template>
      </v-simple-table>
        <!-- end visualizacion de las visitas al edificio -->
    </v-container>
  </v-card>
<!-- end contenido de muestra -->
    </content-center>
    <!-- end el main donde ira el contenido principal-->
  </div>
</template>

<script>
import Side from '.././partials/SideBar.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
  export default {
    mounted(){
    axios.get('/api/showVisits').then(res => {
        this.visitas=res.data
      }).catch(err => {
        console.log(err);
      });
    },
  	components:{
  		'side-bar':Side,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
  	},
  	data () {
  	  return {
  	    drawer: null,
        visitas:[],
  	  };
  	},
    computed: {
      rol() {
        return this.$store.state.currentUser.rol_id;
      }
    },
    created () {
      this.$vuetify.theme.dark = true
    },
  }
</script>
<style>
  .fondo{
    background: #EEEEEE;
    min-height: 700px;
  }
</style>