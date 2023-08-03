 <!-- Topbar Start -->
 <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">Knit</span>Site</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form id="search-form">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search"  placeholder="Search for products">
                        <input class="input-group-text bg-transparent text-primary"  type="submit" value="Search">
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

     <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>

    
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col" >
        <div class=" dropdown-item" id="search-results"> </div>
        </div>
    </div>
    </div>               
     <script>

        $(document).ready(function(){
            $("#search").autocomplete({
                source: "search/suggestions.php",
                select: function(event, ui){
                    var selectedProduct = ui.item.value;
                    getProductDetails(selectedProduct);
                }
            });

            $("#search-form").submit(function(event){
                event.preventDefault();
                var searchText = $("#search").val();
                if (searchText !== '') {
                    getProductDetails(searchText);
                }
            });

            function getProductDetails(productName){
               
                window.location.href = "abc.php?name="+productName;
            }
        });
        
    </script>
