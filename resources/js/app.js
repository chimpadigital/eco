require("./bootstrap");

import Vue from "vue";
// import Vuex
import store from "./store/store";
// Notificaciones
import Notifications from "vue-notification";
Vue.use(Notifications);

import AdminUsers from "./components/admin/users";
import AdminUsersPerfil from "./components/admin/perfil";

Vue.component("admin-users", AdminUsers);
Vue.component("admin-perfil", AdminUsersPerfil);

const App = new Vue({
    el: "#app",
    store
});
