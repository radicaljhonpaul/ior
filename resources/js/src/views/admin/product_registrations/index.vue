<template>
    <div class="layout-px-spacing">
      <teleport to="#breadcrumb">
        <ul class="navbar-nav flex-row">
          <li>
            <div class="page-header">
              <nav class="breadcrumb-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="javascript:;">Product Registration</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <span>{{ this.capitalizeFirstLetter($route.params.status) }}</span>
                  </li>
                </ol>
              </nav>
            </div>
          </li>
        </ul>
      </teleport>

      <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="row mt-3">
                <p class="fs-4 fw-bold"> {{ this.capitalizeFirstLetter($route.params.status) }} Product Registrations </p>
            </div>
          <div class="panel br-6 p-0">

            <div v-cloak class="custom-table">
              <v-client-table
                :data="this.items_all"
                :columns="this.columns"
                :options="this.table_option"
              >
                <template #product_name="props">
                  <a
                    style="font-weight: bolder;"
                    role="menuitem"
                    href="javascript:"
                    target="_self"
                    @click="this.showProductRegistrationDetails(props.row.id)"
                    class="text-info"
                    >{{ props.row.product_name }}</a
                  >


                </template>
                <template #status="props">
                  <span
                    v-if="props.row.status == 'Approved'"
                    class="badge inv-status badge-success"
                    >{{ props.row.status }}</span
                  >
                  <span
                    v-if="props.row.status == 'Pending'"
                    class="badge inv-status badge-secondary"
                    >{{ props.row.status }}</span
                  >
                  <span
                    v-if="props.row.status == 'Declined'"
                    class="badge inv-status badge-danger"
                    >{{ props.row.status }}</span
                  >
                </template>
                <template #actions="props">
                  <div class="actions text-center">
                    <div
                      class="dropdown b-dropdown custom-dropdown btn-group"
                      id="__BVID__464"
                    >
                      <a
                        aria-haspopup="true"
                        aria-expanded="false"
                        href="javascript:;"
                        target="_self"
                        class="btn dropdown-toggle btn-icon-only"
                        data-bs-toggle="dropdown"
                        boundary="body"
                        id="ddlcustom"
                      >
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
                          class="feather feather-more-horizontal"
                        >
                          <circle cx="12" cy="12" r="1"></circle>
                          <circle cx="19" cy="12" r="1"></circle>
                          <circle cx="5" cy="12" r="1"></circle>
                        </svg>
                      </a>
                      <ul
                        role="menu"
                        tabindex="-1"
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="ddlcustom"
                        style=""
                      >
                        <li
                          v-if="props.row.status == 'Declined' || props.row.status == 'Pending'"
                          role="presentation"
                        >
                          <a
                            role="menuitem"
                            href="javascript:"
                            target="_self"
                            @click="this.showApproveRegProd(props.row.id)"
                            class="dropdown-item"
                            >Approve</a
                          >
                        </li>
                        <li
                          v-if="props.row.status == 'Approved' || props.row.status == 'Declined'"
                          role="presentation"
                        >
                          <a
                            role="menuitem"
                            href="javascript:"
                            target="_self"
                            @click="this.setProdRegPending(props.row.id)"
                            class="dropdown-item"
                            >Pending</a
                          >
                        </li>
                        <li
                          v-if="props.row.status == 'Approved' || props.row.status == 'Pending'"
                          role="presentation"
                        >
                          <a
                            role="menuitem"
                            href="javascript:"
                            target="_self"
                            @click="this.setProdRegDecline(props.row.id)"
                            class="dropdown-item"
                            >Decline</a
                          >
                        </li>
                        <li
                          role="presentation"
                        >
                          <a
                            role="menuitem"
                            href="javascript:"
                            target="_self"
                            @click="this.showUpdateRegProd(props.row.id)"
                            class="dropdown-item"
                            >Edit</a
                          >
                        </li>

                        <li
                          role="presentation"
                        >
                          <a
                            role="menuitem"
                            v-bind:href="'/admin/comment/'+ props.row.id + '/' + props.row.product_name"
                            class="dropdown-item"
                            >Comment</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </template>
                <template #salary="props"> ${{ props.row.salary }} </template>
              </v-client-table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Product Label Status Modal -->
    <div
      class="modal fade modal-notification"
      id="approveProdRegModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="standardModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Product Label Status</h5>
            <button
              type="button"
              data-dismiss="modal"
              data-bs-dismiss="modal"
              aria-label="Close"
              class="btn-close"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-lg-12 col-12 layout-spacing">
                  <div class="statbox panel box box-shadow">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                          <h4>Product Label is Required?</h4>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div role="radiogroup" tabindex="-1" class="">
                        <div
                          class="radio-primary custom-control d-inline-flex custom-radio me-3"
                        >
                          <input
                            v-model="is_product_label"
                            type="radio"
                            class="custom-control-input"
                            value="1"
                            id="rdo1"
                            name="rdoinline"
                          />
                          <label class="custom-control-label" for="rdo1"
                            >Yes</label
                          >
                        </div>
                        <div
                          class="radio-primary custom-control d-inline-flex custom-radio me-3"
                        >
                          <input
                            v-model="is_product_label"
                            type="radio"
                            class="custom-control-input"
                            value="2"
                            id="rdo2"
                            name="rdoinline"
                          />
                          <label class="custom-control-label" for="rdo2"
                            >No</label
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div
                  class="col-lg-12 col-12 layout-spacing"
                  v-if="this.is_product_label == 1"
                >
                  <div class="statbox panel box box-shadow">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                          <h4>Product Label Type</h4>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <select
                          v-model="selected_product_label_type"
                          class="form-select form-select-md"
                        >
                          <option
                            v-for="option in options_product_label_type"
                            :value="option.value"
                          >
                            {{ option.text }}
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn"
              data-dismiss="modal"
              data-bs-dismiss="modal"
            >
              <i class="flaticon-cancel-12"></i> Cancel
            </button>
            <button
              type="button"
              data-bs-toggle="tooltip"
              title="Product will still be approved but Product Label status is not saved."
              class="btn btn-primary bs-tooltip"
              @click="this.saveWOProductLabel()"
            >
              Not Applicable
            </button>
            <button
              v-if="this.is_product_label == 1"
              type="button"
              class="btn btn-secondary"
              @click="this.saveProductLabel()"
            >
              Save
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Update Product Registration Modal -->
    <div class="modal fade modal-notification" id="update-prod-reg-modal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
              <div class="modal-body">
                <div class="add-contact-box">
                        <div class="add-contact-content">
                          <h4 v-if="this.prodRegModalstatus == 1">Update Product Registration</h4>
                          <h4 v-if="this.prodRegModalstatus == 2">Product Registration Details</h4>
                          <hr>
                            <form>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Product Name</label>
                                        <input type="hidden" class="form-control" id="company_id" v-model="product.company_id"/>
                                        <input type="hidden" class="form-control" id="id" v-model="product.id"/>
                                        <input type="text" class="form-control" name="product_name" id="product_name" v-model="product.product_name" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.product_name}}</h6>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Product Image</label>
                                        <br v-if="this.prodRegModalstatus == 2" />
                                        <a
                                          v-if="product.product_image"
                                          role="menuitem"
                                          :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.product_image"
                                          target="_blank"
                                          class=""
                                          > (View File)
                                        </a>
                                        <input type="file" class="form-control" @change="this.change_file_product_image" v-if="this.prodRegModalstatus == 1"/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Product URL</label>
                                        <input type="text" class="form-control" id="product_url" v-model="product.product_url" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.product_url}}</h6>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">SKU / Model Number</label>
                                        <input type="text" class="form-control" id="model_number" v-model="product.model_number" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.model_number}}</h6>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Product Label Text File</label>
                                        <br v-if="this.prodRegModalstatus == 2" />
                                        <a
                                          v-if="product.product_label_text"
                                          role="menuitem"
                                          :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.product_label_text"
                                          target="_blank"
                                          class=""
                                          > (View File)
                                        </a>
                                        <input type="file" class="form-control" @change="this.change_file_product_label_text_file" v-if="this.prodRegModalstatus == 1"/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Product Material Composition</label>
                                        <input type="text" class="form-control" id="product_material_composition" v-model="product.product_material_composition" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.product_material_composition}}</h6>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Barcode Number</label>
                                        <input type="text" class="form-control"  id="product_barcode" v-model="product.product_barcode" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.product_barcode}}</h6>
                                      </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Barcode Type</label>
                                        <input type="text" class="form-control" id="product_barcode_type" v-model="product.product_barcode_type" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.product_barcode_type}}</h6>
                                      </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Barcode Image</label>
                                        <br v-if="this.prodRegModalstatus == 2" />
                                        <a
                                          v-if="product.product_barcode_image"
                                          role="menuitem"
                                          :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.product_barcode_image"
                                          target="_blank"
                                          class=""
                                          > (View File)
                                        </a>
                                        <input type="file" class="form-control"  @change="this.change_file_barcode_image" v-if="this.prodRegModalstatus == 1"/>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">HS Code</label>
                                        <input type="text" class="form-control" id="hs_code" v-model="product.hs_code" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.hs_code}}</h6>
                                      </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Country of Origin </label>
                                        <Multiselect
                                            v-model="product.country_of_origin"
                                            placeholder="Select a Country"
                                            label="name"
                                            trackBy="name"
                                            :options="options_country"
                                            :searchable="true"
                                            v-if="this.prodRegModalstatus == 1"
                                            >
                                        </Multiselect>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.country_name}}</h6>
                                     </div>
                                     <div class="form-group col-md-4">
                                        <label for="inputEmail4">Certificate Country of Origin </label>
                                        <br v-if="this.prodRegModalstatus == 2" />
                                        <a
                                          v-if="product.certificate_country_of_origin_product"
                                          role="menuitem"
                                          :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.certificate_country_of_origin_product"
                                          target="_blank"
                                          class=""
                                          > (View File)
                                        </a>
                                        <input type="file" class="form-control"  @change="this.change_file_certificate_country_of_origin" v-if="this.prodRegModalstatus == 1"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">ASIN </label>
                                        <input type="text" class="form-control" id="asin" v-model="product.asin" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.asin}}</h6>
                                      </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Product Packaging Material </label>
                                        <input type="text" class="form-control" id="product_packaging_material_list" v-model="product.product_packaging_material_list" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.product_packaging_material_list}}</h6>
                                      </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Packaging Image </label>
                                        <br v-if="this.prodRegModalstatus == 2" />
                                        <a
                                          v-if="product.product_packaging_image"
                                          role="menuitem"
                                          :href="'/storage/product_registrations/'+product.company_id+'/'+product.id+'/'+product.product_packaging_image"
                                          target="_blank"
                                          class=""
                                          > (View File)
                                        </a>
                                        <input type="file" class="form-control"  @change="this.change_file_packaging_image" v-if="this.prodRegModalstatus == 1"/>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Dimension Product (CM) </label>
                                        <input type="text" class="form-control" id="dimension_of_product_cm" v-model="product.dimension_of_product_cm" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.dimension_of_product_cm}}</h6>
                                      </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Dimension Product Packaging (CM) </label>
                                        <input type="text" class="form-control" id="dimension_of_product_packaging_cm" v-model="product.dimension_of_product_packaging_cm" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.dimension_of_product_packaging_cm}}</h6>
                                      </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Volume</label>
                                        <input type="text" class="form-control" id="volume" v-model="product.volume" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.volume}}</h6>
                                      </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Declared Selling Price (JPY) </label>
                                        <input type="text" class="form-control" id="msrp" v-model="product.msrp" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.msrp}}</h6>
                                      </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Is Product Heat Sensitive</label>
                                        <Multiselect
                                        v-if="this.prodRegModalstatus == 1"
                                        v-model="product.is_product_heat_sensitive"
                                        placeholder="Select..."
                                        label="name"
                                        trackBy="name"
                                        :options="product_heat_options"
                                        :searchable="true"
                                        >
                                        </Multiselect>
                                        <h6 v-if="this.prodRegModalstatus == 2">
                                          <span v-if="product.is_product_heat_sensitive == 1"> Yes </span>
                                          <span v-else> No </span>
                                        </h6>
                                      </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Precautions</label>
                                        <input type="text" class="form-control" id="precautions" v-model="product.precautions" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.precautions}}</h6>
                                      </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">How to Use </label>
                                        <input type="text" class="form-control" id="how_to_use" v-model="product.how_to_use" v-if="this.prodRegModalstatus == 1"/>
                                        <h6 v-if="this.prodRegModalstatus == 2">{{product.how_to_use}}</h6>
                                      </div>

                                </div>

                            </form>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                  <button v-if="this.prodRegModalstatus == 1" type="button" class="btn" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                  <button v-if="this.prodRegModalstatus == 2" type="button" class="btn" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                  <button v-if="this.prodRegModalstatus == 1" type="button" class="btn btn-primary"  @click="this.updateProdReg">Update Product Registration</button>
              </div>
          </div>
      </div>
  </div>

  </template>

  <script>

  import Multiselect from '@vueform/multiselect'
  import storeProducts from "../../../store/admin/product_registration";
  import store from "../../../store";
  import { useRouter } from "vue-router";
  import { useMeta } from '@/composables/use-meta';
  import '@/assets/sass/elements/tooltip.scss';

  import { computed, onMounted, ref } from 'vue';

  // const router = useRouter();
  export default {
      data () {
          return {
              options_country: [],
              product:{
                  product_name: '',
                  product_url: '',
                  model_number: '',
                  product_material_composition: '',
                  product_barcode: '',
                  product_barcode_type: '',
                  hs_code: '',
                  asin: '',
                  product_packaging_material_list: '',
                  country_of_origin : '',
                  certificate_country_of_origin_product : '',
                  country_name : '',
                  product_packaging_image : '',
                  is_product_heat_sensitive: '',
              },
              items_all: ref([]),
              approveProdRegModal : ref(null),
              update_prod_reg_modal : ref(null),
              is_product_label : 0,
              product_label_type : 0,
              selected_product_label_type: '1',
              options_product_label_type: [
                  { text: 'Basic Japan Product Label', value: '1' },
                  { text: 'Premium Japan Product Label', value: '2' },
              ],
              product_registration_id : null,
              formData : new FormData(),
              router : useRouter(),
              status : 'all',
              table_option : ref({
                  perPage: 10,
                  perPageValues: [5, 10, 20, 50],
                  skin: 'table table-hover',
                  columnsClasses: { actions: 'actions text-center' },
                  sortable: ['product_name', 'hs_code', 'asin', 'status'],
                  pagination: { nav: 'scroll', chunk: 5 },
                  texts: {
                      count: 'Showing {from} to {to} of {count}',
                      filter: '',
                      filterPlaceholder: 'Search...',
                      limit: 'Results:',
                  },
                  resizableColumns: false,
              }),
              columns : ref(['product_name', 'hs_code', 'asin', 'status', 'actions']),
              prodRegModalstatus : ref(1),
              user: ref({}),
              product_heat_options: [{ value: 1, name: 'Yes'}, { value: 0, name: 'No' }],
          }
      },
      methods: {
          addProduct(ev) {
               //console.log(product)
              ev.preventDefault();

              const product_name = document.getElementById('product_name');

              console.log(product_name.value);

              storeProducts
                  .dispatch("addProduct", this.product)
                  .then((res) => {
                      this.product.product_name = null;
                      // if(res.status == 201 || res.status == '201'){
                      //     this.router.push({
                      //         name: "admin-users",
                      //     });
                      // }
                  })
                  .catch((err) => {
                  // loading.value = false;
                  // errorMsg.value = err.response.data.error;
                  });
          },
          initPopup(){
              this.approveProdRegModal = new window.bootstrap.Modal(document.getElementById('approveProdRegModal'));
              this.update_prod_reg_modal = new window.bootstrap.Modal(document.getElementById('update-prod-reg-modal'));
          },
          bindData(){
            let routeAction = 'getProducts'
              if(this.$route.params.status == 'pending'){
                routeAction = 'getProductsPending'
              }else if(this.$route.params.status == 'approved'){
                routeAction = 'getProductsApproved'
              }else if(this.$route.params.status == 'declined'){
                routeAction = 'getProductsDeclined'
              }
              storeProducts.dispatch(routeAction)
              .then((res) => {
                      console.log("products",res.data)
                      this.items_all = res.data;

                  })
                  .catch((err) => {
                          // loading.value = false;
                          // errorMsg.value = err.response.data.error;
                          });

          },
          showApproveRegProd(id){
              this.is_product_label = 0;
              this.product_label_type = 0;
              this.approveProdRegModal.show()
              this.product_registration_id = id
          },
          showUpdateRegProd(id){
              this.prodRegModalstatus = 1;
              this.getProdRegById(id)
              this.update_prod_reg_modal.show()
          },
          showProductRegistrationDetails(id){
            this.prodRegModalstatus = 2;
            this.getProdRegById(id)
            this.update_prod_reg_modal.show()
          },
          getProdRegById(id){
            storeProducts
                .dispatch("getProdRegById",id)
                .then((res) => {
                  console.log("test",res.data[0])
                  this.product = res.data[0]
                })
                .catch((err) => {

                });
          },
          setProdRegApprove(id){

              const swalWithBootstrapButtons = window.Swal.mixin({
                  confirmButtonClass: 'btn btn-secondary',
                  cancelButtonClass: 'btn btn-dark me-3',
                  buttonsStyling: false,
              });
              swalWithBootstrapButtons
                  .fire({
                      title: 'Are you sure you want to Approve this Product Registration?',
                      text: "",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Yes!',
                      cancelButtonText: 'No, cancel!',
                      reverseButtons: true,
                      padding: '2em',
                  })
                  .then((result) => {
                      if (result.value) {
                          const data = {
                              id : id,
                              status : 1,
                              product_label : this.is_product_label,
                              product_label_type : this.product_label_type
                          }
                          console.log(data)
                          storeProducts
                              .dispatch("productRegistrationAction",data)
                              .then((res) => {
                                  swalWithBootstrapButtons.fire('Approved!', 'Product Registration has been approved.', 'success');
                                  this.bindData()
                                  this.approveProdRegModal.hide()
                              })
                              .catch((err) => {

                              });
                      } else if (result.dismiss === window.Swal.DismissReason.cancel) {
                          swalWithBootstrapButtons.fire('Cancelled', 'Approved Process Cancelled', 'error');
                      }
                  });
          },
          setProdRegPending(id){
              const swalWithBootstrapButtons = window.Swal.mixin({
                  confirmButtonClass: 'btn btn-secondary',
                  cancelButtonClass: 'btn btn-dark me-3',
                  buttonsStyling: false,
              });
              swalWithBootstrapButtons
                  .fire({
                      title: 'Are you sure you want to Pending this Product Registration?',
                      text: "",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Yes!',
                      cancelButtonText: 'No, cancel!',
                      reverseButtons: true,
                      padding: '2em',
                  })
                  .then((result) => {
                      if (result.value) {
                          const data = {
                              id : id,
                              status : 4,
                          }
                          storeProducts
                              .dispatch("productRegistrationAction",data)
                              .then((res) => {
                                  swalWithBootstrapButtons.fire('Pending!', 'Product Registration has been approved.', 'success');
                                  this.bindData()
                              })
                              .catch((err) => {

                              });
                      } else if (result.dismiss === window.Swal.DismissReason.cancel) {
                          swalWithBootstrapButtons.fire('Cancelled', 'Pending Process Cancelled', 'error');
                      }
                  });

          },
          setProdRegDecline(id){
            const swalQueueStep = window.Swal.mixin({
                confirmButtonText: 'Proceed',
                cancelButtonText: 'No, cancel!',
                showCancelButton: true,
                // progressSteps: steps,
                input: 'textarea',
                inputAttributes: {
                    required: true,
                },
                validationMessage: 'This field is required',
                padding: '2em',
            });
            const values = '';
            const result = swalQueueStep.fire({
                title: `Decline Message`,
                inputValue: values,
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {

                    const decline_msg = result.value
                    const swalWithBootstrapButtons = window.Swal.mixin({
                        confirmButtonClass: 'btn btn-secondary',
                        cancelButtonClass: 'btn btn-dark me-3',
                        buttonsStyling: false,
                    });
                    swalWithBootstrapButtons
                        .fire({
                            title: 'Are you sure you want to Decline this Product Registration?',
                            text: "",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes!',
                            cancelButtonText: 'No, cancel!',
                            reverseButtons: true,
                            padding: '2em',
                        })
                        .then((result) => {
                            if (result.value) {
                                const data = {
                                    id : id,
                                    status : 2,
                                }

                                const data2 = {
                                    user_id : this.user.id,
                                    product_registration_id : id,
                                    comments : 'Declined because '+ decline_msg,
                                }
                                storeProducts
                                    .dispatch("productRegistrationAction",data)
                                    .then((res) => {

                                        storeProducts
                                            .dispatch("addDeclinedMessage",data2)
                                            .then((res) => {
                                                swalWithBootstrapButtons.fire('Decline!', 'Product Registration has been declined.', 'success');
                                                this.bindData()
                                            })
                                            .catch((err) => {

                                            });
                                    })
                                    .catch((err) => {

                                    });


                            } else if (result.dismiss === window.Swal.DismissReason.cancel) {
                                swalWithBootstrapButtons.fire('Cancelled', 'Decline Process Cancelled', 'error');
                            }
                        });
                } else if (result.dismiss === window.Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire('Cancelled', 'Declining Process Cancelled', 'error');
                }
            });



            // if (currentStep === steps.length) {
            //     window.Swal.fire({
            //         title: 'All done!',
            //         padding: '2em',
            //         html: 'Your answers: <pre>' + JSON.stringify(values) + '</pre>',
            //         confirmButtonText: 'Lovely!',
            //     });
            // }
            //   const swalWithBootstrapButtons = window.Swal.mixin({
            //       confirmButtonClass: 'btn btn-secondary',
            //       cancelButtonClass: 'btn btn-dark me-3',
            //       buttonsStyling: false,
            //   });
            //   swalWithBootstrapButtons
            //       .fire({
            //           title: 'Are you sure you want to Decline this Product Registration?',
            //           text: "",
            //           icon: 'warning',
            //           showCancelButton: true,
            //           confirmButtonText: 'Yes!',
            //           cancelButtonText: 'No, cancel!',
            //           reverseButtons: true,
            //           padding: '2em',
            //       })
            //       .then((result) => {
            //           if (result.value) {
            //               const data = {
            //                   id : id,
            //                   status : 2,
            //               }
            //               storeProducts
            //                   .dispatch("productRegistrationAction",data)
            //                   .then((res) => {
            //                       swalWithBootstrapButtons.fire('Decline!', 'Product Registration has been declined.', 'success');
            //                       this.bindData()
            //                   })
            //                   .catch((err) => {

            //                   });
            //           } else if (result.dismiss === window.Swal.DismissReason.cancel) {
            //               swalWithBootstrapButtons.fire('Cancelled', 'Decline Process Cancelled', 'error');
            //           }
            //       });
          },
          initTooltip(){
              setTimeout(() => {
                  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                  tooltipTriggerList.map((tooltipTriggerEl) => {
                      return new window.bootstrap.Tooltip(tooltipTriggerEl);
                  });
              });
          },
          saveWOProductLabel(){
              // alert(this.product_registration_id)
              this.is_product_label = 0;
              this.product_label_type = 0;
              this.setProdRegApprove(this.product_registration_id)
          },
          saveProductLabel(){
              // alert(this.product_registration_id)
              // this.is_product_label = 0;
              this.product_label_type = this.selected_product_label_type;
              this.setProdRegApprove(this.product_registration_id)
           },
          change_file_product_label_text_file(event){
              this.formData.append('product_label_text_file', event.target.files[0]);
          },
          change_file_product_image(event){
              this.formData.append('product_image', event.target.files[0]);
          },
          change_file_barcode_image(event){
              this.formData.append('barcode_image', event.target.files[0]);
          },
          change_file_certificate_country_of_origin(event){
              this.formData.append('certificate_country_of_origin', event.target.files[0]);
          },
          change_file_packaging_image(event){
              this.formData.append('packaging_image', event.target.files[0]);
          },
          updateProdReg(){
            this.formData.append('product', JSON.stringify (this.product))
            storeProducts
                .dispatch("updateProductRegistration", this.formData)
                .then((res) => {
                    console.log(res.data)
                    this.bindData()
                    this.update_prod_reg_modal.hide()
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top-center',
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '2em',
                    });
                    toast.fire({
                        icon: 'success',
                        title: "Product Registration has been updated!",
                        padding: '2em',
                    });

                })
                .catch((err) => {
                // loading.value = false;
                // errorMsg.value = err.response.data.error;
                });
          },
          capitalizeFirstLetter(string) {
              return string.charAt(0).toUpperCase() + string.slice(1);
          },
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
      mounted(){
          this.bindData()
          this.initPopup()
          this.initTooltip()
          var element = document.getElementById("admin-user-id");
          element.classList.remove("active");
      },
      created: function(){
        store.dispatch("getCountries")
        .then((res) => {
            res.data.forEach(element => {
                this.options_country.push({'value': element.id, 'name': element.nicename });
            });

        })
        this.getCurrentUserData();
        this.$watch(
          () => this.$route.params,
          (toParams, previousParams) => {
            this.bindData()
          }
        )
      }
  }
  </script>

  <script setup>
  useMeta({ title: 'Basic Table' });
  </script>
  <style src="@vueform/multiselect/themes/default.css"></style>
