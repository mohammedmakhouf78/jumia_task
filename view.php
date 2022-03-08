<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        
        <div class="row">


            <div class="col">
                <select id="country" class="form-select" aria-label="Default select example">
                    <option selected value="all">Choose the Country</option>

                    <?php foreach($countries as $country): ?>
                    <option><?= $country ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="col">
                <select id="state" class="form-select" aria-label="Default select example">
                    <option selected value="all">Choose the State</option>
                    <option value="1">valid</option>
                    <option value="0">notValid</option>
                </select>
            </div>

        </div>



        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Country</th>
                    <th scope="col">State</th>
                    <th scope="col">Country Code</th>
                    <th scope="col">Phone Num</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php foreach($data as $item): ?>
                <tr>
                    <th scope="row"><?= $item['country'] ?></th>

                    <?php if($item['state']): ?>
                        <th class="text-success">OK</th>
                    <?php else: ?>
                        <th class="text-danger">Not OK</th>
                    <?php endif; ?>
                    
                    <th><?= $item['code'] ?></th>
                    <td><?= $item['phone'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div>
            <?php for($i = 1; $i <= $pageCount; $i++): ?>
                <button class="btn page_btn"><?= $i ?></button>
            <?php endfor; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="/main.js"></script>

</body>

</html>