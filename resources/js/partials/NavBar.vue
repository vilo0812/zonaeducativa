<template>
<div>
<v-app-bar
 color="deep-purple accent-3"
 dense
 dark
>
<!--icono de la empresa-->
     <v-img
       src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"
       lazy-src="https://picsum.photos/id/11/10/6"
       aspect-ratio="1"
       class="grey lighten-2 redondo mt-12 ml-12"
       max-width="85"
      max-height="85"
     ></v-img>

   <v-spacer></v-spacer>  

   <v-btn icon>
     <v-icon>mdi-magnify</v-icon>
   </v-btn>
   
   <v-divider
       vertical
     ></v-divider>
     
   <v-menu
     left
     bottom
   >
     <template v-slot:activator="{ on }">
       <v-btn icon v-on="on">
         <v-icon>mdi-dots-vertical</v-icon>
       </v-btn>
     </template>
    <!--lista de opciones-->
     <v-card
   class="mx-auto"
   max-width="400"
   tile
 >
   <v-list-item>
     <v-list-item-content>
       <v-list-item-title>
         <v-btn text to="/">cerrar sesión</v-btn>
       </v-list-item-title>
     </v-list-item-content>
   </v-list-item>
   </v-card>
   </v-menu>
       <!--aside-->
   <template v-slot:extension>
            <v-btn
              @click="toogleDrawer"
              fab
              color="deep-purple accent-2"
              bottom
              left
              absolute
            >
              <v-icon>mdi-greater-than</v-icon>
            </v-btn>
          </template>
  </v-app-bar>
    
    <v-navigation-drawer
    v-model="drawer"
    absolute
    temporary
    class="indigo lighten-5"
    >
      <v-list>
         <v-list-item-group>
           <v-list-item>
             <v-list-item-avatar>
              <v-img src="https://randomuser.me/api/portraits/men/78.jpg"></v-img>
              </v-list-item-avatar>
              <v-list-item-content>
                <v-list-item-title>John Leider</v-list-item-title>
              </v-list-item-content>
           </v-list-item>
           <v-divider></v-divider>
           <v-list-item to="/inicio">
               <v-icon left>mdi-home-city</v-icon>
               <v-list-item-title>Inicio</v-list-item-title>
           </v-list-item>
           <v-divider></v-divider>
           <v-list-item to="/tareas">
               <v-icon left>mdi-format-list-checks</v-icon>
               <v-list-item-title>Tareas</v-list-item-title>
           </v-list-item>
         </v-list-item-group>
       </v-list>
    </v-navigation-drawer>
    
  </div>
</template>
<script>
export default{
  data(){
    return{
      drawer:null
    }
  },
  methods: {
    toogleDrawer() {
      this.drawer = !this.drawer;
    }
  }
}
</script>
<style>
.redondo{
border-radius:50%;
}
</style>
