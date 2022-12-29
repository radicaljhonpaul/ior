<style scoped>
    .searchable-container .switch {
        width: auto;
        height: auto;
    }
    .searchable-container .searchable-items.grid .items .user-profile .custom-checkbox {
        display: none !important;
    }
</style>

<template>
    <!-- <div v-if="loading" class="flex justify-center">Loading...</div> -->
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
                                <li class="breadcrumb-item active" aria-current="page"><span>FBA</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>


        </teleport>
        <div class="row mt-3">
            <p class="fs-4 fw-bold"> Create Shipping Invoice (<small>FBA</small>)</p>
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
                                <label for="inputPassword4">Company Name</label>
                                <input id="product-image" type="text" class="form-control form-control-sm" readonly/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Phone</label>
                                <input id="product-image" type="text" class="form-control form-control-sm" readonly/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Address</label>
                                <textarea id="textarea" class="form-control form-control-sm" style="height:95px;" readonly></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="checkbox-success custom-control custom-checkbox rounded">
                                    <input type="checkbox" class="custom-control-input" id="chkrd_default" checked/>
                                    <label class="custom-control-label" for="chkrd_default"> Same address as the Company?</label>
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
                                <label for="inputPassword4">Recipient Name</label>
                                <input id="product-image" type="text" class="form-control form-control-sm" readonly/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Company Name</label>
                                <input id="product-image" type="text" class="form-control form-control-sm" readonly/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Phone</label>
                                <input id="product-image" type="text" class="form-control form-control-sm" readonly/>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please fill the Product Name</div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Address</label>
                                <textarea id="textarea" class="form-control form-control-sm" style="height:95px;" readonly></textarea>
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
                    <!--   -->
                    <button type="button" class="btn btn-dark rounded-pill mb-2 me-2" @click="this.addItemProductModal.show();">
                        Add Item +
                    </button>
                </div>
            </div>

            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="panel-body searchable-container" :class="[grid_type]">

                        <div class="searchable-items" :class="[grid_type]">

                                <div class="card item-content">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table role="table" aria-busy="false" aria-colcount="5" class="table table-bordered" id="__BVID__415">
                                                <tbody role="rowgroup">
                                                    <tr role="row" style="font-size:.8em;">
                                                        <td aria-colindex="1" role="cell">
                                                            <span for="">Product ID</span>
                                                            <input type="text" class="form-control form-control-sm">
                                                        </td>
                                                        <td aria-colindex="2" role="cell"> 
                                                            <span for="">Product Name</span>
                                                            <input type="text" class="form-control form-control-sm">
                                                        </td>
                                                        <td aria-colindex="4" role="cell">
                                                            <span for="">SKU</span>
                                                            <input type="text" class="form-control form-control-sm">
                                                        </td>
                                                        <td aria-colindex="5" role="cell">
                                                            <span for="">HS Code</span>
                                                            <input type="text" class="form-control form-control-sm">
                                                        </td>
                                                        <td aria-colindex="6" role="cell">
                                                            <span for="">ASIN</span>
                                                            <input type="text" class="form-control form-control-sm">
                                                        </td>
                                                        <td aria-colindex="3" role="cell"> 
                                                            <span for="">Country of Origin</span>
                                                            <input type="text" class="form-control form-control-sm">
                                                        </td>
                                                        <td aria-colindex="9" colspan="2" role="cell" class="text-center">
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
                                                    <tr >
                                                        <td aria-colindex="1" role="cell">
                                                            <span for="">QTY</span>
                                                            <input type="text" class="form-control form-control-sm align-item-end">
                                                        </td>
                                                        <td aria-colindex="3" role="cell"> 
                                                            <div class="d-flex flex-row gap-1">
                                                                <div>
                                                                    <span for="">DOSP</span>
                                                                    <input type="text" class="form-control form-control-sm">
                                                                </div>
                                                                <div >
                                                                    <span for="">AODSP</span>
                                                                    <input type="text" class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td aria-colindex="4" role="cell">
                                                            <span for="">AMZ SF</span>
                                                            <input type="text" class="form-control form-control-sm align-bottom">
                                                        </td>
                                                        <td aria-colindex="5" role="cell">
                                                            <span for="">AMZ FF</span>
                                                            <input type="text" class="form-control form-control-sm">
                                                        </td>
                                                        <td aria-colindex="6" role="cell">
                                                            <span for="">TDOSP</span>
                                                            <input type="text" class="form-control form-control-sm align-bottom">
                                                        </td>
                                                        <td aria-colindex="7" role="cell">
                                                            <span for="">TAODSP</span>
                                                            <input type="text" class="form-control form-control-sm align-bottom">
                                                        </td>
                                                        
                                                    </tr>
                                                </tbody>
                                                <tfoot style="font-size:.8em;">
                                                    <tr role="row">
                                                        <td aria-colindex="1" role="cell" colspan="5" style="text-align: right;">
                                                            
                                                        </td>
                                                        <td class="bg-light-dark" aria-colindex="1" role="cell" colspan="2" style="text-align: right;">
                                                            <p class="text-dark">Total Declared Online Selling Price</p>
                                                            <h4>¥ <span>0.00</span></h4>
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <td aria-colindex="1" role="cell" colspan="5" style="text-align: right;">
                                                            
                                                        </td>
                                                        <td class="bg-light-dark" aria-colindex="1" role="cell" colspan="2" style="text-align: right;">
                                                            <p class="text-dark">AMZ Fees</p>
                                                            <h4>¥ <span>0.00</span></h4>
                                                        </td>
                                                    </tr>
                                                    <tr role="row">
                                                        <td aria-colindex="1" role="cell" colspan="5" style="text-align: right;">
                                                            
                                                        </td>
                                                        <td class="bg-dark" aria-colindex="1" role="cell" colspan="2" style="text-align: right;">
                                                            <p class="text-info">Total Adjusted Selling Price</p>
                                                            <h4>¥ <span>0.00</span></h4>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <br>
                        </div>

                        <div class="row mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row gap-1">
                                    <div class="">
                                        <span class="fs-7">FOSR
                                            <code><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle" data-v-5522efca=""><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg></code>
                                        </span>
                                        <input type="file" class="form-control form-control-sm" @change="this.change_fosr"/>
                                    </div>
                                    <div class="">
                                        <span class="fs-7">Simulator Report 
                                            <code><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle" data-v-5522efca=""><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg></code>
                                        </span>
                                        <input type="file" class="form-control form-control-sm" @change="this.change_simulator_report"/>
                                    </div>
                                </div>

                                <div class="d-flex flex-row gap-1" style="align-items:end;">
                                    <div class="col-md-4" style="text-align: right;width: 100%;">
                                        <button type="button" class="btn btn-dark me-1" data-bs-toggle="modal" data-bs-target="#shippingInvoiceDetails">Save Draft</button>
                                        <!-- @click="submitFBAShipingInvoice()" -->
                                        <button type="button" class="btn btn-success me-1" @click="this.invoiceDetailsModal.show();">Submit</button>
                                        <button type="button" class="btn btn-default me-1" @click="goToShippingInvoice()">Back to Shipping Invoices List</button>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Modal -->
                        <!-- <div id="addItemProductModal" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        </div> -->

                        <!-- Modal -->
                        <div class="modal fade" id="invoiceDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                <div class="modal-content mailbox-popup">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Invoice Details</h5>
                                        <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
                                    </div>
                                    <div class="modal-body" id="invoicePDFMerger">
                                        <shipping-invoice></shipping-invoice>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                        <button type="button" class="btn btn-primary" @click="sumbitInvoice()">Submit Invoice</button>
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

