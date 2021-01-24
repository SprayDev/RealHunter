<template>
    <div class="container pt-5 py-5">
        <h1 class="h1 pb-3">
            Список разрешений
        </h1>
        <p>
            Нет свободного времени для получения лицензии на охоту - мы всегда готовы Вам помочь!
        </p>
        <p>
            <a class="hunter-text-orange" href="#" data-toggle="modal" data-target="#fbModal">Заполняйте заявку</a> и наши специалисты свяжутся с Вами в ближайшее время для.
        </p>
        <div class="row">
            <div class="form-group col-md-4 mb-3">
                <label for="region">Регион охоты</label>
                <select id="region" class="form-control" v-model="selected" @change="filterPerms(selected, seasonDate)">
                    <option value="null">Выберите регион</option>
                    <option v-for="location in locations" :key="location.id" :value="location.id" >{{location.title}}</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="season">Сезон охоты</label>
                <input type="date" id="season" class="form-control" v-model="seasonDate" @change="filterPerms(selected, seasonDate)">
                <!--<select id="season" class="form-control">
                    <option selected>Выберите дату</option>
                    <option>...</option>
                </select>-->
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 py-3" v-for="(item, index) in first_three" :key="item.id" @click="go_to(item.id)">
                <div class="position-relative cursor-pointer hunter-perm-lg-item">
                    <img height="350" :src="item.picture.image_path" class="card-img-top" alt="...">
                    <div style="position: absolute; bottom: 0;height: 56px;background: rgba(0, 0, 0, 0.5);width: 100%">
                        <h3 class="text-white p-3" style="font-size: 1.5rem">{{item.title}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-lg-3 col-md-4 col-sm-6 py-3 " v-for="(item, index) in rest" :key="item.id" @click="go_to(item.id)">
                <div class="row hunter-perm-sm-item cursor-pointer">
                    <div class="col-5 col-lg-6 col- pr-0">
                        <img width="120" height="120" class="rounded-circle" :src="item.picture.image_path.replace(/.jpg/, '.png')">
                    </div>
                    <div class="col-7 col-lg-6 d-flex align-items-center pl-0">
                        <h4>{{item.title}}</h4>
                    </div>
                </div>
            </div>
            <div class="w-100 py-3"></div>
        </div>
        <hunter-fb-modal></hunter-fb-modal>
    </div>
</template>

<script>
export default {
    name: "licenses",
    props: ['perms', 'locations'],
    data() {
        return {
            selected: null,
            filteredPerms: this.perms,
            seasonDate: null
        }
    },
    mounted() {
    },
    computed: {
        selected_perms(){
            let perms = this.filteredPerms;
            return perms;
        },
        first_three (){
            let licenses = this.selected_perms;
            return licenses.slice(0, 3);
        },
        rest(){
            let licenses = this.selected_perms;
            return licenses.slice(3, licenses.length);
        }
    },
    methods: {
        go_to(id){
            window.location.href = `permissions/${id}`;
        },
        filterPerms(location, date){
            axios.post('/api/licenses/filter', {
                location_id: location,
                season_date: date
            })
            .then((response) => {
                let data = response.data
                this.filteredPerms = data;
            })
            .catch((error) => {
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
