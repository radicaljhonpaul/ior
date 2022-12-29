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
                    <span>Approved</span>
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
                <p class="fs-4 fw-bold"> Approved Product Registrations </p>
            </div>
          <div class="panel br-6 p-0">
            <!-- <button type="button" class="btn btn-warning mb-2 me-2" data-bs-toggle="modal" data-bs-target="#standardModal">Standard</button>
                      <button @click="isOpen = !isOpen" type="button" class="btn btn-dark btn-lg mb-4 me-2">ADD PRODUCT
                                                  </button> -->
            <div class="custom-table">
              <v-client-table
                :data="this.items_all"
                :columns="columns"
                :options="table_option"
              >
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
  
    <!-- Standard Modal -->
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
    <!-- Standard Modal -->
    <div class="modal fade modal-notification" id="update-prod-reg-modal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
              <div class="modal-body">
      <form>
      <div class="row">
          <div class="form-group col-md-6">
              <label for="inputEmail4">Product Name</label>
              <input type="text" class="form-control" name="product_name" id="product_name" v-model="product.product_name" />
          </div>
          <div class="form-group col-md-6">
              <label for="inputPassword4">Product Image</label>
              <input type="file" class="form-control" @change="this.change_file_product_image"/>
          </div>
      </div>
      <div class="row">
          <div class="form-group col-md-6">
              <label for="inputEmail4">Product URL</label>
              <input type="text" class="form-control"  v-model="product.product_url"/>
          </div>
          <div class="form-group col-md-6">
              <label for="inputPassword4">SKU / Model Number</label>
              <input type="text" class="form-control" v-model="product.model_number" />
          </div>
      </div>

      <div class="row">
          <div class="form-group col-md-6">
              <label for="inputEmail4">Product Label Text File</label>
              <input type="file" class="form-control" @change="this.change_file_product_label_text_file"/>
          </div>
          <div class="form-group col-md-6">
              <label for="inputPassword4">Product Material Composition</label>
              <input type="text" class="form-control" v-model="product.product_material_composition"/>
          </div>
      </div>

      <div class="row">
          <div class="form-group col-md-6">
              <label for="inputEmail4">Barcode Number</label>
              <input type="text" class="form-control"  v-model="product.product_barcode" />
          </div>
          <div class="form-group col-md-6">
              <label for="inputPassword4">Barcode Type</label>
              <input type="text" class="form-control" v-model="product.product_barcode_type"/>
          </div>
      </div>

      <div class="row">
          <div class="form-group col-md-6">
              <label for="inputEmail4">Barcode Image</label>
              <input type="file" class="form-control"  @change="this.change_file_barcode_image"/>
          </div>
          <div class="form-group col-md-6">
              <label for="inputPassword4">HS Code</label>
              <input type="text" class="form-control" v-model="product.hs_code"/>
          </div>
      </div>

      <div class="row">
          <div class="form-group col-md-6">
              <label for="inputEmail4">Country of Origin </label>
              <!-- <input type="text" class="form-control" v-model="product.country_of_origin"/> -->
              <Multiselect
              v-model="product.country_of_origin"
              placeholder="Select a country"
              label="name"
              trackBy="name"
              :options="options_country"
              :searchable="true"
              >
              </Multiselect>
            </div>
          <div class="form-group col-md-6">
              <label for="inputEmail4">Certificate Country of Origin </label>
              <input type="file" class="form-control"  @change="this.change_file_certificate_country_of_origin"/>
          </div>
      </div>

      <div class="row">
          <div class="form-group col-md-6">
              <label for="inputEmail4">ASIN </label>
              <input type="text" class="form-control" v-model="product.asin"/>
          </div>
          <div class="form-group col-md-6">
              <label for="inputEmail4">Product Packaging Material </label>
              <input type="text" class="form-control" v-model="product.product_packaging_material_list"/>
          </div>
      </div>

      <div class="row">
          <div class="form-group col-md-6">
              <label for="inputEmail4">Dimension Product (CM) </label>
              <input type="text" class="form-control" v-model="product.dimension_of_product_cm"/>
          </div>
          <div class="form-group col-md-6">
              <label for="inputEmail4">Dimension Product Packaging (CM) </label>
              <input type="text" class="form-control" v-model="product.dimension_of_product_packaging_cm"/>
          </div>
      </div>
  </form>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                  <button type="button" class="btn btn-primary"  @click="this.updateProdReg">Update Product Registration</button>
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
  
  import { onMounted, ref } from 'vue';
  
  const router = useRouter();
  export default {
      data () {
          return {
              router: useRouter(),
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
                  country_of_origin : ''
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
              formData : new FormData()
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
              storeProducts.dispatch("getProductsApproved")
              .then((res) => {
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
                          storeProducts
                              .dispatch("productRegistrationAction",data)
                              .then((res) => {
                                  swalWithBootstrapButtons.fire('Decline!', 'Product Registration has been declined.', 'success');
                                  this.bindData()
                              })
                              .catch((err) => {
  
                              });
                      } else if (result.dismiss === window.Swal.DismissReason.cancel) {
                          swalWithBootstrapButtons.fire('Cancelled', 'Decline Process Cancelled', 'error');
                      }
                  });
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
          }
          
  
      },
      mounted(){
          this.bindData()
          this.initPopup()
          this.initTooltip()
      },
      created: function(){
        store.dispatch("getCountries")
        .then((res) => {
            res.data.forEach(element => {
                // console.log(element);
                this.options_country.push({'value': element.id, 'name': element.nicename });
            });
            
        })
      }
  }
  </script>
  
  <script setup>
  
  useMeta({ title: 'Basic Table' });
  
  const columns = ref(['product_name', 'hs_code', 'asin', 'status', 'actions']);
  const table_option = ref({
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
  });
  const isOpen = ref(null);
  const view_row = (item) => {
      storeProducts
          .dispatch("getProducts", item.id)
          .then((res) => {
              console.log(res)
              router.push({
                  name: "company",
              });
  
          })
          .catch((err) => {
  
          });
  };
  </script>
  <style src="@vueform/multiselect/themes/default.css"></style>