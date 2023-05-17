@extends('template.main')
@section('konten')
<div class="container-xxl flex-grow-1 container-p-y">  
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Edit Data Siswa</h5>
        <small class="text-muted float-end">edit data siswa</small>
      </div>
      
            <div class="card-body">
              <form action="{{route('siswa.update', $siswa->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row ">
                  <div class="col-md-6">
                  <label class=" col-form-label" for="basic-icon-default-fullname">Nama Siswa</label>
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="fa fa-box-archive"></i
                      ></span>
                      <input
                        type="text"
                        value="{{$siswa->nama_siswa}}"
                        class="form-control {{ $errors->first('nama_siswa') ? "is-invalid" : "" }}"
                        id="basic-icon-default-fullname"
                        placeholder="masukan ID buku"
                        name="nama"
                      />
                     
                    </div>
                    @error('nama')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                  </div>

                  <div class="col-md-6">
                    <label class=" col-form-label" for="basic-icon-default-fullname">Jenis Kelamin</label>
                      <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fullname2" class="input-group-text"
                          ><i class="fa fa-box-archive"></i
                        ></span>
                        <select name="jk" class="form-control {{ $errors->first('jk') ? "is-invalid" : "" }}" >
                          @foreach ($gender as $value)
                          <option hidden>Select gender</option>
                          <option  @if ($value->id_gender == $siswa['gender_id'])
                            {{ "selected" }}
                        @endif 
                          value="{{$value->id_gender}}">{{$value->gender}}</option>
                          @endforeach
                      </select>
                       
                      </div>
                      @error('jk')
                      <small class="text-danger">
                          {{ $message }}
                      </small>
                      @enderror
                    </div>

                    <div class="col-md-6">
                      <label class=" col-form-label" for="basic-icon-default-fullname">Asal Sekolah</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-fullname2" class="input-group-text"
                            ><i class="fa fa-box-archive"></i
                          ></span>
                          <input
                            type="text"
                            value="{{$siswa->asal_sekolah}}"
                            class="form-control {{ $errors->first('asal') ? "is-invalid" : "" }}"
                            id="basic-icon-default-fullname"
                            placeholder="masukan asal sekolah"
                            name="asal"
                          />
                         
                        </div>
                        @error('asal')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                      </div> 
                      
                      <div class="col-md-6">
                        <label class=" col-form-label" for="basic-icon-default-fullname">Agama</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="fa fa-box-archive"></i
                            ></span>
                            <select name="agama" class="form-control {{ $errors->first('agama') ? "is-invalid" : "" }}" >
                              @foreach ($agama as $value)
                              <option hidden>Select Agama</option>
                              <option  @if ($value->id_agama == $siswa['agama_id'])
                                {{ "selected" }}
                            @endif 
                              value="{{$value->id_agama}}">{{$value->agama}}</option>
                              @endforeach
                          </select>
                           
                          </div>
                          @error('agama')
                          <small class="text-danger">
                              {{ $message }}
                          </small>
                          @enderror
                        </div>

                      <div class="col-md-6">
                        <label class=" col-form-label" for="basic-icon-default-fullname">Jurusan</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="fa fa-box-archive"></i
                            ></span>
                            <select name="jurusan" class="form-control {{ $errors->first('jurusan') ? "is-invalid" : "" }}" >
                                @foreach ($jurusan as $value)
                                <option hidden>Select Jurusan</option>
                                <option  @if ($value->id_jurusan == $siswa['jurusan_id'])
                                  {{ "selected" }}
                              @endif 
                                value="{{$value->id_jurusan}}">{{$value->jurusan}}</option>
                                @endforeach
                            </select>
                           
                          </div>
                          @error('jurusan')
                          <small class="text-danger">
                              {{ $message }}
                          </small>
                          @enderror
                        </div>

                        <div class="col-md-6">
                          <label class=" col-form-label" for="basic-icon-default-fullname">Alamat</label>
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"
                                ><i class="fa fa-box-archive"></i
                              ></span>
                              <input
                                type="text"
                                value="{{$siswa->alamat}}"
                                class="form-control {{ $errors->first('alamat') ? "is-invalid" : "" }}"
                                id="basic-icon-default-fullname"
                                placeholder="masukan stok"
                                name="alamat"
                              />
                             
                            </div>
                            @error('alamat')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                            @enderror
                          </div>

                          <input
                          hidden
                                type="text"
                                value="{{$siswa->no_reg}}"
                                class="form-control {{ $errors->first('alamat') ? "is-invalid" : "" }}"
                                id="basic-icon-default-fullname"
                                placeholder="masukan stok"
                                name="no_reg"
                              />
                 
        
                  <div class="modal-footer mt-3">
                    
                    <button type="submit" class="btn btn-primary">Update</button>
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

@endsection      
