<accordion name="collapse-taxinfo">

    <div slot="title" class="ll-head">
        LAND INFORMATION
    </div>

    <frgroup>
        <label slot="label">
            Nomor Sertifikat
        </label>
        {!! Form::select('certificate_id', $certificates,null, ['class'=>'form-control']) !!}
    </frgroup>
    
    <!--  <frgroup>
        <label slot="label">
            Luas Sertifikat
        </label>
        <input type="text" name="luas_sertifikat" value="{{ old('luas_sertifikat') }}" class="form-control" />
    </frgroup>
    




    <frgroup>
        <label slot="label">
            NJOP T/m2
        </label>
        <input type="number" name="njopland" value="{{ old('njopland') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            NJOP B/m2
        </label>
        <input type="number" name="njop_building" value="{{ old('njop_building') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Due Date
        </label>
        <indate name="due_date" value="{{ old('due_date') }}"></indate>
    </frgroup>

    <frgroup>
        <label slot="label">
            Payment PBB 
        </label>
        <indate name="due_date_ly" value="{{ old('due_date_ly') }}"></indate>
    </frgroup>



    <frgroup>
        <label slot="label">
            PBB Year
        </label>
        <select id="year" class="form-control" name="year">
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
        </select>
    </frgroup> -->

    


</accordion>