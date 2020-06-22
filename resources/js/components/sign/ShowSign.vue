<template>
  <div>
    <v-card>
      <v-card-title class="headline text-center">Firma Digital
      </v-card-title>
      <v-card-text>
        <v-btn class="primary"
        :to="{ name: 'add-sign', params: { id:user.id }}"
        >
        <span>Editar</span>
        <v-icon>mdi-pencil</v-icon>
      </v-btn>
      <v-btn class="error"
      @click="destroySign">
        <span>Eliminar</span>
        <v-icon>mdi-backspace</v-icon>
      </v-btn>
      </v-card-text>
        <v-row justify="center">
          <v-col cols="6">
              <v-img alt="firma digital" :src="urlSign"/></v-img>
          </v-col>
        </v-row>
     <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="error"
            @click="$emit('cancel')"
          >
            cancelar
          </v-btn>

        </v-card-actions>
    </v-card>
  </div>
</template>
<script>
 export default {
  data () {
      return {
        user:''
      };
    },
  computed: {
    urlSign(){
      return `.././images/${this.user.sign}`
    }
  },
  methods: {
    destroySign(){
      const params = {
        id: this.user.id
      }
      axios.post('/api/destroySign',params)
        .then( res =>{
          this.$store.commit("signDelete");
          swal({
            title:'Firma Eliminada exitosamente',
            icon:'success',
            closeOnClickOutside:false,
            CloseOnEsc:false
          }).then(select=>{
            if(select){
              this.$router.go(0);
            }
          });
        })
    },
    add(){
      console.log('agregar')
    }
  },
  created(){
      this.user= this.$store.getters.currentUser;
    }
 }
</script>