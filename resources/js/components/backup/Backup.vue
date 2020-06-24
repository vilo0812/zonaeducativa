}<template>
	<div>
		<v-card-title class="headline">copia de seguridad y Restauración de Fábrica</v-card-title>
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
                <h3 class="text-center">Restaurando el Sistema de Fábrica</h3>
          </v-row>
    </div>
    <div v-else>
      <v-card-title>
        Copia de copia de seguridad, permite crear, eliminar e instalar copias del sistema para mantener la seguridad, mientras que restaurar de fábrica restaurara el sistema a su estado original, se recomienda hacerlo despues de hacer una copia de seguridad
      </v-card-title>
        <v-card-text>
              <v-row justify="center"> 
                <div>
                <v-btn
                color="primary"
                :to="{ name: 'backup-security-copy'}"
                >
                copia de seguridad
              </v-btn>
              <v-btn
                color="warning"
                @click="backupToFact"
              >
                <!-- :to="{ name: 'backup-fact'}" -->
                restaurar de fábrica 
              </v-btn>
              </div>
              </v-row>
            </v-card-text>

            <v-card-actions>
              
              <v-spacer></v-spacer>

              <v-btn
                color="error"
                @click="$emit('cancel')"
              >
                cancelar
              </v-btn>
            </v-card-actions>
    </div>
	</div>
</template>
<script>
	export default {
    data () {
    return {
    loading:null
    };
    },
		name:'Backup',
    methods: {
      backupToFact () {
        swal({
            title:'¿Estas seguro de querer restaurar el sistema de fábrica?',
            icon:'warning',
            text:'Vamos a Restaurar el sistema de fábrica lo que quiere decir que todos los datos actuales se perderan y el sistema volvera a tener la información de fábrica, se recomienda hacer una copia de seguridad antes que los actuales desaparescan para siempre, una vez el proceso sea finalizado el sistema se reiniciara ¿seguro que desea continuar?',
            closeOnClickOutside:true,
            CloseOnEsc:true,
            buttons: true,
          }).then(select=>{
            if(select){
              this.loading = true;
              let url=`/api/backup`;
            axios.get(url).then(res => {
              this.loading = false;
              this.$store.commit('logout');
              this.$router.push('/');
            }).catch(err => {
              console.log(err);
            });
            }
          });
      }
    }
	}
</script>