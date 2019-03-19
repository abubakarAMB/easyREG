 $(document).ready(function(){
 $('.animationload').delay(500).fadeOut('slow');
    
    
    $(".main-footer").css("height","36px","!important");
    $(".content-wrapper").css("z-index","0","!important");
    $(".main-sidebar").css("z-index","0","!important");

    
        var url= localStorage.getItem('url123');
        //localStorage.removeItem('url123');
        //alert(url)
        $('.sidebar ul li').each(function (i) {
            var listIDs = $(this).find('a').attr('href');           
            if (listIDs==url && listIDs!="#") { 
                $(this).find('a').parents('li').addClass("active");
                
    $(".main-footer").css("height","36px","!important");
    $(".content-wrapper").css("z-index","0","!important");
    $(".main-sidebar").css("z-index","0","!important");
            }
        });         
        //$('.sidebar-menu li a').click(function(){
        $('li a').click(function(){         
            var curl=$(this).attr("href");
            localStorage.setItem("url123", curl);
        });     
        
        
        $("#nil").click(function(){ 
            var n= $(".navbar-header").css("margin-left");          
            if(n=="-230px")
            {    //  alert(n);
                $(".navbar-header").css("margin-left","-50px");
            }
            if(n=="-50px")
            { //alert(n);
                $(".navbar-header").css("margin-left","-230px");
            }
        });

        setInterval(function(){
            $(".dropdown notifications-menu").load(location.href+" #menu_notification>*","");
            $("#income_div").load(location.href+" #income_div>*","");
            $("#preorder_div").load(location.href+" #preorder_div>*","");
        },3000);
        
        $('select').select2();      
    } );