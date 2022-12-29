<template>
    <div v-if="this.loading == true" id="overlay">
        <div id="text">
            Please wait for a while...
        </div>
        <div class="overlay__inner">
            <div class="overlay__content"><span class="spinner"></span></div>
        </div>
    </div>

    <div class="layout-px-spacing dash_1">
        <teleport to="#breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <!-- <li class="breadcrumb-item"><a href="javascript:;">Admin</a></li> -->
                                <li class="breadcrumb-item active" aria-current="page"><span>Accounts</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </teleport>

        <div class="row layout-top-spacing">
            <!-- <img :src="'storage/product_registrations/1/1/certificate_country_of_origin_product.png'" /> -->
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="row mt-3">
                    <p class="fs-4 fw-bold"> Accounts </p>
                </div>
                <div class="panel br-6 p-0">
                    <div class="custom-table">
                        <v-client-table :data="items" :columns="columns" :options="table_option" @row-click="this.onRowClick">
                            <template #beforeFilter>
                                <router-link to="/admin/add-account" class="btn me-2 btn-primary"
                                    ><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-plus"
                                    >
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    Add Account
                                </router-link>

                            </template>
                            <template #actions="props">
                                <div class="actions text-center">
                                    <a href="javascript:;" class="cancel" @click.stop @click="show_edit_row(props.row)">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    &nbsp;
                                    <a href="javascript:;" class="cancel" @click.stop @click="delete_row(props.row)">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </template>
                        </v-client-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="updateCompanyModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content mailbox-popup">
                <div class="modal-header">
                    <h5 class="modal-title">Update Account Information</h5>
                    <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form id="updateCompanyModalTitle">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-4">
                                            <p class="fs-6 fw-bold"> Sales Company </p>
                                        </div>

                                        <div class="d-flex flex-column">

                                            <!-- row 1 -->
                                            <div class="d-flex justify-content-between">
                                                <div class="form-group flex-fill">
                                                    <label for="" class="fs-7"> Legal Company Name  <code>*</code> </label>
                                                    <input v-model="company.legal_company_name" type="text" class="form-control" placeholder="Legal Company Name" aria-label="Legal Company Name" aria-describedby="Legal Company Name" :class="[this.is_submit_update_company_form ? (company.legal_company_name ? 'is-valid' : 'is-invalid') : '']"/>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please fill the Legal Company Name</div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <div class="form-group flex-fill">
                                                    <label for="" class="fs-7"> Brand Name  <code>*</code> </label>
                                                    <input v-model="company.brand_name" type="text" class="form-control" placeholder="Brand Name" aria-label="Brand Name" aria-describedby="Brand Name" :class="[this.is_submit_update_company_form ? (company.brand_name ? 'is-valid' : 'is-invalid') : '']"/>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please fill the Brand Name</div>
                                                </div>
                                            </div>

                                            <!-- row 2 -->
                                            <div class="d-flex justify-content-between">
                                                <div class="form-group flex-fill">
                                                    <label for="" class="fs-7"> Legal Company Address  <code>*</code> </label>
                                                    <input v-model="company.legal_company_address" type="text" class="form-control" placeholder="Legal Company Address" aria-label="Legal Company Address" aria-describedby="Legal Company Address" :class="[this.is_submit_update_company_form ? (company.legal_company_address ? 'is-valid' : 'is-invalid') : '']"/>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please fill the Legal Company Address</div>
                                                </div>
                                            </div>

                                            <!-- row 3 -->
                                            <div class="d-flex gap-2">
                                                <div class="form-group" style="width: 50%">
                                                    <label for="" class="fs-7"> City  <code>*</code> </label>
                                                    <input v-model="company.city" type="text" class="form-control" placeholder="City" aria-label="City" aria-describedby="City" :class="[this.is_submit_update_company_form ? (company.city ? 'is-valid' : 'is-invalid') : '']"/>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please fill the City</div>
                                                </div>

                                                <div class="form-group" style="width: 50%">
                                                    <label for="" class="fs-7"> Country  <code>*</code> </label>
                                                    <Multiselect
                                                    v-model="company.country"
                                                    placeholder="Select a country"
                                                    label="name"
                                                    trackBy="name"
                                                    :options="options"
                                                    :searchable="true"
                                                    :class="[this.is_submit_update_company_form ? (company.country ? 'is-valid' : 'is-invalid') : '']">
                                                    </Multiselect>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please fill the Country</div>
                                                </div>
                                            </div>

                                            <!-- row 4 -->
                                            <div class="d-flex gap-2">
                                                <div class="form-group" style="width: 50%">
                                                    <label for="" class="fs-7"> Zipcode  <code>*</code> </label>
                                                    <input v-model="company.zip" type="text" class="form-control" placeholder="Zipcode" aria-label="Zipcode" aria-describedby="Zipcode" :class="[this.is_submit_update_company_form ? (company.zip ? 'is-valid' : 'is-invalid') : '']"/>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please fill the Zipcode</div>
                                                </div>

                                                <div class="form-group" style="width: 50%">
                                                    <label for="" class="fs-7"> Business License No.  <code>*</code> </label>
                                                    <input v-model="company.business_license" type="text" class="form-control" placeholder="Business License No." aria-label="Business License No." aria-describedby="Business License No." :class="[this.is_submit_update_company_form ? (company.business_license ? 'is-valid' : 'is-invalid') : '']"/>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please fill the Business License No.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary" @click="update_company()">Update</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
    import { onMounted, ref } from 'vue';
    import { useMeta } from '@/composables/use-meta';
    import store from "../../../store/index";
    import storeCompany from "../../../store/admin/company";
    import { useRouter } from "vue-router";
    const router = useRouter();

    useMeta({ title: 'Basic Table' });

    const columns = ref(['legal_company_name', 'legal_company_address', 'city', 'country', 'zip', 'business_license', 'actions']);
    const items = ref([]);
    const table_option = ref({
        perPage: 10,
        perPageValues: [5, 10, 20, 50],
        skin: 'table table-hover',
        columnsClasses: { actions: 'actions text-center' },
        rowClasses: { actions: 'actions pe-auto' },
        sortable: ['company_name', 'company_address', 'city', 'country', 'zip', 'business_license'],
        pagination: { nav: 'scroll', chunk: 5 },
        texts: {
            count: 'Showing {from} to {to} of {count}',
            filter: '',
            filterPlaceholder: 'Search...',
            limit: 'Results:',
        },
        resizableColumns: false,
    });
    const isOpen = ref(null);
    onMounted(() => {
        bind_data();
    });

    const bind_data = () => {
        storeCompany.dispatch("getCompanies")
        .then((res) => {
                // console.log(res)
                items.value = res.data;

            })
            .catch((err) => {
                    // loading.value = false;
                    // errorMsg.value = err.response.data.error;
                    });

        };

    // const delete_row = (item) => {
    //     if (confirm('Are you sure want to delete selected row ?')) {
    //         items.value = items.value.filter((d) => d.id != item.id);
    //     }

    // };

    const view_row = (item) => {
        storeCompany
            .dispatch("getCompany", item.id)
            .then((res) => {
            // loading.value = false;
                console.log(res)
                router.push({
                    name: "company",
                });

            })
            .catch((err) => {
            // loading.value = false;
            // errorMsg.value = err.response.data.error;
            });
    };

    // const edit_row = (item) => {
    //     // if (confirm('Are you sure want to delete selected row ?')) {
    //     //     items.value = items.value.filter((d) => d.id != item.id);
    //     // }
    //     alert(item.id)
    // };

    // const handleClick = (item) => {
    //     alert('asd')
    // }
