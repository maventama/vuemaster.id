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
                                <form method="post" @submit.prevent="form.post('/process_login', {
                                    preserveScroll: true,
                                    onSuccess: () => form.reset('password'),
                                })">
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
                                        <button class="btn btn-primary" type="submit">
                                            Masuk
                                        </button>
                                        <small class="text-muted">Belum punya akun?</small>
                                        <a href="/register" class="btn btn-sm btn-outline-primary">
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
        })
        return { form }
    },
    props:{
        sr:'',
        pl:'',
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