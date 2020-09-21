<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Sistema Presupuestal Fundación de las Familias';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

    <?= $this->Html->css('milligram.min.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <nav class="top-nav">
        <div class="main-login col-sm-5 col-sm-offset-6">
             <div class="logo">
                   <img src="/img/funfamilia.PNG" />
             </div>
       </div>
        <div class="top-nav-title">
            <a href="/"><span>Control</span> Presupuestario</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank"> <?= $this->Html->link(__('Inicio'), ['controller' => 'Pages','action' => 'home']) ?> </a>
             <a target="_blank"><?= $this->Html->link(__('Salir'), ['controller' => 'Users','action' => 'logout']) ?></a> 
        </div>
       
    </nav>

<nav class="left-nav"  >
 
<div class="left-nav-title">
     <a ><?= __('Consultas:') ?></a>   
</div>
<div class="left-nav-links">
  <ul><?= $this->Html->link(__('Ejecución Presupuestaria'), ['controller' => 'Programas','action' => 'view2'] ) ?></ul>
  <ul><?= $this->Html->link(__('Simulación Presupuestaria'), ['controller' => 'Programas','action' => 'view3'])  ?></ul>
  <ul><?= $this->Html->link(__('Presupuesto/Gasto Anual'), ['controller' => 'Programas','action' => 'index2'])  ?></ul>
</div>


<div class="left-nav-title">
     <a ><?= __('Mantenedores:') ?></a>   
</div>
<div class="left-nav-links">
  <ul><?= $this->Html->link(__('Programas'), ['controller' => 'Programas','action' => 'index']) ?></ul>
  <ul><?= $this->Html->link(__('Centros'), ['controller' => 'Centros','action' => 'index']) ?></ul>
  <ul><?= $this->Html->link(__('Agrupaciones'), ['controller' => 'Agrupaciones','action' => 'index']) ?></ul>
  <ul><?= $this->Html->link(__('Items'), ['controller' => 'Items','action' => 'index']) ?></ul>
</div>

<div class="left-nav-title">
     <a ><?= __('Rendiciones:') ?></a>   
</div>
<div class="left-nav-links">
  <ul><?= $this->Html->link(__('Detalle Solicitud Pago'), ['controller' => 'Items','action' => 'cone']) ?></ul>
  <ul><?= $this->Html->link(__('Detalle SF Rendido'), ['controller' => 'Items','action' => 'cone2']) ?></ul>

</div>
</nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>

</html>
