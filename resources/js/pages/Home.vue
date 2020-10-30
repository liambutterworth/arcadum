<template>
    <main-layout>
        <h1>Arcadum</h1>
    </main-layout>
</template>

<script>

export default {
    name: 'home',

    mounted() {
        this.$api.get('characters').get(response => {
            this.campaigns = response.data;
        });
    },
};

</script>
