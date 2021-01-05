<template>
    <div class="py-3 hunter-desc-block">
        <div class="py-3">
            <h4 class="font-weight-bolder">О туре</h4>
            <p><span>Тур доступен в период</span> c {{ tour.available_period_min }} до {{tour.available_period_max}}</p>
            <p><span>Лучшее время для охоты</span> с 25 августа по 15 октября (не увидел откуда братғ)</p>
            <p><span>Трансфер {{tour.transfer_included ? '' : 'не'}} включен</span> в стоимость</p>
            <p><span>Оформление разрешения {{tour.license_included ? '' : 'не'}} входит</span> в стоимость </p>
            <div v-html="tour.description"></div>
        </div>
        <div class="py-3">
            <h4 class="font-weight-bolder">Трофеи</h4>
            <p>Бурый медведь</p>
            <p>{{tour.trophies}}</p>
            <p></p>
        </div>
        <div class="py-3">
            <h4 class="font-weight-bolder">Зона охоты</h4>
            <div v-html="tour.hunting_area"></div>
        </div>
        <div class="py-3">
            <h4 class="font-weight-bolder">Размещение</h4>
            <p class="text-justify">{{tour.accommodation}}</p>
        </div>
        <div class="py-3">
            <h4 class="font-weight-bolder">Удобства</h4>
            <ul class="list-unstyled row mx-0 hunter-list-adv">
                <li class="col-md-4"><img src="/images/electricity.svg"> Электричество</li>
                <li class="col-md-4"><img src="/images/wifi.svg"> Wi-fi</li>
                <li class="col-md-4"><img src="/images/bath.svg"> Ванная комната</li>
                <li class="col-md-4"><img src="/images/fridge.svg"> Холодильник</li>
                <li class="col-md-4"><img src="/images/kitchen.svg"> Кухня</li>
                <li class="col-md-4"><img src="/images/tv.svg"> Телевизор</li>
                <li class="col-md-4"><img src="/images/banya.svg"> Баня</li>
            </ul>
        </div>
        <div class="py-3">
            <h4 class="font-weight-bolder">Условия</h4>
            <div class="container" v-html="tour.conditions">

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "textBlock",
    props: ['tour'],
    data(){
        return{

        }
    },
    mounted() {
        console.log(this.tour)
    }
}
</script>

<style scoped>

</style>
