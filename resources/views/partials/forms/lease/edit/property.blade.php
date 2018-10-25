<accordion name="collapse-property">

    <div slot="title" class="ll-head">
        PROPERTY
    </div>

    <lease-properties></lease-properties>
    <input type="hidden" name="property_ids" v-model:value="propertyIds">

    <!-- PRICE -->
    @include('partials.forms.lease.property_price')

</accordion>
