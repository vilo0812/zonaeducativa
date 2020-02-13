<template>
  <v-app-bar
      app
      clipped-left
      color="red darken-2"

      dense
      dark
    >
      <v-app-bar-nav-icon
      @click.stop="$emit('showSideBar')"/>
      <v-toolbar-title class="mr-12 align-center">
        <span class="title font-weight-black">Zona Educativa</span>
      </v-toolbar-title>
      <v-spacer />
    <div class="text-center">
    <v-menu offset-y>
      <template v-slot:activator="{ on }">
        <v-btn
          dark
          v-on="on"
          icon
        >
          <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
      </template>
      <!-- start carta escondida -->
      <v-list>
      <v-card class="d-inline-block mr-3">
    <v-container>
      <v-row justify="space-between">
        <v-col cols="auto">
          <v-img v-if="$route.name == 'edit-user' || $route.name == 'show-admin'"
            class="redondo"
            height="200"
            width="200"
            src="../images/users/defect.jpg"
          ></v-img>
          <v-img
            v-else
            class="redondo"
            height="200"
            width="200"
            src="images/users/defect.jpg"
          ></v-img>

        </v-col>
        <v-card
        class="mx-auto"
          width="200"
          color="red lighten-1"
        >
          <v-list-item-content class="ml-2">
          <v-list-item-subtitle class="subtitle">Nombre de usuario</v-list-item-subtitle>
          <v-list-item-title>Vilonk</v-list-item-title>
          </v-list-item-content>
          <v-list-item-content class="ml-2">
          <v-list-item-subtitle class="subtitle">Usuario</v-list-item-subtitle>
          <v-list-item-title >
            {{user.first_name}}<br>
            {{user.last_name}}
        </v-list-item-title>
          </v-list-item-content>
          <v-list-item-content class="ml-2">
          <v-list-item-subtitle class="subtitle">Correo</v-list-item-subtitle>
          <v-list-item-title >{{user.email}}</v-list-item-title>
          </v-list-item-content>
        <v-list-item link :to="{ name: 'edit-user', params: { id:user.id }}">
            <v-list-item-icon>
              <v-icon>mdi-account-edit</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Editar Perfil</v-list-item-title>
          </v-list-item>
          <v-list-item link @click.stop="cerrarSesion">
            <v-list-item-icon>
              <v-icon>mdi-logout</v-icon>
            </v-list-item-icon>
            <v-list-item-title>Cerrar Sesión</v-list-item-title>
          </v-list-item>
  </v-card>
      </v-row>
    </v-container>
  </v-card>
      </v-list>
      <!-- end carta escondida -->
    </v-menu>
  </div>
    </v-app-bar>
</template>
<script>
  export default{
    data () {
      return {
        user:''
      };
    },
    methods: {
      cerrarSesion() {
       this.$store.commit('logout');
        this.$router.push('/');
      }
    },
    created(){
      this.user= this.$store.getters.currentUser;
    }
  }
</script>
<style>
  .redondo{
    border-radius: 50%;
  }
  .subtitle{
    color:#B1B1B1;
  }
</style>