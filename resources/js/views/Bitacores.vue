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
      <v-card class="d-inline-block mx-auto" width="1000" color="grey darken-2">
        <v-container>
        <h1 class="text-center">Bitácoras</h1>
        <!-- start boton de busqueda -->
            <v-text-field
              label="Buscar Bitacora"
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
              <th class="text-left">Cargo</th>
              <th class="text-left">Cedula</th>
              <th class="text-left">teléfono</th>
              <th class="text-left">Correo</th>
              <th class="text-left">Bitacora</th>
            </tr>
          </thead>
          <tbody>
            <template v-if="users.length">
            <tr v-for="(item, index) in users" :key="item.id">
              <td>{{ item.first_name }}</td>
              <td>{{rolId(item.rol_id)}}</td>
              <td>{{ item.identification_card }}</td>
              <td>{{ item.phone }}</td>
              <td>{{item.email}}</td>
              <td>
                <v-btn @click="viewBitacore(item.id)" color="primary">
                <span>Ver Bitacora</span>
                <v-icon class="ml-2">mdi-account-card-details</v-icon>
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
    },
    data () {
      return {
        drawer: null,
        users:[],
        page:0,
        total_page:0,
        search:'',
        itsSearching:null
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
      viewBitacore($id){
        this.$router.push({ name: 'show-bitacore',params:{id:$id}});
      },
      rolId(id){
      return id==2 ? 'administrador' : 'jefe de zona';
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
<style>
  .fondo{
    background: #EEEEEE;
    min-height: 1000px;
  }
</style>