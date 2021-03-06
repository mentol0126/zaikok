import Vue from 'vue'
import Vuex from 'vuex'
import actions from './actions'
import mutations from './mutations'
import getters from './getters'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    isGuest: true,
    csrf: '',
    token: '',
    user: null,
    inventories: [],
    inventoryGroups: [],
    currentInventoryGroupId: 1,
    verifyToken: 1111,
  },
  actions,
  mutations,
  getters,
})
