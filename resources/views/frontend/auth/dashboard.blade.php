user dashboard 

{{ $user }}
<br>
{{Auth()->user()->name}} 
<br>
{{Auth()->user()->user_type}} 
<br>



<form method="POST" action="{{ route('logout') }}">
    @csrf
<button type="submit" href="{{ route('logout') }}"  >
Çıkış Yap
</button> 
</form>