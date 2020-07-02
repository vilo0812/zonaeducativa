<template>
  <div>
    <v-card>
      <v-card-title class="headline text-center">Firma Digital
      </v-card-title>
      <v-card-text>
        <v-btn
              color="primary"
              :to="{ name: 'add-sign', params: { id:user.id, sign:user.sign }}"
            >
          Agregar Firma Digital
          <v-icon right dark>mdi-pencil</v-icon>
       </v-btn>
      </v-card-text>
        <v-row justify="center">
          <v-col cols="6">
              <v-img alt="firma digital" src=".././images/background/63.jpg"/></v-img>
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
  name:'NotSignStill',
  props:['user'],
 }
</script>