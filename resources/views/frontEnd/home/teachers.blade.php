@extends('frontEnd.home.layout.front_master')
@section('main_content')

    <!-- CSS Library-->
   
    <!-- Style -->
    <div class="main-teacher">

        <h3 style="color:#08436b; text-align:center; padding-bottom:20px" >Our Teacher's</h3>

        <div id="myBtnContainer">
            <button class="btn active" onclick="filterSelection('leadership')"> Leadership Team</button>
            <button class="btn" onclick="filterSelection('Early')"> Early years</button>
            <button class="btn" onclick="filterSelection('primary')"> Primary years</button>
            <button class="btn" onclick="filterSelection('Middle')"> Middle years</button>
        </div>

        <!-- Portfolio Gallery Grid -->
        <div class="row-people clearfix" style="display: flex;flex-wrap: wrap">
                <div class="column-teacher leadership">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/Brendan.jpg') }}" alt="Lights" style="width:100%">
                        <h4>Brendan Hearne</h4>
                        <p>Director of Learning and Development</p> 
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            Read more
                        </button>

                    </div>
                </div>
                
                <div class="column-teacher leadership">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/James.jpg') }}" alt="Mountains" style="width:100%">
                        <h4>James Quantrill</h4>
                        <p>Head of School</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalJames">
                                Read more
                        </button>    
                    </div>
                </div>

                <div class="column-teacher leadership">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Assma.jpg')}}" alt="Nature" style="width:100%">
                    <h4>Asmaa Hussein</h4>
                    <p>Head of Middle Years</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalAssma">
                    Read more
                    </button>  
                    </div>
                </div>

                <div class="column-teacher leadership">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/Grace.jpg')}}" alt="Nature" style="width:100%">
                        <h4>Grace Collantes</h4>
                        <p>Head of Early Years</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalGrace">
                        Read more
                        </button>  
                    </div>
                </div>

                <div class="column-teacher Middle">
                    <div class="content-teacher">
                            <img src="{{asset('public\uploads\teacher/Assma.jpg')}}" alt="Mountains" style="width:100%">
                            <h4>Asmaa Hussein</h4>
                            <p>Middle Years Teacher(Science specialism)</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalAssma">
                                Read more
                            </button>  

                    </div>
                </div>

                <div class="column-teacher Middle">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/NeilMaclean.jpg')}}" alt="Lights" style="width:100%">
                        <h4>Neil Maclean</h4>
                        <p>Middle Years Class Teacher (English specialism)</p> 
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalNeilmaclean">
                                Read more
                        </button> 
                    </div>
                </div>

                <div class="column-teacher Middle">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Alex.jpg')}}" alt="Nature" style="width:100%">
                    <h4>Alexandra Martinez</h4>
                    <p>Middle Years Class Teacher(Marths specialism)</p>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalAlexandra">
                                Read more
                    </button>     
                </div>

                </div>
                
                <div class="column-teacher Middle">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Rachael.jpg')}}" alt="Nature" style="width:100%">
                    <h4>Rachael Collins</h4>
                        <p>EAL Teacher</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalRachael">
                                Read more
                        </button> 
                    </div>
                </div>

                <div class="column-teacher Middle">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/Carlos.jpg')}}" alt="Nature" style="width:100%">
                            <h4>Carlos Marques</h4>
                            <p>Physical Education Specialist Teacher</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCarlos">
                                Read more
                            </button> 

                    </div>
                </div>

                <div class="column-teacher primary">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/NeilJones.jpg')}}" alt="Car" style="width:100%">
                    <h4>Neil Jones</h4>
                    <p>Year 1 Class Teacher</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalNeiljones">
                        Read more
                    </button> 
                    </div>
                </div>

                <div class="column-teacher primary">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Fionuala.jpg')}}" alt="Car" style="width:100%">
                    <h4>Fionnuala Brophy</h4>
                    <p>Year 1 Class Teacher</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalFionnuala">
                        Read more
                    </button> 
                    </div>
                </div>

                <div class="column-teacher primary">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Jack-Odam.jpg')}}" alt="Car" style="width:100%">
                    <h4>Jack Odam</h4>
                    <p>Year 2 Class Teacher.</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalJack">
                        Read more
                    </button> 
                    </div>
                </div>

                <div class="column-teacher primary">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Emer.jpg')}}" alt="Car" style="width:100%">
                    <h4>Emer Taheny</h4>
                    <p>Year 2 Class Teacher</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEmer">
                        Read more
                    </button> 
                    </div>
                </div>

                <div class="column-teacher primary">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Nicola.jpg')}}" alt="Car" style="width:100%">
                    <h4>Nicola Isabel Gilmour</h4>
                    <p>Year 3 Class Teacher</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalNicola">
                        Read more
                    </button> 
                    </div>
                </div>

                <div class="column-teacher primary">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Conor.jpg')}}" alt="Car" style="width:100%">
                    <h4>Conor Slattery</h4>
                    <p>Year 3 Class Teacher</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalConor">
                        Read more
                    </button> 
                    </div>
                </div>

                <div class="column-teacher primary">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Karl.jpg')}}" alt="Car" style="width:100%">
                    <h4>Karl Perkins</h4>
                    <p>Year 4 Class Teacher</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalKarl">
                        Read more
                    </button> 
                    </div>
                </div>
                
                <div class="column-teacher primary">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Ed.jpg')}}" alt="Car" style="width:100%">
                    <h4>Edward Kellett</h4>
                    <p>Year 5 Class Teacher</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEdward">
                        Read more
                    </button> 
                    </div>
                </div>

                <div class="column-teacher primary">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/Carlos.jpg')}}" alt="Nature" style="width:100%">
                            <h4>Carlos Marques</h4>
                            <p>Physical Education Specialist Teacher</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCarlos">
                                Read more
                            </button> 

                    </div>
                </div>
            
                <div class="column-teacher primary">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Yasmeen.jpg')}}" alt="Nature" style="width:100%">
                    <h4>Yasmeen Russul Saib</h4>
                    <p>Middle Years Class Teacher</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalYasmeen">
                                Read more
                    </button> 

                    </div>
                </div>
                
                <div class="column-teacher primary">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Rachael.jpg')}}" alt="Nature" style="width:100%">
                    <h4>Rachael Collins</h4>
                        <p>EAL Teacher</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalRachael">
                                Read more
                        </button> 
                    </div>
                </div>
                
                <div class="column-teacher Early">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/Grace.jpg')}}" alt="Car" style="width:100%">
                        <h4>Grace Collantes</h4>
                        <p>Nursery Class Teacher</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalGrace">
                            Read more
                        </button>  
                    </div>
                </div>

                <div class="column-teacher Early">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/Chiara.jpg')}}" alt="Car" style="width:100%">
                        <h4>Chiara Bernesi</h4>
                        <p>Pre-School Class Teacher</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalChiara">
                            Read more
                        </button>  
                    </div>
                </div>

                <div class="column-teacher Early">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/Patricia.jpg')}}" alt="Car" style="width:100%">
                        <h4>Patricia Barnwell</h4>
                        <p>Learning Support Teacher</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalPatricia">
                            Read more
                        </button>  
                    </div>
                </div>

                <div class="column-teacher Early">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/Carlos.jpg')}}" alt="Nature" style="width:100%">
                            <h4>Carlos Marques</h4>
                            <p>Physical Education Specialist Teacher</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCarlos">
                                Read more
                            </button> 
                    </div>
                </div>

                <div class="column-teacher Early">
                    <div class="content-teacher">
                    <img src="{{asset('public\uploads\teacher/Rachael.jpg')}}" alt="Nature" style="width:100%">
                    <h4>Rachael Collins</h4>
                        <p>EAL Teacher</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalRachael">
                                Read more
                        </button> 
                    </div>
                </div>
                
                
                <div class="column-teacher Early">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/Montessori.jpg')}}" alt="Car" style="width:100%">
                        <h4>Faith Gamo dela Cruz</h4>
                        <p>Montessori Class Teacher</p>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalFaith">
                            Read more
                        </button>  
                    </div>
                </div>
                <div class="column-teacher Early">
                    <div class="content-teacher">
                        <img src="{{asset('public\uploads\teacher/Jack-Fidler.jpg')}}" alt="Car" style="width:100%">
                        <h4>Jack Fidler</h4>
                        <p>Reception Class Teacher</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalFidler">
                            Read more
                        </button>  
                    </div>
                </div>
        </div>
        <!-- END GRID -->
        
    </div>

    @include('frontEnd.home.partials.info-teachers') 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        filterSelection("leadership")
        function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("column-teacher");
        
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
        }

        function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
        }
        }

        function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);     
            }
        }
        element.className = arr1.join(" ");
        }


        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
        }
    </script>

    <script type="text/javascript">
        jQuery(function($){  
        $("#bt_close").on("click", function() {
            $(".social_group").addClass("hidden");
            $("#bt_open").show();
        });
        $("#bt_open").on("click", function() {
            $(this).hide();
            $(".social_group").show();
            $(".social_group").removeClass("hidden");
        });

        $(".social_group").hover(            
                function() {
                    $(this).toggleClass('open');        
                },
                function() {
                    $(this).toggleClass('open');       
                }
            );
        });  

        $( document ).ready(function() {    
            $("#bs-example-navbar-collapse-1 .dropdown-menu li.active").parent().parent().addClass('active');
        $('#menutop li .i_mobile_ex').click(function(){
            console.log('ok');
        })
        });
    </script>
@endsection
