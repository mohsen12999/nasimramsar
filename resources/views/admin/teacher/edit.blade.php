@extends('layouts.admin')

@section('header')
<link href="{{ asset('froala-editor/css/froala_editor.pkgd.min.css') }}" rel="stylesheet">
<link href="{{ asset('froala-editor/css/froala_style.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات استاد</h3>
            </div>
            <!-- form start -->
            <form role="form" method="post"  action="{{ url('admin/teacher/' . $teacher->id) }}" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">

                <div class="box-body">
                    <div asp-validation-summary="ModelOnly" class="text-danger"></div>
                    <input name="Id" id="Id" type="hidden" value="{{$teacher->id}}" />

                    <div class="form-group">
                        <label for="Name" class="control-label">تصویر استاد</label>
                        <div>
                          <img id="inputImage" onclick="$('#pic').trigger('click');" style="cursor: pointer;width: auto;height: 180px;"
                            src="{{$teacher->pic===''?asset('images/no-image.png'):asset($teacher->pic)}}" class="img-rounded" alt="no Image Available">
                          <input id="pic" name="pic" type="file" onchange="GetImage()" style="display: none" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label">نام استاد</label>
                        <input id="name" name="name" class="form-control" value="{{$teacher->name}}"/>
                        <span for="name" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="title" class="control-label">عنوان استاد</label>
                        <input id="title" name="title" class="form-control" value="{{$teacher->title}}"/>
                        <span for="title" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="abstract" class="control-label">خلاصه استاد</label>
                        <textarea id="abstract" name="abstract" class="form-control" placeholder="خلاصه استاد" >{{$teacher->abstract}}</textarea>
                        <span for="abstract" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label">درباره ی استاد</label>
                        <textarea id="description" name="description" class="form-control" placeholder="درباره ی استاد" >{{$teacher->description}}</textarea>
                        <span for="description" class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="field_id" class="control-label">رشته استاد</label>
                        <select id="field_id" name="field_id" class="form-control">
                           @if($fields)
                            @foreach ($fields as $field)
                              <option value="{{$field->id}}" @if($field->id==$teacher->field_id) selected @endif>{{$field->title}}</option>
                            @endforeach
                          @endif

                          {{--  <?php if($field->id==$teacher->field_id){echo 'selected';} ?>  --}}
                        </select>
                        <span for="field_id" class="text-danger"></span>
                    </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> ذخیره</button> |
                    <a href="{{url('admin\teacher')}}" class="btn btn-default"><i class="fa fa-list-alt" title="بازگشت به لیست"></i> بازگشت به لیست</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('froala-editor/js/froala_editor.pkgd.min.js') }}" defer></script>
<script type="">
      $(document).ready(function () {
        $('#description').froalaEditor({
            imageUploadURL: '/UploadFile',
            direction: 'rtl',
            language: 'fa',
            heightMin: 200,

            imageUploadParams: {
                id: 'my_editor_description_creat_teacher',
                location: 'images', // This allows us to distinguish between Froala or a regular file upload.
                _token: "{{ csrf_token() }}" // This passes the laravel token with the ajax request.
            },
        })
        .on('froalaEditor.image.removed', function (e, editor, $img) {
            $.ajax({
            method: "POST",
            url: "{{url('/deletefile')}}",
            data: {
                id: 'my_editor_description_creat_teacher',
                src: $img.attr('src'),
                _token: "{{ csrf_token() }}"
            }
            })
            .done (function (data) {
            console.log ('image was deleted');
            })
            .fail (function () {
            console.log ('image delete problem');
            })
        });
    });

    function GetImage() {
        try {
          var input = document.getElementById("pic");
          if (input.files && input.files[0]) {
            //var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
            var fileExtension = ['jpg'];
            if ($.inArray(input.value.split('.')[input.value.split('.').length - 1].toLowerCase(), fileExtension) === -1) {
              $("#pic").val("");
              showAppMessage("فایل ها تنها با فرمت تصویر مجاز می باشند. " + fileExtension.join(', '), "warning");
            }
            var reader = new FileReader();
            reader.onload = function (e) {
              $('#inputImage').attr('src', e.target.result);
              changeImage = true;
            }
            reader.readAsDataURL(input.files[0]);
          }
        } catch (e) {
          showAppMessage(e.statusMessage, "error");
        }
    };
</script>
@endsection
