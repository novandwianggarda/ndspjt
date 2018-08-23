<template>
    <select :name="name" class="form-control">
        <option v-for="option in options" :value="option.id" :key="option.id">{{ option.name }}</option>
    </select>
</template>

<script>
    export default {
        props: {
            name: { required: true },
        },
        data() {
            return {
                options: [],
            };
        },
        mounted() {
            axios.get('/ajax/property/property_types').then(response => {
                this.options = response.data;
            });
        },
    }
</script>
