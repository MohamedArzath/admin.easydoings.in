@extends('layouts.header&footer')

@php
    use Illuminate\Support\Str;
@endphp

@section('meta-data')
<title>My Categories EasyDoings</title>
@endsection

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="fs-2 fw-semibold">My Categories</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="#" data-coreui-i18n="Dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><span data-coreui-i18n="Categories">Categories</span></li>
                </ol>
            </nav>
        <div>
        <div class="col-12">
            @if(session('success'))
                <div class="bg-success bg-opacity-10 border border-2 border-success rounded mb-4">
                    <div class="row d-flex align-items-center p-3 px-xl-4 flex-xl-nowrap">
                        <div class="col-md col-12 px-lg-4">
                            <p class="text-success"><strong>Success!</strong></p>
                            <p class="text-success">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-danger bg-opacity-10 border border-2 border-danger rounded mb-4">
                    <div class="row d-flex align-items-center p-3 px-xl-4 flex-xl-nowrap">
                        <div class="col-md col-12 px-lg-4">
                            <p class="text-danger"><strong>Error Occured!</strong></p>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            
            <div class="card mb-4">
                <div class="card-header"><strong>Add Category</strong></div>
                <div class="card-body">
                    <form action="/add-category" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="catName">Category Name:</label>
                                        <input class="form-control" id="catName" value="{{ old('category_name') }}" name="category_name" type="text" placeholder="Category Name" required maxlength="50" minlength="3">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="catLink">Category Link:</label>
                                        <input class="form-control" id="catLink" value="{{ old('category_slug') }}" name="category_slug" type="text" placeholder="Category Link" required readonly maxlength="50" minlength="3">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label" for="catDescription">Category Description:</label>
                                    <textarea class="form-control" id="catDescription" rows="3" name="category_descp" maxlength="500" minlength="150" required></textarea>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header"> <strong>All Categories</strong><a class="badge bg-danger-gradient ms-2 text-decoration-none" href="https://easydoings.in/" target="_blank">Site Live Categories</a></div>
                    <div class="card-body"> 
                        <table class="table table-striped border datatable">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Category name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sno = 1; @endphp
                                @foreach($categories as $category)
                                    <tr class="align-middle">
                                        <td>{{ $sno++ }}</td>
                                        <td><a href="https://easydoings.in/{{ $category->slug }}" target="_blank">{{ $category->name }}</a></td>
                                        <td>{{ Str::limit($category->description, 80, '...') }}</td>
                                        <td><span class="badge bg-success-gradient">Active</span></td>
                                        <td>{{ $category->created_at }}</td>
                                        
                                        
                                        <td>
                                            <a class="btn btn-info me-2" href="/categories?edit={{ $category->id }}">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pen"></use>
                                                </svg>
                                            </a>
                                            <a class="btn btn-danger" href="/categories?delete={{ $category->id }}">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
<script>
    $(document).ready(function(){
        $('#catName').on('keyup', function(){
            let slug = $(this).val()
                .trim()                     // Remove leading/trailing spaces
                .toLowerCase()              // Convert to lowercase
                .replace(/\s+/g, '-')       // Replace spaces with hyphens
                .replace(/[^a-z0-9-]/g, ''); // Remove special characters

            $('#catLink').val(slug);
        });
    });
</script>
@endsection
