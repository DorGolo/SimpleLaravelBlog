<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav" >
                    <router-link to="/" class="nav-item nav-link" >Blog Posts</router-link>
                    <template v-if="isLoggedin()">
                        <router-link to="/create" class="nav-item nav-link" >Create Blog Post</router-link>
                    </template>
                    <router-link v-if="!isLoggedin()" to="/login" class="nav-item nav-link" >Login</router-link>
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>
<script>
    export default{
        methods: {
            isLoggedin() {
                return window.Laravel.isLoggedin;
            }
        }
    }
</script>