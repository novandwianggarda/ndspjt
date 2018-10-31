<template>
    <div>

        <frgroup>
            <label slot="label">
                Property(es)
            </label>
            <div>
                <select id="lease-properties" class="form-control" multiple="multiple" v-model="select_property_id" :options="options">
                    <option value="0">➕ Add New Property</option>
                    <option v-for="option in options" :value="option.id" :key="option.id">
                        {{ option.type }} - {{ option.name }}
                    </option>
                </select>
            </div>
        </frgroup>

        <div v-show="select_property_id.length !== 0">
            <dl class="dl-horizontal">
                <dt class="text-muted">Type</dt>
                <dd v-html="property.type"></dd>
                <dt class="text-muted">Name</dt>
                <dd v-html="property.name"></dd>
                <dt class="text-muted">Address</dt>
                <dd v-html="property.address"></dd>
                <dt class="text-muted">Land Area</dt>
                <dd v-html="property.land_area"></dd>
                <dt class="text-muted">Building Area</dt>
                <dd v-html="property.building_area"></dd>

                <dt class="text-muted">Block/Tower</dt>
                <dd v-html="property.block"></dd>
                <dt class="text-muted">Unit</dt>
                <dd v-html="property.unit"></dd>
                <dt class="text-muted">Floor</dt>
                <dd v-html="property.floor"></dd>
                <dt class="text-muted">Electricity</dt>
                <dd v-html="property.electricity"></dd>
                <dt class="text-muted">Water</dt>
                <dd v-html="property.water"></dd>
                <dt class="text-muted">Telephone</dt>
                <dd v-html="property.telephone"></dd>
            </dl>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                options: [],
                select_property_id: [],
                property: [],
            };
        },
        methods: {
            redirect() {
                window.location = '/properties/add';
            }
        },
        mounted() {
            let select = $('#lease-properties');

            axios.get('/ajax/property/available').then(response => {
                this.options = response.data;
            });

            select.select2().change(() => {
                this.select_property_id = select.val();
                if (this.select_property_id.includes('0')) {
                    this.redirect();
                } else {
                    axios.get('/ajax/property/result?ids=' + select.val().toString())
                         .then(response => {
                            this.property = response.data;
                            vueEvent.$emit('LP-propertiesselected');
                    });
                }
            });
        },
    }
</script>
