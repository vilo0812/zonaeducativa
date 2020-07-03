<template>
	<div>
		<v-row>
	      <v-select
	        class="ml-3"
	        color="dark"
	        label="Ver Sector"
	        :items="sectors"
	        item-text="sector"
	        item-value="id"
	        prepend-icon="mdi-grid"
	        v-model="sector"
	      ></v-select>
	      <v-btn color="primary" class="mt-3 mx-5" @click="$emit('sector',sector)">Ver</v-btn>
	      </v-row>
	</div>
</template>

<script>
export default {
	mounted(){
      axios.get('/api/viewSectors').then(res => {
        this.sectors=res.data
      }).catch(err => {
        console.log(err);
      });
    },
  name: 'Sectors',

  data () {
    return {
    	sectors:[],
    	sector:''
    }
  }
}
</script>

<style lang="css" scoped>
</style>