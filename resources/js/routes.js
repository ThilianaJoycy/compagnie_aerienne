import AllVol from './components/AllVol.vue';
import OuvrirVol from './components/OuvrirVol.vue';
import ModifierVol from './components/ModifierVol.vue';
import ReserverVol from './components/ReserverVol.vue';
import AllReservation from './components/AllReservation.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllVol
    },
    {
        name: 'create',
        path: '/vol/create',
        component: OuvrirVol
    },
    {
        name: 'update',
        path: '/vol/edit/:id',
        component: ModifierVol
    },

    {
        name: 'book',
        path: '/vol/book/:id',
        component: ReserverVol
    },

    {
        name: 'books',
        path: '/books',
        component: AllReservation
    }
];