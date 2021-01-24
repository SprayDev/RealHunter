<template>
    <div class="container pt-5 py-5">
        <h1 class="hunter-perm-title h1 pb-3">
            {{blog.title}}
        </h1>
        <div class="d-flex pb-2 hunter-post-detail">
            <span>{{blog.date}}</span>
            <span><img src="/storage/images/views.png"> {{blog.views_number}}</span>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <img :src="blog.picture.image_path" class="img-fluid">
                <div v-html="blog.content" class="py-5">

                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6">
                <div class="card border-0 ">
                    <div class="cutCorner-2">
                        <div class="hunter-images">
                            <img class="d-inline" src="/images/car.svg">
                            <img class="d-inline" src="/images/car.svg">
                        </div>
                        <img src="/images/bear.png" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body hunter-card-body">
                        <h5 class="card-title hunter-card-title">Осенняя охота на Камчатского <span>бурого медведя</span> в 2021 году</h5>
                        <p class="card-text">Камчатский край, Усть-Камчатский район</p>
                        <p class="card-text">14 дней, с 25.08.21 до 30.11.21</p>
                    </div>
                    <div class="">
                        <h3 class="hunter-text-orange">от 460 000 руб</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "post",
    props: ['blog'],
    data() {
        return {
            huntersCount: 1,
            guestsCount: 0
        }
    },
    mounted() {
        console.log(this.blog)
    },
    methods: {
        onCounter(e) {
            let target = e.currentTarget;
            let method = target.getAttribute('data-type');
            let data_field = target.getAttribute('data-field');
            let input_field = target.closest('span[class]').closest('div[class="input-group"]').querySelector('input')
            if (method == 'plus')
                this[data_field]++;
            else
                this[data_field]--;
        }
    }
}
</script>

<style scoped>

</style>
