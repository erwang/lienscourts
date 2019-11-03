<div class="box">
    @if(isset($title))
    <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    @endif
    <!-- /.box-header -->
    <div class="box-body">
        {{$slot}}
    </div>

    @if(isset($footer))
    <div class="box-footer">
        {{$footer}}
    </div>
    @endif
</div>
