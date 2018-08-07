<template>
    <div style="margin:10px;">
        <div class="row">
            <div class="col-md-3">
                <b>No</b>
            </div>
            <div class="col-md-3">
                <b>Total</b>
            </div>
            <div class="col-md-3">
                <b>Due Date</b>
            </div>
            <div class="col-md-3">
                <b>Action</b>
            </div>
        </div>

        <lease-payment-terms-row v-for="(rw, i) in rows" v-bind:key="i"></lease-payment-terms-row>

        <button class="btn btn-sm btn-primary" @click.prevent="addRow">Add</button>
    </div>
</template>

<script>

    import LeasePaymentTermsRow from "./lease_payment_terms_row";

    export default {
        components: {
            'lease-payment-terms-row': LeasePaymentTermsRow,
        },
        props: ['rows'],
        methods: {
            addRow() {
                this.rows.push({no: 1, total: 90000, note:'lorem'});
                console.log(this.rows);
            }
        },
        created() {
            var vm = this;
            watcher.$on('PT-deleteRow', (key) => {
                // pass
            });
        }
    }
</script>

<style scoped>
    button {
        margin-top: 17px;
    }
</style>
