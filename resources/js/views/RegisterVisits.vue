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
        v-model="nombre"
        label="Nombre: "
        prepend-icon="mdi-account"
        required
        ></v-text-field>
        <!-- end input nombre -->
        <!-- start input apellido -->
        <v-text-field
        color="dark"
        v-model="apellido"
        label="Apellido: "
        required
        prepend-icon="mdi-account-settings"
        ></v-text-field>
        <!-- end input apellido -->
        <!-- start input cedula -->
        <v-text-field
        color="dark"
        v-model="cedula"
        label="Cédula: "
        prepend-icon="mdi-account-card-details"
        required
        ></v-text-field>
        <!-- end input cedula -->
        <!-- start input telefono -->
        <v-text-field
        color="dark"
        v-model="telefono"
        label="Teléfono: "
        prepend-icon="mdi-cellphone"
        required
        ></v-text-field>
        <!-- end input telefono -->
        <!-- start input correo -->
        <v-text-field
        color="dark"
        v-model="correo"
        label="Correo"
        prepend-icon="mdi-email"
        required
        ></v-text-field>
        <!-- end input correo -->
        <!-- start input de el piso -->
        <v-select
              v-model="piso"
              color="dark"
              label="Piso: "
              :items="pisos"
              item-text="floor"
              item-value="id"
              @blur="viewZones"
              prepend-icon="mdi-grid"
            ></v-select>
        <!-- start select zona educativa -->
        <v-select
              v-model="zona"
              color="dark"
              :items="zonas"
              item-text="zona"
              item-value="id"
              label="Zona: "
              @blur="viewSectors"
              prepend-icon="mdi-grid-large"
            ></v-select>
        <!-- end select zona educativa mdi-grid-large -->
        <!-- start select sector -->
         <v-select
              v-show="zona"
              v-model="sector"
              color="dark"
              :items="sectores"
              label="Sector: "
              item-text="sector"
              item-value="pivot.sector_id"
              prepend-icon="mdi-cube-unfolded"
            ></v-select> 
        <!-- end select sector mdi-cube-unfolded-->
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
      axios.get('/api/viewFloors').then(res => {
        this.pisos=res.data
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
        piso:'',
        pisos:[],
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
    viewZones(){
      let IdFloor={
        'id':this.piso
      }
      this.zonas=this.zoneOfFloor
      // axios.post('/api/viewZones',IdFloor).then(res => {
      // this.zonas=res.data.zones
      // }).catch(err => {
      //   console.log(err);
      // });
    },
    viewSectors(){
      /*vamos a trarnos todos los sectores dependiendo de cual es la zona que elijieron*/
      let parametro={
        idZone:this.zona,
        idFloor:this.piso
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
    computed: {
      zoneOfFloor () {
        if(this.piso==1){
        return [
        {zona:'Zona 1',id:1},
        {zona:'Zona 2',id:2}
        ];
        }else if(this.piso==2){
          return[
          {zona:'Zona A',id:3},
          {zona:'Zona B',id:4},
          {zona:'Zona C',id:5},
          ];
        }else if(this.piso==3){
          return[
          {zona:'Despacho',id:6},
          {zona:'Zona A',id:3},
          {zona:'Zona B',id:4},
          ];
        }else if(this.piso==4){
          return[
          {zona:'Zona A',id:3},
          {zona:'Zona B',id:4},
          {zona:'Zona C',id:5},
          ]
        }
      }
    },
    created () {
      this.$vuetify.theme.dark = true
    },
  }
</script>