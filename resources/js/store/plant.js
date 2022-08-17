import {
  CREATED,
  UNPROCESSABLE_ENTITY,
} from "../util";

const state = {
  apiStatus: null,
  storeErrorMessages: null,
};

const mutations = {
  setApiStatus(state, status) {
    state.apiStatus = status;
  },
  setStoreErrorMessages(state, messages) {
    state.storeErrorMessages = messages;
  },
};

const actions = {
  async store(context, data) {
    context.commit('setApiStatus', null);
    const response = await axios.post('/api/plants', data);

    if (response.status === CREATED) {
      context.commit('setApiStatus', true);
      return false;
    }

    context.commit('setApiStatus', false);
    if (response.status === UNPROCESSABLE_ENTITY) {
      context.commit('setStoreErrorMessages', response.data.errors);
    } else {
      context.commit('error/setCode', response.status, {
        root: true,
      });
    }
  },
};

export default {
  namespaced: true,
  state,
  mutations,
  actions,
}
