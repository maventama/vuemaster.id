<template>
    <div>
        <layout-vue>
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
            levels: Array,
            courses: Object,
        },
        mounted(){
            
        }
    };
</script>
