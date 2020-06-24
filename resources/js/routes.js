//importamos las vistas del Home
import NotFound from './views/NotFound.vue';
import Home from './views/Home.vue';
import Login from './components/home/Login.vue';
import PasswordRecover from './components/home/PasswordRecover.vue';
import Code from './components/home/Code.vue';
import newPassword from './components/home/NewPassword.vue';
/*start componentes que gestionan a los administradores*/
import GestionVisits from './views/GestionVisits.vue';
import ControllerDepenci from './views/ControllerDepenci.vue';
import ViewVisits from './views/ViewVisits.vue';
import RegisterVisits from './views/RegisterVisits.vue';
/*end componentes que gestionan a los administradores*/
import RegisterLeaderZone from './views/RegisterLeaderZone.vue';
import ViewUsers from './views/ViewUsers.vue';
import RegisterAdmin from './views/RegisterAdmin.vue';
import ShowAdmin from './views/ShowAdmin.vue';
import EditUser from './views/EditUser.vue';
import Tickets from './views/GestionTickets.vue';
import Bitacores from './views/Bitacores.vue';
import ShowBitacore from './views/ShowBitacore.vue';
import CheckingTicket from './views/CheckingTicket.vue';
import Backup from './views/Backup.vue';
import Backup2 from './components/backup/Backup.vue';
import BackupFact from './components/backup/BackupFact.vue';
import BackupSecurityCopy from './components/backup/BackupSecurityCopy.vue';
import Sign from './components/sign/Sign.vue';
import AddSign from './components/sign/AddSign.vue';
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
  {
    path:'/gestions',
    component:GestionVisits,
    name:'gestion-visit',
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
    path:'/viewUsers',
    component:ViewUsers,
    name:'view-users',
    meta:{
      requiresAuth: true,
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
  {
    path:'/tickets',
    component:Tickets,
    name:'gestion-ticket',
    meta:{
      requiresAuth: true,
    }
  },
  {
    path:'/bitacores',
    component:Bitacores,
    name:'view-bitacores',
    meta:{
      requiresAuth: true,
      requiresAuthSuperAdmin: true,
    }
  },
  {
    path:'/showBitacore/:id',
    component:ShowBitacore,
    name:'show-bitacore',
    props: true,
    meta:{
      requiresAuth: true,
      requiresAuthSuperAdmin: true,
    }
  },
  /*end registrar administrador*/
  /*start restaurar sistema*/
  {
    path:'/RestaurarSistema',
    component:Backup,
    name:'backup',
    meta:{
      requiresAuth: true,
      requiresAuthSuperAdmin: true,
    },
    children:[
      {
      path:'/',
      component: Backup2,
      name:'backup-index',
      },
      {
      path:'/RestaurarSistema/BackupFactory',
      component: BackupFact,
      name:'backup-fact',
      },
      {
      path:'/RestaurarSistema/SecurityCopy',
      component: BackupSecurityCopy,
      name:'backup-security-copy',
      },
    ]
  },
  /*end restaurar sistema*/
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
    },
    children:[
      {
      path:'/EditUser/:id',
      component: Sign,
      props: true,
      name:'sign',
      },
      {
      path:'/EditUser/:id/AddSign',
      component: AddSign,
      name:'add-sign',
      },
    ]
  },
  /*end editar usuario*/
  /*start checkear ticket*/
  {
    path:'/VerificarTicket',
    component:CheckingTicket,
    name:'check-ticket',
    meta:{
      requiresAuth: true,
    }
  },
  /*end checkear ticket*/
/*manejador de administradores*/
]