<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Edit Advertise</h2>
                <a href="{{ route('advertise.index') }}" class="btn btn-primary m-auto">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('advertise.update', $advertise->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="company_name">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="company_name"
                                value="{{ old('company_name', $advertise->company_name) }}" 
                                placeholder="Enter company name">
                            @error('company_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="row mb-3 mt-3">
                                <label for="redirect_url" class="col-sm-2 col-form-label">Redirect URL <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="redirect_url" name="redirect_url"
                                        placeholder="Enter redirect URL"
                                        value="{{ old('redirect_url', $advertise->redirect_url) }}">
                                    @error('redirect_url')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row mb-3">
                                <label for="contact" class="col-sm-2 col-form-label">Contact <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" id="contact" name="contact"
                                        placeholder="Enter advertise contact"
                                        value="{{ old('contact', $advertise->phone) }}">
                                    @error('contact')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="expire_date" class="col-sm-2 col-form-label">Expire Date <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="expire_date" name="expire_date"
                                        value="{{ old('expire_date', $advertise->expire_date) }}">
                                    @error('expire_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="banner" class="col-sm-2 col-form-label">Banner <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="banner" name="banner">
                                    @if($advertise->banner)
                                        <img src="{{ asset($advertise->banner) }}" alt="Banner" style="max-width: 100px; margin-top: 10px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
