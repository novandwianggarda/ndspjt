<template>
    <div style="display:inline">
        <label :class="'col-md-' + wl + ' control-label pd-1'">
            <slot name="label"></slot>
        </label>
        <div :class="'col-md-' + wi + ' pd-1'">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            wl: { default: 2 },
            wi: { default: 10},
        },
    }
</script>
<style scoped>
    .pd-1 {
        padding-bottom: 15px;
    }
</style>
