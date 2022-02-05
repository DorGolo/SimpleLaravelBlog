<template>
    <div>
        <h3 class="text-center">Edit Blog Post</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateBlogPost">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="blogPost.title">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <input type="textbox" class="form-control" v-model="blogPost.body">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{blogPost:{}}
              },
        created(){
            this.axios.get(`http://localhost:8000/api/blog/${this.$route.params.id}`).then((res)=> 
                    {console.log(res);
                        this.blogPost = res.data;});
                },
        methods:{
            updateBlogPost(){
                this.axios.patch(`http://localhost:8000/api/blog/${this.$route.params.id}`, this.blogPost).then((res)=> 
                {this.$router.push({name: 'home'});});
            }
        }
    } 
</script>