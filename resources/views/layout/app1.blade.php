
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
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">     <link rel="stylesheet" href="/css/navbar.css">
     <link href="css/main.css" rel="stylesheet">
     <link href="css/admin_navbar.css" rel="stylesheet">
     <script
     src="https://kit.fontawesome.com/975a2f75a4.js"
     crossorigin="anonymous"
   ></script>

     @yield('linkcss')
</head>
<body>
     
     <div class="">
          <header id="header" class="header">
               <nav class="navbar_header">
                 <div class="navbar_logo_header">
                   <a href="index.html" class="link_logo_header_img">
                     <img
                       src="/img/logo-small.png"
                       alt="tlu_logo"
                       class="logo_header_img"
                     />
                   </a>
                   <div class="menu_sidebar">
                     <i class="fa-solid fa-bars"></i>
                   </div>
                 </div>
                 <div class="navbar_info_user_header">
                   <ul class="navbar_logo_user">
                     <li class="dropdown_user">
                       <a href="#" class="link_navbar_logo_user">
                         <img
                           src="img/no-profile-photo-small.png"
                           alt="user"
                           class="user_img"
                         />
                         <span class="name_user">Tên người dùng</span>
                         <i class="fa-solid fa-chevron-down"></i>
                       </a>
                       <ul class="dropdown_user_menu">
                         <li class="dropdown_user_item-1">
                           <a href="#" class="link_dropdown_user_item">
                             <img
                               src="img/no-profile-photo-small.png"
                               alt="user"
                               class="user_img"
                             />
                             <span class="update">Cập nhật ảnh</span>
                           </a>
                         </li>
                         <li class="dropdown_user_item">
                           <a href="">
                             <i class="fa-regular fa-user"></i>
                             <span class="dropdown_user_title">Thông tin tài khoản</span>
                           </a>
                         </li>
                         <li class="dropdown_user_item">
                           <a href="">
                             <i class="fa-solid fa-shield"></i>
                             <span class="dropdown_user_title">Đổi mật khẩu</span>
                           </a>
                         </li>
                         <li class="dropdown_user_item">
                           <a href="">
                             <i class="fa-solid fa-power-off"></i>
                             <span class="dropdown_user_title">Đóng phiên làm việc</span>
                           </a>
                         </li>
                       </ul>
                     </li>
                   </ul>
                 </div>
               </nav>
             </header>
             <div class="main">
               <div class="admin_navbar">
                  <ul>
                    <li class="admin_navbar_item">
                      <a href="">


                        <div class="img_container">
                          <img src="/image/navbar/Vector.png">
                        </div>
                        <p class="admin_navbar_item">Trang chủ</p>
                      </a>
                    </li>

                    <li class="admin_navbar_item">
                      <a href="">
                        <div class="img_container">
  
                          <img src="/image/navbar/Vector (1).png">
                        </div>
                        <p class="admin_navbar_item">Tài khoản</p>
                      </a>
                    </li>

                    <li class="admin_navbar_item">
                      <a href="">


                        <div class="img_container">
                          <img src="/image/navbar/Vector (2).png">
  
                        </div>
                        <p class="admin_navbar_item">Nhân viên</p>  
                    </a>
                    </li>

                    <li class="admin_navbar_item">
                      <a href="">
                        <div class="img_container">
                          <img src="/image/navbar/Vector (3).png">
                        </div>
                        <p class="admin_navbar_item">Hợp đồng lao động</p>
                      </a>
                    </li>                  
                  </ul>
               </div>
               <div class="main_content" >
              
                @yield('content')
              </div>
          </div>
          </div>
     </div>

</body>

     @yield('linkjs')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>