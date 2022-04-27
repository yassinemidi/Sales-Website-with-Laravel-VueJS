<form action="{{url('/test')}}" method="post" enctype="multipart/form-data">
@csrf

<input type="text" name="userId" placeholder="userId">
<input type="text" name="receiverId" placeholder="receiverId">
<input type="text" name="adId" placeholder="adId">
<input type="text" name="body" placeholder="body">
<input type="file" name="image0" >
<input type="file" name="image1" >
<input type="file" name="image2" >

<button>send</button>

</form>
<hr>
<hr>
@foreach(App\Models\Message::all() as $msg)

<div>
    <p>{{$msg->user_id}}</p>
    <p>{{$msg->receiver_id}}</p>
    <p>{{$msg->ad_id}}</p>
    <p>{{$msg->body}}</p>
    <img src="{{Storage::url($msg->image0)}}" alt="">
    <img src="{{Storage::url($msg->image1)}}" alt="">
    <img src="{{Storage::url($msg->image2)}}" alt="">

   
</div>
<hr>

@endforeach