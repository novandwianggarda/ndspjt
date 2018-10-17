<template>
    <div>

        <frgroup>
            <label slot="label">
                Certificate(s)
            </label>
            <div>
                <select id="years-certificates" class="form-control" v-model="select_certificate_ids" :options="options">
                    <option value="0">➕ Add New Certificate</option>
                    <option v-for="option in options" :value="option.id" :key="option.id">
                        {{ option.no_hm_hgb }} - {{ option.nama_sertifikat }}
                    </option>
                </select>
            </div>
        </frgroup>

        <div v-show="select_certificate_ids.length !== 0">
            <dl class="dl-horizontal">
                <dt class="text-muted">No Hm / Hgb</dt>
                <dd v-html="certificate.no_hm_hgb"></dd>
                <dt class="text-muted">Nama Sertifikat</dt>
                <dd v-html="certificate.nama_sertifikat"></dd>
                <dt class="text-muted">Type</dt>
                <dd v-html="certificate.type"></dd>
                <dt class="text-muted">Kepemilikan</dt>
                <dd v-html="certificate.kepemilikan"></dd>
                <dt class="text-muted">Kecamatan</dt>
                <dd v-html="certificate.kecamatan"></dd>
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
            let select = $('#years-certificates');

            axios.get('/ajax/year/available?for=certificate').then(response => {
                this.options = response.data;
            });

            select.select2().change(() => {
                this.select_certificate_ids = select.val();
                if (this.select_certificate_ids.includes('0')) {
                    this.redirect();
                } else {
                    axios.get('/ajax/year/result?ids=' + select.val().toString())
                         .then(response => {
                            this.certificate = response.data;
                            vueEvent.$emit('YC-certificateSelected');
                    });
                }
            });
        },
    }
</script>
