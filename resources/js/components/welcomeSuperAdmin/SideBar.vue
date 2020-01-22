<template>
	<div>
      <v-list dense>
        <!-- start desplegamos las acciones que tendra disponible el super usuario -->
        <v-list-item
        v-for="item in items"
        :key="item.text"
        link
        :to="{ name: item.direccion}"
        >
          <v-list-item-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>
              {{ item.text }}
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <!-- end desplegamos las acciones que tendra disponible el super usuario -->
        <v-subheader class="mt-4 grey--text text--darken-1">Administradores</v-subheader>
        <!-- start listamos a los administradores del sistema -->
        <v-list>
          <v-list-item
            v-for="item in administradores"
            :key="item.id"
            link
            :to="{ name: 'show-admin', params: { id:item.id }}"
          >
            <v-list-item-avatar>
              <img
                src="images/users/defect.jpg"
                alt=""
            >
            </v-list-item-avatar>
            <v-list-item-title v-text="item.first_name" />
          </v-list-item>
        </v-list>
        <!-- end listamos a los administradores del sistema -->
      <!--   <v-list-item
          class="mt-4"
          link
        >
          <v-list-item-action>
            <v-icon color="grey darken-1">mdi-plus-circle-outline</v-icon>
          </v-list-item-action>
          <v-list-item-title class="grey--text text--darken-1">Browse Channels</v-list-item-title>
        </v-list-item>
        <v-list-item link>
          <v-list-item-action>
            <v-icon color="grey darken-1">mdi-settings</v-icon>
          </v-list-item-action>
          <v-list-item-title class="grey--text text--darken-1">Manage Subscriptions</v-list-item-title>
        </v-list-item> -->
      </v-list>
	</div>
</template>
<script>
	export default{
  mounted(){
    /*start metemos los administradores registradors*/
    axios.get('/api/viewAdmins').then(res => {
      this.administradores=res.data.admins;
    }).catch(err => {
      console.log(err);
    });
    /*this.administradores.push(
        { picture: 38, text: 'Erick' },
        { picture: 48, text: 'Javier' },
        { picture: 58, text: 'Franklin' },
        { picture: 78, text: 'Truman' },
        { picture: 28, text: 'Jose Gregorio' }
        );*/
    /*end metemos los administradores registradors*/
  },
	data () {
  	  return {
  	    items: [
        { icon: 'mdi-account-edit', text: 'Registrar Administrador',direccion:'register-admin'},
        { icon: 'mdi-google-nearby', text: 'control de dependencias',direccion:'controller-dependenci'},
        { icon: 'mdi-pencil', text: 'registro de visita',direccion:'register-visits'},
        { icon: 'mdi-book-open-variant', text: 'visualizar Registros',direccion:'view-visits'},
      ],
      administradores: []
  	  };
  	}
}
</script>