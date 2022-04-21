<!--pinche marcos -->

@include('layouts.nav')

<form action="{{url('/user')}}" method="post">

    @csrf

    <label>name</label><br> <input type="text" class="form-control" name="name" id="name" required>

    <label>email</label><br> <input type="text" class="form-control" name="email" id="email" required>

    <label>password</label><br> <input type="text" class="form-control" name="password" id="password" required>

    <button type="submit" >registro</button>

    </form>
