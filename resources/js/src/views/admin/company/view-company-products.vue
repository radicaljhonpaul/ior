<template>
    <div v-if="this.loading == true" id="overlay">
        <div id="text">
            Please wait for a while...
        </div>
        <div class="overlay__inner">
            <div class="overlay__content"><span class="spinner"></span></div>
        </div>
    </div>

    <div class="layout-px-spacing app-contacts">
        <teleport to="#breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Accounts</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>View Account</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </teleport>

        <div class="row layout-top-spacing">
            <div class="inv--head-section inv--detail-section">
                <div class="row">
                    <div class="col-sm-6 col-12 me-auto">
                        <div class="d-flex">
                            <img class="company-logo" src="@/assets/images/cork-logo.png" alt="company" />
                            <h3 class="in-heading align-self-center"> &nbsp; {{ company.legal_company_name }}</h3>
                        </div>
                    </div>


                    <div class="col-sm-6 align-self-center mt-3">
                        <p class="inv-street-addr">Address : {{ company.legal_company_address }}</p>
                        <p class="inv-email-address">City : {{ company.city }}</p>
                        <p class="inv-email-address">Country : {{ company.country }}</p>
                        <p class="inv-email-address">Zipcode : {{ company.zip }}</p>
                        <p class="inv-email-address">Business License : {{ company.business_license }}</p>
                    </div>

                </div>
            </div>

            <AddProduct :companyID="this.router.currentRoute.value.params.company_id"></AddProduct>

        </div>

    </div>
</template>
<style scoped>
    .searchable-container .switch {
        width: auto;
        height: auto;
    }
    .searchable-container .searchable-items.grid .items .user-profile .custom-checkbox {
        display: none !important;
    }
</style>

<script setup>
    import { computed, onMounted, ref } from 'vue';
    import '@/assets/sass/apps/contacts.scss';
    import '@/assets/sass/font-icons/fontawesome/css/regular.css';
    import '@/assets/sass/font-icons/fontawesome/css/fontawesome.css';
    import storeCompany from "../../../store/admin/company";
    import { useMeta } from '@/composables/use-meta';
    import { useRouter } from "vue-router";
    import store from "../../../store/index";
    useMeta({ title: 'Contact Profile' });

    const router = useRouter();
</script>


<script>
    import storeProducts from "../../../store/admin/product_registration";
    import Multiselect from '@vueform/multiselect'
    import '@suadelabs/vue3-multiselect/dist/vue3-multiselect.css';
    import AddProduct from '../../client/product_registration.vue';
    import { useRouter } from "vue-router";
    import { Modal } from 'bootstrap';

    export default {
        components: { Multiselect, AddProduct },
        data () {
            return {
                loading: false,
                router: useRouter(),
                columns: ref(['product_name', 'hs_code', 'asin', 'actions']),
                items: ref([]),
                company: ref([]),
                table_option: ref({
                    perPage: 10,
                    perPageValues: [5, 10, 20, 50],
                    skin: 'table table-hover',
                    columnsClasses: { actions: 'actions text-center' },
                    sortable: [],
                    pagination: { nav: 'scroll', chunk: 5 },
                    texts: {
                        count: 'Showing {from} to {to} of {count}',
                        filter: '',
                        filterPlaceholder: 'Search...',
                        limit: 'Results:',
                    },
                    resizableColumns: false,
                }),
                isOpen: ref(null),
                selected: null,
                product_heat_options: ['Yes', 'No'],

            }
        },
        methods: {
            getCompanyProducts(){
                storeCompany
                .dispatch("getCompanyProducts", this.router.currentRoute.value.params.company_id)
                .then((res) => {
                    this.company = res.data[0];
                    store.commit('setCompany', res.data[0]);
                    this.items = this.company.products;
                })
                .catch((err) => {
                // loading.value = false;
                // errorMsg.value = err.response.data.error;
                });
            },
        },
        mounted(){

        },
        created: function(){
            this.getCompanyProducts();

        }
    }
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
