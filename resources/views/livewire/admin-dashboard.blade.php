<div>
    <div class="row">
        <div class="col-md-4">
        <h2>Manager User</h2>
             <div class="row">
                 @foreach(\App\Models\User::all() as $user)
<div class="col-md-12"></div>


                 @endforeach
             </div>

        </div>

    </div>
</div>
