@extends('portal.layouts.main')
@section('title', 'Dashboard')
@section('content')
@include('ckfinder::setup')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa thông tin</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form"  class="form-transparent clearfix" enctype="multipart/form-data" method="POST" action="{{ route('products.update', $product->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input class="form-control" name="name" placeholder="Tên sản phẩm ....." value="{{ $product->name }}">
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select class="form-control" name="category_id">
                                                @foreach ($categories as $category)
                                                    @if ($product->category_id === $category->id)
                                                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Giá niêm yết</label>
                                            <input class="form-control" name="price" placeholder="Giá niêm yết ....." value="{{ $product->price }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Giá bán</label>
                                            <input class="form-control" name="sale_price" placeholder="Giá bán ....." value="{{ $product->sale_price }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input class="form-control" name="quantity" type="number" placeholder="Số lượng ....." value="{{ $product->quantity ?? 0 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <div id="drop-region" class="drop-region" onclick="document.getElementById('uploadImage').click()" style="background-image: url('{{ asset($product->image) }}');">
                                        <input class="image" id="uploadImage" type="file" style="display: none">
                                    </div>
                                    <input name="file_content" type="hidden">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" placeholder="Thông tin thêm ....." class="form-control" id="editor" rows="5">{{ $product->description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749" style="width: 100%; height: 600px; object-fit: contain">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"
    integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
<style>
    .drop-region {
        width: 300px;
        height: 250px;
        border: 2px dashed #028AF4 !important; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }
    img {
        display: block;
        max-width: 100%;
    }
    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 0 10px;
        border: 1px solid red;
    }
    .modal-lg {
        max-width: 1000px !important;
    }
</style>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"
    integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $("#uploadImage").val(null);
        
        CKEDITOR.replace('editor', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            filebrowserImageUploadUrl: '{{ route('ckfinder_browser') . '?_token=' . csrf_token() }}',
            toolbarGroups: [
                { name: 'document', groups: [ 'Source', 'mode', 'document', 'doctools' ] },
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'tools', groups: [ 'tools' ] },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert', 'Iframe' ] },
                '/',
                { name: 'others', groups: [ 'others' ] },
                { name: 'about', groups: [ 'about' ] }
            ],
            removeButtons: 'Source,Save,Templates,NewPage,ExportPdf,Preview,Print,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,CreateDiv,PageBreak,ShowBlocks,About,Smiley,Anchor',
            editorplaceholder: 'Type your content...',
            height: '350'
        });

        // $('#uploadImage').on('change', function () {
        //     if (this.files && this.files[0]) {
        //         var image = $(this).parents(".drop-region");
        //         image.children('h4').remove();
        //         var reader = new FileReader();
        //         reader.onload = function (e) {
        //             image.css('background-image', "url(" + e.target.result + ")");
        //         };
        //         reader.readAsDataURL(this.files[0]);
        //     }
        // });

        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;

        $(".image").on("change", function (e) {
            var files = e.target.files;
            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader, file, url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400,
            });

            canvas.toBlob(function (blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob); 
                reader.onload = function () {
                    var base64data = reader.result;
                    $("#drop-region").css('background-image', "url("+ base64data + ")");
                    $("#drop-region").children('h4').remove();
                    $("input[name='file_content']").val(base64data);
                    $modal.modal('hide');
                }
            });
        });
    });
</script>
@endsection
