@if($errors->any())
<ul class="alert alert-danger list-unstyled" style="position: relative;top:1530px;left: 380px !important;text-align: center !important;width: 250px;">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
