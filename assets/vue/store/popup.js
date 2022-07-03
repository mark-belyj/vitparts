export default {
    state () {
        return {
            isActiveAddDetail: false
        }
    },
    mutations: {
        set(state, { field, val }) {
            state[field] = val;
        }
    },
    actions: {
        showClosePopup({ commit, state }, name) {
            console.log('zzz')
            commit('set', {field: name, val: !state[name]})
        }
    }
}
