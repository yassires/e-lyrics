<?php
include_once "class/userController.class.php";
include_once "class/songController.class.php";
include_once "class/artistController.class.php";
$controller = new userController;
$song = new songController;
$artist = new artistController;
$song_count = new songController;
$user_count = new songController;
$artist_count = new songController;
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>

  <title>E-Lyrics</title>
</head>

<body class="font-[Poppins]  h-screen ">
  <header class="bg-black">
    <nav class="flex justify-between items-center p-2">
      <div class="font-bold text-white sm:text-xs">
        E-Lyrics
      </div>
      <div class=" text-white">
        <ul class="flex">
          <li>
            <a class="hover:text-gray-500" href="home.php">Home</a>
          </li>
          |
          <li>
            <a class="hover:text-gray-500" href="#">Latest</a>
          </li>
          |
          <li>
            <a class="hover:text-gray-500" href="#">Artists</a>
          </li>
        </ul>
      </div>
      <div class="flex  text-white">
        <?php
        if (isset($_SESSION["user"])) {
        ?>
          <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 mr-2 rounded-full" src="img.jpg" alt="user photo" />
            <div class="text-white">
              <?php echo $_SESSION["user"]["name"]; ?>
              <i class="fa-solid fa-angle-down px-2"></i>
            </div>


          </button>

          <!-- Dropdown menu -->
          <div id="dropdownAvatarName" class="text-white z-10 hidden divide-y divide-gray-100 rounded shadow w-44 bg-gray-700 divide-gray-600">
            <div class="px-4 py-3 text-sm text-white">
              <div class="font-medium"><?php echo $_SESSION["user"]["name"]; ?></div>
              <div class="truncate"><?php echo $_SESSION["user"]["email"]; ?></div>
            </div>
            <ul class="py-1 text-sm " aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
              <li>
                <a href="index.php" class="block px-4 py-2 hover:bg-gray-100  hover:text-black">Dashboard</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100  dark:hover:text-black">Settings</a>
              </li>
            </ul>
            <div class="py-1">
              <a href="includes/logoutInc.php" class="block px-4 py-2 text-sm text-white hover:bg-gray-100  dark:hover:text-black">Sign out</a>
            </div>
          </div>
        <?php
        } else {
        ?>
          <a href="login.php" class="text-white hover:text-gray-300">SIGN IN</a>
        <?php
        }
        ?>
      </div>
    </nav>
  </header>



  <div class="flex flex-col">
    <div class="bg-blue-50 min-h-screen">
      <div class="p-4 pt-28 pb-0  pl-10 font-bold text-gray-600">Statistics</div>
      <?php $res = $controller->getUsers();
      $s_count = $song_count->song_count();
      $u_count = $user_count->users_count();
      $a_count = $artist_count->artist_count();
      ?>

      <div class=" mt-8 grid lg:grid-cols-3 sm:grid-cols-2 p-4 gap-10 ">
        <!--Grid starts here-->
        <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
          <div>
            <div class="text-sm text-gray-400 ">Numbers of users</div>
            <div class="flex items-center pt-1">
              <div class="text-3xl font-medium text-gray-600 "><?php echo $u_count ?></div>
            </div>
          </div>
          <div class="text-gray-500 text-4xl">
            <i class="fa-solid fa-user"></i>
          </div>
        </div>

        <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
          <div>
            <div class="text-sm text-gray-400 ">Total Artists</div>
            <div class="flex items-center pt-1">
              <div class="text-3xl font-medium text-gray-600 "><?php echo $a_count ?></div>
            </div>
          </div>
          <div class="text-gray-500">
            <i class="fa-regular fa-user-music"></i>
          </div>
        </div>

        <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
          <div>
            <div class="text-sm text-gray-400 ">Total Songs</div>
            <div class="flex items-center pt-1">
              <div class="text-3xl font-medium text-gray-600 "><?php echo $s_count ?></div>
            </div>
          </div>
          <div class="text-gray-500 text-4xl">
            <i class="fa-solid fa-compact-disc"></i>
          </div>
        </div>

        <!-- Grid ends here..-->

      </div>
      <div class="flex justify-end mb-4">
        <div class="p-5 pb-0 " onclick="addbtn()">
          <button data-modal-target="song-modal" data-modal-toggle="song-modal" type="submit" class="border-2 border-black p-3 hover:duration-300  hover:bg-black hover:text-white ml-auto">
            Add Song
          </button>
        </div>
        <div class="p-5 pb-0 " onclick=" add_artist_btn()">
          <button data-modal-target="artist-modal" data-modal-toggle="artist-modal" type="submit" class="border-2 border-black p-3 hover:duration-300  hover:bg-black hover:text-white ml-auto">
            Add Artist
          </button>
        </div>
      </div>



      <div class="sm:block sm:mb-10 md:flex p-1  md:p-4 gap-3 ">

        <div class="sm:p-1  md:p-5 bg-white rounded shadow-sm  w-full">
          <b class=" text-gray-500 text-3xl">Latest</b>
          <div class="flex justify-end">
            <form action="get" class="bg-white border border-black">
              <input type="text" class="px-1 border border-none" placeholder="Search Song & Artist" id="myInput" onkeyup="search()">
              <i class="fa-solid fa-magnifying-glass px-1"></i>
            </form>
          </div>


          <div class="md:grid-cols-1  lg:grid-cols-2 overflow-x-scroll">
            <div class="rounded ">
              <table id="table" class="w-100" style="width: 100%;">
                <tbody class="divide-y divide-gray-200 ">
                  <?php
                  $sng = $song->getSongs();
                  foreach ($sng as $s) { ?>
                    <tr id="<?php echo $s["idSong"] ?>">
                      <td class="px-2 py-4 ">
                        <div class="flex items-center">
                          <div class="text-black hidden" id="index">
                            <?php echo $s["idSong"] ?>
                          </div>
                          <div class="flex-shrink-0 h-16 w-16">
                            <img class="h-16 w-16" src="<?php echo $s["sng_img"] ?>" alt="" />
                          </div>
                          <div class="ml-2">
                            <div class="text-sm font-medium text-gray-900 title" data-title="<?php echo $s["title"] ?>" id="song_title"> <?php echo $s["title"]; ?></div>
                          </div>
                        </div>
                      </td>

                      <td class="px-6 py-4 whitespace-nowrap">
                        <span>
                          <div class="text-sm text-gray-500" artist_name=<?php echo $s["idArtist"]; ?> id="song_artist"> <?php echo $s["name"]; ?></div>
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap hidden">
                        <span>
                          <div class="text-sm text-gray-500" release_date=<?php echo $s["date"]; ?> id="song_release"><?php echo $s["date"]; ?></div>
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <span>
                          <div class="text-sm text-gray-500" album=<?php echo $s["album"]; ?> id="song_album"><?php echo $s["album"]; ?></div>
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap hidden">
                        <span>
                          <div class="text-sm text-gray-500" lyrics=<?php echo $s["lyrics"]; ?> id="song_lyrics"> <?php echo $s["lyrics"]; ?></div>
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" genre=<?php echo $s["genre_id"]; ?> id="song_genre"> <?php echo $s["g_name"]; ?></td>
                      <td>
                        <button data-modal-target="song-modal" data-modal-toggle="song-modal" type="button" onclick="edit(<?php echo $s['idSong'] ?>)">
                          <i class="fa-solid fa-pen-to-square text-gray-500"></i>
                        </button>
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

        <div class="p-5 bg-white rounded shadow-sm md:grid-cols-1 lg:grid-cols-1 w-100">
          <b class="flex flex-row text-gray-500 text-3xl">Artists</b>
          <?php
          $art = $artist->getArtists();
          foreach ($art as $a) { ?>
            <div class="">
              <div class=" flex flex-auto items-center justify-between bg-white rounded">
                <table class="min-w-full divide-y divide-gray-200 table-auto">
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                      <td class="sm:pr-2 sm: pt-2 md:px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 h-12 w-12">
                            <img class="h-12 w-12 rounded-full" src="<?php echo $a["artist_img"] ?>" alt="" />
                          </div>
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900" name=<?php echo $a["id"] ?>> <?php echo $a["name"] ?></div>
                          </div>
                        </div>
                      </td>

                      <td class="sm:px-1 md:px-6 py-4 whitespace-nowrap">
                        <span>
                          <div class="text-sm text-gray-500" artist_genre=<?php echo $a["genre"] ?>> <?php echo $a["genre"] ?></div>
                        </span>
                      </td>
                    </tr>
                    <!-- More people... -->
                  </tbody>
                </table>
                <div>
                  <button data-modal-target="artist-modal" data-modal-toggle="artist-modal" type="button" onclick="edit_artist(id)">
                    <i class="fa-solid fa-pen-to-square text-gray-500"></i>
                  </button>
                </div>
              </div>
            </div>

          <?php
          } ?>
        </div>



      </div>
      <!--Table-->
      <div class="p-4 pl-10 font-bold text-gray-600">Users</div>
      <div class="grid  lg:grid-cols-1  md:grid-cols-1 p-4 gap-3 overflow-x-scroll">
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


  <!-- <script>
      const navLinks = document.querySelector(".nav-links");
      function onToggleMenu(e) {
        e.name = e.name === "menu" ? "close" : "menu";
        navLinks.classList.toggle("top-[5%]");
      }
    </script> -->



  <!-- Modal toggle -->


  <!-- song modal -->
  <div id="song-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
      <!-- Modal content -->
      <div class="rounded-lg shadow bg-gray-700">
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="px-6 py-1 lg:px-8">
          <h3 class="mb-4 text-xl font-medium text-white">Add Song lyrics</h3>
          <div class="model-body">
            <form class="space-y-3" id="s_modal" method="post" action="includes/handlers/songHandler.php">
              <div class="copy">
                <div>
                  <input type="hidden" id="id" name="id" value="">
                  <input type="file" name="img[]" id="img" class="border border-gray-300 text-white rounded-lg w-full bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="song name" required>
                </div>
                <div>
                  <label for="title" class=" mb-2 text-sm font-medium text-white">title</label>
                  <input type="text" name="title[]" id="title" class="border border-gray-300 text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="song name" required>
                </div>
                <div>
                  <select name="artist[]" class="form-select mb-2 bg-gray-500 p-1 text-white" id="artist">
                    <option value="">Please select Artist</option>
                    <?php $art = $artist->getArtists();
                    foreach ($art as $a) { ?>
                      <option value="<?php echo $a['id'] ?>"><?php echo $a['name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div>
                  <select name="genre[]" class="form-select mb-2 bg-gray-500 p-1 text-white" id="genre">
                    <option selected>Please select Genre</option>
                    <?php $genres = $artist->getGenre();
                    foreach ($genres as $g) { ?>
                      <option value="<?php echo $g['id'] ?>"><?php echo $g['name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div>
                  <label for="title" class=" mb-2 text-sm font-medium text-white">Album</label>
                  <input type="text" name="album[]" id="album" class="border border-gray-300 text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="song name" required>
                </div>
                <div>
                  <label for="title" class=" mb-2 text-sm font-medium text-white">date</label>
                  <input type="date" name="date" id="date" class="border border-gray-300 text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="song name" required>
                </div>
                <div>
                  <label for="lyrics" class="mb-2 text-sm font-medium  text-white">Lyrics</label>
                  <textarea type="text" name="lyrics[]" id="lyrics" placeholder="Something" class=" border border-gray-300 text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " required></textarea>
                </div>
              </div>

          
          <div class="another-modal">

          </div>
          </div>

          <div class="flex justify-end ">
            <div class="px-2">
              <button type="submit" name="add" id="add" class="w-25% border border-white text-white font-medium  text-sm px-5 py-2.5 text-center  hover:text-black hover:bg-white hover:duration-300">Add</button>
            </div>
            <div class="px-2">
              <button type="button" name="more" id="more" class="w-25% border border-yellow-300 text-white font-medium  text-sm px-5 py-2.5 text-center hover:text-black   hover:bg-yellow-400 hover:duration-300">Add More</button>
            </div>
            <div class="px-2">
              <button type="submit" name="delete" id="delete" class="w-25% border border-red-400  text-white font-medium  text-sm px-5 py-2.5 text-center  hover:bg-red-400 hover:duration-300">Delete</button>
            </div>
            <div class="px-2">
              <button type="submit" name="update" id="update" class="w-25% border border-yellow-300 text-white font-medium  text-sm px-5 py-2.5 text-center hover:text-black   hover:bg-yellow-400 hover:duration-300">Update</button>
            </div>
          </div>


          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- artist modal -->
  <div id="artist-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
      <!-- Modal content -->
      <div class=" rounded-lg shadow bg-gray-700">
        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="px-6 py-6 lg:px-8">
          <h3 class="mb-4 text-xl font-medium  text-white">Add Artist</h3>
          <form class="space-y-6" id="a_modal" method="post" action="includes/handlers/artistHandler.php">
            <div>
              <input type="file" name="img" id="img" class="border border-gray-300 text-white text-sm rounded-lg w-full bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="song name" required>
            </div>
            <div>
              <label for="title" class=" mb-2 text-sm font-medium text-white">Name</label>
              <input type="text" name="name" id="name" class="border border-gray-300 text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="song name" required>
            </div>
            <div>
              <label for="title" class=" mb-2 text-sm font-medium text-white">Genre</label>
              <input type="text" name="genre" id="genre" class="border border-gray-300 text-white text-sm rounded-lg w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 " placeholder="song name" required>
            </div>
            <div class="flex justify-end px-2">
              <div>
                <button type="submit" name="add" id="add_artist" class="w-25% border border-white text-white font-medium  text-sm px-5 py-2.5 text-center  hover:text-black hover:bg-white hover:duration-300">Add</button>
              </div>
              <div class="px-2">
                <button type="button" name="more" id="more_a" class="w-25% border border-yellow-300 text-white font-medium  text-sm px-5 py-2.5 text-center hover:text-black   hover:bg-yellow-400 hover:duration-300">Add More</button>
              </div>
              <div class="px-2">
                <button type="submit" name="delete" id="delete_artist" class="w-25% border border-red-400  text-white font-medium  text-sm px-5 py-2.5 text-center  hover:bg-red-400 hover:duration-300">Delete</button>
              </div>
              <div class="flex justify-end px-2">
                <button type="submit" name="update" id="update_artist" class="w-25% border border-yellow-300 text-white font-medium  text-sm px-5 py-2.5 text-center hover:text-black   hover:bg-yellow-400 hover:duration-300">Update</button>
              </div>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="main.js"></script>

</body>

</html>