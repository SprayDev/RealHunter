<template>
    <div class="container pt-5 py-5">
        <h1 class="h1 pb-3">
            Список разрешений
        </h1>
        <p>
            Разрешение. Любой вид охоты может осуществляться только после получения разрешения на добычу охотничьих ресурсов, допускающего отлов или отстрел одной или нескольких особей диких животных
        </p>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="region">Регион охоты</label>
                <select id="region" class="form-control">
                    <option selected>Выберите регион</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="season">Сезон охоты</label>
                <select id="season" class="form-control">
                    <option selected>Выберите дату</option>
                    <option>...</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" v-for="(item, index) in first_three" :key="item.id" @click="go_to(item.id)">
                <div class="position-relative cursor-pointer hunter-perm-lg-item">
                    <img :src="item.picture.image_path" class="card-img-top" alt="...">
                    <div style="position: absolute; bottom: 0;height: 56px;background: rgba(0, 0, 0, 0.5);width: 100%">
                        <h3 class="text-white p-3">{{item.title}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-lg-3 col-md-4 col-sm-6 py-2 " v-for="(item, index) in rest" :key="item.id" @click="go_to(item.id)">
                <div class="row hunter-perm-sm-item cursor-pointer">
                    <div class="col-7 pr-0">
                        <img width="120" height="120" class="rounded-circle" :src="item.picture.image_path">
                    </div>
                    <div class="col-5 d-flex align-items-center pl-0">
                        <h4>{{item.title}}</h4>
                    </div>
                </div>
            </div>
            <div class="w-100 py-3"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "licenses",
    props: ['perms'],
    data() {
        return {

        }
    },
    mounted() {
    },
    computed: {
        first_three (){
            let licenses = this.perms;
            return licenses.slice(0, 3);
        },
        rest(){
            let licenses = this.perms;
            return licenses.slice(3, licenses.length);
        }
    },
    methods: {
        go_to(id){
            window.location.href = `permissions/${id}`;
        }
    }
}
</script>

<style scoped>

</style>
