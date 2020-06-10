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
    	<!-- start contenido de muestra -->
  <v-card class="d-inline-block mx-auto" color="grey darken-2">
    <v-container>
		    <h1 class="text-center">Visualizar Visitas </h1>
        <v-row>
          <!-- start boton de descargar -->
          <v-btn
            color="success"
            class="ma-2 white--text"
            :href="urlViewVisits"
          >
            Visualizar PDF
            <v-icon right dark>mdi-file-pdf</v-icon>
          </v-btn>
          <v-btn
            color="blue"
            class="ma-2 white--text"
            :href="urlPdfVisits"
          >
            Descargar PDF
            <v-icon right dark>mdi-cloud-upload</v-icon>
          </v-btn>
          <!-- start boton de busqueda -->
            <v-text-field
              label="Buscar Visita"
              outlined
              prepend-icon="mdi-magnify"
              @change="searching"
              v-model="search"
            ></v-text-field>
        <!--end boton que busqueda-->
          <!-- end boton de descargar -->
        </v-row>
        <!-- start visualizacion de las visitas al edificio -->
      <v-simple-table >
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Nombre</th>
              <th class="text-left">Apellido</th>
              <th class="text-left">Cedula</th>
              <th class="text-left">teléfono</th>
              <th class="text-left">sector</th>
              <th class="text-left">llegada</th>
              <th class="text-left">salida</th>
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
              <td>{{ item.output }}</td>
            </tr>
          </template>

          <template v-else>
              <h2 class="text-center">no hay registros...</h2>
          </template>
          </tbody>
        </template>
        <!-- end visualizacion de las visitas al edificio -->
      </v-simple-table>
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
    axios.get('/api/showPageVisits').then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data;
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
        page:0,
        total_page:0,
        n:0,
        search:'',
        itsSearching:null
  	  };
  	},
    computed: {
      rol() {
        return this.$store.state.currentUser.rol_id;
      },
      id(){
        return this.$store.state.currentUser.id;
      },
     urlViewVisits(){
        return `/verVisitas/${this.id}`;
      },
      urlPdfVisits(){
        return `/downloadPdf/${this.id}`;
      }
    },
    created () {
      this.$vuetify.theme.dark = true
    },
    methods: {
      searching(){
      if(!this.search){
        this.itsSearching = false;
        axios.get('/api/showPageVisits').then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data;
      }).catch(err => {
        console.log(err);
      });
      }else{
      axios.get(`/api/searchVisit/${this.search}`).then(res => {
        this.itsSearching = true;
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data;
        }).catch(err => {
          console.log(err);
        });
      }
      },
      verVisitas(){
      let params = {
        'action_id' : 4,
        'user_id' : this.$store.state.currentUser.id,
        'details': `El usuario visualizo los registros de visitas en el edificio`
      }
        axios.post(`/api/storeBitacore`,params).then(res => {
          window.location.href = "/verVisitas";
      }).catch(err => {
        console.log(err);
      });
      },
      pageReload (index) {
        if(this.itsSearching == true){ 
        axios.get(`/api/searchVisit/${this.search}?page=${index + 1}`).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data.filter(item => 
          (item.output === null));
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }else{
      axios.get(`/api/showPageVisits?page=${index + 1}`).then(res => {
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
        let params = {
        data : this.search
        };
        axios.get(`/api/searchVisit/${this.search}?page=${this.page - 1}`).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data.filter(item => 
          (item.output === null));
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }else{
        axios.get(`/api/showPageVisits?page=${this.page - 1}`).then(res => {
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
        let params = {
        data : this.search
        };
        axios.get(`/api/searchVisit/${this.search}?page=${this.page + 1}`).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data.filter(item => 
          (item.output === null));
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }else{
        axios.get(`/api/showPageVisits?page=${this.page + 1}`).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visitas=res.data.data;
        scroll(0,1);
      }).catch(err => {
        console.log(err);
      });
      }
    }
    },
  }
</script>
<style>
  .fondo{
    background: #EEEEEE;
    min-height: 700px;
  }
  .scroll{
    overflow: auto;
  }
</style>