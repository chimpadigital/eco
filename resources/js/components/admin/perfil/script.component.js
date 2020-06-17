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
                    ocupacion: ""
                },
                redes: {
                    facebook: "",
                    linkedin: "",
                    instagram: "",
                    otras: " "
                },
                sobreFundacion: {
                    motivacion: "",
                    conociasFundacion: ""
                },
                otraInfo: {
                    ong: "",
                    nombreOgn: "",
                    paginaWeb: "",
                    aliadosParaImplementar: "",
                    ImplementacionAnt: "",
                    ImplementacionName: ""
                },
                claseDeImpacto: "",
                informacionExtra: ""
            }
        };
    },
    methods: {
        perdirDatosPerfil() {
            axios
                .post(this.routePerfil, {
                    id: this.$store.getters.perfil.id
                })
                .then(res => {
                    this.data = res.data;
                });
        },
        guardar() {
            axios
                .post(this.routePerfil + "/update", {
                    id: this.$store.getters.perfil.id,
                    data: this.data
                })
                .then(res => {
                    if (res.data.sucess) {
                        this.$notify({
                            group: "userInforSave",
                            title: "Exito!",
                            text: "Usuario Actualizado Exitosamente!"
                        });
                        this.perdirDatosPerfil();
                    }
                });
        }
    },
    mounted() {
        this.perdirDatosPerfil();
    }
};
