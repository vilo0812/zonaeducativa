<template>
	<div>
    <!-- start dialog -->
        <v-dialog
        v-model="addCopyDialog"
        max-width="550"
        :light="true"
        >
      <v-card>
        <div v-if="loadingAddCopy">
            <v-row justify="center">
              <v-col cols="2">
                  <v-progress-circular
                    indeterminate
                    color="red"
                    :size="100"
                    :width="7"
                  ></v-progress-circular>
              </v-col>
            </v-row>
            <v-row justify="center">
                <h3 class="text-center">Creando Copia de Seguridad</h3>
          </v-row>
        </div>
        <div v-else>
          <v-card-title class="headline">¿Estas seguro de crear una nueva copia de seguridad?</v-card-title>

        <v-card-text>
          Vamos a crear archivo sql que contendra toda la información actual de su sistema el cual, esto puede tomar un tiempo, ¿esta seguro de continuar?
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="error"
            @click="addCopyDialog = false"
          >
            cancelar
          </v-btn>

          <v-btn
            color="primary"
            @click="addCopy"
          >
            continuar
          </v-btn>
        </v-card-actions>
        </div>
      </v-card>
        </v-dialog>
      <!-- end dialog -->
		  <div v-if="loading">
            <v-row justify="center">
              <v-col cols="2">
                  <v-progress-circular
                    indeterminate
                    color="red"
                    :size="100"
                    :width="7"
                  ></v-progress-circular>
              </v-col>
            </v-row>
            <v-row justify="center">
                <h3 class="text-center">{{loadingInfo}}</h3>
          </v-row>
        </div>
        <div v-else>
            <v-card-title class="headline">Copia de Seguridad</v-card-title>

            <v-card-text>
              <p>  
              Puede crear una nueva copia de seguridad para asegurar la información que usted necesite
              </p><br/>
              <v-btn
                color="primary"
                @click="addCopyDialog = true"
              >
                Hacer copia de seguridad
              </v-btn>
              <v-btn
                color="error"
                @click="destroyCopy"
                :disabled="itsnotaCopy"
              >
                Eliminar copia de seguridad
              </v-btn>
              <v-select
                class="ml-3"
                color="dark"
                label="Ver Copias de Seguridad"
                :items="copies"
                item-text="copy"
                item-value="id"
                prepend-icon="mdi-content-copy"
                v-model="copy"
                @change="itsnotaCopy = false"
              ></v-select>
            </v-card-text>

            <v-card-actions>
              <v-btn
                color="error"
                @click="$router.go(-1)"
              >
                cancelar
              </v-btn>
              <v-spacer></v-spacer>
              <v-btn
                color="primary"
                @click="isntallCopy"
                :disabled="itsnotaCopy"
              >
                Instalar copia de seguridad
              </v-btn>
            </v-card-actions>
          </div>
	</div>
</template>

<script>
export default {
  computed: {
    loadingInfo () {
     if(this.loadingDestroyingCopy){
        return 'Eliminando Copia de Seguridad';
      }else{
        return 'Instalando Copia de Seguridad';
      }
    }
  },
  mounted(){
    this.getCopiesData();
    },
  name:'BackupSecurityCopy',
	data () {
	  return {
      addCopyDialog:null,
      loadingAddCopy:null,
      loadingDestroyingCopy:null,
      loadingInstalling:null,
      loading:null,
      dialog:null,
      copies:[],
      copy:'',
      itsnotaCopy:true
	  };
	},
  methods: {
    isntallCopy(){
      swal({
            title:'¿Seguro que desea continuar?',
            icon:'warning',
            text:'su copia de seguridad seleccionada va a ser instalada y los datos del sistema actuales desaparecerán para siempre, una vez el proceso sea finalizado el sistema se reiniciara ¿seguro que desea continuar?',
            closeOnClickOutside:true,
            CloseOnEsc:true,
            buttons: true,
          }).then(select=>{
            if(select){
                this.loadingDestroyingCopy=false;
                this.loading = true;
                let url=`/api/isntallCopy/${this.copy}`;
                axios.get(url).then(res => {
                this.loadingDestroyingCopy=false;
                this.loading = false;
                this.$store.commit('logout');
                this.$router.push('/');
              }).catch(err => {
                console.log(err);
              });
            }
          });
    },
    getCopiesData(){
      axios.get('/api/showCopies').then(res => {
        this.copies = res.data;
      }).catch(err => {
        console.log(err);
      });
    },
    destroyCopy(){
      swal({
            title:'¿Seguro que desea continuar?',
            icon:'warning',
            text:'su copia de seguridad sera eliminada para siempre y no podrá ser recuperada ¿seguro que desea continuar?',
            closeOnClickOutside:false,
            CloseOnEsc:false,
            buttons: true,
          }).then(select=>{
            if(select){
              this.loadingDestroyingCopy=true;
                this.loading = true;
                let url=`/api/destroyCopy/${this.copy}`;
                axios.delete(url).then(res => {
                this.loadingDestroyingCopy=false;
                this.loading = false;
                swal({
                      title:'Copia de Seguridad Eliminada exitosamente',
                      icon:'success',
                      closeOnClickOutside:false,
                      CloseOnEsc:false,
                    }).then(select=>{
                      if(select){
                        this.getCopiesData();
                        this.addCopyDialog = false;
                      }
                    });
              }).catch(err => {
                console.log(err);
              });
            }
          });
    },
    addCopy() {
    this.loadingAddCopy=true;
    let url=`/api/addCopy`;
    axios.post(url).then(res => {
      this.loadingAddCopy=false;
      swal({
            title:'Copia de Seguridad Lista',
            icon:'success',
            closeOnClickOutside:false,
            CloseOnEsc:false
          }).then(select=>{
            if(select){
              this.getCopiesData();
              this.addCopyDialog = false;
            }
          });
    }).catch(err => {
      console.log(err);
    });
  }
},
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
.small{
  font-size:10px;
}
</style>