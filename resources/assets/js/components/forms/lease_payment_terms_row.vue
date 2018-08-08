<template>
    <div class="row">
        <div class="col-md-1 col-sm-1 col-xs-6">
            <b>{{ this.id + 1 }}</b>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <money class="form-control" :id="`row_total_${this.id}`" v-model="total"></money>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <indate :id="`row_due_date_${this.id}`" bind-to="due_date"></indate>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <input type="text" :id="`row_note_${this.id}`" class="form-control" v-model="note">
        </div>
        <div class="col-md-2 col-sm-2 col-xs-6">
            <button class="btn btn-sm btn-danger" @click.prevent="emitDelete"><i class="fa fa-trash"></i></button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                due_date: '',
                total: 0,
                note: '',
                id: this.$vnode.key,
            }
        },
        methods: {
            emitDelete() {
                watcher.$emit('PT-deleteRow', this.id);
            }
        },
    }
</script>

<style scoped>
    .row {
        margin: 10px 0px;
    }
</style>
