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
  <!--color="#EB6E80" color="#E9B000" -->
    <v-container>
        <h1 class="text-center">Gestionar Visitas</h1>
        <!-- start boton de busqueda -->
                <v-row justify="center">
                  <v-col cols="12" sm="7">
                    <v-text-field
                      label="Buscar ticket según cédula o codigo del ticket"
                      outlined
                      prepend-icon="mdi-magnify"
                      @change="searching"
                      v-model="search"
                    ></v-text-field>
                  </v-col>
                </v-row>
                <!--end boton que busqueda-->
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
            <template v-if="visitas.length">
              <tr v-for="(item,index) in visitas" :key="index">
              <td>{{ item.first_name }}</td>
              <td>{{ item.last_name }}</td>
              <td>{{ item.identification_card }}</td>
              <td>{{ item.phone }}</td>
              <td>{{ item.sector }}</td>
              <td>{{ item.input }}</td>
              <td>
                <v-btn color="green darken-2" @click="target(item.id,index)">
                <span>marcar salida</span>
                <v-icon>mdi-run</v-icon>
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
        <!-- end visualizacion de las visitas al edificio -->
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
    axios.get('/api/showOnlyNotTargetVisits').then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data
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
        search:'',
        page:0,
        total_page:0,
        itsSearching:null
      };
    },
    methods: {
      pageReload (index) {
        if(this.itsSearching == true){ 
        axios.get(`/api/searchTicket/${this.search}?page=${index + 1}`,params).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }else{
      axios.get(`/api/showOnlyNotTargetVisits?page=${index + 1}`).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data;
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }
      },
      pagePrev(){
        if(this.itsSearching == true){ 
        axios.get(`/api/searchTicket/${this.search}?page=${this.page - 1}`,params).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }else{
        axios.get(`/api/showOnlyNotTargetVisits?page=${this.page - 1}`).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data;
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }
      },
      pageNext(){
        if(this.itsSearching == true){ 
        axios.get(`/api/searchTicket/${this.search}?page=${this.page + 1}`,params).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }else{
        axios.get(`/api/showOnlyNotTargetVisits?page=${this.page + 1}`).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data;
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }
      },
      searching(){
      if(!this.search){
        this.searching = false;
      axios.get('/api/showOnlyNotTargetVisits').then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data
      }).catch(err => {
        console.log(err);
      });
      }else{
      axios.get(`/api/searchTicket/${this.search}`).then(res => {
        this.itsSearching = true
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data;
        }).catch(err => {
          console.log(err);
        });
      }
      },
      target (idItem,index) {
        let params={
          'id':idItem,
          'action_id' : 2,
          'user_id' : this.$store.state.currentUser.id,
         'details': `registro la salida del edificio del usuario ${this.visitas[index].first_name} ${this.visitas[index].last_name} ${this.visitas[index].identification_card} el cual accedio al sector: ${this.visitas[index].sector}`
        }
        axios.patch('/api/targetVisit',params).then(res => {
        this.visitas.splice(index,1);
        }).catch(err => {
          console.log(err);
        });
      },
      mode(){
      this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
    },
    },
    computed: {
      rol() {
        return this.$store.state.currentUser.rol_id;
      }
    },
    created () {
      this.$vuetify.theme.dark = true;
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