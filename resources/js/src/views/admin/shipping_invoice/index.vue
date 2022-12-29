
<template>
    <div :companyID="companyID" class="layout-px-spacing">
        <teleport to="#breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Client</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Shipping Invoice</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </teleport>


        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="row mt-3">
                    <p class="fs-4 fw-bold"> Shipping Invoices </p>
                </div>
                <div class="panel br-6 p-0">

                    <div class="custom-table">
                        <v-client-table :data="items" :columns="columns" :options="table_option"  @row-click="this.onRowClick">
                            <template #beforeFilter>
                                <button type="button" data-bs-toggle="modal"  data-bs-target="#selectShippingInvoiceCategoryModal" class="btn me-2 btn-primary"
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
                                    Create Shipping invoice
                                </button>


                            </template>
                            <template #product_name="props">
                            <a
                                style="font-weight: bolder;"
                                role="menuitem"
                                href="javascript:"
                                target="_self"
                                @click="show_view_row(props.row)"
                                class="text-info"
                                >{{ props.row.product_name }}</a
                            >


                            </template>
                            <template #actions="props">
                                <div class="actions text-center">
                                    <a @click.stop href="javascript:;" class="cancel" @click="show_edit_row(props.row)">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    &nbsp;
                                    <a @click.stop href="javascript:;" class="cancel" @click="delete_row(props.row)">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </template>

                            <template #salary="props"> ${{ props.row.salary }} </template>
                        </v-client-table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
     <div class="modal fade modal-notification" id="selectShippingInvoiceCategoryModal" tabindex="-1" role="dialog" aria-labelledby="selectShippingInvoiceCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Shipping Invoice Type</h5>
            <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="row" style="margin-bottom: 40px;">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Select Shipping Invoice Type<code>*</code></label>
                        <Multiselect
                            v-model="shippingInvoiceType"
                            placeholder="Select Shipping Invoice Type"
                            label="name"
                            trackBy="name"
                            :options="options_shipping_invoice_type"
                            :searchable="true"
                            >
                        </Multiselect>
                        <!-- <div class="valid-feedback">Looks good!</div> -->
                        <!-- <div class="invalid-feedback">Please fill the Country of Origin</div> -->
                        </div>
                </div>
            </form>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary"  @click="selectShippingInvoiceCategory()">Proceed</button>
                </div>
            </div>
        </div>
     </div>


</template>

