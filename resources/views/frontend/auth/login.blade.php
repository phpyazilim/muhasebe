

<h4 class="mb-2">...Hoşgeldiniz! 👋</h4>
<p class="mb-4">Lütfen giriş yapınız</p>

<form id="formAuthentication" class="mb-3"  action="{{ route('login') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input
      type="text"
      class="form-control"
      id="email"
      name="email"
      value="{{ old('email') }}"
      placeholder="Enter your email or username"
      autofocus
    />
  </div>
  @if ($errors->first('email'))
       <div class="alert alert-danger ">
            {{ $errors->first('email')  }}
       </div>

  @endif
  <div class="mb-3 form-password-toggle">
    <div class="d-flex justify-content-between">
      <label class="form-label" for="password">Password</label>

    </div>
    <div class="input-group input-group-merge">
      <input
        type="password"
        id="password"
        class="form-control"
        name="password"
        autocomplete="current-password"
        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
        aria-describedby="password"
      />

      @if ($errors->first('password'))
      <div class="alert alert-danger ">
           {{ $errors->first('password')  }}
      </div>

 @endif

      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
    </div>
  </div>

  <div class="mb-3">
    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
  </div>
</form>



