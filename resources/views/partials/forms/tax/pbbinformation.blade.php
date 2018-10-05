<accordion name="collapse-taxiki">

    <div slot="title" class="ll-head">
        PBB INFORMATION
    </div>

    <frgroup>
        <label slot="label">
            PBB Info
        </label>
        {!! Form::select('tax_id', $taxs,null, ['class'=>'form-control']) !!}
    </frgroup>

</accordion>