<template>
  <div>
    <v-card>
        <form @submit.prevent="addSign" enctype="multipart/form-data">
        <v-card-title class="headline">Por Favor Ingrese su firma Digital</v-card-title>
        <v-card-text>
            <p>
             Usted es libre de importar una imagen de su firma para firmar automáticamente los documentos pdf de los reportes, se recomienda utilizar una imagen de la firma con formato .png, .jpg o .jpeg que no exceda los 400px por 400px de ancho y alto
            </p>
            <v-file-input show-size counter label="Agregar Firma" accept="image/*" @change="getImage($event)"></v-file-input>
            <v-card v-if="imagen">
              <v-row justify="center">
                <v-col cols="6">
                    <v-img  src="" width="200" height="200" alt="firma digital" :src="imagen"></v-img>
                </v-col>
              </v-row>
            <v-card-title class="title">{{image.name}}</v-card-title>
          </v-card>
          
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>

          <v-btn
            color="error"
            @click="$router.go(-1)"
          >
            cancelar
          </v-btn>

          <v-btn
            color="primary"
            type="submit"
          >
            continuar
          </v-btn>
        </v-card-actions>
        </form>
      </v-card>
  </div>
</template>
<script>
 export default {
  props:['id'],
  name: 'AddSign',
  data () {
      return {
        image:null,
        imagenMiniatura: '',
        user:''
      };
    },
  computed: {
    imagen(){
      return this.imagenMiniatura
    },
  },
  methods: {
          getImage(e){
        // console.log(e)
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
        formData.append('id',this.id)
        axios.post('/api/storeSign',formData)
        .then( res =>{
          this.$store.commit("signSuccess",res.data);
          swal({
            title:'Firma Guardada exitosamente',
            icon:'success',
            closeOnClickOutside:false,
            CloseOnEsc:false
          }).then(select=>{
            if(select){
              this.$router.go(-1);
            }
          });
        })
      },
  },
   created(){
    this.user= this.$store.getters.currentUser;
    }
 }
</script>