<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h3 class="text-light text-center my-3">Register Here</h3>
                <div class="card p-5 my-3 shadow-sm">
                    <form method="POST" action="">
                        @csrf
                        <div class="input_field mb-4">
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Name"
                            value="{{old("name")}}">
                            <i class="fa-solid fa-file-signature"></i>
                        </div>

                        <div class="input_field mb-4">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email"
                          value="{{old("email")}}">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div class="input_field mb-4">
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" >
                            <i class="fa-regular fa-key"></i>
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-outline-dark rounded-pill px-5 text-secondary">Submit</button>
                        </div>

                        <ul class="pt-3">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{$error}}</li>
                            @endforeach
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
