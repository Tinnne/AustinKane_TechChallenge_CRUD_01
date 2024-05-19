<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tech Challenge AkSub</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <div class="container p-4 bg-light mt-3 rounded">
        <h3>List Negara</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Negara</th>
                    <th scope="col">Benua</th>
                    <th scope="col">IbuKota</th>
                    <th scope="col">Populasi</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $startCount = ($countries->currentPage() - 1) * $countries->perPage() + 1;
                @endphp
                @foreach ($countries as $country)
                    @if (isset($countryedit) && $country->id == $countryedit->id)
                    <form action="{{ route('updatecountry', $country->slug) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <tr>
                            <th scope="row">{{ $startCount++ }}</th>
                            <td>
                                <input name="country" type="text" class="form-control" value="{{ $country->country }}">
                            </td>
                            <td>
                                <input name="continent" type="text" class="form-control" value="{{ $country->continent }}">
                            </td>
                            <td>
                                <input name="capital" type="text" class="form-control" value="{{ $country->capital }}">
                            </td>
                            <td>
                                <input name="population" type="number" class="form-control" value="{{ $country->population }}">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </td>
                        </tr>
                    </form>
                    @else
                        <tr>
                            <th scope="row">{{ $startCount++ }}</th>
                            <td>{{ $country->country }}</td>
                            <td>{{ $country->continent }}</td>
                            <td>{{ $country->capital }}</td>
                            <td>{{ $country->population }}</td>
                            <td>
                                <div style="display: flex; gap: 10px; align-items: center;">
                                    <a class="link-dark" href="{{ route('editcountry', $country->slug) }}"><i data-feather="edit"></i></a>
                                    <form action="{{ route('deletecountry', $country->slug) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link link-dark p-0 m-0 align-baseline"><i data-feather="trash-2"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $countries->links('pagination::bootstrap-4') }}
        <br>
        <form action="{{ route('storecountry') }}" method="POST">
            <h3>Tambahkan Negara</h3>
            @csrf
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>
                            <label class="form-label">Nama Negara</label>
                            <input name="country" type="text" class="form-control" placeholder="Masukkan nama negara">
                        </td>
                        <td>
                            <label class="form-label">Benua</label>
                            <select class="form-control" name="continent">
                            <option selected>Pilih benua</option>
                            <option value="Asia">Asia</option>
                            <option value="Afrika">Afrika</option>
                            <option value="Amerika Utara">Amerika Utara</option>
                            <option value="Amerika Selatan">Amerika Selatan</option>
                            <option value="Antartika">Antartika</option>
                            <option value="Eropa">Eropa</option>
                            <option value="Australia">Australia</option>
                            </select>
                        </td>
                        <td>
                            <label class="form-label">Ibukota</label>
                            <input name="capital" type="text" class="form-control" placeholder="Masukkan ibukota negara">
                        </td>
                        <td>
                            <label class="form-label">Populasi</label>
                            <input name="population" type="number" class="form-control" placeholder="Masukkan populasi negara">
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    feather.replace();
</script>
</html>
