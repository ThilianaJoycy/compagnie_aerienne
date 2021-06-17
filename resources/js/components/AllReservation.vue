<template>
    <div>
        <h2 class="text-center">Liste des reservations</h2>
 
        <table class="table">
            <thead>
            <tr>
                
                <th>Numéro</th>
                <th>Date de reservation</th>
                <th>Nom du client:</th>
                <th>Numéro de téléphone</th>
                <th>Adresse email</th>
                <th>Reservation faite pour:</th>
                <th>Date de départ:</th>
                <th>Heure de départ:</th>
                <th>Statut:</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="reservation in reservations" :key="reservation.id">
                <td>{{ reservation.numero }}</td>
                <td>{{ reservation.dateReservation }}</td>
                <td>{{ reservation.client.nom }}</td>
                <td>{{ reservation.client.tel }}</td>
                <td>{{ reservation.client.email }}</td>
                <td>{{ reservation.passager.nom }}</td>
                <td>{{ reservation.vol.dateDepart }}</td>
                <td>{{ reservation.vol.heureDepart }}</td>
                <td>{{ reservation.statut }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <!-- <router-link :to="{name: 'updateR', params: { id: reservation.id }}" class="btn btn-success">Modifier</router-link> -->
                        <button class="btn btn-success" @click="Confirmer(reservation.id)">Confirmer</button>
                        <button class="btn btn-danger" @click="Annuler(reservation.id)">Annuler</button>
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
                reservations: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/listeReserv', {
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    this.reservations = response.data;
                });
        },
        methods: {
            Annuler(id) { 
                this.axios
                    .put(`http://localhost:8000/annulerReserv/${id}`)
                    .then(response => {
                        this.$router.push({ name: 'home' });
                    });
            },

            Confirmer(id) { 
                this.axios
                    .put(`http://localhost:8000/confirmerReserv/${id}`)
                    .then(response => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>