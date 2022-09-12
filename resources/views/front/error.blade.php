@if($errors->any())
<ul class="alert alert-danger list-unstyled" style="margin:-350px 0 0 600px !important; width: 250px !important;text-align: center !important;">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
