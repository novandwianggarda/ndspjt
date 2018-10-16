<template>
    <div>

        <frgroup>
            <label slot="label">
                NOP
            </label>
            <div>
                <select id="years-tax" class="form-control" v-model="select_tax_id" :options="options">
                    <option value="0">➕ Add New Tax</option>
                    <option v-for="option in options" :value="option.id" :key="option.id">
                        {{ option.nop }} - {{ option.pen_pbb }}
                    </option>
                </select>
            </div>
        </frgroup>

        <div v-show="tax.length !== 0">
            <dl class="dl-horizontal">
                <dt class="text-muted">NOP</dt>
                <dd v-html="tax.nop"></dd>
                <dt class="text-muted">Penanggung PBB</dt>
                <dd v-html="tax.pen_pbb"></dd>
                <dt class="text-muted">Letak Objek Pajak</dt>
                <dd v-html="tax.letak_objek_pajak"></dd>
            </dl>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                options: [],
                select_tax_id: [],
                tax: [],
                x: '',
            };
        },
        methods: {
            redirect() {
                window.location = '/taxes/add';
            }
        },
        mounted() {
            let select = $('#years-tax');

            axios.get('/ajax/year/availabletax?for=tax').then(response => {
                this.options = response.data;
            });

            select.select2().change(() => {
                this.select_tax_id = select.val();
                if (this.select_tax_id.includes('0')) {
                    this.redirect();
                } else {
                    axios.get('/ajax/year/resulttax?id=' + select.val().toString())
                         .then(response => {
                            this.tax = response.data;
                            vueEvent.$emit('LC-taxSelected');
                    });
                }
            });
        },
    }
</script>
