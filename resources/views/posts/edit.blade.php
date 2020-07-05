@extends('layouts.sbadmin2')

@section('title', 'Edit Artikel')

@push('scripts')
@endpush

@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Artikel</h6>
    </div>
    <div class="card-body">
      @include('layouts.inc.messages')

      <form action="{{ url('/artikel/' . $post->id) }}" method="POST" role="form">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label>Judul</label>
          <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
        </div>

        <div class="form-group">
          <label>Slug</label>
          <input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">
        </div>

        <div class="form-group">
          <label>Isi</label>
          <textarea class="form-control" name="content" rows="3">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="form-group">
          <label>Tag</label>
          <input type="text" class="form-control" name="tag" value="{{ old('tag', $post->tag) }}">
          <small class="form-text text-muted">Tag dipisah dengan koma. Contoh php,js,css</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-secondary" href="{{ url('/artikel') }}">Kembali</a>
      </form>
    </div>
  </div>
@endsection
