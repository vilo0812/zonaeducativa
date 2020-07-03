<template>
  <div>
    <v-card>
      <show-sign  v-if="user.sign" :user="user" @cancel="$emit('cancel')"/>
      <not-sign v-else :user="user" @cancel="$emit('cancel')"/>
    </v-card>
  </div>
</template>
<script>
import NotSignStill from './NotSignStill.vue'
import ShowSign from './ShowSign.vue'
 export default {
  props:['id'],
  mounted(){
      axios.get(`/api/showUser/${this.id}`).then(res => {
        this.user=res.data.user
      }).catch(err => {
        console.log(err);
      });
    },
  components:{
    'not-sign':NotSignStill,
    'show-sign':ShowSign,
  },
  data () {
      return {
        user:'',
      };
    },
  methods: {
    add(){
      console.log('agregar')
    }
  },
 }
</script>