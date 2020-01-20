
import './bootstrap'

import Vue from 'vue'
import Vuex from 'vuex'
import StoreData from './store'
import {routes} from './routes'
import VueRouter from 'vue-router'
import vuetify from './plugins/vuetify'
import App from './App.vue'
/*start otras librerias*/
import swal from 'sweetalert';//para algunas alertas
/*end otras librerias*/

Vue.use(VueRouter)
Vue.use(Vuex)

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
  routes,
  mode:'history'
});
router.beforeEach((to, from, next) => {	
	let autorizacion = to.matched.some(record => record.meta.authSuperAdmin);
	if(autorizacion){
	next()
	}else{
	next()
	}
	// let autorizacion = to.matched.some(record => record.meta.auth);
	// let usuario = admin;
	// let autorizacion = to.matched.some(record => record.meta.autentificado);
	// if(autorizacion && !usuario){
	// 	next('/')
	// } else if(!autorizacion && usuario){
	// 	next('/')
	// }else{
	// 	next()
	// }
})
const app = new Vue({
  router,
  store,
  vuetify,
  el: '#app',
  render: (h) => h(App)
});
