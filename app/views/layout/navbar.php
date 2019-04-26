<?php 

use Ninja\Auth;
use Ninja\Session;

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 fixed-top">
  <a class="navbar-brand" href="<?=APP_URL?>"><?=APP_NAME?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav ml-auto">
        <?php if(!Auth::guest()): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-menu-right" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=Auth::user()->name ?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="<?=APP_URL . '/dashboard' ?>" role="button" aria-expanded="false">Dashboard</a>
                    <a class="dropdown-item" href="<?=APP_URL . '/auth/logout'?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();" aria-expanded="false">
                        Logout
                    </a>
                    <form id="logout-form" action="<?=APP_URL . '/auth/logout'?>" method="POST" style="display: none;"><?=csrf_field() ?></form>
                </div>
            </li>
        <?php else: ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?=APP_URL . '/auth/register' ?>">Register</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?=APP_URL . '/auth/login' ?>">Login</a>
            </li>
        <?php endif; ?>
    </ul>   
  </div>
</nav>