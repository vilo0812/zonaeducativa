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
        <!-- start input nombre -->
        <v-text-field
        v-model="nombre"
        label="Nombre: "
        prepend-icon="mdi-account"
        required
        ></v-text-field>
        <!-- end input nombre -->
        <!-- start input apellido -->
        <v-text-field
        v-model="apellido"
        label="Apellido: "
        required
        prepend-icon="mdi-account-settings"
        ></v-text-field>
        <!-- end input apellido -->
        <!-- start input cedula -->
        <v-text-field
        v-model="cedula"
        label="Cédula: "
        required
        prepend-icon="mdi-account-card-details"
        ></v-text-field>
        <!-- end input cedula -->
        <!-- start input telefono -->
        <v-text-field
        v-model="telefono"
        label="Teléfono: "
        required
        prepend-icon="mdi-cellphone"
        ></v-text-field>
        <!-- end input telefono -->
        <!-- start input correo -->
        <v-text-field
        v-model="correo"
        label="Correo"
        required
        prepend-icon="mdi-email"
        ></v-text-field>
        <!-- end input correo -->
        <!-- start botoner de submit y clean -->
        <v-btn @click="submit" class="mr-4 light-blue accent-4">
        <span>Registrar</span>
        <v-icon>mdi-account-multiple-plus</v-icon>
        </v-btn>
        <v-btn @click="clear" class="orange lighten-2">
        <span>Limpiar</span>
        <v-icon>mdi-eraser</v-icon>
        </v-btn>
        <!-- end botoner de submit y clean -->
			</form>
    </v-container>
  </v-card>
<!-- end contenido de muestra -->
    </content-center>
    <!-- end el main donde ira el contenido principal-->
  </div>
</template>

<script>
import Side from '../.././components/welcomeSuperAdmin/SideBar.vue'
import Nav from '../.././partials/welcome/NavBar.vue'
import ContentCenter from '../.././structures/Center.vue'
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
        /*start llenamos nuestro objeto*/
        let parametros={
          'first_name':this.nombre,
          'last_name':this.apellido,
          'email':this.correo,
          'identification_card':this.cedula,
          'phone':this.telefono,
        }
        /*end llenamos nuestro objeto*/
        /*start llamamos al api que permite registrar usuarios*/
        axios.post('/api/registerAdmin',parametros).then(res => {
          /*start anuncio si registro exitosamente*/
         swal({
            title:'Registro exitoso',
            icon:'success',
            closeOnClickOutside:false,
            CloseOnEsc:false 
          }).then(select=>{
          if(select){
            location.reload();
          }
          });
        }).catch(err => {
          console.log(err);
          /*end anuncio si registro exitosamente*/
        });
        /*end llamamos al api que permite registrar usuarios*/
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