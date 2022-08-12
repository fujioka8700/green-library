import Vue from 'vue';
import VueRouter from 'vue-router';

import PlantsList from './components/pages/PlantsList';
import Login from './components/pages/Login';
import Register from './components/pages/Register';
import SystemError from './components/pages/errors/System';

import store from './store';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: PlantsList,
  },
  {
    path: '/login',
    component: Login,
    beforeEnter: (to, from, next) => {
      if (store.getters['auth/check']) {
        next('/');
      } else {
        next();
      }
    },
  },
  {
    path: '/register',
    component: Register,
    beforeEnter: (to, from, next) => {
      if (store.getters['auth/check']) {
        next('/');
      } else {
        next();
      }
    },
  },
  {
    path: '/500',
    component: SystemError,
  },
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
