<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="mb-3">
        <label>Email Address</label>
        <input type="email" name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" required>

        @error('email')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password"
            class="form-control @error('password') is-invalid @enderror"
            required>

        @error('password')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">LOGIN</button>
</form>
