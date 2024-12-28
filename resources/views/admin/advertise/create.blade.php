<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Create New Advertise</h2>
                <a href="{{ route('advertise.index') }}" class="btn btn-primary m-auto">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('advertise.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="company_name">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{ old('company_name') }}" name="company_name" placeholder="Enter company Name" required>
                            @error('company_name')
                            <span>{{ $message }}</span>
                            @enderror
                            <div class="row mb-3 mt-3">
                                <label for="redirect_url" class="col-sm-2 col-form-label">Redirect url <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="redirect_url" name="redirect_url"
                                        placeholder="Enter Redirect url" required value="{{ old('redirect_url') }}">
                                        @error('redirect_url')
                            <span>{{ $message }}</span>
                            @enderror
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-3 ">
                                <label for="contact" class="col-sm-2 col-form-label">Contact <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" id="contact" name="contact"
                                        placeholder="Enter advertise contact" required value="{{ old('contact') }}">
                                        @error('contact')
                            <span>{{ $message }}</span>
                            @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label for="expire_date" class="col-sm-2 col-form-label">Expire Date <span class="text-danger">*</span> </label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="expire_date" name="expire_date"
                                        placeholder="Enter advertise expire_date" value="{{ old('expire_date') }}">
                                        @error('expire_date')
                                        <span>{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label for="banner" class="col-sm-2 col-form-label">Banner <span class="text-danger">*</span> </label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="banner" name="banner"
                                        placeholder="Enter advertise banner" required value="{{ old('banner') }}">
                                        @error('banner')
                            <span>{{ $message }}</span>
                            @enderror
                                </div>
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
