<template>
    <div>
        <layout-vue>
            <div class="container mt-5" style="padding-bottom:200px;">
                <div class="row">
                    <div class="col-12 col-lg-8 mt-4">
                        <h1 class="text-light">
                            {{ course.title }}
                        </h1>
                        <hr style="color:#fff" />
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe v-if="active_buy.length || course.is_free == 'yes'" style="border:10px solid #B3E7CF;" width="100%" height="400px" class="embed-responsive-item" :src="'https://www.youtube.com/embed/' + this.video_active_data.link +'?rel=0'" allowfullscreen></iframe>
                            <div v-if="!active_buy.length && course.is_free != 'yes'" style="height:400px;display: grid;justify-content: center;align-content: center;" class="bg-gradient-vue">
                                <div>
                                    <h4>
                                        🔐 Buka pelajaran ini dengan berlangganan.
                                    </h4>
                                    <a href="/#pricing" class="btn btn-success mt-3">
                                        Berlangganan ⚡️
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-4" v-if="active_buy.length || course.is_free == 'yes'">
                            <button class="btn btn-primary" @click.prevent="
                            formMarkDone.post('/mark_as_done', {
                                preserveScroll: true,
                            })">
                                Tandai telah selesai
                            </button>
                            <hr style="color:#fff" />
                            <b class="text-white">
                                {{ video_active.title }}
                            </b>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-4">
                        <div v-if="course.roadmap_link">
                            <b class="text-white">
                                Roadmap
                            </b>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-grid gap-2">
                                        <a href="" class="btn btn-success" target="_blank">
                                            🗺️ Roadmap
                                        </a>
                                    </div>
                                    <hr style="color:#fff" />
                                </div>
                            </div>
                        </div>
                        <h4 class="text-light">
                            Pembelajaran
                        </h4>
                        <hr style="color:#fff" />
                        <div class="wrapper-videos">
                            <div class="row" style="padding:0;margin:0;">
                                <div class="col-12" style="padding:0;margin:0;">
                                    <div class="d-grid gap-2 mt-2" v-for="video in videos" :key="video.id">
                                        <button class="btn" :class="(video_active_data.id == video.id ? 'btn-outline-warning' : (video.status_watch ? 'btn-success' : 'btn-light'))" @click="updateIframeVideo(video)">
                                            {{ video.title }}
                                        </button>
                                    </div>
                                </div>
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
        const active_buy = usePage().props.value.active_buy;
        return {user, active_buy};
    },
    components:{
        LayoutVue
    },
    props:{
        course:Object,
        video_active:Object,
        videos: Array
    },
    data(){
        return {
            video_active_data: this.video_active,
            formMarkDone: useForm({
                video_id: this.video_active.id,
                course_id: this.video_active.course_id,
            })
        }
    },
    methods:{
        updateIframeVideo(video){
            // console.log(this.video_active, video)
            // this.video_active_iframe = 'https://www.youtube.com/embed/' + video.link +'?rel=0';
            this.video_active_data = video;
        }
    },
    mounted(){
        
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