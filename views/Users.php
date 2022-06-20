<?php
$user = new UsersController();
$data = $user->getAllUsers();

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
                      <th scope="col" class="border-0 text-uppercase font-medium">adress de livraison</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Phone</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data as $userinfo) { ?>
                    <tr>
                      <td class="pl-4">
                        <?= $userinfo->user_id ?>

                      </td>
                      <td><?= $userinfo->fullname ?></td>
                        <td><?= $userinfo->username ?></td>
                        <td><?= $userinfo->email ?></td>
                        <td><?= $userinfo->adress_facture ?></td>
                        <td><?= $userinfo->numero_tele ?></td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>