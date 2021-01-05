<template>
    <div class="modal fade" id="tourModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Бронирование тура</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <p class="font-weight-bolder">Осенняя охота на камчатского <span class="hunter-text-green">бурого медведя </span>в 2021 году</p>
                    </div>
                    <div class="form-group w-50">
                        <label for="exampleInputEmail1">Дата заезда</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="row pb-3">
                        <div class="col">
                            <p class="card-text">Количество <span style="text-decoration-line: underline" title="Гость — это сопровождающий без права охоты">Охотников</span>  {{hunters}}</p>
                        </div>
                        <div class="d-flex col">
                            <span>1</span>
                            <input v-model="hunters" type="range" class="custom-range" min="1" value="1" max="10" step="1">
                            <span>10</span>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col">
                            <p class="card-text">Количество <span style="text-decoration-line: underline" title="Гость — это сопровождающий без права охоты">Гостей</span>  {{guests}}</p>
                        </div>
                        <div class="d-flex col">
                            <span>0</span>
                            <input type="range" v-model="guests" class="custom-range" value="0" min="0" max="10" step="1">
                            <span>10</span>
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
    name: "hunter-tour-modal",
    mounted() {
        $("#exampleModal").modal()
    },
    data(){
        return {
            hunters: 1,
            guests: 0,
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
        }
    }
}
</script>

<style scoped>

</style>
