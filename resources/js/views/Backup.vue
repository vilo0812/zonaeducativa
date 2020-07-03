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
      <!-- start dialog -->
          <v-dialog
          persistent
          v-model="dialog"
          max-width="700"
          :light="true"
          >
            
            <!-- <h3>Restaurando el Sistema de Fábrica</h3> -->    
        <v-card>
            <router-view @cancel="dialog = false"/>
          <!-- <template v-if="backup">
            
          </template>
            <template v-if="backupToFact">  
              <backup-dialog @cancel="dialog = false"/>
            </template> -->
        </v-card>
      </v-dialog>
      <!-- end dialog -->
        <v-card class="d-inline-block mx-auto" color="grey darken-2" width="600px">
        <v-container>
      	 <h1 class="text-center">Sistema</h1>
         <span class="small text-center">
          <h3>
            Ministerio Del Poder Popular Para la Educación<br/>
            Zona Educativa Del estado Guárico<br/>
            Dirección del municipio Juan Germán Roscio<br/>
            Sistema para el Control de Permanencias para el Edificio de la Zona Educativa del Estado Guárico<br/>
            Gabriel viloria año 2020
          </h3>
        </span>
         <h3>Especificaciones:</h3>
         <ul>
           <li>PHP en su versión: 7.3.14</li>
           <li>mysql en su versión 15.1</li>
           <li>Composer en su versión: 1.10.1</li>
           <li>Laravel en su versión: 5.8</li>
           <li>Vue en su versión: 2.6.10</li>
           <li>HTML en su versión: 5</li>
           <li>CSS en su versión: 3</li>
           <li>vuetify en su versión: 2.0.7</li>
         </ul>
         <v-row justify="center">
         <v-btn color="primary" @click="dialog = true">copia de seguridad y Restauración de Fábrica</v-btn>
         </v-row>
        </v-container>
       </v-card>
    	<!-- end perfil del administrador -->
    </content-center>
    <!-- end el main donde ira el contenido principal-->
  </div>
</template>

<script>
import Side from '.././partials/SideBar.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
import BackupDialog from '.././components/backup/BackupFact.vue';
export default {
	data () {
	  return {
	    drawer:'',
      dialog:null,
      loading:null,
      backupCopy:null,
      backup:true,
      backupToFact:null
	  };
	},
  props:['id'],
  components:{
  		'side-bar':Side,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
      'backup-dialog':BackupDialog
  },
  methods: {
    backupFactDialog(){
      this.backupCopy = true;
      this.backup = false;
    },
    backupDialog(){
      this.backup = false;
      this.backupToFact = true;
    },
    prueba(){
      console.log('hola');
    }
  },
  computed: {
    rol() {
        return this.$store.state.currentUser.rol_id;
      }
  },
  created () {
      this.$vuetify.theme.dark = true
    }
}
</script>
<style>
.fondo{
    background: #EEEEEE;
    min-height: 700px;
  }
.redondo{
border-radius:50%;
}
.black{
	color:black;
}
.yellow-accent-4{
	background-color:rgba(245,227,25,0.7);
}
.small{
  font-size:10px;
}
</style>