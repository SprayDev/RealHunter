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
                <li class="col-md-4"  v-for="item in tour.facilities" :key="item.id">
                    <img :src="item.icon_svg">
                    {{item.title}}
                </li>
            </ul>
            <div>
                <img class="modal-image p-2" @click="openImage($event)" :src="item.path" alt=""
                     style="width:155px;max-width:255px"
                     v-for="item in fstImages" :key="item.id">
            </div>
        </div>
        <div class="py-3">
            <h4 class="font-weight-bolder">Условия</h4>
            <div class="container" v-html="tour.conditions">
            </div>
        </div>
        <div id="image_modal" class="modal">
            <span @click="closeImage($event)" class="close">&times;</span>
            <img class="modal-content" id="img01">
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
    computed: {
        fstImages(){
            let images = this.tour.pics;
            return  images.filter((item, index) => {
                return item.type == 'fst';
            })
        }
    },
    methods: {
        openImage(event){
            // Get the modal
            var modal = document.getElementById("image_modal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("img01");

            modal.style.display = "block";
            modalImg.src = event.target.src;
        },
        closeImage(event){
            var modal = document.getElementById("image_modal");
            modal.style.display = "none";
        }
    },
    mounted() {
        console.log(this.fstImages)
    }
}
</script>

<style scoped>
.modal-image {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.modal-image:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
