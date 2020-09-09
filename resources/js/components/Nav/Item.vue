<template>
    <router-link :to="path" v-slot="{ href, route, navigate, isActive, isExactActive }">
        <li class="nav-link">
            <a :href="href">{{ text }}</a>
        </li>
    </router-link>
</template>

<script>

export default {
    name: 'nav-link',

    props: {
        path: { required: true, type: String },
        text: { required: true, type: String },
    },
}

</script>
