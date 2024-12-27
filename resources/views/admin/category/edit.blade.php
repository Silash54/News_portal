<x-app-layout>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Category</h2>
                    <a href="{{ route('category.index') }}" class="btn btn-primary m-auto">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nepali_title">Nepali Title</label>
                                <input type="text" class="form-control" name="nepali_title" value="{{ $category->nepali_title }}">
                                @error('nepali_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="english_title">English Title</label>
                                <input type="text" class="form-control" name="english_title" value="{{ $category->english_title }}">
                                @error('english_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
