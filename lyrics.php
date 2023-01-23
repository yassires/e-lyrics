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
    <title>E-Lyrics</title>
</head>

<body class="font-[Poppins] bg-gradient-to-t from-gray-500 to-white h-screen">
    <header class="bg-black">
        <nav class="flex justify-between items-center w-[90%] mx-auto">
            <div>
                <h5 class="font-bold text-white pr-32">E-Lyrics</h5>
            </div>
            <div class="nav-links text-white md:w-auto w-full flex items-center p-3">
                <ul class="flex pr-32 md:gap-[10%]">
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
            <div class="flex items-center gap-6">
                <?php
                if (isset($_SESSION["user"])) {
                ?>
                    <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 mr-2 rounded-full" src="img.jpg" alt="user photo" />
                        <?php echo $_SESSION["user"]["name"]; ?>
                        <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownAvatarName" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div class="font-medium"><?php echo $_SESSION["user"]["name"]; ?></div>
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
                    <!-- <div class="flex justify-center  pt-28 ">
            <b class="flex flex-row text-gray-500 text-3xl">Welcome to the world of the music</b>
        </div> -->

                    <div div class=" mt-5 grid  lg:grid-cols-3  md:grid-cols-3 p-4 gap-3">

                        <div class="col-span-2 flex flex-col   p-8 bg-white rounded shadow-sm">
                            <b class="flex flex-row text-gray-500 text-3xl">Latest</b>

                            <?php
                            $sng = $song->getSongs();
                            foreach ($sng as $s) { ?>
                                <div class="grid p-4 gap-3">
                                    <div class="col-span-2 flex flex-auto items-center justify-between bg-white rounded">
                                        <table class="min-w-full divide-y divide-gray-200 table-auto">
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-16 w-16">
                                                                <img class="h-16 w-16" src="<?php echo $s["sng_img"] ?>" alt="" />
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900"><?php echo $s["title"]; ?> <?php echo $s["id"]; ?></div>
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