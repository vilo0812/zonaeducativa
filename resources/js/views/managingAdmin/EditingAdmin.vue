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
  <v-card class="d-inline-block mx-auto" color="#E24E42" width="600px">
    <v-container>
      	<h1 class="text-center">Actualizar Administrador</h1>
			<form>
				<!-- 
				posibles validaciones
				v-validate="'required|max:10'" 
				v-validate="'required|email'"-->
        <!-- start input nombre -->
        <v-text-field
        v-model="nombre"
        label="Nombre: "
        required
        prepend-icon="mdi-account"
        :placeholder="administrador.first_name"
        :value="administrador.first_name"
        ></v-text-field>
        <!-- end input nombre -->
        <!-- start input apellido -->
        <v-text-field
        v-model="apellido"
        label="Apellido: "
        required
        prepend-icon="mdi-account-settings"
        :placeholder="administrador.last_name"
        :value="administrador.last_name"
        ></v-text-field>
        <!-- end input apellido -->
        <!-- start input cedula -->
        <v-text-field
        v-model="cedula"
        label="Cédula: "
        required
        prepend-icon="mdi-account-card-details"
        :placeholder="administrador.identification_card"
        :value="administrador.identification_card"
        ></v-text-field>
        <!-- end input cedula -->
        <!-- start input telefono -->
        <v-text-field
        v-model="telefono"
        label="Teléfono: "
        required
        prepend-icon="mdi-cellphone"
        :placeholder="administrador.phone"
        :value="administrador.phone"
        ></v-text-field>
        <!-- end input telefono -->
        <!-- start input correo -->
        <v-text-field
        v-model="correo"
        label="Correo"
        required
        prepend-icon="mdi-email"
        :placeholder="administrador.email"
        :value="administrador.email"
        ></v-text-field>
        <!-- end input correo -->
        <!-- start botoner de submit y clean -->
        <v-btn @click="update" class="orange lighten-2">
        <span>Actualizar</span>
        <v-icon>mdi-account-edit</v-icon>
      </v-btn>
      <v-btn @click="cancel" class="red lighten-1">
        <span>Cancelar</span>
        <v-icon>mdi-account-remove</v-icon>
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
  props:['id'],
  	components:{
  		'side-bar':Side,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
  	},
  	mounted(){
  	/*start llamamos al api que nos trae toda la informacion de este usuario para colocarla por defecto en los formularios*/
  	let id={
  		id:this.id
  	}
  	axios.post('/api/showAdmin',id).then(res => {
  	  this.administrador=res.data.user
  	}).catch(err => {
  	  console.log(err);
  	});
  	/*end llamamos al api que nos trae toda la informacion de este usuario  para colocarla por defecto en los formularios*/
  	},
  	data () {
  	  return {
  	    drawer: null,
  	    nombre:'',
  	    apellido:'',
  	    correo:'',
  	    cedula:'',
  	    telefono:'',
  	    administrador:''
  	  };
  	},
  	methods: {
  	  update() {
        /*start llenamos nuestro objeto*/
        /*por si acaso algun valor queda vacio*/
        if(!this.nombre){
        this.nombre=this.administrador.first_name
        }if(!this.apellido){
        this.apellido=this.administrador.last_name
        }if(!this.correo){
        this.correo=this.administrador.email
        }if(!this.cedula){
        this.cedula=this.administrador.identification_card
        }if(!this.telefono){
        this.telefono=this.administrador.phone
        }
        /*por si acaso algun valor queda vacio*/
        let parametros={
          'id':this.administrador.id,
          'first_name':this.nombre,
          'last_name':this.apellido,
          'email':this.correo,
          'identification_card':this.cedula,
          'phone':this.telefono,
        }
        /*end llenamos nuestro objeto*/
        /*start llamamos al api que permite actualizar a los usuarios*/
        /*start anuncio que afirma que se ha registrado correctamente*/
        axios.put('/api/updateAdmin',parametros).then(res=>{
		swal({
      		title:'Actualización exitosa',
      		text:res.data.mensaje,
      		icon:'success',
      		closeOnClickOutside:false,
      		CloseOnEsc:false 
      	}).then(select=>{
      		if(select){
      		this.$router.push({ name: 'show-admin', params: {id:this.administrador.id}})
      		}
		});
        /*end anuncio que afirma que se ha registrado correctamente*/
        })
        /*end llamamos al api que permite actualizar a los usuarios*/
  	  },
  	  cancel(){
  	  	/*start metodo que permite volver a la vista de showAdmin*/
  	  this.$router.push({ name: 'show-admin', params: {id:this.administrador.id}})
  	  	/*end metodo que permite volver a la vista de showAdmin*/
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