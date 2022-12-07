<template>
    <div>
        <layout-vue>
            <div class="container mt-5" style="padding-bottom:200px;">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-light">
                            Profil
                        </h1>
                        <a href="" class="btn btn-danger btn-sm" @click.prevent="
                        formLogout.post('/logout', {
                            preserveScroll: true,
                            onSuccess: () => form.reset('password'),
                        })">
                            Logout
                        </a>
                        <hr style="color:#fff" />
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                General
                            </div>
                            <div class="card-body">
                                <form method="post" @submit.prevent="form.post('/process_update_profile', {
                                    preserveScroll: true,
                                    onSuccess: () => form.reset('password'),
                                })">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input v-model="form.name_user" type="text" class="form-control" name="name_user">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="email">Email</label>
                                        <input v-model="form.email" type="email" class="form-control" name="email">
                                    </div>
                                    <button class="btn btn-primary mt-3" type="submit">
                                        Save
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Ubah Password
                            </div>
                            <div class="card-body">
                                <form method="post" @submit.prevent="formUpdatePassword.post('/process_update_password', {
                                    preserveScroll: true,
                                    onSuccess: () => form.reset('password'),
                                })">
                                    <div class="form-group">
                                        <label for="old_password">Old Password</label>
                                        <input v-model="formUpdatePassword.old_password" type="password" class="form-control" name="old_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input v-model="formUpdatePassword.password" type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input v-model="formUpdatePassword.password_confirmation" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                    <button class="btn btn-primary mt-3" type="submit">
                                        Save
                                    </button>
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
import { usePage } from '@inertiajs/inertia-vue3'

export default {
    setup () {
        const user = usePage().props.value.auth.user;
        const form = useForm({
            email: user.email,
            name_user: user.name,
        })
        const formUpdatePassword = useForm({
            old_password: null,
            password: null,
            password_confirmation: null,
        })
        const formLogout = useForm({
        })
        return { form, user, formUpdatePassword, formLogout }
    },
    components:{
        LayoutVue
    },
    props:{
    },
    methods:{
    }
};
</script>