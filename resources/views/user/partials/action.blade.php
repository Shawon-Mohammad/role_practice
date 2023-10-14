<td>
    @can('edit_user')
        <a class="btn btn-success" href="{{ route('user.edit', $user->id) }}">Edit</a>
        <button type="button" class="btn btn-tool btn-primary bg-primary"
            onclick="editUser('{{ $user->id }}','{{ $user->name }}','{{ $user->email }}')">
            Edit Modal
        </button>
    @endcan
    @can('delete_user')
        <a class="btn btn-danger"
            href="{{ route('user.delete', $user->id) }}">Delete</a>
    @endcan
</td>
