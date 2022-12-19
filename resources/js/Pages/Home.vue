<template>
    <div>
        <layout-vue>
            <section id="hero">
                <div class="container-fluid">
                    <div class="row mt-5 justify-content-center">
                        <div class="col-12 text-center">
                            <p class="text-light">
                                Introducing 👋 <span class="text-vue">VueMaster.Id</span>
                            </p>
                        </div>
                        <div class="col-12 col-sm-8 text-center mt-4">
                            <h1 class="text-vue">
                                Tingkatkan keterampilan Anda dengan tutorial Vue berkualitas tinggi.
                            </h1>
                        </div>
                        <div class="col-12 col-sm-6 text-center mt-4">
                            <p class="text-white">
                                Memandu dan memudahkan kamu untuk belajar dengan jelas dan berbahasa Indonesia serta
                                dilengkapi roadmap yang tersedia, lengkap, juga terbaru.
                            </p>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <a href="https://tally.so/r/3jeWB9" target="_blank" class="btn btn-success">
                                Join waiting list 👉
                            </a>
                            <a href="#pricing" class="btn btn-warning">
                                Harga Launching 💥
                            </a>
                            <!-- <a href="" class="btn btn-success">
                            Dapatkan akses pembelajaran semua resources.
                        </a>
                        <br>
                        <a href="" class="btn btn-link mt-3">
                            Minta akses gratis.
                        </a> -->
                        </div>
                        <div class="col-12 mt-5 text-center">
                            <small class="text-muted">
                                Kenalan sama kreatornya 👋
                            </small>
                            <br>
                            <br>
                            <iframe style="border: 10px solid #20D787;border-radius: 10px;" width="80%" height="415"
                                src="https://www.youtube.com/embed/OHZJeR30GNQ" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-5" id="level-1" v-for="level in levels" :key="level.id">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-vue">
                                {{ level.level_name }}
                            </h1>
                        </div>
                    </div>
                    <div class="row" v-if="courses[level.id].length">
                        <a :href="('/course/' + course.id)" class="text-dark" style="text-decoration:none;" v-for="course in courses[level.id]" :key="course.id">
                            <div class="col-12 col-sm-4 mt-4">
                                <div class="card bg-green-vue">
                                    <div v-if="course.is_free == 'yes'" class="text-center bg-warning card-header">
                                        FREE
                                    </div>
                                    <div v-if="course.is_free == 'no'" class="text-center bg-success card-header">
                                        PREMIUM
                                    </div>
                                    <img src="/assets/launch_frame.png" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <h4>
                                            {{ course.title }}
                                        </h4>
                                        <p>
                                            {{ course.body }}
                                        </p>
                                        <div>
                                            <img src="/assets/clock.svg" alt=""> {{ course.time_course }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <section id="pricing" class="mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="text-vue">
                                Harga
                            </h1>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-12 col-sm-4 mt-4" v-for="pricing in pricings" :key="pricing.id">
                            <div class="card">
                                <div class="card-header text-center bg-danger text-white" v-if="pricing.pricing_label">
                                    <b>
                                        {{ pricing.pricing_label }}
                                    </b>
                                </div>
                                <div class="card-body">
                                    <div class="time-price">
                                        {{ pricing.package_name }}
                                    </div>
                                    <small class="text-muted">
                                        {{ pricing.package_desc }}
                                    </small>

                                    <h3 class="mt-4">
                                        {{ pricing.pricing_promo }}
                                    </h3>
                                    <h5 class="text-muted">
                                        <s>{{ pricing.price }}</s>
                                    </h5>
                                    <small class="text-muted">*) Harga kembali normal setelah 100 slot terisi setelah
                                        launching.</small>
                                    <hr>
                                    <div class="mt-3 text-muted" v-for="feature in pricing.pricing_features" :key="feature.id">
                                        <img src="/assets/check.svg" alt=""> {{ feature.name }}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2">
                                        <a :href="pricing.payment_link" target="_blank" class="btn btn btn-success" @click="showAlertLogin($event, pricing.payment_link)">
                                            Pilih plan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-5" id="cheat_sheets">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-vue">
                                Cheat Sheets
                            </h1>
                            <p class="text-muted">
                                Hemat waktu dan energi.
                            </p>
                        </div>
                        <div class="col-12 col-sm-2" v-for="cc in cheat_sheets.data" :key="cc.id">
                            <a :href="'/storage/' + cc.download_link">
                                <img :src="'/storage/' + cc.image_preview" alt="" style="width:100%;">
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- <section class="mt-5" id="short_tip">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-vue">
                                Short tip
                            </h1>
                            <p class="text-muted">
                                Short tip yang bikin kamu makin pro.
                            </p>
                        </div>
                        <div class="col-12">
                            <div class="alert alert-warning text-center">
                                Tersedia saat launching nanti.
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
        </layout-vue>
    </div>
</template>
<script>
    import Navbar from '../Components/Navbar.vue';
    import LayoutVue from './Layout.vue';
    import { usePage } from '@inertiajs/inertia-vue3'
    import { computed } from 'vue'
    export default {
        setup() {
            const user = computed(() => usePage().props.value.auth.user)
            return { user }
        },
        components:{
            Navbar,
            LayoutVue
        },
        props:{
            levels: Array,
            courses: Object,
            pricings: Array,
            cheat_sheets: Array
        },
        mounted(){
        },
        methods:{
            showAlertLogin(event, url){
                if (!this.user) {
                    event.preventDefault();
                    window.location.href = '/login?buy_plan=1';
                }else{
                    window.location.href = url;
                }
            }
        }
    };
</script>
