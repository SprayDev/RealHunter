<template>
    <nav class="navbar navbar-expand-lg bg-light hunter-nav">
        <!--hunter-container-header-->
        <div class="container">
            <a class="navbar-brand hunter-brand" href="/"><img src="/images/logotype.svg"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav hunter-navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/permissions">Разрешения</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tours">Туры</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blog">Блог</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/company">О Компании</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contacts">Контакты</a>
                    </li>
                </ul>
                <div class="hunter-phone">
                    <a class="nav-link" href="#">+7 912 350 50 50</a>
                </div>
            </div>
        </div>
    </nav>

</template>

<script>
export default {
    name: "header",
    props: ['url'],
    mounted() {
        let navbar = document.getElementById('navbarNav');
        let links = Array.from(navbar.querySelectorAll('.nav-link'));
        let regexp = new RegExp(this.url+'?', 'g')
        links.map((item, index) => {
            if ((item.href == this.url || this.url.includes(item.href)) && item.getAttribute('href') != '#')
            {
                item.classList.add('active')
            }
        })
    }
}
</script>

<style scoped>

</style>
