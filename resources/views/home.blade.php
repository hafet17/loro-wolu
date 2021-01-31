@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach ($posts as $item)

            <div class="card mb-3">
                <div class="card-header">{{ $item->title }}</div>

                <div class="card-body">
                    {{ $item->body }}
                </div>

                @foreach ($item->tags as $tag)
                <ul>
                    <li>{{ $tag->name }}</li>
                </ul>
                @endforeach

            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
