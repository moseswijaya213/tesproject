<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if ($t->status != 'Tidak ada pekerjaan')
        @if ($t->bukti_pekerjaan != null)
        <a href="{{ asset('storage/bukti_pekerjaan/' . $t->bukti_pekerjaan) }}" class="btn submitbutton btn-sm"
            target="_blank"><i class="bi bi-images me-1"></i> View Image</a>
        @endif
    @else
    Tidak ada pekerjaan
    @endif
</body>

</html>