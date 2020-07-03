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
	    <!-- start nav bar -->
	    <side-bar></side-bar>
	    <!-- end nav bar -->
	    </v-navigation-drawer>
	    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
			<!-- start el main donde ira el contenido principal -->
        <content-center>
      <v-card class="d-inline-block mx-auto title" color="grey darken-2">
          <v-container>
                <h1 class="text-center mb-5">Verificar de Tickets
                </h1>
                <!-- start boton de busqueda -->
                <v-row justify="center">
                  <v-col cols="12" sm="6">
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
                  
              <v-row>
              </v-row>
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
                        <th class="text-left">salida</th>
                      </tr>
                    </thead>
                    <tbody>
                    <template v-if="visits.length">
                      <tr v-for="(item,index) in visits" :key="index">
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
          </v-container>
        </v-card>
      	</content-center>
    	<!-- end el main donde ira el contenido principal -->
	</div>
</template>

<script>
import Side from '.././partials/SideBar.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
export default {
  components:{
      'side-bar':Side,
  		'nav-bar':Nav,
      'content-center':ContentCenter,
  	},
  name: 'CheckingTicket',

  data () {
    return {
    drawer: null,
    search: '',
    page:'',
    total_page:'',
    visits:[
    {
      id:1,
      first_name: "gabriel",
      last_name: "viloria",
      identification_card: "27167028",
      phone: "04149017184",
      sector: "washintong dc",
      input: "horita menor"
    }
    ]
    }
  },
  created () {
      this.$vuetify.theme.dark = true
    },
    methods: {
      searching(){
      let params = {
      data : this.search
      };
      axios.post('/api/searchTicket', params).then(res => {
        this.page = res.data.current_page;
        this.total_page= res.data.last_page;
        this.visits=res.data.data.filter(item => 
          (item.output === null));
        console.log(err);
        }).catch(err => {
          console.log(err);
        });
      }
    },
    computed: {
    }
}
</script>

<style lang="css" scoped>
.fondo{
    background: #EEEEEE;
    min-height: 1000px;
  }
.title{
  min-width: 1000px;
}
</style>