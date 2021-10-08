<template>
    <div class="container">
        <div v-for="apartment in filtederApartments" :key="apartment.id">
            {{ apartment.title }}
        </div>
    </div>
</template>

<script>
    export default {
        props:['filtederApartments'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>