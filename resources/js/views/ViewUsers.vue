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
        <h1 class="text-center">Usuarios </h1>
        <!-- start boton de busqueda -->
            <v-text-field
              label="Buscar Usuario"
              outlined
              prepend-icon="mdi-magnify"
              @change="searching"
              v-model="search"
            ></v-text-field>
        <!--end boton que busqueda-->
        <!-- start vemos a todos los usuarios que posiblemente tienen bitacora -->
        <v-simple-table>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Nombre</th>
              <th class="text-left">Puesto</th>
              <th class="text-left">Cedula</th>
              <th class="text-left">teléfono</th>
              <th class="text-left">Correo</th>
              <th class="text-left">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <template v-if="users.length">
            <tr v-for="(item, index) in users" :key="item.id">
              <!--  -->
              <td>{{ item.first_name }}</td>
              <td>{{rolId(item.rol_id)}}</td>
              <td>{{ item.identification_card }}</td>
              <td>{{ item.phone }}</td>
              <td>{{item.email}}</td>
              <td>
                <actions
                  v-on:editing="editing(item.id)"
                  v-on:remove="remove(item.id,index)" 
                  v-on:viewUser="viewUser(item.id)"  
                ></actions>
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
      <!-- start pagination -->
        <div class="text-center">
                <v-row justify="center" align="center">
                    <v-col cols="12">
                      <v-btn @click="pagePrev()" fab small>
                        <v-icon>mdi-menu-left</v-icon>
                      </v-btn>
                      <v-btn v-for="(n,index) in total_page" @click="pageReload(index)" fab small :key="index">{{n}}</v-btn>
                      <v-btn fab small @click="pageNext()">
                        <v-icon>mdi-menu-right</v-icon>
                      </v-btn>
                    </v-col>
                </v-row>
            </div>
        <!--end paginate -->
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
import actions from '.././components/viewUsers/actionUsers.vue'
  export default {
    mounted(){
      axios.get('/api/viewUsers').then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.users=res.data.data
      }).catch(err => {
        console.log(err);
      });
    },
    components:{
      'side-bar':Side,
      'nav-bar':Nav,
      'content-center':ContentCenter,
      'actions':actions
    },
    data () {
      return {
        drawer: null,
        users:[],
        page:0,
        total_page:0,
        search:null,
        itsSearching:null,
        page:null,
        total_page:null
      };
    },
    methods: {
      searching(){
      if(!this.search){
        this.itsSearching = false;
        axios.get('/api/viewUsers').then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.users=res.data.data
      }).catch(err => {
        console.log(err);
      });
      }else{
      axios.get(`/api/searchUser/${this.search}`).then(res => {
        this.itsSearching = true;
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.users=res.data.data
        }).catch(err => {
          console.log(err);
        });
      }
      },
      pageReload (index) {
        if(this.itsSearching){
           axios.get(`/api/searchUser/${this.search}?page=${index + 1}`).then(res => {
        this.itsSearching = true;
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.users=res.data.data
        }).catch(err => {
          console.log(err);
        });
        }else{
      axios.get(`/api/viewUsers?page=${index + 1}`).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.users=res.data.data;
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
        }
      },
      pagePrev(){
        if(this.itsSearching){
           axios.get(`/api/searchUser/${this.search}?page=${this.page - 1}`).then(res => {
        this.itsSearching = true;
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.users=res.data.data
        }).catch(err => {
          console.log(err);
        });
        }else{
        axios.get(`/api/viewUsers?page=${this.page - 1}`).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.users=res.data.data;
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }
      },
      pageNext(){
        if(this.itsSearching){
           axios.get(`/api/searchUser/${this.search}?page=${this.page + 1}`).then(res => {
        this.itsSearching = true;
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.users=res.data.data
        }).catch(err => {
          console.log(err);
        });
        }else{
        axios.get(`/api/viewUsers?page=${this.page + 1}`).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.users=res.data.data;
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }
      },
      editing (UserId) {
      this.$router.push({ name: 'sign0414',params:{id:UserId}})
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
          this.deleteUser(id,index);
        } else {
          swal("su usuario se encuentra seguro");
        }
            /*end las dos pantallas que se pueden mostrar en caso de que decida eliminar o no*/
          });
      /*end pantalla de evaluar si de verdad se quiere eliminar*/
    },
    deleteUser(id,index){
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
              this.users.splice(index,1);
            }
            /*end eliminamos de la vista el registro*/
          });
            /*end pantalla que informa que se elimino correctamente*/
          }).catch(err => {
            console.log(err);
          });
          /*end eliminamos al usuario de la base de datos*/
    },
    rolId(id){
      return id==2 ? 'administrador' : 'jefe de zona';
      },
    viewUser(index){
      // console.log(`hola mundo ${index}`);
      this.$router.push({ name: 'show-admin', params: {id:index}})
    }
    },
    computed: {
      rol() {
        return this.$store.state.currentUser.rol_id;
      },
    },
    created () {
      this.$vuetify.theme.dark = true;
      initialize(this.$store,this.$router);
    },
  }
</script>