<script>

    import store from "../../../store";
    // import storeProducts from "../../store/client/product_registration";
    import { useRouter } from "vue-router";
    import { useMeta } from '@/composables/use-meta';
    import '@/assets/sass/elements/tooltip.scss';
    import Multiselect from '@vueform/multiselect'
    import '@suadelabs/vue3-multiselect/dist/vue3-multiselect.css';
    import { onMounted, ref } from 'vue';

    // const router = useRouter();
    export default {
        components: { Multiselect },
        props: ['companyID'],
        data () {
            return {
                selected: null,
                shippingInvoiceType:null,
                options_country: [],
                options_product_category: [],
                options_shipping_invoice_type: [
                    // { text: 'FBA', value: '1' },
                    // { text: 'FBM', value: '2' },
                    // { text: 'Product Sample', value: '3' },
                    // { text: 'Non Commercial', value: '4' },
                    {'value': '1', 'name': 'FBA' },
                    {'value': '2', 'name': 'FBM' },
                    {'value': '3', 'name': 'Product Sample' },
                    {'value': '4', 'name': 'Non Commercial' },

                ],
                updateProductModal : ref(null),
                selectShippingInvoiceCategoryModal : ref(null),
                viewProductModal : ref(null),
                is_submit_add_admin_user_form : ref(false),
                formData : new FormData(),
                product:{
                    product_name: '',
                    product_url: '',
                    sku: '',
                    product_material_composition: '',
                    product_barcode: '',
                    product_barcode_type: '',
                    hs_code: '',
                    asin: '',
                    country_of_origin : '',
                    product_packaging_material_list: '',
                    dimension_of_product_packaging_cm: '',
                    dimension_of_product_cm: '',
                    company_id: store.state.company.data.id,
                    status: '4',
                    product_categories_id: '0',
                    volume: '',
                    msrp: '',
                    is_product_heat_sensitive:  '',
                    precautions:  '',
                    how_to_use:  '',
                    id:  '',
                    product_image:  '',
                    net_weight:  '',
                    country_name:  '',

                },
                product_heat_options: [{ value: 1, name: 'Yes'}, { value: 0, name: 'No' }],
                router : useRouter()
            }
        },
        mounted() {
            this.initPopup();
        },
        methods: {

            change_file_product_label_text_file(event){
              this.formData.append('product_label_text_file', event.target.files[0]);
              this.label_text_file = event.target.files[0];
            },
            change_file_product_image(event){
                this.formData.append('product_image', event.target.files[0]);
                if(event.target.files[0]){
                    this.product.product_image = event.target.files[0].name;
                }else{
                    this.product.product_image = null;
                }

            },
            change_file_barcode_image(event){
                this.formData.append('barcode_image', event.target.files[0]);
            },
            change_file_certificate_country_of_origin(event){
                this.formData.append('certificate_country_of_origin', event.target.files[0]);
            },
            change_file_product_packaging_image(event){
                this.formData.append('product_packaging_image', event.target.files[0]);
            },


            showMessage (msg = '', type = 'error') {
                const toast = window.Swal.mixin({ toast: true, position: 'top', showConfirmButton: false, timer: 3000 });
                toast.fire({ icon: type, title: msg, padding: '10px 20px' });
            },
            show_edit_row(item){
                this.is_submit_add_admin_user_form = false;
                this.updateProductModal.show();


            },
            show_view_row(item){
                this.viewProductModal.show();

            },
            update_product(){
                this.is_submit_add_admin_user_form = true;
                if (this.product.product_name && this.product.product_url && this.product.product_image && this.product.product_url) {
                this.formData.append('product', JSON.stringify (this.product))

            }else{
                this.showMessage('Please fill required fields.','error')
            }
        },
        initPopup(){
                  this.selectShippingInvoiceCategoryModal = new window.bootstrap.Modal(document.getElementById('selectShippingInvoiceCategoryModal'));
        },



        selectShippingInvoiceCategory(){

            if(this.shippingInvoiceType == '1'){
                this.selectShippingInvoiceCategoryModal.hide()
                this.router.push({
                    name: "fba",
                    params: { company_id: this.router.currentRoute.params.company_id }
                });
            }else if(this.shippingInvoiceType == '3'){
                this.selectShippingInvoiceCategoryModal.hide()
                this.router.push({
                    name: "product-sample",
                    params: { company_id: this.router.currentRoute.params.company_id }
                });
            }else if(this.shippingInvoiceType == '4'){
                this.selectShippingInvoiceCategoryModal.hide()
                this.router.push({
                    name: "non-commercial",
                    params: { company_id: this.router.currentRoute.params.company_id }
                });
            }
        }

        },

        created: function(){


        store.dispatch("getCountries")
        .then((res) => {
            res.data.forEach(element => {
                this.options_country.push({'value': element.id, 'name': element.nicename });
            });

        }),
        store.dispatch("getProductCategories")
        .then((res) => {
            console.log("getProductCategories",res)
            res.data.forEach(element => {
                this.options_product_category.push({'value': element.id, 'name': element.category_name });
            });

        }),
        store.dispatch("getUser")
        .then((res) => {
            this.product.company_id = this.companyID;
            if(res.data.company_id){
                this.product.company_id = res.data.company_id
            }

        })
    }
    }
</script>

<script setup>

    useMeta({ title: 'Non-Regulated Products' });

    const columns = ref(['Id', 'Date', 'Product Category', 'Invoice #', 'Total value of Shipment (JPY)','Shipping Invoice','Status','Actions']);
    const items = ref([]);
    const table_option = ref({
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
    });
    const isOpen = ref(null);
    onMounted(() => {
    });



</script>

<style src="@vueform/multiselect/themes/default.css"></style>
<style>
.custom-file{
    overflow: hidden;
}

</style>