<script setup>
    import { onMounted,computed, ref } from 'vue';
    import '@/assets/sass/font-icons/fontawesome/css/regular.css';
    import '@/assets/sass/font-icons/fontawesome/css/fontawesome.css';
    import { useStore } from 'vuex';
    import { useMeta } from '@/composables/use-meta';

    import { useRouter } from "vue-router";
    import store from "../../../store";
    import storeShippingInvoice from "../../../store/admin/shipping_invoice";
    import storeCompany from "../../../store/admin/company";
    useMeta({ title: 'Sales Admin' });
</script>

<script>
    import Multiselect from '@vueform/multiselect'
    import ShippingInvoice from '../../components/shipping_invoice.vue'
    import html2pdf from "html2pdf.js";
    import PDFViewer from 'pdf-viewer-vue'

    // const router = useRouter();
    export default {
        components: { Multiselect, ShippingInvoice, PDFViewer },
        props: ['companyID'],
        data () {
            return {
                table_1 : ref([]),
                router : useRouter(),
                company : {},
                formData : new FormData(),
                invoiceFile: null,
                ship_from : {
                    company_name: '',
                    phone: '',
                    address: '',
                },
                destination : {
                    recipient_name: '',
                    company_name: '',
                    phone: '',
                    address: '',
                },
                totals: {
                    total_declared_online_selling_price: '',
                    amz_fees: '',
                    total_adjusted_selling_price: '',
                },
                product_item_array: [
                    {
                        product_item : {
                            product_id: '',
                            product_name: '',
                            sku: '',
                            hs_code: '',
                            asin: '',
                            country_of_origin: '',
                            qty: '',
                            dosp: '',
                            adosp: '',
                            amz_sf: '',
                            amz_ff: '',
                            tdosp: '',
                            taodsp: '',
                        },
                    }
                ],
                addItemProductModal : ref(null),
                invoiceDetailsModal : ref(null),
                fosr: null,
                simulator_report: null,
                formData : new FormData(),
            }
        },
        mounted() {
            this.initTables();
            this.initPopup();
        },
        watch: {
            invoiceFile: function(NewInvoiceFile) {
                if (NewInvoiceFile) {
                    console.log("change");
                    this.invoiceFile = NewInvoiceFile;
                }else{
                    this.invoiceFile = 'shhhh';
                }
            }
        },
        methods: {
            initPopup(){
                // this.addItemProductModal = new window.bootstrap.Modal(document.getElementById('addItemProductModal'));
                this.invoiceDetailsModal = new window.bootstrap.Modal(document.getElementById('invoiceDetailsModal'));
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
            change_fosr(event){
                // this.formData.append('product_image', event.target.files[0]);
                this.fosr = event.target.files[0];
                // if(event.target.files[0]){
                //     this.fosr = event.target.files[0].name;
                // }else{
                //     this.fosr = null;
                // }
                console.log(this.fosr);
            },
            change_simulator_report(event){
                // this.formData.append('product_image', event.target.files[0]);
                this.simulator_report = event.target.files[0];
                // if(event.target.files[0]){
                //     this.simulator_report = event.target.files[0].name;
                // }else{
                //     this.simulator_report = null;
                // }
                console.log(this.simulator_report);
            },
            sumbitInvoice(event){
                
                var base64String = [];
                var element = document.getElementById('shipping-invoice');
                var opt = {
                    // margin:       0.5,
                    // filename:     'invoice.pdf',
                    // jsPDF:        { unit: 'in', format: 'legal', orientation: 'landscape' },
                    // pagebreak: { before: '.beforeClass', after: ['#after1', '#after2']}
                    margin:       0.5,
                    filename:     'invoice.pdf',
                    enableLinks:  false,
                    pagebreak: { before: '.beforeClass', after: ['#after1', '#after2']},
                    image:        { type: 'jpeg', quality: 0.98 },
                    html2canvas:  { scale: 2 },
                    jsPDF:        { unit: 'in', format: 'legal', orientation: 'landscape' }
                };  

                // a promise
                let promise = new Promise(function (resolve, reject) {
                    setTimeout(function () {
                        // html2pdf().from(element).set(opt).toPdf().get('pdf').then(function(pdf) {
                        //     // .output("datauristring").
                        //     const perBlob = pdf.output('datauristring');
                        //     const filePDF = new File(
                        //         [perBlob],
                        //         opt.filename,
                        //         {type: 'application/pdf'}
                        //     ); 
                        //     // console.log(filePDF);
                        //     // base64String.push(filePDF);
                        //     // console.log(base64String);
                        //     return filePDF;
                        // });
                        resolve(
                            html2pdf().from(element).set(opt).toPdf().get('pdf').then(function(pdf) {
                                // .output("datauristring").
                                const preBlob = pdf.output('blob');
                                const filePDF = new File(
                                    [preBlob],
                                    opt.filename,
                                    {type: 'application/pdf'}
                                ); 
                                console.log("preBlob");
                                console.log(preBlob);
                                console.log("filePDF");
                                console.log(filePDF);
                                // base64String.push(filePDF);
                                // console.log(base64String);
                                return filePDF;
                            })
                        )
                    }, 4000); 
                });
                

                // async function
                async function asyncFunc(fosr,simulator_report,ship_from,destination,product_item_array,total_declared_online_selling_price,amz_fees,total_adjusted_selling_price) {
                    // wait until the promise resolves 
                    let result = await promise; 

                    console.log(result);
                    console.log('hello');

                    storeShippingInvoice
                    .dispatch("storeShippingInvoice", {
                        fosr: fosr,
                        simulator_report: simulator_report,
                        invoiceBase: result,
                        ship_from: ship_from,
                        destination: destination,
                        product_item_array: product_item_array,
                        total_declared_online_selling_price: total_declared_online_selling_price,
                        amz_fees: amz_fees,
                        total_adjusted_selling_price: total_adjusted_selling_price,
                    })
                    .then((res) => {
                        console.log("res");
                        console.log(res);
                    })
                    .catch((err) => {
                    // this.loading = false;
                    // errorMsg.value = err.response.data.error;
                    });

                }
                
                asyncFunc(this.fosr,this.simulator_report,this.ship_from,this.destination,this.product_item_array,this.totals.total_declared_online_selling_price,this.totals.amz_fees,this.totals.total_adjusted_selling_price);
                // this.invoiceFile = base64String[0];
                // console.log(xxx);
                
                // html2pdf().from(element).set(opt).toPdf().output('datauristring').then(function (pdfAsString) {
                //     // The PDF has been converted to a Data URI string and passed to this function.
                //     // Use pdfAsString however you like (send as emailthis., etc)!

                //     var arr = pdfAsString.split(',');
                //     pdfAsString = arr[1];    

                //     // console.log(pdfAsString);
                //     // base64String.push(pdfAsString);
                //     base64String.push(arr[1]);
                // });


                // const filePDF = new File(
                //     [base64String[0]],
                //     'invoice.pdf',
                //     {type: 'application/pdf'}
                // ); 
                
                
                
                
            },
            submitFBAShipingInvoice(){
                this.ship_from.company_name = 'Sample 1';
                this.ship_from.phone = '09123456895';
                this.ship_from.address = 'Considine and Sons 2185 Tony Circle Imeldaside, Austria, 46279-5354';

                this.destination.recipient_name = 'Sam Paulson Ltd.';
                this.destination.company_name = 'Sample 2';
                this.destination.phone = '09123456896';
                this.destination.address = 'Sample Address, Oak City, Line 1., Line 2';

                this.product_item_array[0].product_item.product_id = 1;
                this.product_item_array[0].product_item.product_name = 'Product 1';
                this.product_item_array[0].product_item.sku = '000001';
                this.product_item_array[0].product_item.hs_code = '35648';
                this.product_item_array[0].product_item.asin = '12235';
                this.product_item_array[0].product_item.country_of_origin = 12;
                this.product_item_array[0].product_item.qty = 10;
                this.product_item_array[0].product_item.dosp = 656;
                this.product_item_array[0].product_item.adosp = 620;
                this.product_item_array[0].product_item.amz_sf = 250;
                this.product_item_array[0].product_item.amz_ff = 250;
                this.product_item_array[0].product_item.tdosp = 656;
                this.product_item_array[0].product_item.taodsp = 406;

                // this.product_item_array[1].product_item.product_id = 2;
                // this.product_item_array[1].product_item.product_name = 'Product 2';
                // this.product_item_array[1].product_item.sku = '000001';
                // this.product_item_array[1].product_item.hs_code = '35648';
                // this.product_item_array[1].product_item.asin = '12235';
                // this.product_item_array[1].product_item.country_of_origin = 12;
                // this.product_item_array[1].product_item.qty = 10;
                // this.product_item_array[1].product_item.dosp = 656;
                // this.product_item_array[1].product_item.adosp = 620;
                // this.product_item_array[1].product_item.amz_sf = 250;
                // this.product_item_array[1].product_item.amz_ff = 250;
                // this.product_item_array[1].product_item.tdosp = 656;
                // this.product_item_array[1].product_item.taodsp = 406;

                this.totals.total_declared_online_selling_price = 1312;
                this.totals.amz_fees = 200;
                this.totals.total_adjusted_selling_price = 1112;

                // storeShippingInvoice
                // .dispatch("storeShippingInvoice", {
                //     ship_from: this.ship_from,
                //     destination: this.destination,
                //     product_item_array: this.product_item_array,
                //     total_declared_online_selling_price: this.totals.total_declared_online_selling_price,
                //     amz_fees: this.totals.amz_fees,
                //     total_adjusted_selling_price: this.totals.total_adjusted_selling_price,
                // })
                // .then((res) => {
                //     console.log("res");
                //     console.log(res);
                // })
                // .catch((err) => {
                // // this.loading = false;
                // // errorMsg.value = err.response.data.error;
                // });
            },

            goToShippingInvoice(){
                this.router.push({
                    name: "shipping invoice admin",
                    params: { company_id: this.router.currentRoute.params.company_id }
                });
            },
            addItem(){
            }

        },

        created: function(){

            storeCompany.dispatch("getCompany",this.router.currentRoute.params.company_id)
            .then((res) => {
                console.log("Company Info",res)
                if(res.data){
                    this.company = res.data;
                }
            });

            this.submitFBAShipingInvoice();
            console.log("this.totals");
            console.log(this.totals);
            console.log(this.ship_from);
            console.log(this.destination);

        }
    }
</script>
<style src="@vueform/multiselect/themes/default.css"></style>

