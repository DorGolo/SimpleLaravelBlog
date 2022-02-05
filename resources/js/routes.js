import AllBlog from './components/Blog/AllPosts.vue';
import CreateBlog from './components/Blog/CreatePost.vue';
import EditBlog from './components/Blog/EditPost.vue';
import ViewBlog from './components/Blog/ViewPost.vue';
import Login from './components/User/Login.vue';

export const routes = [{
        name: 'home',
        path: '/',
        component: AllBlog
    },
    {
        name: 'create',
        path: '/create',
        component: CreateBlog
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditBlog
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'view',
        path: '/:id',
        component: ViewBlog
    },
];