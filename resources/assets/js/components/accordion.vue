<template>
    <div>
        <div :class="'box-header' + border">
            <a data-toggle="collapse" :data-parent="'#' + parent" :href="'#' + name">
                <h4 class="box-title w-100">
                    <slot name="title"></slot>
                </h4>
            </a>
        </div>
        <div :id="name" :class="'panel-collapse collapse' + collapse">
            <div class="box-body left-border">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            parent: { default: 'accordion-list' },
            name: { required:true },
            border: {default: ''},
            collapse: {default: ''},
        }
    }
</script>

<style scoped>
    .w-100 {
        display: block !important;
    }
</style>
