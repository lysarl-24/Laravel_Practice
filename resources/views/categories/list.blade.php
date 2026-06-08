@extends('layouts.app')
@section('title')
    <title>Categories</title>
@endsection
@section('content')
    <div class="container">
        <a href="{{ route('categories.create') }}" class="btn btn-info">create+</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->dec }}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#category{{ $category->id }}">
                                {{-- <i class="fa-solid fa-eye text-success"></i> --}}
                                View
                            </a>
                            |
                            <a href="{{ route('categories.edit', $category->id) }}">
                                {{-- <i class="fa-solid fa-pen-to-square text-info"></i> --}}
                                Update
                            </a>
                            |
                            <a href="" data-bs-toggle="modal" data-bs-target="#deleteCategory{{ $category->id }}">
                                {{-- <i class="fa-solid fa-trash text-danger"></i> --}}
                                Delete
                            </a>
                            @include('categories.show')
                            @include('categories.delete')

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
