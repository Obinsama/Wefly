<template>
    <div class="col-md-12" :key="componentKey" @myevent="forceRerender">
        <h2 style="text-align:center;margin: 25px auto">Liste des vols  <ajout-resa  style="float: right" ></ajout-resa></h2>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Aéroport de Départ</th>
                <th scope="col">Aéroport d'arrivée</th>
                <th scope="col">Date de départ</th>
                <th scope="col">Heure de départ</th>
                <th scope="col">Date d'arrivée</th>
                <th scope="col">Heure d'arrivée</th>
                <th scope="col">Etat</th>
            </tr>
            </thead>
            <tbody>
<!--            <tr v-for="vol in this.vols" @click.prevent="deletevol(vol)" data-toggle="modal" data-target=".action">-->
            <tr v-for="vol in this.vols" @click.prevent="deletevol(vol)" >
                <th scope="row">{{vol.id}}</th>
                <td>{{vol.aeroport_dep}}</td>
                <td>{{vol.aeroport_arr}}</td>
                <td>{{vol.date_dep}}</td>
                <td>{{vol.heure_dep}}</td>
                <td>{{vol.date_arr}}</td>
                <td>{{vol.heure_arr}}</td>
                <td><span class="badge " :class="vol.statut=='closed'?'badge-danger':'badge-success'" >{{test=vol.statut}}</span></td>

            </tr>
            <div class="modal2">

                <!-- Small modal -->
                <!--            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cancel">cancel</button>-->
                <div class="modal fade bd-example-modal-sm action" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="ConfirmModalLabel">Annulation</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Etes-vous sûrs?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>

                                <button type="button" class="btn btn-danger" @click.prevent="cancelresa(resa)">Annuler</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "GestionVols",
        data(){
            return {
                vols:[{
                    id:1,
                    aeroport_dep:'Yaounde',
                    aeroport_arr:'Douala',
                    date_dep:(new Date()),
                    heure_dep:(new Date()).getHours()+'h '+(new Date()).getMinutes()+'m',
                    date_arr:(new Date()),
                    heure_arr:(new Date()).getHours()+'h '+(new Date()).getMinutes()+'m',
                }],
                test:'',
                componentKey:0,

            };
        },
        created(){
            this.fetchvols();
        },
        methods:{
            addResa(){
                this.test=!this.test;
            },
            deletevol(vol) {
                if (confirm("Voulez-vous annuler ce vol?")) {
                    let page = this.vols[vol.id];
                    axios.put('/vols/'+vol.id).then(response => {
                        this.vols.splice(vol.id, 1);
                    });
                    location.reload();
                }
            },
            fetchvols(){
                axios.get('/vols').then((response) => {
                    this.vols = response.data;
                    console.log(this.vols[0].aeroport_arr);
                },(error)=>{console.log(error)});
            },
            forceRerender(){
              this.componentKey+=1;
            },

        },
        // computed:{
        //     state(){return this.test==='closed'?'badge-danger':'badge-success'}
        // }
    }
</script>

<style scoped>

</style>