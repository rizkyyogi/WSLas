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
                    <div class="buttons">
                      <a href="{{route('slide.create')}}" class="btn btn-primary" >Tambah {{$title}}</a>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-sm table-white">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php $no =1; @endphp @foreach ($data as $item)
                      <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->name}}</td>
                            <td><img src="{{ asset('images/slide/' . $item->gambar) }}" alt="foto" widht="50" height="30"></td>
                            <td>
                                <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                    <a href="/slide/ {{$item->id}} /destroy" class="btn btn-danger" onclick="return confirm('Yakin akan dihapus?')"><i class="fas fa-trash-alt"></i></a>
                                    <a href="/slide/ {{$item->id}} /edit" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                    <!-- <a  class="btn btn-success"><i class="fas fa-eye"></i></a> -->
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