<template>
    <div>

        <frgroup>
            <label slot="label">
                Certificate(s)
            </label>
            <div>
                <select id="taxes-certificates" class="form-control" v-model="select_certificate_ids" :options="options">
                    <option value="0">➕ Add New Certificate</option>
                    <option v-for="option in options" :value="option.id" :key="option.id">
                        {{ option.no_hm_hgb }} - {{ option.nama_sertifikat }}
                    </option>
                </select>
            </div>
        </frgroup>

        <div v-show="select_certificate_ids.length !== 0">
            <dl class="dl-horizontal">
                <dt class="text-muted">Number</dt>
                <dd v-html="certificate.no_hm_hgb"></dd>
                <dt class="text-muted">Name</dt>
                <dd v-html="certificate.nama_sertifikat"></dd>
                <dt class="text-muted">Type</dt>
                <dd v-html="certificate.type"></dd>
                <dt class="text-muted">Kepemilikan</dt>
                <dd v-html="certificate.kepemilikan"></dd>
                <dt class="text-muted">Alamat</dt>
                <dd v-html="certificate.addrees"></dd>
                
            </dl>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                options: [],
                select_certificate_ids: [],
                certificate: [],
                x: '',
            };
        },
        methods: {
            redirect() {
                window.location = '/certificates/add';
            }
        },
        mounted() {
            let select = $('#taxes-certificates');

            axios.get('/ajax/taxes/available?for=certificate').then(response => {
                this.options = response.data;
            });

            select.select2().change(() => {
                this.select_certificate_ids = select.val();
                if (this.select_certificate_ids.includes('0')) {
                    this.redirect();
                } else {
                    axios.get('/ajax/taxes/result?ids=' + select.val().toString())
                         .then(response => {
                            this.certificate = response.data;
                            vueEvent.$emit('TC-certificateSelected');
                    });
                }
            });
        },
    }
</script>
