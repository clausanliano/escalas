@if ($errors->any())
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong>
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        </div>
    </div>
@endif
