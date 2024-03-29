@extends('portal.layouts.main')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-th-list fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $numberCategory }}</div>
                            <div>Danh mục!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Chi tiết</span>
                        <a href="{{ route('categories.index') }}" class="pull-right"><i
                                class="fa fa-arrow-circle-right"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-cubes fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $numberProduct }}</div>
                            <div>Sản phẩm!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Chi tiết</span>
                        <a href="{{ route('products.index') }}" class="pull-right"><i
                                class="fa fa-arrow-circle-right"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $numberUser }}</div>
                            <div>Nhân sự!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Chi tiết</span>
                        <a href="{{ route('users.index') }}" class="pull-right"><i class="fa fa-arrow-circle-right"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $numberContact }}</div>
                            <div>Liên hệ!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Chi tiết</span>
                        <a href="" class="pull-right"><i class="fa fa-arrow-circle-right"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Slider
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('images.show', 1) }}" type="button" class="btn btn-default btn-xs">
                                Cài đặt
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="slider">
                        <form method="POST" action="{{ route('images.upload') . '?type=1' }}" enctype="multipart/form-data"
                            class="dropzone" id="image" type="1">
                            @csrf
                            <div class="dz-default dz-message">
                                <h4>Drop files here or click to upload</h4>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Top Banner
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('images.show', 2) }}" type="button" class="btn btn-default btn-xs">
                                Cài đặt
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="banner-top">
                        <form method="POST" action="{{ route('images.upload') . '?type=2' }}" enctype="multipart/form-data"
                            class="dropzone" id="image" type="2">
                            @csrf
                            <div class="dz-default dz-message">
                                <h4>Drop files here or click to upload</h4>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Bottom Banner
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('images.show', 3) }}" type="button" class="btn btn-default btn-xs">
                                Cài đặt
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="banner-bottom">
                        <form method="POST" action="{{ route('images.upload') . '?type=3' }}" enctype="multipart/form-data"
                            class="dropzone" id="image" type="3">
                            @csrf
                            <div class="dz-default dz-message">
                                <h4>Drop files here or click to upload</h4>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
<style>
    .swal2-popup {
        font-size: 14px !important;
    }

    .dz-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .dropzone.dz-started .dz-message {
        display: block !important;
    }

    .dropzone {
        border: 2px dashed #028AF4 !important;
    }

    .dropzone .dz-preview.dz-complete .dz-success-mark {
        opacity: 1;
    }

    .dropzone .dz-preview.dz-error .dz-success-mark {
        opacity: 0;
    }

    .dropzone .dz-preview .dz-error-message {
        top: 144px;
    }
</style>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    Dropzone.options.image =
    {
        maxFiles: 3,
        maxFilesize: 1000,
        acceptedFiles: ".jpeg,.jpg,.png",
        resizeMethod: "contain",
        addRemoveLinks: true,
        timeout: 50000,
        init: function () {
            let myDropzone = this;
            const type = myDropzone.element.getAttribute('type');
            $.ajax({
                url: "{{ route('images.list') }}" + "?type=" + type,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {
                        var file = {name: value.name, size: value.size};
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, value.path);
                        myDropzone.emit("complete", file);
                    });
                }
            });
        },
        removedfile: function (file) {
            let myDropzone = this;
            const type = myDropzone.element.getAttribute('type');
            if (this.options.dictRemoveFile) {
                if (file.previewElement.id != ""){
                    var name = file.previewElement.id;
                } else {
                    var name = file.name;
                }
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Bạn có muốn xóa ảnh ' + name,
                    icon: 'question',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    showCancelButton: true,
                }).then((res) => {
                    if (res.isConfirmed) {
                        $.ajax({
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'DELETE',
                            url: "{{ route('images.remove') }}" + "?type=" + type,
                            data: {filename: name},
                            success: function (data){
                                Swal.fire(
                                    'Deleted!',
                                    'Ảnh ' + data.success + ' đã được xóa thành công!',
                                    'success'
                                );
                                var fileRef;
                                return (fileRef = file.previewElement) != null ? 
                                fileRef.parentNode.removeChild(file.previewElement) : void 0;
                            },
                            error: function(e) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Lỗi đã xảy ra!'
                                })
                            }
                        });
                    }
                });
            }	
        },
        success: function (file, response) {
            file.previewElement.id = response.success;
            var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
            file.previewElement.querySelector("img").alt = response.success;
            olddatadzname.innerHTML = response.success;
        },
        error: function (file, response) {
            if ($.type(response) === "string") {
                var message = response;
            } else {
                var message = response.error;
            }
            file.previewElement.classList.add("dz-error");
            refs = file.previewElement.querySelectorAll("[data-dz-errormessage]");
            results = [];
            for (i = 0; i < refs.length; i++) {
                node = refs[i];
                results.push(node.textContent = message);
            }

            return results;
        }
    };
</script>
@endsection