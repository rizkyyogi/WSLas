@extends('layouts.app')

@section('tabel')
<section class="section">
          <div class="section-header">
            <h1>{{$title}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">{{$title}}</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                
                  <div class="card-body">
                    <div class="section-title">Tabel {{$title}}</div>
                    <!-- <div class="buttons">
                      <a href="{{route('sms.create')}}" class="btn btn-primary" >Tambah {{$title}}</a>
                    </div> -->
                    <div class="table-responsive">
                    <table class="table table-sm table-white">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Proyek</th>
                          <th scope="col">Penerima</th>
                          <th scope="col">Pesan</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php $no =1; @endphp @foreach ($data as $item)
                      <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->proyek->nama_proyek}}</td>
                            <td>{{$item->penerima}}</td>
                            <td>{{$item->pesan}}</td>
                            <td>{{$item->tanggal}}</td>
                            <td>
                                <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                    <a href="/sms/ {{$item->id}} /destroy" class="btn btn-danger" onclick="return confirm('Yakin akan dihapus?')"><i class="fas fa-trash-alt"></i></a>
                                </div>
                                    
                            </td>
                            
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
                
              </div>
              
            </div>
          </div>
        </section>
       
        <style>
            .card-body {
                position: relative;
            }

            .buttons {
                position: absolute;
                top: 10px;
                right: 10px;
            }
        </style>
@endsection