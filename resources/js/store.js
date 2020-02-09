/*start traemos al usaurio de el local storage si es que existe*/
import {getLocalUser} from './helpers/auth.js';
const user = getLocalUser();
/*end traemos al usaurio de el local storage si es que existe*/
export default{
    state:{
        currentUser:user,
        isLoggedIn: !!user,
        loading:false,
        auth_error:null,
        customers:[]
    },
    mutations:{
      login(state){
            state.loading =true;
            state.auth_error =null;
        },
        loginSuccess(state,payload){
            state.auth_error = null;
            state.isLoggedIn = true;
            state.loading = false;
            state.currentUser = Object.assign({},payload.user,{token: payload.access_token});
            localStorage.setItem("user",JSON.stringify(state.currentUser));
        }
    },
    getters:{},
    actions:{}
}
