<template>
    <div class="row">
        <div class="col-md-6 mx-auto text-center">
            <div class="alert alert-dismissible fade show" :class="theme" role="alert">
                {{ alert.message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" @click="handleAlert"></button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        alert: Object,
    },

    data(){
        return {
            theme: (this.alert.success) ? 'alert-success' : 'alert-danger',
            
        }
    },

    methods: {
        handleAlert() {
            //reset alert value
            this.$emit('handleAlertMode', null);
        }
    }

}
</script>

<style>

</style>