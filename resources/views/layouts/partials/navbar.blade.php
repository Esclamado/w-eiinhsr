@auth
<header class="p-3 bg-dark text-white">
  <div class="container" style="max-width: 1340px;">
   
    <div class="row">
      <div class="col-9">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <h2 style="font-style: Italic; margin-left: 15px; font-family: cursive;">W - EIINHSR</h2>
          <!-- <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="margin-left: 100px;">
            <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Grades</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Student</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Faculty</a></li>
          </ul> -->

          <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
            <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
          </form> -->

          <!-- @guest
            <div class="text-end">
              <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
              <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
            </div>
          @endguest -->
        </div>
        <span style="font-style: Italic; margin-left: 15px; font-family: cursive;">Registrar System</span>
      </div>
      
      <div class="col-3">
        <div class="d-flex flex-wrap align-items-center" style="justify-content: space-around;">
          @if(auth()->user()->user_access !== "3")
          <div class="d-flex" style="align-items: center;">
            <div class="mr-2" style="background-color: #8d8d8d; height: 30px; width: 30px; padding: 5px;border-radius: 15px;">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512">
                  <path fill="#ffffff" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                </svg>
              </div>
            </div>
            <div>
              {{ucwords(auth()->user()->name)}}
            </div>
          </div>
          @endif

          @if(auth()->user()->user_access === "3")
          <div class="d-flex" style="align-items: center;">
            <div class="mr-2" style="background-color: #8d8d8d; height: 30px; width: 30px; padding: 5px;border-radius: 15px;">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512">
                  <path fill="#ffffff" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                </svg>
              </div>
            </div>
            <div class="btn-group" style="cursor: pointer">
              <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ucwords(auth()->user()->name)}}
              </div>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('student.change_password', auth()->user()->student_id) }}">Change Password</a>
              </div>
            </div>
          </div>
          @endif

          <div class="text-end" style="">
            <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</header>
@endauth