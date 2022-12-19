<template>
    <div>
        <layout-vue>
            <div class="container mt-5" style="padding-bottom:200px;">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-4">
                        <h2 class="text-vue">
                            Login
                        </h2>
                        <div class="card mt-5">
                            <div class="card-body">
                                <form method="post" @submit.prevent="submitLogin()">
                                    <div v-if="plan">
                                        <div class="alert alert-info">
                                            <small>
                                                🛒 Kamu sedang memilih paket <b>{{ plan.package_name }}</b> sebesar <b>Rp. {{ plan.pricing_promo }}</b>. Masuk/Daftar untuk melakukan pembayaran.
                                            </small>
                                            <br>
                                            <a :href="plan ? '/#pricing?buy_plan=' + plan.id : '/#pricing'" class="badge text-bg-warning mt-2 mb-2 me-2">
                                                🔄 Ganti
                                            </a>
                                            <a href="/login" class="badge text-bg-danger mt-2 mb-2 ">
                                                🗑️ Hapus
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="email">Email</label>
                                        <input v-model="form.email" type="email" class="form-control" name="email">
                                        <small class="text-danger mt-2" v-if="form.errors.email">{{ form.errors.email }}</small>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="password">Password</label>
                                        <input v-model="form.password" type="password" class="form-control" name="password">
                                        <small class="text-danger mt-2" v-if="form.errors.password">{{ form.errors.password }}</small>
                                    </div>
                                    <div class="d-grid gap-2 mt-3">
                                        <button class="btn btn-success" type="submit">
                                            Masuk
                                        </button>
                                        <small class="text-muted">Belum punya akun?</small>
                                        <a :href="!plan ? '/register' : '/register?buy_plan=' + plan.id" class="btn btn-sm btn-outline-warning">
                                            Daftar
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </layout-vue>
    </div>
</template>
<script>
import LayoutVue from './Layout.vue';
import { useForm } from '@inertiajs/inertia-vue3'
import notie from 'notie';
export default {
    setup () {
        const form = useForm({
            email: null,
            password: null,
            buy_plan_id: null
        })
        return { form }
    },
    props:{
        sr:'',
        pl:'',
        buy_plan_id:'',
        plan: Object
    },  
    components:{
        LayoutVue
    },
    mounted(){
        if(this.sr == 't'){
            notie.alert({
                type: 'success',
                text: 'Berhasil daftar, silakan verifikasi email anda!',
                stay: false,
                time: 3,
                position: 'top'
            })
        }
        if(this.pl == 't'){
            notie.alert({
                type: 'error',
                text: 'Email atau password salah!',
                stay: false,
                time: 3,
                position: 'top'
            })
        }
    },
    methods:{
        submitLogin(){
            this.form.buy_plan_id = this.plan ? this.plan.id : null;
            this.form.post('/process_login', {
                preserveScroll: true,
                onSuccess: () => this.form.reset('password'),
            })
        }
    }
};
</script>
<style>
.wrapper-videos{
    height: 200px;
    width: 100%;
    overflow-y: auto;
}
</style>