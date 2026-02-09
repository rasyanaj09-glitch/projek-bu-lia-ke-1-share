<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tampilan login</title>
</head>

<body>
    <div class=" login container">
        <div class=" login card"></div>
        <div class=" login header"></div>
        <h3 class=" text-center my-4">LOGIN</h3>
        <hr>

        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Adrees</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required autofocus
                            placeholder="enter your email">
                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>  
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" required autofocus
                            placeholder="enter your password">
                               @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>  
                            @enderror
                    </div>
                    <button type="submit" class="btn-login">LOGIN</button>
                </form>
            </div>
        </div>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</body>

</html>
