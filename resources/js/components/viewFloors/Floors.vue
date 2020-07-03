<template>
	<div>
		<v-row>
	      <v-select
	        class="ml-3"
	        color="dark"
	        label="Ver Piso"
	        :items="floors"
	        item-text="floor"
	        item-value="id"
	        prepend-icon="mdi-grid"
	        v-model="floor"
	      ></v-select>
	      <v-btn color="primary" class="mt-3 mx-5" @click="$emit('floor',floor)">Ver</v-btn>
	      </v-row>
	</div>
</template>

<script>
export default {
	mounted(){
      axios.get('/api/viewFloors').then(res => {
        this.floors=res.data
      }).catch(err => {
        console.log(err);
      });
    },
  name: 'Floors',

  data () {
    return {
    	floors:[],
    	floor:''
    }
  }
}
</script>

<style lang="css" scoped>
</style>