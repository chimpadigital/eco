require("./bootstrap");

import Vue from "vue";
// import Vuex
import store from "./store/store";
// Notificaciones
import Notifications from "vue-notification";
Vue.use(Notifications);

// Componentes Admin Users
import AdminUsers from "./components/admin/users";
import AdminUsersPerfil from "./components/admin/perfil";
Vue.component("admin-users", AdminUsers);
Vue.component("admin-perfil", AdminUsersPerfil);

//Componentes Admin PromoCode
import AdminPromo from "./components/admin/promo";
Vue.component("admin-promo", AdminPromo);

const App = new Vue({
    el: "#app",
    store
});
