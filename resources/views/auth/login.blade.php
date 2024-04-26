<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="text-center mt-5">
                    <i class="fa-solid fa-circle-user fa-5x"></i>
                </div>
                <h3 class="text-light text-center mt-3">Login</h3>
                <div class="card p-5 my-5 shadow-sm">
                    <form method="POST">
                        @csrf
                        <div class="input_field mb-4">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email"
                            value="{{old("email")}}">
                            <i class="fa-solid fa-envelope"></i>
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="input_field mb-4">
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                            <i class="fa-solid fa-lock"></i>
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-outline-dark rounded-pill px-5 text-secondary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
