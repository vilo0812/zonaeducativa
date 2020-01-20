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
  <v-card class="d-inline-block mx-auto" color="#E24E42" >
    <v-container>
    	<h1>control de dependencias</h1>
    	<v-simple-table>
		    <template v-slot:default>
		      <thead>
		        <tr>
		          <th class="text-left">zona</th>
		        </tr>
		      </thead>
		      <tbody>
		        <tr v-for="(item,index) in zonas" :key="">
		          <td>{{ item }}</td>
		        </tr>
		      </tbody>
		    </template>
		  </v-simple-table>
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
  	components:{
  		'side-bar':Side,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
  	},
  	data () {
  	  return {
  	    drawer: null,
  	    	zonas:[
  	    	'despacho',
  	    	'piso 1',
  	    	'piso 2'
  	    	],
  	  };
  	},
    created () {
      this.$vuetify.theme.dark = true
    },
  }
</script>