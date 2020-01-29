<template>
  <div id="inspire">
	<!-- start Nav Bar -->
	<nav-bar v-on:showSideBar="drawer = !drawer"></nav-bar><!-- recordar que este nav bar es capaz de mostrar el side bar que se mantiene oculto -->
	<!-- end Nav Bar -->
  	<!-- start cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <v-navigation-drawer
      v-model="drawer"
      app
      clipped
    >	<!-- start llamamos al side var del super administrador -->
    	<side-bar></side-bar>
    	<!-- end llamamos al side var del super administrador -->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
    	<!-- start contenido de muestra -->
  <v-card class="d-inline-block mx-auto" min-width="700" color="#E24E42">
    <v-container>
      <!-- start hacemos el control delas dependecias -->
      <h1 class="text-center">control de dependencias</h1>
      <v-row>
      <v-select
        class="ml-3"
        v-model="piso"
        color="dark"
        label="Seleccione el piso a verificar: "
        :items="pisos"
        item-text="floor"
        item-value="id"
        prepend-icon="mdi-grid"
      ></v-select>
      <v-btn color="primary" class="mt-3 mx-5" @click="viewZonesAndSectors">Ver</v-btn>
      </v-row>
      <!-- start se mostrara solos si el selector de pisos es seleccionado -->
      <v-simple-table v-if="zonesSector">
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">zona</th>
              <th class="text-left">Sector</th>
              <th class="text-left">Disponibilidad</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in zonesSector">
              <td>zona: {{item.zone}}</td>
              <td>Sector: {{item.sector}}</td>
              <td>
                <!-- mdi-ray-start -->
                <!-- start transicion con css con vue 

                  class="mr-4 light-blue accent-4"

                  class="mr-4 red">
                -->
                <v-btn @click="dependencia=!dependencia" class="ma-2" text icon color="dark">
                  <v-icon :color="iconoColor">{{icono}}</v-icon>
                </v-btn>
                <!-- end transicion con css con vue -->
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
      <!-- end se mostrara solos si el selector de pisos es seleccionado -->
      <!-- start mostramos cuando no se haya mostrado nada todavia por pantalla -->
      <h4 v-else>no hay piso seleccionado</h4>
      <!-- end mostramos cuando no se haya mostrado nada todavia por pantalla -->
      <!-- end hacemos el control delas dependecias -->
    </v-container>
  </v-card>
<!-- end contenido de muestra -->
    </content-center>
    <!-- end el main donde ira el contenido principal-->
  </div>
</template>

<script>
import Side from '.././components/welcomeSuperAdmin/SideBar.vue'
import Nav from '.././partials/welcome/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
  export default {
  	components:{
  		'side-bar':Side,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
  	},
  	data () {
  	  return {
        dependencia:true,
        piso:'',
        pisos:[],
        zonesSector:'',
  	    drawer: null,
  	    	zonas:[
  	    	'despacho',
  	    	'piso 1',
  	    	'piso 2'
  	    	],
  	  };
  	},
    computed: {
      icono () {
        if(this.dependencia){
          return "mdi-ray-end";
        }else{
        return "mdi-ray-start";
        }
      },
      iconoColor(){
        if(this.dependencia){
          return "primary";
        }else{
        return "red";
        }
      }
    },
    mounted(){
      axios.get('/api/viewFloors').then(res => {
        this.pisos=res.data
      }).catch(err => {
        console.log(err);
      });
    },
    methods: {
      viewZonesAndSectors(){
        let id={
          'id':this.piso
        }
        axios.post('/api/viewZonesAndSectors',id).then(res => {
          this.zonesSector=res.data;
        }).catch(err => {
          console.log(err);
        });
      console.log('muestra las zonas wey :v')
      }
    },
    created () {
      this.$vuetify.theme.dark = true
    },
  }
</script>
<style>
  /*start Transiciones CSS con Vue*/
  /*start animacion de entrada*/
  /*esta animacion sera la de entrada*/
    .aparecer-enter{
    opacity: 0 
    }
  /*desde 0 a 1 habra una transicion de 1 s de velocidad*/
    .aparecer-enter-active{
      transition: opacity .1s
    }
  /*end animacion de entrada*/
  /*start animacion de salida*/
  /*ahora configuramos la salida*/
    .aparecer-leave-to{
      opacity: 0
    }
    .aparecer-leave-active {
      transition: opacity .1s
    }
  /*end animacion de salida*/
  /*end Transiciones CSS con Vue*/
</style>