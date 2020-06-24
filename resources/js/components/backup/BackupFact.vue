<template>
	<div>
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
            <v-card-title class="headline">¿Estas seguro de querer restaurar el sistema de fábrica?</v-card-title>

            <v-card-text>
              Vamos a Restaurar el sistema de fábrica lo que quiere decir que todos los datos actuales se perderan y el sistema volvera a tener la información de fábrica ¿esta seguro que desea continuar?
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
                @click="backup"
              >
                continuar
              </v-btn>
            </v-card-actions>
          </div>
	</div>
</template>

<script>
export default {
  name:'BackupFact',
	data () {
	  return {
	  };
	},
  props:['loading'],
  methods: {
    backup () {
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
.small{
  font-size:10px;
}
</style>