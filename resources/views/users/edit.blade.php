@extends('layout.app')

@section('content')
    @include('layout.navigation')
    
    <div class="container bootstrap snippets bootdey">
        <h1 class="text-primary">Edit Profile</h1>
        <hr>
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <div class="row">
            <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        @if($user->avatar == null)
                            <ion-avatar>
                                <img  id="avatar" alt="Silhouette of a person's head" src="https://ionicframework.com/docs/img/demos/avatar.svg" />
                            </ion-avatar>
                        @else
                            <img id="avatar" src="{{ asset('storage/' . $user->avatar) }}" />
                        @endif
                        <h6>Upload a different photo...</h6>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                </div>
        
                <div class="col-md-9 personal-info">
                    <h3>Personal info</h3>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Name:</label>
                        <div class="col-lg-8">
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Password:</label>
                        <div class="col-lg-8">
                            <input type="password" name="password" value="{{ $user->password }}" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary text-bottom" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr>
@endsection