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

        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
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
            <div class="col-lg-12">
                <div class="panel-body searchable-container" :class="[grid_type]">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-sm-end text-center layout-spacing align-self-end">
                            <div class="d-flex justify-content-sm-end justify-content-end">
                                <div class="switch align-self-end">
                                    <router-link :to="{ name: 'company-products', params: { company_id: this.product.company_id }}">
                                        <svg
                                            id="btn-add-contact"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-layers me-1">
                                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                            <polyline points="2 17 12 22 22 17"></polyline>
                                            <polyline points="2 12 12 17 22 12"></polyline>
                                        </svg>
                                    </router-link>
                                    <router-link :to="{ name: 'shipping invoice admin', params: { company_id: this.product.company_id }}">
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file me-1"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> -->
                                        <svg
                                            id="btn-add-contact"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-file me-1">
                                            <!-- <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon> -->
                                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                            <polyline points="13 2 13 9 20 9"></polyline>
                                        </svg>
                                    </router-link>
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#bulkProductUploadModal">
                                        <svg id="btn-add-contact"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-package me-1"
                                        >
                                            <line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line>
                                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                    </a>
                                    <a href="javascript:;" @click="this.addContact()">
                                        <svg
                                            id="btn-add-contact"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-user-plus me-auto"
                                        >
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <line x1="20" y1="8" x2="20" y2="14"></line>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="searchable-items" :class="[grid_type]">
                        <div class="items items-header-section">
                            <div class="item-content">
                                <div class="">
                                    <h4>Name</h4>
                                </div>
                                <div class="user-email">
                                    <h4>Email</h4>
                                </div>

                                <div class="user-phone">
                                    <h4 style="margin-left: 3px">Phone</h4>
                                </div>
                                <div class="action-btn">
                                    <h4 style="margin-left: 3px">Action</h4>
                                </div>
                            </div>
                        </div>

                        <div v-for="(user, index) in contacts_list" class="items" :key="index">
                            <div class="item-content">
                                <div class="user-profile">
                                    <img
                                        :src="user.avatar ? '/storage/user_avatar/'+user.id+'/'+user.avatar : 'https://ui-avatars.com/api/?name='+ user.fname + '+' + user.lname"
                                        alt="profile"
                                    />
                                    <div class="user-meta-info">
                                        <p class="user-name">{{ user.fname +' '+user.lname }}</p>
                                        <p class="user-work">{{ user.fname +' '+user.lname }}</p>
                                    </div>
                                </div>
                                <div class="user-email">
                                    <p class="info-title">Email:</p>
                                    <p class="usr-email-addr">{{ user.email }}</p>
                                </div>

                                <div class="user-phone">
                                    <p class="info-title">Phone:</p>
                                    <p class="usr-ph-no">{{ user.contact_number }}</p>
                                </div>
                                <div class="user-location">
                                    <p class="info-title">Location:</p>
                                    <p class="usr-location">{{ user.name }}</p>
                                </div>
                                <div class="action-btn">
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
                                    <a v-if="user.rolesperuser.role_id != 4" href="javascript:;" @click="this.delete_user(user)">
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
                                            class="feather feather-user-minus delete"
                                        >
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="contactModal" class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content mailbox-popup">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ params.id ? 'Update Contact Person' : 'Add Contact Person' }}</h5>
                                    <button type="button" data-dismiss="modal" data-bs-dismiss="modal" @click="this.clearUserInputs()" aria-label="Close" class="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="add-contact-box">
                                        <div class="add-contact-content">
                                            <form id="addContactModalTitle">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="d-flex flex-column">
                                                            <!-- row 1 -->
                                                            <div class="d-flex justify-content-between gap-2">
                                                                <div class="form-group">
                                                                    <label for="" class="fs-7"> Firstname <code>*</code> </label>
                                                                    <input v-model="user.fname" id="fname" name="fname" type="text" class="form-control" placeholder="Firstname" aria-label="Firstname" aria-describedby="Firstname" :class="[this.is_submit_add_contact_form ? (user.fname ? 'is-valid' : 'is-invalid') : '']"/>
                                                                    <div class="valid-feedback">Looks good!</div>
                                                                    <div class="invalid-feedback">Please fill the First Name</div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="" class="fs-7"> Lastname <code>*</code> </label>
                                                                    <input v-model="user.lname" id="lname" name="lname" type="text" class="form-control" placeholder="Lastname" aria-label="Lastname" aria-describedby="Lastname" :class="[this.is_submit_add_contact_form ? (user.lname ? 'is-valid' : 'is-invalid') : '']"/>
                                                                    <div class="valid-feedback">Looks good!</div>
                                                                    <div class="invalid-feedback">Please fill the Last Name</div>
                                                                </div>
                                                            </div>

                                                            <!-- row 2 -->
                                                            <div class="d-flex justify-content-between gap-2">
                                                                <div class="form-group">
                                                                    <label for="" class="fs-7"> Email <code>*</code> </label>
                                                                    <input autocomplete="off" v-model="user.email" id="email" name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="Email" :class="[this.is_submit_add_contact_form ? (user.email && this.email_validate(user.email) ? 'is-valid' : 'is-invalid') : '']"/>
                                                                    <div class="valid-feedback">Looks good!</div>
                                                                    <div class="invalid-feedback">Please fill the Email</div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="" class="fs-7"> Contact Number <code>*</code> </label>
                                                                    <input v-model="user.contact_number" id="contact_number" name="phone" type="text" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="Phone" :class="[this.is_submit_add_contact_form ? (user.contact_number ? 'is-valid' : 'is-invalid') : '']"/>
                                                                    <div class="valid-feedback">Looks good!</div>
                                                                    <div class="invalid-feedback">Please fill the Contact Number</div>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex justify-content-between gap-2">
                                                                <div class="form-group flex-fill">
                                                                    <label for="" class="fs-7"> Password <code>*</code> </label>
                                                                    <div class="input-group">
                                                                            <input :type="pwd_type" v-model="user.password" id="password"  name="password"  class="form-control" placeholder="Password" aria-label="Password" aria-describedby="Password" :class="[this.is_submit_add_contact_form ? (user.password ? 'is-valid' : 'is-invalid') : '']"/>
                                                                        <span class="input-group-text" @click="set_pwd_type" role="button" id="basic-addon1">
                                                                            <i class="far fa-eye"></i>
                                                                        </span>
                                                                        <div class="valid-feedback">Looks good!</div>
                                                                        <div class="invalid-feedback">Please fill the Password</div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <!-- row 3 -->
                                                            <div class="d-flex justify-content-between">
                                                                <div class="form-group flex-fill">
                                                                    <label for="" class="fs-7"> Password Confirmation <code>*</code> </label>
                                                                    <div class="input-group mb-4">
                                                                        <input :type="pwd_type2" v-model="user.password_confirmation" id="password_confirmation"  name="password_confirmation"  class="form-control" placeholder="Password Confirmation" aria-label="Password" aria-describedby="Password" :class="[this.is_submit_add_contact_form ? (user.password_confirmation && this.password_validate() ? 'is-valid' : 'is-invalid') : '']"/>
                                                                        <span class="input-group-text" @click="set_pwd_type2" role="button" id="basic-addon1">
                                                                            <i class="far fa-eye"></i>
                                                                        </span>
                                                                        <div class="valid-feedback">Looks good!</div>
                                                                        <div class="invalid-feedback">Please fill the Password Confirmation</div>
                                                                    </div>
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
                                    <button type="button" class="btn btn-default" @click="this.clearUserInputs()" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                    <button type="button" class="btn btn-primary" @click="this.saveOrAddContact()">{{ params.id ? 'Update' : 'Add' }}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="bulkProductUploadModal" ref="bulkProductUploadModal" class="modal fade" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content mailbox-popup">
                                <div class="modal-header">
                                    <h5 class="modal-title">Bulk Product Upload</h5>
                                    <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="bulkProductUpload">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group w-100">
                                                    <label for="" class="fs-7"> Product Zipped Images </label>
                                                    <input name="product_zipped_images" ref="product_zipped_images" type="file" class="form-control" @input="product.zipped_images = $event.target.files[0]" placeholder="Only upload any of these file types: .zip or .rar" aria-label="Zip File Upload" aria-describedby="Zip File Upload" />
                                                    <progress v-if="product.zipped_images.progress" :value="product.progress.percentage" max="100">
                                                    {{ product.progress.percentage }}%
                                                    </progress>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group w-100">
                                                    <label for="" class="fs-7"> Product CSV </label>
                                                    <input name="product_csv" ref="product_csv" type="file" class="form-control"  @input="product.csv = $event.target.files[0]" placeholder="Only upload any of these file types: csv, xlsx, xls." aria-label="CSV File Upload" aria-describedby="CSV File Upload" />
                                                    <progress v-if="product.csv.progress" :value="product.progress.percentage" max="100">
                                                    {{ product.progress.percentage }}%
                                                    </progress>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                    <button :disabled="product.csv == null && product.zipped_images == null" type="button" class="btn btn-primary" data-dismiss="modal" data-bs-dismiss="modal" @click="this.bulkProductUpload()">Upload</button>
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
    import { computed, onMounted, ref } from 'vue';
    import '@/assets/sass/apps/contacts.scss';
    import '@/assets/sass/font-icons/fontawesome/css/regular.css';
    import '@/assets/sass/font-icons/fontawesome/css/fontawesome.css';
    import store from "../../../store/index";
    import storeProducts from "../../../store/admin/product_registration";
    import storeCompany from "../../../store/admin/company";
    import storeUser from "../../../store/admin/user";
    import { useMeta } from '@/composables/use-meta';
    import { useRouter } from "vue-router";
    useMeta({ title: 'Contact Profile' });

    const router = useRouter();
    const grid_type = ref('list');
    const pwd_type = ref('password');
    const pwd_type2 = ref('password');

    const set_pwd_type = () => {
        if (pwd_type.value === 'password') {
            pwd_type.value = 'text';
        } else {
            pwd_type.value = 'password';
        }
    };

    const set_pwd_type2 = () => {
        if (pwd_type2.value === 'password') {
            pwd_type2.value = 'text';
        } else {
            pwd_type2.value = 'password';
        }
    };

