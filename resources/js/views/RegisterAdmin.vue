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
  <v-card class="d-inline-block mx-auto" color="#E24E42" width="450px">
    <v-container>
      	<h1 class="text-center">Registrar Administrador</h1>
			<form>
				<!-- 
				posibles validaciones
				v-validate="'required|max:10'" 
				v-validate="'required|email'"-->
				<v-text-field
				v-model="nombre"
				label="Nombre: "
				required
				></v-text-field>
				<v-text-field
				v-model="apellido"
				label="Apellido: "
				required
				></v-text-field>
				<v-text-field
				v-model="cedula"
				label="Cédula: "
				required
				></v-text-field>
				<v-text-field
				v-model="telefono"
				label="Teléfono: "
				required
				></v-text-field>
				<v-text-field
				v-model="correo"
				label="Correo"
				required
				></v-text-field>
				<v-btn class="mr-4" @click="submit">registrar</v-btn>
				<v-btn @click="clear">clear</v-btn>
			</form>
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
  	    nombre:'',
  	    apellido:'',
  	    correo:'',
  	    cedula:'',
  	    telefono:''
  	  };
  	},
  	methods: {
  	  submit() {
  	    
  	  },
  	  clear () {
        this.nombre = ''
        this.correo = ''
        this.apellido = ''
        this.cedula=''
        this.telefono=''   
    }
  	},
    created () {
      this.$vuetify.theme.dark = true
    },
  }
</script>