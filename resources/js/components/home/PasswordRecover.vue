<template>
<div>
	<h1 class="text-center display-2 mb-5 font-weight-black">Recuperar Contraseña</h1>
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
		<!-- start botones -->
		<v-btn block color="primary" class="mr-4 block pb-3" @click="passwordRecover()">recuperar contraseña</v-btn>
		<!-- end botones -->
</div>
</template>
<script type="text/javascript">
export default{
  data () {
    return {
    	email:'',
      errorEmail:false,
      emailRules: [
        v => !!v || 'el correo electrónico es obligatorio',
        v => /.+@.+\..+/.test(v) || 'el correo electrónico debe ser valido',
      ],
    };
  },
  methods: {
    passwordRecover() {
		this.errorEmail=false
        if(this.email.trim() == ''){
            this.errorEmail=true;
            return;
        }
        if(this.errorEmail == false ){
        		swal({
            title:'Envio exitoso',
            icon:'success',
            text:'se ha enviado un correo a su cuenta con el codigo para cambiar su contraseña',
            closeOnClickOutside:false,
            CloseOnEsc:false
          }).then(select=>{
          if(select){
          	this.$router.push('/code');
          }
          }).catch(err => {
          console.log(err);
       		 });
            }

    }
  }
}
</script>
<style type="text/css">

</style>