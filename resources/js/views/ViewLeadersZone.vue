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
    >	<!-- start seleccionamos el side bar dependiendo del tipo de usuario -->
     <!-- start llamamos al side var del  administrador -->
      <side-bar v-if="rol == 1"></side-bar>
      <!-- end llamamos al side var del administrador -->
      <!-- start llamamos al side var del super administrador -->
      <side-bar-admin v-if="rol == 2"></side-bar-admin>
      <!-- end llamamos al side var del super administrador -->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
      <!-- nombre apellido cedula telefono correo -->
    	<!-- start contenido de muestra -->
  <v-card class="d-inline-block mx-auto" color="grey darken-2">
    <v-container>
		    <h1 class="text-center">Visualizar Visitas</h1>
        <!-- start visualizacion de los Jefes de los Jefes de Zona en el edificio -->
      <v-simple-table>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Nombre</th>
              <th class="text-left">Apellido</th>
              <th class="text-left">Cedula</th>
              <th class="text-left">teléfono</th>
              <th class="text-left">Correo</th>
              <th class="text-left">Acciones</th>
            </tr>
          </thead>
          <transition
                    name="animate.css"
                enter-active-class="animated fadeInDownBig"
                appear
                >
          <tbody>
            <tr v-for="(item, index) in LeadersZone" :key="item.id">
              <td>{{ item.first_name }}</td>
              <td>{{ item.last_name }}</td>
              <td>{{ item.identification_card }}</td>
              <td>{{ item.phone }}</td>
              <td>{{item.email}}</td>
              <td>
                <v-btn @click="editing(item.id)" color="primary">editar</v-btn>
                <v-btn @click="remove(item.id,index)" color="red lighten-1">eliminiar</v-btn>
              </td>
            </tr>
          </tbody>
        </transition>
        </template>
      </v-simple-table>
        <!-- end visualizacion de los jefes de zona de el edificio -->
    </v-container>
  </v-card>
<!-- end contenido de muestra -->
    </content-center>
    <!-- end el main donde ira el contenido principal-->
  </div>
</template>

<script>
import Side from '.././components/SuperAdmin/SideBar.vue'
import Side2 from '.././components/Admin/SideBar.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
  export default {
    mounted(){
    axios.get('/api/viewLeadersZone').then(res => {
        this.LeadersZone=res.data
      }).catch(err => {
        console.log(err);
      });
    },
  	components:{
  		'side-bar':Side,
      'side-bar-admin':Side2,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
  	},
  	data () {
  	  return {
  	    drawer: null,
        LeadersZone:[],
  	  };
  	},
    methods: {
      editing (UserId) {
      this.$router.push({ name: 'editing-leader-zone',params:{id:UserId}})
      // this.$router.push({ name: 'editing-leader-zone', params: {id:UserId}})
      },
      remove(id,index){
      /*start pantalla de evaluar si de verdad se quiere eliminar*/
      swal({
            title:'¿seguro que quiere eliminar este usuario?',
            icon:'warning',
            buttons: true,
            dangerMode: true,
            buttons: ["cancelar", "eliminar"],
            closeOnClickOutside:false,
            CloseOnEsc:false
          }).then((willDelete) => {
            /*start las dos pantallas que se pueden mostrar en caso de que decida eliminar o no*/
        if (willDelete) {
          this.deleteAdmin(id,index);
        } else {
          swal("su usuario se encuentra seguro");
        }
            /*end las dos pantallas que se pueden mostrar en caso de que decida eliminar o no*/
          });
      /*end pantalla de evaluar si de verdad se quiere eliminar*/
    },
    deleteAdmin(id,index){
      /*start eliminamos al usuario de la base de datos*/
          // let parametros={
          //  'id':this.id
          // }
          // axios.delete('/api/deleteAdmin',parametros).then(res => {
            let url=`/api/deleteUser/` + id;
            axios.delete(url).then(res => {
            /*start pantalla que informa que se elimino correctamente*/
            swal("su usuario ha sido eliminado!", {
            icon: "success",
            closeOnClickOutside:false,
              CloseOnEsc:false
          }).then(select=>{
            /*start eliminamos de la vista el registro*/
            if(select){
              this.LeadersZone.splice(index,1);
            }
            /*end eliminamos de la vista el registro*/
          });
            /*end pantalla que informa que se elimino correctamente*/
          }).catch(err => {
            console.log(err);
          });
          /*end eliminamos al usuario de la base de datos*/
    }
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