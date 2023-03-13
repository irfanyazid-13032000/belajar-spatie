<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>create role</title>
</head>
<body>

<h1>selamat datang di menu tambah role</h1>
<p>apabila ada button tambah, maka anda diperbolehkan untuk menambah role</p>

@can('create role')
<button>tambah</button>
@endcan
  
</body>
</html>