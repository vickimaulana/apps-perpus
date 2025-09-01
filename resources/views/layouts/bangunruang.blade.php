<!DOCTYPE html>
<html>
<head>
    <title>Bangun Ruang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

<div class="container">
    <h1 class="text-center mb-4">Kalkulator Bangun Ruang</h1>

    <form action="{{ route('bangunruang.hitung') }}" method="POST" class="row g-3">
        @csrf

        {{-- Kubus --}}
        <div class="col-md-4">
            <h4>Kubus</h4>
            <input type="number" name="sisi" class="form-control mb-2" placeholder="Sisi" value="{{ $sisi }}">
            @if($volume !== null)
                <div class="alert alert-info">
                    Volume = {{ $volume }} <br>
                    Luas Permukaan = {{ $luas }}
                </div>
            @endif
        </div>

        {{-- Balok --}}
        <div class="col-md-4">
            <h4>Balok</h4>
            <input type="number" name="p" class="form-control mb-2" placeholder="Panjang" value="{{ $p }}">
            <input type="number" name="l" class="form-control mb-2" placeholder="Lebar" value="{{ $l }}">
            <input type="number" name="t" class="form-control mb-2" placeholder="Tinggi" value="{{ $t }}">
            @if($vol_balok !== null)
                <div class="alert alert-info">
                    Volume = {{ $vol_balok }} <br>
                    Luas Permukaan = {{ $lp_balok }}
                </div>
            @endif
        </div>

        {{-- Limas Segi Empat --}}
        <div class="col-md-4">
            <h4>Limas Segi Empat</h4>
            <input type="number" name="s_limas" class="form-control mb-2" placeholder="Sisi Alas" value="{{ $s_limas }}">
            <input type="number" name="t_limas" class="form-control mb-2" placeholder="Tinggi" value="{{ $t_limas }}">
            @if($vol_limas !== null)
                <div class="alert alert-info">
                    Volume = {{ $vol_limas }}
                </div>
            @endif
        </div>

        {{-- Tabung --}}
        <div class="col-md-6">
            <h4>Tabung</h4>
            <input type="number" name="r_tabung" class="form-control mb-2" placeholder="Jari-jari" value="{{ $r_tabung }}">
            <input type="number" name="t_tabung" class="form-control mb-2" placeholder="Tinggi" value="{{ $t_tabung }}">
            @if($vol_tabung !== null)
                <div class="alert alert-info">
                    Volume = {{ $vol_tabung }} <br>
                    Luas Permukaan = {{ $lp_tabung }}
                </div>
            @endif
        </div>

        {{-- Bola --}}
        <div class="col-md-6">
            <h4>Bola</h4>
            <input type="number" name="r_bola" class="form-control mb-2" placeholder="Jari-jari" value="{{ $r_bola }}">
            @if($vol_bola !== null)
                <div class="alert alert-info">
                    Volume = {{ $vol_bola }} <br>
                    Luas Permukaan = {{ $lp_bola }}
                </div>
            @endif
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Hitung</button>
        </div>
    </form>
</div>

</body>
</html>
