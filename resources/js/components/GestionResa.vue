<template>
    <div class="col-md-12">
        <h2 style="text-align:center;margin: 25px auto">Mes Reservations <ajout-resa  style="float: right" ></ajout-resa></h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Numero</th>
                <th scope="col">Passager</th>
                <th scope="col">Date</th>
                <th scope="col">Heure</th>
                <th scope="col" colspan="2">Actions</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="resa in reservations">
                <th scope="row">{{resa.id}}</th>
                <td>{{resa.numero}}</td>
                <td>{{resa.nom_prenom}}</td>
                <td>{{resa.date}}</td>
                <td>{{resa.heure}}</td>
<!--                <td><a href="#" style="color: red;font-size: 15px" title="Annuler" data-toggle="modal" data-target=".cancel"><i class="fa fa-times " aria-hidden="true"></i></a>-->
                <td style="text-align:center">
                    <a href="#" style="color: red;font-size: 15px" title="Annuler" @click.prevent="cancelresa(resa)" v-show="resa.statut=='en attente'"><i class="fa fa-times " aria-hidden="true"></i></a>
                    <span class="badge " :class="resa.statut=='confirme'?'badge-success':'badge-danger'" v-show="resa.statut!='en attente'">{{test=resa.statut}}</span>
                    <a href="#" style="color: #0c8025;font-size: 15px; float:right" title="Confirmer" @click.prevent="confirmresa(resa)" v-show="resa.statut=='en attente'"><i class="fa fa-check " aria-hidden="true"></i></a>


                </td>
            </tr>

            </tbody>
        </table>

        <div class="modal1">

            <!-- Small modal -->
<!--            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".confirm">Small modal</button>-->
            <div class="modal fade bd-example-modal-sm confirm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="CancelModalLabel">Confirmation</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Etes-vous sûrs?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                            <button type="button" class="btn btn-success" @click.prevent="confirmresa(resa)">Confirmer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        name: "GestionResa",
        data(){
            return{
                reservations:[],
            }
        },
        created(){
            this.fetchresa();
        },
        methods:{
            fetchresa(){
                axios.get('/reservations').then((response) => {
                    this.reservations = response.data;
                },(error)=>{console.log(error)});
            },
            cancelresa(resa){
                axios.delete('/reservations/'+resa.id, resa,{
                    headers:{
                        "Content-Type":"application/json"
                    }
                }).then(response => {
                    console.log(response.data);
                }).catch(error => {
                    console.log(error);
                });
                location.reload();
            },
            confirmresa(resa){
                axios.put('/reservations/'+resa.id, resa,{
                    headers:{
                        "Content-Type":"application/json"
                    }
                }).then(response => {
                    console.log(response.data);
                }).catch(error => {
                    console.log(error);
                });
                location.reload();
            }
        },
    }
</script>

<style scoped>

</style>