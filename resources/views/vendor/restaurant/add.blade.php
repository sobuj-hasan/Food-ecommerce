@extends('vendor.layouts.app')
@section('title','Add Restaurant')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Add New Restaurant</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="">Vendor</a></li>
                        <li class="breadcrumb-item"><a href="">Add new restaurant</a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row mt-4">
            <div class="col-md-12 m-auto">
                <div class="card-box">
                    <h4 class="m-t-0 m-b-30 header-title">Add Restaurant</h4>
                    <form method="POST" action="{{ route('vendorrestaurant.store') }}" class="form-horizontal" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-3 col-form-label">Restaurant Name : </label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Restaurant Name" value="{{ old('res_name') }}" name="res_name">
                                @error('res_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-3 col-form-label">Trade License : </label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Trade License" value="{{ old('trade_license') }}" name="trade_license">
                                @error('trade_license')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-3 col-form-label">Country : </label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Country" value="{{ old('country') }}" name="country">
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-3 col-form-label">City : </label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="City" value="{{ old('city') }}" name="city">
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-3 col-form-label">Address : </label>
                            <div class="col-9">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Address" value="{{ old('address') }}" name="address">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-3 col-form-label">Restaurant Discount % : <span class="text-light">(if any)</span></label>
                            <div class="col-9">
                                <input type="number" class="form-control" id="inputPassword3" placeholder="discount %" value="{{ old('res_discount') }}" name="res_discount">
                                @error('res_discount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-3 col-form-label">Description : </label>
                            <div class="col-9">
                                <textarea class="form-control" rows="1" id="field-1" placeholder="Describe Your Restaurant/Business" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Restaurant Thumbnail Image</label>
                            <div class="col-9">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px; border: 1px solid #dadada;"></div>
                                    <div>
                                        <button type="button" class="btn btn-secondary btn-file mt-2">
                                            <span class="fileupload-new p-3"><i class="fa fa-paper-clip"></i> Select image</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                            <input type="file" class="btn-secondary" value="{{ old('res_image') }}" name="res_image"/>
                                            @error('res_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-0 row">
                            <div class="offset-3 col-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light"> Submit Now </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
