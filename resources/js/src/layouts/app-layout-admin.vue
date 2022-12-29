<style>
    body{
        background: #f1f2f3 !important;
    }

    #overlay {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5);
        z-index: 99999;
        cursor: pointer;
    }

    #text{
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: .9em;
        color: white;
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
    }

    .overlay__content {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .spinner {
        width: 75px;
        height: 75px;
        display: inline-block;
        border-width: 5px;
        border-color: rgba(255, 255, 255, 0.05);
        border-top-color: #fff;
        animation: spin 1s infinite linear;
        border-radius: 100%;
        border-style: solid;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
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
                <app-settings />
            <!-- END APP SETTING LAUNCHER -->

        </div>
    </div>
</template>

<script setup>
    // Head Sidebar and Footer
    import Header from '@/components/layout/admin/header.vue';
    import Sidebar from '@/components/layout/admin/sidebar.vue';
    import Footer from '@/components/layout/admin/footer.vue';
    import appSettings from '@/components/app-settings.vue';

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
