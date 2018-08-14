<accordion name="collapse-information">
    <div slot="title" class="ll-head">
        FUHRER INFORMATION
    </div>

    <frgroup>
        <label slot="label">
            Folder Sert. Kini
        </label>
        <input type="text" name="folder_current" value="{{old ('folder_current')}}" class="form-control"/>
    </frgroup>

    <frgroup>
        <label slot="label">
            No. di Folder
        </label>
        <input type="text" name="folder_number" value="{{old ('folder_number')}}" class="form-control" />
    </frgroup>

    <frgroup>
        <label slot="label">
            Rencana Folder Sert.
        </label>
        <input type="text" name="folder_plan" value="{{old ('folder_number')}}" class="form-control"/>
    </frgroup>

    <frgroup>
        <label slot="label">
            Original Cert. Bearer
        </label>
        <input type="text" name="" value="" class="form-control"/>
    </frgroup>

    <frgroup>
        <label slot="label">
            Nominal AJB
        </label>
        <input type="text" name="ajb_nominal" value="{{old ('ajb_nominal')}}" class="form-control"/>
    </frgroup>

    <frgroup>
        <label slot="label">
            Tgl. AJB
        </label>
        <indate name="ajb_date" value="{{old ('ajb_nominal')}}" class="datepicker"></indate>
    </frgroup>

    <frgroup>
        <label slot="label">
            Keterangan
        </label>
        <textarea name="note" value="" class="form-control" cols="30" rows="5"></textarea>
    </frgroup>

</accordion>