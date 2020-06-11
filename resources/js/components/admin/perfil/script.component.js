export default {
    props: ["routePerfil"],
    data() {
        return {
            data: {
                inforPerfil: {
                    nombre: "",
                    apellido: "",
                    email: "",
                    telefono: "",
                    fechaNacimiento: "",
                    ciudad: "",
                    pais: "",
                    ocupacion: "",
                },
                redes: {
                    facebook: "",
                    linkedin: "",
                    instagram: "",
                    otras: " ",
                },
                sobreFundacion: {
                    motivacion: "",
                    conociasFundacion: "",
                },
                cladeDeInpacto: "",
                informacionExtra: "",
            },
        };
    },
    methods: {
        perdirDatosPerfil() {
            axios
                .post(this.routePerfil, {
                    id: this.$store.getters.perfil.id,
                })
                .then((res) => {
                    this.data = res.data;
                });
        },
    },
    mounted() {
        this.perdirDatosPerfil();
    },
};
