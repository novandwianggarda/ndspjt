<template>
    <div>

        <frgroup>
            <label slot="label">
                NOP
            </label>
            <div>
                <select id="years-tax" class="form-control" v-model="select_tax_ids" :options="options">
                    
                    <option v-for="option in options" :value="option.id" :key="option.id">
                        {{ option.nop }} - {{ option.pen_pbb }}
                    </option>
                </select>
            </div>
        </frgroup>

        <div v-show="select_tax_ids.length !== 0">
            <dl class="dl-horizontal">
                <dt class="text-muted">Letak Objek Pajak</dt>
                <dd v-html="tax.letak_objek_pajak"></dd>
                <dt class="text-muted">Luas Sertifikat</dt>
                <dd v-html="tax.luas_sertifikat"></dd>
                <dt class="text-muted">NJOP Tanah</dt>
                <dd v-html="tax.njop_land"></dd>
                <dt class="text-muted">NJOP Bangunan</dt>
                <dd v-html="tax.njop_building"></dd>
            </dl>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                options: [],
                select_tax_ids: [],
                tax: [],
                x: '',
            };
        },


        mounted() {
            let select = $('#years-tax');

            axios.get('/ajax/year/availabletax?for=tax').then(response => {
                this.options = response.data;
            });

            select.select2().change(() => {
                this.select_tax_ids = select.val();
                if (this.select_tax_ids.includes('0')) {
                    this.redirect();
                } else {
                    axios.get('/ajax/year/resulttax?id=' + select.val().toString())
                         .then(response => {
                            this.tax = response.data;
                            vueEvent.$emit('YT-taxSelected');
                    });
                }
            });
        },
    }
</script>
