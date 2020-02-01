//importamos las vistas del Home
import Home from './views/Home.vue';
import GestionVisits from './views/GestionVisits.vue';
import WelcomeAdmin from './views/WelcomeAdmin.vue';
import ControllerDepenci from './views/ControllerDepenci.vue';
import ViewVisits from './views/ViewVisits.vue';
import RegisterVisits from './views/RegisterVisits.vue';
/*start componentes que gestionan a los administradores*/
import RegisterAdmin from './views/managingAdmin/RegisterAdmin.vue';
import ShowAdmin from './views/managingAdmin/ShowAdmin.vue';
import EditingAdmin from './views/managingAdmin/EditingAdmin.vue';
/*end componentes que gestionan a los administradores*/
export const routes = [
  /*
   |--------------------------------------------------------------------------
   | ruta de inicio
   |--------------------------------------------------------------------------|
   */
   {
    path:'*',
    component:Home,
  },
  {
    path:'/home',
    component:Home,
    name:'Home'
  },
   /*
   |--------------------------------------------------------------------------
   | rutas para el super administrador
   |--------------------------------------------------------------------------|
   */
  {
    path:'/Gestion',
    component:GestionVisits,
    name:'Gestion',
    meta:{
      authSuperAdmin:true
    }
  },
  {
    path:'/dependecies',
    component:ControllerDepenci,
    name:'controller-dependenci',
    meta:{
      authSuperAdmin:true
    }
  },
  {
    path:'/registerVisits',
    component:RegisterVisits,
    name:'register-visits',
    meta:{
    }
  },
  {
    path:'/visits',
    component:ViewVisits,
    name:'view-visits',
    meta:{
    }
  },
/*start manegador de administradores*/
  /*start registrar administrador*/
  {
    path:'/registerAdmin',
    component:RegisterAdmin,
    name:'register-admin',
    meta:{
      authSuperAdmin:true
    }
  },
  /*end registrar administrador*/
  /*start mostrar el perfil de administrador*/
  {
    path:'/showAdmin/:id',
    component:ShowAdmin,
    name:'show-admin',
    props: true,
    meta:{
    }
  },
  /*end mostrar el perfil de administrador*/
  /*start editar el adiministrador*/
  {
    path:'/editingAdmin/:id',
    component:EditingAdmin,
    name:'editing-admin',
    props: true,
    meta:{
    }
  },
  /*end editar el adiministrador*/
/*end manegador de administradores*/
   /*
   |--------------------------------------------------------------------------
   | rutas para el administrador
   |--------------------------------------------------------------------------|
   */
  {
    path:'/admin/welcome',
    component:WelcomeAdmin,
    name:'WelcomeAdmin',
    meta:{
    }
  },

]