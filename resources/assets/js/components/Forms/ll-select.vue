<template>
    <div class="col-sm-10">
        <select name="property_type" class="form-control">
            <option v-for="opt in options" :value="opt.name" :key="opt.id">{{ opt.name }}</option>
        </select>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                options = [],
            };
        }
    }
</script>
