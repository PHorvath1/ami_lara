<div class="col-6 col-sm">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3>{{\App\Models\Article::count()}}</h3>
            Articles
            <div class="text-right"><i class="fas fa-book"></i></div>
        </div>
        <a href="{{route('admin:articles.index')}}" class="small-box-footer">View articles <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
    <div class="col-6 col-sm">
    <div class="small-box bg-success">
        <div class="inner">
            <h3>{{\App\Models\Volume::count()}}</h3>
            Volumes
            <div class="text-right"><i class="fas fa-book"></i></div>
        </div>
        <a href="{{route('admin:volumes.index')}}" class="small-box-footer">View volumes <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
    <div class="col-6 col-sm">
    <div class="small-box bg-danger">
        <div class="inner">
            <h3>{{\App\Models\User::count()}}</h3>
            Users
            <div class="text-right"><i class="fas fa-users"></i></div>
        </div>
        <a href="{{route('admin:users.index')}}" class="small-box-footer">View users <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
