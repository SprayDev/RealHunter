<template>
    <div class="modal fade" id="permModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder" id="exampleModalLabel">Разрешение на охоту: <span class="hunter-text-green">{{license.title}}</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-check form-check-inline col" v-for="(item, index) in license.seasons">
                            <input class="form-check-input" type="checkbox" :id="`season${index}`" v-model="season">
                            <label class="form-check-label" :for="`season${index}`">{{item.date_from}}-{{ item.date_to }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Как к вам обращаться <span class="text-muted">не обязательно</span></label>
                        <input placeholder="Имя" v-model="name" type="text" class="form-control">
                    </div>
                    <div class="form-row pb-3">
                        <div class="col">
                            <label>Куда звонить</label>
                            <input v-model="phone" placeholder="Номер телефона" type="text" class="form-control" required>
                        </div>
                        <div class="col">
                            <label>Куда писать</label>
                            <input  v-model="email" placeholder="Электронная почта" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Комментарий <span class="text-muted">не обязательно</span></label>
                        <textarea class="form-control" rows="3" v-model="note"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn hunter-btn-orange">Отправить заявку</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "hunter-perm-modal",
    props: ['license'],
    mounted() {

    },
    data(){
        return {
            season: null,
            name: '',
            phone: '',
            note: '',
            email: ''
        }
    },
    methods: {
        changeTip(event){
            let target = event.target;
            target.title = target.value
        },
        seasonChange(event){
            console.log(this.season)
        }
    }
}
</script>

<style scoped>

</style>
