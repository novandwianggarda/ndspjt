<accordion name="collapse-information">
    <div slot="title" class="ll-head">
        FURTHER INFORMATION
    </div>
    
    <frgroup>
        <label slot="label">
                Folder Sert. Kini
        </label>
        <input type="text" name="folder_sert" value="{{ old('folder_sert') }}" class="form-control" placeholder="Isikan Folder Sertifikat kini" />
    </frgroup>

    <frgroup>
        <label slot="label">
                No di Folder
        </label>
        <input type="text" name="no_folder" value="{{ old('no_folder') }}" class="form-control" placeholder="No di Folder" />
    </frgroup>
    <frgroup>
        <label slot="label">
                Purposes
        </label>
        <input type="text" name="purposes" value="{{ old('purposes') }}" class="form-control" placeholder="Input purposes" />
    </frgroup>
    <frgroup>
        <label slot="label">
            Archive
        </label>
        <input type="text" name="archive" value="{{ old('archive') }}" class="form-control" placeholder="Archive" />
    </frgroup>

    <frgroup>
            <label slot="label">
                Publish Date
            </label>
            <indate name="published_date" value="{{old('published_date') }}"></indate>
        </frgroup>
        <frgroup>
            <label slot="label">
                Expired Date HGB
            </label>
            <indate name="expired_date" value="{{old('expired_date') }}"></indate>
        </frgroup>


    

</accordion>
