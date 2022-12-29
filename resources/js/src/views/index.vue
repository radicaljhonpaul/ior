<template>
    <div v-if="loading" class="flex justify-center">Loading...</div>
    <ComingSoon></ComingSoon>
</template>

<script setup>
    import ComingSoon from '@/views/pages/coming_soon.vue';
    import '@/assets/sass/widgets/widgets.scss';
    import { computed, ref } from 'vue';
    import { useStore } from 'vuex';
    import ApexChart from 'vue3-apexcharts';

    import { useMeta } from '@/composables/use-meta';
    useMeta({ title: 'Welcome' });

    const store = useStore();

</script>
