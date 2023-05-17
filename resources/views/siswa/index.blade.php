@extends('template.main')
@section('konten')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mt-4">
       
      <div class="card-header">
            <h5 class="page-tittle" style="float:left">Data Siswa</h5>
            
      </div>
       
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th style="width: 10%">No</th>
                <th>NoReg</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Asal Sekolah</th>
                <th>Jurusan</th>
                <th></th>
                
                
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
             
              
             {{-- looping data disini masze --}}
             @foreach($siswa as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->no_reg}}</td>
                <td>{{$item->nama_siswa}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->agama}}</td>
                <td>{{$item->asal_sekolah}}</td>
                <td>{{$item->jurusan}}</td>
                <td>
                    <a href="{{route('siswa.edit', $item->id)}}">
                        <button type="button" class="btn btn-icon btn-outline-warning">
                          <i class="fa fa-edit"></i>
                        </button> &nbsp;
                        </a>

                        


                        <a href="{{route('siswa.delete', $item->id)}}">
                        <button onclick="return confirm('yakin mau apus?')" type="button" class="btn btn-icon btn-outline-danger">
                          <i class="fa fa-trash"></i>
                        </button>
                    </a>
                </td>
                
              </tr>
              
              @endforeach
            </tbody>
            
          </table>
        </div>
      </div>
    </div>
    
   

@endsection

