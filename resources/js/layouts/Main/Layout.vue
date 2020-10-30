<template>
    <div id="main-layout">
        <main-header />
        <slot />
        <main-footer />
    </div>
</template>

<script>

import MainHeader from 'layouts/Main/Header';
import MainFooter from 'layouts/Main/Footer';

export default {
    name: 'main-layout',

    components: {
        MainHeader,
        MainFooter,
    },
}

</script>
