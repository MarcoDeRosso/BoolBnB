<template>
    <div>
        <carousel :autoplay="true" :centerMode="true" :loop="true" :perPage="1">
            <slide v-for="apa in apartments" :key="apa.id">
                <div class="container-card" :style="'background-image:url('+apa.img_path+')'">
                    <h1>{{apa.title}}</h1>
                </div>
            </slide>
        </carousel>
       
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
export default {
    name:'Slider',
    components: {
        Carousel,
        Slide
     },
     props:['apartments'],
        data() {
        return {
        }
    },

    methods:{
    }
}
</script>

<style lang="scss" scoped>
    .container-card{
        width: 100%;
        height: 500px;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        box-shadow: 10px 10px 10px #ff8964 ;
        h1{
            color: #ff8964;
            background-color: rgba($color: #000000, $alpha: 0.7);
            width: 100%;
            padding: 12px 0;
        }
    }
</style>