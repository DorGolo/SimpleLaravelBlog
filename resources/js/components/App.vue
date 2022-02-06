<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav" >
                    <router-link to="/" class="nav-item nav-link">Blog Posts</router-link>
                    <template v-if="isLoggedin()">
                        <span class="nav-item nav-link">Welcome back {{ user.name }}</span>
                        <router-link to="/create" class="nav-item nav-link">Create Blog Post</router-link>
                        <a style="cursor: pointer;" @click="logout" class="nav-item nav-link">Logout</a>
                    </template>
                    <template v-else>
                        <router-link to="/login" class="nav-item nav-link" >Login</router-link>
                        <router-link to="/register" class="nav-item nav-link" >Register</router-link>
                    </template>
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>
<script>
    import {mapActions} from 'vuex'
    export default{
        data(){
            return {
                user: window.User,
            }
        },
        methods: {
            ...mapActions({
                signOut:"auth/logout"
            }),
            isLoggedin() {
                return this.user.name;
            },
            logout(e) {
                e.preventDefault()
                this.axios.get('/sanctum/csrf-cookie').then(response => {
                    this.axios.post('/api/logout')
                        .then(response => {
                            console.log(response);
                            if (response.data.success) {
                                this.signOut();
                                window.location.href = "/"
                            } else {
                                console.log(response)
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
            }
        }
    }
</script>