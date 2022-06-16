<?php
$user = new UsersController();
$id=$_SESSION['user_id'];
$user = $user->getUserById($id);


?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
            </div>
            <div class="table-responsive">
                <table class="table no-wrap user-table mb-0">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 text-uppercase font-medium pl-4">id</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Fullname</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Username</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Role</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                      <td class="pl-4">
                        <?= $user->user_id ?>

                      </td>
                      <td><?= $user->fullname ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->admin ?></td>
                    </tr>
                  
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>