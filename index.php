<?php
include_once "class/userController.class.php";
include_once "class/songController.class.php";
$controller = new userController;
$song = new songController;
session_start();
if (!isset($_SESSION['user'])) {
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>

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
      <?php
      if (isset($_SESSION["user"])) {
      ?>
        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-gray-300  md:mr-0 dark:text-white" type="button">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 mr-2 rounded-full" src="img.jpg" alt="user photo">
          <?php echo $_SESSION["user"]["name"]; ?>
          <i class="fa-solid fa-angle-down px-2"></i>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdownAvatarName" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
          <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <div class="font-medium "><?php echo $_SESSION["user"]["name"]; ?></div>
            <div class="truncate"><?php echo $_SESSION["user"]["email"]; ?></div>
          </div>
          <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
            <li>
              <a href="index.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
            </li>
          </ul>
          <div class="py-1">
            <a href="includes/logoutInc.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
          </div>
        </div>
      <?php
      }
      ?>
      <!-- <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon> -->
    </div>
  </div>
  <div class="flex justify-between items-center w-full mx-auto ">

    <div class="  bg-slate-600	 md:min-h-full md:w-full w-full flex justify-around px-5">
      <ul class="flex  md:items-center md:gap-[4vw] gap-10 text-white p-1.5">
        <li>
          <a class="hover:text-black" href="home.php">Home</a>
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
        <?php $res = $controller->getUsers();
        ?>

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
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
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

        <div class="p-5 pb-0 flex justify-end">
          <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="border-2 border-black p-3 hover:duration-300  hover:bg-black hover:text-white ml-auto">
            Add song
          </button>
        </div>


        <div div class=" mt-5 grid  lg:grid-cols-3  md:grid-cols-3 p-4 gap-3">

          <div class="col-span-2 flex flex-col   p-8 bg-white rounded shadow-sm">
            <b class="flex flex-row text-gray-500 text-3xl">Latest</b>

            <?php
            $sng = $song->getSongs();
            foreach ($sng as $s) { ?>
              <div class="grid p-4 gap-3">
                <div class="col-span-2 flex flex-auto items-center justify-between p-5 bg-white rounded">
                  <table class="min-w-full divide-y divide-gray-200 table-auto">
                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-16 w-16">
                              <img class="h-16 w-16" src="<?php echo $s["sng_img"] ?>" alt="" />
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900"><?php echo $s["title"]; ?></div>
                            </div>
                          </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                          <span>
                            <div class="text-sm text-gray-500"><?php echo $s["artist_name"]; ?></div>
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $s["genre"]; ?></td>
                      </tr>
                      <!-- More people... -->
                    </tbody>
                  </table>
                </div>
              </div>

            <?php
            } ?>

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
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                  </th>
                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Role
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($res as $r) { ?>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full" src="img.jpg" alt="">
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            <?php echo $r['name']; ?>
                          </div>

                        </div>
                      </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                      <span>
                        <div class="text-sm text-gray-500">
                          <?php echo $r['email']; ?>
                        </div>
                      </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                      Admin
                    </td>

                  </tr>


                <?php
                } ?>



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



  <!-- Modal toggle -->


  <!-- Main modal -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="px-6 py-6 lg:px-8">
          <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Song lyrics</h3>
          <form class="space-y-6" method="post" action="includes/handlers/songHandler.php">
            <div>
              <input type="file" name="img" id="img" class="border border-gray-300 text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="song name" required>
            </div>
            <div>
              <label for="title" class=" mb-2 text-sm font-medium text-white">title</label>
              <input type="text" name="title" id="title" class="border border-gray-300 text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="song name" required>
            </div>
            <div>
              <label for="title" class=" mb-2 text-sm font-medium text-white">Artist</label>
              <select name="artist" class="form-select" id="artist">
                <option value="">Please select</option>
                <option value="1">Artist 1</option>
                <option value="2">Artist 2</option>
                <option value="3">Artist 3</option>
                <option value="4">Artist 4</option>
              </select>
            </div>
            <div>
              <label for="title" class=" mb-2 text-sm font-medium text-white">Genre</label>
              <select name="genre" class="form-select" id="genre">
                <option value="">Please select</option>
                <option value="1">Genre 1</option>
                <option value="2">Genre 2</option>
                <option value="3">Genre 3</option>
                <option value="4">Genre 4</option>
              </select>
            </div>
            <div>
              <label for="title" class=" mb-2 text-sm font-medium text-white">Album</label>
              <input type="text" name="album" id="album" class="border border-gray-300 text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="song name" required>
            </div>
            <div>
              <label for="title" class=" mb-2 text-sm font-medium text-white">date</label>
              <input type="date" name="date" id="date" class="border border-gray-300 text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="song name" required>
            </div>
            <div>
              <label for="lyrics" class="mb-2 text-sm font-medium  text-white">Lyrics</label>
              <textarea type="text" name="lyrics" id="lyrics" placeholder="Something" class=" border border-gray-300 text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " required></textarea>
            </div>
            <div class="flex justify-end px-2">
              <button type="submit" name="add" class="w-25% border border-white text-white font-medium  text-sm px-5 py-2.5 text-center  hover:text-black hover:bg-white hover:duration-300">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>