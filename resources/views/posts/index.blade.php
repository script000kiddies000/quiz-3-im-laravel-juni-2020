@extends('layouts.sbadmin2')

@section('title', 'List Artikel')

@push('scripts')
  <script>
    jQuery(document).ready(function($) {
      Swal.fire({
          title: 'Berhasil!',
          text: 'Memasangkan script sweet alert',
          icon: 'success',
          confirmButtonText: 'Cool'
      })
    });
</script>
@endpush

@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Artikel</h6>
    </div>
    <div class="card-body">
      @include('layouts.inc.messages')

      <div class="mb-4">
        <a class="btn btn-primary" href="{{ url('/artikel/create') }}">Buat Baru</a>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th></th>
              <th>User</th>
              <th>Judul</th>
              <th>Slug</th>
              <th>Tag</th>
            </tr>
          </thead>
          <tbody>
            @if (count($posts))
              @php
                $no = $posts->firstItem()
              @endphp
              @foreach ($posts as $post)
                <tr>
                  <td>{{ $no }}</td>
                  <td>
                    <a class="btn btn-sm btn-secondary" href="{{ url('/artikel/' . $post->id) }}">Detail</a>
                    <a class="btn btn-sm btn-success" href="{{ url('/artikel/' . $post->id . '/edit') }}">Edit</a>
                    <form action="{{ url('/artikel/' . $post->id) }}" style="display: inline-block;" method="POST">
                      @csrf
                      @method('DELETE')
                      <button onclick="return confirm('Hapus ?')"
                        type="submit" class="btn btn-sm btn-danger">
                        Delete
                      </button>
                    </form>
                  </td>
                  <td>{{ $post->user->name }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->slug }}</td>
                  <td>{{ $post->tag }}</td>
                </tr>
                @php
                  $no++
                @endphp
              @endforeach
            @else
              <tr>
                <td colspan="5">Tidak ada data</td>
              </tr>
            @endif
          </tbody>
        </table>

        {{ $posts->links() }}
      </div>
    </div>
  </div>
@endsection
