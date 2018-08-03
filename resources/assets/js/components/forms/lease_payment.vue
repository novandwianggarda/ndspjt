<template>
    <div>
        <p><b>Payment Terms</b></p>
        <div class="row">
            <div class="col-md-2">
                <b>No</b>
            </div>
            <div class="col-md-2">
                <b>Total</b>
            </div>
            <div class="col-md-2">
                <b>Due Date</b>
            </div>
            <div class="col-md-2">
                <b>Paid Date</b>
            </div>
            <div class="col-md-2">
                <b>Action</b>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <input type="text" class="form-control">
            </div>
            <div class="col-md-2">
                <money class="form-control" value=""></money>
            </div>
            <div class="col-md-2">
                <indate name="123" value=""></indate>
            </div>
            <div class="col-md-2">
                <indate name="456" value=""></indate>
            </div>
            <div class="col-md-2">
                <button class="btn btn-sm btn-primary">Remove</button>
            </div>
        </div>
        <button class="btn btn-sm btn-primary">Add</button>
    </div>
</template>

<script>
    export default {

    }
</script>

<style scoped>

</style>
