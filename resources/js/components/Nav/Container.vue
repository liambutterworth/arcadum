<template>
    <nav id="app-navbar">
        <nav-logo />

        <nav-list>
            <nav-item path="/" text="Home" />
            <nav-item path="/characters" text="Characters" />
        </nav-list>
    </nav>
</template>

<script>

import NavList from 'components/Nav/List';
import NavLogo from 'components/Nav/Logo';
import NavItem from 'components/Nav/Item';

export default {
    name: 'nav-container',

    components: {
        NavList,
        NavLogo,
        NavItem,
    },
}

</script>
