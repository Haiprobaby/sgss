Name : {{$data['name']}}<br>
Gender : {{$data['sex']}}<br>
Phone : {{$data['phone']}}<br>
Email : {{$data['email']}}<br>
Message : {{$data['message']}}<br>

Curriculum Vitae:
<img src="{{$message->embed(asset('public/tmp_image/'.$data['cv']))}}">