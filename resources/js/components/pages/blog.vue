<template>
    <div>
        <div class="row">
            <div class="card border-0 col-lg-4 col-md-4 col-sm-6 hunter-blog-card" @click="open(blog.id)" v-for="(blog, index) in blogs.data" :key="blog.id">
                <div>
                    <img :src="blog.picture.image_path" class="card-img-top" alt="...">
                </div>
                <div class="card-body hunter-card-body">
                    <h5 class="card-title hunter-card-title">{{blog.short_title}}</h5>
                    <p class="card-text" v-html="blog.short_content"></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col py-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li :class="`page-item hunter-page-item ${blog.active ? 'active' : ''}`" v-for="(blog, index) in blogs.links" :key="index">
                            <a class="page-link" :href="blog.url ? blog.url : '#'">{{blog.label}} </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "blog",
    props: ['blogs'],
    created() {
        this.blogs.links[0].label = 'Назад'
        this.blogs.links[this.blogs.links.length-1].label = 'Вперед'
    },
    mounted() {
        console.log(this.blogs)
    },
    methods: {
        open(id){
            window.location.href = '/blog/'+id
        }
    }
}
</script>

<style scoped>

</style>
