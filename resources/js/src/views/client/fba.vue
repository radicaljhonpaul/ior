<style></style>

<template>
    <div v-if="loading" class="flex justify-center">Loading...</div>
    <div class="layout-px-spacing dash_1">
        <teleport to="#breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Client</a></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav flex-row ms-auto">
                <li class="nav-item more-dropdown">
                    <div class="dropdown custom-dropdown-icon">
                        <a href="javascript:;" class="nav-link dropdown-toggle" id="ddlSettings" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Settings</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-chevron-down"
                            >
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="ddlSettings">
                            <li><a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Settings</a></li>
                            <li><a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a></li>
                            <li><a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a></li>
                            <li><a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a></li>
                            <li><a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </teleport>
        <div class="row mt-3">
            <p class="fs-4 fw-bold"> Create Shipping Invoice / FBA </p>
            <div class="col-12 my-0 py-0">
                <hr style="border:solid 1px #000;">
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget" >
                    <div class="widget-heading">
                        <h5>My Company Information</h5>
                    </div>

                    <div class="widget-content">
                        <div class="row">
                            <div class="col-md-12">
                                Test Company 1
                                12 West Bank Rd., Floodway,Maybunga
                                Pasig, Philippines, 1607
                                09776719354
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                Contact Person: <br>
                                Mike Coros
                            </div>
                        </div>
                        <br>
                        <div class="row">


                            <div class="col-md-12">
                                Business License #: <br>
                                12345
                            </div>
                        </div>
                        <br>
                        <div class="row">


                            <div class="col-md-12">
                                Contact Email: <br>
                                mike.coros02@gmail.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget" >
                    <div class="widget-heading">
                        <h5>Ship From</h5>

                    </div>

                    <div class="widget-content">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="fs-7">Company Name <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="fs-7">Phone <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="fs-7">Address <code>*</code> </label>
                                <textarea id="textarea" class="form-control form-control-sm" style="height:95px;"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="checkbox-success custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="chk_success" />
                                    <label class="custom-control-label" for="chk_success"> Same address as Company? </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-revenue">
                    <div class="widget-heading">
                        <h5>Destination</h5>

                    </div>

                    <div class="widget-content">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="fs-7">Recipient Name <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="fs-7">Company Name <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="fs-7">Phone <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm" />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="fs-7">Address <code>*</code> </label>
                                <textarea id="textarea" class="form-control form-control-sm" style="height:95px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="layout-px-spacing app-contacts">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h4>FBA <small>(FBA Approved products)</small></h4>
                </div>

                <div class="">
                    <button type="button" class="btn btn-dark rounded mb-2 me-2" data-bs-toggle="modal" data-bs-target="#productModal">
                        Add Item +
                    </button>
                </div>
            </div>
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="panel-body searchable-container" :class="[grid_type]">

                        <div class="searchable-items" :class="[grid_type]">
                            <div class="item-content">
                                <div class="row px-2 py-2 bg-white">
                                    <div class="form-group col-md-1 d-flex flex-column">
                                        <div>
                                            <label class="fs-7">ID</label>
                                            <input type="text" class="form-control form-control-sm" disabled/>
                                        </div>
                                        <div>
                                            <label class="fs-7">QTY</label>
                                            <input type="text" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-3 d-flex flex-column">
                                        <div>
                                            <label class="fs-7">Product Name</label>
                                            <input type="text" class="form-control form-control-sm" />
                                        </div>
                                        <div class="d-flex flex-row gap-1">
                                            <div>
                                                <label class="fs-7">DOSP</label>
                                                <input type="text" class="form-control form-control-sm" />
                                            </div>
                                            <div>
                                                <label class="fs-7">AODSP</label>
                                                <input type="text" class="form-control form-control-sm" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2 d-flex flex-column">
                                        <div>
                                            <label class="fs-7">SKU</label>
                                            <input type="text" class="form-control form-control-sm" disabled/>
                                        </div>
                                        <div>
                                            <label class="fs-7">AMZ SF</label>
                                            <input type="text" class="form-control form-control-sm" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2 d-flex flex-column">
                                        <div>
                                            <label class="fs-7">HS Code</label>
                                            <input type="text" class="form-control form-control-sm" disabled/>
                                        </div>
                                        <div>
                                            <label class="fs-7">AMZ FF</label>
                                            <input type="text" class="form-control form-control-sm" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2 d-flex flex-column">
                                        <div>
                                            <label class="fs-7">ASIN</label>
                                            <input type="text" class="form-control form-control-sm" disabled/>
                                        </div>
                                        <div>
                                            <label class="fs-7">TDOSP</label>
                                            <input type="text" class="form-control form-control-sm" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2 d-flex flex-column">
                                        <div>
                                            <label class="fs-7">Country of Origin</label>
                                            <input type="text" class="form-control form-control-sm" disabled/>
                                        </div>
                                        <div>
                                            <label class="fs-7">TAODSP</label>
                                            <input type="text" class="form-control form-control-sm" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <div class="row m-0" style="width: 300px;">
                                <div class="bg-light-dark text-white">
                                    <label for="">Total Declared Online Selling Price</label>
                                    <p class="fs-7">¥ 50,000.00</p>
                                </div>
                                <div class="bg-light-dark text-white">
                                    <label for="">AMZ Fees</label>
                                    <p class="fs-7">¥ 272.00</p>
                                </div>
                                <div class="bg-dark text-white">
                                    <label for="">Total Adjusted Selling Price</label>
                                    <p class="fs-7">¥ 47,728.00</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row gap-1">
                        <div class="">
                            <p class="fs-7">FOSR <i class="far fa-info"></i> </p>
                            <input type="file" class="form-control form-control-sm" />
                        </div>
                        <div class="">
                            <p class="fs-7">Simulator Report <i class="far fa-info"></i> </p>
                            <input type="file" class="form-control form-control-sm" />
                        </div>
                    </div>

                    <div class="d-flex flex-row gap-1" style="align-items:end;">
                        <div>
                            <button type="button" class="btn btn-dark">Save as Draft</button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-outline-dark">Back to Shipping Invoice List <i class="far fa-arrow-left"></i> </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="productModal" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content mailbox-popup">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Item</h5>
                        <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="add-contact-box">
                            <div class="add-contact-content">
                                <form id="addContactModalTitle">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-4">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-4">
                                                <label>SKU</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Email" />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-4">
                                                <label>SKU</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Email" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label>Occupation</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Occupation" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-4">
                                                <label>Phone</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Phone" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-0">
                                                <label>Location</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Location" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <!-- <button type="button" class="btn btn-primary" @click="save_user()">{{ params.id ? 'Update' : 'Add' }}</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { onMounted, ref } from 'vue';
    import { useMeta } from '@/composables/use-meta';
    import store from "../../store";
    import storeShippingInvoice from "../../store/client/shipping_invoice";
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
</script>

<script>
    import Multiselect from '@vueform/multiselect'
    import '@/assets/sass/font-icons/fontawesome/css/regular.css';
    import '@/assets/sass/font-icons/fontawesome/css/fontawesome.css';

    export default {
    components: { Multiselect },
    data () {
        return {
            loading: false,
            value: null,
            options: [],
            productModal: ref(null),
        }
    },
    mounted() {
        this.initPopup();
    },
    methods: {
        initPopup(){
            this.productModal = new window.bootstrap.Modal(document.getElementById('productModal'));
        },
        showMessage (msg = '', type = 'error') {
            const toast = window.Swal.mixin({ toast: true, position: 'top', showConfirmButton: false, timer: 3000 });
            toast.fire({ icon: type, title: msg, padding: '10px 20px' });
        },
        add_item() {
            console.log("add_item");
            this.productModal.show();
        },
        
    },
    created: function(){
        
    }
    }
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
<style>
    .VueTables__row{
        cursor: pointer;
    }
</style>
