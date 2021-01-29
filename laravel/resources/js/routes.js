import Users from './components/Users.vue';
import CreateUser from './components/CreateUser.vue';
import UpdateUser from './components/UpdateUser.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Users
    },
    {
        name: 'create',
        path: '/create',
        component: CreateUser
    },
    {
        name: 'update',
        path: '/update/:id',
        component: UpdateUser
    }
];