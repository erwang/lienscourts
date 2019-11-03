<div class="alert alert-{{$type??'success'}} alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Erreur</h4>
    {{ $slot }}
</div>
