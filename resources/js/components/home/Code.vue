<template>
	<div>
		<h3 class="text-center  mb-5 font-weight-black">Introduzca el codigo que fue enviado a su correo</h3>
		<!-- start input del codigo -->
		<v-text-field
		class="mb-5 "
		type="password"
		append-icon="mdi-lock-open"
		:error="errorClave"
		v-model="code"
		:rules="claveRules"
		required
		label="Contraseña: "
		></v-text-field>
		<!-- end input del codigo -->
		<!-- start botones -->
		<v-btn block color="primary" class="mr-4 block pb-3" @click="passwordRecover()">Comprobar Codigo</v-btn>
		<!-- end botones -->
	</div>
</template>
<script>
	export default{
		data () {
		  return {
		  	code:'',
		  	errorClave:false,
		  	claveRules: [
        	v => !!v || 'la contraseña es obligatoria'
      		]
		  };
		},
  methods: {
    passwordRecover() {
		this.errorClave=false
        if(this.code.trim() == ''){
            this.errorClave=true;
            return;
        }
        if(this.errorClave == false ){
        		swal({
            title:'Codigo exitoso',
            icon:'success',
            text:'su codigo es correcto, por favor seleccione su nueva contraseña',
            closeOnClickOutside:false,
            CloseOnEsc:false
          }).then(select=>{
          if(select){
          	this.$router.push('/newPassword');
          }
          }).catch(err => {
          console.log(err);
       		 });
            }

    }
  }
	}
</script>