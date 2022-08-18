<!-- input tag -->
    <input id="searchbar" onkeyup="search_brand()" type="text" name="search" placeholder="Search Brands.."> 
      
    <!-- ordered list -->
    <ol> 
            <li class="brands"><a href="#otg">On The Go</a></li>
            <li class="brands"><a href="wholesomeharvest">Wholesome Harvest</a></li>
            <li class="brands"><a href="#wholesomeearth">Wholesome Earth</a></li>
            <li class="brands"><a href="#simplydelish">Simply Delish</a></li>
            <li class="brands"><a href="#naturespath">Natures Path</a></li>
            <li class="brands"><a href="#saladtops">Salad Tops</a></li>
            <li class="brands"><a href="#souptops">Soup Tops</a></li>
            <li class="brands"><a href="#Molinoicoli">Molinoicoli</a></li>
            <li class="brands"><a href="#hydraoil">Hydra-Oil</a></li>
            <li class="brands"><a href="#voortman">Voortman</a></li>
    </ol> 
<script>
function search_brand() { 
    let input = document.getElementById('searchbar').value; 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('brands'); 
        
    for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
            x[i].style.display="list-item";                  
        } 
    } 
} 
</script>