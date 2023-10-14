<td>
    @can('edit_permission')
        <a class="btn btn-success" href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
        <button type="button" class="btn btn-tool btn-primary bg-primary"
            onclick="editPermission('{{ $permission->id }}','{{ $permission->title }}')">
            Edit Modal
        </button>
    @endcan
    @can('delete_permission')
        <a class="btn btn-danger" href="{{ route('permissions.delete', $permission->id) }}">Delete</a>
    @endcan
</td>
