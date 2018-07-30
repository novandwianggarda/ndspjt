<template>
    <select name="lease_type_id" class="form-control">
        <option v-for="option in options" :value="option.id" :key="option.id">{{ option.name }}</option>
    </select>
</template>

<script>
    export default {
        data() {
            return {
                options: [],
            };
        },
        mounted() {
            axios.get('/ajax/lease/lease_types').then(response => {
                this.options = response.data;
            });
        },
    }
</script>
