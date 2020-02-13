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
    >	<!-- start seleccionamos el side bar dependiendo del tipo de usuario -->
     <!-- start llamamos al side var del  administrador -->
      <side-bar v-on:update="go" v-if="rol == 1"></side-bar>
      <!-- end llamamos al side var del administrador -->
      <!-- start llamamos al side var del super administrador -->
      <side-bar-admin v-on:update="go" v-if="rol == 2"></side-bar-admin>
      <!-- end llamamos al side var del super administrador -->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
    	<!-- start perfil del administrador -->
    	<v-card class="d-inline-block mx-auto" color="grey darken-2" width="600px">
<v-container fluid>
	<!-- start imagen, nombre y correo -->
      <v-img :aspect-ratio="16/9" src="/images/users/defect.jpg">
        <v-row align="end" class="lightbox white--text pa-2 fill-height">
          <v-col class="primary  col-6" border>
          	<!-- start mostramos los datos del nombre y el correo -->
            <h1 v-text="administrador.first_name"></h1>
            <p v-text="administrador.email"></p>
          	<!-- end mostramos los datos del nombre y el correo -->
          </v-col>
        </v-row>
      </v-img>
	<!-- end imagen, nombre y correo deep-orange darken-2-->
	<!-- start carta de perfil -->
	<v-card
	    class="mx-auto"
	    max-width=""
	    tile
	    color="success accent-4"
	  >
	<!-- start nombre,apellido,cedula,telefono,municipio -->
      <v-list-item >
        <v-list-item-icon>
          <v-icon>mdi-account</v-icon>
        </v-list-item-icon>

        <v-list-item-title>Nombre: {{administrador.first_name}}</v-list-item-title>
      </v-list-item>
      <v-list-item >
        <v-list-item-icon>
          <v-icon>mdi-account-settings</v-icon>
        </v-list-item-icon>

        <v-list-item-title>Apellido: {{administrador.last_name}}</v-list-item-title>
      </v-list-item>
      <v-list-item >
        <v-list-item-icon>
          <v-icon>mdi-account-card-details</v-icon>
        </v-list-item-icon>

        <v-list-item-title>Cedula: {{administrador.identification_card}}</v-list-item-title>
      </v-list-item>
      <v-list-item >
        <v-list-item-icon>
          <v-icon>mdi-cellphone</v-icon>
        </v-list-item-icon>

        <v-list-item-title>Teléfono: {{administrador.phone}}</v-list-item-title>
      </v-list-item>
      <v-list-item >
        <v-list-item-icon>
          <v-icon>mdi-email</v-icon>
        </v-list-item-icon>

        <v-list-item-title>Correo: {{administrador.email}}</v-list-item-title>
      </v-list-item>
	<!-- end nombre,apellido,cedula,telefono,municipio -->
	<!-- start botones de editar y eliminar red lighten-1-->
	<v-card-actions v-if="rol == 1">
      <v-btn @click="editing" class="primary">
        <span>Editar</span>
        <v-icon>mdi-account-edit</v-icon>
      </v-btn>
      <v-btn @click="remove" class="red lighten-1">
        <span>Eliminar</span>
        <v-icon>mdi-account-remove</v-icon>
      </v-btn>
    </v-card-actions>
	<!-- end botones de editar y eliminar -->
	</v-card>
	<!-- end carta de perfil -->
  </v-container>
    	</v-card>
    	<!-- end perfil del administrador -->
    </content-center>
    <!-- end el main donde ira el contenido principal-->
  </div>
</template>

<script>
import Side from '.././components/SuperAdmin/SideBar2.vue'
import Side2 from '.././components/Admin/SideBar2.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
export default {
	data () {
	  return {
	    drawer:'',
	    administrador:''
	  };
	},
  props:['id'],
  components:{
  		'side-bar':Side,
      'side-bar-admin':Side2,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
  },
  mounted(){
  	/*start llamamos al api que nos trae toda la informacion de este usuario*/
  	let url=`/api/showUser/` + this.$route.params.id;
  	axios.get(url).then(res => {
  	  this.administrador=res.data.user
  	}).catch(err => {
  	  console.log(err);
  	});
  	/*end llamamos al api que nos trae toda la informacion de este usuario*/
  },
  methods: {
    go(){
      /*start llamamos al api que nos trae toda la informacion de este usuario*/
    let url=`/api/showUser/` + this.id;
    axios.get(url).then(res => {
      this.administrador=res.data.user
    }).catch(err => {
      console.log(err);
    });
    /*end llamamos al api que nos trae toda la informacion de este usuario*/
    },
    editing () {
      this.$router.push({ name: 'editing-admin', params: {id:this.administrador.id}})
    },
    remove(){
    	/*start pantalla de evaluar si de verdad se quiere eliminar*/
    	swal({
	      		title:'¿seguro que quiere eliminar este usuario?',
	      		icon:'warning',
	      		buttons: true,
	      		dangerMode: true,
	      		buttons: ["cancelar", "eliminar"],
	      		closeOnClickOutside:false,
	      		CloseOnEsc:false
	      	}).then((willDelete) => {
	      		/*start las dos pantallas que se pueden mostrar en caso de que decida eliminar o no*/
			  if (willDelete) {
			  	this.deleteAdmin();
			  } else {
			    swal("su usuario se encuentra seguro");
			  }
	      		/*end las dos pantallas que se pueden mostrar en caso de que decida eliminar o no*/
	      	});
    	/*end pantalla de evaluar si de verdad se quiere eliminar*/
    },
    deleteAdmin(){
    	/*start eliminamos al usuario de la base de datos*/
			  	// let parametros={
			  	// 	'id':this.id
			  	// }
			  	// axios.delete('/api/deleteAdmin',parametros).then(res => {
            let url=`/api/deleteUser/` + this.id;
            axios.delete(url).then(res => {
			  	  /*start pantalla que informa que se elimino correctamente*/
			  	  swal("su usuario ha sido eliminado!", {
			      icon: "success",
			      closeOnClickOutside:false,
	      		  CloseOnEsc:false
			    }).then(select=>{
			    	/*start si el usuario pulsa el boton sera redirijido al welcome*/
			    	if(select){
			    	this.$router.push({ name: 'Gestion'})
			    	}
			    	/*end si el usuario pulsa el boton sera redirijido al welcome*/
			    });
			  	  /*end pantalla que informa que se elimino correctamente*/
			  	}).catch(err => {
			  	  console.log(err);
			  	});
			  	/*end eliminamos al usuario de la base de datos*/
    }
  },
  computed: {
    rol() {
        return this.$store.state.currentUser.rol_id;
      }
  },
  created () {
      this.$vuetify.theme.dark = true
    }
}
</script>
<style>
.fondo{
    background: #EEEEEE;
    min-height: 700px;
  }
.redondo{
border-radius:50%;
}
.black{
	color:black;
}
.yellow-accent-4{
	background-color:rgba(245,227,25,0.7);
}
</style>