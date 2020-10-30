<template>
    <div class="campaigns">
        <!-- <campaign&#45;table :campaigns="campaigns" /> -->
    </div>
</template>

<script>

// import CampaignTable from 'components/Campaign/Table';

export default {
    data() {
        return {
            campaigns: [],
        },
    },

    mounted() {
        this.$api.get('campaigns').get(response => {
            this.campaigns = response.data;
        });
    },
}

</script>
