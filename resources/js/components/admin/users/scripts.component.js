const url = "/admin/users/";
export default {
    props: ["routePerfil"],
    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        //Calcula los elementos de la paginación
        pagesNumber: function() {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + this.offset * 2;
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    data() {
        return {
            typeFiltro: 1,
            search: "",
            users: [],
            pagination: {
                total: 0,
                current_page: 0,
                per_page: 0,
                last_page: 0,
                from: 0,
                to: 0
            },
            offset: 3
        };
    },
    methods: {
        filtrarUsers() {
            this.getUsers(this.typeFiltro, this.search);
        },
        cambiarPagina(page) {
            let me = this;
            //Actualiza la página actual
            me.pagination.current_page = page;
            //Envia la petición para visualizar la data de esa página
            this.$store.commit("nextPage", page);
            me.getUsers(this.typeFiltro, this.search);
        },
        getUsers(typeFiltro, search) {
            let page = this.$store.getters.page;
            axios
                .post(url + "list-users", {
                    typeFiltro: typeFiltro,
                    search: search,
                    page: page
                })
                .then(res => {
                    this.pagination = res.data.pagination;
                    this.users = res.data.users.data;
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
            Swal.fire({
                title: "Confirmar",
                text: "Esta seguro de eliminar este usuario?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si eliminar!"
            }).then(result => {
                if (result.value) {
                    axios
                        .post(url + "delete-user", {
                            id: item.id
                        })
                        .then(res => {
                            this.$notify({
                                group: "userdelete",
                                title: "Exito!",
                                text: "Usuario Eliminado Exitosamente!"
                            });
                            this.getUsers(this.typeFiltro, this.search);
                        });
                }
            });
        }
    },
    mounted() {
        this.getUsers(this.typeFiltro, this.search);
    }
};
