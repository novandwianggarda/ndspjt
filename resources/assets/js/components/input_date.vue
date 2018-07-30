<template>
    <div>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input class="form-control pull-right datepicker" type="text" :name="name" :value="value">
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            name: { required: true},
            value: { required: true},
        },
    }
</script>