</script>


<script>
    import Multiselect from '@vueform/multiselect'
    import { useRouter } from "vue-router";
    import { Modal } from 'bootstrap';

    export default {
        inheritAttrs: false,
        components: { Multiselect },
        data () {
            return {
                loading: false,
                router: useRouter(),
                value: null,
                options: [
                    {'value': 'administrator', 'name': 'Administrator'},
                    {'value': 'employee', 'name': 'Employee'},
                ],
                user:{
                    fname: '',
                    lname: '',
                    email: '',
                    contact_number: '',
                    password: '',
                    password_confirmation: '',
                    role: 'secondary_client',
                    company_id: this.router.currentRoute.value.params.id,
                    avatar: 0,
                    id: null,
                },
                product:{
                    csv: '',
                    zipped_images: '',
                    company_id: this.router.currentRoute.value.params.id,
                },
                is_submit_add_contact_form : false,
                params: ref({ id: null, name: '', email: '', phone: ''}),
                contacts_list: [],
                filterd_contacts_list: [],
                company: ref({}),
                search_user: ref(''),
                ids: ref([]),
                contactModal: ref(null),
            }
        },
        computed: {
            check_all_checkbox(){
                if (this.contacts_list.length && this.ids.length == this.contacts_list.length) {
                    return true;
                } else {
                    return false;
                }
            },
        },
        methods: {
            initPopup(){
                this.clearUserInputs();
                this.contactModal = new window.bootstrap.Modal(document.getElementById('contactModal'));
            },
            getCompany(){
                storeCompany
                    .dispatch("getCompany", this.router.currentRoute.value.params.id)
                    .then((res) => {
                        this.company = res.data;
                    })
                    .catch((err) => {
                    });
            },
            getContacts(){
                storeUser.dispatch("getContactsByID",this.router.currentRoute.value.params.id)
                    .then((res) => {
                            console.log("getContactsByID")  ;
                            console.log(res);
                            // console.log(res.data.length)
                            this.contacts_list = res.data;
                            this.search_contacts();
                        })
                    .catch((err) => {
                        console.log(err)
                    // loading.value = false;
                    // errorMsg.value = err.response.data.error;
                });
            },
            showMessage (msg = '', type = 'error') {
                const toast = window.Swal.mixin({ toast: true, position: 'top', showConfirmButton: false, timer: 3000 });
                toast.fire({ icon: type, title: msg, padding: '10px 20px' });
            },
            check_all(is_checked){
                if (is_checked) {
                    this.ids = this.contacts_list.map((d) => {
                        return d.id;
                    });
                } else {
                    this.clear_selection();
                }
            },
            clear_selection(){
                this.ids = [];
            },
            saveOrAddContact() {
                this.is_submit_add_contact_form = true;
                if (this.user.fname && this.user.lname && this.user.email && this.user.contact_number && this.user.password && this.user.password_confirmation) {
                        console.log("1st validated");
                    //form validated success
                    if (this.email_validate(this.user.email)) {
                        console.log("validated");
                        console.log(this.email_validate(this.user.email));
                        //email validated success
                        if(this.user.password != this.user.password_confirmation){
                            this.loading = false;
                            this.showMessage('Password Mismatched!','error')
                        }else{
                            //password validated success
                            this.loading = true;

                            if(this.params.id == null){
                                storeUser
                                .dispatch("storeCompanyUser", this.user)
                                .then((res) => {
                                // this.loading = false;
                                    console.log(res);
                                    this.loading = false;

                                    Swal.fire({
                                        title: 'Success',
                                        text: 'Contact created successfully',
                                        icon: 'success',
                                        timer: 3000
                                    }).then((result) => {
                                        this.getContacts();
                                        this.clearUserInputs();
                                        this.contactModal.hide();
                                    });

                                })
                                .catch((err) => {
                                    this.loading = false;
                                    this.user.email = '';
                                    this.showMessage(err.response.data.message,'error');
                                    // this.loading = false;
                                    // errorMsg.value = err.response.data.error;
                                });
                            }else{
                                storeUser
                                .dispatch("updateCompanyUser", this.user)
                                .then((res) => {
                                // this.loading = false;
                                    console.log(res);
                                    this.loading = false;

                                    Swal.fire({
                                        title: 'Success',
                                        text: 'Contact created successfully',
                                        icon: 'success',
                                        timer: 3000
                                    }).then((result) => {
                                        this.getContacts();
                                        this.clearUserInputs();
                                        this.contactModal.hide();
                                    });

                                })
                                .catch((err) => {
                                    this.loading = false;
                                    this.user.email = '';
                                    this.showMessage(err.response.data.message,'error');
                                    // this.loading = false;
                                    // errorMsg.value = err.response.data.error;
                                });
                            }

                        }

                    }else{
                        this.loading = false;
                        this.showMessage('Email format is Invalid.','error');
                    }

                }else{
                    console.log("1st error");
                    this.loading = false;
                    this.showMessage('Please fill required fields.','error');
                }

            },
            email_validate(email) {
                const regexp = /^[\w.%+-]+@[\w.-]+\.[\w]{2,6}$/;
                return regexp.test(email);
            },
            password_validate() {
                if(this.user.password == this.user.password_confirmation){
                    return true;
                }else{
                    return false;
                }
            },
            search_contacts(){
                this.filterd_contacts_list = this.contacts_list.filter((d) => d.name.toLowerCase().includes(this.search_user));
            },
            edit_user(user) {
                console.log("edit_user");
                console.log(user);
                this.params = { id: null, name: '', email: '', phone: ''};
                if (user) {
                    this.params = JSON.parse(JSON.stringify(user));
                    this.user = user;
                }
                this.contactModal.show();
            },
            bulkProductUpload(){

                this.loading = true;
                storeProducts
                .dispatch("bulkProductUpload", this.product)
                .then((res) => {

                    if(res.status == 200){
                        this.loading = false;

                        Swal.fire({
                            title: 'Great Success',
                            text: res.data,
                            icon: 'success',
                            timer: 3000
                        });

                    }else if(res.status == 400){
                        this.loading = false;

                        Swal.fire({
                            title: 'Ooops!',
                            text: res.data,
                            icon: 'error',
                        });

                    }else;

                    this.$refs.product_zipped_images.value = null;
                    this.$refs.product_csv.value = null;

                })
                .catch((err) => {
                    this.loading = false;

                    Swal.fire({
                        title: 'Ooops!',
                        text: err.response.data,
                        icon: 'error',
                    }).then((result) => {
                        $('#bulkProductUploadModal').modal('show');
                        $('#bulkProductUploadModal').show();

                    })

                // errorMsg.value = err.response.data.error;
                });
            },
            delete_user(user){
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
                            storeUser
                                .dispatch("destroyAdminUser",user.id)
                                .then((res) => {
                                    swalWithBootstrapButtons.fire('Deleted!', 'Admin User has been deleted.', 'success');
                                    this.getContacts();
                                })
                                .catch((err) => {

                                });
                        } else if (result.dismiss === window.Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire('Cancelled', 'Delete Process Cancelled', 'error');
                        }
                    });
            },
            clearUserInputs(){
                this.is_submit_add_contact_form = false;
                this.params = { id: null, name: '', email: '', phone: ''};
                $("#fname, #lname, #email, #contact_number, #password, #password_confirmation").removeClass('is-valid');
                $("#fname, #lname, #email, #contact_number, #password, #password_confirmation").removeClass('is-invalid');
                this.user = {
                    fname: '',
                    lname: '',
                    email: '',
                    contact_number: '',
                    password: '',
                    password_confirmation: '',
                    role: 'secondary_client',
                    company_id: this.router.currentRoute.value.params.id,
                    avatar: 0,
                    id: null,
                };
            },
            addContact(){
                this.clearUserInputs();
                this.contactModal.show();
            },
        },
        mounted(){
            this.getCompany();
            this.getContacts();
            this.initPopup();
            var element = document.getElementById("company-user-id");
            element.classList.add("active");
        },
        created: function(){

        }
    }
</script>
