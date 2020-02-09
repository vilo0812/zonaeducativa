//importamos las vistas del Home
import NotFound from './views/NotFound.vue';
import Home from './views/Home.vue';
import GestionVisits from './views/GestionVisits.vue';
import ControllerDepenci from './views/ControllerDepenci.vue';
import ViewVisits from './views/ViewVisits.vue';
import RegisterVisits from './views/RegisterVisits.vue';
/*start componentes que gestionan a los administradores*/
import RegisterAdmin from './views/RegisterAdmin.vue';
import ShowAdmin from './views/ShowAdmin.vue';
import EditingAdmin from './views/EditingAdmin.vue';
/*end componentes que gestionan a los administradores*/
export const routes = [
  /*
   |--------------------------------------------------------------------------
   | ruta de inicio
   |--------------------------------------------------------------------------|
   */
   {
    path:'*',
    component:NotFound,
  },
  {//ruta para hacer login
    path:'/',
    component:Home,
    name:'Login'
  },
   /*
   |--------------------------------------------------------------------------
   | rutas para el super administrador
   |--------------------------------------------------------------------------|
   */
  {
    path:'/gestions',
    component:GestionVisits,
    name:'Gestion',
    meta:{
      requiresAuth: true
    }
  },
  {
    path:'/registerVisits',
    component:RegisterVisits,
    name:'register-visits',
    meta:{
      requiresAuth: true
    }
  },
  {
    path:'/visits',
    component:ViewVisits,
    name:'view-visits',
    meta:{
      requiresAuth: true
    }
  },
/*start manegador de administradores*/
  /*start registrar administrador*/
  {
    path:'/registerAdmin',
    component:RegisterAdmin,
    name:'register-admin',
    meta:{
      requiresAuth: true,
      requiresAuthSuperAdmin: true,
    }
  },
  {
    path:'/dependecies',
    component:ControllerDepenci,
    name:'controller-dependenci',
    meta:{
      requiresAuth: true,
      requiresAuthSuperAdmin: true,
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
      requiresAuth: true
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
      requiresAuth: true
    }
  },
  /*end editar el adiministrador*/
/*manejador de administradores*/
]