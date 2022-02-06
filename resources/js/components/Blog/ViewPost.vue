<template>
    <div>
        <h3 class="text-center" >{{blogPost.title}}</h3>
        <div class="row">
            <div class="col-md-6">
                {{ blogPost.body }}
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
            this.axios.get(`/api/blog/${this.$route.params.id}`).then((res)=> 
                    {console.log(res);
                        this.blogPost = res.data;});
                },
        methods:{
        }
    } 
</script>