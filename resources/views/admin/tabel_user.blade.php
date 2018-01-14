<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="{{ asset('css/material-icon.css') }}" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style>
      input[type=number]::-webkit-inner-spin-button, 
      input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
      }
    </style>


  </head>
  <body>
    <!--Import jQuery before materialize.js-->


   <script type="text/javascript" src="{{ asset('jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
    <div class="col s12">
        <script type="text/javascript">
          $(document).ready(
            function(){
              $(".button-collapse").sideNav();
              $(".dropdown-button").dropdown();
              
            }
          );
        </script>
      
      <!--navbar-->
        @include('layouts.admin_navbar')
      <!--navbar-->
      <!--Tabel User-->
      <div class="container">
        <div class="row">
          <div class="col s12 l12">
            <table class="highlight centered responsive">
              <thead>
                <tr>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Delete</th>
                </tr>
              </thead>

              <tbody>
                <!--User in List-->
                @foreach($data as $index=>$users)
                <tr>
                  <td>{{$users->nrp}}</td>
                  <td>{{$users->name}}</td>
                  <td>{{$users->email}}</td>
                  <td> <a class="waves-effect waves-light btn-large" href="{{route('admin.deleteUser', $users->nrp)}}"><i class="material-icons">delete</i></a></td>
                </tr>
                  @endforeach
                <!--User in List-->
              </tbody>
            </table>
          </div>
        </div>
        
        <!--Tabel User-->
        
      </div>
    </div>
      <br>
      <br>
      <br>
      @include('layouts.admin_footer')
  </body>
</html>