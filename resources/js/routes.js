//importamos las vistas del Home
import NotFound from './views/NotFound.vue';
import Home from './views/Home.vue';
import Login from './components/home/Login.vue';
import PasswordRecover from './components/home/PasswordRecover.vue';
import Code from './components/home/Code.vue';
import newPassword from './components/home/NewPassword.vue';
import GestionVisits from './views/GestionVisits.vue';
import ControllerDepenci from './views/ControllerDepenci.vue';
import ViewVisits from './views/ViewVisits.vue';
import RegisterVisits from './views/RegisterVisits.vue';
/*start componentes que gestionan a los administradores*/
import RegisterLeaderZone from './views/RegisterLeaderZone.vue';
import ViewLeadersZone from './views/ViewLeadersZone.vue';
import RegisterAdmin from './views/RegisterAdmin.vue';
import ShowAdmin from './views/ShowAdmin.vue';
import EditUser from './views/EditUser.vue';
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
    name:'Home',
    children:[
      {
      path:'/',
      component: Login,
      name:'Login',
      },
      {
      path:'/passwordRecover',
      component: PasswordRecover,
      name:'PasswordRecover',
      },
      {
      path:'/code',
      component: Code,
      name:'Code',
      },
      {
      path:'/newPassword',
      component: newPassword,
      name:'newPassword',
      }
    ]
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
    path:'/registerLeaderZone',
    component:RegisterLeaderZone,
    name:'register-leader-zone',
    meta:{
      requiresAuth: true,
      requiresAuthSuperAdmin: true,
    }
  },
  {
    path:'/viewLeadersZone',
    component:ViewLeadersZone,
    name:'view-leader-zone',
    meta:{
      requiresAuth: true,
      requiresAuthSuperAdmin: true,
    }
  },
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
      requiresAuth: true,
    }
  },
  /*end mostrar el perfil de administrador*/
  /*start editar usuario*/
  {
    path:'/EditUser/:id',
    component:EditUser,
    name:'edit-user',
    props: true,
    meta:{
      requiresAuth: true,
    }
  },
  /*end editar usuario*/
/*manejador de administradores*/
]