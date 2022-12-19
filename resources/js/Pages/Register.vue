<template>
    <div>
        <layout-vue>
            <div class="container mt-5" style="padding-bottom:200px;">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-4">
                        <h2 class="text-vue">
                            Daftar
                        </h2>
                        <div class="card mt-5">
                            <div class="card-body">
                                <form method="post" @submit.prevent="submitRegister()">
                                    <div v-if="plan">
                                        <div class="alert alert-info">
                                            <small>
                                                🛒 Kamu sedang memilih paket <b>{{ plan.package_name }}</b> sebesar <b>Rp. {{ plan.pricing_promo }}</b>. Masuk/Daftar untuk melakukan pembayaran.
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input v-model="form.name_user" type="text" class="form-control" name="name">
                                        <small class="text-danger mt-2" v-if="form.errors.name_user">{{ form.errors.name_user }}</small>
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
                                            Daftar
                                        </button>
                                        <small class="text-muted">Sudah punya akun?</small>
                                        <a :href="!plan ? '/login' : '/login?buy_plan=' + plan.id" class="btn btn-sm btn-outline-warning">
                                            Masuk
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
export default {
    setup () {
        const form = useForm({
            email: null,
            password: null,
            name_user: null,
        })
        return { form }
    },
    components:{
        LayoutVue,
    },
    props:{
        buy_plan_id:'',
        plan: Object
    },
    methods:{
        submitRegister(){
            this.form.buy_plan_id = this.plan ? this.plan.id : null;
            this.form.post('/process_register', {
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