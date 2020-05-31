
@if (session('wpis_dodany'))
    <div class="alert alert-success">
        {{ session('wpis_dodany') }}
    </div>
@endif
@if (session('category_edit'))
    <div class="alert alert-success">
        {{ session('category_edit') }}
    </div>
@endif
@if (session('category_delete'))
    <div class="alert alert-danger">
        {{ session('category_delete') }}
    </div>
@endif
