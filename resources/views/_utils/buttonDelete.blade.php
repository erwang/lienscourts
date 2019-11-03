<form action="{{route(strtolower(class_basename(get_class($item))).'.destroy',['item'=>$item])}}" method="post" class="inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-xs" type="submit">
        <i class="fa fa-trash"></i>
    </button>
</form>

