<template>
  <div id="inspire" class="fondo-2">
	<!-- start Nav Bar -->
	<nav-bar v-on:showSideBar="drawer = !drawer"></nav-bar><!-- recordar que este nav bar es capaz de mostrar el side bar que se mantiene oculto -->
	<!-- end Nav Bar -->
  	<!-- start cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <v-navigation-drawer
      v-model="drawer"
      app
      clipped
      dark
    >	<!-- start llamamos al side var -->
    	<side-bar></side-bar>
    	<!-- end llamamos al side var -->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
    	<!-- start contenido de muestra -->
  <v-card class="d-inline-block mx-auto px-5" color="grey darken-2" lighted>
    <v-container>
      <!-- start hacemos el control delas dependecias -->
      <h1 class="text-center">control de dependencias</h1>
      <v-row>
        <Floors @floor="getDataFloor"/>
      </v-row>
      <!-- start se mostrara solos si el selector de pisos es seleccionado -->
      <v-simple-table v-if="zonesSector" >
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">zona</th>
              <th class="text-left">Sector</th>
              <th class="text-left">Disponibilidad</th>
            </tr>
          </thead>
          <transition
                    name="animate.css"
                enter-active-class="animated fadeInDownBig"
                appear
                >
          <tbody>
            <tr v-for="(item,index) in zonesSector">
              <td>zona: {{item.zone}}</td>
              <td>Sector: {{item.sector}}</td>
              <td>
                <v-btn @click="changeStateDependence(item.id,index)" class="ma-2" text icon color="dark">
                  <transition name="aparecer" appear>
                  <v-icon v-if="item.dependence" color="blue">mdi-ray-end</v-icon>
                  <v-icon v-else color="red">mdi-ray-start</v-icon>
                  </transition>
                </v-btn>
              </td>
            </tr>
          </tbody>
        </transition>
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
import Side from '.././partials/SideBar.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
import Floors from '.././components/viewFloors/Floors.vue'
  export default {
  	components:{
      'side-bar':Side,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
      'Floors': Floors
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
      getDataFloor(floor){
        this.piso = floor;
        this.showZonesAndSectors();
      },
      showZonesAndSectors(){
        let url = `/api/showZonesAndSectors/${this.piso}`;
        axios.get(url).then(res => {
          this.zonesSector=res.data;
        }).catch(err => {
          console.log(err);
        });
      },
      changeStateDependence(id,index){
        let param = {
          'id':id
        }
        axios.post('/api/changeStateDependence',param).then(res => {
          this.zonesSector[index].dependence=!this.zonesSector[index].dependence
        }).catch(err => {
          console.log(err);
        });
      }
    },
    created () {
      this.$vuetify.theme.dark = true
    },
  }
</script>
<style>
.fondo-2{
    background: #EEEEEE;
    min-height: 700px;
  }
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