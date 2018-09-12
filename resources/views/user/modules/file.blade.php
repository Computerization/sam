<div class="ui segment">
  <h3>上传文件</h3>
  <form class="ui form" method="post" action="{{ URL::action('FileController@post_file') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="field">
      <label>选择文件</label>
      <input type="file" name="file">
    </div>
    <input type="hidden" name="type" value="3" id="type">
    <button class="ui button" type="submit">Submit</button>
  </form>
</div>


<div class="ui relaxed divided list">
@foreach($user->files->where('type', 3) as $file)
  <div class="item">
    <i class="big middle aligned icon"></i>
    <div class="content">
      <a href="{{ URL::action('FileController@get_file', ['id' => $file->id]) }}" class="header">{{ $file->original_name }}</a>
      <div class="description">
        大小：<span class="filesize">{{ $file->filesize }}</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        类型：<span class="mimetype">{{ $file->mimetype }}</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        ID：<span>{{ $file->id }}</span>
        <br>
        <span>{{ $file->user->name }}</span>&nbsp;上传于&nbsp;<span>{{ $file->created_at }}</span><br>
      </div>
    </div>
  </div>

@endforeach
</div>

<style>
  .content .description {
    line-height: 1.5em;!important;
  }
  .content .header {
    line-height: 1.5em;!important;
  }
</style>


@section('scripts')
<script type="text/javascript">

function renderSize(value){
  if(null==value||value==''){
    return "0 Bytes";
  }
  var unitArr = new Array("Bytes","KB","MB","GB","TB","PB","EB","ZB","YB");
  var index=0;
  var srcsize = parseFloat(value);
  index=Math.floor(Math.log(srcsize)/Math.log(1024));
  var size =srcsize/Math.pow(1024,index);
  size=size.toFixed(2);//保留的小数位数
  return size+unitArr[index];
}

var filesizes = document.getElementsByClassName("filesize");
for( var y = 0, j = filesizes.length; y < j; y++){
	filesizes[y].innerHTML = renderSize(filesizes[y].innerHTML);
}

$('.mimetype').each(function(){
  var mimetype = $(this).text();
  switch (mimetype) {
    case 'application/pdf':
      $(this).text('PDF文档');
      $(this).parent().parent().prev().addClass('file pdf outline');
      break;
    case 'application/msword':
      $(this).text('Word文档');
      $(this).parent().parent().prev().addClass('file word outline');
      break;
    case 'application/vnd.ms-powerpoint':
      $(this).text('PPT演示文稿');
      $(this).parent().parent().prev().addClass('file powerpoint outline');
      break;
    case 'application/vnd.ms-excel':
      $(this).text('Excel表格');
      $(this).parent().parent().prev().addClass('file excel outline');
      break;
    case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
      $(this).text('Word 2007 文档');
      $(this).parent().parent().prev().addClass('file word outline');
      break;
    case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
      $(this).text('PPT 2007 演示文稿');
      $(this).parent().parent().prev().addClass('file powerpoint outline');
      break;
    case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
      $(this).text('Excel 2007 表格');
      $(this).parent().parent().prev().addClass('file excel outline');
      break;
    case 'text/plain':
      $(this).text('TXT纯文本');
      $(this).parent().parent().prev().addClass('sticky note outline');
      break;
    case 'application/zip':
      $(this).text('ZIP压缩文件');
      $(this).parent().parent().prev().addClass('file archive outline');
      break;
    case 'application/octet-stream':
      $(this).text('RAR压缩文件');
      $(this).parent().parent().prev().addClass('file archive outline');
      break;
    default:
      $(this).text('未知');
      $(this).parent().parent().prev().addClass('file outline');
  }
});

</script>
@endsection
