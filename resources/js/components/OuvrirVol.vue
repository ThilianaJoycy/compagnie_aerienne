<template>
    <div>
        <h3 class="text-center">Ouvrir un vol</h3>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <form @submit.prevent="addVol">
                    <div class="form-group">
                        <label>Date de départ</label>
                        <input type="date" class="form-control" v-model="vol.dateDepart">
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
                    <button type="submit" class="btn btn-primary">Ouvrir</button>
                </form>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
          
  
        data() {
            this.axios.defaults.headers.common['Authorization'] = 'sFOmWAfdclBaa6qlfc6NHMeRdNHBpawPIZKR5DZb';
            this.axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
            return {
                selectedDepart:"Choisir l'aeroport de départ",
                selectedArrive:"Choisir l'aeroport d'arrivé",
                aeroports: [],
                vol: {}
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/listeA', {
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    this.aeroports = response.data;
                });
        },
        methods: {
            async addVol() {
                console.log(this.vol)
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
                    console.log(this.vol)
                
                this.axios
                    .post('http://localhost:8000/ouvrirVol', this.vol)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log("HUMMM", err.response.data))
                    .finally(() => this.loading = false)

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