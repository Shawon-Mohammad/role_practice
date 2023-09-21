 <!-- Modal -->
 <div class="modal fade" id="roleCreate" tabindex="-1" aria-labelledby="roleCreateLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="roleCreateLabel">Role Create</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="post" action="{{ route('roles.store') }}">
                     @csrf
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
                     </div>
                 </form>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
