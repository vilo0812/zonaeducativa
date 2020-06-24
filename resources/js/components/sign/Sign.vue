<template>
  <div>
    <v-card>
      <show-sign  v-if="sign" @cancel="$emit('cancel')"/>
      <not-sign v-else @cancel="$emit('cancel')"/>
    </v-card>
  </div>
</template>
<script>
import NotSignStill from './NotSignStill.vue'
import ShowSign from './ShowSign.vue'
 export default {
  mounted(){
    },
  components:{
    'not-sign':NotSignStill,
    'show-sign':ShowSign,
  },
  data () {
      return {
        sign:''
      };
    },
  computed: {
  },
  methods: {
    add(){
      console.log('agregar')
    }
  },
  created(){
      this.sign= this.$store.getters.currentUser.sign;
    }
 }
</script>