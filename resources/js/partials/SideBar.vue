<template>
	<div>
      <v-list dense>
        <!-- start desplegamos las acciones que tendra disponible el super usuario -->
        <v-list-item
        v-for="item in modules"
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
            v-for="(item, index) in administradores"
            :key="item.id"
            link
            :to="{ name: 'show-admin', params: { id:item.id }}"
            @click.stop="$emit('update')"
          >
            <v-list-item-avatar>
              <v-img
                class="redondo"
                :src="urlImgUser(index)"
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
    /*start traemos los administradores registrados*/
    axios.get('/api/viewAdmins').then(res => {
      this.administradores=res.data.admins;
    }).catch(err => {
      console.log(err);
    /*end traemos los administradores registrados*/
    });
  },
	data () {
  	  return {
  	    itemsSuperAdmin: [
        { icon: 'mdi-account-card-details', text: 'Bitácoras',direccion:'view-bitacores'},
        { icon: 'mdi-google-nearby', text: 'Control de Dependencias',direccion:'controller-dependenci'},
        { icon: 'mdi-account-multiple-plus', text: 'Registrar Administrador',direccion:'register-admin'},
        { icon: 'mdi-account-multiple-plus', text: 'Registrar Jefe de Zona',direccion:'register-leader-zone'},
        { icon: 'mdi-pencil', text: 'Registrar Visita',direccion:'register-visits'},
        { icon: 'mdi-account-check', text: 'Gestionar Visitas', direccion:'gestion-visit'},
        { icon: 'mdi-ticket', text: 'Gestionar Tickets', direccion:'gestion-ticket'},
        { icon: 'mdi-library', text: 'Ver Usuarios',direccion:'view-users'},
        { icon: 'mdi-book-open-variant', text: 'Visualizar Visitas',direccion:'view-visits'},
        { icon: 'mdi-settings', text: 'Sistema',direccion:'backup-index'},
      ],
      itemsAdmin: [
        { icon: 'mdi-library', text: 'Ver Usuarios',direccion:'view-users'},
        { icon: 'mdi-pencil', text: 'Registrar Visita',direccion:'register-visits'},
        { icon: 'mdi-account-check', text: 'Gestionar Visitas', direccion:'gestion-visit'},
        { icon: 'mdi-ticket', text: 'Gestionar Tickets', direccion:'gestion-ticket'},
        { icon: 'mdi-book-open-variant', text: 'Visualizar Visitas',direccion:'view-visits'},
      ],
      itemsLeaderZone: [
        { icon: 'mdi-library', text: 'Ver Usuarios',direccion:'view-users'},
        { icon: 'mdi-book-open-variant', text: 'Visualizar Visitas',direccion:'view-visits'},
        
      ],
      administradores: []
  	  };
  	},
    computed: {
      modules(){
        if(this.rol == 1){
          return this.itemsSuperAdmin;
        }else if(this.rol == 2){
          return this.itemsAdmin;
        }else{
          return this.itemsLeaderZone;
        }
      },
      rol() {
        return this.$store.state.currentUser.rol_id;
      },
      urlUserPicture(){
        return './../images/defect.jpg';
        // this.pic = `./../images/users/${this.administradores[index].identification_card}/${this.administradores[index].picture}`;
        // return `./../images/users/${this.administradores[index].identification_card}/${this.administradores[index].picture}`;
      }
    },
    methods: {
      urlImgUser(index) {
        return `./../images/users/${this.administradores[index].identification_card}/${this.administradores[index].picture}`;
      }
    }
}
</script>