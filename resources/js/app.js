require("./bootstrap");

import Vue from "vue";
// import Vuex
import store from "./store/store";

import AdminUsers from "./components/admin/users";

Vue.component("admin-users", AdminUsers);

const App = new Vue({
    el: "#app",
    store
});
