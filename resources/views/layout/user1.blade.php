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
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">     <link rel="stylesheet" href="/css/navbar.css">
     <link href="css/main.css" rel="stylesheet">
     {{-- <link rel="stylesheet" href="/css/hdld/hdld.css"> --}}
     <script
     src="https://kit.fontawesome.com/975a2f75a4.js"
     crossorigin="anonymous"

   ></script>

   @yield('linkcss')

</head>
<body>
     
     <div class="" action="" method="post">
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
                           src="/img/no-profile-photo-small.png"
                           alt="user"
                           class="user_img"
                         />
                         {{-- <span class="name_user">1</span> --}}
                         <span class="name_user">{{$user->TenNV}}</span>
                         <i class="fa-solid fa-chevron-down"></i>
                       </a>
                       <ul class="dropdown_user_menu">
                         <li class="dropdown_user_item-1">
                           <a href="#" class="link_dropdown_user_item">
                             <img
                               src="/img/no-profile-photo-small.png"
                               alt="user"
                               class="user_img"
                             />
                             <span class="update">Cập nhật ảnh</span>
                           </a>
                         </li>
                         <li class="dropdown_user_item">
                           <a href="{{route('showInfoUser')}}">
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
                         <li id="logout-btn" class="dropdown_user_item">
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
               <div class="main_navbar">
                 <ul class="dropdown_main_menu">
                   <li class="dropdown_main_menu_item">
                     <a href="{{route('getHomepage')}}" class="link_dropdown_main_menu">
                       <i class="fa-solid fa-house"></i>
                       <span>Trang chủ</span>
                     </a>
                   </li>
                   <li class="dropdown_main_menu_item">
                     <a href="{{route('showInfoUser')}}" class="link_dropdown_main_menu">
                       <i class="fa-regular fa-address-card"></i>
                       <span>Thông tin cá nhân</span>
                     </a>
                   </li>
                   <li class="dropdown_main_menu_item">
                     <a href="{{route('showContractUser')}}" class="link_dropdown_main_menu">
                      <i class="bi bi-file-earmark-fill"></i>
                       <span>Hợp đồng lao động</span>
                     </a>
                   </li>
                   <li class="dropdown_main_menu_item">
                     <a href="{{route('showInsuranceUser')}}" class="link_dropdown_main_menu">
                      <i class="bi bi-shield-fill-plus"></i>
                       <span>Bảo hiểm xã hội</span>
                     </a>
                   </li>
                   <li class="dropdown_main_menu_item">
                     <a href="{{route('showLeaveUser')}}" class="link_dropdown_main_menu">
                      <i class="bi bi-calendar2-plus-fill"></i>
                       <span>Nghỉ phép</span>
                     </a>
                   </li>
                   <li class="dropdown_main_menu_item dropdown_sub_menu">
                     <a href="{{route('showEvaluateUser')}}" class="link_dropdown_main_menu">
                        <i class="bi bi-clipboard-data-fill"></i>
                       <span>Đánh giá</span>
                     </a>
                   </li>

                   <li class="dropdown_main_menu_item dropdown_sub_menu">
                    <a href="{{route('showSalaryUser')}}" class="link_dropdown_main_menu">
                       <i class="bi bi-wallet-fill"></i>
                      <span>Lương</span>
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

<script>

  
const exitBTN = document.getElementById('logout-btn')
        exitBTN.addEventListener('click',(e)=>{
          e.preventDefault();
            Swal.fire({
                title: 'Bạn có muốn đăng xuất ?',
                showCancelButton: true,
                confirmButtonText: 'Có',
                cancelButtonText: 'Không',
                icon: 'question',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'http://127.0.0.1:8000/logout';
                }
            })
        })

</script>
@yield('linkjs')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>