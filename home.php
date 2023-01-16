<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>E-Lyrics</title>
</head>
<body class="font-[Poppins] bg-gradient-to-t from-gray-500 to-white h-screen">
        <div class="bg-black p-3 flex justify-between items-center">
            <div class="">
                <form action="get" class="bg-white">
                    <input type="text" class="px-1" placeholder="Search Song & Artist">      
                    <i class="fa-solid fa-magnifying-glass px-1"></i>   
                </form>
            </div>
            <h5 class="font-bold text-white pr-32">E-Lyrics</h5>
            <div class="flex items-center gap-6">
            <a href="login.php" class=" text-white hover:text-gray-300">ADMIN</a>
            <!-- <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon> -->
            </div>
        </div>
      <div class="flex justify-between items-center w-full mx-auto ">
        
        <div class="  bg-slate-600	 md:min-h-full md:w-full w-full flex justify-around px-5">
          <ul class="flex  md:items-center md:gap-[4vw] gap-10 text-white p-1.5">
            <li>
              <a class="hover:text-black" href="#">Home</a>
            </li>
            |
            <li>
              <a class="hover:text-black" href="#">Latest</a>
            </li>
            |
            <li>
              <a class="hover:text-black" href="#">Artists</a>
            </li>
          </ul>
        </div>
        
      </div>

      

    <!-- <script>
      const navLinks = document.querySelector(".nav-links");
      function onToggleMenu(e) {
        e.name = e.name === "menu" ? "close" : "menu";
        navLinks.classList.toggle("top-[5%]");
      }
    </script> -->
  </body>
</html>