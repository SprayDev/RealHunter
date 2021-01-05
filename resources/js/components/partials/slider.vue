<template>
    <div>
        <splide
            :options="primaryOptions"
            ref="primary"
        >
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/olen.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
        </splide>

        <splide
            :options="secondaryOptions"
            ref="secondary"
        >
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/olen.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
            <splide-slide>
                <img src="/images/bear_big.png" alt="slide.alt">
            </splide-slide>
        </splide>
    </div>
</template>

<script>
    import { Splide, SplideSlide } from '@splidejs/vue-splide';

    export default {
        name: "slider",
        components: {
            Splide,
            SplideSlide,
        },
        data() {
            return {
                primaryOptions: {
                    type       : 'fade',
                    heightRatio: 0.5,
                    pagination : false,
                    // fixedWidth  : 600,
                    // fixedHeight : 400,
                    arrows     : false,
                    cover      : true,
                },
                secondaryOptions: {
                    type        : 'slide',
                    rewind      : true,
                    fixedWidth  : 65,
                    fixedHeight : 41,
                    isNavigation: true,
                    gap         : 10,
                    focus       : 'center',
                    pagination  : false,
                    cover       : true,
                    breakpoints : {
                        '600': {
                            fixedWidth  : 66,
                            fixedHeight : 40,
                        }
                    }
                },
            }
        },
        mounted() {
            this.$refs.primary.sync( this.$refs.secondary.splide );
        }
    }
</script>

<style scoped>

</style>
