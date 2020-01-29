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
    > <!-- start llamamos al side var del super administrador -->
      <side-bar></side-bar>
      <!-- end llamamos al side var del super administrador -->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
      <!-- start contenido de muestra -->
  <v-card class="d-inline-block mx-auto" width="1000" color="#E24E42">
    <v-container>
        <h1 class="text-center">Gestionar Visitas</h1>
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
              <th class="text-left">Marcar Salida</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in visitas" :key="item.id">
              <td>{{ item.first_name }}</td>
              <td>{{ item.last_name }}</td>
              <td>{{ item.identification_card }}</td>
              <td>{{ item.phone }}</td>
              <td>{{ item.sector }}</td>
              <td>{{ item.input }}</td>
              <td><v-btn color="purple" @click="target(item.id)">marcar salida</v-btn></td>
            </tr>
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
import Side from '.././components/welcomeSuperAdmin/SideBar.vue'
import Nav from '.././partials/welcome/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
  export default {
    mounted(){
    axios.get('/api/showOnlyNotTargetVisits').then(res => {
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
    methods: {
      target (index) {
        let id={
          'id':index
        }
        axios.patch('/api/targetVisit',id).then(res => {
          location.reload();
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
  /*start Transiciones CSS con Vue*/
  /*start animacion de entrada*/
  /*esta animacion sera la de entrada*/
    .aparecer-enter{
    opacity: 0
    }
  /*desde 0 a 1 habra una transicion de 1 s de velocidad*/
    .aparecer-enter-active{
      transition: opacity .5s
    }
  /*end animacion de entrada*/
  /*start animacion de salida*/
  /*ahora configuramos la salida*/
    .aparecer-leave-to{
      opacity: 0
    }
    .aparecer-leave-active {
      transition: opacity .5s
    }
  /*end animacion de salida*/
  /*end Transiciones CSS con Vue*/
</style>