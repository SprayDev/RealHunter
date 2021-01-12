<template>
    <div class="modal fade" id="permModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" ref="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder" id="exampleModalLabel">Разрешение на охоту: <span class="hunter-text-green">{{license.title}}</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form ref="form">
                        <div class="form-group">
                            <label>Выберите сезон охоты</label>
                            <div class="form-row">
                                <div class="form-check form-check-inline col" v-for="(item, index) in license.seasons">
                                    <input
                                        :value="`${item.date_from} - ${ item.date_to }`"
                                        class="form-check-input" type="checkbox"
                                        :id="`season${index}`"
                                        @change="setSeason($event, item.id)"
                                        v-model="season">
                                    <label class="form-check-label" :for="`season${index}`">{{item.date_from}}-{{ item.date_to }}</label>
                                </div>
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
                            <div class="form-group col-lg-6 col-xs-12">
                                <label>Куда звонить</label>
                                <input v-model="phone" name="phone" placeholder="Номер телефона" type="text" class="form-control" required>
                                <div class="invalid-feedback">
                                    {{validateForm.phone}}
                                </div>
                            </div>
                            <div class="form-group col-lg-6 col-xs-12">
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
    name: "hunter-perm-modal",
    props: ['license'],
    mounted() {
        console.log(this.license.seasons)
    },
    data(){
        return {
            season: [],
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
        setSeason(event, id){
            let season = event.target.getAttribute('data-season');
            let vm = this;
        },
        sendMail(){
            var formElement = this.$refs.form;
            let data = new FormData(formElement)
            data.append('season', JSON.stringify(this.season))
            data.append('perm_id', this.license.id)
            data.append('perm_title', this.license.title)
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
                $('.toast').toast('show');
                $(this.$refs.modal).modal('hide');
            })
        }
    }
}
</script>

<style scoped>

</style>
