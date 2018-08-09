<template>
    <div>

        <frgroup>
            <label slot="label">
                Certificate(s)
            </label>
            <div>
                <select id="lease-certificates" class="form-control" multiple="multiple" v-model="select_certificate_ids" :options="options">
                    <option value="0">➕ Add New Certificate</option>
                    <option v-for="option in options" :value="option.id" :key="option.id">
                        {{ option.number }} - {{ option.name }}
                    </option>
                </select>
            </div>
        </frgroup>

        <div v-show="select_certificate_ids.length !== 0">
            <dl class="dl-horizontal">
                <dt class="text-muted">Number</dt>
                <dd v-html="certificate.number"></dd>
                <dt class="text-muted">Name</dt>
                <dd v-html="certificate.name"></dd>
                <dt class="text-muted">Type</dt>
                <dd v-html="certificate.type"></dd>
                <dt class="text-muted">Owner</dt>
                <dd v-html="certificate.owner"></dd>
                <dt class="text-muted">City</dt>
                <dd v-html="certificate.city"></dd>
                <dt class="text-muted">Village</dt>
                <dd v-html="certificate.village"></dd>
                <dt class="text-muted">Area</dt>
                <dd v-html="certificate.area"></dd>
                <dt class="text-muted">Total Area</dt>
                <dd v-html="certificate.total_area"></dd>
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
            let select = $('#lease-certificates');

            axios.get('/ajax/certificate/available?for=lease').then(response => {
                this.options = response.data;
            });

            select.select2().change(() => {
                this.select_certificate_ids = select.val();
                if (this.select_certificate_ids.includes('0')) {
                    this.redirect();
                } else {
                    axios.get('/ajax/certificate/result?ids=' + select.val().toString())
                         .then(response => {
                            this.certificate = response.data;
                            vueWatcher.$emit('LC-certificateSelected');
                    });
                }
            });
        },
    }
</script>
