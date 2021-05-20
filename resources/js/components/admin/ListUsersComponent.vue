<template>
    <section class="container-fluid result-page">
        <div class="row">
            <div class="col-12">
                <!-- Loading... -->
                <mr-loader v-bind:isLoading="isLoading"></mr-loader>
                
                <!-- Users List -->
                <div class="card mt-3">
                    <div class="card-header">
                        <span class="h4 text-gray"
                            ><i class="icon-people"></i> Users List</span
                            >
                        <div class="card-header-actions float-right">
                            <button
                                type="button"
                                class="card-header-action btn btn-block btn-secondary px-5"
                                @click="showModalAddUser = true"
                                >
                            <i class="fas fa-user-plus"></i> Create user
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0 border-0">
                        <table class="table table-hover table-striped table-sm mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Fist Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Companies</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="text-center"
                                    v-for="user in users"
                                    v-bind:key="user.id"
                                    >
                                    <td>{{ user.first_name }}</td>
                                    <td>{{ user.last_name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.phone }}</td>
                                    <td class="text-capitalize">{{ user.companies }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal create users -->
        <mr-modal v-if="showModalAddUser" @close="showModalAddUser = false">
            <h3 class="modal-title" slot="header">
                <i class="fas fa-user-circle text-primary"></i> Create user
            </h3>
            <div slot="body" class="p-0">
                <form
                    id="addUser"
                    @submit.prevent="validateAddUser"
                    accept-charset="UTF-8"
                    >
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="First Name"
                            v-model="addUser.first_name"
                            data-vv-as="name"
                            />
                    </div>
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Last Name"
                            v-model="addUser.last_name"
                            data-vv-as="last_name"
                            />
                    </div>
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Phone"
                            v-model="addUser.phone"
                            data-vv-as="phone"
                            />
                    </div>
                    <div class="form-group">
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="Email"
                            v-model="addUser.email"
                            data-vv-as="email"
                            />
                    </div>
                    <div class="form-group">
                        <hr />
                    </div>
                    <div
                        v-if="mesaggeError != ''"
                        class="alert alert-danger"
                        role="alert"
                        >
                        {{ mesaggeError }}
                    </div>
                    <div class="form-group">
                        <button
                            :disabled="isDisabled"
                            class="btn btn-primary btn-block"
                            type="submit"
                            >
                        <i class="fas fa-save"></i> Create user
                        </button>
                    </div>
                </form>
            </div>
        </mr-modal>
    </section>
</template>
<script>
    import MrModal from './../ModalComponent.vue'
    import MrLoader from '../LoaderComponent.vue'
    
    export default {
      component: { MrModal, MrLoader },
      data() {
        return {
          users: [],
          showModalAddUser: false,
          isLoading: false,
          addUser: {
            first_name: '',
            last_name: '',
            phone: '',
            email: '',
          },
          editUser: {
            first_name: '',
            last_name: '',
            phone: '',
            email: '',
          },
          isDisabled: false,
          mesaggeError: ''
        }
      },
      created() {
        this.isLoading = true
        this.showPagination = false
        this.getUsers()
      },
      methods: {
        validateAddUser(e) {
            this.isDisabled = true
    
            const config = {
              method: 'POST',
              body: JSON.stringify(this.addUser),
              headers: {
                'Content-Type': 'application/json'
              }
            }
    
            fetch('../api/v1/people', config)
              .then(response => response.json())
              .then(result => {
    
                if (result.error) {
                  this.errorMessage(result.error)
                  this.isDisabled = false
                  return
                }
    
                document.getElementById('addUser').reset()
                this.showModalAddUser = false
                this.getUsers()
                this.successMessage(result.message)
    
                this.isDisabled = false
    
              }).catch(error => {
                  this.errorMessage('The user could not be created. Please try latter')
              });
        },
        successMessage(message) {
          this.$toast.open({
            message: message,
            position: 'top',
            type: 'success',
            duration: 2500,
            dismissible: true
          })
        },
        errorMessage(message) {
          this.$toast.open({
            message: message,
            position: 'top',
            type: 'error',
            duration: 2500,
            dismissible: true
          })
        },
        getUsers() {
          this.isLoading = true
          fetch('../api/v1/people').then(response => {
            response.json().then(data => {
              this.users = data.data
              this.isLoading = false
            })
          })
        }
      }
    }
</script>
<style lang="scss" scoped>
    .form-row .form-control {
    border-radius: 0.25rem;
    }
    .card {
    .card-body {
    border: 0 transparent !important;
    }
    }
</style>