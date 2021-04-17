<template>
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="#"><img src="assets/brand/medicasure.svg"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item " :class="{active: selected_menu==='acceuil'}" @click.prevent="selected_menu='acceuil'">
                        <a class="nav-link" href="#">Acceuil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item" :class="{active: selected_menu==='reservations'}"  @click.prevent="selected_menu='reservations'">
                        <a class="nav-link" href="#">Reservations </a>
                    </li>
                    <li class="nav-item" :class="{active: selected_menu==='vols'}"  @click.prevent="selected_menu='vols'">
                        <a class="nav-link" href="#">Vols</a>
                    </li>
                    <li class="nav-item" :class=""  >
                        <a class="nav-link" href="/logout">Deconnexion</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="main-wrapper">
            <div class="row">
                <home-page v-show="selected_menu==='acceuil'"></home-page>
                <gestion-vols v-show="selected_menu==='vols'"></gestion-vols>
                <gestion-resa v-show="selected_menu==='reservations'"></gestion-resa>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MenuApp",
        data(){
            return{
                selected_menu:'acceuil'
            }
        }
    }
</script>

<style scoped>

</style>