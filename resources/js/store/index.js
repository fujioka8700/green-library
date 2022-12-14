import Vue from 'vue';
import Vuex from 'vuex';

import auth from './auth';
import error from './error';
import plant from './plant';

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    auth,
    error,
    plant,
  }
});

export default store;
