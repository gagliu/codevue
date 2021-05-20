<template>
    <section class="container h-100" v-if="isLoading">
        <div class="row align-items-center h-100">
            <div class="col-2 col-lg-2 col-xl-2 mx-auto">
                <div class="lds-ripple">
                    <div></div>
                    <div></div>
                </div>
                <div>Cargando...</div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
           name: 'loader',
           data() {
               return {
                   isLoading: false
               }
           },
      	created() {
               axios.interceptors.request.use((config) => {
                   this.isLoading = true;
                   this.emitHideTable()
                   return config;
               }, (error) => {
                   this.isLoading = false;
                   this.emitShowTable()
                   return Promise.reject(error);
               });
               axios.interceptors.response.use((response) => {
                   this.isLoading = false;
                   this.emitShowTable()
                   return response;
               }, (error) => {
                   this.isLoading = false;
                   this.emitShowTable()
                   return Promise.reject(error);
               });
           },
           methods: {
               emitHideTable() {
                   this.$bus.$emit('emitToParentShowHideTable', false)
               },
               emitShowTable() {
                   this.$bus.$emit('emitToParentShowTable', true)
               }
           }
    };
</script>