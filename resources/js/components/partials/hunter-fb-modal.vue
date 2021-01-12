<template>
    <div class="modal fade" id="fbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder" id="exampleModalLabel">Связаться с менеджером</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form ref="form">
                        <div class="form-group">
                            <label>Как к вам обращаться <span class="text-muted">не обязательно</span></label>
                            <input placeholder="Имя" name="name" v-model="name" type="text" class="form-control">
                            <div class="invalid-feedback">
                                {{validateForm.name}}
                            </div>
                        </div>
                        <div class="form-row pb-3">
                            <div class="form-group col-lg-6 col-xs-12">
                                <label>Куда звонить</label>
                                <input v-model="phone" placeholder="Номер телефона" type="text" class="form-control" name="phone">
                                <div class="invalid-feedback">
                                    {{validateForm.phone}}
                                </div>
                            </div>
                            <div class="form-group col-lg-6 col-xs-12">
                                <label>Куда писать</label>
                                <input  v-model="email" placeholder="Электронная почта" type="text" class="form-control" name="email">
                                <div class="invalid-feedback">
                                    {{validateForm.email}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Комментарий <span class="text-muted">не обязательно</span></label>
                            <textarea name="note" class="form-control" rows="3" v-model="note"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn hunter-btn-orange" @click="sendMail()" data-toggle="modal" data-target="#fbModal">Отправить заявку</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "hunter-fb-modal",
    mounted() {

    },
    data(){
        return {
            season: null,
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
        sendMail(){
            var formElement = this.$refs.form;
            let data = new FormData(formElement)
            let vm = this;
            console.log(data)
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
    }
}
</script>

<style scoped>

</style>
