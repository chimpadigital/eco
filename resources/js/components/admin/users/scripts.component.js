export default {
    props: ["routePerfil"],
    data() {
        return {
            users: [
                {
                    id: 1,
                    nombre: "NombreVue",
                    apellido: "ApellidoVue",
                    email: "corre@vue",
                    telefono: "0230123",
                    pais: "Chile",
                    descuento: "PROMOECO",
                    primerSesion: "10/23/2020",
                    segundaSesion: "01/24/2020"
                }
            ]
        };
    },
    methods: {
        redirecAPerfil(item) {
            this.$store.commit("setIdPerfil", item.id);
            location.href =
                this.routePerfil +
                "?user=" +
                item.nombre.trim() +
                item.apellido.trim();
        }
    }
};
