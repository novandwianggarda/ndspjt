<!-- <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <i class="fa fa-money"></i>&nbsp; PBB Jatuh Tempo
        </h3>
        <div class="box-tools pull-right">
             <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
            
            <button type="button" class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <ul class="products-list product-list-in-box">
            <li class="item">
                <div class="product-img">
                    <img src="{{ asset('img/superadmin.png') }}" alt="Product Image">
                </div>
                <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Samsung TV
                        <span class="label label-warning pull-right">$1800</span>
                    </a>
                    <span class="product-description">
                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                    </span>
                </div>
            </li>
            <li class="item">
                <div class="product-img">
                    <img src="{{ asset('img/superadmin.png') }}" alt="Product Image">
                </div>
                <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Bicycle
                        <span class="label label-info pull-right">$700</span>
                    </a>
                    <span class="product-description">
                        26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                    </span>
                </div>
            </li>
            
        </ul>
    </div>
    <div class="box-footer text-center">
        <a href="javascript:void(0)" class="uppercase">View All</a>
    </div>
</div> -->

<div class="box box-primary">
    <div class="box-header with-border">
        <h2 class="box-title"><i class="fa fa-money"></i>&nbsp; PBB Jatuh Tempo</h2>
    </div>
    <br>
    <!-- /.box-header -->
    @foreach ($taxes as $tax)
    <div class="box-body">
        <ul class="timeline">
            <li>
                <i class="fa fa-clock-o ll-acolor"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header no-border">
                        <a href="/taxes/show/{{ $tax->id }}">{{ $tax->pen_pbb }}</a>
                    </h3>
                    <span>Wajib Pajak &nbsp;&nbsp;: {{ $tax->wajib_pajak }}</span> <br>
                    <span>Due &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$tax->duedates}}</span>
                </div>
            </li>
        </ul>
    </div>
    @endforeach
    <!-- /.box-body -->
    <div class="box-footer text-center">
        <a href="" class="uppercase">View All</a>
    </div>
    <!-- /.box-footer -->
</div>