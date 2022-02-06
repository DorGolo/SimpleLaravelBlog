<template>
    <div>
        <div v-for="blogPost in blogPosts.data" v-bind:key="blogPost.id" class="col-md-6 card mycard">
            <div class="card-body">
                <h5 class="card-title">{{blogPost.title}}</h5>
                <div class="card-text">
                    {{ getFormattedBlogPost(blogPost.body) }}
                </div>
                <div>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'view', params: {id: blogPost.id}}" class="btn btn-success">View</router-link>
                    </div>
                    <div class="btn-group admin-btns" role="group" v-if="user.name">
                        <router-link :to="{name: 'edit', params: {id: blogPost.id}}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger admin-btn" @click="deleteBlogPost(blogPost.id)">Delete</button>
                    </div>
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
                user: window.User
            }
        },
        created(){
            this.getResults();
        },
        methods:{
            deleteBlogPost(id){
                this.axios.delete('/api/blog/'+id).then(response =>{
                    let i=this.blogPosts.data.map(data=>data.id).indexOf(id);
                    this.blogPosts.data.splice(i, 1)
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