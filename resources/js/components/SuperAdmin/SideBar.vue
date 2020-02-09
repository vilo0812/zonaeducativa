<template>
	<div>
      <v-list dense>
        <!-- start desplegamos las acciones que tendra disponible el super usuario -->
        <v-list-item
        v-for="item in items"
        :key="item.text"
        link
        :to="{ name: item.direccion}"
        color="darkgray"
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
              <v-img
                src="images/users/defect.jpg"
                alt=""
              ></v-img>
            </v-list-item-avatar>
            <v-list-item-title v-text="item.first_name" />
          </v-list-item>
        </v-list>
        <!-- end listamos a los administradores del sistema -->
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
  },
	data () {
  	  return {
  	    items: [
        { icon: 'mdi-account-edit', text: 'Registrar Administrador',direccion:'register-admin'},
        { icon: 'mdi-google-nearby', text: 'Control de Dependencias',direccion:'controller-dependenci'},
        { icon: 'mdi-pencil', text: 'Registrar Visita',direccion:'register-visits'},
        { icon: 'mdi-star', text: 'Gestion de Visitas', direccion:'Gestion'},
        { icon: 'mdi-book-open-variant', text: 'Visualizar Visitas',direccion:'view-visits'},
      ],
      administradores: []
  	  };
  	}
}
</script>