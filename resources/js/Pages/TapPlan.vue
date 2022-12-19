<template>
    <div>
        <layout-vue>
            <section class="mt-5" id="level-1">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>
                                        Akun anda berhasil dibuat.
                                    </h3>
                                    <p>
                                        Silakan klik tombol dibawah untuk lanjut ke halaman pembayaran.
                                    </p>
                                    <div class="alert alert-info">
                                        🛒 <b>Pembelian</b>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                {{ plan.package_name }}
                                            </div>
                                            <div class="col-6">
                                                {{ plan.pricing_promo }}
                                            </div>
                                            <div class="col-6">
                                                <b>Total</b>
                                            </div>
                                            <div class="col-6">
                                                <b>{{ plan.pricing_promo }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-grid gap-2">
                                                <a :href="plan.payment_link" class="btn btn-success">
                                                    Bayar 👉
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </layout-vue>
    </div>
</template>
<script>
    import Navbar from '../Components/Navbar.vue';
    import LayoutVue from './Layout.vue';
    export default {
        components:{
            Navbar,
            LayoutVue
        },
        props:{
            plan: Object
        },
        mounted(){
            
        }
    };
</script>
