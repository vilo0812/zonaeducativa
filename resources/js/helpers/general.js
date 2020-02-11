/*start funcion que hace la autenticacion de cada ruta*/
export function initialize(store,router){
router.beforeEach((to,from,next) =>{//funcion que exije vue routes y que no entiendo muy bien
	const requiresAuth = to.matched.some(record => record.meta.requiresAuth);//devuelve true si la ruta tiene activado el meta requiresAuth
	const requiresAuthSuperAdmin = to.matched.some(record => record.meta.requiresAuthSuperAdmin);//devuelve true si la ruta tiene activado el meta requiresAuth
	const currentUser = store.state.currentUser;//devulve el usuario de la sesion
	if(requiresAuth && !currentUser){//comparamos si la ruta necesita autorizacion, pero no hay usuario sera redirigido a /login
		next('/');
	}
	else if(requiresAuthSuperAdmin && currentUser.rol_id != 1){//comparamos si la ruta si fue logeado y ademas es super admin,
		next('/');
	}
	else if (to.path == '/' && currentUser){//siii, intenta ir a login, pero el ya inicio sesion entonces lo mandamos a la pagina principal dentro del sistema
		next('/gestions');
	}else{//de otro modo puede entrar a la ruta normalmente
		next();
	}
})
/*end funcion que hace la autenticacion de cada ruta*/
/*start funciones basicas de el axios*/
/*start funcion que me mandara al login si se acaba la sesion y intento utilizar un axios*/
axios.interceptors.response.use(null,(error)=>{
	if(error.response.status == 404){
		store.commit('logout');
		router.push('/');
	}
	if(error.response.status == 401){
		store.commit('logout');
		router.push('/');
	}
	return Promise.reject(error);
});
/*end funcion que me mandara al login si se acaba la sesion y intento utilizar un axios*/
/*start funcion que le coloca a cada peticion axios que yo realiza en el sistema un token creando todas las apis protegidas*/
if(store.getters.currentUser){
axios.defaults.headers.common["authorization"] = `Bearer ${store.getters.currentUser.token}`
}
/*end funcion que le coloca a cada peticion axios que yo realiza en el sistema un token creando todas las apis protegidas*/
/*end funciones basicas de el axios*/
}