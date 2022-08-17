import Vue from 'vue';
import VueRouter from 'vue-router';

import PlantsList from './components/pages/PlantsList';
import PlantStore from './components/pages/PlantStore';
import Login from './components/pages/Login';
import Register from './components/pages/Register';
import SystemError from './components/pages/errors/System';
import NotFound from './components/pages/errors/NotFound';

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
    path: '/store',
    component: PlantStore,
  },
  {
    path: '/500',
    component: SystemError,
  },
  {
    path: '*',
    component: NotFound,
  },
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
