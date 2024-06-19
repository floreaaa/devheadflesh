<template>
    <img :src="logo" alt="">
</template>

<script>
import logo from '/public/images/logo.jpg';

export default {
    data: function () {
        return {
            logo
        }
    }
}
</script>

<style>
.h-9 {
    height: 4.0rem;
}
</style>