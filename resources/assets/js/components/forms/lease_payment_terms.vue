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

        <div class="row" v-for="(row, i) in shared.paymentTerms" v-bind:key="i">
            <div class="col-md-1 col-sm-1 col-xs-6">
                <b>{{ i + 1 }}</b>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <money class="form-control" :id="`row_total_${i}`" v-model="row.total"></money>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <indate :id="`row_due_date_${i}`" :bind-to="`shared.paymentTerms[${i}].due_date`"></indate>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <input type="text" :id="`row_note_${i}`" class="form-control" v-model="row.note">
            </div>
            <div class="col-md-2 col-sm-2 col-xs-6">
                <button class="btn btn-sm btn-danger" @click.prevent="deleteRow(i)"><i class="fa fa-trash"></i></button>
            </div>
        </div>

        <button class="btn btn-sm btn-primary ll-bgcolor ll-white" @click.prevent="addRow"><i class="fa fa-plus"></i>Add</button>

    </div>
</template>

<script>

    export default {
        data() {
            return {
                shared: vueShared,
            }
        },
        methods: {
            addRow() {
                this.shared.paymentTerms.push({total: 0, due_date: '', note:''});
            },
            deleteRow(key) {
                let newRows = [];
                this.shared.paymentTerms.forEach((row, index) => {
                    if (index !== key) {
                        newRows.push(row);
                    }
                });
                this.shared.paymentTerms = newRows;
            }
        },
    }
</script>

<style scoped>
    .row {
        margin: 10px 0px;
    }
</style>