</script>

<script>
    import Multiselect from '@vueform/multiselect'

    export default {
    components: { Multiselect },
    data () {
        return {
            loading: false,
            value: null,
            options: [],
            user:{
                fname: '',
                lname: '',
                email: '',
                contact_number: '',
                password: '',
                password_confirmation: '',
                role: 'primay_client',
                company_id: '',
            },
            company:{
                legal_company_name : '',
                brand_name : '',
                legal_company_address : '',
                city : '',
                country : null,
                zip : '',
                business_license : '',
            },
            updateCompanyModal : ref(null),
            is_submit_update_company_form : ref(false),
        }
    },
    mounted() {
            this.initPopup();
            var element = document.getElementById("admin-user-id");
            element.classList.remove("active");
        },
    methods: {
        showMessage (msg = '', type = 'error') {
            const toast = window.Swal.mixin({ toast: true, position: 'top', showConfirmButton: false, timer: 3000 });
            toast.fire({ icon: type, title: msg, padding: '10px 20px' });
        },
        addCompany(ev) {
            ev.preventDefault();
            storeCompany
                .dispatch("storeCompany", this.company)
                .then((res) => {
                // loading.value = false;
                    this.user.company_id = res.id;
                    console.log(this.user);
                    this.addUser(this.user);
                })
                .catch((err) => {
                // loading.value = false;
                // errorMsg.value = err.response.data.error;
                });
        },
        addUser(user) {
            // ev.preventDefault();
            store
                .dispatch("storeUser", user)
                .then((res) => {
                // loading.value = false;
                    console.log(res);
                // router.push({
                //     name: "companies",
                // });
                    window.location.href = 'account'
                })
                .catch((err) => {
                    console.log(err);
                // loading.value = false;
                // errorMsg.value = err.response.data.error;
                });
        },
        show_edit_row(item){
            // if (confirm('Are you sure want to delete selected row ?')) {
            //     items.value = items.value.filter((d) => d.id != item.id);
            // }
            // alert(item.id + 'asd')
            this.updateCompanyModal.show()
            storeCompany
                .dispatch("getCompany", item.id)
                .then((res) => {
                // loading.value = false;
                    // console.log(res);
                // router.push({
                //     name: "companies",
                // });
                    // window.location.href = 'companies'
                    this.company = res.data;
                })
                .catch((err) => {
                    // console.log(err);
                // loading.value = false;
                // errorMsg.value = err.response.data.error;
                });
        },
        update_company(){
            console.log(this.company);
            this.is_submit_update_company_form = true;
            this.loading = true;

            if (this.company.legal_company_name && this.company.brand_name && this.company.legal_company_address && this.company.city && this.company.country && this.company.zip && this.company.business_license) {
                //form validated success
                storeCompany
                .dispatch("updateCompany",this.company)
                .then((res) => {
                    this.loading = false;
                    this.updateCompanyModal.hide()
                    this.bind_data()
                })
                .catch((err) => {
                    // console.log(err);
                });

            }else{
                this.loading = false;
                this.showMessage('Please fill required fields.','error');
            }
        },
        initPopup(){
            this.updateCompanyModal = new window.bootstrap.Modal(document.getElementById('updateCompanyModal'));
        },
        delete_row(item){

            const swalWithBootstrapButtons = window.Swal.mixin({
                confirmButtonClass: 'btn btn-secondary',
                cancelButtonClass: 'btn btn-dark me-3',
                buttonsStyling: false,
            });
            swalWithBootstrapButtons
                .fire({
                    title: 'Are you sure?',
                    text: "Delete this account.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true,
                    padding: '2em',
                })
                .then((result) => {
                    if (result.value) {
                        storeCompany
                            .dispatch("destroyCompany",item.id)
                            .then((res) => {
                            // loading.value = false;
                                // console.log(res);
                            // router.push({
                            //     name: "companies",
                            // });
                                // window.location.href = 'companies'
                                swalWithBootstrapButtons.fire('Deleted!', 'Account has been deleted.', 'success');
                                this.bind_data()
                            })
                            .catch((err) => {
                                // console.log(err);
                            // loading.value = false;
                            // errorMsg.value = err.response.data.error;
                            });
                    } else if (result.dismiss === window.Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire('Cancelled', 'Delete Process Cancelled', 'error');
                    }
                });

        },
        onRowClick(event){
            // window.location.href = `/edit/hello-${event.row.id}`
            this.router.push({
                name: "account",
                params: { id: event.row.id }
            });
        }
    },
    created: function(){
        store.dispatch("getCountries")
        .then((res) => {
            res.data.forEach(element => {
                // console.log(element);
                this.options.push({'value': element.id, 'name': element.nicename });
            });

        })
    }
    }
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
<style>
    .VueTables__row{
        cursor: pointer;
    }
</style>
