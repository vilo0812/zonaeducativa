<template>
  <div id="inspire" class="fondo-2">
	<!-- start Nav Bar -->
	<nav-bar v-on:showSideBar="drawer = !drawer"></nav-bar><!-- recordar que este nav bar es capaz de mostrar el side bar que se mantiene oculto -->
	<!-- end Nav Bar -->
  	<!-- start cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <v-navigation-drawer
      v-model="drawer"
      app
      clipped
    >	<!-- start llamamos al side var-->
    	<side-bar></side-bar>
    	<!-- end llamamos al side var-->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
    	<!-- start contenido de muestra -->
  <v-card class="d-inline-block mx-auto" color="grey darken-2" width="450px">
    <v-container>
      	<h1 class="text-center">Registrar Jefe de Zona</h1>
				<!--
				posibles validaciones
				v-validate="'required|max:10'"
				v-validate="'required|email'"-->
        <!-- start input nombre -->
        <v-text-field
        v-model="nombre"
        label="Nombre: "
        :error="nombreError"
        :rules="nombreRules"
        :counter="50"
        prepend-icon="mdi-account"
        required
        ></v-text-field>
        <!-- end input nombre -->
        <!-- start input apellido -->
        <v-text-field
        v-model="apellido"
        label="Apellido: "
        :error="apellidoError"
        :rules="apellidoRules"
        :counter="50"
        required
        prepend-icon="mdi-account-settings"
        ></v-text-field>
        <!-- end input apellido -->
        <!-- start input cedula -->
        <v-text-field
        v-model="cedula"
        type="number"
        label="Cédula: Ej: 27167029"
        :error="cedulaError"
        :rules="cedulaRules"
        :counter="8"
        required
        prepend-icon="mdi-account-card-details"
        ></v-text-field>
        <!-- end input cedula -->
        <!-- start input telefono -->
        <v-text-field
        v-model="telefono"
        type="number"
        label="Teléfono: Ej: 04149017185"
        required
        prepend-icon="mdi-cellphone"
        :error="tlfError"
        :rules="tlfRules"
        :counter="11"
        ></v-text-field>
        <!-- end input telefono -->
        <!-- start input correo -->
        <v-text-field
        class="mb-4"
        type="email"
        v-model="correo"
        label="Correo: Ej: example@example.com"
        :error="emailError"
        :rules="emailRules"
        :counter="100"
        required
        prepend-icon="mdi-email"
        ></v-text-field>
        <!-- end input correo -->
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
          <v-tooltip bottom @click="viewPass=true">
            <template v-slot:activator="{ on }">
            <v-btn v-on="on" @click="show" icon class="mt-5">
              <v-icon >{{mostrarIcono}}</v-icon>
            </v-btn>
            </template>
            <span>{{mostrarMensaje}}</span>
          </v-tooltip>
        </v-row>
        <!-- end input clave --><!-- start input de la segunda contraseña -->
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
        <!-- start botoner de submit y clean -->
        <v-btn @click="submit()" class="mr-4 success accent-4">
        <span>Registrar</span>
        <v-icon>mdi-account-multiple-plus</v-icon>
        </v-btn>
        <v-btn @click="clear" class="yellow darken-3">
        <span>Limpiar</span>
        <v-icon>mdi-eraser</v-icon>
        </v-btn>
        <!-- end botoner de submit y clean -->
    </v-container>
  </v-card>
<!-- end contenido de muestra -->
    </content-center>
    <!-- end el main donde ira el contenido principal-->
  </div>
</template>

<script>
import Side from '.././partials/SideBar.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
  export default {
  	components:{
  		'side-bar':Side,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
  	},
  	data () {
  	  return {
        repetirError:false,
        errors:[],
  	    drawer: null,
  	    nombre:'',
        nombreError:false,
  	    apellido:'',
        apellidoError:false,
  	    correo:'',
        emailError:false,
  	    cedula:'',
        cedulaError:false,
        clave:'',
        claveError:false,
        repetirClave:'',
        repetirClaveError:false,
        claveShow:false,
        viewPass:false,
  	    telefono:'',
        tlfError:false,
        nombreRules:[
        v => !!v || 'el nombre es obligatorio',
        ],
        apellidoRules:[
        v => !!v || 'el apellido es obligatorio',
        ],
        cedulaRules:[
        v => !!v || 'la cedula es obligatoria',
        ],
        tlfRules:[
        v => !!v || 'el telefono es obligatorio',
        ],
        emailRules: [
        v => !!v || 'el correo electrónico es obligatorio',
        v => /.+@.+\..+/.test(v) || 'el correo electrónico debe ser valido',
      ],
        claveRules:[
        v => !!v || 'la clave es obligatoria',
        ],
        repetirClaveRules:[
      v => !!v || 'repetir la clave es obligatorio',
      ]
  	  };
  	},
  	methods: {
      show(){
        this.claveShow=!this.claveShow
      },
      submit(){
            this.nombreError=false
            this.apellidoError=false
            this.cedulaError=false
            this.tlfError=false
            this.emailError=false
            this.claveError=false;
            this.repetirError=false;
            this.repetirClaveError=false;
            if(this.nombre.trim() == ''){
            this.nombreError=true;
            }
            if(this.nombre.length > 50){
            this.nombreError=true;
            }
            if(this.apellido.trim() == ''){
            this.apellidoError=true;
            }
            if(this.apellido.length > 50){
            this.apellidoError=true;
            }
            if(this.cedula.trim() == ''){
            this.cedulaError=true;
            }
            if(this.cedula.length > 13){
            this.cedulaError=true;
            }
            if(this.telefono.trim() == ''){
            this.tlfError=true;
            }
            if(this.telefono.length > 13){
            this.tlfError=true;
            }
            if(this.correo.trim() == ''){
            this.emailError=true;
            }
            if(this.correo.length > 100){
            this.emailError=true;
            }
            if(this.clave.trim() == ''){
            this.claveError=true;
            }
            if(this.clave != this.repetirClave){
            this.repetirClaveError=true;
            this.claveError=true;
            this.repetirError=true;
            }
            if(this.nombreError==false && this.apellidoError==false && this.cedulaError==false && this.tlfError==false && this.emailError==false && this.claveError==false){
            this.registrar();
            }
      },
  	  registrar() {
        /*start llenamos nuestro objeto*/
        let parametros={
          'first_name':this.nombre,
          'last_name':this.apellido,
          'email':this.correo,
          'identification_card':this.cedula,
          'phone':this.telefono,
          'password':this.clave
        }
        /*end llenamos nuestro objeto*/
        /*start llamamos al api que permite registrar usuarios*/
        axios.post('/api/storeLeaderZone',parametros).then(res => {
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
          /*start en caso de algun error llenamos la variable error*/
          let er = err.response.data.mensaje;
          this.errors = er;
          let mensaje = "error en el formulario, por favor intente de nuevo";
           swal('Error',mensaje,'warning');
          /*end anuncio si registro exitosamente*/
        });
        /*end en caso de algun error llenamos la variable error*/
  	  },
  	  clear () {
        this.nombre = ''
        this.correo = ''
        this.apellido = ''
        this.cedula=''
        this.telefono=''
    }
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
      }
    },
    created () {
      this.$vuetify.theme.dark = true
    },
  }
</script>
<style>
.err{
  color:red;
}
.fondo-2{
    background: #EEEEEE;
    min-height: 700px;
  }
</style>