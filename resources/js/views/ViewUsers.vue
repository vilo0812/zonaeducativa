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
    >
     <!-- start side bar -->
      <side-bar></side-bar>
      <!-- end side  bar -->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
      <!-- start contenido de muestra -->
      <v-card class="d-inline-block mx-auto" width="1000" color="grey darken-2">
        <v-container>
        <h1 class="text-center">Usuarios</h1>
        <!-- start vemos a todos los usuarios que posiblemente tienen bitacora -->
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
          <tbody>
            <template v-if="users.length">
            <tr v-for="(item, index) in users" :key="item.id">
              <td>{{ item.first_name }}</td>
              <td>{{ item.last_name }}</td>
              <td>{{ item.identification_card }}</td>
              <td>{{ item.phone }}</td>
              <td>{{item.email}}</td>
              <td>
                <v-btn @click="editing(item.id)" color="primary">
                <span>Editar</span>
                <v-icon class="ml-2">mdi-account-edit</v-icon>
                </v-btn>
                <v-btn @click="remove(item.id,index)" color="red lighten-1">
                <span>Bitacora</span>
                <v-icon class="ml-2">mdi-delete</v-icon>
                </v-btn>
              </td>
            </tr>
            </template>
            <template v-else>
              <h2 class="text-center">no hay registros...</h2>
            </template>
          </tbody>
        </template>
      </v-simple-table>
      <!-- start vemos a todos los usuarios que posiblemente tienen bitacora -->
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
    mounted(){
      axios.get('/api/viewUsers').then(res => {
        this.users=res.data
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
        users:[]
      };
    },
    methods: {
      editing (UserId) {
      this.$router.push({ name: 'edit-user',params:{id:UserId}})
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
    },
    computed: {
      rol() {
        return this.$store.state.currentUser.rol_id;
      }
    },
    created () {
      this.$vuetify.theme.dark = true;
      initialize(this.$store,this.$router);
    },
  }
</script>