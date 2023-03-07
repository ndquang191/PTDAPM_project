<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @if(session('message'))
        <script type="text/javascript">
        console.log();
        Swal.fire({
            title: 'Thêm thành công',
            text: '{{session('message')}}',
            icon: 'success',
            confirmButtonText: 'Đóng'
        })
    </script>
   @endif
</body>
</html>