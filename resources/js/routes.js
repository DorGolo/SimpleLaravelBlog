import AllBlog from './components/Blog/AllPosts.vue';
import CreateBlog from './components/Blog/CreatePost.vue';
import EditBlog from './components/Blog/EditPost.vue';
import ViewBlog from './components/Blog/ViewPost.vue';

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
        name: 'view',
        path: '/:id',
        component: ViewBlog
    }
];