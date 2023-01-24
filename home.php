<?php
include_once "class/userController.class.php";
include_once "class/songController.class.php";
include_once "class/artistController.class.php";
$controller = new userController;
$song = new songController;
$artist = new artistController;
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
    <script src="script.js"></script>
    <title>E-Lyrics</title>
</head>

<body class="font-[Poppins] bg-gradient-to-t from-gray-500 to-white h-screen">
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
    <section>
        <div class="flex-auto">
            <div class="flex flex-col">
                <div class="bg-blue-50 min-h-screen">
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
                                <div class="rounded">
                                    <table id="table" style="width: 100%;">
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

                    <div class="sm:block sm:mb-10 md:flex p-1  md:p-4 gap-3 ">
                        <div class="p-5 bg-white rounded shadow-sm  w-full">
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

                                    </div>
                                </div>

                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
                <!--Table-->
            </div>
            <!--Table-->
        </div>
        </div>
        </div>
    </section>



</body>

</html>