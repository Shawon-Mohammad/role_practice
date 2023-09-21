 <!-- Modal -->
 <div class="modal fade" id="permissionCreate" tabindex="-1" aria-labelledby="permissionCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="permissionCreateLabel">Permission Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('permissions.store') }}">
                    @csrf
                    {{-- <form action="../../index.html" method="post"> --}}
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Title" id="title"
                            name="title">
                        @error('title')
                            <div class="alert alert-danger mt-1"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
