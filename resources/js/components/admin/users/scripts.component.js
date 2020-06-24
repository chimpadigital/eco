const url = "/admin/users/";
export default {
    props: ["routePerfil"],
    data() {
        return {
            typeFiltro: 1,
            search: "",
            users: []
        };
    },
    methods: {
        filtrarUsers() {
            this.getUsers(this.typeFiltro, this.search);
        },
        getUsers(typeFiltro, search) {
            axios
                .post(url + "list-users", {
                    typeFiltro: typeFiltro,
                    search: search
                })
                .then(res => {
                    this.users = res.data.users;
                });
        },
        redirecAPerfil(item) {
            this.$store.commit("setIdPerfil", item.id);
            location.href =
                this.routePerfil +
                "?user=" +
                item.nombre.trim() +
                item.apellido.trim();
        },
        eliminarUsuario(item) {
            axios
                .post(url + "delete-user", {
                    id: item.id
                })
                .then(res => {
                    this.getUsers(this.typeFiltro, this.search);
                });
        }
    },
    mounted() {
        this.getUsers(this.typeFiltro, this.search);
    }
};
