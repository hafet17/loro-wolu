@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User {{ $user->name }}</div>

                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Content</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $item)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td><a href="{{ url('post/' . $item->id) }}">{{ $item->title }}</a></td>
                                <td>{{ $item->body }}</td>
                            </tr>
                            @endforeach

                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
