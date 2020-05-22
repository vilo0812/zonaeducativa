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
      dark
    >
     <!-- start side bar -->
      <side-bar></side-bar>
      <!-- end side  bar -->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
      <!-- start contenido de muestra -->
      <v-card class="d-inline-block mx-auto" min-width="1000" color="grey darken-2">
        <v-container>
        <h1 class="text-center">Bitacora</h1>
        <h3 class="text-center">Bitacora del {{rolId(user.rol_id) }} {{ user.first_name}} {{user.last_name}}</h3>
        <!-- start empezamos a hacer los botones de descarga de pdf de bitacora -->
        <v-btn
          color="success"
          class="ma-2 white--text"
          :href="urlViewBitacore"
        >
          Visualizar PDF
          <v-icon right dark>mdi-file-pdf</v-icon>
        </v-btn>
        <v-btn
          color="blue"
          class="ma-2 white--text"
          :href="urlDownloadBitacore"
        >
          Descargar PDF
          <v-icon right dark>mdi-cloud-upload</v-icon>
        </v-btn>
        <!-- end botones de descarga -->
         <!-- start vemos los datos de la botacora -->
        <v-simple-table>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Acción</th>
              <th class="text-left">Hora</th>
              <th class="text-left">Detalles</th>
            </tr>
          </thead>
          <tbody>
            <template v-if="bitacores.length">
            <tr v-for="(item, index) in bitacores" :key="item.id">
              <td>{{ item.action }}</td>
              <td>{{item.input}}</td>
              <td>{{ item.details }}</td>
            </tr>
            </template>
            <template v-else>
              <h2 class="text-center">no hay registros...</h2>
            </template>
          </tbody>
        </template>
      </v-simple-table>
      <!-- star vemos los datos de la botacora - -->
        </v-container>
      </v-card>
      <!-- start contenido de muestra -->
    </content-center>
    <!-- end el main donde ira el contenido principal-->
  </div>
</template>

<script>
import Side from '.././partials/SideBar.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
import {initialize} from '.././helpers/general';
  export default {
    props:['id'],
    mounted(){
      axios.get(`/api/showBitacoreByUserId/${this.id}`).then(res => {
        this.bitacores=res.data;
      }).catch(err => {
        console.log(err);
      });
      axios.get(`/api/showUser/${this.id}`).then(res => {
        this.user=res.data.user;
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
        bitacores:[],
        user:[]
      };
    },
    methods: {
      
      rolId(id){
      return id==2 ? 'Administrador' : 'Jefe de Zona';
      },
    },
    computed: {
      rol() {
        return this.$store.state.currentUser.rol_id;
      },
      urlViewBitacore(){
        return `/verBitacora/${this.user.id}`;
      },
      urlDownloadBitacore(){
        return `/DescargarBitacora/${this.user.id}`;
      },
    },
    created () {
      this.$vuetify.theme.dark = true;
      initialize(this.$store,this.$router);
    },
  }
</script>
<style>
  .fondo{
    background: #EEEEEE;
    min-height: 1000px;
  }
</style>