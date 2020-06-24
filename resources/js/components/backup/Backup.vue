<template>
	<div>
		<v-card-title class="headline">copia de seguridad y Restauración de Fábrica</v-card-title>

            <v-card-text>
              restauración
            </v-card-text>

            <v-card-actions>
              <v-btn
                color="primary"
                :to="{ name: 'backup-security-copy'}"
              >
                Hacer copia de seguridad
              </v-btn>
              <v-btn
                color="error"
                :to="{ name: 'backup-fact'}"
              >
                restaurar de fábrica 
              </v-btn>
              <v-spacer></v-spacer>

              <v-btn
                color="error"
                @click="$emit('cancel')"
              >
                cancelar
              </v-btn>
            </v-card-actions>
	</div>
</template>
<script>
	export default {
		name:'Backup',
	}
</script>