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
    >	<!-- start seleccionamos el side bar dependiendo del tipo de usuario -->
     <!-- start llamamos al side var del  administrador -->
      <side-bar v-if="rol == 1"></side-bar>
      <!-- end llamamos al side var del administrador -->
      <!-- start llamamos al side var del super administrador -->
      <side-bar-admin v-if="rol == 2"></side-bar-admin>
      <!-- end llamamos al side var del super administrador -->
    </v-navigation-drawer>
    <!-- end cuadro que se mantiene oculto y solo aparecera si drawer es true -->
    <!-- start el main donde ira el contenido principal -->
    <content-center>
    	<!-- start contenido de muestra -->
  <v-card class="d-inline-block mx-auto" color="grey darken-2" width="450px">
    <v-container>
      	<h1 class="text-center">Registrar Visitante</h1>
			<form>
				<!--
				posibles validaciones
				v-validate="'required|max:10'"
				v-validate="'required|email'"-->
        <!-- start input cedula -->
        <v-text-field
        color="dark"
        type="number"
        v-model="cedula"
        label="Cédula: "
        :error="cedulaError"
        :rules="cedulaRules"
        :counter="13"
        @blur="checkUser"
        @keyup.enter="checkUser"
        prepend-icon="mdi-account-card-details"
        required
        ></v-text-field>
        <!-- end input cedula -->
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
        color="dark"
        v-model="apellido"
        label="Apellido: "
        :error="apellidoError"
        :rules="apellidoRules"
        :counter="50"
        required
        prepend-icon="mdi-account-settings"
        ></v-text-field>
        <!-- end input apellido -->
        <!-- start input telefono -->
        <v-text-field
        color="dark"
        type="number"
        v-model="telefono"
        label="Teléfono: "
        :error="tlfError"
        :rules="tlfRules"
        :counter="13"
        prepend-icon="mdi-cellphone"
        required
        ></v-text-field>
        <!-- end input telefono -->
        <!-- start input correo -->
        <v-text-field
        color="dark"
        v-model="correo"
        label="Correo: "
        :counter="100"
        prepend-icon="mdi-email"
        required
        ></v-text-field>
        <!-- end input correo -->
        <!-- start input procedencia -->
        <v-text-field
        color="dark"
        v-model="provenance"
        label="Procedencia: "
        :counter="100"
        prepend-icon="mdi-google-maps"
        required
        ></v-text-field>
        <!-- end input procedencia -->
        <!-- start input de el piso -->
        <v-select
              v-model="piso"
              :error="pisoError"
              :rules="pisoRules"
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
              v-show="piso"
              v-model="zona"
              :error="zonaError"
              :rules="zonaRules"
              color="dark"
              :items="zonas"
              item-text="zona"
              item-value="id"
              label="Zona: "
              @blur="showSectors"
              prepend-icon="mdi-grid-large"
            ></v-select>
        <!-- end select zona educativa mdi-grid-large -->
        <!-- start select sector -->
         <v-select
              v-show="zona"
              v-model="sector"
              :error="sectorError"
              :rules="sectorRules"
              color="dark"
              :items="sectores"
              label="Sector: "
              item-text="sector"
              item-value="id"
              @blur="checkDependence"
              prepend-icon="mdi-cube-unfolded"
            ></v-select>
        <!-- end select sector mdi-cube-unfolded-->
        <!-- start tipo de pase -->
        <v-select
              v-model="pase"
              color="dark"
              :error="paseError"
              :rules="paseRules"
              :items="pases"
              item-text="ticket"
              item-value="id"
              label="Tipo de Pase: "
              prepend-icon="mdi-ticket-account"
            ></v-select>
        <!-- end tipo de pase -->
        <!-- start obvervaciones -->
            <v-textarea
              v-model="observaciones"
              color="dark"
              outlined
              name="input-7-4"
              label="Motivo de Visita: "
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
        <v-btn @click="submit" class="mr-4 light-blue accent-4">
        <span>Registrar</span>
        <v-icon>mdi-account-multiple-plus</v-icon>
        </v-btn>
        <v-btn @click="clear" class="orange lighten-2">
        <span>Limpiar</span>
        <v-icon>mdi-eraser</v-icon>
        </v-btn>
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
import Side from '.././components/SuperAdmin/SideBar.vue'
import Side2 from '.././components/Admin/SideBar.vue'
import Nav from '.././partials/NavBar.vue'
import ContentCenter from '.././structures/Center.vue'
  export default {
  	components:{
      'side-bar':Side,
      'side-bar-admin':Side2,
  		'nav-bar':Nav,
  		'content-center':ContentCenter,
  	},
    mounted(){
      axios.get('/api/viewFloors').then(res => {
        this.pisos=res.data
      }).catch(err => {
        console.log(err);
      });
      axios.get('/api/showTickets').then(res => {
        this.pases=res.data
      }).catch(err => {
        console.log(err);
      });
      //  {id:1,pase:'visitante'},
      //   {id:2,pase:'provisional'},
      //   {id:3,pase:'video conferencia'},
    },
  	data () {
  	  return {
  	    drawer: null,
        usuario:[],
        id:'',
  	    nombre:'',
        nombreError:false,
  	    apellido:'',
        apellidoError:false,
  	    correo:'',
  	    cedula:'',
        cedulaError:false,
  	    telefono:'',
        tlfError:false,
        piso:'',
        pisoError:false,
        pisos:[],
        zona:'',
        zonaError:false,
  	    zonas:[],
        sector:'',
        sectorError:false,
  	    sectores:[],
        pase:'',
        paseError:false,
  	    pases:[],
        observaciones:'',
  	    HasPertenencias:null,
        pertenencias:'',
        provenance:'',
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
        pisoRules:[
        v => !!v || 'el piso es obligatorio',
        ],
        zonaRules:[
        v => !!v || 'zona es obligatoria',
        ],
        sectorRules:[
        v => !!v || 'el sector es obligatorio',
        ],
        paseRules:[
        v => !!v || 'el pase es obligatorio',
        ],
  	  };
  	},
  	methods: {
      submit(){
            this.nombreError=false
            this.apellidoError=false
            this.cedulaError=false
            this.tlfError=false
            this.pisoError=false
            this.zonaError=false
            this.sectorError=false
            this.paseError=false
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
            if(this.piso == ''){
            this.pisoError=true;
            }
            if(this.zona == ''){
            this.zonaError=true;
            }
            if(this.sector == ''){
            this.sectorError=true;
            }
            if(this.pase == ''){
            this.paseError=true;
            }
            if(this.nombreError==false &&
             this.apellidoError==false &&
             this.cedulaError==false &&
             this.tlfError==false &&
             this.pisoError==false &&
             this.zonaError== false &&
             this.sectorError==false &&
             this.paseError==false){
            this.registrar();
            }
      },
  	  registrar() {
  	    let params={
        'id':this.id,
        'idFloor':this.piso,
        'idZone':this.zona,
        'idSector':this.sector,
        'first_name':this.nombre,
        'last_name':this.apellido,
        'email':this.correo,
        'identification_card':this.cedula,
        'phone':this.telefono,
        'provenance':this.provenance,
        'ticket_id':this.pase,
        'belogings':this.pertenencias,
        'observation':this.observaciones,
        }

        axios.post('/api/storeVisit',params).then(res => {
        swal({
            title:res.data.mensaje,
            icon:'success',
            closeOnClickOutside:false,
            CloseOnEsc:false
          }).then(select=>{
            if(select){
              this.$router.push({ name: 'Gestion'})
            }
          });
        }).catch(err => {
          console.log(err);
        });
  	  },
  	  clear () {
        this.nombre = ''
        this.correo = ''
        this.apellido = ''
        this.cedula=''
        this.telefono=''
        this.piso=''
        this.zona=''
        this.sector=''
        this.pase=''
        this.HasPertenencias=[]
    },
    viewZones(){
      this.zonas=this.zoneOfFloor
    },
    showSectors(){
      /*vamos a trarnos todos los sectores dependiendo de cual es la zona que elijieron*/
      let url='/api/showSectors/' + this.piso + '/' + this.zona ;
      /*start llenamos los sectore de la vista con los datos de la base de datos*/
      axios.get(url).then(res => {
        this.sectores=res.data
      }).catch(err => {
        console.log(err);
      });
      /*end llenamos los sectore de la vista con los datos de la base de datos*/
    },
    checkUser(){
      let url='/api/showUserByIc/' + this.cedula;
      axios.get(url).then(res => {
        let user=res.data;
        this.id=user[0].id;
        this.nombre=user[0].first_name;
        this.apellido=user[0].last_name;
        this.cedula=user[0].identification_card;
        this.correo=user[0].email;
        this.telefono=user[0].phone;
        this.provenance=user[0].provenance;
      }).catch(err => {
        console.log(err);
      });
    },
    checkDependence(){
      let url='/api/stateDependence/'+this.piso+'/'+this.zona+'/'+this.sector;
      axios.get(url).then(res => {
        // console.log(res.data[0].dependence);
        if(!res.data[0].dependence){
          swal({
            title:'No disponible',
            text:'la dependencia que desea acudir no se encuentra diponible',
            icon:'warning',
            closeOnClickOutside:false,
            CloseOnEsc:false
          }).then(select=>{
            if(select){
              this.piso=''
              this.zona=''
              this.sector=''
            }
          });
        }
      }).catch(err => {
        console.log(err);
      });
    },
    mode(){
      this.$vuetify.theme.dark = false;
    },
  	},
    computed: {
      rol() {
        return this.$store.state.currentUser.rol_id;
      },
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
<style>
  .fondo-2{
    background: #EEEEEE;
    min-height: 700px;
  }
</style>