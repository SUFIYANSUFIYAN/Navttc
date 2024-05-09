<?php 
include("components/header.php");
?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  mx-0">
                    <div class="col-md">
                    <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">All categories</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">image</th>
                                        <th scope="col" class="px-5" colspan="2">Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $pdo->query("select * from categories");
                                    $row = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $values){
?>
                          <tr>
                            <th scope="row"><?php echo $values['catId']?>
                                    </th><th scope="row"><?php echo $values['catName']?>
                                    </th><th scope="row"><img src="<?php echo $categoryref.$values['catImage']?>" width="80px">
                                    <td><a href="updatecategory.php?Cid=<?php echo $values['catId']?>  "class="btn btn-success"> Edit </td></a> 
                                    <td><a href="" class="btn btn-danger"> Delete </td></a> 
                                    </th>
                            

<?php
                                    }
                                        ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->

<?php
include("components/footer.php");
?>