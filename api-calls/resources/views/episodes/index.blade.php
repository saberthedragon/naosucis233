<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contentName="IE=edge">
    <meta name="viewport" contentName="width=device-width, initial-scale=1.0">
    <title>Episodes</title>
</head>

<body>

    <!-- {{ dd ($episodes) }}   --> <!-- Tells "routes" to output to here; Laravel's ver of "print_r" -->

    <!-- Bootstrap Styling (WITHOUT the CSS back-up ;)  -->


    <div class="row row-cols-1 row-cols-md-3 g-4">


        @foreach ($episodes as $show_obj)
        {{episode['name']}}
        <div class="col">
            <div class="card h-100">
                <img src="<?= $show_obj->image; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $show_obj->name ?></h5>
                    <p class="card-text"><?= $show_obj->summery ?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><?= $show_obj->episode ?></small>
                </div>
            </div>
        </div>
        @endForEach
    </div>
</body>

</html>