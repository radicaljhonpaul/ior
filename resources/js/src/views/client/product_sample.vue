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
            <p class="fs-4 fw-bold"> Create Shipping Invoice (<small>PRODUCT SAMPLE</small>)</p>
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
                                <label for="inputPassword4">Company Name <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm" readonly/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Phone <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm" readonly/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Address <code>*</code> </label>
                                <textarea id="textarea" class="form-control form-control-sm" style="height:95px;" readonly></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="checkbox-success custom-control custom-checkbox rounded">
                                    <input type="checkbox" class="custom-control-input" id="chkrd_default" checked/>
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
                                <input id="product-image" type="text" class="form-control form-control-sm" readonly/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Company Name <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm" readonly/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Phone <code>*</code> </label>
                                <input id="product-image" type="text" class="form-control form-control-sm" readonly/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Address <code>*</code> </label>
                                <textarea id="textarea" class="form-control form-control-sm" style="height:95px;" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
        <div class="layout-px-spacing app-contacts">
            <h4>Product Samples <small>(Product Samples for Import Application and Testing. Not for use or sale. No Commercial Value.)</small></h4>
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="panel-body searchable-container" :class="[grid_type]">
                        <div class="row">
                            <!-- <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                                <form class="form-inline my-2 my-lg-0">
                                    <div class="">
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
                                            class="feather feather-search"
                                        >
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                        <input type="text" v-model.trim="search_user" class="product-search form-control" v-on:keyup="search_contacts()" placeholder="Search Contacts..." />
                                    </div>
                                </form>
                            </div> -->

                            <div class="col-md-12">
                                <div class="" style="text-align: right;">

                                    <button @click="edit_user" type="button" class="btn btn-dark rounded-pill mb-2 me-2">
                                        Add Item +
                                    </button>
                                    <!-- <div class="switch align-self-center">
                                        <a href="javascript:;" @click="grid_type = 'list'">
                                            <svg
                                                :class="{ 'active-view': grid_type == 'list' }"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-list view-list me-1"
                                            >
                                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                                <line x1="3" y1="6" x2="3" y2="6"></line>
                                                <line x1="3" y1="12" x2="3" y2="12"></line>
                                                <line x1="3" y1="18" x2="3" y2="18"></line>
                                            </svg>
                                        </a>
                                        <a href="javascript:;" @click="grid_type = 'grid'">
                                            <svg
                                                :class="{ 'active-view': grid_type == 'grid' }"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-grid view-grid"
                                            >
                                                <rect x="3" y="3" width="7" height="7"></rect>
                                                <rect x="14" y="3" width="7" height="7"></rect>
                                                <rect x="14" y="14" width="7" height="7"></rect>
                                                <rect x="3" y="14" width="7" height="7"></rect>
                                            </svg>
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="searchable-items" :class="[grid_type]">
                            <!-- <div class="items items-header-section">
                                <div class="item-content">
                                    <div class="">
                                        <div class="checkbox-primary custom-control custom-checkbox d-inline-block">
                                            <input id="chkALl" type="checkbox" :checked="check_all_checkbox" class="custom-control-input" @change="check_all($event.target.checked)" />
                                            <label class="custom-control-label" for="chkALl"> </label>
                                        </div>

                                        <h4>Name</h4>
                                    </div>
                                    <div class="user-email">
                                        <h4>Email</h4>
                                    </div>
                                    <div class="user-location">
                                        <h4 style="margin-left: 0">Location</h4>
                                    </div>
                                    <div class="user-phone">
                                        <h4 style="margin-left: 3px">Phone</h4>
                                    </div>
                                    <div class="action-btn">
                                        <a href="javascript:;" @click="delete_selected()">
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
                                                class="feather feather-trash-2 delete-multiple"
                                            >
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div v-for="(user, index) in filterd_contacts_list" class="items" :key="index"> -->
                                <div class="item-content" style="background-color: #fff;">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table role="table" aria-busy="false" aria-colcount="5" class="table table-bordered" id="__BVID__415">
                                                <thead role="rowgroup">
                                                    <tr role="row">
                                                        <th role="columnheader" scope="col" aria-colindex="1"><div>Product ID</div></th>
                                                        <th role="columnheader" scope="col" aria-colindex="2"><div>Product Name	</div></th>
                                                        <th role="columnheader" scope="col" aria-colindex="3"><div>Country of Origin	</div></th>
                                                        <th role="columnheader" scope="col" aria-colindex="3"><div>SKU	</div></th>
                                                        <th role="columnheader" scope="col" aria-colindex="3"><div>HS Code	</div></th>
                                                        <th role="columnheader" scope="col" aria-colindex="3"><div>QTY	</div></th>
                                                        <th role="columnheader" scope="col" aria-colindex="4"><div>Declared Value in Yen</div></th>
                                                        <th role="columnheader" scope="col" aria-colindex="5"><div>Total Declared Value in Yen	</div></th>
                                                        <th role="columnheader" scope="col" aria-colindex="5" aria-label="Action" class="text-center"><div></div></th>
                                                    </tr>
                                                </thead>
                                                <tbody role="rowgroup">
                                                    <tr v-for="item in table_1" :key="item.product_id" role="row">
                                                        <td aria-colindex="1" role="cell">{{ item.product_id }}</td>
                                                        <td aria-colindex="2" role="cell">{{ item.product_name }}</td>
                                                        <td aria-colindex="3" role="cell">{{ item.country_of_origin }}</td>
                                                        <td aria-colindex="3" role="cell">{{ item.sku }}</td>
                                                        <td aria-colindex="3" role="cell">{{ item.hscode }}</td>
                                                        <td aria-colindex="3" role="cell">{{ item.qty }}</td>
                                                        <td aria-colindex="3" role="cell">{{ item.declared_value }}</td>
                                                        <td aria-colindex="4" role="cell">{{ item.total_declared_value }}</td>
                                                        <td aria-colindex="5" role="cell" class="text-center">
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
                                                                class="feather feather-trash-2 icon"
                                                            >
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <td aria-colindex="1" role="cell" colspan="9" style="text-align: right;">
                                                            Total Declared Online Selling Price
                                                            <br>
                                                            ¥ <span>123.00</span>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- <div class="action-btn">
                                        <a href="javascript:;" class="me-1" @click="edit_user(user)">
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
                                                class="feather feather-edit-2 edit"
                                            >
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                        </a>
                                        <a href="javascript:;" @click="delete_user(user)">
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
                                                class="feather feather-trash-2 delete-multiple"
                                            >
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </a>
                                    </div> -->
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Supporting Document
                                            <code><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle" data-v-5522efca=""><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg></code>
                                        </label>
                                        <input id="product-image" type="file" class="form-control form-control-sm" @change="this.change_file_product_image" placeholder="Product Image" ref="file_product_image" :class="[this.is_submit_add_admin_user_form ? (product.product_image ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Product Name</div>
                                    </div>
                                </div>

                            <!-- </div> -->
                        </div>
                        <div class="row" style="text-align: right;">
                                    <div class="col-md-4" style="text-align: right;width: 100%;">
                                        <button type="button" class="btn btn-dark mb-2 me-1">Save</button>
                                        <button type="button" class="btn btn-default mb-2 me-1">Back to Shipping Invoices List</button>
                                    </div>
                                </div>
                        <!-- Modal -->
                        <div id="addContactModal" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content mailbox-popup">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ params.id ? 'Update Item' : 'Add Item' }}</h5>
                                        <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="add-contact-box">
                                            <div class="add-contact-content">
                                                <form id="addContactModalTitle">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <label>Product Name</label>
                                                                <input type="text" v-model="params.name" class="form-control form-control-sm" placeholder="Product Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <label>Country of Origin</label>
                                                                <input type="text" v-model="params.email" class="form-control form-control-sm" placeholder="Country of Origin" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <label>SKU</label>
                                                                <input type="text" v-model="params.role" class="form-control form-control-sm" placeholder="SKU" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mb-4">
                                                                <label>HS Code</label>
                                                                <input type="text" v-model="params.role" class="form-control form-control-sm" placeholder="HS Code" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group mb-0">
                                                                <label>Qty</label>
                                                                <input type="text" v-model="params.location" class="form-control form-control-sm" placeholder="Qty" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group mb-0">
                                                                <label>Declared Value in Yen</label>
                                                                <input type="text" v-model="params.location" class="form-control form-control-sm" placeholder="Declared Value in Yen" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-5">
                                                            <div class="form-group mb-0">
                                                                <label>Total Declared Value in Yen</label>
                                                                <input type="text" v-model="params.location" class="form-control form-control-sm" placeholder="Total Declared Value in Yen" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                        <button type="button" class="btn btn-primary" @click="save_user()">{{ params.id ? 'Update' : 'Add' }}</button>
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
    import '@/assets/sass/apps/contacts.scss';
    import '@/assets/sass/widgets/widgets.scss';

    import { onMounted,computed, ref } from 'vue';
    import { useStore } from 'vuex';
    import Multiselect from '@vueform/multiselect'
    import '@suadelabs/vue3-multiselect/dist/vue3-multiselect.css';
    import { useMeta } from '@/composables/use-meta';

    import { useRouter } from "vue-router";
    const router = useRouter();
    useMeta({ title: 'Sales Admin' });

    const store = useStore();

    const table_1 = ref([]);

    //Revenue
    const revenue_series = ref([
        { name: 'Income', data: [16800, 16800, 15500, 17800, 15500, 17000, 19000, 16000, 15000, 17000, 14000, 17000] },
        { name: 'Expenses', data: [16500, 17500, 16200, 17300, 16000, 19500, 16000, 17000, 16000, 19000, 18000, 19000] },
    ]);
    const revenue_options = computed(() => {
        const is_dark = store.state.is_dark_mode;
        return {
            chart: {
                fontFamily: 'Nunito, sans-serif',
                zoom: { enabled: false },
                toolbar: { show: false },
            },
            dataLabels: { enabled: false },
            stroke: { show: true, curve: 'smooth', width: 2, lineCap: 'square' },
            dropShadow: { enabled: true, opacity: 0.2, blur: 10, left: -7, top: 22 },
            colors: is_dark ? ['#2196f3', '#e7515a'] : ['#1b55e2', '#e7515a'],
            markers: {
                discrete: [
                    { seriesIndex: 0, dataPointIndex: 6, fillColor: '#1b55e2', strokeColor: '#fff', size: 7 },
                    { seriesIndex: 1, dataPointIndex: 5, fillColor: '#e7515a', strokeColor: '#fff', size: 7 },
                ],
            },
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            xaxis: {
                axisBorder: { show: false },
                axisTicks: { show: false },
                crosshairs: { show: true },
                labels: { offsetX: 0, offsetY: 5, style: { fontSize: '12px', fontFamily: 'Nunito, sans-serif', cssClass: 'apexcharts-xaxis-title' } },
            },
            yaxis: {
                tickAmount: 7,
                labels: {
                    formatter: function (value) {
                        return value / 1000 + 'K';
                    },
                    offsetX: -10,
                    offsetY: 0,
                    style: { fontSize: '12px', fontFamily: 'Nunito, sans-serif', cssClass: 'apexcharts-yaxis-title' },
                },
            },
            grid: {
                borderColor: is_dark ? '#191e3a' : '#e0e6ed',
                strokeDashArray: 5,
                xaxis: { lines: { show: true } },
                yaxis: { lines: { show: false } },
                padding: { top: 0, right: 0, bottom: 0, left: 0 },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                offsetY: 0,
                fontSize: '16px',
                fontFamily: 'Nunito, sans-serif',
                markers: { width: 10, height: 10, strokeWidth: 0, strokeColor: '#fff', fillColors: undefined, radius: 12, onClick: undefined, offsetX: 0, offsetY: 0 },
                itemMargin: { horizontal: 20, vertical: 5 },
            },
            tooltip: { theme: 'dark', marker: { show: true }, x: { show: false } },
            fill: {
                type: 'gradient',
                gradient: {
                    type: 'vertical',
                    shadeIntensity: 1,
                    inverseColors: !1,
                    opacityFrom: is_dark ? 0.19 : 0.28,
                    opacityTo: 0.05,
                    stops: is_dark ? [100, 100] : [45, 100],
                },
            },
        };
    });

    //Daily Sales
    const daily_sales_series = ref([
        { name: 'Sales', data: [44, 55, 41, 67, 22, 43, 21] },
        { name: 'Last Week', data: [13, 23, 20, 8, 13, 27, 33] },
    ]);
    const daily_sales_options = computed(() => {
        return {
            chart: { toolbar: { show: false }, stacked: true, stackType: '100%' },
            dataLabels: { enabled: false },
            stroke: { show: true, width: 1 },
            colors: ['#e2a03f', '#e0e6ed'],
            responsive: [{ breakpoint: 480, options: { legend: { position: 'bottom', offsetX: -10, offsetY: 0 } } }],
            xaxis: { labels: { show: false }, categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'] },
            yaxis: { show: false },
            fill: { opacity: 1 },
            plotOptions: { bar: { horizontal: false, columnWidth: '25%' } },
            legend: { show: false },
            grid: {
                show: false,
                xaxis: { lines: { show: false } },
                padding: { top: 10, right: -20, bottom: -20, left: -20 },
            },
        };
    });

    //Total Orders
    const total_orders_series = ref([{ name: 'Sales', data: [28, 40, 36, 52, 38, 60, 38, 52, 36, 40] }]);
    const total_orders_options = computed(() => {
        const is_dark = store.state.is_dark_mode;
        return {
            chart: { sparkline: { enabled: true } },
            stroke: { curve: 'smooth', width: 2 },
            colors: is_dark ? ['#1abc9c'] : ['#fff'],
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            yaxis: { min: 0, show: false },
            grid: { padding: { top: 125, right: 0, bottom: 0, left: 0 } },
            fill: {
                opacity: 1,
                type: 'gradient',
                gradient: {
                    type: 'vertical',
                    shadeIntensity: 1,
                    inverseColors: !1,
                    opacityFrom: is_dark ? 0.3 : 0.4,
                    opacityTo: 0.05,
                    stops: is_dark ? [100, 100] : [45, 100],
                },
            },
            tooltip: { x: { show: false }, theme: 'dark' },
        };
    });

    //Sales by Category
    const sales_donut_series = ref([985, 737, 270]);
    const sales_donut_options = computed(() => {
        const is_dark = store.state.is_dark_mode;
        const option = {
            chart: {},
            dataLabels: { enabled: false },
            expandOnClick: is_dark ? false : true,
            stroke: { show: true, width: 25, colors: is_dark ? '#0e1726' : '#fff' },
            colors: is_dark ? ['#5c1ac3', '#e2a03f', '#e7515a', '#e2a03f'] : ['#e2a03f', '#5c1ac3', '#e7515a'],
            legend: {
                position: 'bottom',
                horizontalAlign: 'center',
                fontSize: '14px',
                markers: { width: 10, height: 10 },
                height: 50,
                offsetY: 20,
                itemMargin: { horizontal: 8, vertical: 0 },
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%',
                        background: 'transparent',
                        labels: {
                            show: true,
                            name: { show: true, fontSize: '29px', fontFamily: 'Nunito, sans-serif', offsetY: -10 },
                            value: {
                                show: true,
                                fontSize: '26px',
                                fontFamily: 'Nunito, sans-serif',
                                color: is_dark ? '#bfc9d4' : undefined,
                                offsetY: 16,
                                formatter: function (val) {
                                    return val;
                                },
                            },
                            total: {
                                show: true,
                                label: 'Total',
                                color: '#888ea8',
                                fontSize: '29px',
                                formatter: function (w) {
                                    return w.globals.seriesTotals.reduce(function (a, b) {
                                        return a + b;
                                    }, 0);
                                },
                            },
                        },
                    },
                },
            },
            labels: ['Apparel', 'Sports', 'Others'],
        };

        if (is_dark) {
            option['states'] = {
                hover: { filter: { type: 'none' } },
                active: { filter: { type: 'none' } },
            };
        }

        return option;
    });
    let addContactModal = ref(null);
    const params = ref({ id: null, name: '', email: '', role: '', phone: '', location: '' });
    const contacts_list = ref([]);
    const filterd_contacts_list = ref([]);
    const search_user = ref('');
    const ids = ref([]);
    const grid_type = ref('list');

    onMounted(() => {
        initPopup();
        bind_contacts();
        init_tables();
    });

    const init_tables = () => {
        table_1.value = [
        ];

        table_1.value.push({
            product_id: '1',
            product_name: 'name test',
            country_of_origin: 'Philippines',
            sku: '123123',
            hscode: '12313',
            qty: '3',
            declared_value: '123',
            total_declared_value: '123',
        });
    };

    const check_all_checkbox = computed(() => {
        if (contacts_list.value.length && ids.value.length == contacts_list.value.length) {
            return true;
        } else {
            return false;
        }
    });

    const initPopup = () => {
        addContactModal = new window.bootstrap.Modal(document.getElementById('addContactModal'));
    };

    const bind_contacts = () => {
        contacts_list.value = [
            { id: 1, path: 'profile-5.jpeg', name: 'Alan Green', role: 'Web Developer', email: 'alan@mail.com', location: 'Boston, USA', phone: '+1 (070) 123-4567' },
            { id: 2, path: 'profile-11.jpeg', name: 'Linda Nelson', role: 'Web Designer', email: 'linda@mail.com', location: 'Sydney, Australia', phone: '+1 (070) 123-4567' },
            { id: 3, path: 'profile-12.jpeg', name: 'Lila Perry', role: 'UX/UI Designer', email: 'lila@mail.com', location: 'Miami, USA', phone: '+1 (070) 123-4567' },
            { id: 4, path: 'profile-3.jpeg', name: 'Andy King', role: 'Project Lead', email: 'andy@mail.com', location: 'Tokyo, Japan', phone: '+1 (070) 123-4567' },
            { id: 5, path: 'profile-15.jpeg', name: 'Jesse Cory', role: 'Web Developer', email: 'jesse@mail.com', location: 'Edinburgh, UK', phone: '+1 (070) 123-4567' },
            { id: 6, path: 'profile-7.jpeg', name: 'Xavier', role: 'UX/UI Designer', email: 'xavier@mail.com', location: 'New York, USA', phone: '+1 (070) 123-4567' },
            { id: 7, path: 'profile-18.jpeg', name: 'Susan', role: 'Project Manager', email: 'susan@mail.com', location: 'Miami, USA', phone: '+1 (070) 123-4567' },
            { id: 8, path: 'profile-29.jpeg', name: 'raci Lopez', role: 'Web Developer', email: 'traci@mail.com', location: 'Edinburgh, UK', phone: '+1 (070) 123-4567' },
        ];
        search_contacts();
    };

    const search_contacts = () => {
        filterd_contacts_list.value = contacts_list.value.filter((d) => d.name.toLowerCase().includes(search_user.value));
    };

    const edit_user = (user) => {
        params.value = { id: null, name: '', email: '', role: '', phone: '', location: '' };
        if (user) {
            params.value = JSON.parse(JSON.stringify(user));
        }

        addContactModal.show();
    };

    const save_user = () => {
        if (!params.value.name) {
            showMessage('Name is required.', 'error');
            return true;
        }
        if (!params.value.email) {
            showMessage('Email is required.', 'error');
            return true;
        }
        if (!params.value.phone) {
            showMessage('Phone is required.', 'error');
            return true;
        }

        if (params.value.id) {
            //update user
            let user = contacts_list.value.find((d) => d.id == params.value.id);
            user.name = params.value.name;
            user.email = params.value.email;
            user.role = params.value.role;
            user.phone = params.value.phone;
            user.location = params.value.location;
        } else {
            //add user
            let max_user_id = contacts_list.value.reduce((max, character) => (character.id > max ? character.id : max), contacts_list.value[0].id);
            if (!max_user_id) {
                max_user_id = 0;
            }
            let user = {
                id: max_user_id + 1,
                path: 'profile-30.png',
                name: params.value.name,
                email: params.value.email,
                role: params.value.role,
                phone: params.value.phone,
                location: params.value.location,
            };
            contacts_list.value.splice(0, 0, user);
            search_contacts();
        }

        showMessage('User saved successfully.');
        addContactModal.hide();
    };

    const delete_user = (user) => {
        contacts_list.value = contacts_list.value.filter((d) => d.id != user.id);
        ids.value = ids.value.filter((d) => d != user.id);
        search_contacts();
        showMessage('User deleted successfully.');
    };

    const delete_selected = () => {
        if (!ids.value.length) {
            showMessage('Please select atleast one user.', 'info');
            return false;
        }

        contacts_list.value = contacts_list.value.filter((d) => !ids.value.includes(d.id));
        clear_selection();
        search_contacts();

        showMessage('Users deleted successfully.');
    };

    const check_all = (is_checked) => {
        if (is_checked) {
            ids.value = contacts_list.value.map((d) => {
                return d.id;
            });
        } else {
            clear_selection();
        }
    };

    const clear_selection = () => {
        ids.value = [];
    };

    const showMessage = (msg = '', type = 'success') => {
        const toast = window.Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
        });
        toast.fire({
            icon: type,
            title: msg,
            padding: '10px 20px',
        });
    };
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
