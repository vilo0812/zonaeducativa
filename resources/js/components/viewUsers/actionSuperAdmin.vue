<template>
	<div>
		<template v-if="rol == 1">
		<v-btn width="120" @click="$emit('editing')"  color="primary">
	        <span>Editar</span>
	        <v-icon class="ml-2">mdi-account-edit</v-icon>
	    </v-btn>
	    <v-btn width="120" @click="$emit('remove')"  color="red lighten-1">
	        <span>Eliminar</span>
	        <v-icon class="ml-2">mdi-delete</v-icon>
        </v-btn>
		</template>
		<template v-else>
			<v-btn width="120" @click="$emit('viewUser')"  color="primary">
		        <span>Ver</span>
		        <v-icon class="ml-2">mdi-eye</v-icon>
		    </v-btn>	
		</template>
	</div>
</template>

<script>
export default {
	computed: {
	  rol() {
        return this.$store.state.currentUser.rol_id;
      }
	},
  name: 'actionSuperAdmin',
  data () {
    return {

    }
  }
}
</script>

<style lang="css" scoped>
</style>