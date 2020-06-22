<template>
  <div id="inspire" class="fondo">
	<!-- start Nav Bar -->
	<nav-bar v-on:showSideBar="drawer = !drawer"></nav-bar><!-- recordar que este nav bar es capaz de mostrar el side bar que se mantiene oculto -->
	<!-- end Nav Bar -->
  	<!-- start cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <v-navigation-drawer
      v-model="drawer"
      app
      clipped
    >
    <!-- start side bar -->
      <side-bar></side-bar>
      <!-- end side  bar -->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
    	<!-- start contenido de muestra -->
  <v-card class="d-inline-block mx-auto" color="grey darken-2" width="600px">
    <v-container>
      	<h1 class="text-center">Actualizar Perfil</h1>
        <!-- start dialog -->
        <v-dialog
        v-model="dialog"
        max-width="550"
        :light="true"
        >
        <router-view @cancel="dialog = false" @cancel2="reload"/>
    </v-dialog>
    <!-- end dialog -->
    <!-- start boton de actualiza la firma digital -->
                <v-row justify="end">
                <v-col sm="12" md="4">
                  <v-btn
                @click.stop="dialog = true"
                color="primary"
                class="ma-2 white--text mr-5"
                >
                  Firma Digital
                  <v-icon right dark>mdi-pencil</v-icon>
                </v-btn> 
                </v-col>
                </v-row>
      <!--end boton que actualiza la firma digital-->
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
        :placeholder="user.first_name"
        :value="user.first_name"
        ></v-text-field>
        <!-- end input nombre -->
        <!-- start input apellido -->
        <v-text-field
        v-model="apellido"
        label="Apellido: "
        required
        prepend-icon="mdi-account-settings"
        :placeholder="user.last_name"
        :value="user.last_name"
        ></v-text-field>
        <!-- end input apellido -->
        <!-- start input cedula -->
        <v-text-field
        v-model="cedula"
        label="Cédula: "
        required
        prepend-icon="mdi-account-card-details"
        :placeholder="user.identification_card"
        :value="user.identification_card"
        ></v-text-field>
        <!-- end input cedula -->
        <!-- start input telefono -->
        <v-text-field
        v-model="telefono"
        label="Teléfono: "
        required
        prepend-icon="mdi-cellphone"
        :placeholder="user.phone"
        :value="user.phone"
        ></v-text-field>
        <!-- end input telefono -->
        <!-- start input correo -->
        <v-text-field
        v-model="correo"
        label="Correo"
        required
        prepend-icon="mdi-email"
        :placeholder="user.email"
        :value="user.email"
        ></v-text-field>
        <!-- end input correo -->
        <!-- start botoner de submit y clean -->
        <v-btn @click="update" class="primary">
        <span>Actualizar</span>
        <v-icon>mdi-account-edit</v-icon>
      </v-btn>
      <v-btn @click="cancel" class="red lighten-1">
        <span>Cancelar</span>
        <v-icon>mdi-cancel</v-icon>
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
import Side from '.././partials/SideBar.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
import sign from '.././components/sign/Sign.vue'
  export default {
  props:['id'],
  	components:{
  		'side-bar':Side,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
      'sign':sign
  	},
  	mounted(){
  	/*start llamamos al api que nos trae toda la informacion de este usuario para colocarla por defecto en los formularios*/
  	let url = '/api/showUser/' + this.id;
  	axios.get(url).then(res => {
  	  this.user=res.data.user
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
  	    user:[],
        dialog:null,
        file:null,
        image:null,
        imagenMiniatura: ''
  	  };
  	},
  	methods: {
      reload(){
        this.$router.push({ name: 'view-users'})
      },
      getImage(e){
        console.log(e)
        this.image = e;
        this.uploadImage(e)
        // let file = e.target.files[0];
        // console.log(file);
        // this.image = file;
        // this.uploadImage(file)
      },
      uploadImage(file){
        let reader  = new FileReader();
        reader.onloadend = (e) => (
          this.imagenMiniatura = e.target.result
          )
        reader.readAsDataURL(file);
      },
      addSign(){
        let formData = new FormData();
        formData.append('image',this.image)
        axios.post('/api/getSign',formData)
        .then( res =>{
          console.log(res.data)
        })
      },
  	  update() {
        /*start llenamos nuestro objeto*/
        /*por si acaso algun valor queda vacio*/
        if(!this.nombre){
        this.nombre=this.user.first_name
        }if(!this.apellido){
        this.apellido=this.user.last_name
        }if(!this.correo){
        this.correo=this.user.email
        }if(!this.cedula){
        this.cedula=this.user.identification_card
        }if(!this.telefono){
        this.telefono=this.user.phone
        }
        /*por si acaso algun valor queda vacio*/
        let parametros={
          'id':this.user.id,
          'first_name':this.nombre,
          'last_name':this.apellido,
          'email':this.correo,
          'identification_card':this.cedula,
          'phone':this.telefono,
          'action_id' : 3,
            'user_id' : this.$store.state.currentUser.id,
          'details': `El usuario hizo una actualización en su perfil personal`
        }
        /*end llenamos nuestro objeto*/
        /*start llamamos al api que permite actualizar a los usuarios*/
        /*start anuncio que afirma que se ha registrado correctamente*/
        axios.put('/api/updateUser',parametros).then(res=>{
		swal({
      		title:'Actualización exitosa',
      		text:res.data.mensaje,
      		icon:'success',
      		closeOnClickOutside:false,
      		CloseOnEsc:false
      	}).then(select=>{
      		if(select){
      		this.$router.push({ name: 'view-leader-zone'})
      		}
		});
        /*end anuncio que afirma que se ha registrado correctamente*/
        })
        /*end llamamos al api que permite actualizar a los usuarios*/
  	  },
  	  cancel(){
  	  	/*start metodo que permite volver a la vista anterior*/
  	 this.$router.go(-1)
  	  	/*end metodo que permite volver a la vista anterior*/
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
      rol() {
        return this.$store.state.currentUser.rol_id;
      },
      imagen(){
      return this.imagenMiniatura
    }
    },
    created () {
      this.$vuetify.theme.dark = true
      //start validamos que el usuario no pueda entrar a perfiles de administradores o de Jefes de zona
      let user = this.$store.getters.currentUser;
      if(user.rol_id !=1 && user.id == this.id){
        return;
      }if(user.rol_id ==1){
        return;
      }else{
        this.$router.go(-1)
      }
      //end validamos que el usuario no pueda entrar a perfiles de administradores o de Jefes de zona
    },

  }
</script>
<style>
.fondo{
    background: #EEEEEE;
    min-height: 1000px;
  }
</style>