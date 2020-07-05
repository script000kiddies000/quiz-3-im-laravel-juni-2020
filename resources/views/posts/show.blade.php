@extends('layouts.sbadmin2')

@section('title', 'Detail Artikel')

@push('scripts')
@endpush

@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Artikel</h6>
    </div>
    <div class="card-body">
      @include('layouts.inc.messages')

      <h3>Judul {{ $post->title }}</h3>
      <span>Slug: {{ $post->slug }}</span>
      <p>{{ $post->content }}</p>

      <div>{!! $post->tag_button !!}</div>

    </div>
  </div>
@endsection
