<template>
    <div>
        <h2 class="text-center">Blog Posts</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="blogPost in blogPosts" v-bind:key="blogPost.id">
                    <td>{{blogPost.id}}</td>
                    <td>{{blogPost.title}}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'edit', params: {id: blogPost.id}}" class="btn btn-success">Edit</router-link>
                            <button class="btn btn-danger" @click="deleteBlogPost(blogPost.id)">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default{
       data(){
          return{blogPosts:[]}
        },
       created(){
            this.axios.get('http://localhost:8000/api/blog/').then(response => {
                this.blogPosts = response.data.data;
             });
        },
       methods:{
           deleteBlogPost(id){
                this.axios.delete('http://localhost:8000/api/blog/${id}').then(response =>{
                    let i=this.blogPosts.map(data=>data.id).indexOf(id);
                    this.blogPosts.splice(i, 1)
                });
            }
        }
    } 
</script>