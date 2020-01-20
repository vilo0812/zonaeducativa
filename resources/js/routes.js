//importamos las vistas del Home
import Home from './views/Home.vue';
import Welcome from './views/WelcomeSuperAdmin.vue';
import WelcomeAdmin from './views/WelcomeAdmin.vue';
import RegisterAdmin from './views/RegisterAdmin.vue';
import ControllerDepenci from './views/ControllerDepenci.vue';
import RegisterVisits from './views/RegisterVisits.vue';
import ViewVisits from './views/ViewVisits.vue';
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
    path:'/welcome',
    component:Welcome,
    name:'Welcome',
    meta:{
      authSuperAdmin:true
    }
  },
  {
    path:'/registerAdmin',
    component:RegisterAdmin,
    name:'register-admin',
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