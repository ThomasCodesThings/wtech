window.onload = function(){ 
    
    /*Navbar JS */
    document.getElementById("menu").onclick = function(){
        document.getElementById("dropdown_category").style.display = "block";
    };
    
    document.getElementById("dropdown_category").onmouseleave = function(){
        document.getElementById("dropdown_category").style.display = "none";
    };
/*s
    document.getElementById("wrapper").innerHTML = document.getElementById("specifics").innerHTML;

    document.getElementById("reviews_button").onclick = function(){
        document.getElementById("wrapper").innerHTML = document.getElementById("review_box").innerHTML;
    };

    document.getElementById("specifications_button").onclick = function(){
        document.getElementById("wrapper").innerHTML = document.getElementById("specifics").innerHTML;
    }*/


    document.getElementById("priceFromRange").oninput = function(){
        document.getElementById("priceFrom").value = this.value;
    }

    document.getElementById("priceToRange").oninput = function(){
        document.getElementById("priceTo").value = this.value;
    }


   
/*  
    document.getElementById("a_subcategory").onmouseleave = function(){
        if(logged1){
            document.getElementById("dropdown_category").onmouseenter = function(){
                document.getElementById("dropdown_subcategory").style.display = "none";
                logged1 = false;
            };
            
        }
    };*/


    /*
   

   
    document.getElementById("dropdown_subcategory").onmouseleave = function(){
        document.getElementById("dropdown_subcategory").style.display = "none";
    };
    */
    
    //document.getElementById("wrapper").innerHTML = document.getElementById("review_box").innerHTML;
    function mouseOver(id1, id2){
        document.getElementById(id1).onmouseover = function(){
                document.getElementById(id2).style.display = "block"
        };
        document.getElementById(id2).onmouseout = function(){
            document.getElementById(id2).style.display = "none"
        };

    };

    function click(id1, id2){
        var clicked = false
        document.getElementById(id1).onclick = function(){
            if(!clicked){
                document.getElementById(id2).style.display = "block"
                clicked = true
            }else{
                document.getElementById(id2).style.display = "none"
                clicked = false
            }
        };
    };

    
    function productBox(){
        reviewsChecked = false;
        specifications_checked = false;
        document.getElementById("reviews_button").onclick = function(){
            document.getElementById("wrapper").innerHTML = document.getElementById("review_box").innerHTML;
            //document.getElementById("review_box").style.display = "block"
            //document.getElementById("specifics").style.display = "none";
        };
        document.getElementById("specifications_button").onclick = function(){ 
            document.getElementById("wrapper").innerHTML = document.getElementById("specifics").innerHTML;
            //document.getElementById("wrapper").style.display = "block";
            //document.getElementById("specifics").style.display = "block";
            //document.getElementById("review_box").style.display = "none";
        };
        
        document.getElementById("add_review_button").onclick = function(){
            document.getElementById("wrapper").innerHTML = document.getElementById("add_review").innerHTML;
            //document.getElementById("review_box").style.display = "block"
            //document.getElementById("specifics").style.display = "none";
        };

        document.getElementById("submit_review_button").onclick = function(){
            //document.getElementById("wrapper").innerHTML = document.getElementById("add_review").innerHTML;
            alert("Your review has been submitted!");
        };

        document.getElementById("review_back_button").onclick = function(){
            document.getElementById("wrapper").innerHTML = document.getElementById("add_review").innerHTML;
        };
    };

    //productBox();
    //click("menu", "dropdown_category");
    //click("a_subcategory", "dropdown_subcategory");
    //click("a_subcategory2", "dropdown_subcategory2");
    
};




