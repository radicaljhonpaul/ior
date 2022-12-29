<template>
    <div v-if="this.loading == true" id="overlay">
        <div id="text">
            Please wait for a while...
        </div>
        <div class="overlay__inner">
            <div class="overlay__content"><span class="spinner"></span></div>
        </div>
    </div>

    <div class="layout-px-spacing">
        <teleport to="#breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><span>Accounts</span></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Add Account</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </teleport>

        <div class="row layout-top-spacing">
            <div class="container-fluid px-4">
                <div class="row mt-3">
                    <p class="fs-4 fw-bold"> Add Account </p>
                </div>
                <form class="text-start" @submit="this.addCompany" autocomplete="off">
                    <div class="row mt-2">
                        <div class="col">
                            <div class="mb-4">
                                <p class="fs-6 fw-bold"> Sales Company </p>
                            </div>

                            <div class="d-flex flex-column">

                                <!-- row 1 -->
                                <div class="d-flex justify-content-between">
                                    <div class="form-group flex-fill">
                                        <label for="" class="fs-7"> Legal Company Name <code>*</code> </label>
                                        <input v-model="company.legal_company_name" type="text" class="form-control" placeholder="Legal Company Name" aria-label="Legal Company Name" aria-describedby="Legal Company Name" :class="[this.is_submit_add_company_form ? (company.legal_company_name ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Legal Company Name</div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="form-group flex-fill">
                                        <label for="" class="fs-7"> Brand Name <code>*</code> </label>
                                        <input v-model="company.brand_name" type="text" class="form-control" placeholder="Brand Name" aria-label="Brand Name" aria-describedby="Brand Name" :class="[this.is_submit_add_company_form ? (company.brand_name ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Brand Name</div>
                                    </div>
                                </div>

                                <!-- row 2 -->
                                <div class="d-flex justify-content-between">
                                    <div class="form-group flex-fill">
                                        <label for="" class="fs-7"> Legal Company Address <code>*</code> </label>
                                        <input v-model="company.legal_company_address" type="text" class="form-control" placeholder="Legal Company Address" aria-label="Legal Company Address" aria-describedby="Legal Company Address" :class="[this.is_submit_add_company_form ? (company.legal_company_address ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Legal Company Address</div>
                                    </div>
                                </div>

                                <!-- row 3 -->
                                <div class="d-flex gap-2">
                                    <div class="form-group" style="width: 50%">
                                        <label for="" class="fs-7"> City <code>*</code> </label>
                                        <input v-model="company.city" type="text" class="form-control" placeholder="City" aria-label="City" aria-describedby="City" :class="[this.is_submit_add_company_form ? (company.city ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the City</div>
                                    </div>

                                    <div class="form-group" style="width:   50%">
                                        <label for="" class="fs-7"> Country <code>*</code> </label>
                                        <Multiselect
                                        v-model="company.country"
                                        placeholder="Select a Country"
                                        label="name"
                                        trackBy="name"
                                        :options="options"
                                        :searchable="true"
                                        :class="[this.is_submit_add_company_form ? (company.country ? 'is-valid' : 'is-invalid') : '']"
                                        >
                                        </Multiselect>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Country</div>

                                    </div>
                                </div>

                                <!-- row 4 -->
                                <div class="d-flex gap-2">
                                    <div class="form-group" style="width: 50%">
                                        <label for="" class="fs-7"> Zipcode <code>*</code> </label>
                                        <input v-model="company.zip" type="text" class="form-control" placeholder="Zipcode" aria-label="Zipcode" aria-describedby="Zipcode" :class="[this.is_submit_add_company_form ? (company.zip ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Zipcode</div>
                                    </div>

                                    <div class="form-group" style="width: 50%">
                                        <label for="" class="fs-7"> Business License No. <code>*</code> </label>
                                        <input v-model="company.business_license" type="text" class="form-control" placeholder="Business License No." aria-label="Business License No." aria-describedby="Business License No." :class="[this.is_submit_add_company_form ? (company.business_license ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Business License No.</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="mb-4">
                                <p class="fs-6 fw-bold"> Primary Contact Person </p>
                            </div>

                            <div class="d-flex flex-column">
                                <!-- row 1 -->
                                <div class="d-flex justify-content-between gap-2">
                                    <div class="form-group" style="width: 50%">
                                        <label for="" class="fs-7"> Firstname <code>*</code> </label>
                                        <input v-model="user.fname" name="fname" type="text" class="form-control" placeholder="Firstname" aria-label="Firstname" aria-describedby="Firstname" :class="[this.is_submit_add_company_form ? (user.fname ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the First Name</div>
                                    </div>

                                    <div class="form-group" style="width: 50%">
                                        <label for="" class="fs-7"> Lastname <code>*</code> </label>
                                        <input v-model="user.lname" name="lname" type="text" class="form-control" placeholder="Lastname" aria-label="Lastname" aria-describedby="Lastname" :class="[this.is_submit_add_company_form ? (user.lname ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Last Name</div>
                                    </div>
                                </div>

                                <!-- row 2 -->
                                <div class="d-flex justify-content-between gap-2">
                                    <div class="form-group" style="width: 50%">
                                        <label for="" class="fs-7"> Email <code>*</code> </label>
                                        <input autocomplete="off" v-model="user.email" name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="Email" :class="[is_submit_add_company_form ? (user.email && this.email_validate(user.email) ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Email</div>
                                    </div>

                                    <div class="form-group" style="width: 50%">
                                        <label for="" class="fs-7"> Contact Number <code>*</code> </label>
                                        <input v-model="user.contact_number" name="phone" type="text" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="Phone" :class="[this.is_submit_add_company_form ? (user.contact_number ? 'is-valid' : 'is-invalid') : '']"/>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Please fill the Contact Number</div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between gap-2">
                                    <div class="form-group flex-fill">
                                        <label for="" class="fs-7"> Password <code>*</code> </label>
                                        <div class="input-group">
                                            <input :type="pwd_type" v-model="user.password"  name="password"  class="form-control" placeholder="Password" aria-label="Password" aria-describedby="Password" :class="[this.is_submit_add_company_form ? (user.password ? 'is-valid' : 'is-invalid') : '']"/>
                                            <span class="input-group-text" @click="this.set_pwd_type()" role="button" id="basic-addon1">
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
                                            <input :type="pwd_type2" v-model="user.password_confirmation"  name="password_confirmation"  class="form-control" placeholder="Password Confirmation" aria-label="Password" aria-describedby="Password" :class="[this.is_submit_add_company_form ? (user.password_confirmation && this.password_validate() ? 'is-valid' : 'is-invalid') : '']"/>
                                            <span class="input-group-text" @click="this.set_pwd_type2()" role="button" id="basic-addon1">
                                                <i class="far fa-eye"></i>
                                            </span>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please fill the Password Confirmation</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary rounded-pill mb-2"> Submit &nbsp; <i class="far fa-address-book"></i> </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import highlight from '@/components/plugins/highlight.vue';
    import store from "../../../store/index";
    import storeCompany from "../../../store/admin/company";
    import storeUser from "../../../store/admin/user";
    import { useRouter } from "vue-router";
    import { useMeta } from '@/composables/use-meta';

    useMeta({ title: 'Add User' });

    const router = useRouter();

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
                    is_primary_contact: 1,
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
                is_submit_add_company_form : ref(false),
            }
        },
        mounted() {
            var element = document.getElementById("company-user-id");
            element.classList.add("active");
        },
        methods: {
            showMessage (msg = '', type = 'error') {
                const toast = window.Swal.mixin({ toast: true, position: 'top', showConfirmButton: false, timer: 3000 });
                toast.fire({ icon: type, title: msg, padding: '10px 20px' });
            },
            addCompany(ev) {
                ev.preventDefault();

                this.is_submit_add_company_form = true;

                if (this.company.legal_company_name && this.company.brand_name && this.company.legal_company_address && this.company.city && this.company.country && this.company.zip && this.company.business_license && this.user.fname && this.user.lname && this.user.email && this.user.contact_number && this.user.password && this.user.password_confirmation) {
                    //form validated success
                    if (this.email_validate(this.user.email)) {
                        //email validated success
                        if(this.user.password != this.user.password_confirmation){
                            this.loading = false;
                            this.showMessage('Password Mismatched!','error')
                        }else{
                            //password validated success

                            this.loading = true;
                            storeCompany
                            .dispatch("storeCompany", this.company)
                            .then((res) => {
                                this.user.company_id = res.id;
                                console.log(this.user);
                                this.addUser(this.user);
                            })
                            .catch((err) => {
                            // this.loading = false;
                            // errorMsg.value = err.response.data.error;
                            });
                        }
                    }else{
                        this.loading = false;
                        this.showMessage('Email format is Invalid.','error')
                    }

                }else{
                    this.loading = false;
                    this.showMessage('Please fill required fields.','error')
                }
            },
            addUser(user) {
                // ev.preventDefault();
                storeUser
                    .dispatch("storeCompanyUser", user)
                    .then((res) => {
                    // this.loading = false;
                        console.log(res);
                        this.loading = false;

                        Swal.fire({
                            title: 'Success',
                            text: 'Account created successfully',
                            icon: 'success',
                            timer: 3000
                        }).then((result) => {
                            window.location.href = 'accounts';
                        });

                    })
                    .catch((err) => {
                        console.log(err);
                    // this.loading = false;
                    // errorMsg.value = err.response.data.error;
                    });
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

