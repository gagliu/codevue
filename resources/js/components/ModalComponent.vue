<template>
    <!-- Modal-Template -->
    <div class="modal-mask">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <slot name="header"></slot>
                    <button type="button" class="close text-primary" @click="$emit('close')">
                    <i class="icon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <slot name="body"></slot>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
      	name: 'modal'
    };
</script>