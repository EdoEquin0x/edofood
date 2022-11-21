const search = () => {
    const searchbar = document.getElementById("searchbar").value.toUpperCase();
    const productitem = document.querySelectorAll(".product");
    const productname = document.getElementsByClassName("productname");

    for(var i=0; i < productname.length; i++) {
        let match = productitem[i].getElementsByClassName("productname")[0];
        if(match) {
            let textvalue = match.textContent || match.innerHTML

            if(textvalue.toUpperCase().indexOf(searchbar) > -1) {
                productitem[i].style.display = "";
            }
            else {
                productitem[i].style.display = "none";
                let match2 = productitem[i].getElementsByClassName("producttag")[0];
                let textvalue2 = match2.textContent || match2.innerHTML
                if(textvalue2.toUpperCase().indexOf(searchbar) > -1) {
                    productitem[i].style.display = "";
                }
            }
        }
    }


    


    
}

    
    





