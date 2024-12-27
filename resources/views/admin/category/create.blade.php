
    <x-app-layout>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Create New Category</h2>
                    <a href="{{ route('category.index') }}" class="btn btn-primary m-auto">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nepali_title">Nepali Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('nepali_title') }}" name="nepali_title" placeholder="Enter Nepali Title" required>
                                @error('nepali_title')
                                <span>{{ $message }}</span>
                                @enderror
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-md-6">
                                    <label for="english_title">English Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ old('english_title') }}" name="english_title" placeholder="Enter english Title" required>
                                    @error('english_title')
                                    <span>{{ $message }}</span>
                                    @enderror
                                    
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </x-app-layout>