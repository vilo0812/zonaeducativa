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
        <v-list>
          <v-list-item
            v-for="item in items2"
            :key="item.text"
            link
          >
            <v-list-item-avatar>
              <img
                :src="`https://randomuser.me/api/portraits/men/${item.picture}.jpg`"
                alt=""
              >
            </v-list-item-avatar>
            <v-list-item-title v-text="item.text" />
          </v-list-item>
        </v-list>
        <v-list-item
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
        </v-list-item>
      </v-list>
	</div>
</template>
<script>
	export default{
	data () {
  	  return {
  	    items: [
        { icon: 'mdi-account', text: 'Registrar Administrador',direccion:'register-admin'},
        { icon: 'mdi-google-nearby', text: 'control de dependencias',direccion:'controller-dependenci'},
        { icon: 'mdi-pencil', text: 'registro de visita',direccion:'register-visits'},
        { icon: 'mdi-book-open-variant', text: 'visualizar Registros',direccion:'view-visits'},
      ],
      items2: [
        { picture: 28, text: 'Jose Gregorio' },
        { picture: 38, text: 'Erick' },
        { picture: 48, text: 'Javier' },
        { picture: 58, text: 'Franklin' },
        { picture: 78, text: 'Truman' },
      ]
  	  };
  	}
}
</script>