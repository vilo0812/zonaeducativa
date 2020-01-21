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
  <v-card class="d-inline-block mx-auto" color="#E24E42" width="450px">
    <v-container>
      	<h1 class="text-center">Registrar Visitante</h1>
			<form>
				<!-- 
				posibles validaciones
				v-validate="'required|max:10'" 
				v-validate="'required|email'"-->
        <!-- start input nombre -->
        <v-text-field
        color="dark"
        v-model="nombre"
        label="Nombre: "
        required
        ></v-text-field>
        <!-- end input nombre -->
        <!-- start input apellido -->
        <v-text-field
        color="dark"
        v-model="apellido"
        label="Apellido: "
        required
        ></v-text-field>
        <!-- end input apellido -->
        <!-- start input cedula -->
        <v-text-field
        color="dark"
        v-model="cedula"
        label="Cédula: "
        required
        ></v-text-field>
        <!-- end input cedula -->
        <!-- start input telefono -->
        <v-text-field
        color="dark"
        v-model="telefono"
        label="Teléfono: "
        required
        ></v-text-field>
        <!-- end input telefono -->
        <!-- start input correo -->
        <v-text-field
        color="dark"
        v-model="correo"
        label="Correo"
        required
        ></v-text-field>
        <!-- end input correo -->
        <!-- start select zona educativa -->
        <v-select
              v-model="zona"
              color="dark"
              :items="zonas"
              item-text="zone"
              item-value="id"
              label="Zona: "
              @blur="viewSectors"
            ></v-select>
        <!-- end select zona educativa -->
        <!-- start select sector -->
         <v-select
              v-show="zona"
              v-model="sector"
              color="dark"
              :items="sectores"
              label="Sectores: "
              item-text="sector"
              item-value="pivot.sector_id"
            ></v-select> 
        <!-- end select sector -->
        <!-- start tipo de pase -->
        <v-select
              v-model="pase"
              color="dark"
              :items="pases"
              label="Tipo de Pase: "
            ></v-select>
        <!-- end tipo de pase -->
        <!-- start obvervaciones -->
            <v-textarea
              v-model="observaciones"
              color="dark"
              outlined
              name="input-7-4"
              label="Observaciones: "
            ></v-textarea>
        <!-- end obvervaciones -->
        <!-- start pertenencias -->
            <h3 class="text-center">¿El usuario tiene pertenencias?</h3>
             <v-radio-group v-model="HasPertenencias" row>
                <v-radio label="no" color="dark"></v-radio>
                <v-radio label="si" color="dark"></v-radio> 
          </v-radio-group>
          <v-textarea
            v-model="pertenencias"
            color="dark"
            v-if="HasPertenencias"
              outlined
              name="input-7-4"
              label="Pertenencias: "
            ></v-textarea>
        <!-- end pertenencias -->
        <!-- start botones de registrar y limpiar -->
        <v-btn class="mr-4" @click="submit">registrar</v-btn>
        <v-btn @click="clear">clear</v-btn>
        <!-- end botones de registrar y limpiar -->
			</form>
    </v-container>
  </v-card>
<!-- end contenido de muestra -->
    </content-center>
    <!-- end el main donde ira el contenido principal-->
  </div>
</template>

<script>
import Side from '.././components/welcomeSuperAdmin/SideBar.vue'
import Nav from '.././partials/welcome/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
  export default {
  	components:{
  		'side-bar':Side,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
  	},
    mounted(){
      axios.get('/api/viewZones').then(res => {
      this.zonas=res.data.zones
      }).catch(err => {
        console.log(err);
      });
    },
  	data () {
  	  return {
  	    drawer: null,
  	    nombre:'',
  	    apellido:'',
  	    correo:'',
  	    cedula:'',
  	    telefono:'',
        zona:'',
  	    zonas:[],
        sector:'',
  	    sectores:[],
        pase:'',
  	    pases:[
  	    'visitante',
  	    'provisional',
  	    'video conferencia'
  	    ],
        observaciones:'',
  	    HasPertenencias:null,
        pertenencias:''
  	  };
  	},
  	methods: {
  	  submit() {
  	    
  	  },
  	  clear () {
        this.nombre = ''
        this.correo = ''
        this.apellido = ''
        this.cedula=''
        this.telefono=''  
        this.zona=''
        this.sector=''
        this.pase=''
        this.HasPertenencias=[]
    },
    viewSectors(){
      /*vamos a trarnos todos los sectores dependiendo de cual es la zona que elijieron*/
      let parametro={
        id:this.zona
      }
      /*start llenamos los sectore de la vista con los datos de la base de datos*/
      axios.post('/api/viewSectors',parametro).then(res => {
        this.sectores=res.data
      }).catch(err => {
        console.log(err);
      });
      /*end llenamos los sectore de la vista con los datos de la base de datos*/
    }
  	},
    created () {
      this.$vuetify.theme.dark = true
    },
  }
</script>