<accordion name="collapse-taxinfo">

    <div slot="title" class="ll-head">
        BASIC INFORMATION TAX
    </div>

    <frgroup>
        <label slot="label">
            NO HM / HGB
        </label>
        {!! Form::select('certificate_id', $certificates,null, ['class'=>'form-control']) !!}
    </frgroup>


    <frgroup>
        <label slot="label">
            Folder PBB Kini
        </label>
        <input type="text" name="folder_pbb" value="{{ old('folder_pbb') }}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Purpose
        </label>
        <input type="text" name="purposes" value="{{ old('purposes') }}" class="form-control" />
    </frgroup>

     <frgroup>
        <label slot="label">
            Luas Sertifikat
        </label>
        <input type="text" name="luas_sertifikat" value="{{ old('luas_sertifikat') }}" class="form-control" />
    </frgroup>
    <frgroup>
        <label slot="label">
            Rencana Group Folder PBB
        </label>
        <input type="text" name="rencana_group" value="{{ old('rencana_group') }}" class="form-control" />
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
    </frgroup>

    


</accordion>