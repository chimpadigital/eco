import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        count: 0,
        perfil: {
            id: null
        }
    },
    getters: {},

    mutations: {
        setIdPerfil(state, payload) {
            state.perfil.id = payload;
        }
    }
});

export default store;
