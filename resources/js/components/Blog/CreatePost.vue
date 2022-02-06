<template>
    <div>
        <h3 class="text-center">Create Blog Post</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addblogPost">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="blogPost.title">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" v-model="blogPost.body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
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
        methods:{
            addblogPost(){
                this.axios.post('/api/blog', this.blogPost).then(response =>(this.$router.push({name: 'home'})))
                .catch(err=> console.log(err))
                .finally(()=> this.loadin=false)
            }
        }
    } 
</script>