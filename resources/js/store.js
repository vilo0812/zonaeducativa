export default{
    state:{
      //variables del home
      registrar:false,
      login:true,
      recuperar:false
    },
    mutations:{
      //mutaciones del home
      ActivarRegistrar(state){
      state.registrar = true
      state.login = false
      },
      ActivarLogin(state){
        state.registrar = false
        state.recuperar = false
        state.login = true
      },
      ActivarRecuperar(state){
        state.login = false
        state.recuperar = true
      }
    },
    getters:{},
    actions:{}
}
