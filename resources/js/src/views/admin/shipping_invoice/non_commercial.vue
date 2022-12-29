<template>
    <div v-if="loading" class="flex justify-center">Loading...</div>
    <div class="layout-px-spacing dash_1">
        <teleport to="#breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
                                <li class="breadcrumb-item"><a href="javascript:;">Account</a></li>
                                <li class="breadcrumb-item"><a href="javascript:;">Shipping Invoice</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Non Commercial</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>

            <!-- <ul class="navbar-nav flex-row ms-auto">
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
            </ul> -->
        </teleport>
        <div class="row mt-3">
            <p class="fs-4 fw-bold"> Create Shipping Invoice (<small>Non-Commercial</small>)</p>
        </div>
        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

                <div class="widget" >
                    <div class="widget-heading">
                        <h5>My Company Information</h5>
                    </div>

                    <div class="widget-content">
                        <div class="row">
                            <div class="col-md-12">
                                {{this.company.legal_company_name}}
                                <br>
                                {{this.company.legal_company_address}}
                                <br>
                                {{this.company.city}}, {{this.company.country_name}}, {{this.company.zip}}
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
                                {{this.company.business_license}}
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
                                <label for="inputPassword4">Company Name <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm"/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Phone <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm"/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Address <code>*</code> </label>
                                <textarea id="textarea" class="form-control form-control-sm" style="height:95px;"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="checkbox-success custom-control custom-checkbox rounded">
                                    <input type="checkbox" class="custom-control-input" id="chkrd_default"/>
                                    <label class="custom-control-label" for="chkrd_default"> Same address as the Company?
 </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-revenue">
                    <div class="widget-heading">
                        <h5>Destination</h5>

                    </div>

                    <div class="widget-content">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Recipient Name <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm"/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Company Name <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm"/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Phone <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm"/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Address <code>*</code> </label>
                                <textarea id="textarea" class="form-control form-control-sm" style="height:95px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
        <div class="layout-px-spacing app-contacts">
            <h4>Non-Commercial Products</h4>
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="panel-body searchable-container" :class="[grid_type]">
                        <div class="row">


                            <div class="col-md-12">
                                <div class="" style="text-align: right;">

                                    <button @click="this.addItemProductModal.show();" type="button" class="btn btn-dark rounded-pill mb-2 me-2">
                                        Add Item +
                                    </button>

                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="searchable-items" :class="[grid_type]">

                                <div class="card item-content">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table role="table" aria-busy="false" aria-colcount="5" class="table table-bordered" id="__BVID__415">
                                                <thead role="rowgroup">
                                                    <tr role="row">
                                                        <td role="columnheader" scope="col" aria-colindex="1"><div>Product ID</div></td>
                                                        <td role="columnheader" scope="col" aria-colindex="2"><div>Product Name	</div></td>
                                                        <td role="columnheader" scope="col" aria-colindex="3"><div>Country of Origin	</div></td>
                                                        <td role="columnheader" scope="col" aria-colindex="3"><div>SKU	</div></td>
                                                        <td role="columnheader" scope="col" aria-colindex="3"><div>HS Code	</div></td>
                                                        <td role="columnheader" scope="col" aria-colindex="3"><div>QTY	</div></td>
                                                        <td role="columnheader" scope="col" aria-colindex="4"><div>Declared Value in Yen</div></td>
                                                        <td role="columnheader" scope="col" aria-colindex="5"><div>Total Declared Value in Yen	</div></td>
                                                        <td role="columnheader" scope="col" aria-colindex="5" aria-label="Action" class="text-center"><div></div></td>
                                                    </tr>
                                                </thead>
                                                <tbody role="rowgroup">
                                                    <tr v-for="item in table_1" :key="item.product_id" role="row">
                                                        <td aria-colindex="1" role="cell">{{ item.product_id }}</td>
                                                        <td aria-colindex="2" role="cell">{{ item.product_name }}</td>
                                                        <td aria-colindex="3" role="cell">{{ item.country_of_origin }}</td>
                                                        <td aria-colindex="4" role="cell">{{ item.sku }}</td>
                                                        <td aria-colindex="5" role="cell">{{ item.hscode }}</td>
                                                        <td aria-colindex="6" role="cell">{{ item.qty }}</td>
                                                        <td aria-colindex="7" role="cell">{{ item.declared_value }}</td>
                                                        <td aria-colindex="8" role="cell">{{ item.total_declared_value }}</td>
                                                        <td aria-colindex="9" role="cell" class="text-center">
                                                            <ul class="table-controls">
                                                                <li>
                                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" title="Edit">
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
                                                                            class="feather feather-edit-2"
                                                                        >
                                                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                                        </svg>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" title="Delete">
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
                                                                            class="feather feather-trash-2"
                                                                        >
                                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                        </svg>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <td aria-colindex="1" role="cell" colspan="9" style="text-align: right;">
                                                            Total Declared Online Selling Price
                                                            <br>
                                                            <h4>¥ <span>0.00</span></h4>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Supporting Document
                                            <code><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle" data-v-5522efca=""><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg></code>
                                        </label>
                                        <input id="product-image" type="file" class="form-control" @change="this.change_file_product_image" placeholder="Product Image" ref="file_product_image" :class="[this.is_submit_add_admin_user_form ? (product.product_image ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Product Name</div>
                                    </div>
                                </div>

                        </div>
                        <div class="row" style="text-align: right;">
                            <div class="col-md-4" style="text-align: right;width: 100%;">
                                <button type="button" class="btn btn-dark mb-2 me-1">Save Draft</button>
                                <button type="button" class="btn btn-success mb-2 me-1">Submit</button>
                                <button type="button" class="btn btn-default mb-2 me-1" @click="goToShippingInvoice()">Back to Shipping Invoices List</button>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div id="addItemProductModal" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content mailbox-popup">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Item</h5>
                                        <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="add-contact-box">
                                            <div class="add-contact-content">
                                                <form id="addItemProductModalTitle">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <label>Product Name</label>
                                                                <Multiselect
                                                                    v-model="product_item.name"
                                                                    placeholder="Select Product"
                                                                    label="name"
                                                                    trackBy="name"
                                                                    :options="options_products"
                                                                    :searchable="true"
                                                                    >
                                                                </Multiselect>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <label>Country of Origin</label>
                                                                <Multiselect
                                                                    v-model="product_item.country"
                                                                    placeholder="Select Country of Origin"
                                                                    label="name"
                                                                    trackBy="name"
                                                                    :options="options_countries"
                                                                    :searchable="true"
                                                                    >
                                                                </Multiselect>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <label>SKU</label>
                                                                <input type="text" v-model="product_item.sku" class="form-control" placeholder="SKU" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <label>HS Code</label>
                                                                <input type="text" v-model="product_item.hscode" class="form-control" placeholder="HS Code" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group mb-0">
                                                                <label>Qty</label>
                                                                <input type="text" v-model="product_item.qty" class="form-control" placeholder="Qty" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group mb-0">
                                                                <label>Declared Value in Yen</label>
                                                                <input type="text" v-model="product_item.dvy" class="form-control" placeholder="Declared Value in Yen" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group mb-0">
                                                                <label>Total Declared Value in Yen</label>
                                                                <input type="text" v-model="product_item.tdvy" class="form-control" placeholder="Total Declared Value in Yen" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                        <button type="button" class="btn btn-primary" @click="addItem()">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    import '@/assets/sass/widgets/widgets.scss';
    import '@/assets/sass/tables/table-basic.scss';
    import { onMounted,computed, ref } from 'vue';
    import { useStore } from 'vuex';
    import Multiselect from '@vueform/multiselect'
    import '@suadelabs/vue3-multiselect/dist/vue3-multiselect.css';
    import { useMeta } from '@/composables/use-meta';

    import { useRouter } from "vue-router";
    import store from "../../../store";
    import storeCompany from "../../../store/admin/company";
    useMeta({ title: 'Sales Admin' });
