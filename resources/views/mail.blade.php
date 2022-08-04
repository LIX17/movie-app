<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Submission</title>
    
</head>
<body>
    <p>{{$data['name']}} telah submit form: <br><br>
		Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data['name']}}<br>      
        Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data['email']}}<br>
    </p>
    <p>Dengan pertanyaan/pesan sebagai berikut:<br>
        {{$data['message']}} 
    </p>    

    <p>Terima Kasih.</p>
</body>
</html>
