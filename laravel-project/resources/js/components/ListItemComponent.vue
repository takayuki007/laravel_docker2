<template>
    <li class="u-li">
        <!--        <div class="u-li-img">img</div>-->
        <img :src="`${img}`" class="u-li-img">
        <a :href="`${shopLink}`" class="u-li-a">{{ name }}</a>
    </li>
</template>

<script>
export default {
    props: ['name','img', 'shopLink'],
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
