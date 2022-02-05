<template>
    <div>
        <h3 class="text-center">Create Blog Post</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addblogPost">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="blogPost.name">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <input type="textbox" class="form-control" v-model="blogPost.detail">
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
                this.axios.post('http://localhost:8000/api/blog', this.blogPost).then(response =>(this.$router.push({name: 'home'})))
                .catch(err=> console.log(err))
                .finally(()=> this.loadin=false)
            }
        }
    } 
</script>