<template>
    <div class="col-sm-10">
        <select name="lease_type_id" class="form-control">
            <option v-for="option in options" :value="option.name" :key="option.id">{{ option.name }}</option>
        </select>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                options: [],
            };
        },
        mounted() {
            axios.get('/ajax/lease/lease_types')
            .then(response => {
                this.options = response.data;
            });
        },
    }
</script>
