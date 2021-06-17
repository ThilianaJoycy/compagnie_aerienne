<template>
    <div>
        <h3 class="text-center">Reserver le vol</h3>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <form @submit.prevent="bookVol">
                    <fieldset>
                        <legend>Informations du client:</legend>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" v-model="client.nom">
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" class="form-control" v-model="client.prenom">
                        </div>
                        <div class="form-group">
                            <label>Numéro de téléphone</label>
                            <input type="text" class="form-control" v-model="client.tel">
                        </div>
                        <div class="form-group">
                            <label>Adresse email</label>
                            <input type="text" class="form-control" v-model="client.email">
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Informations du passager:</legend>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" v-model="passager.nom">
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" class="form-control" v-model="passager.prenom">
                        </div>
                        
                    </fieldset>
                    
                    <button type="submit" class="btn btn-primary">Reserver</button>
                </form>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
</template>
 
<script>
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}
    export default {
          
  
        data() {
            this.axios.defaults.headers.common['Authorization'] = 'sFOmWAfdclBaa6qlfc6NHMeRdNHBpawPIZKR5DZb';
            this.axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
            return {
                client: {},
                passager: {},
                vol: {},
                reservation: {}
            }
        },
        created() {
            
        },
        methods: {
            async bookVol() {
                console.log(this.vol)
                
                await this.axios
                    .get(`http://localhost:8000/client/${this.client.email}`, {
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => {
                        console.log("client");
                            console.log(response);
                        this.reservation.idVol=this.$route.params.id;
                        this.reservation.numero="RES" + this.$route.params.id; + "PASS" + this.reservation.passager;
                        // this.client = response.data;
                        if(response.data!=""){
                            
                            this.reservation.idClient=response.data.id;
                        }
                        else{
                            this.axios
                                .post('http://localhost:8000/creerClient', this.client)
                                .then(response => (
                                    this.reservation.idClient=response.data.id
                                ))
                                .catch(err => console.log("HUMMM", err.response.data))
                                .finally(() => this.loading = false)
                        }
                    });

                await this.axios
                    .get(`http://localhost:8000/pass/${this.passager.nom}`, {
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => {
                        // this.passager = response.data;
                        if(response.data!=""){
                            this.reservation.idPassager=response.data.id;
                        }
                        else{
                            this.axios
                                .post('http://localhost:8000/creerPass', this.passager)
                                .then(response => (
                                    this.reservation.idPassager=response.data.id
                                ))
                                .catch(err => console.log("HUMMM", err.response.data))
                                .finally(() => this.loading = false)
                        }
                    });
                    
                    

                this.reservation.dateReservation= await formatDate(Date.now());
               console.log(this.reservation)
                this.axios
                    .post('http://localhost:8000/creerReserv', this.reservation)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log("HUMMM", err.response.data))
                    .finally(() => this.loading = false)

            }
        }
    }
</script>