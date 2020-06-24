export default {
    props: ["routePromo"],
    data() {
        return {
            promos: []
        };
    },
    methods: {
        getPromo() {
            axios.post(this.routePromo).then(res => {
                this.promos = res.data;
            });
        },
        agregarPromo() {
            this.promos.push({
                id: "0",
                code_name: "",
                expiration_date: "",
                amount: "",
                quantity_applied: "",
                state: true
            });
        },
        cambiarStado(promo, i) {
            this.promos[i].state = !this.promos[i].state;
        },
        eliminarPromo(promo, i) {
            axios
                .post(this.routePromo + "/delete", { id: promo.id })
                .then(res => {
                    console.log(res.data);
                });
            this.promos.splice(i, 1);
        },

        guardarPromo() {
            this.$notify({
                group: "InforSave",
                title: "Exito",
                text: "Se ha guardado exitosamente!"
            });
            axios
                .post(this.routePromo + "/store", this.$data.promos)
                .then(res => {
                    console.log(res.data);
                });
        }
    },
    mounted() {
        this.getPromo();
    }
};
