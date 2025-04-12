@extends('layouts.header&footer')

@php
    use Illuminate\Support\Str;
@endphp

@section('meta-data')
<title>My Articles EasyDoings</title>
@endsection

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="fs-2 fw-semibold">My Articles</div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="#" data-coreui-i18n="Dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><span data-coreui-i18n="Categories">All Articles</span></li>
                </ol>
            </nav>
        <div>

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header"> <strong>All Articles</strong><a class="badge bg-danger-gradient ms-2 text-decoration-none" href="https://easydoings.in/" target="_blank">Site Live Articles</a></div>
                    <div class="card-body"> 
                        <table class="table table-striped border datatable">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sno = 1; @endphp
                                @foreach($articles as $article)
                                    <tr class="align-middle">
                                        <td>{{ $sno++ }}</td>
                                        <td><a href="https://easydoings.in/{{ $article->slug }}" target="_blank">{{ $article->title }}</a></td>
                                        <td>{{ $article->category }}</td>
                                        <td>{{ Str::limit($article->description, 80, '...') }}</td>
                                        <td><span class="badge bg-success-gradient">Active</span></td>
                                        <td>{{ $article->created_at }}</td>
                                        
                                        
                                        <td>
                                            <a class="btn btn-primary me-2" href="https://easydoings.in/{{ $article->category }}/{{ $article->url }}">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-eyes"></use>
                                                </svg>
                                            </a>
                                            <a class="btn btn-info" href="/edit-article?id={{ $article->id }}">
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
        
    });
</script>
@endsection
