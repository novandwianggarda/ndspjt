<template>
    <div class="row">
        <div class="col-md-3">
            <input type="text" class="form-control">
        </div>
        <div class="col-md-3">
            <money class="form-control" name="total" :value="total"></money>
        </div>
        <div class="col-md-3">
            <indate name="due_date" :value="due_date"></indate>
        </div>
        <div class="col-md-3">
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
        }
    },
    methods: {
        emitDelete() {
            watcher.$emit('PT-deleteRow', this.$vnode.key);
        }
    }
}
</script>

<style scoped>
    .row {
        margin: 10px 0px;
    }
</style>
