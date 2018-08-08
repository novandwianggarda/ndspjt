<template>
    <div style="margin:20px;">

        <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-6">
                <b>No</b>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <b>Total</b>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <b>Due Date</b>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <b>Note</b>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6">
                <b>Action</b>
            </div>
        </div>

        <lease-payment-terms-row v-for="(rw, i) in rows" v-bind:key="i"></lease-payment-terms-row>

        <button class="btn btn-sm btn-primary ll-bgcolor ll-white" @click.prevent="addRow"><i class="fa fa-plus"></i>Add</button>

    </div>
</template>

<script>

    import LeasePaymentTermsRow from "./lease_payment_terms_row";

    export default {
        components: {
            'lease-payment-terms-row': LeasePaymentTermsRow,
        },
        data() {
            return {
                rows: [],
            }
        },
        methods: {
            addRow() {
                this.rows.push({total: 0, due_date: '', note:''});
            }
        },
        created() {
            const vm = this;
            watcher.$on('PT-deleteRow', (key) => {
                console.log(key);
                let newRows = [];
                this.rows.forEach((row, index) => {
                    if (index !== key) {
                        console.log(index);
                        newRows.push(row);
                    }
                });
                this.rows = newRows;
            });
        },
        watch: {
            rows() {
                console.log('row changed');
            }
        }
    }
</script>

<style scoped>
    button {
        margin-top: 17px;
    }

    .row {
        margin: 10px 0px;
    }
</style>
