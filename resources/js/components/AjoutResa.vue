<template>
    <div style="font-size: 12px !important;">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".exampleModal"
                data-whatever="@mdo">Reservation
        </button>

        <div class="modal fade exampleModal" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="nom_passager" class="col-form-label">Passager:</label>
                                <input type="text" class="form-control" id="nom_passager" v-model="passager">
                            </div>

                            <div class="form-group">
                                <label for="depart" class="col-form-label">Depart de:</label>
                                <input type="text" class="form-control" id="depart" v-model="depart">
                            </div>
                            <div class="form-group">
                                <label for="destination" class="col-form-label">Arrivée a:</label>
                                <input type="text" class="form-control" id="destination" v-model="destination">
                            </div>
                            <div class="form-group">
                                <label for="date_resa" class="col-form-label">Date:</label>
                                <input class="form-control" id="date_resa" type="date" v-model="date_resa">
                            </div>
                            <div class="form-group">
                                <label for="heure_resa" class="col-form-label">Heure:</label>
                                <input class="form-control" id="heure_resa" type="time" v-model="heure_resa">
                            </div>
<!--                            <div v-model="resa">{{resa}}</div>-->
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" @click.prevent="save">Enregistrer</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AjoutResa",
        data() {
            return {
                resa: [{
                    passager: 'moi',
                    depart: 'Yaounde',
                    destination: 'Douala',
                    date_resa: (new Date()).getDay(),
                    heure_resa: (new Date()).getHours()
                }],
                passager: '',
                depart: '',
                destination: '',
                date_resa: '',
                heure_resa: '',

            }
        },
        methods: {
            save() {
                this.resa.pop();
                this.resa.push({
                    passager: this.passager,
                    depart: this.depart,
                    destination: this.destination,
                    date_resa: this.date_resa,
                    heure_resa: this.heure_resa

                });
                this.passager = '';
                this.depart = '';
                this.destination = '';
                this.date_resa = '';
                this.heure_resa = '';
                console.log(this.resa[0]);
                axios.post('/reservations', this.resa[0],{
                    headers:{
                        "Content-Type":"application/json"
                    }
                }).then(response => {
                    console.log(response.data);
                    this.$forceUpdate();
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>