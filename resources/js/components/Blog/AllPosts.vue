<template>
    <div>
        <div v-for="blogPost in blogPosts.data" v-bind:key="blogPost.id" class="col-md-6">
            <div><h3>{{blogPost.title}}</h3></div>
            <div>
                {{ getFormattedBlogPost(blogPost.body) }}
            </div>
            <div>
                <div class="btn-group" role="group">
                    <router-link :to="{name: 'view', params: {id: blogPost.id}}" class="btn btn-success">View</router-link>
                    <router-link :to="{name: 'edit', params: {id: blogPost.id}}" class="btn btn-success">Edit</router-link>
                    <button class="btn btn-danger" @click="deleteBlogPost(blogPost.id)">Delete</button>
                </div>
            </div>
        </div>
        <pagination :data="blogPosts" @pagination-change-page="getResults"></pagination>
    </div>
</template>

<script>
    export default{
        data() {
            return {
                blogPosts: {},
            }
        },
        created(){
            this.getResults();
        },
        methods:{
           deleteBlogPost(id){
                this.axios.delete('/api/blog/'+id).then(response =>{
                    let i=this.blogPosts.map(data=>data.id).indexOf(id);
                    this.blogPosts.splice(i, 1)
                });
            },
            getResults(page) {
                if (typeof page === "undefined") {
                    page = 1;
                }
                this.axios
                .get("/api/blog?page="+page)
                .then(response => {
                    console.log(response);
                    this.blogPosts = response.data;
                });
            },
            getFormattedBlogPost(content) {
                if (typeof content === "undefined") {
                    return '';
                }
                content = content.replace(/(<([^>]+)>)/ig, '');
                return content.length > 300 ? content.substring(0, 300) + '...' : content; 
            }
        }
    }
</script>