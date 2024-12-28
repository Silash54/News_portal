<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Post</h2>
                <a href="{{ route('post.create') }}" class="btn btn-primary m-auto">Add</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.N</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Views</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($post as $index=>$data )
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td><img src="{{ asset($data->image) }}" alt="{{ $data->image }}" width="120" ></td>
                                        <td>{{ $data->views }}</td>
                                        <td>
                                            @if ($data->status== 'pending')
                                                <span class="badge badge-warning text-white">{{ $data->status }}</span>
                                            @elseif ($data->status === 'accepted')
                                            <span class="badge bg-info text-dark">{{ $data->status }}</span>
                                            @else
                                            <span class="badge badge-danger">{{ $data->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('post.edit', $data->id) }}" class="btn btn-info">Edit</a>
                                            <form action="{{ route('post.destroy', $data->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No record found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
