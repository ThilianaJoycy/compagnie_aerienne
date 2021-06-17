<template>
    <div>
        <h3 class="text-center">Modifier le vol</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateVol">
                    <div class="form-group">
                        <label>Date de départ</label>
                        <input type="date" class="form-control" v-model="vol.dateDepart" >
                    </div>
                    <div class="form-group">
                        <label>Date d'arrivée</label>
                        <input type="date" class="form-control" v-model="vol.dateArrivee">
                    </div>
                    <div class="form-group">
                        <label>Heure de départ</label>
                        <input type="time" class="form-control" v-model="vol.heureDepart">
                    </div>
                    <div class="form-group">
                        <label>Heure d'arrivée</label>
                        <input type="time" class="form-control" v-model="vol.heureArrivee">
                    </div>
                    <div class="form-group">
                        <label>Aeroport de départ</label>
                        <select class="form-control" :required="true" v-model="selectedDepart" @change="changeAirPortGo($event)">
                            <option :selected="true">{{ selectedDepart }}</option>
                            <option v-for="aeroport in aeroports" :key="aeroport.id" v-bind:value="aeroport.id" >{{ aeroport.nom }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Aeroport d'arrivé</label>
                         <select class="form-control" :required="true" v-model="selectedArrive" @change="changeAirPortCome($event)">
                            <option :selected="true">{{ selectedArrive }}</option>
                            <option v-for="aeroport in aeroports" :key="aeroport.id" v-bind:value="aeroport.id" >{{ aeroport.nom }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                aeroports: [],
                vol: {},
                selectedDepart:null,
                selectedArrive:null,
            }
        },
        async created() {
            await this.axios
                .get(`http://localhost:8000/listeVols/${this.$route.params.id}`)
                .then((res) => {
                    this.vol = res.data;
                });

            await this.axios
                .get('http://localhost:8000/listeA', {
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    this.aeroports = response.data;
                });

                this.axios
                .get(`http://localhost:8000/findAirportId/${this.vol.aeroport_depart_id}`)
                .then((res) => {
                    this.selectedDepart = res.data.nom;
                });

                this.axios
                .get(`http://localhost:8000/findAirportId/${this.vol.aeroport_arrive_id}`)
                .then((res) => {
                    this.selectedArrive = res.data.nom;
                });


                
        },
        methods: {
            async updateVol() {
                await this.axios
                    .get(`http://localhost:8000/findAirport/${this.selectedDepart}`, {
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => {
                        this.vol.aeroportDepart = response.data.id;
                    });

                await this.axios
                    .get(`http://localhost:8000/findAirport/${this.selectedArrive}`, {
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => {
                        this.vol.aeroportArrive = response.data.id;
                    });
                this.axios
                    .put(`http://localhost:8000/update/${this.$route.params.id}`, this.vol)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            },

            changeAirPortGo(event) {
                this.selectedDepart = event.target.options[event.target.options.selectedIndex].text
            },

            changeAirPortCome(event) {
                this.selectedArrive = event.target.options[event.target.options.selectedIndex].text
            }
        }
    }
</script>