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
          <div class="section-header">
            <a href="{{route('aktual.create')}}" class="btn btn-primary">
              <i class="fa fa-plus">
                  Add</i>
          </a>
        <div class="section-header-breadcrumb">
            <div class="input-group" style="width: 200px;">
                <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search By Proyek">
                <div class="input-group-append">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                </div>
            </div>
        </div>

    </div>


          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                
                  <div class="card-body">
                    <div class="section-title">Tabel {{$title}}</div>
                      
                    <div class="table-responsive">
                        <table class="table table-sm table-white" id="myTable">
                          <thead>
                            <tr>
                              <th scope="col" class="text-center">No</th>
                              <th scope="col" class="text-center">Nama Proyek</th>
                              <th scope="col" class="text-center">Waktu</th>
                              <th scope="col" class="text-center">Aktual</th>
                              <th scope="col" class="text-center">Biaya</th>
                              <th scope="col" class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @php $no =1; @endphp @foreach ($data as $item)
                          <tr>
                                <td class="text-center">{{$no++}}.</td>
                                <td class="text-center">{{$item->proyek->nama_proyek}}</td>
                                <td class="text-center">{{$item->tanggal}}</td>
                                <td class="text-center">{{$item->aktual}}</td>
                                <td class="text-center">{{$item->biaya}}</td>
                                <td class="text-center">
                                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                        <a href="{{route('aktual.delete',$item->id)}}" class="btn btn-danger" onclick="return confirm('Yakin akan dihapus?')"><i class="fas fa-trash-alt"></i> Delete</a>
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
        <script>
    function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; // Ganti angka 1 dengan indeks kolom yang sesuai
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    }

</script>

@endsection