</script>

<script>




    // const router = useRouter();
    export default {
        components: { Multiselect },
        props: ['companyID'],
        data () {
            return {
                table_1 : ref([]),
                router : useRouter(),
                company : {},
                product_item : {
                    product_id: '',
                    product_name: '',
                    country_of_origin: '',
                    sku: '',
                    hscode: '',
                    qty: '',
                    declared_value: '',
                    total_declared_value: '',
                },
                addItemProductModal : ref(null)
            }
        },
        mounted() {
            this.initTables();
            this.initPopup();
        },
        methods: {
            initPopup(){
                this.addItemProductModal = new window.bootstrap.Modal(document.getElementById('addItemProductModal'));
            },
            initTables() {
                this.table_1 = [
                ];

                // this.table_1.push({
                //     product_id: '1',
                //     product_name: 'name test',
                //     country_of_origin: 'Philippines',
                //     sku: '123123',
                //     hscode: '12313',
                //     qty: '3',
                //     declared_value: '123',
                //     total_declared_value: '123',
                // });
            },
            goToShippingInvoice(){
                this.router.push({
                    name: "shipping invoice admin",
                    params: { company_id: this.router.currentRoute.params.company_id }
                });
            },
            addItem(){
                this.table_1.push({
                    product_id: '1',
                    product_name: this.product_item.name,
                    country_of_origin: this.product_item.country,
                    sku: this.product_item.sku,
                    hscode: this.product_item.hscode,
                    qty: this.product_item.qty,
                    declared_value: this.product_item.dvy,
                    total_declared_value: this.product_item.tdvy,
                });
            }

        },

        created: function(){


        // store.dispatch("getCountries")
        // .then((res) => {
        //     res.data.forEach(element => {
        //         this.options_country.push({'value': element.id, 'name': element.nicename });
        //     });

        // }),
        // store.dispatch("getProductCategories")
        // .then((res) => {
        //     console.log("getProductCategories",res)
        //     res.data.forEach(element => {
        //         this.options_product_category.push({'value': element.id, 'name': element.category_name });
        //     });

        // }),
        storeCompany.dispatch("getCompany",this.router.currentRoute.params.company_id)
        .then((res) => {
            console.log("Company Info",res)
            if(res.data){
                this.company = res.data;
            }
        })
    }
    }
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
