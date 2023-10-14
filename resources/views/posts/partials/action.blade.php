<td>
    @can('view_post')
        <a class="btn btn-dark" href="{{ route('posts.show', $post->id) }}">View</a>
    @endcan
    @can('edit_post')
        <button type="button" class="btn btn-primary"
            onclick="editPost('{{ $post->id }}','{{ $post->title }}')">
            Edit Modal
        </button>
        <a class="btn btn-success" href="{{ route('posts.edit', $post->id) }}">Edit</a>
    @endcan
    @can('delete_post')
        <a class="btn btn-danger"
            href="{{ route('posts.delete', $post->id) }}">Delete</a>
    @endcan

</td>
