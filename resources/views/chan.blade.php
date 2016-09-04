@extends("base")

@section("content")
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Title</th>
          <th>Video ID</th>
          <th>Youtube Status</th>
          <th>Upload Date</th>
          <th>File Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($videos as $vid)
          @if ($vid["YT_Status"] == 'not found')
            <tr class="table-danger">
          @endif
          @if ($vid["YT_Status"] == 'unlisted')
            <tr class="table-warning">
          @endif
            <td>{{ $vid["Title"] }}</td>
            <td><a href="https://www.youtube.com/watch?v={{ $vid["YT_ID"] }}">{{ $vid["YT_ID"] }}</a></td>
            <td>{{ $vid["YT_Status"] }}</td>
            <td>{{ $vid["Upload_Date"] }}</td>
            <td>{{ $vid["File_Status"] }}</td>
            <td>
              @if ($vid["File_Name"] == '')
                  <a href="/chan/{{ $id }}/download/{{ $vid["id"] }}"><img src="/assets/img/icons/add.png" name="Download Video"></a>
              @else
                  <a href="/videos/{{ $id }}/{{ basename($vid["File_Name"]) }}"><img src="/assets/img/icons/disk.png" name="Watch"></a>
              @endif
              <a href="/chan/{{ $id }}/update/{{ $vid["YT_ID"] }}"><img src="/assets/img/icons/arrow_refresh.png" name="Update Info"></a>
            </td>
          </tr>
        @empty
        <tr>
          <td colspan="6" class="centerbold">No Videos!</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="col-md-2">
    <a href="/chan/{{ $id }}/update/videos" class="btn btn-info" role="button">Update Channel Videos</a>
  </div>
</div>
@endsection