<template>
  <div>
  	<v-card-text dark>
  		<h2 class="text-purple">Iniciar sesión</h2>
  	
	<!-- start formulario del login -->
	<form>
		<!-- start input de ingresar email -->
		<v-text-field
		type="email"
		append-icon="mdi-account"
		:error="errorEmail"
		:counter="100"
		required
		:rules="emailRules"
		v-model="email"
		label="Correo: "
		></v-text-field>
		<!-- end input de ingresar email -->
		<!-- start input de igresar la contraseña -->
		<v-text-field
		type="password"
		append-icon="mdi-lock-open"
		:error="errorClave"
		v-model="clave"
		:rules="claveRules"
		required
		label="Contraseña: "
		></v-text-field>
		<!-- end input de igresar la contraseña -->
		<v-btn block color="primary" class="mr-4 block pb-3" @click="iniciarSesion()">iniciar sesión</v-btn>
	</form>
	</v-card-text>
  </div>
	<!-- end formulario del login -->
</template>
<script>
export default{
	data () {
	  return {
	    email:'',
	    clave:'',
	    errorEmail:false,
	    errorClave:false,
	    emailRules: [
        v => !!v || 'el correo electrónico es obligatorio',
        v => /.+@.+\..+/.test(v) || 'el correo electrónico debe ser valido',
      ],
      claveRules: [
        v => !!v || 'la contraseña es obligatoria'
      ]
	  };
	},
	methods: {
	  iniciarSesion() {
	    /*start creamos las variables que mandaremos*/
	     const params = {
	        email: this.email,
	        clave: this.clave
	      }
	    /*end creamos las variables que mandaremos*/
	    /*usamos axios para mandar la información al api*/
	    /*start iniciamos sesion*/
	      axios.post('/api/sesion/iniciar',params)
	      .then(response=>{
	      	/*start accion si todo funciono perfectamente*/
	      	// console.log(response);
	      	console.log(response.data)
	      	swal({
	      		title:'Has iniciado sesion',
	      		text:response.data,
	      		icon:'success',
	      		closeOnClickOutside:false,
	      		CloseOnEsc:false 
	      	}).then(select=>{
	      		if(select){
	      			/*start llamamos al api que determina que tipo de usuario soy*/
	      			// axios.get('/api/sesion/rol')
	      			// .them(response=>{
	      			// 	console.log(response.data);
	      			// })
	      			/*end llamamos al api que determina que tipo de usuario soy*/
	      			/*start redireccionamos a la pagina principal*/
	      			// location.reload();
	      			window.location.href="/welcome";
	      			// this.$route.router.go('Welcome');
	      			/*end redireccionamos a la pagina principal*/
	      		}
	      	});
	      	/*end accion si todo funciono perfectamente*/
	      }).catch(error=>{
	      	/*start errores*/
	      	console.log(error.response.data);
	      	let er = error.response.data.errors;
	      	let mensaje="Error no identificado";
	      	if(er.hasOwnProperty('email')){
	      		mensaje = er.email[0];
	      		this.errorEmail=true;
	      	}else if(er.hasOwnProperty('clave')){
	      		mensaje=er.clave[0];
	      		this.errorClave=true;
	      	}else if(er.hasOwnProperty('loginEmail')){
	      		mensaje=er.loginEmail[0];
	      		this.errorEmail=true;
	      	}
	      	else if(er.hasOwnProperty('loginClave')){
	      		mensaje=er.loginClave[0];
	      		this.errorClave=true;
	      	}
	      	swal('Error',mensaje,'error');
	      	/*end errores*/
	      });	     
	    /*end iniciamos sesion*/
	  }
	}
}
</script>
<style type="text/css">
  
</style>
