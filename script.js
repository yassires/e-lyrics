function edit(id){
    // document.getElementById("id").value=id
    document.getElementById("add").classList.remove("block");
    document.getElementById("delete").classList.remove("hidden");
    document.getElementById("update").classList.remove("hidden");
    document.getElementById("delete").classList.add("block");
    document.getElementById("update").classList.add("block");
    document.getElementById("add").classList.add("hidden");
    document.getElementById("more").classList.add("hidden");



    let title = document.getElementById(id).children[0].children[0].children[2].children[0].innerText
    let artist = document.getElementById(id).children[1].children[0].children[0].getAttribute('artist_name')
    let date = document.getElementById(id).children[2].children[0].children[0].innerText
    let album = document.getElementById(id).children[3].children[0].children[0].innerText
    let lyrics = document.getElementById(id).children[4].children[0].children[0].innerText
    let genre = document.getElementById(id).children[5].getAttribute('genre')
// console.log(artist);
    document.getElementById('title').value = title
    document.getElementById('artist').value = artist
    document.getElementById('date').value = date
    document.getElementById('album').value = album
    document.getElementById('lyrics').value = lyrics
    document.getElementById('id').value = id
    document.getElementById('genre').value = genre

    // document.getElementById("s_modal").reset(); 
    }


    function addbtn(){
        // alert('test');
        document.getElementById("delete").classList.add("hidden");
        document.getElementById("update").classList.add("hidden");
        document.getElementById("add").classList.add("block");
        document.getElementById("more").classList.add("block");
        document.getElementById("add").classList.remove("hidden");
        document.getElementById("delete").classList.remove("block");
        document.getElementById("update").classList.remove("block");
       
        document.getElementById("s_modal").reset(); 
        }



    // ----------------------------------artist-----------------------------------------
// ----------------------------------artist-----------------------------------------
// ----------------------------------artist-----------------------------------------
function edit_artist(id){
    // document.getElementById("id").value=id
    document.getElementById("add_artist").classList.remove("block");
    document.getElementById("delete_artist").classList.remove("hidden");
    document.getElementById("update_artist").classList.remove("hidden");
    document.getElementById("delete_artist").classList.add("block");
    document.getElementById("update_artist").classList.add("block");
    document.getElementById("add_artist").classList.add("hidden");
    document.getElementById("more_a").classList.add("hidden");


    // var test=document.getElementById(id).children
    var test=document.getElementById("artist_name").value=document.getElementById("name").getAttribute("name");
    document.getElementById("genre_artist").value=document.getElementById("artist_genre").getAttribute("artist_genre");
   

    console.log(test);
    document.getElementById("a_modal").reset(); 

}



function add_artist_btn(){
    // alert('test');
    document.getElementById("delete_artist").classList.add("hidden");
    document.getElementById("update_artist").classList.add("hidden");
    document.getElementById("add_artist").classList.add("block");
    document.getElementById("add_artist").classList.remove("hidden");
    document.getElementById("delete_artist").classList.remove("block");
    document.getElementById("update_artist").classList.remove("block");
    document.getElementById("more").classList.add("block");
   
    document.getElementById("a_modal").reset(); 
    }



//----------------------------search bar--------------------------- 
//----------------------------search bar---------------------------

function search() {
  let input = document.getElementById("myInput");
  let filter = input.value.toUpperCase();
  let table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (let i = 0; i < tr.length; i++) {
    let name = tr[i].getElementsByTagName("td")[0].children[0].children[2];
    if (name) {
      txtValue = name.textContent || name.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }

  }
}