<template>
    <div>
        <carousel :autoplay="true" :centerMode="true" :loop="true" :perPage="1" paginationColor="#034f84" paginationActiveColor="#FF8964">
            <slide v-for="apa in apartments" :key="apa.id">
                <a :href='`home/${apa.id}`'>
                    <div class="container-card" :style="'background-image:url('+apa.img_path+')'">
                    <div class="sponsor-tag text-capitalize">in evidenza</div>
                        <h1>{{apa.title}}</h1>
                    </div>
                </a>
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
}
</script>

<style lang="scss" scoped>
    .container-card{
        width: 100%;
        height: 600px;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        box-shadow: 10px 10px 10px #ff8964 ;
        position: relative;
        overflow: hidden;

        h1{
            background-color: rgba($color: #000000, $alpha: 0.7);
            width: 100%;
            color: #ff8964;
            padding: 12px 0;
        }

        div{
            background-image: linear-gradient(
        to right,
        #fc6076,
        #ff9a44,
        #ef9d43,
        #e75516
      );
            position: absolute;
            top: 40px;
            left: -40px;
            transform: rotate(-45deg);
            width: 200px;
            text-align: center;
            color: #034f84;
        }
    }
</style>