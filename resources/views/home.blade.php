@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Joki</div>
                <div class="card-body">
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        Ordered
                    </button>

                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Edit Orderan</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form method="POST" action="{{ route('simpan') }}">
                                    @csrf
                                <div class="form-group">
                                    <label>Forgotten Hall</label>
                                    <select class="form-control" name="joki">
                                        <option value="Stage Full Star 1-3">Stage Full Star 1-3</option>
                                        <option value="Stage Full Star 1-5">Stage Full Star 1-5</option>
                                        <option value="Stage Full Star 1-10">Stage Full Star 1-10</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <select class="form-control" name="harga">
                                        <option value="50000">Stage Full Star 1-3: 50.000,00 IDR</option>
                                        <option value="75000">Stage Full Star 1-5: 75.000,00 IDR</option>
                                        <option value="100000">Stage Full Star 1-10: 100.000,00 IDR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pesan</label>
                                    <textarea class="form-control" name="isi"></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary" value="SIMPAN">
                                </form>
                            </div>

                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                        </div>
                    </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tanggal Penjokian</th>
                                <th>Stage</th>
                                <th>Harga</th>
                                <th>Pesan</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $datas as $data )
                            <tr>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->joki }}</td>
                                <td>{{ $data->harga }}</td>
                                <td>{{ $data->isi}}</td>
                                <td>
                                    <a href="{{ route('hapus', ['id' => $data->id]) }}" class="btn btn-danger">Delete</a>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal2">
                                        Edit
                                    </button>
                                    <!-- The Modal -->
                                    <div class="modal" id="myModal2">
                                    <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Edit Orderan</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('editproses', ['id' => $data->id]) }}">
                                                @csrf
                                            <div class="form-group">
                                                <label>Forgotten Hall</label>
                                                <select class="form-control" name="joki">
                                                    <option value="Stage Full Star 1-3">Stage Full Star 1-3</option>
                                                    <option value="Stage Full Star 1-5">Stage Full Star 1-5</option>
                                                    <option value="Stage Full Star 1-10">Stage Full Star 1-10</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <select class="form-control" name="harga">
                                                    <option value="50000">Stage Full Star 1-3: 50.000,00 IDR</option>
                                                    <option value="75000">Stage Full Star 1-5: 75.000,00 IDR</option>
                                                    <option value="100000">Stage Full Star 1-10: 100.000,00 IDR</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Pesan</label>
                                                <textarea class="form-control" name="isi"></textarea>
                                            </div>
                                            <input type="submit" class="btn btn-primary" value="SIMPAN">
                                            </form>
                                        </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                    </div>
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
@endsection
