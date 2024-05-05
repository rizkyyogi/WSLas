@extends('layouts.app') 
@section('tabel')
<section class="section">
    <div class="section-header">
        <h1>{{$title}}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('proyek.index')}}">Dashboard</a>
            </div>

            <div class="breadcrumb-item">{{$title}}</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Input Aktual & Biaya</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('aktual.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Proyek</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="proyek_id" id="proyek_id">
                                        @foreach($data as $item)
                                        <option value="{{$item->id}}">{{$item->nama_proyek}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="date" class="form-control" name="tanggal" id="tanggal">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Aktual (%)</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="aktual" id="aktual">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Biaya (%)</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="biaya" id="biaya">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Add
                                        {{$title}}</button>
                                    <a href="{{route('aktual')}}" class="btn btn-danger" style="color:white">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>
</section>
<script>
    function previewimage()
    {
        const image = document.querySelector('#photo');
        const imagePreview = document.querySelector('.img-preview');
        imagePreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function (oFREvent){
            imgPreview.src=oFREvent.target.result;
        }

    }
</script>
@endsection