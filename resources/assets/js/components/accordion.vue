<template>
    <div style="margin-bottom:15px">
        <div class="box-header">
            <a data-toggle="collapse" @click="toggle" :data-parent="`#${parent}`" :href="`#${name}`">
                <div class="ll-bgcolor">
                    <h4 class="box-title">
                        <slot name="title"></slot>
                    </h4>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool">
                            <i class="fa fa-angle-left header-icon" :class="{ rotate: show, icon2: sub,}"></i>
                        </button>
                    </div>
                </div>
            </a>
        </div>
        <div :id="name" class="panel-collapse collapse" :class="collapse">
            <div class="box-body bottom-border" :class="border">
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
            sub: { default: false }, // default is main accordion
            collapse: { default: '' },
        },
        data() {
            return {
                show: false,
                border : 'left-border-thin',
            }
        },
        computed: {

        },
        methods: {
            toggle() {
                this.show = !this.show;
            },
        },
        created() {
            this.show = this.collapse === 'in';
            this.border = this.sub ? 'left-border-thin' : 'left-border';
        },
    }
</script>

<style scoped>
    .box-header {
        padding: 0px !important;
        margin: 20px 15px 0px 15px;
    }

    .panel-collapse {
        padding: 0px !important;
        margin: 0px 10px 0px 15px;
    }

    .btn-box-tool {
        color: white;
        margin-right: 10px;
    }

    .header-icon {
        font-size: 2em;
        transform: rotate(0deg);
        transition-duration: 0.5s;
    }

    .header-icon.rotate {
        transform: rotate(-90deg);
        transition-duration: 0.5s;
    }

    .icon2 {
        font-size: 1.5em !important;
    }
</style>
