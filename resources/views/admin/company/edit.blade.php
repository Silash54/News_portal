<x-app-layout>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Edit Company</h2>
                <a href="{{ route('company.index') }}" class="btn btn-primary m-auto">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('company.update',$company->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Company Name" required value="{{ $company->name }}">
                            @error('name')
                            <span>{{ $message }}</span>
                            @enderror
                            <div class="row mb-3 mt-3">
                                <label for="email" class="col-sm-2 col-form-label">Email <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Company email" required value="{{ $company->email }}">
                                        @error('email')
                            <span>{{ $message }}</span>
                            @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label for="facebook" class="col-sm-2 col-form-label">facebook </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="facebook" name="facebook"
                                        placeholder="Enter Company facebook" value="{{ $company->facebook }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-3 ">
                                <label for="phone" class="col-sm-2 col-form-label">Phone <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        placeholder="Enter Company phone" required value="{{ $company->phone }}">
                                        @error('phone')
                            <span>{{ $message }}</span>
                            @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label for="tel" class="col-sm-2 col-form-label">tel <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="tel" name="tel"
                                        placeholder="Enter Company tel" required value="{{ $company->tel }}">
                                        @error('tel')
                            <span>{{ $message }}</span>
                            @enderror
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label for="youtube" class="col-sm-2 col-form-label">youtube </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="youtube" name="youtube"
                                        placeholder="Enter Company youtube" value="{{ $company->youtube }}">
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label for="logo" class="col-sm-2 col-form-label">logo <span class="text-danger">*</span> </label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="logo" name="logo"
                                        placeholder="Enter Company logo" required >
                                        <img src="{{ asset($company->logo) }}" alt="$company->logo" >
                                        @error('logo')
                            <span>{{ $message }}</span>
                            @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
