<template>
    <div :class="[$store.state.layout_style, $store.state.menu_style]">
        <component v-bind:is="layout"></component>
    </div>
</template>

<script setup>
    import { computed } from 'vue';

    import '@/assets/sass/app.scss';

    import { useMeta } from '@/composables/use-meta';
    import { useStore } from 'vuex';

    useMeta({ title: 'Sales Admin' });

    const store = useStore();

    const layout = computed(() => {
        console.log(" From: App.vue ---> store.getters.layout");
        console.log(store.getters);
        console.log(store.getters.layout);
        return store.getters.layout;
    });
</script>

<script>
    // layouts
    import appLayout from './layouts/app-layout.vue';
    import authLayout from './layouts/auth-layout.vue';
    import welcomeLayout from './layouts/welcome-layout.vue';
    import adminLayout from './layouts/app-layout-admin.vue';
    import clientLayout from './layouts/app-layout-client.vue';

    export default {
        components: {
            app: appLayout,
            auth: authLayout,
            welcome: welcomeLayout,
            admin: adminLayout,
            client: clientLayout,
        },
    };
</script>
