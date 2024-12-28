<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Company</h2>
                <a href="{{ route('company.create') }}" class="btn btn-primary m-auto">Add</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.N</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Tel</th>
                                    <th scope="col">Youtube</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($company as $index=>$data )
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->tel }}</td>
                                        <td>{{ $data->youtube }}</td>
                                        <td><img src="{{ asset($data->logo) }}" alt="{{ $data->logo }}" width="120" ></td>
                                        <td>
                                            <a href="{{ route('company.edit', $data->id) }}" class="btn btn-info">Edit</a>
                                            <form action="{{ route('company.destroy', $data->id) }}" method="POST" style="display: inline;">
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
