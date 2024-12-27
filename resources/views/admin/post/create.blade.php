<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Create New Post</h2>
                <a href="{{ route('post.index') }}" class="btn btn-primary m-auto">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ old('title') }}" name="title"
                                placeholder="Create post" required>
                            @error('name')
                                <span>{{ $message }}</span>
                            @enderror
                            <label for="categories">Select Categories</label>
                            <select class="form-control select2" name="categories[]" id="categories" multiple>
                                @foreach ($categories as $data)
                                    <option value="{{ $data->id }}">{{ $data->nepali_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="image">Image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image" required
                                value="{{ old('image') }}">
                            @error('image')
                                <span>{{ $message }}</span>
                            @enderror
                            <label for="meta_title">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" required
                                value="{{ old('meta_title') }}" placeholder="Enter Meta title">
                            @error('image')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="description">Meta Descriptions </label>
                            <textarea name="meta_description" class="form-control">
                                {{ old('meta_description') ?? $post->meta_description }}
                        </textarea>
                        @error('meta_description')
                        <span>{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description">Descriptions <span class="text-danger ">*</span></label>
                            <textarea name="description" class="form-control summernote">
                                {{ old('description') ?? $post->description }}
                            </textarea>
                            @error('description')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
