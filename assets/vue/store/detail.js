import axios from "axios";

export default {
    state () {
        return {
            details: 0
        }
    },
    mutations: {
      set(state, { field, val }) {
          state[field] = val;
      }
    },
    actions: {
         async getDetails({ commit }) {
            try {
                let response = await axios('/api/');
                commit('set', {field: 'details', val: response.data})
            } catch (e) {
                console.error(e)
            }
        }
    }
}
