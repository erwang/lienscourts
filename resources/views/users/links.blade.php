<div class="col-md-12">
    @component('_utils.box',['title'=>'Mes liens'])
        <div class="col-md-12">
            @if($links->count()==0)
                Vous n'avez aucun lien enregistré
            @else
                <table class="table table-striped table-bordered datatable">
                    <thead>
                    <tr>
                        <th>URL</th>
                        <th>Lien court</th>
                        <th>Nombre de clics</th>
                        <th>Dernier clic</th>
                        <th>Date de création</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($links as $link)
                        <tr>
                            <td><a href="{{$link->url}}" target="_blank">{{$link->url}}</a></td>
                            <td><a href="{{$link->getCompleteShorturl()}}" target="_blank">{{$link->getCompleteShorturl()}}</a></td>
                            <td align="right">{{$link->count}}</td>
                            <td>{{ $link->updated_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $link->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                @include('_utils.buttonDelete',['item'=>$link])
                                @include('links.buttonqrcode',['link'=>$link])
                                @include('links.buttongraph',['link'=>$link])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    @endcomponent
</div>
@component('_utils.modal')
@endcomponent

@section('js')
    <script>
        $(function () {
            $('.datatable').DataTable({
                'paging': true,
                'lengthChange': false,
                'ordering': true,
                'info': true,
                'language': {
                    'url': 'datatable.french.json'
                },
                'order': [[3, 'desc']],
                'columns': [
                    null,
                    null,
                    null,
                    null,
                    null,
                    {'orderable': false}
                ]
            });
            // Fill modal with content from link href
            $("#myModal").on("show.bs.modal", function(e) {
                $(this).find(".modal-content").html('');
                var link = $(e.relatedTarget);
                $(this).find(".modal-content").load(link.attr("href"));
            });
        })
    </script>
@endsection
