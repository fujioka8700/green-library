import Vue from 'vue';
import VueRouter from 'vue-router';

import PlantsList from './components/pages/PlantsList';
import Login from './components/pages/Login';
import Register from './components/pages/Register';
import SystemError from './components/pages/errors/System';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: PlantsList,
  },
  {
    path: '/login',
    component: Login,
  },
  {
    path: '/register',
    component: Register,
  },
  {
    path: '/500',
    component: SystemError,
  }
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
