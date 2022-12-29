<style>
    body{
        background: #f1f2f3 !important;
    }
</style>
<template>
    <div>
        <!--  BEGIN NAVBAR  -->
        <Header></Header>
        <!--  END NAVBAR  -->

        <!--  BEGIN MAIN CONTAINER  -->
        <div
            class="main-container"
            id="container"
            :class="[!$store.state.is_show_sidebar ? 'sidebar-closed sbar-open' : '', $store.state.menu_style === 'collapsible-vertical' ? 'collapsible-vertical-mobile' : '']"
        >
            <!--  BEGIN OVERLAY  -->
            <div class="overlay" :class="{ show: !$store.state.is_show_sidebar }" @click="$store.commit('toggleSideBar', !$store.state.is_show_sidebar)"></div>
            <div class="search-overlay" :class="{ show: $store.state.is_show_search }" @click="$store.commit('toggleSearch', !$store.state.is_show_search)"></div>
            <!-- END OVERLAY -->

            <!--  BEGIN SIDEBAR  -->
            <Sidebar></Sidebar>
            <!--  END SIDEBAR  -->

            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <router-view />

                <!-- BEGIN FOOTER -->
                <Footer></Footer>
                <!-- END FOOTER -->
            </div>
            <!--  END CONTENT AREA  -->

            <!-- BEGIN APP SETTING LAUNCHER -->
            <!-- END APP SETTING LAUNCHER -->
        </div>
    </div>
</template>

<script setup>
    import Header from '@/components/layout/client/header.vue';
    import Sidebar from '@/components/layout/client/sidebar.vue';
    import Footer from '@/components/layout/client/footer.vue';
</script>

<script>
    import Multiselect from '@vueform/multiselect'
    import { useStore } from 'vuex';
    import { useRouter } from "vue-router";
    import { computed, ref } from 'vue';

    export default {
        components: { Multiselect },
        data () {
            return {
                router: useRouter(),
                store: useStore(),
                user: ref({})
            }
        },
        methods: {
            getCurrentUserData(){
                this.store.dispatch("getUser")
                .then((res) => {
                    console.log("app-layout-admin.vue --- getCurrentUserData");
                    console.log(res.data);
                    this.user = res.data;
                })
                .catch((err) => {
                    console.log(err);
                    // loading.value = false;
                    // errorMsg.value = err.response.data.error;
                });
            },
        },
        created: function(){
            this.getCurrentUserData();

        }
    }
</script>
