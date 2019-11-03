<form method="POST" action="{{ route('link.add') }}">
    <div class="col-md-12">
        @component('_utils.box',['title'=>'Créer un nouveau lien'])
            @csrf
            <div class="col-md-11">
                @include('_utils.input',['name'=>'url','label'=>'Adresse à raccourcir','placeholder'=>'http://wwww.libreoffice.org','value'=>$link->url??''])
            </div>
            <div class="col-md-1" id="testUrl">

            </div>
            <div class="col-md-6">
                @include('_utils.input',['name'=>'shorturl','label'=>'Lien court (peut être vide)','placeholder'=>'','value'=>$link->shorturl??''])
            </div>
            @slot('footer')
                <button type="submit" class="btn btn-primary pull-right">Envoyer</button>
            @endslot
        @endcomponent
    </div>
</form>


@section('js')
    @parent
    <script>
        $(function () {
            $('[name=url]:first').change(function () {
                var $input = $(this).val();
                if($input.substr(0,7)!=='http://' || $input.substr(0,8)!=='https://'){
                    $(this).val('http://'+$input);
                }
            })
        });
    </script>
@append
