<template>
    <div class="col-sm-10">
        <select name="certificate_type_id" class="form-control">
            <option v-for="option in options" :value="option.id" :key="option.id">{{ option.short_name }} - {{ option.long_name }}</option>
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
        created() {
            console.log('sdfsdf');
        },
        mounted() {
            console.log('mawkw');
            axios.get('/ajax/certificate/certificate_types').then(response => {
                this.options = response.data;
            });
        },
    }
</script>
