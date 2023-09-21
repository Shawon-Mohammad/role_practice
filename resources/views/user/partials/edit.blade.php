 <!-- Modal -->
 <div class="modal fade" id="userEdit" tabindex="-1" aria-labelledby="userEditLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="userEditLabel">User Edit</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                <form method="post" id="form_user_edit">
                    @csrf
                    @method('put')
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Name" id="name"
                            name="name" value="{{ $user->name }}">
                        @error('name')
                            <div class="alert alert-danger mt-1"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Email" id="email"
                            name="email" value="{{ $user->email }}">
                        @error('email')
                            <div class="alert alert-danger mt-1"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter Password" id="password"
                            name="password" value="{{ $user->password }}">
                        @error('password')
                            <div class="alert alert-danger mt-1"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
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
