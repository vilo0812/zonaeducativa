<template>
  <div>
  	<!-- <v-card-text dark > -->
		<!-- start input de ingresar email -->
		<v-text-field
		class="mb-5 "
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
		class="mb-5 "
		type="password"
		append-icon="mdi-lock-open"
		:error="errorClave"
		v-model="password"
		:rules="claveRules"
		required
		label="Contraseña: "
		></v-text-field>
		<!-- end input de igresar la contraseña -->
		<v-btn block color="primary" class="mr-4 block pb-3" @click="iniciarSesion()">iniciar sesión</v-btn>
	<!-- </v-card-text> -->
  </div>
	<!-- end formulario del login -->
</template>
<script>
export default{
	data () {
	  return {
	    email:'',
	    password:'',
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
	  	let params={
	  		'email':this.email,
	  		'password':this.password,
	  	}
	    /*usamos axios para mandar la información al api*/
	    /*start iniciamos sesion*/
	    	this.$store.commit('login');
	      axios.post('/api/sesion/login',params)
	      .then(response=>{
	      	/*start funcion muy importante ya que me guarda los datos en el localstorage y me llena una variable llamada currentUser con los datos de el usuario*/
	      	this.$store.commit("loginSuccess",response.data);
	      	/*end funcion muy importante ya que me guarda los datos en el localstorage y me llena una variable llamada currentUser con los datos de el usuario*/
	      	/*start accion si todo funciono perfectamente*/
	      	// console.log(response.data)
	      	swal({
	      		title:'Has iniciado sesion',
	      		icon:'success',
	      		closeOnClickOutside:false,
	      		CloseOnEsc:false
	      	}).then(select=>{
	      		if(select){
	      			this.$router.push({ name: 'Gestion'})
	      		}
	      	});
	      	/*end accion si todo funciono perfectamente*/
	      }).catch(error=>{
	      	/*start errores*/
	      	// console.log(error.response.data);
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
