<template>
    <div class="layout-px-spacing">
        <teleport to="#breadcrumb">
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page"><span>Employees</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </teleport>

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="row mt-3">
                    <p class="fs-4 fw-bold"> Employees </p>
                </div>
                <div class="panel br-6 p-0">
                    <div class="custom-table">
                        <v-client-table :data="this.items" :columns="this.columns" :options="this.table_option" @row-click="this.onRowClick">
                            <template #beforeFilter>
                                <router-link to="/admin/add-employee" class="btn me-2 btn-primary"
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
                                    Add Employee
                                </router-link>


                            </template>
                            <template #actions="props">
                                <div class="actions text-center">
                                    <!-- <router-link :to="{ name: 'admin-user', params: { id: props.row.id }}">
                                        <i class="far fa-eye"></i>
                                    </router-link>
                                    &nbsp; -->
                                    <a @click.stop href="javascript:;" class="cancel" @click="showEditRow(props.row)">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    &nbsp;
                                    <a @click.stop href="javascript:;" class="cancel" @click="deleteRow(props.row)">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </template>
                        </v-client-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Employee Modal -->
    <div id="updateAdminUserModal" class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content mailbox-popup">
                <div class="modal-header">
                    <h5 class="modal-title">Update Employee</h5>
                    <button type="button" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            <form id="updateAdminUserModalTitle">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-4">
                                            <p class="fs-6 fw-bold"> Account Information </p>
                                        </div>

                                        <div class="d-flex flex-column" style="width: 100%">
                                            <!-- row 1 -->
                                            <div class="d-flex justify-content-between gap-2">
                                                <div class="form-group" style="width: 100%">
                                                    <label for="" class="fs-7"> Firstname <code>*</code> </label>
                                                    <input v-model="user.fname" name="fname" type="text" class="form-control" placeholder="Firstname" aria-label="Firstname" aria-describedby="Firstname" :class="[this.is_submit_update_admin_user_form ? (user.fname ? 'is-valid' : 'is-invalid') : '']"/>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please fill the First Name</div>
                                                </div>

                                                <div class="form-group" style="width: 100%">
                                                    <label for="" class="fs-7"> Lastname <code>*</code> </label>
                                                    <input v-model="user.lname" name="lname" type="text" class="form-control" placeholder="Lastname" aria-label="Lastname" aria-describedby="Lastname" :class="[this.is_submit_update_admin_user_form ? (user.lname ? 'is-valid' : 'is-invalid') : '']"/>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please fill the Last Name</div>
                                                </div>
                                            </div>

                                            <!-- row 2 -->
                                            <div class="d-flex justify-content-between gap-2">
                                                <div class="form-group" style="width: 100%">
                                                    <label for="" class="fs-7"> Email <code>*</code> </label>
                                                    <input autocomplete="off" v-model="user.email" name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="Email" :class="[is_submit_update_admin_user_form ? (user.email && this.email_validate(user.email) ? 'is-valid' : 'is-invalid') : '']"/>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please fill the Email</div>
                                                </div>

                                                <div class="form-group" style="width: 100%">
                                                    <label for="" class="fs-7"> Contact Number <code>*</code> </label>
                                                    <input v-model="user.contact_number" name="phone" type="text" class="form-control" placeholder="Phone" aria-label="Phone" aria-describedby="Phone" :class="[this.is_submit_update_admin_user_form ? (user.contact_number ? 'is-valid' : 'is-invalid') : '']"/>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please fill the Contact Number</div>
                                                </div>
                                            </div>

                                            <!-- Roles -->
                                            <div class="d-flex justify-content-between gap-2">

                                                <div class="d-flex flex-column" style="width: 100%">
                                                    <div class="d-flex justify-content-between gap-2">
                                                        <div class="form-group" style="width: 100%">
                                                            <label for="" class="fs-7"> Roles </label>
                                                            <Multiselect
                                                            v-cloak
                                                            v-model="user.role"
                                                            placeholder="Select your character"
                                                            label="name"
                                                            trackBy="name"
                                                            :options="options"
                                                            >
                                                            </Multiselect>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-between gap-2">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Roles -->
                                        </div>

                                    </div>


                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" data-bs-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary" @click="this.updateAdminUser()">Update</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import '@/assets/sass/font-icons/fontawesome/css/regular.css';
    import '@/assets/sass/font-icons/fontawesome/css/fontawesome.css';
    import { useMeta } from '@/composables/use-meta';
    import storeCompany from "../../../store/admin/company";
    import storeUser from "../../../store/admin/user";
    import Multiselect from '@vueform/multiselect'
    import { useRouter } from "vue-router";
    useMeta({ title: 'Admin Users' });
