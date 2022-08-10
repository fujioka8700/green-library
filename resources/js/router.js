import Vue from 'vue';
import VueRouter from 'vue-router';

import PlantsList from './components/pages/PlantsList';
import Login from './components/pages/Login';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: PlantsList
  },
  {
    path: '/login',
    component: Login
  }
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
