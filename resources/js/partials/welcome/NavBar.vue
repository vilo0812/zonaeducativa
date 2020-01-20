<template>
	<v-app-bar
      app
      clipped-left
      color="#E24E42"
      dense
    >
      <v-app-bar-nav-icon 
      @click.stop="$emit('showSideBar')"/>
      <v-icon class="mx-4">mdi-crown</v-icon>
      <v-toolbar-title class="mr-12 align-center">
        <span class="title">FUNDABIT</span>
      </v-toolbar-title>
      <v-spacer />
      <v-tooltip bottom>
      <template v-slot:activator="{ on }">
        <v-btn v-on="on" @click.stop="cerrarSesion" icon>
        <v-icon >mdi-logout</v-icon>
      </v-btn>
      </template>
      <span>cerrar sesión</span>
    </v-tooltip>
    </v-app-bar>
</template>
<script>
  export default{
    methods: {
      cerrarSesion() {
        // axios.get('/api/sesion/cerrar').then(res => {
        //   console.log(res.data);
        // }).catch(err => {
        //   console.log(err);
        // });
      }
    }
  }
</script>