<template>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand font-righteous" href="/#">
                <img src="/assets/vuemaster.png" alt="logo vuemaster" width="40">
                VueMaster.id
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#level-1">Roadmap</a>
                    </li>
                    <li class="nav-item" v-if="user">
                        <a class="nav-link" href="/#">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-vue" href="/#pricing">Harga Launching</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/#cheat_sheets">Cheat sheet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#">Short tip</a>
                    </li> -->
                </ul>
                <a href="/register" class="btn btn-outline-success" v-if="!user">
                    Daftar
                </a>
                <a href="/login" class="btn btn-primary" v-if="!user">
                    Masuk
                </a>
                <a href="/profile" class="btn btn-success" v-if="user">
                    Profil
                </a>
            </div>
        </div>
    </nav>
</template>
<script>
import { usePage } from '@inertiajs/inertia-vue3'
import { computed } from 'vue'

export default {
    setup() {
        const user = computed(() => usePage().props.value.auth.user)
        return { user }
    },
};
</script>