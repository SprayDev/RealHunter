<template>
    <div class="modal fade" id="tourModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" ref="modal">
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
                    <form ref="form">
                        <div class="form-group w-100">
                            <label for="exampleInputEmail1">Дата заезда</label>
                            <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="row pb-3">
                            <div class="form-group col-sm-12 col-lg-6">
                                <p class="card-text">Количество <span style="text-decoration-line: underline" title="Гость — это сопровождающий без права охоты">Охотников</span>  {{huntersCount}}</p>
                            </div>
                            <div class="d-flex form-group col-sm-12 col-lg-6">
                                <span>{{tour.number_of_hunters_min}}</span>
                                <input name="hunters" v-model="hunters" @change="changeRange($event,'hunters')" type="range" class="custom-range" :min="tour.number_of_hunters_min" value="1" :max="tour.number_of_hunters_max" step="1">
                                <span>{{tour.number_of_hunters_max}}</span>
                            </div>
                        </div>
                        <div class="row pb-3">
                            <div class="form-group col-sm-12 col-lg-6">
                                <p class="card-text">Количество <span style="text-decoration-line: underline" title="Гость — это сопровождающий без права охоты">Гостей</span>  {{guestsCount}}</p>
                            </div>
                            <div class="d-flex form-group col-sm-12 col-lg-6">
                                <span>{{tour.number_of_guests_min}}</span>
                                <input type="range" name="guests" v-model="guests" class="custom-range" value="0" :min="tour.number_of_guests_min" :max="tour.number_of_guests_max" step="1">
                                <span>{{tour.number_of_guests_max}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Как к вам обращаться <span class="text-muted">не обязательно</span></label>
                            <input name="name" placeholder="Имя" v-model="name" type="text" class="form-control">
                            <div class="invalid-feedback">
                                {{validateForm.name}}
                            </div>
                        </div>
                        <div class="form-row pb-3">
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Куда звонить</label>
                                <input v-model="phone" name="phone" placeholder="Номер телефона" type="text" class="form-control" required>
                                <div class="invalid-feedback">
                                    {{validateForm.phone}}
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Куда писать</label>
                                <input  v-model="email" name="email" placeholder="Электронная почта" type="text" class="form-control" required>
                                <div class="invalid-feedback">
                                    {{validateForm.email}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Комментарий <span class="text-muted">не обязательно</span></label>
                            <textarea class="form-control" rows="3" name="note" v-model="note"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn hunter-btn-orange" @click="sendMail">Отправить заявку</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "hunter-tour-modal",
    props: [
        'tour',
        'inhunters',
        'inguests'
    ],
    computed: {
        huntersCount(){
            return this.hunters;
        },
        guestsCount(){
            return this.guests
        }
    },
    mounted() {
    },
    data(){
        return {
            hunters: 0,
            guests: 0,
            name: '',
            phone: '',
            note: '',
            email: '',
            validateForm: {
                name: '',
                email: '',
                phone: ''
            }
        }
    },
    methods: {
        changeTip(event){
            let target = event.target;
            target.title = target.value
        },
        changeRange(e, item){
          this[item] = e.target.value
        },
        sendMail(){
            var formElement = this.$refs.form;
            let data = new FormData(formElement)
            let vm = this;
            axios.post('/api/sendMail', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).catch((error) => {
                let errors = error.response.data.errors
                if (errors)
                {
                    for (let index in errors)
                    {
                        let input_validate = formElement.querySelector(`input[name="${index}"]`).closest('div').querySelector('div[class="invalid-feedback"]')
                        input_validate.style.display = 'block';
                        vm.validateForm[index] = errors[index][0]
                    }
                }
            }).then((response) => {
                $(this.$refs.modal).modal()
            })
        }
    },
    watch:{
        inguests(val){
            this.guests = val
        },
        inhunters(val){
            this.hunters = val
        }
    }
}
</script>

<style scoped>

</style>
