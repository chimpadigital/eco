import Vue from "vue";
import Vuex from "vuex";
import VuexPersist from "vuex-persist";

const vuexLocalStorage = new VuexPersist({
    key: "vuex", // The key to store the state on in the storage provider.
    storage: window.localStorage // or window.sessionStorage or localForage
    // Function that passes the state and returns the state with only the objects you want to store.
    // reducer: state => state,
    // Function that passes a mutation and lets you decide if it should update the state in localStorage.
    // filter: mutation => (true)
});

Vue.use(Vuex);

const store = new Vuex.Store({
    plugins: [vuexLocalStorage.plugin],
    state: {
        count: 1,
        perfil: {
            id: null
        }
    },
    getters: {
        perfil: state => {
            return state.perfil;
        },
        page: state => {
            return state.count;
        }
    },

    mutations: {
        setIdPerfil(state, payload) {
            state.perfil.id = payload;
        },
        nextPage(state, payload) {
            state.count = payload;
        }
    }
});

export default store;
