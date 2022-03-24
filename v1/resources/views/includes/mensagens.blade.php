@if (Session::has('mensagem'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-{{Session::get('tipo')}} mt-3 alert-dismissible fade show" role="alert">
                <strong>{{Session::get('mensagem')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif
