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
    >	<!-- start llamamos al side var del super administrador -->
    	<side-bar></side-bar>
    	<!-- end llamamos al side var del super administrador -->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
    	<!-- start contenido de muestra -->
  <v-card class="d-inline-block mx-auto" color="#E24E42">
    <v-container>
		    <h1 class="text-center">Visualizar Visitas</h1>
        <!-- start boton de descargar -->
        <v-btn
          color="blue-grey darken-3"
          class="ma-2 white--text"
          @click="loader = 'loading3'"
        >
          Descargar Excel
          <v-icon right dark>mdi-cloud-upload</v-icon>
        </v-btn>
        <!-- end boton de descargar -->
        <!-- start visualizacion de las visitas al edificio -->
      <v-simple-table>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Nombre</th>
              <th class="text-left">Apellido</th>
              <th class="text-left">Cedula</th>
              <th class="text-left">teléfono</th>
              <th class="text-left">correo</th>
              <th class="text-left">llegada</th>
              <th class="text-left">salida</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in visitas" :key="item.id">
              <td>{{ item.first_name }}</td>
              <td>{{ item.last_name }}</td>
              <td>{{ item.identification_card }}</td>
              <td>{{ item.phone }}</td>
              <td>{{ item.email }}</td>
              <td>{{ item.input }}</td>
              <td>{{ item.output }}</td>
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
    axios.get('/api/showVisits').then(res => {
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
  	    visits:[
  	    {nombre:'gabriel Antonio',apellido:'Viloria Aparicio',cedula:'27167028',telefono:'0414-9017184',correo:'gabriel.viloria0812@mail.com',horaLlegada:'2020-01-10 10:00',horaSalida:'2020-01-10 10:30'},
  	    {nombre:'Miguel',apellido:'Miguelito',cedula:'2623128',telefono:'0414-1232484',correo:'Miguel0812@mail.com',horaLlegada:'2020-01-10 10:00',horaSalida:'2020-01-10 10:30'},
  	    {nombre:'Manuel',apellido:'Rangel',cedula:'25437028',telefono:'0414-3212412',correo:'Manuel1232@mail.com',horaLlegada:'2020-01-10 10:00',horaSalida:'2020-01-10 10:30'}
  	    ]

  	  };
  	},
    created () {
      this.$vuetify.theme.dark = true
    },
  }
</script>