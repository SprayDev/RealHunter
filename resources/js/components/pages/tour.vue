<template>
    <div class="container pt-5 py-5">
        <h1 class="hunter-perm-title h1 pb-3">
            {{tour.title}}
        </h1>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6 mb-3">
                <hunter-slider></hunter-slider>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6">
                <h5 class="font-weight-bolder">Бронирование</h5>
                <div class="card card-tour mb-3 border-0" style="background: #F5F5F5;">
                    <div class="card-body">
                        <p class="card-text font-weight-bold">{{ tour.location.title }} </p>
                        <p class="card-text font-weight-bold">{{ days }}</p>
                        <p class="card-text font-weight-bold"><span class="" title="Гость — это сопровождающий без права охоты">Охотников</span> {{tour.number_of_hunters_min}}-{{tour.number_of_hunters_max}}</p>
                        <p class="card-text font-weight-bold"><span class="" title="Гость — это сопровождающий без права охоты">Гостей</span> {{tour.number_of_guests_min}}-{{tour.number_of_guests_max}}</p>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-8 card-tour d-flex align-items-center">
                        <p class="card-text font-weight-bold">Количество <span class="">охотников</span></p>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary btn-number px-1" @click="onCounter($event)" :disabled="huntersCount <= tour.number_of_hunters_min" data-type="minus" data-field="huntersCount">
                                    <img src="/images/minus.svg">
                                </button>
                            </span>
                            <input type="text" class="form-control input-number px-0 text-center" value="1" :min="tour.number_of_guests_min" max="tour.number_of_guests_max" v-model="huntersCount">
                            <span class="input-group-append">
                                <button  type="button" class="btn btn-outline-secondary px-0 btn-number" :disabled="huntersCount >= tour.number_of_hunters_max" data-type="plus" @click="onCounter($event)" data-field="huntersCount">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-8 card-tour d-flex align-items-center">
                        <p class="card-text font-weight-bold">Количество <span class="">гостей</span></p>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary btn-number px-1" @click="onCounter($event)" :disabled="guestsCount <= tour.number_of_guests_min" data-type="minus" data-field="guestsCount">
                                    <img src="/images/minus.svg">
                                </button>
                            </span>
                            <input type="text" class="form-control input-number px-0 text-center" value="1" min="1" max="5" v-model="guestsCount">
                            <span class="input-group-append">
                                <button  type="button" class="btn btn-outline-secondary px-0 btn-number" :disabled="guestsCount >= tour.number_of_guests_max" data-type="plus" @click="onCounter($event)" data-field="guestsCount">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <a class="btn hunter-btn-orange ml-auto w-100" href="#" data-toggle="modal" data-target="#tourModal">Забронировать тур</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <hunter-text-block :tour="tour"></hunter-text-block>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6">

            </div>
        </div>
        <h3 class="font-weight-bold p-2">Цены на услуги</h3>
        <div class="row px-0 pt-4">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <div class="row" v-for="price in tour.prices" :key="price.id">
                    <div class="col col-xs-4 d-flex align-items-center">
                        <h6>{{price.title}}</h6>
                    </div>
                    <div class="col col-xs-8 d-flex align-items-center justify-content-end">
                        <h6 class="hunter-perm-title"><span>{{price.amount/100}} {{price.unit}}</span></h6>
                    </div>
                    <div class="w-100 border-top mb-3"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6">
                <h5 class="font-weight-bolder">Бронирование</h5>
                <div class="card card-tour mb-3 border-0" style="background: #F5F5F5;">
                    <div class="card-body">
                        <p class="card-text font-weight-bold">{{ tour.location.title }} </p>
                        <p class="card-text font-weight-bold">{{ days }}</p>
                        <p class="card-text font-weight-bold"><span class="">Охотников</span> {{tour.number_of_hunters_min}}-{{tour.number_of_hunters_max}}</p>
                        <p class="card-text font-weight-bold"><span class="">Гостей</span> {{tour.number_of_guests_min}}-{{tour.number_of_guests_max}}</p>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-8 card-tour d-flex align-items-center">
                        <p class="card-text font-weight-bold">Количество <span class="">охотников</span></p>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary btn-number px-1" @click="onCounter($event)" :disabled="huntersCount <= tour.number_of_hunters_min" data-type="minus" data-field="huntersCount">
                                    <img src="/images/minus.svg">
                                </button>
                            </span>
                            <input type="text" class="form-control input-number px-0 text-center" value="1" :min="tour.number_of_guests_min" max="tour.number_of_guests_max" v-model="huntersCount">
                            <span class="input-group-append">
                                <button  type="button" class="btn btn-outline-secondary px-0 btn-number" :disabled="huntersCount >= tour.number_of_hunters_max" data-type="plus" @click="onCounter($event)" data-field="huntersCount">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row pb-2">
                    <div class="col-8 card-tour d-flex align-items-center">
                        <p class="card-text font-weight-bold">Количество <span class="">гостей</span></p>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary btn-number px-1" @click="onCounter($event)" :disabled="guestsCount <= tour.number_of_guests_min" data-type="minus" data-field="guestsCount">
                                    <img src="/images/minus.svg">
                                </button>
                            </span>
                            <input type="text" class="form-control input-number px-0 text-center" value="1" min="1" max="5" v-model="guestsCount">
                            <span class="input-group-append">
                                <button  type="button" class="btn btn-outline-secondary px-0 btn-number" :disabled="guestsCount >= tour.number_of_guests_max" data-type="plus" @click="onCounter($event)" data-field="guestsCount">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <a class="btn hunter-btn-orange ml-auto w-100" href="#" data-toggle="modal" data-target="#tourModal">Забронировать тур</a>
            </div>
        </div>
        <div class="container px-0 mx-0 mt-5">
            <h1 class="hunter-tours-h2 pb-3"><span>Туры</span> ближайшие</h1>
            <div class="card-deck">
                <div class="card border-0 col-lg-4 col-md-4 col-sm-6 col-12" v-for="(item, index) in tours" :key="item.id">
                    <div class="cutCorner-2">
                        <div class="hunter-images">
                            <img class="d-inline" src="/images/car.svg">
                            <img class="d-inline" src="/images/car.svg">
                        </div>
                        <img src="/images/bear.png" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body hunter-card-body">
                        <h5 class="card-title hunter-card-title">{{item.title}}</h5>
                        <p class="card-text">{{item.location.title}}</p>
                        <p class="card-text">{{item.days_av}}, с {{item.available_period_min}} до {{item.available_period_max}}</p>
                    </div>
                    <div class="">
                        <h5 class="hunter-text-orange">от {{ item.PriceFull }} руб</h5>
                    </div>
                </div>
            </div>
        </div>
        <hunter-tour-modal :tour="tour" :inhunters="count_hunters" :inguests="count_guests"></hunter-tour-modal>
    </div>
</template>

<script>
    export default {
        name: "tour",
        props: ['tour', 'days', 'tours'],
        data() {
            return {
                huntersCount: 1,
                guestsCount: 0
            }
        },
        computed: {
            count_hunters() {
                return this.huntersCount
            },
            count_guests() {
                return this.guestsCount
            },
            mainPic() {
                let pics = this.tour.pics;
                return pics.filter((item => item.type == 'main'))[0]
            },
            childPics() {
                let pics = this.tour.pics;
                return pics.filter((item => item.type == 'child'))
            }
        },
        mounted() {

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
