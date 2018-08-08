<template>
    <div style="margin-bottom:15px;">
        <div class="box-header">
            <a data-toggle="collapse" :data-parent="`#${parent}`" :href="`#${name}`">
                <h4 class="box-title w-100">
                    <slot name="title"></slot>
                </h4>
            </a>
        </div>
        <div :id="name" :class="`panel-collapse collapse ${collapse}`">
            <div :class="`box-body bottom-border ${border}`">
                <div class="row">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            parent: { default: 'accordion-list' },
            name: { required: true },
            collapse: { default: '' },
            sub: { default: 'false' }, // default is main accordion
        },
        computed: {
            border() {
                return this.sub === 'true' ? 'left-border-thin' : 'left-border';
            }
        }
    }
</script>

<style scoped>
    .w-100 {
        display: block !important;
    }

    .box-header {
        padding: 0px !important;
        margin: 20px 15px 0px 15px;
    }

    .panel-collapse {
        padding: 0px !important;
        margin: 0px 10px 0px 15px;
    }
</style>
