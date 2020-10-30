<template>
    <div id="admin-layout">
        <admin-header />
        <slot />
        <admin-footer />
    </div>
</template>

<script>

import AdminHeader from 'layouts/Admin/Header';
import AdminFooter from 'layouts/Admin/Footer';

export default {
    name: 'admin-nav',

    components: {
        AdminHeader,
        AdminFooter,
    },
}

</script>
