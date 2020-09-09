<template>
    <div id="app-container">
        <app-header />
        <nav-container />
        <router-view />
        <app-footer />
    </div>
</template>

<script>

import AppHeader from 'components/App/Header';
import AppFooter from 'components/App/Footer';
import NavContainer from 'components/Nav/Container';

export default {
    name: 'app-container',

    components: {
        AppHeader,
        AppFooter,
        NavContainer,
    },
};

</script>
