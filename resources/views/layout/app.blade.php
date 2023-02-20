<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>@yield('title')</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="/css/navbar.css">
     <link href="css/main.css" rel="stylesheet">
     <script
     src="https://kit.fontawesome.com/975a2f75a4.js"
     crossorigin="anonymous"
   ></script>
     @yield('linkcss')
</head>
<body>
     
     <div class="d-flex flex-row container-fluid ">
          <div id="main_content">
               <div>
                    <div id="header_top" class="header_top">
                    <div class="container">
                         <div class="hleft">
                         <a href="" class="header-brand">
                         <i class="fa-brands fa-bandcamp brand-logo"></i>
                         </a>
                         <div class="dropdown">
                         <a href="" class="nav-link icon">
                              <i class="fa-solid fa-magnifying-glass"></i>
                         </a>
                         <a href="" class="nav-link icon">
                              <i class="fa-regular fa-calendar-days"></i>
                         </a>
                         <a href="" class="nav-link icon">
                              <i class="fa-regular fa-address-card"></i>
                         </a>
                         <a href="" class="nav-link icon">
                              <i class="fa-regular fa-comments"></i>
                         </a>
                         <a href="" class="nav-link icon">
                              <i class="fa-regular fa-folder"></i>
                         </a>
                         </div>
                         </div>
                         <div class="hright">
                         <div class="dropdown">
                         <span class="nav-link icon">
                              <i class="fa-sharp fa-solid fa-gear"></i>
                         </span>
                         <a href="" class="nav-link icon">
                              <i class="fa-regular fa-user"></i>
                         </a>
                         <a href="" class="nav-link icon">
                              <i class="fa-solid fa-bars"></i>
                         </a>
                         </div>
                         </div>
                    </div>
                    </div>
                    <div class="sidebar" id="left-sidebar">
                    <h5 class="brand-name">Epic Hr</h5>
                    <div class="hide-scrollbar">
                         <nav id="left-sidebar-nav" class="sidebar-nav">
                         <div class="">
                         <ul class="metismenu">
                              <li class="">
                              <span class="g_heading">Directories</span>
                              </li>
                              <li class="list-1">
                              <span class="">
                                   <a href="" class="list-a">
                                   <i class="fa-brands fa-space-awesome"></i> HRMS
                                   </a>
                              </span>
                              <ul class="collapse in">
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="/">Dashboard</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Users</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Department</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Employee</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Activities</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Holidays</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Events</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class="active"
                                   ><a class="list-c active" href="">Payroll</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Accounts</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Report</a></span
                                   >
                                   </li>
                              </ul>
                              </li>
                              <li class="list-1">
                              <span class="">
                                   <a href="" class="list-a"
                                   ><i class="fa-brands fa-buffer"></i>
                                   Project
                                   </a>
                              </span>
                              <ul class="collapse">
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Dashboard</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Project List</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Taskboard</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Ticket List</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Ticket Details</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Clients</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Todo List</a></span
                                   >
                                   </li>
                              </ul>
                              </li>
                              <li class="list-1">
                              <a href="">
                                   <i class="fa-sharp fa-solid fa-briefcase"></i>
                                   Job Dashboard
                              </a>
                              <ul class="collapse">
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Job Dashboard</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Positions</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Applicant</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class="active"
                                   ><a class="list-c active" href="" aria-current="page"
                                        >Resumes</a
                                   ></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Settings</a></span
                                   >
                                   </li>
                              </ul>
                              </li>
                              <li class="list-1">
                              <a
                                   ><i class="fa-solid fa-user-lock"></i>
                                   Authentication
                              </a>
                              <ul class="collapse">
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Login</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Register</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">Forgot Password</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">404 error</a></span
                                   >
                                   </li>
                                   <li class="">
                                   <span class=""
                                   ><a class="list-a" href="">500 Error</a></span
                                   >
                                   </li>
                              </ul>
                              </li>
                         </ul>
                         </div>
                         </nav>
                    </div>
                    </div>
               </div>
          </div>
          <div class="content container-fluid" style="margin-left : 28rem">
               @yield('content')
          </div>
     </div>

</body>

     @yield('linkjs')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>