<template>
    <div>
        <navbar></navbar>
        <slot></slot>
        <footer class="mt-5" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 text-white">
                        <img src="/assets/vuemaster.png" alt="" width="100"> <br>
                        <h4>VueMaster.id</h4>
                        <p class="mt-3">
                            Sebagai sumber utama untuk pengembang Vue.js Indonesia, VueMaster.id menyediakan
                            pembelajaran untuk sukses sebagai pengembang Vue js.
                        </p>
                    </div>
                    <div class="col-12 col-sm-3">
                        <h4 class="text-white">VUE MASTERY</h4>
                        <hr style="color: #fff">
                        <a href="" class="text-white mt-3">
                            Kelas
                        </a>
                        <br>
                        <br>
                        <a href="" class="text-white mt-3">
                            Cheat sheets
                        </a>
                        <br>
                        <br>
                        <a href="" class="text-white mt-3">
                            Harga
                        </a>
                        <br>
                        <br>
                    </div>
                    <div class="col-12 col-sm-3">
                        <h4 class="text-white">TENTANG</h4>
                        <hr style="color: #fff">
                        <!-- <a href="" class="text-white mt-3">
                        Tentang
                    </a>
                    <br>
                    <br> -->
                        <a href="https://wa.me/6285158513669" class="text-white mt-3">
                            Kontak
                        </a>
                        <br>
                        <br>
                        <!-- <a href="" class="text-white mt-3">
                        Privacy & Policy
                    </a>
                    <br>
                    <br> -->
                    </div>
                    <div class="col-12 mt-5 text-center text-white">
                        &copy; Copyright 2022. Part of <a href="https://maventama.com">MavenTama</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div></div>
</template>
<script>
    import Navbar from '../Components/Navbar.vue';
    import {usePage} from "@inertiajs/inertia-vue3";
    import {computed, watch} from "vue";
    import notie from 'notie';
    export default {
        setup(){
            const alert = computed(() => usePage().props.value.flash.alert);
            if(alert.value){
                for (let i = 0; i < alert.value.length; i++) {
                    const alertMessage = alert.value[i];
                    notie.alert({
                        type: alertMessage.type,
                        text: alertMessage.message,
                        stay: false,
                        time: 3,
                        position: 'top'
                    })   
                }
            }
        },
        components:{
            Navbar,
        },
        props:{
            
        },
        mounted(){
            
        }
    };
</script>