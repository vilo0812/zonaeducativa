<template>
  <div>
  	<!-- <v-card-text dark > -->
		<h1 class="text-center display-2 mb-5 font-weight-black">Iniciar Sesión</h1>
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
		@keyup.enter="iniciarSesion"
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
		@keyup.enter="iniciarSesion"
		></v-text-field>
		<v-btn block text small color="primary" class="my-5" :to="{ name: 'PasswordRecover'}">recuperar contraseña
			<v-icon small class="mx-2">mdi-key-change</v-icon>
		</v-btn>
		<!-- end input de igresar la contraseña -->
		<!-- start mostrar los errores de backend -->
		<!-- end mostrar los errores de backend -->
		<!-- start botones -->
		<v-btn block color="primary" class="mr-4 block pb-3" @click.stop="iniciarSesion">iniciar sesión</v-btn>
		<!-- end botones -->
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
		this.errorEmail=false
        this.errorClave=false
        if(this.email.trim() == ''){
            this.errorEmail=true;
            return;
            }
        if(this.password.trim() == ''){
            this.errorClave=true;
            return;
            }
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
	      			this.$router.push({ name: 'view-users'})
	      		}
	      	});
	      	/*end accion si todo funciono perfectamente*/
	      }).catch(error=>{
	      	/*start errores*/
	      	this.errorEmail=true;
	      	this.errorClave=true;
	      	this.$store.commit("loginFailed",{error});
	      	let mensaje="correo o contraseña invalida";
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
