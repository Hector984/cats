<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body >

         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route ('cats.all')}}">Cats</a>
                <div  id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('cats.index') }}">Register</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <div class="container border mt-5 w-75" style="background:white;">
            <div class="row mt-3"></div>
        </div>

    </body>
</html>

<script src="../js/container.js"></script>


<script>

    const url = "http://127.0.0.1:8000/api/cats";
    const route = "storage/app/public/";
    let html = '';
    const urlParticularCat = window.location.href;
    
    async function getCats(){
        const response = await fetch(url);
        const data = await response.json();
        const cats = data.data;

        console.log(cats);
        cats.forEach(cat => {
        
        let htmlSegment = `<div class="col-12 col-sm-6 col-xl-4 col-xxl-4 d-flex justify-content-center justify-content-sm-evenly p-0">
                                <div class="card border border-primary border-2 mt-2" style="width: 14rem;height: 427px">
                                <img src="${cat.img_path}" class="card-img-top rounded-2 mt-3" style="height:152px;">
                                <div class="card-body shadow p-3 mb-3 mt-2 bg-body rounded overflow-auto">
                                    <a href="${urlParticularCat + '/' + cat.id}"><h2 class="card-title text-primary">${cat.name}</h2></a>
                                    <p class="card-text text-secondary">${cat.text}</p>
                                </div>
                                </div>
                            </div>`;

        html += htmlSegment;
        });

        let container = document.querySelector('.row');
        container.innerHTML = html;

    }
    // <img src="${cat.img_path}" class="card-img-top rounded-2 mt-3" style="height:152px;">

    getCats();
</script>