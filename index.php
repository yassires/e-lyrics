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

      <div class="flex-auto">
      <div class="flex flex-col">
        <div class="bg-blue-50 min-h-screen">
        <div class="p-4 pt-28 pb-0  pl-10 font-bold text-gray-600">Statistics</div>
          <div class=" mt-8 grid lg:grid-cols-3 sm:grid-cols-2 p-4 gap-10 ">
            <!--Grid starts here-->
            <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
              <div>
                <div class="text-sm text-gray-400 ">Numbers of users</div>
                <div class="flex items-center pt-1">
                  <div class="text-3xl font-medium text-gray-600 ">34</div>
                </div>
              </div>
              <div class="text-gray-500 text-4xl">
                <i class="fa-solid fa-user"></i>
              </div>
            </div>

            <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
              <div>
                <div class="text-sm text-gray-400 ">Check Out Today</div>
                <div class="flex items-center pt-1">
                  <div class="text-3xl font-medium text-gray-600 ">44</div>
                </div>
              </div>
              <div class="text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                    clip-rule="evenodd" />
                </svg>
              </div>
            </div>

            <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
              <div>
                <div class="text-sm text-gray-400 ">Total Songs</div>
                <div class="flex items-center pt-1">
                  <div class="text-3xl font-medium text-gray-600 ">10</div>
                </div>
              </div>
              <div class="text-gray-500 text-4xl">
              <i class="fa-solid fa-compact-disc"></i>
              </div>
            </div>

            <!-- Grid ends here..-->

          </div>


          <div div class=" mt-5 grid  lg:grid-cols-3  md:grid-cols-3 p-4 gap-3">

            <div class="col-span-2 flex flex-col   p-8 bg-white rounded shadow-sm">
              <b class="flex flex-row text-gray-500 text-3xl">Latest</b>

            </div>

            <div class=" flex flex-col   p-5 bg-white rounded shadow-sm">
              <b class="flex flex-row text-gray-500 text-3xl">Artists</b>

            </div>



          </div>
          <!--Table-->
          <div class="p-4 pl-10 font-bold text-gray-600">Users</div>
          <div class="grid  lg:grid-cols-1  md:grid-cols-1 p-4 gap-3">
            <div class="col-span-2 flex flex-auto items-center justify-between  p-5 bg-white rounded shadow-sm">
              <table class="min-w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Name
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Email
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Status
                    </th>
                    <th scope="col"
                      class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Role
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full"
                            src="img.jpg"
                            alt="">
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            YSR
                          </div>
                          
                        </div>
                      </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <span>
                        <div class="text-sm text-gray-500">
                            yassir@example.com
                        </div>
                      </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      Admin
                    </td>
                    
                  </tr>
                 

                  <!-- More people... -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
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