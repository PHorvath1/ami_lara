<td>
    @if($view) <a class="btn btn-primary" href="{{ route("$route.show", [$item]) }}">View</a> @endif
    @if($edit) <a class="btn btn-warning" href="{{ route("$route.edit", [$item]) }}">Edit</a> @endif
    @if($delete)
            <x-button.magic :route='route("$route.destroy", [$item])' method="delete" confirm="Are you sure? This can not be undone!" class="btn btn-danger">
                Delete
            </x-button.magic>
    @endif
</td>
