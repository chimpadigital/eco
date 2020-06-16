const url = "/admin/users/";
export default {
    props: ["routePerfil"],
    data() {
        return {
            typeFiltro: "",
            search: "",
            users: []
        };
    },
    methods: {
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
        }
    },
    mounted() {
        this.getUsers(this.typeFiltro, this.search);
    }
};
