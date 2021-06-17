<template>
    <div>
        <h2 class="text-center">Liste des vols</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Date de départ</th>
                <th>Heure de départ</th>
                <th>Date d'arrivée</th>
                <th>Heure d'arrivée</th>
                <th>Aeroport de départ</th>
                <th>Aeroport d'arrivée</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="vol in vols" :key="vol.id">
                <td>{{ vol.id }}</td>
                <td>{{ vol.dateDepart }}</td>
                <td>{{ vol.dateArrivee }}</td>
                <td>{{ vol.heureDepart }}</td>
                <td>{{ vol.heureArrivee }}</td>
                <td>{{ vol.aeroportDepart }}</td>
                <td>{{ vol.aeroportArrive}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'update', params: { id: vol.id }}" class="btn btn-success">Modifier</router-link>
                        <router-link :to="{name: 'book', params: { id: vol.id }}" class="btn btn-primary">Reserver</router-link>
                        <!-- <router-link :to="{name: 'escale', params: { id: vol.id }}" class="btn btn-dark">Ajouter une escale</router-link> -->
                        <button class="btn btn-danger" @click="FermerVol(vol.id)">Fermer</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                vols: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/listeVols', {
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    this.vols = response.data;
                });
        },
        methods: {
            FermerVol(id) { 
                this.axios
                    .put(`http://localhost:8000/fermerVol/${id}`)
                    .then(response => {
                        let i = this.vols.map(data => data.id).indexOf(id);
                        this.vols.splice(i, 1)
                    });
            }
        }
    }
</script>