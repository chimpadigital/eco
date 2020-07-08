// import DatePicker from "vue2-datepicker";
// import "vue2-datepicker/index.css";
import moment from "moment";
export default {
    // components: { DatePicker },
    props: ["routePerfil"],
    data() {
        return {
            countries: [],
            data: {
                procesoSesion: {
                    pago: false,
                    descuento: false,

                    primerSesionFecha: "",
                    primerSesion: false,

                    segunSesionFecha: "",
                    segunSesion: false,

                    condicionesGenerales: false,
                    acuerdoConfidencialidad: false
                },
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
                informacionExtra: "",
                encuestaUser: {
                    how_did_you_know_manual: "",
                    process_download: "",
                    virtual_assists_boolean: "",
                    virtual_assists: "",
                    call_time_boolean: "",
                    call_time: "",
                    quality_advice_boolean: "",
                    quality_advice: "",
                    attention: "",
                    suggestions: "",
                    content_option_1: "",
                    content_option_2: "",
                    content_option_3: "",
                    content_option_4: "",
                    content_option_5: "",
                    content_option_6: "",
                    chapter_1: "",
                    chapter_2: "",
                    chapter_3: "",
                    chapter_4: "",
                    chapter_5: "",
                    chapter_6: "",
                    chapter_7: "",
                    chapter_8: "",
                    satisfied: "",
                    suggestions_2: "",
                    would_you_recommend: "",
                    like: ""
                }
            }
        };
    },
    methods: {
        changeOng() {
            this.data.otraInfo.ong = !this.data.otraInfo.ong;
        },
        changeImplementacion() {
            this.data.otraInfo.ImplementacionAnt = !this.data.otraInfo
                .ImplementacionAnt;
        },
        perdirDatosPerfil() {
            axios
                .post(this.routePerfil, {
                    id: this.$store.getters.perfil.id
                })
                .then(res => {
                    this.data = res.data;
                });
        },
        getCountries() {
            axios.post(this.routePerfil + "/countries").then(res => {
                this.countries = res.data;
            });
        },
        asistenciaFirstSesion() {
            alert(this.data.primerSesion);
        },
        guardar() {
            axios
                .post(this.routePerfil + "/update", {
                    id: this.$store.getters.perfil.id,
                    data: this.data
                })
                .then(res => {
                    if (res.data.success) {
                        this.perdirDatosPerfil();
                        this.$notify({
                            group: "userInforSave",
                            title: "Exito!",
                            text: "Usuario Actualizado Exitosamente!"
                        });
                    }
                });
        }
    },
    mounted() {
        this.perdirDatosPerfil();
        this.getCountries();
    }
};
