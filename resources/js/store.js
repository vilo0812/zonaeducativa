/*start traemos al usaurio de el local storage si es que existe*/
import {getLocalUser} from './helpers/auth.js';
const user = getLocalUser();
/*end traemos al usaurio de el local storage si es que existe*/
export default{
    state:{
        currentUser:user,
        isLoggedIn: !!user,
        loading:false,
        email:''
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
        },
        loginFailed(state, payload){
            state.loading = false;
            state.auth_error = payload.error;
        }
        ,logout(state){
            localStorage.removeItem("user");
            state.isLoggedIn = false;
            state.currentUser = null;
        },
        passwordRecover(state, payload){
            state.email = payload;
        },
        emailNull(state){
            state.email = null;
        }
    },
    getters:{
        isLoading(state){
            return state.loading;
        },
        isLoggedIn(state){
            return state.isLoggedIn;
        },
        currentUser(state){
            return state.currentUser;
        },
    },
    actions:{}
}
