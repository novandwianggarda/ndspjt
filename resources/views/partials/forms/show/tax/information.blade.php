<accordion name="collapse-taxinformation" collapse="in">

    <div slot="title" class="ll-head">
        LAND INFORMATION
    </div>

    <frgroup>
        <label slot="label">
            Nama Sertifikat
        </label>
        <div>@foreach ($tax->certax as $b)
                {{ $b->nama_sertifikat }} ,&nbsp;
             @endforeach
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Jenis
        </label>
        <div>
        	@foreach ($tax->certax as $b)
            	{{ $b->type->short_name }}( {{$b->type->long_name}} ) ,&nbsp;
            @endforeach
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Kepemilikan
        </label>
        <div>
        	@foreach ($tax->certax as $b)
            	{{ $b->kepemilikan}} ,&nbsp;
            @endforeach
        </div>
    </frgroup>

    <frgroup>
        <label slot="label">
            Alamat
        </label>
        <div>
        	@foreach ($tax->certax as $b)
            	{{ $b->addrees}} ,&nbsp;
            @endforeach
        </div>
    </frgroup>

   

</accordion>

