<template>
  <v-app>
	<transition
		name="animate.css"
        enter-active-class="animated fadeIn"
        appear
	>
    	<router-view/>
	</transition>
  </v-app>
</template>
