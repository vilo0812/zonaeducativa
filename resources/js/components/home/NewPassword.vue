<template>
	<div>
	<h3 class="text-center  mb-5 font-weight-black">Introduzca su Nueva Contraseña</h3>
	<!-- start input clave -->
        <v-row class="d-flex">
          <v-text-field
          class="mb-4"
          :type="mostrar"
          v-model="clave"
          label="Clave: Ej: kfc2020$"
          :error="claveError"
           :rules="claveRules"
          :counter="50"
          required
          prepend-icon="mdi-key"
          >
          </v-text-field>
          <!-- start ojo que muestra la contraseña -->
          <v-tooltip bottom @click="viewPass=true">
            <template v-slot:activator="{ on }">
            <v-btn v-on="on" @click="show" icon class="mt-5">
              <v-icon>{{mostrarIcono}}</v-icon>
            </v-btn>
            </template>
            <span>{{mostrarMensaje}}</span>
          </v-tooltip>
          <!-- end ojo que muestra la contraseña -->
        </v-row>
        <!-- start input de la segunda contraseña -->
        <v-text-field
          class="mb-4"
          type="password"
          v-model="repetirClave"
          label="Clave: Ej: kfc2020$"
          :error="repetirClaveError"
           :rules="repetirClaveRules"
          :counter="50"
          required
          prepend-icon="mdi-key"
          >
          </v-text-field>
                  <!-- end input de la segunda contraseña -->

          <!-- start mostramos el error que se provoca si las contraseñas no son las mismas -->

		<p class="font-weight-black err" v-if="repetirError">las contraseñas deben ser iguales</p>

          <!-- end mostramos el error que se provoca si las contraseñas no son las mismas -->
   <!-- end input clave -->
   		<!-- start botones -->
			<v-btn block color="primary" class="mr-4 block pb-3" @click="passwordRecover()">Cambiar Contraseña</v-btn>
		<!-- end botones -->
        </div>
</template>
<script>
	export default{
		data () {
		  return {
		  	repetirError:false,
			claveShow:false,
			clave:'',
			repetirClave:'',
			claveError:false,
			repetirClaveError:false,
			repetirClaveRules:[
			v => !!v || 'repetir la clave es obligatorio',
			],
			claveRules:[
        	v => !!v || 'la clave es obligatoria',
        	],
        	viewPass:false,
		  };
		},
		computed: {
		  mostrar () {
        	if(this.claveShow){
	        return 'text';
	        }else{
	        return 'password';
	        }
	      },
	      mostrarIcono(){
        if(this.claveShow){
        return 'mdi-eye-off';
        }else{
        return 'mdi-eye';
        }
      },
      mostrarMensaje(){
        if(this.claveShow){
        return 'ocultar contraseña';
        }else{
        return 'mostrar contraseña';
        }
      },
    email() {
        return this.$store.state.email;
      }
    },

		methods: {
			passwordRecover(){
			this.repetirError=false;
			this.claveError=false;
			this.repetirClaveError=false;
			if(this.clave.trim() == ''){
            this.claveError=true;
            }if(this.repetirClave.trim() == ''){
            this.repetirClaveError=true;
            }if(this.clave != this.repetirClave){
            this.repetirClaveError=true;
            this.claveError=true;
            this.repetirError=true;
            }
            if(this.repetirError == false && this.claveError==false && this.repetirClaveError==false ){
              let data={
                "email":this.email,
                "password":this.clave
              }
              axios.post('/api/sesion/newPassword',data).then(res => {
                swal({
                  title:'Registro exitoso',
                  icon:'success',
                  text:'su contraseña ha sido cambiada correctamente, por favor inicie sesión',
                  closeOnClickOutside:false,
                  CloseOnEsc:false
                }).then(select=>{
                if(select){
                  this.$store.commit('emailNull');
                  this.$router.push('/');
                }
                }).catch(err => {
                console.log(err);
                 });
              }).catch(err => {
                  let mensaje = "ha ocurrido un error";
                    swal('Error',mensaje,'error')
                    .then(select=>{
                    if(select){
                      this.$router.push({name:'PasswordRecover'});
                    }
                    })
              });
            }
			},
		  show(){
        	this.claveShow=!this.claveShow
      		}
		}
	}
</script>
<style>
.err{
	color:red;
}
</style>