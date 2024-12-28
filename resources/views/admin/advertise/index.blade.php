<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Advertise</h2>
                <a href="{{ route('advertise.create') }}" class="btn btn-primary m-auto">Add</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.N</th>
                                    <th scope="col"> Advertise Company name</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Expire Date</th>
                                    <th scope="col">Redirect Url</th>
                                    <th scope="col">Banner</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($advertise as $index=>$data )
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $data->company_name }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td> {{ date('Y-M-D', strtotime($data->expire_date)) }}</td>
                                        <td>{{ $data->redirect_url }}</td>
                                        <td><img src="{{ asset($data->banner) }}" alt="$data->logo" width="120" ></td>
                                        <td>
                                            <a href="{{ route('advertise.edit', $data->id) }}" class="btn btn-info">Edit</a>
                                            <form action="{{ route('advertise.destroy', $data->id) }}" method="POST" style="display: inline;">
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
