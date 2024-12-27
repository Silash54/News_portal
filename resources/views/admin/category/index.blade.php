
    <x-app-layout>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Category</h2>
                    <a href="{{ route('category.create') }}" class="btn btn-primary m-auto">Add</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">S.N</th>
                                        <th scope="col">Nepali Title</th>
                                        <th scope="col">English Title</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($category as $data )
                                        <tr>
                                            <td>{{ $data->position }}</td>
                                            <td>{{ $data->nepali_title }}</td>
                                            <td>{{ $data->english_title }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $data->id) }}" class="btn btn-info">Edit</a>
                                                <form action="{{ route('category.destroy', $data->id) }}" method="POST" style="display: inline;">
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