</script>
<script>
    export default {
    components: { Multiselect },
    data () {
        return {
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
                role: '',
            },
            updateAdminUserModal : ref(null),
            table_option : ref({
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
            }),
            items : ref([]),
            columns : ref(['full_name', 'email', 'contact_number', 'actions']),
            is_submit_update_admin_user_form : ref(false),
            router : useRouter()
        }
    },
    mounted() {
            this.initPopup();
            this.bind_data();
            var element = document.getElementById("company-user-id");
            element.classList.remove("active");
        },
    methods: {
        bind_data(){
        storeUser.dispatch("getAdminUsers")
        .then((res) => {
                this.items = res.data;

        })
        .catch((err) => {

                });
        },
        addCompany(ev) {
            ev.preventDefault();
            storeCompany
                .dispatch("storeCompany", this.company)
                .then((res) => {
                    this.user.company_id = res.id;
                    console.log(this.user);
                    this.addUser(this.user);
                })
                .catch((err) => {

                });
        },
        addUser(user) {
            storeUser
                .dispatch("storeUser", user)
                .then((res) => {
                    console.log(res);
                    window.location.href = 'companies'
                })
                .catch((err) => {
                    console.log(err);

                });
        },
        showEditRow(item){
            this.updateAdminUserModal.show()
            storeUser
                .dispatch("getAdminUser", item.id)
                .then((res) => {
                    this.user = res.data;
                    this.user.role = res.data.roles[0].name
                    console.log(res.data);
                })
                .catch((err) => {

                });
        },
        updateAdminUser(){
            this.is_submit_update_admin_user_form = true;
            if (this.user.fname && this.user.lname && this.user.email && this.user.contact_number && this.user.role) {
                    //form validated success
                    if (this.email_validate(this.user.email)) {
                        //form validated success
                        storeUser
                            .dispatch("updateAdminUser", this.user)
                            .then((res) => {
                                console.log("res status",res.status);
                                // if(res.status == 201 || res.status == '201'){
                                    const toast = window.Swal.mixin({
                                        toast: true,
                                        position: 'top-center',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        padding: '2em',
                                    });
                                    toast.fire({
                                        icon: 'success',
                                        title: "Employee is now successfully updated!",
                                        padding: '2em',
                                    });

                                    this.updateAdminUserModal.hide()
                                    this.bind_data()

                                // }
                            })
                            .catch((err) => {

                            });
                    }else{
                        this.showMessage('Email format is Invalid.','error')
                    }

                }else{
                    this.showMessage('Please fill required fields.','error')
                }

        },
        initPopup(){
            this.updateAdminUserModal = new window.bootstrap.Modal(document.getElementById('updateAdminUserModal'));
        },
        deleteRow(item){
            const swalWithBootstrapButtons = window.Swal.mixin({
                confirmButtonClass: 'btn btn-secondary',
                cancelButtonClass: 'btn btn-dark me-3',
                buttonsStyling: false,
            });
            swalWithBootstrapButtons
                .fire({
                    title: 'Are you sure?',
                    text: "This will delete this employee.",
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
                            .dispatch("destroyAdminUser",item.id)
                            .then((res) => {
                                swalWithBootstrapButtons.fire('Deleted!', 'Employee has been deleted.', 'success');
                                this.bind_data()
                            })
                            .catch((err) => {

                            });
                    } else if (result.dismiss === window.Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire('Cancelled', 'Delete Process Cancelled', 'error');
                    }
                });
        },
        showMessage (msg = '', type = 'error') {
            const toast = window.Swal.mixin({ toast: true, position: 'top', showConfirmButton: false, timer: 3000 });
            toast.fire({ icon: type, title: msg, padding: '10px 20px' });
        },
        email_validate(email) {
            const regexp = /^[\w.%+-]+@[\w.-]+\.[\w]{2,6}$/;
            return regexp.test(email);
        },
        onRowClick(event){
            // window.location.href = `/edit/hello-${event.row.id}`
            this.router.push({
                name: "employee",
                params: { id: event.row.id }
            });
        }
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
    .VueTables__row > td:hover{
        color:blue
    }
</style>
