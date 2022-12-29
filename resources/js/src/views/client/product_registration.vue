
<template>
    <div :companyID="companyID" class="layout-px-spacing">
        <teleport to="#breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:;">Client</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Product Registration</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </teleport>


        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="row mt-3">
                    <p class="fs-4 fw-bold"> Product Registration </p>
                </div>
                <div class="panel br-6 p-0">

                    <div class="custom-table">
                        <v-client-table :data="items" :columns="columns" :options="table_option"  @row-click="this.onRowClick">
                            <template #beforeFilter>
                                <button type="button" data-bs-toggle="modal" @click="clearInputs()" data-bs-target="#standardModal" class="btn me-2 btn-primary"
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
                                    Add Product
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
     <div class="modal fade modal-notification" id="standardModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Add Product Details</h5>
            <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="row" style="margin-bottom: 40px;">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Product Name <code>*</code></label>
                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" v-model="product.product_name" :class="[this.is_submit_add_admin_user_form ? (product.product_name ? 'is-valid' : 'is-invalid') : '']"/>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please fill the Product Name</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Product Image <code>*</code> </label>
                        <input id="product-image" type="file" class="form-control" @change="this.change_file_product_image" placeholder="Product Image" ref="file_product_image" :class="[this.is_submit_add_admin_user_form ? (product.product_image ? 'is-valid' : 'is-invalid') : '']"/>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please fill the Product Name</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Product URL <code>*</code></label>
                        <input type="text" class="form-control" id="product_url" placeholder="Product URL" v-model="product.product_url"  :class="[this.is_submit_add_admin_user_form ? (product.product_url ? 'is-valid' : 'is-invalid') : '']"/>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please fill the Product Image</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Country of Origin <code>*</code></label>
                        <Multiselect
                            v-model="product.country_of_origin"
                            placeholder="Select a Country"
                            label="name"
                            trackBy="name"
                            :options="options_country"
                            :searchable="true"
                            :class="[this.is_submit_add_admin_user_form ? (product.country_of_origin ? 'is-valid' : 'is-invalid') : '']"
                            >
                        </Multiselect>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please fill the Country of Origin</div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Product Category </label>
                        <Multiselect
                            v-model="product.product_categories_id"
                            placeholder="Select a Product Category"
                            label="name"
                            trackBy="name"
                            :options="options_product_category"
                            :searchable="true"
                            >
                        </Multiselect>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">HS Code</label>
                        <input type="text" class="form-control" id="hs_code" placeholder="HS Code" v-model="product.hs_code"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Product Packaging Image </label>
                        <input type="file" class="form-control"  @change="this.change_file_product_packaging_image"  ref="file_product_packaging_image"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Product Label Text File</label>
                        <input type="file" class="form-control" @change="this.change_file_product_label_text_file" ref="file_product_label_text_file"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">SKU / Model Number </label>
                        <input type="text" class="form-control" id="sku" placeholder="SKU / Model Number" v-model="product.sku" />
                    </div>


                    <!-- <div class="form-group col-md-6">
                        <label for="inputPassword4">Product Material Composition</label>
                        <input type="text" class="form-control" id="product_material_composition" v-model="product.product_material_composition"/>
                    </div> -->

                    <div class="form-group col-md-6">
                        <label for="inputEmail4">ASIN </label>
                        <input type="text" class="form-control" id="asin" placeholder="ASIN" v-model="product.asin"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Net Weight </label>
                        <input type="text" class="form-control" id="net_weight" placeholder="Net Weight" v-model="product.net_weight"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Certificate Country of Origin </label>
                        <input type="file" class="form-control"  @change="this.change_file_certificate_country_of_origin"  ref="file_certificate_country_of_origin"/>
                    </div>
                </div>
                <!--

                 -->


                <!-- <div class="row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Dimension Product (CM) </label>
                        <input type="text" class="form-control" id="dimension_of_product_cm" v-model="product.dimension_of_product_cm"/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Dimension Product Packaging (CM) </label>
                        <input type="text" class="form-control" id="dimension_of_product_packaging_cm" v-model="product.dimension_of_product_packaging_cm"/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Volume</label>
                        <input type="text" class="form-control" id="volume" v-model="product.volume"/>
                    </div>
                </div> -->

                <!-- <div class="row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Declared Selling Price (JPY) </label>
                        <input type="text" class="form-control" id="msrp" v-model="product.msrp"/>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Is Product Heat Sensitive</label>

                        <Multiselect
                        v-model="product.is_product_heat_sensitive"
                        placeholder="Select..."
                        label="name"
                        trackBy="name"
                        :options="product_heat_options"
                        :searchable="true"
                        >
                        </Multiselect>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Precautions</label>
                        <input type="text" class="form-control" id="precautions" v-model="product.precautions"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">How to Use </label>
                        <input type="text" class="form-control" id="how_to_use" v-model="product.how_to_use"/>
                    </div>
                </div> -->
            </form>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary"  @click="this.addProduct">Add Product</button>
                    <button type="button" class="btn btn-info"  @click="this.addProductMore">Add More</button>
                </div>
            </div>
        </div>
     </div>
     <!-- EDIT-->
     <div id="updateProductModal" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
            <div class="modal-content mailbox-popup">
                <div class="modal-header">
                    <h5 class="modal-title">Update Product Information</h5>
                    <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form>

                                <div class="row" style="margin-bottom: 40px;">

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Product Name <code>*</code></label>
                                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" v-model="product.product_name" :class="[this.is_submit_add_admin_user_form ? (product.product_name ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Product Name</div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Product Image <code>*</code>
                                            <a target="_blank"   :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.product_image">
                                               (View File Here) </a>
                                        </label>
                                        <input type="file" class="form-control"  @change="this.change_file_product_image" ref="update_file_product_image"/>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Product URL <code>*</code></label>
                                        <input type="text" class="form-control" id="product_url" placeholder="Product URL" v-model="product.product_url" :class="[this.is_submit_add_admin_user_form ? (product.product_url ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Product URL</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Country of Origin <code>*</code></label>
                                        <Multiselect
                                            v-model="product.country_of_origin"
                                            placeholder="Select a Country"
                                            label="name"
                                            trackBy="name"
                                            :options="options_country"
                                            :searchable="true"
                                            :class="[this.is_submit_add_admin_user_form ? (product.country_of_origin ? 'is-valid' : 'is-invalid') : '']"
                                            >
                                        </Multiselect>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Country of Origin</div>
                                     </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Product Category </label>
                                        <Multiselect
                                            v-model="product.product_categories_id"
                                            placeholder="Select a Product Category"
                                            label="name"
                                            trackBy="name"
                                            :options="options_product_category"
                                            :searchable="true"
                                            >
                                        </Multiselect>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">HS Code</label>
                                        <input type="text" class="form-control" id="hs_code" placeholder="HS Code" v-model="product.hs_code"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Product Packaging Image
                                            <a v-if="product.product_packaging_image" target="_blank"
                                                :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.product_packaging_image">
                                             (View File Here) </a>
                                             <code v-else>
                                                <span
                                                    role="menuitem"
                                                    class=""
                                                    > (No File Uploaded)
                                                </span>
                                            </code>
                                        </label>
                                        <input type="file" class="form-control"  @change="this.change_file_product_packaging_image" ref="update_file_product_packaging_image"/>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Product Label Text File
                                            <a
                                                v-if="product.product_label_text"
                                                target="_blank"
                                                :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.product_label_text" ref="update_file_product_label_text_file">
                                               (View File Here)</a>
                                            <code v-else>
                                                <span
                                                    role="menuitem"
                                                    class=""
                                                    > (No File Uploaded)
                                                </span>
                                            </code>
                                        </label>
                                        <input type="file" class="form-control" @change="this.change_file_product_label_text_file"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">SKU / Model Number</label>
                                        <input type="text" class="form-control" id="sku" placeholder="SKU / Model Number" v-model="product.sku" />

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">ASIN </label>
                                        <input type="text" class="form-control" id="asin" placeholder="ASIN" v-model="product.asin"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Net Weight </label>
                                        <input type="text" class="form-control" id="net_weight" placeholder="Net Weight" v-model="product.net_weight"/>
                                    </div>

                                     <div class="form-group col-md-6">
                                        <label for="inputEmail4">Certificate Country of Origin
                                            <a v-if="product.certificate_country_of_origin_product" target="_blank"
                                                :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.certificate_country_of_origin_product">
                                                (View File Here)
                                                </a>
                                            <code v-else>
                                                <span
                                                    role="menuitem"
                                                    class=""
                                                    > (No File Uploaded)
                                                </span>
                                            </code>
                                        </label>
                                        <input type="file" class="form-control"  @change="this.change_file_certificate_country_of_origin" ref="update_file_certificate_country_of_origin"/>
                                    </div>



                                </div>



                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary" @click="update_product()">Update</button>
                </div>
            </div>
        </div>
     </div>
    <!-- VIEW-->
    <div id="viewProductModal" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
            <div class="modal-content mailbox-popup">
                <div class="modal-header">
                    <h5 class="modal-title"> Product Information</h5>
                    <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column">

                                        <div class="row" style="margin-bottom: 40px;">

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Product Name</label> <br>
                                                <b>{{product.product_name}}</b>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Product Image</label><br>
                                                 <a target="_blank"
                                                 :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.product_image">
                                                 <b>(View File Here)</b> </a>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Product URL</label><br>
                                                <b>{{product.product_url}}</b>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Country of Origin </label><br>
                                                <b>{{product.country_name}}</b>
                                            </div>



                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Product Category</label> <br>
                                                <b>{{product.category_name}}</b>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">HS Code</label><br>
                                                <b>{{product.hs_code}}</b>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Product Packaging Image </label><br>
                                                <a v-if="product.product_packaging_image" target="_blank"
                                                :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.product_packaging_image">
                                                <b>(View File Here)</b> </a>
                                                <code v-else>
                                                    <span
                                                        role="menuitem"
                                                        class=""
                                                        > (No File Uploaded)
                                                    </span>
                                                </code>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Product Label Text File</label><br>
                                                <a
                                                v-if="product.product_label_text"
                                                target="_blank"
                                                :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.product_label_text">
                                                <b>(View File Here)</b> </a>
                                                <code v-else>
                                                    <span
                                                        role="menuitem"
                                                        class=""
                                                        > (No File Uploaded)
                                                    </span>
                                                </code>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">SKU / Model Number</label><br>
                                                <b>{{product.sku}}</b>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">ASIN </label><br>
                                                <b>{{product.asin}}</b>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Net Weight </label><br>
                                                <b>{{product.net_weight}}</b>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Certificate Country of Origin </label><br>
                                                <a v-if="product.certificate_country_of_origin_product" target="_blank"
                                                :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.certificate_country_of_origin_product">
                                                <b>(View File Here)</b>
                                                </a>
                                                <code v-else>
                                                    <span
                                                        role="menuitem"
                                                        class=""
                                                        > (No File Uploaded)
                                                    </span>
                                                </code>
                                            </div>
                                            <!-- <div class="form-group col-md-6">
                                                <label for="inputPassword4">Product Material Composition</label><br>
                                                <b>{{product.product_material_composition}}</b>
                                            </div> -->
                                        </div>







                                        </div>

                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    import store from "../../store";
    import storeProducts from "../../store/client/product_registration";
    import { useRouter } from "vue-router";
    import { useMeta } from '@/composables/use-meta';
    import '@/assets/sass/elements/tooltip.scss';
    import Multiselect from '@vueform/multiselect'
    import '@suadelabs/vue3-multiselect/dist/vue3-multiselect.css';
    import { onMounted, ref } from 'vue';

    const router = useRouter();
    export default {
        components: { Multiselect },
        props: ['companyID'],
        data () {
            return {
                selected: null,
                options_country: [],
                options_product_category: [],
                updateProductModal : ref(null),
                standardModal : ref(null),
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

            addProductMore(ev) {

                ev.preventDefault();
                this.is_submit_add_admin_user_form = true;
                const product_image = this.$refs.file_product_image.files[0];
                const product_label_text_file = this.$refs.file_product_label_text_file.files[0];
                // const product_barcode_image = this.$refs.file_barcode_image.files[0];
                const file_product_packaging_image  =  this.$refs.file_product_packaging_image.files[0];
                const file_certificate_country_of_origin = this.$refs.file_certificate_country_of_origin.files[0];

                // if(product_image.size > 1024 * 1024 * 50){
                //         this.showMessage('Product Image Maximum 50MB file Size Only','error');
                // }
                // else if(product_label_text_file.size > 1024 * 1024 * 50){
                //         this.showMessage('Product Label Text File Maximum 50MB file Size Only','error');
                // }
                // else if(product_barcode_image.size > 1024 * 1024 * 50){
                //         this.showMessage('Product Barcode Image Maximum 50MB file Size Only','error');
                // }
                // else if(file_certificate_country_of_origin.size > 1024 * 1024 * 50) {
                //         this.showMessage('Certificate Country of Origin Maximum 50MB file Size Only','error');
                // }
                // else if(file_product_packaging_image.size > 1024 * 1024 * 50) {
                //         this.showMessage('Product Packaging Image Maximum 50MB file Size Only','error');
                // }


                if (this.product.product_name && this.product.product_url && this.product.product_image && this.product.country_of_origin) {
                this.formData.append('product', JSON.stringify(this.product))
                storeProducts
                    .dispatch("addProduct",  this.formData)
                    .then((res) => {
                        const toast = window.Swal.mixin({
                            toast: true,
                            position: 'top-center',
                            showConfirmButton: false,
                            timer: 3000,
                            padding: '2em',
                        });
                        toast.fire({
                            icon: 'success',
                            title: "Non-Regulated Product Succcessfully Added!",
                            padding: '2em',
                        });

                        this.$refs.file_product_image.value=null;
                        this.$refs.file_product_label_text_file.value=null;
                        this.$refs.file_product_packaging_image.value=null;
                        this.$refs.file_certificate_country_of_origin.value=null;
                        this.is_submit_add_admin_user_form = false;
                        this.product.product_name = null;
                        this.product.product_url = null;
                        this.product.sku = null;
                        this.product.product_material_composition = null;
                        this.product.product_barcode = null;
                        this.product.product_barcode_type = null;
                        this.product.hs_code = null;
                        this.product.asin = null;
                        this.product.product_packaging_material_list = null;
                        this.product.dimension_of_product_cm = null;
                        this.product.dimension_of_product_packaging_cm = null;
                        this.product.volume = null;
                        this.product.msrp = null;
                        this.product.is_product_heat_sensitive = null;
                        this.product.precautions = null;
                        this.product.how_to_use = null;
                        this.product.country_of_origin = null;
                        this.product.product_categories_id = null;
                        this.product.net_weight = null;
                        this.product.product_image = null
                        this.bind_data()

                    })
                    .catch((err) => {

                    });
                }else{
                    this.showMessage('Please fill required fields.','error')
                }
            },
            addProduct(ev) {
                ev.preventDefault();

                this.is_submit_add_admin_user_form = true;
                const product_image = this.$refs.file_product_image.files[0];
                const product_label_text_file = this.$refs.file_product_label_text_file.files[0];
                // const product_barcode_image = this.$refs.file_barcode_image.files[0];
                const file_product_packaging_image  =  this.$refs.file_product_packaging_image.files[0];
                const file_certificate_country_of_origin = this.$refs.file_certificate_country_of_origin.files[0];

                // if(product_image){
                //     if(product_image.size > 1024 * 1024 * 50){
                //         this.showMessage('Product Image Maximum 50MB file Size Only','error');
                //     }
                // }

                // if(file_certificate_country_of_origin){
                //     if(file_certificate_country_of_origin.size > 1024 * 1024 * 50){
                //         this.showMessage('Certificate Country of Origin Maximum 50MB file Size Only','error');
                //     }
                // }

                // if(product_label_text_file){
                //     if(product_label_text_file.size > 1024 * 1024 * 50){
                //         this.showMessage('Product Label Text File Maximum 50MB file Size Only','error');
                //     }
                // }

                // if(file_product_packaging_image){
                //     if(file_product_packaging_image.size > 1024 * 1024 * 50){
                //         this.showMessage('Product Packaging Image Maximum 50MB file Size Only','error');
                //     }
                // }


                // else if(product_label_text_file.size > 1024 * 1024 * 50){
                //         this.showMessage('Product Label Text File Maximum 50MB file Size Only','error');
                // }
                // else if(product_barcode_image.size > 1024 * 1024 * 50){
                //         this.showMessage('Product Barcode Image Maximum 50MB file Size Only','error');
                // }
                // else if(file_certificate_country_of_origin.size > 1024 * 1024 * 50) {
                //         this.showMessage('Certificate Country of Origin Maximum 50MB file Size Only','error');
                // }
                // else if(file_product_packaging_image.size > 1024 * 1024 * 50) {
                //         this.showMessage('Product Packaging Image Maximum 50MB file Size Only','error');
                // }

                if (this.product.product_name && this.product.product_url && this.product.product_image && this.product.country_of_origin) {


                        this.formData.append('product', JSON.stringify (this.product))
                        storeProducts
                        .dispatch("addProduct",  this.formData)
                        .then((res) => {

                            console.log(res);
                            this.$refs.file_product_image.value=null;
                            this.$refs.file_product_label_text_file.value=null;
                            this.$refs.file_product_packaging_image.value=null;
                            this.$refs.file_certificate_country_of_origin.value=null;
                            this.is_submit_add_admin_user_form = false;
                            this.standardModal.hide()
                            this.product.product_name = null;
                            this.product.product_url = null;
                            this.product.sku = null;
                            this.product.product_material_composition = null;
                            this.product.product_barcode = null;
                            this.product.product_barcode_type = null;
                            this.product.hs_code = null;
                            this.product.asin = null;
                            this.product.product_packaging_material_list = null;
                            this.product.dimension_of_product_cm = null;
                            this.product.dimension_of_product_packaging_cm = null;
                            this.product.volume = null;
                            this.product.msrp = null;
                            this.product.is_product_heat_sensitive = null;
                            this.product.precautions = null;
                            this.product.how_to_use = null;
                            this.product.country_of_origin = null;
                            this.product.product_categories_id = null;
                            this.product.net_weight = null;
                            this.product.product_image = null
                            // let element = document.getElementById("product-image");
                            // element.classList.remove("is-invalid");

                            this.bind_data()

                            const toast = window.Swal.mixin({
                                toast: true,
                                position: 'top-center',
                                showConfirmButton: false,
                                timer: 3000,
                                padding: '2em',
                            });
                            toast.fire({
                                icon: 'success',
                                title: "Non-Regulated Product Succcessfully Added!",
                                padding: '2em',
                            });

                        })
                        .catch((err) => {

                        });


                } else {
                    this.showMessage('Please fill required fields.','error')
                }

             },
            showMessage (msg = '', type = 'error') {
                const toast = window.Swal.mixin({ toast: true, position: 'top', showConfirmButton: false, timer: 3000 });
                toast.fire({ icon: type, title: msg, padding: '10px 20px' });
            },
            show_edit_row(item){
                this.is_submit_add_admin_user_form = false;
                this.updateProductModal.show();

                storeProducts
                    .dispatch("getProductsDetails", item.id)
                    .then((res) => {
                        this.product = res.data;
                        this.viewProductModal.hide();
                    })
                    .catch((err) => {

                    });
            },
            show_view_row(item){
                this.viewProductModal.show();
                storeProducts
                    .dispatch("getProductsDetails", item.id)
                    .then((res) => {
                        this.product = res.data;
                        console.log("getProductsDetails");
                        console.log(res);
                    })
                    .catch((err) => {
                    });
            },
            update_product(){
                this.is_submit_add_admin_user_form = true;
                if (this.product.product_name && this.product.product_url && this.product.product_image && this.product.product_url) {
                this.formData.append('product', JSON.stringify (this.product))
                storeProducts
                .dispatch("updateProduct",this.formData)
                .then((res) => {
                    this.updateProductModal.hide()
                    this.bind_data()
                    const toast = window.Swal.mixin({
                            toast: true,
                            position: 'top-center',
                            showConfirmButton: false,
                            timer: 3000,
                            padding: '2em',
                        });
                        toast.fire({
                            icon: 'success',
                            title: "Non-Regulated Product Succcessfully Updated!",
                            padding: '2em',
                        });

                        this.$refs.update_file_product_image.value=null;
                        this.$refs.update_file_product_label_text_file.value=null;
                        this.$refs.update_file_product_packaging_image.value=null;
                        this.$refs.update_file_certificate_country_of_origin.value=null;
                })
                .catch((err) => {
                });
            }else{
                this.showMessage('Please fill required fields.','error')
            }
        },
        initPopup(){
                  this.updateProductModal = new window.bootstrap.Modal(document.getElementById('updateProductModal'));
                  this.standardModal = new window.bootstrap.Modal(document.getElementById('standardModal'));
                  this.viewProductModal = new window.bootstrap.Modal(document.getElementById('viewProductModal'));
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
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true,
                    padding: '2em',
                })
                .then((result) => {
                    if (result.value) {
                        storeProducts
                            .dispatch("destroyProduct",item.id)
                            .then((res) => {
                                this.viewProductModal.hide();
                                swalWithBootstrapButtons.fire('Deleted!', 'Your Product has been deleted.', 'success');
                                this.bind_data()
                            })
                            .catch((err) => {
                            });
                    } else if (result.dismiss === window.Swal.DismissReason.cancel) {
                        this.viewProductModal.hide();
                        swalWithBootstrapButtons.fire('Cancelled', 'Delete Process Cancelled', 'error');
                    }
                });

        },
        onRowClick(event){
            this.viewProductModal.show();
                storeProducts
                    .dispatch("getProductsDetails", event.row.id)
                    .then((res) => {
                        this.product = res.data;
                        console.log("getProductsDetails");
                        console.log(res);
                    })
                    .catch((err) => {
              });
        },
        clearInputs(){
            this.$refs.file_product_image.value=null;
            this.$refs.file_product_label_text_file.value=null;
            this.$refs.file_product_packaging_image.value=null;
            this.$refs.file_certificate_country_of_origin.value=null;
            this.is_submit_add_admin_user_form = false;
            this.product.product_name = null;
            this.product.product_url = null;
            this.product.sku = null;
            this.product.product_material_composition = null;
            this.product.product_barcode = null;
            this.product.product_barcode_type = null;
            this.product.hs_code = null;
            this.product.asin = null;
            this.product.product_packaging_material_list = null;
            this.product.dimension_of_product_cm = null;
            this.product.dimension_of_product_packaging_cm = null;
            this.product.volume = null;
            this.product.msrp = null;
            this.product.is_product_heat_sensitive = null;
            this.product.precautions = null;
            this.product.how_to_use = null;
            this.product.country_of_origin = null;
            this.product.product_categories_id = null;
            this.product.net_weight = null;
            this.product.product_image = null
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

    const columns = ref(['product_name', 'hs_code', 'asin', 'actions']);
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
        bind_data();
    });

    const bind_data = () => {
        storeProducts.dispatch("getProducts")
        .then((res) => {
                items.value = res.data;
            })
            .catch((err) => {

            });

        };


    const view_row = (item) => {
        storeProducts
            .dispatch("getProducts", item.id)
            .then((res) => {
                console.log(res)
                router.push({
                    name: "products",
                });

            })
            .catch((err) => {

            });
    };

</script>

<style src="@vueform/multiselect/themes/default.css"></style>
<style>
.custom-file{
    overflow: hidden;
}

</style>
