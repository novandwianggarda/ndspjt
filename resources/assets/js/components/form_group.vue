<template>
    <span>
        <label :class="`col-md-${wl} col-sm-${wl} control-label pd-1`">
            <slot name="label"></slot>
        </label>
        <div :class="`col-md-${wi} col-sm-${wi} pd-1`">
            <slot></slot>
        </div>
        <div v-if="fixMe" class="clearfix"></div>
    </span>
</template>

<script>
    export default {
        props: {
            wl: { default: 2 },
            wi: { default: 10},
        },
        computed: {
            fixMe () {
                return this.wl + this.wi === 12
            }
        }
    }
</script>
<style scoped>
    .pd-1 {
        padding-top: 10px;
        padding-bottom: 5px;
    }
</style>
