<?php include_once 'sellerHeader.php';
?>
<?php
include_once("commonMethod.php");
$idVal = totalProduct(connection());
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        /* Resetting the default link color for <a> tags */
        a {
            color: inherit;
            text-decoration: none;
        }

        /* Styling for the edit and delete links */
        a.edit-link {
            color: purple;
            /* Purple color */
        }

        a.delete-link {
            color: red;
            /* Red color */
        }
    </style>
</head>

<body>
    <table class="table">
        <thead class="bg-light">
            <tr class="border-0">
            <th class="border-0">Product Image</th>
                <th class="border-0">Product Name</th>
                <th class="border-0">Brand</th>
                <th class="border-0">Description</th>
                <th class="border-0">Price</th>
                <th class="border-0">Category</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                <td>
                        <img src="<?php  echo @$user['image_path']; ?>" alt="">
                    </td>
                    <td>
                        <?php echo @$user['name']; ?>
                    </td>
                    <td>
                        <?php echo @$user['description']; ?>
                    </td>
                    <td>
                        <?php echo @$user['price']; ?>
                    </td>
                    <td>
                        <?php echo @$user['category_id']; ?>
                    </td>
                    <td>Patricia J. King</td>
                    <td>
                        <a class="edit-link" href="">&#x270E;</a>
                        <a class="delete-link" href="">&#x1F5D1;</a>
                        <a href="">&#x2705;</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>